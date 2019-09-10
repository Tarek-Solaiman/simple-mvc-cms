<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
    <a class="navbar-brand" href="<?=URLROOT?>"><?=SITENAME?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?=URLROOT?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=URLROOT?>/pages/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=URLROOT?>/posts">Posts</a>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['user_id'])) : ?>
              <li class="nav-item">
                  <a href="<?=URLROOT?>/users/show/<?= $_SESSION['user_id'] ?>"><p class="navbar-text"><?= $_SESSION['user_name'] ?></p></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?=URLROOT?>/users/logout">Logout</a>
              </li>
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="<?=URLROOT?>/users/register">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=URLROOT?>/users/login">Login</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    </div>
</nav>
<div class="container">
