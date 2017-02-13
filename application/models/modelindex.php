<?php
class ModelIndex extends Model
{
    /*
	*
	* устновим имя файла-аватара в md5
	*
	*/
    private $var_model_index;
    public $csrf;

    
    function __construct() 
    {
        session_start();
         
        $_SESSION['CSRF_PROTECTION']   = $this-> csrf = md5(microtime().session_id());

        session_write_close();

    }   

    /* Шифруем имя картинки-аватара для того, чтобы не было ошибки в случае загрузки картинок с одинаковым имененм и расширением
    */
    public function setAvatarNameMd5($filename_avatar)
    { 
        $type   =   $filename_avatar["input_avatar"]["type"];
        $name	=	"";
        
        if($filename_avatar["input_avatar"]["type"]){
            $name   =   md5(microtime()).".".substr($type, strlen("image/"));
        }
        return $name;
    }
    
    public function loadAvatar($avatar_file, $name_file_avatar_md5)
    {
        // переместим аву с сервера на сайт! сделать это нужно до редиректа!
        $uploadfile =   DEF_AVATARS_PATH.$name_file_avatar_md5;
        if ($avatar_file){
            move_uploaded_file($avatar_file, $uploadfile);
        }
        return true;
    }
      
    public function functionsInsertIntoBaseNewUser($spost, $file_name_avatar_md5)
    {
        
        session_start();
        
        $inp_name       =	$spost["inp_name"];
        $inp_surname    =	$spost["inp_surname"];
        $login          =	$spost["login"];
        if (($spost['daypicker']>0)and($spost['monthpicker']>0)and($spost['yearpicker']>0)){
                $inp_birth_date   =   ($spost['yearpicker']).".".($spost['monthpicker']).".".($spost['daypicker']);
            }else{
                $inp_birth_date   =   ("".".".""."."."");
            }
        $phone_number   =   $spost['phonecodepicker'].$spost['inp_phone_number'];
        $password       =   password_hash($_POST['password'], PASSWORD_BCRYPT);
        
        try
        {	
            $db = DB::getinstance();
            $query = $db->prepare("INSERT INTO table_users
                        (`name_user`,
                        `surname_user`,
                        `login`,
                        `psw`,
                        `phone_number`,
                        `birth_date`,
                        `avatar`)
                        VALUES 
                        (
                            ?, ?, ?, ?, ?, ?, ?
                        )"
            );

            $query->bindParam(1, $inp_name);
            $query->bindParam(2, $inp_surname);
            $query->bindParam(3, $login);
            $query->bindParam(4, $password);
            $query->bindParam(5, $phone_number);
            $query->bindParam(6, $inp_birth_date);
            $query->bindParam(7, $file_name_avatar_md5);
            $query->execute();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }        
    
    public function setNewUserDataIntoSession($spost/*, $file_name_avatar_md5*/)
    {
        session_start();
        
        $_SESSION['s_login'] =   $spost;
        
        session_write_close();
    }        
    
    public function checkDataFromUserForm($spost, $file) 
    {
        //проверяем входные данные на форму на корректность
		if(file_exists(Q_PATH.'/application/lib/ssCheckDataFromUserForm.php')){
            include_once Q_PATH.'/application/lib/ssCheckDataFromUserForm.php';
        }

        //Для уменьшения кода в модели передаем для проверки в хелпер SSСheckDataFromUserForm()
        $this->var_model_index = new SSСheckDataFromUserForm();
		
        $var_error_reg["u_exist"]           = $this->var_model_index->userExist($spost['login']);


        if ($file["input_avatar"]["name"]){
            $var_error_reg["safe_u_f"]          = $this->var_model_index->isSafeUploadFile($file);
        }else{
            $var_error_reg["safe_u_f"]= 0;
        }

            $var_error_reg["cor_u_name"]        = $this->var_model_index->correctName($spost['inp_name']);
            $var_error_reg["correct_surname"]   = $this->var_model_index->correctSurname($spost['inp_surname']);
            $var_error_reg["correct_phonenumb"] = $this->var_model_index->correctPhonenumb($spost['inp_phone_number']);
            $var_error_reg["is_eq_psw"]         = $this->var_model_index->pswIsEqual($spost['password'],$spost['password_re']);

            $var_error_reg["correct_login"]     = $this->var_model_index->correctLogin($spost['login']);

            $var_error_reg["csrf_prot"]         = $this->var_model_index->csrfIsEqual($spost['token'],$spost['sess_token']);

            $var_error_reg["correct_psw"]       = $this->var_model_index->correctPsw($spost['password']);

            return $var_error_reg;
    }
}