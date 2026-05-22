 <?php
$id=$_GET['id'];
include_once "functions/connection.php";
$select="SELECT * FROM products WHERE id=$id";
$query=$conn-> query($select);
$product= $query->fetch_assoc();

?>


<form method="post" action="functions/products/update_pro.php">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
  <div class="form-group" >
    <label for="exampleInputEmail1">productname</label>
    <input name="name" value="<?= $product['name'] ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">Price</label>
    <input name="price" value="<?= $product['price'] ?>" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
  <div class="form-group">
    <label for="exampleInputEmail3">Sale</label>
    <input name="sale" value="<?= $product['sale'] ?>" type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea name="description"  class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $product['description'] ?></textarea>
    
    </div>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Category</label>
    <select class="form-control" name="cat_id" id="exampleFormControlSelect1">
        <?php
        include "functions/connection.php";

        $select="SELECT * FROM category";
        $query=$conn-> query($select);
        foreach($query as $cat){
        ?>
      <option value="<?= $cat['id'] ?>"<?= $cat['id']==$product['cat_id']?'selected':'' ?>><?= $cat['name']; ?></option>
      <?php };?>
    </select>
  </div>


  </div>
<button type="submit" class="btn btn-primary">Submit</button>
</form> 