<?php
// DENNIS Web Application
// Main entry point

session_start();

// Include configuration
require_once 'includes/config.php';
require_once 'includes/header.php';

// Simple routing
$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';

// Validate page parameter
$allowed_pages = ['home', 'about', 'contact'];
if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}

// Load the requested page
$page_file = "pages/{$page}.php";
if (file_exists($page_file)) {
    include $page_file;
} else {
    echo '<div class="container"><h1>404 - Page Not Found</h1></div>';
}

require_once 'includes/footer.php';
?>
