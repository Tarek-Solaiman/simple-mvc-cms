<?php require_once APPROOT . '/views/inc/header.php';?>

  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="car card-body bg-light mt-5">
          <?php flash('register_success') ?>
        <h2>Login</h2>
        <form action="<?= URLROOT ?>/users/login" method="post">

          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?=!empty($data['email_err'])?'is-invalid':''?>" value="<?=$data['email']?>">
            <span class="invalid-feedback"><?=$data['email_err']?></span>
          </div>

          <div class="form-group">
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?=!empty($data['password_err'])?'is-invalid':''?>" value="<?=$data['password']?>">
            <span class="invalid-feedback"><?=$data['password_err']?></span>
          </div>

          <div class="row">
            <div class="col">
              <button type="submit" class="btn btn-danger btn-block" value="login">Login</button>
            </div>
            <div class="col">
              <a href="<?= URLROOT ?>/users/register" class="btn btn-success btn-block">No Account? Register Here</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require_once APPROOT . '/views/inc/footer.php';?>