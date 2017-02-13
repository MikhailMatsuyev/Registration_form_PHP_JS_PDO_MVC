<?php

class ControllerUserpanel extends Controller 
{    
    private $vars_from_sess;
    private $model;        
    function __construct() 
    {  
        //Если в браузере ввести адрес пользовательской панели, то без этой строки
        //будет осуществлен переход на панель, где будут ошибки
        //Чтобы избежать смотрим, есть ли сессия установленная:
        session_start();

        //защита доступа в кабинет пользователя без попытки регистрации
        if (!($_SESSION['s_login'])) header ("Location: http://".$_SERVER['HTTP_HOST']."/");

        parent::__construct();
        if(file_exists(Q_PATH.'/application/models/'.'modeluserpanel'.'.php')){
            include_once Q_PATH.'/application/models/'.'modeluserpanel'.'.php';
        }    
        $this->model  = new ModelUserpanel();
        if($this->model->setVarsFromSess($_SESSION['s_login'])){
            $this->vars_from_sess = $this->model->setVarsFromSess($_SESSION['s_login']);
        }else{
            echo "Safety error";
        }

    }
 
    
    public function actionIndex($a=NULL, $b=NULL, $lang=DEF_LANG_DEFAULT) 
    {     
        $this->view->generate('userpanel', $this->model->setLang($lang), true,true ,$this->vars_from_sess);
    }	
    
    public function actionLogout($lang=DEF_LANG_DEFAULT) 
    {   
        $this->model->logout();
		header ("Location: http://".$_SERVER['HTTP_HOST']."/");
    }
}










