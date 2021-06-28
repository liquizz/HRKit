<?php

session_start();
if(isset($_SESSION['email'])){
$filename = $_GET['filename'];

 // нужен для Internet Explorer, иначе Content-Disposition игнорируется
if(ini_get('zlib.output_compression'))
  ini_set('zlib.output_compression', 'Off');
 
$file_extension = strtolower(substr(strrchr($filename,"."),1));
 
if( $filename == "" )
{
          echo "ОШИБКА: не указано имя файла.";
          exit;
} elseif ( !file_exists($filename = 'methodics/'.$_GET['filename']) ) // проверяем существует ли указанный файл
{
          echo "ОШИБКА: данного файла не существует.";
          exit;
};
switch( $file_extension )
{
          case "xls": $ctype="application/vnd.ms-excel"; break;
          default: $ctype="application/force-download";
}
header("Pragma: public"); 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); // нужен для некоторых браузеров
header("Content-Type: $ctype");
header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($filename)); 
readfile("$filename");
exit();
}
else{
    echo 'Загрузка доступна только зарегистрированным пользователям';
    }

?>