<?php

/**
 * Description of сlassСheckDataFromUserForm
 *
 * @author 1
 */
class SSСheckDataFromUserForm
{
    public function userExist($spost_login)
    {
        try
		{
            $db = DB::getinstance();
            $query = $db->prepare("SELECT `login` FROM `table_users` WHERE (`login`= (?)) LIMIT 1");
            $query->bindParam(1, $spost_login);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
		
			if ($row){
				return 1;
			}
			return 0;
		}
		catch(PDOException $e)
		{
            echo $e->getMessage();
		}
    } 


    /*
    * В файле .htaccess в папке /avatars добавлены строки для запрета запуска скриптов
    *
    */
    public function isSafeUploadFile($file_with_avatar)
    {
        
        
        $name_f	= $file_with_avatar["input_avatar"]["name"];
        $type_f	= $file_with_avatar["input_avatar"]["type"];
        $size_f	= $file_with_avatar["input_avatar"]["size"];

        //Проверяем загрузку запрещенных расширений файла
        $blacklist = array( ".php", ".phtml",".php3",".php4", ".php5",
                            ".phtm",".pl",   ".php6",".phps", ".cgi", 
                            ".exe", ".asp",  ".aspx",".shtml",".shtm",
                            ".fcgi",".fpl",  ".jsp", ".htm",  ".html", 
                            ".wml","js");
        foreach ($blacklist as $item)
        {
            if (preg_match("/$item\$/i",$name_f)){
                return 1;
            } 
        }

        //Проверяем мета тип переданного для загрузки аватара
        if (($type_f != "image/gif")
             &&($type_f != "image/png")
             &&($type_f != "image/jpg")
             &&($type_f != "image/jpeg")
             &&($file_with_avatar["input_avatar"]["name"]!="")){
                return 1;
        }
         

        //Проверка на белый лист допустимых расширений
        $whitelist = array(".jpeg",".jpg",".png",".gif");
                
        $k=0;
        foreach ($whitelist as $item)
        {
            if (preg_match("/$item\$/i",$name_f)){
                $k=1;
            }
        }
        if($k==0) return 1;



        //Проверка на допустимый размер файла аватара
        if ($size_f>1024*1024){
            return 1;
        }
        return 0;
    }
    
    public function correctName($s_post_from_regform) 
    { 
        $s_post_from_regform    =   $s_post_from_regform;
        if(!preg_match("/^[a-zA-Zа-яА-Я]{1,15}(\s?|\-?)[a-zA-Zа-яА-Я]{0,15}$/", $s_post_from_regform)){
            return 1;
        }else{ 
            return 0; 
        }    
    }	
	
    public function correctSurname($s_post_from_regform)
    {   
        $s_post_from_regform    =   $s_post_from_regform;
        if(!preg_match("/^[a-zA-Zа-яА-Я]{1,15}(\s?|\-?)[a-zA-Zа-яА-Я]{0,15}$/", $s_post_from_regform)){
            return 1;
        }else{ 
            return 0; 
        } 
    }		
	
    public function correctPhonenumb($s_post_from_regform)
    {   
        $s_post_from_regform    =   $s_post_from_regform;
        if(!preg_match("/^[0-9]{9}$/", $s_post_from_regform)){
            return 1;
        }else{ 
            return 0; 
        }  
    }	
	
    public function correctPsw($s_post_from_regform)
    {   
        $s_post_from_regform    =   $s_post_from_regform;

        if(!preg_match("/^.{5,15}$/", $s_post_from_regform)){
            return 1;
        }else{ 
            return 0; 
        } 
    }	
		
    public function correctLogin($s_post_from_regform)
    {   
        $s_post_from_regform    =   $s_post_from_regform;

        if(!preg_match("/^[a-zA-Zа-яА-Я0-9\s\-\*\?\.\,\~\!\^\#\$\;\_\=\:\)\(\%\@\]\[]{1,15}$/", $s_post_from_regform)){
            return 1;
        }else{ 
            return 0; 
        } 
    }	
	
    public function pswIsEqual($s_post_from_regform_psw,$s_post_from_regform_re_psw)
    {
        $s_post_from_regform_psw    = $s_post_from_regform_psw;
        $s_post_from_regform_re_psw = $s_post_from_regform_re_psw;
        if ($s_post_from_regform_psw===$s_post_from_regform_re_psw){
            return 0;
        }else{ 
            return 1; 
        }
    }

    public function csrfIsEqual($csrf, $csrf_in_session)
    {
        if ((isset($_SESSION["CSRF_PROTECTION"])) && ($csrf===$csrf_in_session)){
            return 0;
        }else{ 
            return 1; 
        }
    }   	
}
