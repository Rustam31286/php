<?php

session_start();

header('Content-type: text/html; charset=utf-8');

$login = htmlspecialchars(trim($_POST["login"]));
$pass = htmlspecialchars(trim($_POST["pass"]));

if (empty($login) or empty($pass)) {
  exit ("Не все поля заполнены");
}

$dbhost = "localhost";
$dbuser = "rustamerk_aut";
$dbpass = "03mBrw6&";
$dbname = "rustamerk_aut";
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$mysqli->set_charset("utf-8");


if ($mysqli->connect_error) {
  die("Не удалось подключиться к БД".$mysqli->connect_error);
}
$result = $mysqli->query("SELECT * FROM `users` WHERE `login`='$login'")->fetch_assoc();

if (!isset($result) or !password_verify($pass, $result['password'])) {
  exit("Неверный логин или пароль");
}

$_SESSION['id'] = $result['id'];
$_SESSION['login'] = $result['login'];
$_SESSION['name'] = $result['name'];
$_SESSION['lastname'] = $result['lastname'];
$_SESSION['patronymic'] = $result['patronymic'];
$_SESSION['birthdate'] = $result['birthdate'];


//header("Location: /lk.php"); // у кого подключен javascript; если на данную страницу auth_obr ничего не выводилось.
exit("<script>window.location.href='lk.php'</script>"); // у кого в браузере отключен Javascript

//exit("Пользователь ".$result['login']." успешно вошел");