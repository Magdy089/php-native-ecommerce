<form method="post" action="functions/products/insert_pro.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">name</label>
    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">price</label>
    <input name="price" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
  <div class="form-group">
    <label for="exampleInputEmail3">Sale</label>
    <input name="sale" type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    
    </div>

</div>
 

  <div class="form-group">
    <label for="exampleFormControlFile1">Img</label>
    <input type="file" name="img[]" multiple class="form-control-file" id="exampleFormControlFile1">
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
      <option value="<?= $cat['id'] ?>"><?= $cat['name']; ?></option>
      <?php };?>
    </select>
  </div>

  
<button type="submit" class="btn btn-primary">Submit</button>
</form>