<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Home</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/style.css" rel="stylesheet">

</head>
<body class="d-flex h-100 text-center text-white bg-white">

<div class="container">
    <header class="row">
        <div class="col-3">
            <main class="px-md-3 welcome">
                <h1>Welcome</h1>
            </main><br>
        </div>
        <nav class="nav col-9">
            <div class="nav_body nav-masthead">
                <?php
                if(isset($_SESSION["id"])){
               echo '<ul>' .
                    '<li><a class="nav-link active" aria-current="page" href="/" style="color: #323233">' . "Home" . '</a></li>' .
                    '<li><a class="nav-link" href="/admin" style="color: #323233">' . "Admin" . '</a></li>' .
                    '<li><a class="nav-link" href="/user/logout" style="color: #323233">' . "Sign out" . '</a></li>' .
                '</ul>';
                }else{
                  echo  '<ul>' .
                    '<li><a class="nav-link active" aria-current="page" href="/" style="color: #323233">Home</a></li>' .
                    '<li><a class="nav-link" href="/user/register" style="color: #323233">Register</a></li>' .
                    '<li><a class="nav-link" href="/user/login" style="color: #323233">Sign in</a></li>' .
                '</ul>';
                }
                ?>
            </div>
        </nav>
    </header>
