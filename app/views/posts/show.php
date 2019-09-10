<?php require_once APPROOT . '/views/inc/header.php';?>
<?php flash('post_message'); ?>
  <a class="btn btn-primary" href="<?= URLROOT ?>/posts"><i class="fa fa-backward"></i> Back</a>
      <br>
      <h1><?=$data['post']->title?></h1>
      <p>Written By: <a href="<?= URLROOT ?>/users/show/<?=$data['post']->userId?>"><?=$data['post']->name?></a> On: <?=$data['post']->created_at?></p>
      <p><?=$data['post']->body?></p>
      <br>
      <?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
        <hr>
      <a href="<?= URLROOT ?>/posts/edit/<?= $data['post']->postId ?>" class="btn btn-success">Edit</a>
        <form class="pull-right" action="<?= URLROOT ?>/posts/delete/<?= $data['post']->postId ?>" method="post">
      <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      <?php endif; ?>
<?php require_once APPROOT . '/views/inc/footer.php';?>
