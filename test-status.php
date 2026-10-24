<?php
require_once __DIR__ . '/wp-load.php';
header('Content-Type: application/json');
echo json_encode([
    'site_name' => get_bloginfo('name'),
    'site_url' => get_bloginfo('url'),
    'current_theme' => get_stylesheet(),
    'wp_version' => get_bloginfo('version'),
    'php_version' => phpversion(),
]);
