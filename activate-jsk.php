<?php
/**
 * Setup and activate Jan Seva Kendra theme and site options
 */
require_once __DIR__ . '/wp-load.php';

header('Content-Type: application/json');

$results = [];

// 1. Switch Theme
switch_theme('jan-seva-kendra');
$results['theme_activated'] = get_stylesheet();

// 2. Update Site Name and Tagline
update_option('blogname', 'जन सेवा केंद्र - ऑनलाइन नागरिक सेवा पोर्टल');
update_option('blogdescription', 'डिजिटल नागरिक एवं ई-डिस्ट्रिक्ट सुविधा केंद्र (CSC Digital Seva Portal)');
$results['site_name'] = get_option('blogname');
$results['site_tagline'] = get_option('blogdescription');

// 3. Set permalink structure for clean SEO URLs
global $wp_rewrite;
$wp_rewrite->set_permalink_structure('/%postname%/');
$wp_rewrite->flush_rules();
$results['permalink_structure'] = get_option('permalink_structure');

// 4. Trigger service seeding
if (function_exists('jsk_seed_default_services_if_empty')) {
    jsk_seed_default_services_if_empty();
}

$services_count = wp_count_posts('jsk_service');
$results['services_count'] = $services_count ? $services_count->publish : 0;

// 5. Ensure front page uses front-page.php
update_option('show_on_front', 'posts');
$results['show_on_front'] = get_option('show_on_front');

echo json_encode([
    'status' => 'success',
    'details' => $results
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
