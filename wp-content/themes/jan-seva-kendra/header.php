<?php
/**
 * Header template for Jan Seva Kendra
 */
if (!defined('ABSPATH')) exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="description" content="जन सेवा केंद्र ऑनलाइन नागरिक सेवाएं - आधार, पैन कार्ड, आय/जाति/निवास प्रमाण पत्र, राशन कार्ड, पेंशन, बैंकिंग एवं सभी सरकारी योजनाओं के ऑनलाइन आवेदन।">
    <meta name="theme-color" content="#0d3b66">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-to-content" href="#main-content">मुख्य सामग्री पर जाएं</a>

<!-- Top Government & Utility Header -->
<header class="site-header">
    <div class="top-announcement-bar">
        <div class="container top-bar-inner">
            <div class="top-bar-left">
                <span class="flag-strip" aria-hidden="true">
                    <span class="flag-orange"></span>
                    <span class="flag-white"></span>
                    <span class="flag-green"></span>
                </span>
                <span class="portal-badge">डिजिटल भारत (Digital India) अधिकृत नागरिक सुविधा केंद्र</span>
                <span class="vle-info">सीएससी आईडी: <strong>CSC-UP-984210</strong></span>
            </div>
            <div class="top-bar-right">
                <a href="tel:180030003468" class="top-link">
                    <span class="icon"><?php echo jsk_get_svg_icon('phone'); ?></span>
                    <span>टोल-फ्री: 1800-3000-3468</span>
                </a>
                <span class="timing-badge">
                    <span class="icon"><?php echo jsk_get_svg_icon('clock'); ?></span>
                    <span>सोम - शनि: प्रातः 8:00 से सायं 8:00</span>
                </span>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="main-navbar" aria-label="मुख्य नेविगेशन">
        <div class="container navbar-inner">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-identity">
                <div class="brand-emblem" aria-hidden="true">
                    <svg viewBox="0 0 44 44" width="44" height="44" fill="none">
                        <circle cx="22" cy="22" r="21" stroke="#0D3B66" stroke-width="2" fill="#FFFFFF"/>
                        <circle cx="22" cy="22" r="17" fill="#F8FAFC" stroke="#FF7722" stroke-width="1.5"/>
                        <!-- Ashoka Chakra wheel motif -->
                        <circle cx="22" cy="22" r="7" stroke="#0D3B66" stroke-width="1.5" stroke-dasharray="2 1.5"/>
                        <circle cx="22" cy="22" r="2.5" fill="#0D3B66"/>
                        <path d="M22 2v6M22 36v6M2 22h6M36 22h6" stroke="#15803D" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="brand-text">
                    <span class="brand-title">जन सेवा केंद्र</span>
                    <span class="brand-subtitle">डिजिटल नागरिक एवं ई-डिस्ट्रिक्ट सेवा पोर्टल</span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <ul class="nav-links">
                <li><a href="<?php echo esc_url(home_url('/')); ?>#services" class="nav-link">सभी सेवाएं</a></li>
                <li><a href="<?php echo esc_url(home_url('/')); ?>#apply-form-section" class="nav-link">ऑनलाइन आवेदन</a></li>
                <li><a href="<?php echo esc_url(home_url('/')); ?>#track-section" class="nav-link">स्थिति जांचें</a></li>
                <li><a href="<?php echo esc_url(home_url('/')); ?>#fee-chart" class="nav-link">शुल्क सूची</a></li>
                <li><a href="<?php echo esc_url(home_url('/')); ?>#documents-guide" class="nav-link">दस्तावेज</a></li>
                <li><a href="<?php echo esc_url(home_url('/')); ?>#contact-center" class="nav-link">हमारा केंद्र</a></li>
            </ul>

            <!-- Header Quick Actions -->
            <div class="header-actions">
                <a href="#track-section" class="btn btn-outline-nav">
                    <span class="icon"><?php echo jsk_get_svg_icon('clock'); ?></span>
                    <span>स्थिति जांचें</span>
                </a>
                <a href="#apply-form-section" class="btn btn-primary-nav">
                    <span class="icon"><?php echo jsk_get_svg_icon('file-text'); ?></span>
                    <span>नया आवेदन करें</span>
                </a>
                <button class="mobile-toggle" id="mobileMenuBtn" aria-label="मेनू खोलें" aria-expanded="false">
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div class="mobile-nav-drawer" id="mobileNavDrawer" aria-hidden="true">
            <div class="drawer-header">
                <span class="drawer-title">जन सेवा केंद्र मेनू</span>
                <button class="drawer-close" id="drawerCloseBtn" aria-label="बंद करें">&times;</button>
            </div>
            <ul class="mobile-nav-list">
                <li><a href="<?php echo esc_url(home_url('/')); ?>#services" class="mobile-nav-link">सभी नागरिक सेवाएं</a></li>
                <li><a href="<?php echo esc_url(home_url('/')); ?>#apply-form-section" class="mobile-nav-link">ऑनलाइन सेवा आवेदन</a></li>
                <li><a href="<?php echo esc_url(home_url('/')); ?>#track-section" class="mobile-nav-link">आवेदन स्थिति ट्रैक करें</a></li>
                <li><a href="<?php echo esc_url(home_url('/')); ?>#fee-chart" class="mobile-nav-link">सरकारी व केंद्र शुल्क दर सूची</a></li>
                <li><a href="<?php echo esc_url(home_url('/')); ?>#documents-guide" class="mobile-nav-link">जरूरी दस्तावेज सूची</a></li>
                <li><a href="<?php echo esc_url(home_url('/')); ?>#center-info" class="mobile-nav-link">केंद्र का पता व संचालक</a></li>
            </ul>
            <div class="drawer-footer">
                <a href="#apply-form-section" class="btn btn-primary w-100 mb-2">तुरंत आवेदन करें</a>
                <a href="https://wa.me/919876543210?text=नमस्ते,%20मुझे%20जन%20सेवा%20केंद्र%20की%20सेवाओं%20के%20बारे%20में%20जानकारी%20चाहिए" class="btn btn-whatsapp w-100" target="_blank" rel="noopener">व्हाट्सएप सहायता</a>
            </div>
        </div>
    </nav>

    <!-- Urgent Citizen Updates Ticker -->
    <div class="news-ticker-bar">
        <div class="container ticker-container">
            <div class="ticker-label">
                <span class="ticker-pulse"></span>
                <span>ताज़ा अपडेट</span>
            </div>
            <div class="ticker-content" id="tickerText">
                <span>आय, जाति एवं निवास प्रमाण पत्र 3 से 5 दिनों में तैयार। • पीएम किसान सम्मान निधि ई-केवाईसी एवं 18वीं किस्त स्टेटस जांच उपलब्ध। • खोया हुआ आधार/पैन कार्ड तुरंत पुनः प्राप्त करें। • आयुष्मान भारत कार्ड से प्रतिवर्ष ₹5 लाख तक का मुफ्त इलाज।</span>
            </div>
        </div>
    </div>
</header>

<main id="main-content" class="site-main">
