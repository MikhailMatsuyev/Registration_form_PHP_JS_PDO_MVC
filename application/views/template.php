<?php
  
  	/*Это шаблон всех страниц приложения 
  	*
	*/
    include Q_PATH.'/application/lib/'.$Lang.'.php';//подключим файл с переводом
    include_once Q_PATH.'/application/views/header'.'.php';
    //$view - может быть index, userpanel, 404
    include_once Q_PATH.'/application/views/view'.$view.'.php';	
    include_once Q_PATH.'/application/views/footer'.'.php';


