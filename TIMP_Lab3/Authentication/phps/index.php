<?php
include 'connection.php';

session_start();


$login = $_POST["login"];
$pass = $_POST["pass"];

if($login == null || $pass == null){
	

    $_SESSION['message'] = 'Введите данные!';
    header("Location: ../htmls/index.php");
    die();
	

}

$sql = "SELECT * FROM auth WHERE \"user\" = '$login'";
$result = $pdo->query($sql);
//$a = $connection->query("SELECT * FROM `users` WHERE `login` = '$login'");

$rows = $result->fetchAll();


if(count($rows) == 0){

	
    $_SESSION['message'] = 'Не найден такой пользователь!';
    header('Location: ../htmls/index.php');
    die();

}


foreach ($rows as $row) {
	
    if($row['password'] != hash('sha256', crypt($pass, $row['salt']))){
		
		
        $_SESSION['message'] = 'Неверный пароль';
        header('Location: ../htmls/index.php');
        die();

    }
	
	$_SESSION['user'] = $row;
	header("Location: ../../UserException/index.php");
	
}








?>


