 <?php
$id=$_GET['id'];
include_once "functions/connection.php";
$select="SELECT * FROM Users WHERE id=$id";
$query=$conn-> query($select);
$user= $query->fetch_assoc();

?>


<form method="post" action="functions/updat.php">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
  <div class="form-group" >
    <label for="exampleInputEmail1">username</label>
    <input name="username" value="<?= $user['username'] ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">Email</label>
    <input name="email" value="<?= $user['Email'] ?>" type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
  <div class="form-group">
    <label for="exampleInputEmail3">Adresse</label>
    <input name="adresse" value="<?= $user['adresse'] ?>" type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1">priv</label>
    <select class="form-control" name="priv" id="exampleFormControlSelect1">
      <option value="0" <?= $user['priv_num']==0?'selected':'' ?>>Admin</option>
      <option value="1" <?= $user['priv_num']==1?'selected':'' ?>>User</option>
    </select>
  </div>

  <div class="form-check">
  <input name="gender" class="form-check-input" type="radio" value="0" id="defaultCheck1"
  <?= $user['rgender']==0?'checked':'' ?>
  >
  <label class="form-check-label" for="defaultCheck1">
    Male
  </label>
</div>
<div class="form-check">
  <input name="gender" class="form-check-input" type="radio" value="1" id="defaultCheck2"
  <?= $user['rgender']==1?'checked':'' ?>
  >
  <label class="form-check-label" for="defaultCheck2">
    female
  </label>
</div></div>
<button type="submit" class="btn btn-primary">Submit</button>
</form> 