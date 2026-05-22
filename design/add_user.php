
<?php
// session_start();
$errors=$_SESSION['errors']??[];
$old=$_SESSION['old']??[];
unset($_SESSION['errors'],$_SESSION['old']);
?>

<form method="post" action="functions/insert.php">
  <div class="form-group">
    <label for="exampleInputEmail1">username</label>
    <input name="username" value="<?=$old['username']??''?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted  text-danger"><?= $errors['username']??'' ?></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">Email</label>
    <input name="email" value="<?= $old['email']??'' ?>" type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted"><?= $errors['email']??'' ?></small>
  </div>
  <div class="form-group">
  <div class="form-group">
    <label for="exampleInputEmail3">Adresse</label>
    <input name="adresse"  value="<?= $old['adresse']??'' ?>"  type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted"><?= $errors['adresse']??'' ?></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password"  type="password" class="form-control" id="exampleInputPassword1">
        <small id="emailHelp" class="form-text text-muted"><?= $errors['password']??'' ?></small>

  </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1">priv</label>
    <select class="form-control" name="priv" value="" id="exampleFormControlSelect1">
      <option value="0">Admin</option>
      <option value="1">User</option>
    </select>
    
  </div>

  <div class="form-check">
  <input name="gender" class="form-check-input" type="radio" value="0" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Male
  </label>
</div>
<div class="form-check">
  <input name="gender"  class="form-check-input" type="radio" value="1" id="defaultCheck2" >
  <label class="form-check-label" for="defaultCheck2">
    female
  </label>
  
</div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>