<?php

class View
{
    //Переменные для отображения в представлении получаем в этой функции. Они становятся видны в подключаемомо ниже шаблоне 
    //template.php
    public function generate(
    							$view, 
    							$Lang=DEF_LANG_DEFAULT, 
    							$csrf=true, 
    							$errors=true, 
    							$data=true
    						) 
    {
        include_once Q_PATH.'/application/views/template.php';
    }
}