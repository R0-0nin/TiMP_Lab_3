<?php
include 'func.php';
session_start();

if($_SESSION['user']['user'] == null){
	
	header('Location: ../../Authentication/htmls/index.php');
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AirLogger-UserException</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link rel="stylesheet" href = "index.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col mt-1">
				<?= $success ?>
				<button class="btn btn-success mb-1" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus-circle"></i></button>
				<select onchange = "document.location=this.options[this.selectedIndex].value" name = "tables" id = "tablesid" style = "float:right; margin-top:10px">
					<option value = "none" selected disabled>Select a Table</option>
					<option value = "../Student/index.php">Student</option>
					<option value = "../ReportLabWork/index.php">ReportLabWork</option>
					<option value = "../Project/index.php">Project</option>
				</select>
				<table class="table shadow">
					<thead class="thead-dark">
						<tr>
							<th style="text-align: center; vertical-align: middle;">ID</th>
							<th style="text-align: center; vertical-align: middle;">Message</th>
							<th style="text-align: center; vertical-align: middle;">TargetSite</th>
							<th style="text-align: center; vertical-align: middle;">Date</th>
                            <th style="text-align: center; vertical-align: middle;">IndexForm</th>
							<th style="text-align: center; vertical-align: middle;">Remove</th>
						</tr>
						<?php foreach ($result as $value) { ?>
						<tr>
							<td style="text-align: center; vertical-align: middle;"><?=$value['id'] ?></td>
							<td style="text-align: center; vertical-align: middle;"><?=$value['message'] ?></td>
							<td style="text-align: center; vertical-align: middle;"><?=$value['targetsite'] ?></td>
							<td style="text-align: center; vertical-align: middle;"><?=$value['datetimeexc'] ?></td>
							<td style="text-align: center; vertical-align: middle;"><?=$value['indexform'] ?></td>
							<td style="text-align: center; vertical-align: middle;">
								<!--<a href="?edit=<?=$value['id'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?=$value['id'] ?>"><i class="fa fa-edit"></i></a>-->
								<a href="?delete=<?=$value['id'] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?=$value['id'] ?>"><i class="fa fa-trash"></i></a>
								<?php require 'modal.php'; ?>
							</td>
						</tr> <?php } ?>
					</thead>
				</table>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content shadow">
	      <div class="modal-header">
	        <h5 class="modal-title">Добавить запись</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="" method="post" enctype="multipart/form-data">
					<h6>Выберите путь до log.txt</h6>
					<input type="file" name="loger" id="docpicker" accept="loger.txt">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
	        <button type="submit" name="submit" class="btn btn-primary">Загрузить</button>
	      </div>
	  		</form>
	    </div>
	  </div>
	</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
</body>
</html>