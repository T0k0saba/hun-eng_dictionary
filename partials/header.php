<?php
include('./config/constants.php');
include('./config/control.php');
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magyar - Angol szótár</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="index.php">Szótár</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Kezdőlap</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="about.php">Rólam</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="contact.php">Kapcsolat</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>