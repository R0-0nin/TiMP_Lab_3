<?php
include 'config.php';




$success="";
//$name = $_POST['name'];
//$mail = $_POST['mail'];
//$note = $_POST['note'];

if (isset($_POST['submit'])) {
	
	$ids = $_POST['ids'];
	$pn = $_POST['pn'];
	$cn= $_POST['cn'];
	$sqll = "INSERT INTO project(id_student, projectname, versionproject, catalogname) VALUES ('$ids', '$pn', '1.0', '$cn')";
	
	try{	
		
		$pdo->query($sqll);
	
	}
	
	catch(Exception $e){
	
		$success = '<div class="alert alert-danger" role="alert">
  <strong>Такого ID студента не существует!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	
	}

}

// Read

$sql = "SELECT * FROM project";
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
	$sql = "DELETE FROM project WHERE id_project=$id";
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
	
	$pn = $_POST['ProjectName'];
	$vp = $_POST['VersionProject'];
	$cn = $_POST['CatalogName'];
	$id = $_GET['id'];
    if($pn != null && $vp != null && $cn != null) {
        $sqll = "UPDATE project SET projectname='$pn', versionproject='$vp', catalogname='$cn' WHERE id_project='$id'";
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
