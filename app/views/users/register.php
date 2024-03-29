<?php require_once APPROOT . '/views/inc/header.php';?>
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="car card-body bg-light mt-5">
        <h2>Create An Account</h2>
      <form action="<?= URLROOT ?>/users/register" method="post">

        <div class="form-group">
          <label for="name">Name: <sup>*</sup></label>
          <input type="text" name="name" class="form-control form-control-lg <?=!empty($data['name_err'])?'is-invalid':''?>" value="<?=$data['name']?>">
          <span class="invalid-feedback"><?=$data['name_err']?></span>
        </div>

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

        <div class="form-group">
          <label for="confirm_password">Confirm Password: <sup>*</sup></label>
          <input type="password" name="confirm_password" class="form-control form-control-lg <?=!empty($data['confirm_password_err'])?'is-invalid':''?>" value="<?=$data['confirm_password']?>">
          <span class="invalid-feedback"><?=$data['confirm_password_err']?></span>
        </div>

        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-success btn-block" value="register">Register</button>
          </div>
          <div class="col">
            <a href="<?= URLROOT ?>/users/login" class="btn btn-danger btn-block">Already Have An Account? Login Here</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require_once APPROOT . '/views/inc/footer.php';?>