<?php
include 'config.php';




$success="";
//$name = $_POST['name'];
//$mail = $_POST['mail'];
//$note = $_POST['note'];

if (isset($_POST['submit'])) {
	
	$fn = $_POST['fn'];
	$ln = $_POST['ln'];
	$idg = $_POST['idg'];
	$sqll = "INSERT INTO student (firstname, lastname, id_group) VALUES ('$fn', '$ln', '$idg')";
	try{
    
		$pdo->query($sqll);
	
	}
	
	catch(Exception $e){
		
		$success = '<div class="alert alert-danger" role="alert">
  <strong>Такого студента или проекта не существует!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
		
	}
}

// Read

$sql = "SELECT * FROM student";
//$sql->execute();
$result = $pdo->query($sql);

// Update

//$edit_name = $_POST['edit_name'];
//$edit_mail = $_POST['edit_mail'];
//$edit_note = $_POST['edit_note'];
//$get_id = $_GET['id'];


// DELETE
if (isset($_POST['delete_submit'])) {
	$id = $_GET['id'];
	$sql = "DELETE FROM student WHERE id_student=$id";
	
	
	try{
	
	$pdo->query($sql);
	header('Location: '. $_SERVER['HTTP_REFERER']);
	
	}
	
	catch(Exception $e){
		
				$success = '<div class="alert alert-danger" role="alert">
  <strong>Попытка удаления записи, к которой привязана запись в другой таблице!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	
	}
	
}

if (isset($_POST['edit-submit'])) {
	
	$fn = $_POST['firstname'];
	$ln = $_POST['lastname'];
	$ig = $_POST['id_group'];
	$id = $_GET['id'];
    if($fn != null && $ln != null && $ig != null) {
        $sqll = "UPDATE student SET firstname='$fn', lastname='$ln', id_group='$ig' WHERE id_student='$id'";
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

?>
