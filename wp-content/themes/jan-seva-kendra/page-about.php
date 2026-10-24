<?php
/**
 * Template Name: हमारे केंद्र के बारे में (About Page)
 */
if (!defined('ABSPATH')) exit;

get_header();

$csc_center_img = JSK_THEME_URI . '/assets/images/center-storefront.jpg';
$hero_img = JSK_THEME_URI . '/assets/images/hero-service.jpg';
?>

<!-- Page Header Banner -->
<div class="page-hero-banner">
    <div class="container">
        <div class="breadcrumbs-nav">
            <a href="<?php echo esc_url(home_url('/')); ?>">मुख्य पृष्ठ</a> &raquo; 
            <span>हमारे केंद्र के बारे में</span>
        </div>
        <div class="section-badge-pill pill-light">सीएससी ई-गवर्नेंस अधिकृत</div>
        <h1 class="page-banner-title">
            <span class="lang-text" data-hi="जन सेवा केंद्र — डिजिटल नागरिक सुविधा केंद्र" data-en="Jan Seva Kendra — Digital Citizen Service Center">
                जन सेवा केंद्र — डिजिटल नागरिक सुविधा केंद्र
            </span>
        </h1>
        <p class="page-banner-subtitle">
            <span class="lang-text" data-hi="भारत सरकार एवं राज्य ई-डिस्ट्रिक्ट मिशन के अंतर्गत नागरिकों को पारदर्शी, त्वरित एवं विश्वसनीय सेवाएं प्रदान करने के लिए समर्पित" data-en="Dedicated to providing transparent, fast and reliable e-governance services under Digital India Mission">
                भारत सरकार एवं राज्य ई-डिस्ट्रिक्ट मिशन के अंतर्गत नागरिकों को पारदर्शी, त्वरित एवं विश्वसनीय सेवाएं प्रदान करने के लिए समर्पित
            </span>
        </p>
    </div>
</div>

<!-- Main About Content -->
<section class="about-section py-5">
    <div class="container">
        <div class="about-grid-2">
            <div class="about-text-col">
                <span class="section-badge-pill">हमारा परिचय</span>
                <h2 class="section-title">नागरिकों और सरकारी योजनाओं के बीच का मजबूत सेतु</h2>
                <p class="lead-text">
                    हमारा जन सेवा केंद्र (CSC Common Services Centre) ग्रामीण एवं शहरी नागरिकों को उनके घर के समीप बिना किसी परेशानी के 100 से अधिक सरकारी एवं वित्तीय सेवाएं उपलब्ध कराने के लिए स्थापित किया गया है।
                </p>
                <p>
                    वर्षों से हमारा केंद्र तहसील, ब्लॉक एवं जिला स्तर के कार्यों—जैसे आय, जाति, मूल निवास प्रमाण पत्र, आधार अपडेशन, पैन कार्ड, पीएम किसान ई-केवाईसी, पेंशन एवं बैंकिंग सेवाओं—को समयबद्ध तरीके से नागरिकों तक पहुंचा रहा है।
                </p>

                <div class="about-highlights-list">
                    <div class="hl-item">
                        <span class="hl-check">✓</span>
                        <div>
                            <strong>100% सरकारी मान्यता एवं अधिकृत सीएससी आईडी:</strong>
                            <span>हमारा केंद्र भारत सरकार के डिजिटल सेवा पोर्टल से सीधे जुड़ा है।</span>
                        </div>
                    </div>
                    <div class="hl-item">
                        <span class="hl-check">✓</span>
                        <div>
                            <strong>डिजिटल हस्ताक्षर युक्त प्रमाण पत्र:</strong>
                            <span>हमारे यहाँ से जारी सभी प्रमाण पत्र सभी सरकारी व निजी कार्यों में 100% मान्य हैं।</span>
                        </div>
                    </div>
                    <div class="hl-item">
                        <span class="hl-check">✓</span>
                        <div>
                            <strong>शून्य अतिरिक्त शुल्क की गारंटी:</strong>
                            <span>केवल शासन द्वारा तय दर तालिका के अनुसार ही भुगतान लिया जाता है।</span>
                        </div>
                    </div>
                </div>

                <div class="about-vle-badge">
                    <div class="vle-avatar"><?php echo jsk_get_svg_icon('user-check'); ?></div>
                    <div>
                        <strong>अधिकृत संचालक (VLE): <?php echo esc_html(jsk_opt('vle_name')); ?></strong>
                        <span>सीएससी पंजीकरण आईडी: <strong><?php echo esc_html(jsk_opt('csc_id')); ?></strong></span>
                    </div>
                </div>
            </div>

            <div class="about-media-col">
                <div class="about-image-card">
                    <img src="<?php echo esc_url($csc_center_img); ?>" alt="जन सेवा केंद्र कार्यालय" class="about-main-img" loading="lazy">
                    <div class="about-floating-stat">
                        <span class="f-num"><?php echo esc_html(jsk_opt('stat_citizens')); ?></span>
                        <span class="f-label">संतुष्ट स्थानीय नागरिक</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Center Facilities & Equipment -->
        <div class="facilities-block mt-5">
            <div class="section-header text-center mb-4">
                <span class="section-badge-pill">बुनियादी सुविधाएं</span>
                <h3>केंद्र पर उपलब्ध आधुनिक तकनीकी सुविधाएं</h3>
                <p class="section-subtitle">हम अत्याधुनिक उपकरणों द्वारा नागरिकों को तेज और सुगम सेवाएं सुनिश्चित करते हैं</p>
            </div>

            <div class="facilities-grid">
                <div class="fac-card">
                    <div class="fac-icon"><?php echo jsk_get_svg_icon('fingerprint'); ?></div>
                    <h4>बायोमेट्रिक प्रमाणीकरण</h4>
                    <p>यूआईडीएआई अधिकृत आरडी सर्विस फिंगरप्रिंट व आईरिस स्कैनर द्वारा 100% सुरक्षित आधार प्रमाणीकरण।</p>
                </div>
                <div class="fac-card">
                    <div class="fac-icon"><?php echo jsk_get_svg_icon('landmark'); ?></div>
                    <h4>माइक्रो एटीएम व नगद निकासी</h4>
                    <p>एईपीएस (AEPS) द्वारा किसी भी बैंक के खाते से तत्काल नगद निकासी व बैलेंस जांच की सुविधा।</p>
                </div>
                <div class="fac-card">
                    <div class="fac-icon"><?php echo jsk_get_svg_icon('file-text'); ?></div>
                    <h4>हाई-स्पीड लेजर प्रिंट व लैमिनेशन</h4>
                    <p>प्रमाण पत्र, पीवीसी कार्ड एवं आधार कार्ड की तत्काल वाटरप्रूफ व लैमिनेटेड प्रति उपलब्ध।</p>
                </div>
                <div class="fac-card">
                    <div class="fac-icon"><?php echo jsk_get_svg_icon('zap'); ?></div>
                    <h4>24x7 इन्वर्टर पावर बैकअप</h4>
                    <p>बिजली जाने पर भी कार्य निर्बाध रूप से जारी रहता है। किसी भी नागरिक का समय व्यर्थ नहीं होता।</p>
                </div>
            </div>
        </div>

        <!-- Center Interior Showcase -->
        <div class="about-gallery-grid mt-5">
            <div class="gallery-card">
                <img src="<?php echo esc_url($hero_img); ?>" alt="सीएससी ऑपरेटर नागरिक सहायता करते हुए" class="gal-img" loading="lazy">
                <div class="gal-caption">नागरिक सेवा डेस्क एवं तत्काल ऑनलाइन आवेदन सहायता</div>
            </div>
            <div class="gallery-card">
                <img src="<?php echo esc_url($csc_center_img); ?>" alt="केंद्र का प्रतीक्षा कक्ष" class="gal-img" loading="lazy">
                <div class="gal-caption">स्वच्छ प्रतीक्षा कक्ष, पेयजल व्यवस्था एवं सुगम प्रवेश</div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
