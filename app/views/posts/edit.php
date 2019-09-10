<?php require_once APPROOT . '/views/inc/header.php';?>
    <a class="btn btn-primary" href="<?= URLROOT ?>/posts/show/<?=$data['id']?>"><i class="fa fa-backward"></i> Back</a>
  <div class="row">
    <div class="col-md-6 mx-auto">
        <h1 class="h1">Edit Post: <?=$data['title']?></h1>
        <form action="<?= URLROOT ?>/posts/edit/<?=$data['id']?>" method="post">
          <div class="form-group">
            <label for="title">Title: <sup>*</sup></label>
            <input type="text" name="title" class="form-control form-control-lg <?=!empty($data['title_err'])?'is-invalid':''?>" value="<?=$data['title']?>">
            <span class="invalid-feedback"><?=$data['title_err']?></span>

          </div>

          <div class="form-group">
            <label for="body">Body: <sup>*</sup></label>
            <textarea class="form-control form-control-lg <?=!empty($data['body_err'])?'is-invalid':''?>" name="body"><?=$data['body']?></textarea>
            <span class="invalid-feedback"><?=$data['body_err']?></span>
          </div>

          <div class="row">
            <div class="col">
              <button type="submit" class="btn btn-success" value="edit">Update Post</button>
            </div>
          </div>
        </form>
      </div>
    </div>


<?php require_once APPROOT . '/views/inc/footer.php';?>