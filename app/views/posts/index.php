<?php require_once APPROOT . '/views/inc/header.php';?>
    <?php flash('post_message'); ?>

    <div class="row">
    <div class="col-md-6">
        <h1>All Posts</h1>
    </div>
    <div class="col-md-6">
        <a href="<?= URLROOT ?>/posts/create" class="btn btn-primary pull-right"><i class="fa fa-pencil-square-o"></i> Create New Post</a>
    </div>
    </div>
    <div class="row">
        <div class="col-md-8 mt-5">
            <?php foreach ($data['posts'] as $post): ?>
                <h3><?=$post->title?></h3>
                <p><?=$post->body?></p>
                <p>Written By: <a href="<?= URLROOT ?>/users/show/<?=$post->userId?>"><?=$post->name?></a> On: <?=$post->created_at?></p>
                <a href="<?= URLROOT ?>/posts/show/<?= $post->postId ?>" class="btn btn-primary">Read More</a>
            <?php endforeach; ?>
        </div>
    </div>
<?php require_once APPROOT . '/views/inc/footer.php';?>
