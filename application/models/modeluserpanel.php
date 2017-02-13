<?php
class ModelUserpanel extends Model
{
    function setVarsFromSess($spost_login)
    {
        // Ф-ия установки данных пользователя в переменные из сессии
        // после редиректа со страницы регистрации на кабинет пользователя
        // Эти данные будут переданы в представление из контроллера 
        //
    
        try
        {
            $db = DB::getinstance();
            $query = $db->prepare("SELECT * FROM `table_users` WHERE (`login`= (?)) LIMIT 1");
            $query->bindParam(1, $spost_login);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
        
            if ($row){
                return $row;
            }
            return 0;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    
    function logout()
    {
        session_destroy();
    }
}
