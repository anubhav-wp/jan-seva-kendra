<?php
/**
 * Header template for Jan Seva Kendra
 */
if (!defined('ABSPATH')) exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, viewport-fit=cover">
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
                <span class="portal-badge lang-text" data-hi="डिजिटल भारत (Digital India) अधिकृत नागरिक सुविधा केंद्र" data-en="Digital India Authorized Citizen Service Center">
                    डिजिटल भारत (Digital India) अधिकृत नागरिक सुविधा केंद्र
                </span>
                <span class="vle-info">सीएससी आईडी: <strong><?php echo esc_html(jsk_opt('csc_id')); ?></strong></span>
            </div>
            <div class="top-bar-right">
                <a href="tel:<?php echo esc_attr(jsk_opt('tollfree')); ?>" class="top-link">
                    <span class="icon"><?php echo jsk_get_svg_icon('phone'); ?></span>
                    <span>टोल-फ्री: <?php echo esc_html(jsk_opt('tollfree')); ?></span>
                </a>

                <!-- Language Switcher in Top Bar -->
                <button type="button" class="btn-lang-top" id="topLangBtn" aria-label="भाषा चुनें / Select Language">
                    <span>🌐</span>
                    <strong id="topLangLabel">हिंदी</strong>
                    <span class="lang-chevron">▼</span>
                </button>
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
                    <span class="brand-title lang-text" data-hi="<?php echo esc_attr(jsk_opt('portal_name_hi')); ?>" data-en="<?php echo esc_attr(jsk_opt('portal_name_en')); ?>">
                        <?php echo esc_html(jsk_opt('portal_name_hi')); ?>
                    </span>
                    <span class="brand-subtitle lang-text" data-hi="<?php echo esc_attr(jsk_opt('portal_sub_hi')); ?>" data-en="<?php echo esc_attr(jsk_opt('portal_sub_en')); ?>">
                        <?php echo esc_html(jsk_opt('portal_sub_hi')); ?>
                    </span>
                </div>
            </a>

            <!-- Desktop Nav Links (Multi-Page Navigation) -->
            <ul class="nav-links">
                <li>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link lang-text" data-hi="होम" data-en="Home">होम</a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/services/')); ?>" class="nav-link lang-text" data-hi="नागरिक सेवाएं" data-en="Services">नागरिक सेवाएं</a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/track/')); ?>" class="nav-link lang-text" data-hi="स्थिति जांचें" data-en="Track Status">स्थिति जांचें</a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/about/')); ?>" class="nav-link lang-text" data-hi="हमारा केंद्र" data-en="About Us">हमारा केंद्र</a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="nav-link lang-text" data-hi="संपर्क" data-en="Contact">संपर्क</a>
                </li>
            </ul>

            <!-- Header Quick Actions -->
            <div class="header-actions">
                <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="btn btn-primary-nav">
                    <span class="icon"><?php echo jsk_get_svg_icon('file-text'); ?></span>
                    <span class="lang-text" data-hi="आवेदन करें" data-en="Apply Now">आवेदन करें</span>
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
                <span class="drawer-title lang-text" data-hi="जन सेवा केंद्र मेनू" data-en="Jan Seva Kendra Menu">जन सेवा केंद्र मेनू</span>
                <button class="drawer-close" id="drawerCloseBtn" aria-label="बंद करें">&times;</button>
            </div>
            <div class="drawer-lang-strip">
                <span>भाषा / Language:</span>
                <button type="button" class="drawer-lang-btn" id="drawerLangBtn">
                    <span>🌐</span> <strong id="drawerLangLabel">हिंदी</strong> (बदलें)
                </button>
            </div>
            <ul class="mobile-nav-list">
                <li><a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-nav-link lang-text" data-hi="मुख्य पृष्ठ (Home)" data-en="Home">मुख्य पृष्ठ (Home)</a></li>
                <li><a href="<?php echo esc_url(home_url('/services/')); ?>" class="mobile-nav-link lang-text" data-hi="सभी नागरिक सेवाएं" data-en="All Citizen Services">सभी नागरिक सेवाएं</a></li>
                <li><a href="<?php echo esc_url(home_url('/apply/')); ?>" class="mobile-nav-link lang-text" data-hi="ऑनलाइन सेवा आवेदन" data-en="Online Application">ऑनलाइन सेवा आवेदन</a></li>
                <li><a href="<?php echo esc_url(home_url('/track/')); ?>" class="mobile-nav-link lang-text" data-hi="आवेदन स्थिति ट्रैक करें" data-en="Track Application Status">आवेदन स्थिति ट्रैक करें</a></li>
                <li><a href="<?php echo esc_url(home_url('/fees/')); ?>" class="mobile-nav-link lang-text" data-hi="सरकारी व केंद्र शुल्क दर सूची" data-en="Service Fee Rate Chart">सरकारी व केंद्र शुल्क दर सूची</a></li>
                <li><a href="<?php echo esc_url(home_url('/documents/')); ?>" class="mobile-nav-link lang-text" data-hi="जरूरी दस्तावेज सूची" data-en="Required Documents Guide">जरूरी दस्तावेज सूची</a></li>
                <li><a href="<?php echo esc_url(home_url('/about/')); ?>" class="mobile-nav-link lang-text" data-hi="हमारे केंद्र के बारे में" data-en="About Our Center">हमारे केंद्र के बारे में</a></li>
                <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="mobile-nav-link lang-text" data-hi="केंद्र का पता व संपर्क" data-en="Contact & Helpdesk">केंद्र का पता व संपर्क</a></li>
            </ul>
            <div class="drawer-footer">
                <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="btn btn-primary w-100 mb-2">तुरंत आवेदन करें</a>
                <a href="https://wa.me/<?php echo esc_attr(jsk_opt('whatsapp')); ?>?text=नमस्ते,%20मुझे%20जन%20सेवा%20केंद्र%20की%20सेवाओं%20के%20बारे%20में%20जानकारी%20चाहिए" class="btn btn-whatsapp w-100" target="_blank" rel="noopener">व्हाट्सएप सहायता</a>
            </div>
        </div>
        <div class="drawer-overlay" id="drawerOverlay" aria-hidden="true"></div>
    </nav>

    <!-- Urgent Citizen Updates Ticker -->
    <div class="news-ticker-bar">
        <div class="container ticker-container">
            <div class="ticker-label">
                <span class="ticker-pulse"></span>
                <span class="lang-text" data-hi="ताज़ा अपडेट" data-en="Live Updates">ताज़ा अपडेट</span>
            </div>
            <div class="ticker-content" id="tickerText">
                <span class="lang-text" data-hi="<?php echo esc_attr(jsk_opt('ticker_hi')); ?>" data-en="<?php echo esc_attr(jsk_opt('ticker_en')); ?>">
                    <?php echo esc_html(jsk_opt('ticker_hi')); ?>
                </span>
            </div>
        </div>
    </div>
</header>

<main id="main-content" class="site-main">
