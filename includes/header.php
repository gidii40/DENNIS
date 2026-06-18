<?php
// Header template
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?> - Web Application</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <a href="index.php"><?php echo APP_NAME; ?></a>
            </div>
            <ul class="navbar-menu">
                <li><a href="index.php?page=home" class="nav-link">Home</a></li>
                <li><a href="index.php?page=about" class="nav-link">About</a></li>
                <li><a href="index.php?page=contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>
    <main class="main-content">
