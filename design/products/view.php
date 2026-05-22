<?php
include_once "functions/connection.php";

$limit = 7;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

/* عدد المنتجات */
$count_sql = "SELECT COUNT(*) AS total FROM products";
$count_query = $conn->query($count_sql);
$total_row = $count_query->fetch_assoc();
$total_pages = ceil($total_row['total'] / $limit);

/* المنتجات */
$select = "SELECT * FROM products LIMIT $limit OFFSET $offset";
$query = $conn->query($select);
?>


<!-- add_product -->
<a href="?action=add" class="btn btn-primary">Add_product</a>
<br>
<br>
			<form action="functions/products/multi_delete.php" method="post">
				<table class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<th>
								<input type="checkbox" id="checkAll">
							</th>
							<th>ID</th>
							<th>name</th>
							<th>price</th>
							<th>Sale</th>
							<th>Img</th>
							<th>descreption</th>
							<th>Category</th>
							<th>Cotrollers</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						// include_once "functions/connection.php";
						// $select="SELECT * FROM products";
						// $query=$conn-> query($select);
						foreach($query as $product){		
						
						?>
						<tr>
							<td>
								<input type="checkbox" name="ids[]" value="<?= $product['id'] ?>">
							</td>
							<td><?= $product['id'] ?></td>
							<td><?= $product['name'] ?></td>
							<td><?= $product['price'] ?></td>
							<td><?= $product['sale'] ?></td>
							<td>
								<?php
								$product_id=$product['id'];
								$select_img="SELECT * FROM images WHERE product_id=$product_id";
								$query_img=$conn-> query($select_img);
								foreach($query_img as $img){
								
								?>
								<img src="imgs/<?= $img['name'] ?>" alt="">
								<?php }; ?>
							</td>
							<td><?= $product['description'] ?></td>
							<td><?php 
							$cat_id=$product['cat_id'];
							$select_cat="SELECT name FROM category WHERE id=$cat_id";
							$query_pro=$conn-> query($select_cat);
							$category= $query_pro-> fetch_assoc();
							echo $category['name'];
							
							 ?>
							
							</td>
							
							<td>
								<a href="?action=edit&id=<?=$product['id']?>" class="btn btn-primary">Edit</a>


								<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#e<?= $product['id'] ?>">
  Delet
</button>

<!-- Modal -->
<div class="modal fade" id="e<?= $product['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal tittle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure <span class="text text-danger" style="font-weight:bold;"><?= $product['name'] ?></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<a href="functions/products/pro_delete.php?id=<?=$product['id']?>;" class="btn btn-danger">Confirm</a>

      </div>
    </div>
  </div>
</div>
							</td>
							

						</tr>
						<?php }; ?>
					</tbody>
				</table>
				<button type="submit" class="btn btn-danger">Delete_Select</button>
			</form>

			<script>
				let checked = document.getElementById('checkAll');

  checked.addEventListener('click', function () {
    let checkboxes = document.querySelectorAll('input[name="ids[]"]');
    
    for (let checkbox of checkboxes) {
      checkbox.checked = this.checked;
    }
  });
			</script>

			<nav aria-label="Page navigation example">
  <ul class="pagination">

    <?php if($page > 1): ?>
      <li class="page-item">
        <a class="page-link" href="?page=<?= $page-1 ?>">Previous</a>
      </li>
    <?php endif; ?>

    <?php for($i = 1; $i <= $total_pages; $i++): ?>
      <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>

    <?php if($page < $total_pages): ?>
      <li class="page-item">
        <a class="page-link" href="?page=<?= $page+1 ?>">Next</a>
      </li>
    <?php endif; ?>

  </ul>
</nav>