<?php 
// session_start();
?>

<!-- add_user -->
<a href="?action=add" class="btn btn-primary">Add_User</a>
<br>
<br>

			<form action="functions/multi_delete_user.php" method="post">
				<table class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<th>
								<input type="checkbox" id="checkAll">
							</th>
							<th>ID</th>
							<th>username</th>
							<th>Email</th>
							<th>password</th>
							<th>Adress</th>
							<th>Gender</th>
							<th>Priv</th>
							<th>Date</th>
							<th>Cotrollers</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						include_once "functions/connection.php";
						$select="SELECT * FROM Users";
						$query=$conn-> query($select);
						foreach($query as $user){		
						
						?>
						<tr>
							<td>
								<input type="checkbox" name="ids[]" value="<?= $user['id'] ?>">
							</td>
							<td><?= $user['id'] ?></td>
							<td><?= $user['username'] ?></td>
							<td><?= $user['Email'] ?></td>
							<td><?= $user['password'] ?></td>
							<td><?= $user['adresse'] ?></td>
							<td><?=
							 $user['rgender']==0?'male':'female';	 ?>
							 </td>
							<td><?= $user['priv_num']==0?'Admin' : 'user'; ?></td>
							<td><?= $user['rigister_at'] ?></td>
							<td>
								<?php
								if($_SESSION['user_role']==OWNER){
								?>
								<a href="?action=edit&id=<?= $user['id'] ?>" class="btn btn-primary">Edit</a>


								<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#e<?= $user['id'] ?>">
  Delet
</button>

<!-- Modal -->
<div class="modal fade" id="e<?= $user['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal tittle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure <span class="text text-danger" style="font-weight:bold;"><?= $user['username'] ?></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<a href="functions/delete.php?id=<?=$user['id']?>;" class="btn btn-danger">Confirm</a>

      </div>
    </div>
  </div>
</div>
<?php }; ?>
							</td>
							

						</tr>
						<?php }; ?>
					</tbody>
				</table>
				<button  type="submit" class="btn btn-danger">Select_All</button>
			</form>



			<script>
				let checked=document.getElementById('checkAll');
				checked.addEventListener('click' , function(){
					let checkboxes=document.querySelectorAll('input[name="ids[]"]');
					for(let checkbox of checkboxes){
						checkbox.checked = this.checked;
					}
				})
			</script>