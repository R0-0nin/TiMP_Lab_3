

<!-- Modal Edit-->

<!--
<div class="modal fade" id="editModal<?=$value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Редактировать запись № <?=$value['id'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?id=<?=$value['id'] ?>" method="POST">
        	<div class="form-group">
        		<input type="text" class="form-control" name="Message" value="<?=$value['message'] ?>" placeholder="Message">
        	</div>
        	<div class="form-group">
        		<input type="text" class="form-control" name="TargetSite" value="<?=$value['targetsite'] ?>" placeholder="TargetSite">
        	</div>
        	<div class="form-group">
        		<input type="text" class="form-control" name="date" value="<?=$value['datetimeexc'] ?>" placeholder="Date">
        	</div>
			        	<div class="form-group">
        		<input type="text" class="form-control" name="indexForm" value="<?=$value['indexform'] ?>" placeholder="IndexForm">
        	</div>
        	<div class="modal-footer">
        		<button type="submit" name="edit-submit" class="btn btn-primary">Обновить</button>
        	</div>
        </form>
      </div>
    </div>
  </div>
</div>
-->
<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal<?=$value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Удалить запись № <?=$value['id'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
        <form action="?id=<?=$value['id'] ?>" method="post">
        	<button type="submit" name="delete_submit" class="btn btn-danger">Удалить</button>
    	</form>
      </div>
    </div>
  </div>
</div>
