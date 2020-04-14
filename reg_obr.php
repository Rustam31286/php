<?php

//$_GET

header('Content-type: text/html; charset=utf-8');

$login = trim($_POST["login"]);
$pass = trim($_POST["pass"]);
$passrepeat = trim($_POST["passrepeat"]);
$name = trim($_POST["name"]);
$lastname = trim($_POST["lastname"]);
$patronymic = trim($_POST["patronymic"]);
$birthdate = trim($_POST["birthdate"]);

$login = htmlspecialchars($login);
$pass = htmlspecialchars($pass);
$passrepeat = htmlspecialchars($passrepeat);
$name = htmlspecialchars($name);
$lastname = htmlspecialchars($lastname);
$patronymic = htmlspecialchars($patronymic);
$birthdate = htmlspecialchars($birthdate);

if (empty($login) or empty($pass) or empty($passrepeat) or empty($name) or empty($lastname) or empty($patronymic) or empty($birthdate)) {
  exit("Не все поля заполнены");
}

if (!preg_match("/^([a-zA-Z0-9])+([-_\.@])*/",$login) 
    or !preg_match("/^([a-zA-Z0-9-_.])+$/",$pass)) 
{
  exit("Недопустимые символы в логине или пароле");
}

if (
  (mb_strlen($login) < 3 or mb_strlen($login) > 32)
  or (mb_strlen($pass) < 3 or mb_strlen($pass) > 16)
  ) 
{
  exit("Слишком длинные или слишком короткие логин/пароль");
}

/*if (!preg_match("/^([а-яА-Я])+$/", $name) 
    or !preg_match("/^([а-яА-Я])+$/", $lastname)
    or !preg_match("/^([а-яА-Я])+$/", $patronymic)) {
  exit("Недопустимые символы");
}*/



if ($pass != $passrepeat) {
  exit("Пароли не совпадают!");
}

$pass = password_hash($pass, PASSWORD_BCRYPT);



$dbhost = "localhost";
$dbuser = "rustamerk_aut";
$dbpass = "03mBrw6&";
$dbname = "rustamerk_aut";
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$mysqli->set_charset("utf-8");

/*echo ("
Логин - $login <br> 
Пароль - $pass <br> 
Имя - $name <br> 
Фамилия - $lastname <br> 
Отчество - $patronymic <br> 
Дата рождения - $birthdate<br>");*/


if ($mysqli->connect_error) {
  die("Не удалось подключиться к БД".$mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM `users` WHERE `login`='$login'");
$result = $result->fetch_assoc();// приводит к ассоцтативному массиву
if(isset($result)) {
  exit("Такой пользователь уже зарегистрирован");
}

$result = $mysqli->query("INSERT INTO `users`(`login`, `password`, `name`, `lastname`, `patronymic`, `birthdate`) VALUES ('$login', '$pass', '$name', '$lastname', '$patronymic', '$birthdate')");

if (!$result) {
  exit("Не удалось добавить пользовательля");
}


exit("Пользователь $login успешно зарегистрировано");

/*exit("
Логин - $login <br> 
Пароль - $pass <br> 
Имя - $name <br> 
Фамилия - $lastname <br> 
Отчество - $patronymic <br> 
Дата рождения - $birthdate");*/

?>

<!--<script>
  let user = {
    name: "Вася",
    lastnmae: "Петров",
    
    getUser() {
      return this.name + "" + this.lastname;
    }
  }
  
  user.name;
  user.getUser();
</script>-->