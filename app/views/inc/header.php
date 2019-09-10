<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=SITENAME?> | <?=!empty($_SESSION['user_name'])?$_SESSION['user_name']:'Welcome'?></title>
    <link rel="stylesheet" href="<?=URLROOT?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?=URLROOT?>/css/font-awesome.css">
</head>
<body>
<?php require_once APPROOT . '/views/inc/menu.php';?>