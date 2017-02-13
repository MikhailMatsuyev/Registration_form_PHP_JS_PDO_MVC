<?php
class ControllerIndex extends Controller 
{   
    private $model;
    function __construct() 
    {
        parent::__construct();
        if(file_exists(Q_PATH.'/application/models/'.'modelindex'.'.php')){
            include_once Q_PATH.'/application/models/'.'modelindex'.'.php';	
        }
		$this->model = new ModelIndex();

    }	
    


    /* После старта приложения данные попадают в route.php
    * Затем в зависимости от введенного адреса определяется контроллер для вызова
    * Контроллер определяет модель для обработки данных 
    * Затем данные идут в представление application/core/view.php  
    * В этот  файл идет переменная $view, которая определяет имя представления: index, 404 или userpanel, а также
    * переменные для вывода
    */
    public function actionIndex($spost, $file_avatar, $lang) 
    {
        //Если нажата кнопка Зарегистрироваться
        if(isset($spost["btn_reg"])){       
                                    
            // отдали в модель на проверку данные и файл с формы
            $model_array = $this->model->checkDataFromUserForm($spost, $file_avatar);
            if (
                   ($model_array["u_exist"]         ==0)
                and($model_array["safe_u_f"]        ==0)
                and($model_array["cor_u_name"]      ==0)
                and($model_array["correct_surname"] ==0)
                and($model_array["correct_phonenumb"]==0)
                and($model_array["correct_login"]    ==0)
                and($model_array["correct_psw"]     ==0)
                and($model_array["is_eq_psw"]       ==0)
                and($model_array["csrf_prot"]       ==0)
               ){
                $file_name_avatar_md5   =   $this->model->setAvatarNameMd5($file_avatar);
                
                //Грузим аватар в папку avatar
				$this->model->loadAvatar($file_avatar["input_avatar"]["tmp_name"], $file_name_avatar_md5);

                //Вставляем в базу инфо о новом юзере
                $this->model->functionsInsertIntoBaseNewUser($spost, $file_name_avatar_md5);

                //Передаем в сессию данные о новом юзере

                $this->model->setNewUserDataIntoSession($spost['login']);

                //Редиректимся в панель пользователя. Для этого скрипт идет через роутер в контроллер userpanel
                header ("Location: http://".$_SERVER['HTTP_HOST']."/userpanel/".$lang."/");

            }else{ 

                // если есть ошибки при регистрации на форме, то грузим index и показываем ошибки
                $this->view->generate('index', $this->model->setLang($lang), $this->model->csrf, $model_array);
                //$model_array содержит ошибки прb попытке регистрации
                exit();
            }	

        }else{ 
            // Если кнопка Зарегистрироваться не нажата, то грузим index страницу с формой
            // Для этого переходим в представление application/core/view.php
            $this->view->generate('index', $this->model->setLang($lang), $this->model->csrf);
            exit();
        }          
    }		
}