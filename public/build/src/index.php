<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'about':
        require '../../../src/about.php';
        break;
    case 'home':
    default:
        require '../../../src/home.php';
        break;
}
