 <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Dashboard</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/style.css" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand add_product" href="/admin/add">Add new product</a>
    <ul class="navbar-nav px-3" style="display: flex">
        <li class="nav-item text-nowrap">
            <span> <?= $_SESSION["first_name"] . " " . $_SESSION["last_name"] ?> </span><br>
            <a class="nav-link" href="/" style="display:inline-block; ">Home</a>
            <a class="nav-link" href="/user/logout" style="display:inline-block;padding-left: 15px;">Sign out</a>
        </li>
    </ul>
</header>