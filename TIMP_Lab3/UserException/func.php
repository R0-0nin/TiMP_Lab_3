<?php
include 'config.php';


function sender($ms, $ts, $dte, $iF){
	
		$pdo = new PDO("pgsql:host=localhost;dbname=MyDB", "postgres", "admin");
	    $sqll = "INSERT INTO userexception (message, targetsite, datetimeexc, indexform) VALUES ('$ms', '$ts', '$dte', '$iF')";
        $pdo->query($sqll);
	
}


function fileparser($way){
	
	$counter = 0;
	$str = 0;
	$fileName = $way;

	$file = fopen($fileName, "r");

	while (!feof($file)) {
	  $line = fgets($file);
	  if ($str == 1) {
		$msg = $line;
		$str++;
	  } else if ($str == 2) {
		$TargetSite = $line;
		$str++;
	  } else if ($str == 3) {
		$TargetSite .= $line;
		$str++;
	  } else if ($str == 4) {
		$indexForm = $line;
		$str++;
	  } else if ($str == 5) {
		$str = 0;
		sender($msg, $TargetSite, $dateTimeExc, $indexForm);
	  }
	  if (strpos($line, 'Date') !== false && $str == 0) {
		$str = 1;
		$flag = true;
		$counter++;
		$dateTimeExc = substr($line, 0, 19);
	  }
	}
	fclose($file);
	unlink($fileName);
}

$success="";
//$name = $_POST['name'];
//$mail = $_POST['mail'];
//$note = $_POST['note'];



// Create



if (isset($_POST['submit'])) {
	
	
	if(isset($_FILES['loger'])) {
    $file_name = $_FILES['loger']['name'];
    $file_tmp = $_FILES['loger']['tmp_name'];
	
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    if($file_ext === 'txt' && $file_name === 'log.txt') {
			
		move_uploaded_file($_FILES["loger"]["tmp_name"], "C:/Apache24/temp1/".$file_name);
		$way = "C:/Apache24/temp1/".$file_name;
		fileparser($way);


    } else {
        // файл не соответствует заданному имени и расширению
            $success = '<div class="alert alert-danger" role="alert">
  <strong>Необходим файл log.txt!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
}
	
	/*
    if(filter_var($mail, FILTER_VALIDATE_EMAIL) != false && $note != null && $name != null){

        $sql = ("INSERT INTO `crudusers` (`name`, `email`, `note`) VALUES (?,?,?)");
        $query = $pdo->prepare($sql);
        $query->execute([$name, $mail, $note]);
        header('Location: index.php');
	

	else {

    $success = '<div class="alert alert-danger" role="alert">
  <strong>Введите корректные данные!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

	}
	*/

}

// Read

$sql = "SELECT * FROM userexception";
//$sql->execute();
$result = $pdo->query($sql);

// Update

//$edit_name = $_POST['edit_name'];
//$edit_mail = $_POST['edit_mail'];
//$edit_note = $_POST['edit_note'];
//$get_id = $_GET['id'];

if (isset($_POST['edit-submit'])) {
	
	$mes = $_POST['Message']; 
	$ts = $_POST['TargetSite'];
	$date = $_POST['date'];
	$iform = $_POST['indexForm'];
	$id = $_GET['id'];
	
    if($mes != null && $ts != null && $date != null && $iform != null) {
		
        $sqll = "UPDATE userexception SET Message='$mes', TargetSite='$ts', dateTimeExc='$date', indexForm='$iform' WHERE id='$id'";
        $pdo->query($sqll);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    else{

        $success = '<div class="alert alert-danger" role="alert">
  <strong>Введите корректные данные!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

    }
}

// DELETE
if (isset($_POST['delete_submit'])) {
	$id = $_GET['id'];
	$sql = "DELETE FROM userexception WHERE id=$id";
	$pdo->query($sql);
	header('Location: '. $_SERVER['HTTP_REFERER']);
	
}
