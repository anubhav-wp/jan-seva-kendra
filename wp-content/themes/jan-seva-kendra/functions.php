<?php
/**
 * Jan Seva Kendra - Ultra High-Performance Theme Functions
 * Optimized for high-concurrency, zero 3rd-party dependencies, Hindi frontend
 *
 * @package JanSevaKendra
 */

if (!defined('ABSPATH')) {
    exit;
}

define('JSK_VERSION', '1.0.0');
define('JSK_THEME_DIR', get_template_directory());
define('JSK_THEME_URI', get_template_directory_uri());

/* ==========================================================================
   1. PERFORMANCE & HEAD CLEANUP (High Traffic Optimization)
   ========================================================================== */

function jsk_cleanup_head() {
    // Disable core emojis
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', function($plugins) {
        return is_array($plugins) ? array_diff($plugins, ['wpemoji']) : [];
    });

    // Remove core header bloat
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('template_redirect', 'rest_output_link_header', 11);

    // Disable XML-RPC for high security and server load protection
    add_filter('xmlrpc_enabled', '__return_false');
}
add_action('init', 'jsk_cleanup_head');

// Remove global SVG filters & classic theme styles to eliminate render-blocking CSS
add_action('wp_enqueue_scripts', function() {
    wp_dequeue_style('global-styles');
    wp_dequeue_style('classic-theme-styles');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}, 100);

// Add security and caching headers
add_action('send_headers', function() {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }
});

/* ==========================================================================
   2. THEME SUPPORT & ASSET ENQUEUEING
   ========================================================================== */

function jsk_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    load_theme_textdomain('jan-seva-kendra', JSK_THEME_DIR . '/languages');
}
add_action('after_setup_theme', 'jsk_theme_setup');

function jsk_enqueue_assets() {
    // Preconnect to Google Fonts
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">' . "\n";

    // Main Optimized Stylesheet
    wp_enqueue_style(
        'jsk-main',
        JSK_THEME_URI . '/assets/css/main.css',
        [],
        JSK_VERSION
    );

    // Main Optimized Vanilla JS
    wp_enqueue_script(
        'jsk-main-js',
        JSK_THEME_URI . '/assets/js/main.js',
        [],
        JSK_VERSION,
        true // in footer
    );

    // Pass REST API config and Nonce to JavaScript
    wp_localize_script('jsk-main-js', 'JSK_APP', [
        'rest_url' => esc_url_raw(rest_url('jsk/v1/')),
        'nonce'    => wp_create_nonce('wp_rest'),
        'site_url' => esc_url(home_url('/')),
        'whatsapp' => '919876543210', // Default center phone
        'center_name' => 'जन सेवा केंद्र (CSC Digital Seva Portal)',
    ]);
}
add_action('wp_enqueue_scripts', 'jsk_enqueue_assets');

// Add async / defer to custom script for zero render-blocking
add_filter('script_loader_tag', function($tag, $handle) {
    if ('jsk-main-js' === $handle) {
        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}, 10, 2);

/* ==========================================================================
   3. CUSTOM POST TYPES FOR CITIZEN SERVICES & APPLICATIONS
   ========================================================================== */

function jsk_register_cpts() {
    // 1. Citizen Services (सेवाएं)
    register_post_type('jsk_service', [
        'labels' => [
            'name'               => 'सेवाएं (Services)',
            'singular_name'      => 'सेवा',
            'add_new'            => 'नई सेवा जोड़ें',
            'add_new_item'       => 'नई नागरिक सेवा जोड़ें',
            'edit_item'          => 'सेवा संपादित करें',
            'all_items'          => 'सभी नागरिक सेवाएं',
        ],
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'services'],
        'supports'           => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
        'menu_icon'          => 'dashicons-id-alt',
        'show_in_rest'       => true,
    ]);

    // Service Categories Taxonomy (श्रेणी)
    register_taxonomy('jsk_service_cat', 'jsk_service', [
        'labels' => [
            'name'          => 'सेवा श्रेणियां (Categories)',
            'singular_name' => 'सेवा श्रेणी',
        ],
        'hierarchical'      => true,
        'public'            => true,
        'rewrite'           => ['slug' => 'service-category'],
        'show_in_rest'      => true,
    ]);

    // 2. Citizen Applications (ऑनलाइन आवेदन अनुरोध)
    register_post_type('jsk_application', [
        'labels' => [
            'name'               => 'आवेदन (Applications)',
            'singular_name'      => 'आवेदन',
            'all_items'          => 'सभी आवेदन',
            'edit_item'          => 'आवेदन विवरण',
        ],
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'supports'           => ['title', 'custom-fields'],
        'menu_icon'          => 'dashicons-clipboard',
    ]);
}
add_action('init', 'jsk_register_cpts');

/* ==========================================================================
   4. HIGH-PERFORMANCE REST API ENDPOINTS
   ========================================================================== */

add_action('rest_api_init', function () {
    // 1. Submit Online Application
    register_rest_route('jsk/v1', '/apply', [
        'methods'             => 'POST',
        'callback'            => 'jsk_handle_application_submission',
        'permission_callback' => '__return_true',
    ]);

    // 2. Track Application Status
    register_rest_route('jsk/v1', '/track', [
        'methods'             => 'GET',
        'callback'            => 'jsk_handle_application_tracking',
        'permission_callback' => '__return_true',
    ]);

    // 3. Quick Services List (Cached)
    register_rest_route('jsk/v1', '/services', [
        'methods'             => 'GET',
        'callback'            => 'jsk_get_cached_services',
        'permission_callback' => '__return_true',
    ]);
});

/**
 * Handle citizen application request submission
 */
function jsk_handle_application_submission($request) {
    $params = $request->get_json_params();
    if (empty($params)) {
        $params = $request->get_params();
    }

    $name         = sanitize_text_field($params['name'] ?? '');
    $mobile       = sanitize_text_field($params['mobile'] ?? '');
    $service_id   = intval($params['service_id'] ?? 0);
    $service_name = sanitize_text_field($params['service_name'] ?? '');
    $village_city = sanitize_text_field($params['village_city'] ?? '');
    $district     = sanitize_text_field($params['district'] ?? '');
    $aadhaar_last = sanitize_text_field($params['aadhaar_last'] ?? '');
    $notes        = sanitize_textarea_field($params['notes'] ?? '');

    // Validation
    if (empty($name) || strlen($name) < 3) {
        return new WP_REST_Response([
            'success' => false,
            'message' => 'कृपया अपना पूरा नाम सही दर्ज करें।'
        ], 400);
    }

    if (!preg_match('/^[6-9]\d{9}$/', $mobile)) {
        return new WP_REST_Response([
            'success' => false,
            'message' => 'कृपया 10 अंकों का वैध भारतीय मोबाइल नंबर दर्ज करें।'
        ], 400);
    }

    // Rate Limiting via Transient to prevent spam/abuse
    $client_ip = sanitize_text_field($_SERVER['REMOTE_ADDR'] ?? '0.0.0.0');
    $rate_key = 'jsk_rate_' . md5($client_ip);
    $submissions = get_transient($rate_key) ?: 0;
    if ($submissions >= 15) {
        return new WP_REST_Response([
            'success' => false,
            'message' => 'आपने कुछ ही समय में कई आवेदन सबमिट किए हैं। कृपया 10 मिनट बाद पुनः प्रयास करें।'
        ], 429);
    }
    set_transient($rate_key, $submissions + 1, 600); // 10 minutes lock

    // Generate Unique Tracking Reference: JSK-YYYY-XXXXX
    $year = date('Y');
    $rand = strtoupper(wp_generate_password(5, false, false));
    $tracking_id = "JSK-{$year}-{$rand}";

    // If service_name is empty, get from service_id
    if (empty($service_name) && $service_id > 0) {
        $service_post = get_post($service_id);
        if ($service_post) {
            $service_name = $service_post->post_title;
        }
    }
    if (empty($service_name)) {
        $service_name = 'सामान्य नागरिक सेवा';
    }

    // Insert as Application post
    $post_id = wp_insert_post([
        'post_title'   => $tracking_id,
        'post_status'  => 'publish',
        'post_type'    => 'jsk_application',
        'post_content' => "आवेदक का नाम: {$name}\nमोबाइल: {$mobile}\nसेवा: {$service_name}\nग्राम/शहर: {$village_city}\nजिला: {$district}\nटिप्पणी: {$notes}",
    ]);

    if (is_wp_error($post_id)) {
        return new WP_REST_Response([
            'success' => false,
            'message' => 'सर्वर पर आवेदन दर्ज करने में समस्या आई। कृपया पुनः प्रयास करें।'
        ], 500);
    }

    // Save metadata
    update_post_meta($post_id, '_jsk_tracking_id', $tracking_id);
    update_post_meta($post_id, '_jsk_name', $name);
    update_post_meta($post_id, '_jsk_mobile', $mobile);
    update_post_meta($post_id, '_jsk_service_id', $service_id);
    update_post_meta($post_id, '_jsk_service_name', $service_name);
    update_post_meta($post_id, '_jsk_village_city', $village_city);
    update_post_meta($post_id, '_jsk_district', $district);
    update_post_meta($post_id, '_jsk_aadhaar_last', $aadhaar_last);
    update_post_meta($post_id, '_jsk_status', 'submitted'); // submitted, verified, in_progress, completed, rejected
    update_post_meta($post_id, '_jsk_submission_time', current_time('mysql'));

    return new WP_REST_Response([
        'success'       => true,
        'message'       => 'आपका आवेदन सफलतापूर्वक दर्ज कर लिया गया है।',
        'tracking_id'   => $tracking_id,
        'applicant_name'=> $name,
        'service_name'  => $service_name,
        'mobile'        => $mobile,
        'date'          => wp_date('d M Y, h:i A'),
        'est_time'      => '1 से 3 कार्य दिवस',
    ], 200);
}

/**
 * Handle application tracking status lookup
 */
function jsk_handle_application_tracking($request) {
    $ref = sanitize_text_field($request->get_param('ref') ?? '');

    if (empty($ref)) {
        return new WP_REST_Response([
            'success' => false,
            'message' => 'कृपया अपना आवेदन संदर्भ नंबर (उदा. JSK-2026-XXXXX) या मोबाइल नंबर दर्ज करें।'
        ], 400);
    }

    $ref = trim($ref);

    // Query application
    global $wpdb;
    $post_id = 0;

    // Check by tracking ID (post_title is indexed in wp_posts)
    $post = $wpdb->get_row($wpdb->prepare(
        "SELECT ID, post_title, post_date FROM {$wpdb->posts} WHERE post_title = %s AND post_type = 'jsk_application' LIMIT 1",
        $ref
    ));

    // If not found by tracking ID, search by mobile
    if (!$post && preg_match('/^[6-9]\d{9}$/', $ref)) {
        $meta_match = $wpdb->get_row($wpdb->prepare(
            "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_jsk_mobile' AND meta_value = %s ORDER BY post_id DESC LIMIT 1",
            $ref
        ));
        if ($meta_match) {
            $post = get_post($meta_match->post_id);
        }
    }

    if (!$post) {
        return new WP_REST_Response([
            'success' => false,
            'message' => 'इस संदर्भ नंबर या मोबाइल से कोई आवेदन प्राप्त नहीं हुआ। कृपया नंबर पुनः जांचें या केंद्र पर संपर्क करें।'
        ], 404);
    }

    $post_id = $post->ID;
    $tracking_id  = get_post_meta($post_id, '_jsk_tracking_id', true) ?: $post->post_title;
    $name         = get_post_meta($post_id, '_jsk_name', true) ?: 'नागरिक';
    $service_name = get_post_meta($post_id, '_jsk_service_name', true) ?: 'जन सेवा';
    $status       = get_post_meta($post_id, '_jsk_status', true) ?: 'submitted';
    $submission_time = get_post_meta($post_id, '_jsk_submission_time', true) ?: $post->post_date;

    $status_map = [
        'submitted'   => ['text' => 'आवेदन प्राप्त हुआ (सबमिट)', 'step' => 1, 'badge' => 'status-blue'],
        'verified'    => ['text' => 'दस्तावेज सत्यापन पूर्ण', 'step' => 2, 'badge' => 'status-amber'],
        'in_progress' => ['text' => 'सरकारी पोर्टल पर प्रक्रियाधीन', 'step' => 3, 'badge' => 'status-purple'],
        'completed'   => ['text' => 'सेवा स्वीकृत एवं प्रमाण पत्र तैयार', 'step' => 4, 'badge' => 'status-green'],
        'rejected'    => ['text' => 'आवेदन अस्वीकृत (त्रुटि सुधार आवश्यक)', 'step' => 0, 'badge' => 'status-red'],
    ];

    $current_status_info = $status_map[$status] ?? $status_map['submitted'];

    // Timeline steps
    $timeline = [
        [
            'title' => 'आवेदन पंजीकरण',
            'desc'  => 'ऑनलाइन अनुरोध सफलतापूर्वक दर्ज हुआ',
            'date'  => date('d M Y, h:i A', strtotime($submission_time)),
            'done'  => true,
            'step'  => 1
        ],
        [
            'title' => 'दस्तावेज सत्यापन',
            'desc'  => 'जन सेवा केंद्र वीएलई (VLE) द्वारा जांच',
            'date'  => in_array($status, ['verified', 'in_progress', 'completed']) ? 'सत्यापित' : 'प्रतीक्षारत',
            'done'  => in_array($status, ['verified', 'in_progress', 'completed']),
            'step'  => 2
        ],
        [
            'title' => 'विभागीय प्रक्रिया',
            'desc'  => 'सरकारी ई-डिस्ट्रिक्ट / संबंधित पोर्टल पर प्रेषित',
            'date'  => in_array($status, ['in_progress', 'completed']) ? 'प्रक्रियाधीन' : 'प्रतीक्षारत',
            'done'  => in_array($status, ['in_progress', 'completed']),
            'step'  => 3
        ],
        [
            'title' => 'स्वीकृति एवं वितरण',
            'desc'  => 'प्रमाण पत्र / रसीद डाउनलोड या केंद्र से प्राप्त करें',
            'date'  => 'completed' === $status ? 'तैयार' : 'प्रतीक्षारत',
            'done'  => 'completed' === $status,
            'step'  => 4
        ]
    ];

    return new WP_REST_Response([
        'success'      => true,
        'tracking_id'  => $tracking_id,
        'applicant'    => $name,
        'service'      => $service_name,
        'status'       => $status,
        'status_text'  => $current_status_info['text'],
        'badge'        => $current_status_info['badge'],
        'current_step' => $current_status_info['step'],
        'timeline'     => $timeline,
        'support_phone'=> '919876543210'
    ], 200);
}

/**
 * Get all services cached via WordPress Transients (High Traffic Performance)
 */
function jsk_get_cached_services() {
    $cached = get_transient('jsk_all_services_cache');
    if (false !== $cached && is_array($cached)) {
        return new WP_REST_Response($cached, 200);
    }

    $services_data = jsk_fetch_and_format_services();
    set_transient('jsk_all_services_cache', $services_data, 12 * HOUR_IN_SECONDS);

    return new WP_REST_Response($services_data, 200);
}

/**
 * Clear cache on service post update
 */
add_action('save_post_jsk_service', function() {
    delete_transient('jsk_all_services_cache');
});

/**
 * Helper to fetch services
 */
function jsk_fetch_and_format_services() {
    $query = new WP_Query([
        'post_type'      => 'jsk_service',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'no_found_rows'  => true,
        'orderby'        => 'menu_order title',
        'order'          => 'ASC',
    ]);

    $services = [];
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $id = get_the_ID();
            $terms = get_the_terms($id, 'jsk_service_cat');
            $cat_slug = ($terms && !is_wp_error($terms)) ? $terms[0]->slug : 'general';
            $cat_name = ($terms && !is_wp_error($terms)) ? $terms[0]->name : 'सामान्य सेवाएं';

            $services[] = [
                'id'          => $id,
                'title'       => get_the_title(),
                'excerpt'     => get_the_excerpt() ?: wp_trim_words(get_the_content(), 18),
                'category'    => $cat_slug,
                'cat_name'    => $cat_name,
                'documents'   => get_post_meta($id, '_jsk_docs', true) ?: 'आधार कार्ड, पासपोर्ट फोटो, मोबाइल नंबर',
                'fee'         => get_post_meta($id, '_jsk_fee', true) ?: '₹50 सरकारी + सेवा शुल्क',
                'time'        => get_post_meta($id, '_jsk_time', true) ?: '2 से 5 कार्य दिवस',
                'icon'        => get_post_meta($id, '_jsk_icon', true) ?: 'document',
                'badge'       => get_post_meta($id, '_jsk_badge', true) ?: 'लोकप्रिय',
                'permalink'   => get_permalink($id),
            ];
        }
        wp_reset_postdata();
    }
    return $services;
}

/* ==========================================================================
   5. AUTO-SEEDING CORE CITIZEN SERVICES (Instant Out-Of-The-Box Content)
   ========================================================================== */

function jsk_seed_default_services_if_empty() {
    $seeded = get_option('jsk_default_services_seeded_v1');
    if ($seeded) {
        return;
    }

    $count = wp_count_posts('jsk_service');
    if ($count && $count->publish > 0) {
        update_option('jsk_default_services_seeded_v1', 1);
        return;
    }

    // Categories to create
    $categories = [
        'identity'    => 'पहचान एवं नागरिक पत्र (ID & Documents)',
        'certificate' => 'आय, जाति व निवास प्रमाण पत्र (Certificates)',
        'schemes'     => 'सरकारी योजनाएं एवं पेंशन (Schemes & Pensions)',
        'banking'     => 'बैंकिंग, AEPS एवं बीमा (Banking & Insurance)',
        'utility'     => 'बिल भुगतान एवं रिचार्ज (Bills & Utility)',
        'education'   => 'भर्ती, परीक्षा व छात्रवृत्ति (Jobs & Admission)',
    ];

    $cat_ids = [];
    foreach ($categories as $slug => $name) {
        $term = term_exists($name, 'jsk_service_cat');
        if (!$term) {
            $created = wp_insert_term($name, 'jsk_service_cat', ['slug' => $slug]);
            $cat_ids[$slug] = !is_wp_error($created) ? $created['term_id'] : 0;
        } else {
            $cat_ids[$slug] = is_array($term) ? $term['term_id'] : $term;
        }
    }

    // Comprehensive list of Jan Seva Kendra services in authentic Hindi
    $default_services = [
        // 1. Identity & Documents
        [
            'title'     => 'आधार कार्ड सेवाएं (Aadhaar Update & PVC)',
            'cat'       => 'identity',
            'desc'      => 'आधार कार्ड में नाम, जन्मतिथि, पता, मोबाइल नंबर सुधार, बायोमेट्रिक अपडेट एवं सुरक्षित पीवीसी कार्ड ऑनलाइन ऑर्डर करें।',
            'docs'      => 'पुराना आधार कार्ड, पहचान प्रमाण, निवास प्रमाण, लिंक मोबाइल नंबर',
            'fee'       => '₹50 सरकारी शुल्क',
            'time'      => '3 से 7 कार्य दिवस',
            'icon'      => 'fingerprint',
            'badge'     => 'अति आवश्यक',
        ],
        [
            'title'     => 'नया पैन कार्ड एवं सुधार (PAN Card NSDL/UTI)',
            'cat'       => 'identity',
            'desc'      => 'नया पैन कार्ड (Form 49A), खोए हुए पैन की री-प्रिंट, नाम/पिता के नाम में संशोधन, और तत्काल 2 घंटे में ई-पैन जनरेट करें।',
            'docs'      => 'आधार कार्ड, 2 पासपोर्ट फोटो, हस्ताक्षर, मोबाइल नंबर',
            'fee'       => '₹107 सरकारी + सेवा शुल्क',
            'time'      => '3 से 5 कार्य दिवस',
            'icon'      => 'credit-card',
            'badge'     => 'लोकप्रिय',
        ],
        [
            'title'     => 'मतदाता पहचान पत्र (Voter ID Card NVSP)',
            'cat'       => 'identity',
            'desc'      => 'नया वोटर आईडी कार्ड ऑनलाइन आवेदन (Form 6), वोटर लिस्ट में नाम जोड़ना, पता बदलना (Form 8) एवं डिजिटल ई-एपिक डाउनलोड।',
            'docs'      => 'आधार कार्ड, पासपोर्ट साइज फोटो, आयु प्रमाण पत्र',
            'fee'       => 'निशुल्क सरकारी + ₹40 सेवा शुल्क',
            'time'      => '7 से 15 कार्य दिवस',
            'icon'      => 'user-check',
            'badge'     => 'सरकारी',
        ],
        [
            'title'     => 'पासपोर्ट ऑनलाइन आवेदन (Passport Seva)',
            'cat'       => 'identity',
            'desc'      => 'सामान्य व तत्काल पासपोर्ट ऑनलाइन फॉर्म, अपॉइंटमेंट स्लॉट बुकिंग, दस्तावेज सत्यापन तैयारी एवं पुलिस वेरिफिकेशन सहायता।',
            'docs'      => 'आधार कार्ड, पैन कार्ड, 10वीं मार्कशीट/जन्म प्रमाण, बैंक पासबुक',
            'fee'       => '₹1500 सरकारी + केंद्र शुल्क',
            'time'      => '15 से 20 कार्य दिवस',
            'icon'      => 'globe',
            'badge'     => 'प्रीमियम',
        ],

        // 2. Certificates
        [
            'title'     => 'आय प्रमाण पत्र (Income Certificate e-District)',
            'cat'       => 'certificate',
            'desc'      => 'छात्रवृत्ति, सरकारी नौकरी, राशन कार्ड व योजनाओं के लिए आधिकारिक डिजिटल हस्ताक्षरित आय प्रमाण पत्र आवेदन।',
            'docs'      => 'स्वप्रमाणित घोषणा पत्र, आधार कार्ड, वेतन पर्ची/खतौनी, फोटो',
            'fee'       => '₹30 सरकारी + ₹30 केंद्र शुल्क',
            'time'      => '4 से 7 कार्य दिवस',
            'icon'      => 'file-text',
            'badge'     => 'सबसे लोकप्रिय',
        ],
        [
            'title'     => 'जाति प्रमाण पत्र (Caste Certificate SC/ST/OBC/EWS)',
            'cat'       => 'certificate',
            'desc'      => 'अनुसूचित जाति, जनजाति, अन्य पिछड़ा वर्ग एवं आर्थिक रूप से कमजोर वर्ग (EWS) हेतु वैध डिजिटल जाति प्रमाण पत्र।',
            'docs'      => 'आधार कार्ड, स्वप्रमाणित घोषणा पत्र, परिवार की खतौनी/जाति रिकॉर्ड, फोटो',
            'fee'       => '₹30 सरकारी + ₹30 केंद्र शुल्क',
            'time'      => '5 से 8 कार्य दिवस',
            'icon'      => 'shield-check',
            'badge'     => 'आवश्यक',
        ],
        [
            'title'     => 'मूल निवास प्रमाण पत्र (Domicile / Resident)',
            'cat'       => 'certificate',
            'desc'      => 'राज्य का स्थाई निवासी होने का डिजिटल प्रमाण पत्र। स्कूल, कॉलेज, भर्ती एवं सरकारी योजनाओं के लिए मान्य।',
            'docs'      => 'आधार कार्ड, बिजली का बिल/राशन कार्ड, मतदाता पहचान पत्र, फोटो',
            'fee'       => '₹30 सरकारी + ₹30 केंद्र शुल्क',
            'time'      => '4 से 7 कार्य दिवस',
            'icon'      => 'home',
            'badge'     => 'लोकप्रिय',
        ],
        [
            'title'     => 'जन्म एवं मृत्यु प्रमाण पत्र (Birth & Death Registration)',
            'cat'       => 'certificate',
            'desc'      => 'सीआरएस (CRS) पोर्टल द्वारा नगर निगम व ग्राम पंचायत स्तर पर अधिकृत जन्म एवं मृत्यु प्रमाण पत्र ऑनलाइन पंजीकरण व प्रिंट।',
            'docs'      => 'अस्पताल पर्ची/डिस्चार्ज कार्ड, माता-पिता का आधार कार्ड, शपथ पत्र',
            'fee'       => '₹50 सरकारी + सेवा शुल्क',
            'time'      => '7 से 12 कार्य दिवस',
            'icon'      => 'award',
            'badge'     => 'डिजिटल',
        ],
        [
            'title'     => 'खतौनी नकल एवं भूलेख (Land Records / Bhulekh)',
            'cat'       => 'certificate',
            'desc'      => 'खेत व जमीन की डिजिटल प्रमाणित खतौनी, भू-नक्शा, गाटा संख्या जांच एवं किसान ऋण मोचन संबंधी दस्तावेज तुरंत प्राप्त करें।',
            'docs'      => 'गाटा संख्या, खाता संख्या या काश्तकार का नाम',
            'fee'       => '₹15 प्रति खतौनी',
            'time'      => 'तत्काल 5 मिनट में',
            'icon'      => 'map',
            'badge'     => 'तत्काल',
        ],

        // 3. Schemes & Pensions
        [
            'title'     => 'पीएम किसान सम्मान निधि (PM Kisan Samman Nidhi)',
            'cat'       => 'schemes',
            'desc'      => '₹6000 वार्षिक सहायता हेतु नया किसान पंजीकरण, बायोमेट्रिक ई-केवाईसी (e-KYC), बैंक आधार सीडिंग एवं किस्त स्टेटस जांच।',
            'docs'      => 'आधार कार्ड, जमीन की खतौनी, बैंक पासबुक, लिंक मोबाइल',
            'fee'       => 'निशुल्क सरकारी + ₹30 ई-केवाईसी शुल्क',
            'time'      => 'तत्काल ई-केवाईसी',
            'icon'      => 'sprout',
            'badge'     => 'किसान हित',
        ],
        [
            'title'     => 'वृद्धावस्था / विधवा / दिव्यांग पेंशन (Social Pension)',
            'cat'       => 'schemes',
            'desc'      => 'समाज कल्याण विभाग द्वारा प्रतिमाह ₹1000 पेंशन योजना का नया ऑनलाइन आवेदन, बैंक खाता सत्यापन एवं सालाना जीवन प्रमाण पत्र।',
            'docs'      => 'आधार कार्ड, आय प्रमाण पत्र, बैंक पासबुक, आयु प्रमाण, विकलांगता प्रमाण पत्र (यदि लागू हो)',
            'fee'       => 'निशुल्क सरकारी + ₹50 आवेदन शुल्क',
            'time'      => '10 से 20 कार्य दिवस',
            'icon'      => 'heart',
            'badge'     => 'कल्याणकारी',
        ],
        [
            'title'     => 'आयुष्मान भारत कार्ड (Ayushman Golden Card - ₹5 लाख मुफ्त इलाज)',
            'cat'       => 'schemes',
            'desc'      => 'प्रतिवर्ष ₹5 लाख तक का निशुल्क इलाज कराने हेतु आयुष्मान भारत गोल्डन कार्ड में नाम खोजना, ई-केवाईसी और कार्ड डाउनलोड।',
            'docs'      => 'राशन कार्ड, आधार कार्ड, परिवार आईडी, मोबाइल नंबर',
            'fee'       => 'निशुल्क सरकारी + ₹20 पीवीसी प्रिंट',
            'time'      => 'तत्काल 10 मिनट में',
            'icon'      => 'activity',
            'badge'     => 'स्वास्थ्य',
        ],
        [
            'title'     => 'ई-श्रम कार्ड पंजीकरण (e-Shram Card / Shramik)',
            'cat'       => 'schemes',
            'desc'      => 'असंगठित क्षेत्र के कामगारों, मजदूरों, मिस्त्रियों हेतु ई-श्रम कार्ड निर्माण, ₹2 लाख दुर्घटना बीमा एवं छात्रवृत्ति लाभ।',
            'docs'      => 'आधार कार्ड, आधार लिंक मोबाइल, बैंक खाता विवरण',
            'fee'       => 'निशुल्क सरकारी + ₹30 लैमिनेटेड कार्ड',
            'time'      => 'तत्काल 10 मिनट में',
            'icon'      => 'tool',
            'badge'     => 'श्रमिक लाभ',
        ],
        [
            'title'     => 'नया राशन कार्ड एवं यूनिट जोड़ना (FCS Ration Card)',
            'cat'       => 'schemes',
            'desc'      => 'पात्र गृहस्थी एवं अंत्योदय नया राशन कार्ड ऑनलाइन आवेदन, परिवार के नए सदस्य का नाम जोड़ना या हटाना।',
            'docs'      => 'परिवार की मुखिया (महिला) का आधार, बैंक पासबुक, सभी सदस्यों के आधार, आय प्रमाण',
            'fee'       => '₹50 सरकारी + सेवा शुल्क',
            'time'      => '15 से 30 कार्य दिवस',
            'icon'      => 'shopping-bag',
            'badge'     => 'खाद्य सुरक्षा',
        ],

        // 4. Banking & Financial
        [
            'title'     => 'आधार एटीएम निकासी (AEPS Cash Withdrawal)',
            'cat'       => 'banking',
            'desc'      => 'किसी भी बैंक खाते से केवल अंगूठे के निशान (Biometric) द्वारा बिना एटीएम कार्ड तुरंत नगद निकासी, बैलेंस जांच व मिनी स्टेटमेंट।',
            'docs'      => 'आधार कार्ड नंबर, बैंक में आधार लिंक खाता, फिंगरप्रिंट',
            'fee'       => 'निशुल्क / बैंक नियमानुसार',
            'time'      => 'तत्काल 1 मिनट में',
            'icon'      => 'dollar-sign',
            'badge'     => '24x7 सेवा',
        ],
        [
            'title'     => 'जीरो बैलेंस बैंक खाता खोलना (Savings Account)',
            'cat'       => 'banking',
            'desc'      => 'एसबीआई, पीएनबी, बैंक ऑफ बड़ौदा, एयरटेल पेमेंट्स बैंक आदि में तुरंत बिना किसी न्यूनतम बैलेंस के बचत खाता खोलें।',
            'docs'      => 'आधार कार्ड, पैन कार्ड, लिंक मोबाइल नंबर, 2 फोटो',
            'fee'       => 'निशुल्क / खाता नियमानुसार',
            'time'      => 'तत्काल 15 मिनट में',
            'icon'      => 'landmark',
            'badge'     => 'बैंकिंग',
        ],
        [
            'title'     => 'वाहन एवं जीवन बीमा (Motor & Life Insurance)',
            'cat'       => 'banking',
            'desc'      => 'बाइक, कार, ऑटो, ट्रैक्टर एवं कमर्शियल वाहनों का तत्काल थर्ड पार्टी व व्यापक बीमा एवं प्रधानमंत्री जीवन ज्योति/सुरक्षा बीमा।',
            'docs'      => 'आरसी (RC), पुरानी बीमा पॉलिसी, आधार कार्ड',
            'fee'       => 'पॉलिसी प्रीमियम अनुसार',
            'time'      => 'तत्काल 5 मिनट में पॉलिसी',
            'icon'      => 'umbrella',
            'badge'     => 'सुरक्षा',
        ],

        // 5. Utility & Bills
        [
            'title'     => 'बिजली बिल भुगतान (Electricity Bill Payment)',
            'cat'       => 'utility',
            'desc'      => 'ग्रामीण व शहरी बिजली बिल की ऑनलाइन जांच, तत्काल भुगतान, छूट (सरचार्ज माफी) योजना का लाभ एवं अधिकृत रसीद प्राप्त करें।',
            'docs'      => 'उपभोक्ता संख्या (Consumer Number / Account ID)',
            'fee'       => 'बिल राशि अनुसार (शून्य अतिरिक्त शुल्क)',
            'time'      => 'तत्काल भुगतान रसीद',
            'icon'      => 'zap',
            'badge'     => 'त्वरित रसीद',
        ],
        [
            'title'     => 'एलपीजी गैस सब्सिडी एवं बुकिंग (LPG Gas Cylinder)',
            'cat'       => 'utility',
            'desc'      => 'भारत, इंडेन, एचपी गैस सिलेंडर ऑनलाइन बुकिंग, उज्ज्वला योजना सब्सिडी स्टेटस और नए गैस कनेक्शन आवेदन।',
            'docs'      => 'उपभोक्ता नंबर, मोबाइल नंबर, एजेंसी नाम',
            'fee'       => 'सिलेंडर मूल्य अनुसार',
            'time'      => 'तत्काल बुकिंग',
            'icon'      => 'flame',
            'badge'     => 'रसोई गैस',
        ],
        [
            'title'     => 'फास्टैग रिचार्ज एवं नया फास्टैग (FASTag)',
            'cat'       => 'utility',
            'desc'      => 'टोल प्लाजा पर बिना रुके यात्रा के लिए नया वाहन फास्टैग लगाना, बैलेंस टॉप-अप एवं ब्लैकलिस्टेड फास्टैग एक्टिवेशन।',
            'docs'      => 'वाहन आरसी (RC), मोबाइल नंबर, वाहन फोटो',
            'fee'       => 'रिचार्ज राशि अनुसार',
            'time'      => 'तत्काल 5 मिनट में',
            'icon'      => 'truck',
            'badge'     => 'टोल सुविधा',
        ],

        // 6. Education & Recruitment
        [
            'title'     => 'सरकारी नौकरी ऑनलाइन फॉर्म (Govt Jobs Apply)',
            'cat'       => 'education',
            'desc'      => 'एसएससी, रेलवे, पुलिस, शिक्षक भर्ती, यूपीएससी, अग्निवीर व अन्य सभी राज्य/केंद्रीय भर्तियों के ऑनलाइन फॉर्म, एडमिट कार्ड व रिजल्ट।',
            'docs'      => 'शैक्षणिक अंकपत्र, आधार कार्ड, फोटो, हस्ताक्षर, जाति/निवास प्रमाण',
            'fee'       => 'विभागीय परीक्षा शुल्क + ₹70 फॉर्म फीस',
            'time'      => 'सटीक एवं त्रुटिहीन फॉर्म',
            'icon'      => 'briefcase',
            'badge'     => 'त्रुटिरहित',
        ],
        [
            'title'     => 'छात्रवृत्ति ऑनलाइन फॉर्म (Scholarship Application)',
            'cat'       => 'education',
            'desc'      => 'दशमोत्तर, पूर्वदशम छात्रवृत्ति (UP Scholarship & National Scholarship Portal) का नया एवं नवीनीकरण (Renewal) फॉर्म भरना।',
            'docs'      => 'फीस रसीद, पिछले वर्ष का अंकपत्र, आय/जाति/निवास, आधार लिंक बैंक पासबुक',
            'fee'       => '₹50 सेवा शुल्क',
            'time'      => 'फाइनल सबमिशन व लॉक',
            'icon'      => 'graduation-cap',
            'badge'     => 'विद्यार्थी हित',
        ],
    ];

    foreach ($default_services as $s) {
        $p_id = wp_insert_post([
            'post_title'   => $s['title'],
            'post_content' => $s['desc'],
            'post_excerpt' => $s['desc'],
            'post_status'  => 'publish',
            'post_type'    => 'jsk_service',
        ]);

        if (!is_wp_error($p_id)) {
            // Assign category
            $cat_slug = $s['cat'];
            if (!empty($cat_ids[$cat_slug])) {
                wp_set_object_terms($p_id, intval($cat_ids[$cat_slug]), 'jsk_service_cat');
            }

            // Set metadata
            update_post_meta($p_id, '_jsk_docs', $s['docs']);
            update_post_meta($p_id, '_jsk_fee', $s['fee']);
            update_post_meta($p_id, '_jsk_time', $s['time']);
            update_post_meta($p_id, '_jsk_icon', $s['icon']);
            update_post_meta($p_id, '_jsk_badge', $s['badge']);
        }
    }

    delete_transient('jsk_all_services_cache');
    update_option('jsk_default_services_seeded_v1', 1);
}
add_action('init', 'jsk_seed_default_services_if_empty', 20);

/* ==========================================================================
   6. HELPER FUNCTIONS FOR TEMPLATES
   ========================================================================== */

/**
 * Return clean inline SVG for service icons (No heavy icon fonts)
 */
function jsk_get_svg_icon($icon_name) {
    $icons = [
        'fingerprint' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12C2 6.5 6.5 2 12 2a10 10 0 0 1 8 4"/><path d="M5 19.5C5.5 18 6 15 6 12c0-.7.12-1.37.34-2"/><path d="M17.29 21.02c.12-.6.14-1.2.1-1.79a9 9 0 0 0-4-7.23"/><path d="M8.7 17.5A6.5 6.5 0 0 1 8 12a4 4 0 0 1 8 0c0 .6-.1 1.2-.3 1.8"/><path d="M12 16v5"/><path d="M19.5 17.5c-.5 1.5-1 3-2.5 3.5"/></svg>',
        'credit-card' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>',
        'user-check'  => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><polyline points="16 11 18 13 22 9"/></svg>',
        'globe'       => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>',
        'file-text'   => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>',
        'shield-check'=> '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>',
        'home'        => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
        'award'       => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>',
        'map'         => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="3 6 9 3 15 6 21 3 21 18 15 21 9 18 3 21"/><line x1="9" x2="9" y1="3" y2="18"/><line x1="15" x2="15" y1="6" y2="21"/></svg>',
        'sprout'      => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"/></svg>',
        'heart'       => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>',
        'activity'    => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>',
        'tool'        => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>',
        'shopping-bag'=> '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><line x1="3" x2="21" y1="6" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>',
        'dollar-sign' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
        'landmark'    => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="22" y2="22"/><line x1="6" x2="6" y1="18" y2="11"/><line x1="10" x2="10" y1="18" y2="11"/><line x1="14" x2="14" y1="18" y2="11"/><line x1="18" x2="18" y1="18" y2="11"/><polygon points="12 2 20 7 4 7"/></svg>',
        'umbrella'    => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12a10.06 10.06 0 0 0-20 0Z"/><path d="M12 12v8a2 2 0 0 0 4 0"/><path d="M12 2v1"/></svg>',
        'zap'         => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>',
        'flame'       => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg>',
        'truck'       => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="16" height="13" x="1" y="5" rx="2"/><polygon points="17 8 20 8 23 11 23 18 17 18"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
        'briefcase'   => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="7" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>',
        'graduation-cap' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/></svg>',
        'phone'       => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
        'check-circle'=> '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
        'clock'       => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
    ];

    return $icons[$icon_name] ?? $icons['file-text'];
}

/* ==========================================================================
   7. WP-ADMIN ENHANCEMENTS FOR CITIZEN APPLICATIONS & SERVICES
   ========================================================================== */

// 1. Custom Columns for Applications List
add_filter('manage_jsk_application_posts_columns', function($columns) {
    return [
        'cb'             => '<input type="checkbox" />',
        'title'          => 'ट्रैकिंग आईडी (Tracking ID)',
        'applicant_name' => 'आवेदक का नाम',
        'mobile'         => 'मोबाइल नंबर',
        'service_name'   => 'चयनित सेवा',
        'status'         => 'स्थिति (Status)',
        'date'           => 'आवेदन दिनांक',
    ];
});

add_action('manage_jsk_application_posts_custom_column', function($column, $post_id) {
    switch ($column) {
        case 'applicant_name':
            echo esc_html(get_post_meta($post_id, '_jsk_name', true) ?: '-');
            break;
        case 'mobile':
            $m = get_post_meta($post_id, '_jsk_mobile', true);
            if ($m) {
                echo '<a href="tel:' . esc_attr($m) . '"><strong>' . esc_html($m) . '</strong></a>';
            } else {
                echo '-';
            }
            break;
        case 'service_name':
            echo esc_html(get_post_meta($post_id, '_jsk_service_name', true) ?: '-');
            break;
        case 'status':
            $st = get_post_meta($post_id, '_jsk_status', true) ?: 'submitted';
            $colors = [
                'submitted'   => ['bg' => '#DBEAFE', 'color' => '#1E40AF', 'label' => 'सबमिट (New)'],
                'verified'    => ['bg' => '#FEF3C7', 'color' => '#92400E', 'label' => 'सत्यापित (Verified)'],
                'in_progress' => ['bg' => '#F3E8FF', 'color' => '#6B21A8', 'label' => 'प्रक्रियाधीन (Processing)'],
                'completed'   => ['bg' => '#DCFCE7', 'color' => '#15803D', 'label' => 'स्वीकृत (Completed)'],
                'rejected'    => ['bg' => '#FEE2E2', 'color' => '#991B1B', 'label' => 'अस्वीकृत (Rejected)'],
            ];
            $c = $colors[$st] ?? $colors['submitted'];
            echo '<span style="background:' . $c['bg'] . ';color:' . $c['color'] . ';padding:4px 10px;border-radius:12px;font-weight:700;font-size:12px;">' . esc_html($c['label']) . '</span>';
            break;
    }
}, 10, 2);

// 2. Meta Box for Application Status Management
add_action('add_meta_boxes', function() {
    add_meta_box(
        'jsk_app_status_box',
        'नागरिक आवेदन स्थिति व ऑपरेटर विवरण',
        'jsk_render_app_status_box',
        'jsk_application',
        'normal',
        'high'
    );

    add_meta_box(
        'jsk_service_details_box',
        'सेवा शुल्क एवं दस्तावेज विवरण',
        'jsk_render_service_details_box',
        'jsk_service',
        'normal',
        'high'
    );
});

function jsk_render_app_status_box($post) {
    wp_nonce_field('jsk_save_app_meta', 'jsk_app_nonce');
    $status = get_post_meta($post->ID, '_jsk_status', true) ?: 'submitted';
    $name   = get_post_meta($post->ID, '_jsk_name', true);
    $mobile = get_post_meta($post->ID, '_jsk_mobile', true);
    $service = get_post_meta($post->ID, '_jsk_service_name', true);
    $village = get_post_meta($post->ID, '_jsk_village_city', true);
    $district = get_post_meta($post->ID, '_jsk_district', true);
    $remarks = get_post_meta($post->ID, '_jsk_operator_remarks', true);
    ?>
    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px; margin-bottom:16px;">
        <p><strong>आवेदक नाम:</strong> <?php echo esc_html($name); ?></p>
        <p><strong>मोबाइल:</strong> <a href="tel:<?php echo esc_attr($mobile); ?>"><?php echo esc_html($mobile); ?></a></p>
        <p><strong>सेवा:</strong> <?php echo esc_html($service); ?></p>
        <p><strong>स्थान:</strong> <?php echo esc_html("{$village}, {$district}"); ?></p>
    </div>
    <hr style="margin: 12px 0;">
    <div style="margin-top:12px;">
        <label for="jsk_status" style="font-weight:700; display:block; margin-bottom:6px;">आवेदन की वर्तमान स्थिति (Citizen Status):</label>
        <select name="jsk_status" id="jsk_status" style="width:100%; max-width:320px; padding:6px 10px;">
            <option value="submitted" <?php selected($status, 'submitted'); ?>>1. आवेदन प्राप्त हुआ (Submitted)</option>
            <option value="verified" <?php selected($status, 'verified'); ?>>2. दस्तावेज सत्यापन पूर्ण (Verified)</option>
            <option value="in_progress" <?php selected($status, 'in_progress'); ?>>3. विभागीय प्रक्रियाधीन (In Progress)</option>
            <option value="completed" <?php selected($status, 'completed'); ?>>4. सेवा स्वीकृत एवं प्रमाण पत्र तैयार (Completed)</option>
            <option value="rejected" <?php selected($status, 'rejected'); ?>>अस्वीकृत / त्रुटि सुधार आवश्यक (Rejected)</option>
        </select>
    </div>
    <div style="margin-top:14px;">
        <label for="jsk_operator_remarks" style="font-weight:700; display:block; margin-bottom:6px;">ऑपरेटर टिप्पणी / प्रमाण पत्र या रसीद क्रमांक:</label>
        <textarea name="jsk_operator_remarks" id="jsk_operator_remarks" rows="3" style="width:100%; max-width:500px;"><?php echo esc_textarea($remarks); ?></textarea>
    </div>
    <?php
}

function jsk_render_service_details_box($post) {
    wp_nonce_field('jsk_save_service_meta', 'jsk_service_nonce');
    $fee   = get_post_meta($post->ID, '_jsk_fee', true) ?: '₹50 सरकारी + सेवा शुल्क';
    $time  = get_post_meta($post->ID, '_jsk_time', true) ?: '2 से 5 कार्य दिवस';
    $docs  = get_post_meta($post->ID, '_jsk_docs', true) ?: 'आधार कार्ड, पासपोर्ट फोटो, मोबाइल नंबर';
    $badge = get_post_meta($post->ID, '_jsk_badge', true) ?: 'लोकप्रिय';
    $icon  = get_post_meta($post->ID, '_jsk_icon', true) ?: 'file-text';
    ?>
    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:14px;">
        <div>
            <label style="font-weight:700; display:block; margin-bottom:4px;">सरकारी व केंद्र शुल्क (Fee):</label>
            <input type="text" name="jsk_fee" value="<?php echo esc_attr($fee); ?>" style="width:100%;">
        </div>
        <div>
            <label style="font-weight:700; display:block; margin-bottom:4px;">निस्तारण समय (TAT):</label>
            <input type="text" name="jsk_time" value="<?php echo esc_attr($time); ?>" style="width:100%;">
        </div>
        <div>
            <label style="font-weight:700; display:block; margin-bottom:4px;">लोकप्रियता बैज (Badge):</label>
            <input type="text" name="jsk_badge" value="<?php echo esc_attr($badge); ?>" style="width:100%;">
        </div>
        <div>
            <label style="font-weight:700; display:block; margin-bottom:4px;">आइकन नाम (SVG Icon Key):</label>
            <input type="text" name="jsk_icon" value="<?php echo esc_attr($icon); ?>" style="width:100%;">
        </div>
    </div>
    <div style="margin-top:14px;">
        <label style="font-weight:700; display:block; margin-bottom:4px;">आवश्यक दस्तावेज (Required Documents, अल्पविराम से अलग करें):</label>
        <textarea name="jsk_docs" rows="2" style="width:100%;"><?php echo esc_textarea($docs); ?></textarea>
    </div>
    <?php
}

// 3. Save Meta Box Data
add_action('save_post', function($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Application save
    if (isset($_POST['jsk_app_nonce']) && wp_verify_nonce($_POST['jsk_app_nonce'], 'jsk_save_app_meta')) {
        if (isset($_POST['jsk_status'])) {
            update_post_meta($post_id, '_jsk_status', sanitize_text_field($_POST['jsk_status']));
        }
        if (isset($_POST['jsk_operator_remarks'])) {
            update_post_meta($post_id, '_jsk_operator_remarks', sanitize_textarea_field($_POST['jsk_operator_remarks']));
        }
    }

    // Service save
    if (isset($_POST['jsk_service_nonce']) && wp_verify_nonce($_POST['jsk_service_nonce'], 'jsk_save_service_meta')) {
        if (isset($_POST['jsk_fee'])) {
            update_post_meta($post_id, '_jsk_fee', sanitize_text_field($_POST['jsk_fee']));
        }
        if (isset($_POST['jsk_time'])) {
            update_post_meta($post_id, '_jsk_time', sanitize_text_field($_POST['jsk_time']));
        }
        if (isset($_POST['jsk_badge'])) {
            update_post_meta($post_id, '_jsk_badge', sanitize_text_field($_POST['jsk_badge']));
        }
        if (isset($_POST['jsk_icon'])) {
            update_post_meta($post_id, '_jsk_icon', sanitize_text_field($_POST['jsk_icon']));
        }
        if (isset($_POST['jsk_docs'])) {
            update_post_meta($post_id, '_jsk_docs', sanitize_textarea_field($_POST['jsk_docs']));
        }
        delete_transient('jsk_all_services_cache');
    }
});
