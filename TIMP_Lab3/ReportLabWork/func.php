<?php
include 'config.php';




$success="";
//$name = $_POST['name'];
//$mail = $_POST['mail'];
//$note = $_POST['note'];

if (isset($_POST['submit'])) {
	
	$title = $_POST['title'];
	$idp = $_POST['idp'];
	$ids = $_POST['ids'];
	$daterep = $_POST['daterep'];
	try{
	
	$sqll = "INSERT INTO reportlabwork (titlereportlw, versionprojectlw, id_project, id_student, datereportlw) VALUES ('$title', '1.0', '$idp', '$ids', '$daterep')";
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

$sql = "SELECT * FROM reportlabwork";
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
	$sql = "DELETE FROM reportlabwork WHERE id_reportlw=$id";
	$pdo->query($sql);
	header('Location: '. $_SERVER['HTTP_REFERER']);
	
}
