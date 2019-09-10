<?php require_once APPROOT . '/views/inc/header.php';?>

<div class="row">
    <div class="col-md-6">
        <h1><?=$data['user']->name?></h1>
    </div>
</div>
<h2>User Posts</h2>
<div class="row">
    <div class="col-md-8 mt-5">
        <?php foreach ($data['posts'] as $post): ?>
            <h3><?=$post->title?></h3>
            <p><?=$post->body?></p>
            <a href="<?= URLROOT ?>/posts/show/<?= $post->id ?>" class="btn btn-primary">Read More</a>
        <?php endforeach; ?>
    </div>
</div>
<?php require_once APPROOT . '/views/inc/footer.php';?>
