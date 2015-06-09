<?php
$db_name = "timetable_znu";
$username = "root";
$password = "";
$fp = fopen(__DIR__ . "/db.txt","r");
if ($fp){
  $db_name = str_replace("\n","",str_replace("\r","",fgets($fp)));
  $username = str_replace("\n","",str_replace("\r","",fgets($fp)));
  $password = str_replace("\n","",str_replace("\r","",fgets($fp)));
  fclose($fp);
}
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname='.$db_name,
    'username' => $username,
    'password' => $password,
    'charset' => 'utf8',
];
