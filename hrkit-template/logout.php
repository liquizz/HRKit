<?php
session_start(); 
session_unset(); //чистим переменные сессии
session_destroy(); //убиваем сессию

header("Location: ".$_SERVER['HTTP_REFERER']); //после выхода возврат на ту же страницу

exit;
?>