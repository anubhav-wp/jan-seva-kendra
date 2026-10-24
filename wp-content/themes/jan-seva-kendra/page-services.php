<?php
/**
 * Template Name: नागरिक सेवाएं (Services Page)
 */
if (!defined('ABSPATH')) exit;

get_header();

$services = jsk_fetch_and_format_services();
?>

<!-- Page Header Banner -->
<div class="page-hero-banner">
    <div class="container">
        <div class="breadcrumbs-nav">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="lang-text" data-hi="मुख्य पृष्ठ" data-en="Home">मुख्य पृष्ठ</a> &raquo; 
            <span class="lang-text" data-hi="नागरिक सेवाएं" data-en="Citizen Services">नागरिक सेवाएं</span>
        </div>
        <div class="section-badge-pill pill-light lang-text" data-hi="100+ अधिकृत सेवाएं" data-en="100+ Authorized Services">100+ अधिकृत सेवाएं</div>
        <h1 class="page-banner-title">
            <span class="lang-text" data-hi="सभी नागरिक एवं सरकारी सेवाएं" data-en="All Citizen & Government Services">सभी नागरिक एवं सरकारी सेवाएं</span>
        </h1>
        <p class="page-banner-subtitle">
            <span class="lang-text" data-hi="पहचान पत्र, प्रमाण पत्र, सरकारी योजनाएं, बैंकिंग, बिल भुगतान एवं ऑनलाइन फॉर्म की आधिकारिक सूची" data-en="Official directory of identity cards, certificates, government schemes, banking, utility bills and online applications">
                पहचान पत्र, प्रमाण पत्र, सरकारी योजनाएं, बैंकिंग, बिल भुगतान एवं ऑनलाइन फॉर्म की आधिकारिक सूची
            </span>
        </p>

        <!-- Live Search in Banner -->
        <div class="banner-search-box">
            <div class="search-input-wrapper">
                <span class="search-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                </span>
                <input 
                    type="search" 
                    id="heroSearchInput" 
                    class="search-input" 
                    placeholder="सेवा खोजें (उदा. आधार, पैन कार्ड, आय प्रमाण पत्र, पेंशन, बिजली बिल)..."
                    data-placeholder-hi="सेवा खोजें (उदा. आधार, पैन कार्ड, आय प्रमाण पत्र, पेंशन, बिजली बिल)..."
                    data-placeholder-en="Search service (e.g. Aadhaar, PAN card, Income certificate, Pension, Electricity bill)..."
                    autocomplete="off"
                >
                <button type="button" class="search-clear-btn" id="searchClearBtn">&times;</button>
            </div>
        </div>
    </div>
</div>

<!-- Main Services Listing -->
<section class="services-section" id="services">
    <div class="container">
        <!-- Category Filter Tabs -->
        <div class="category-tabs-wrapper">
            <div class="category-tabs" role="tablist">
                <button type="button" class="tab-btn active" data-filter="all">
                    <span class="lang-text" data-hi="सभी सेवाएं (All)" data-en="All Services">सभी सेवाएं (All)</span>
                </button>
                <button type="button" class="tab-btn" data-filter="identity">
                    <span class="lang-text" data-hi="पहचान व दस्तावेज" data-en="Identity & IDs">पहचान व दस्तावेज</span>
                </button>
                <button type="button" class="tab-btn" data-filter="certificate">
                    <span class="lang-text" data-hi="आय, जाति व निवास" data-en="Certificates">आय, जाति व निवास</span>
                </button>
                <button type="button" class="tab-btn" data-filter="schemes">
                    <span class="lang-text" data-hi="सरकारी योजनाएं व पेंशन" data-en="Schemes & Pensions">सरकारी योजनाएं व पेंशन</span>
                </button>
                <button type="button" class="tab-btn" data-filter="banking">
                    <span class="lang-text" data-hi="बैंकिंग व बीमा (AEPS)" data-en="Banking & AEPS">बैंकिंग व बीमा (AEPS)</span>
                </button>
                <button type="button" class="tab-btn" data-filter="utility">
                    <span class="lang-text" data-hi="बिल व रिचार्ज" data-en="Utility Bills">बिल व रिचार्ज</span>
                </button>
                <button type="button" class="tab-btn" data-filter="education">
                    <span class="lang-text" data-hi="शिक्षा व भर्ती फॉर्म" data-en="Exam & Education">शिक्षा व भर्ती फॉर्म</span>
                </button>
            </div>
        </div>

        <div class="services-status-bar">
            <span id="serviceResultsCount" class="lang-text" data-hi="कुल <?php echo count($services); ?> सेवाएं उपलब्ध हैं" data-en="Total <?php echo count($services); ?> services available">कुल <strong><?php echo count($services); ?></strong> सेवाएं उपलब्ध हैं</span>
            <span class="filter-hint lang-text" data-hi="विवरण देखने के लिए किसी भी सेवा पर क्लिक करें" data-en="Click on any service card to view complete details">विवरण देखने के लिए किसी भी सेवा पर क्लिक करें</span>
        </div>

        <!-- Services Cards Grid -->
        <div class="services-grid" id="servicesGrid">
            <?php if (!empty($services)): ?>
                <?php foreach ($services as $srv): ?>
                    <article 
                        class="service-card" 
                        data-category="<?php echo esc_attr($srv['category']); ?>"
                        data-title="<?php echo esc_attr(mb_strtolower($srv['title'])); ?>"
                        data-docs="<?php echo esc_attr(mb_strtolower($srv['documents'])); ?>"
                        data-desc="<?php echo esc_attr(mb_strtolower($srv['excerpt'])); ?>"
                        data-title-en="<?php echo esc_attr($srv['title_en'] ?? $srv['title']); ?>"
                        data-fee-en="<?php echo esc_attr($srv['fee_en'] ?? $srv['fee']); ?>"
                        data-time-en="<?php echo esc_attr($srv['time_en'] ?? $srv['time']); ?>"
                        data-badge-en="<?php echo esc_attr($srv['badge_en'] ?? $srv['badge']); ?>"
                    >
                        <div class="card-header-row">
                            <span class="service-cat-pill lang-text" data-hi="<?php echo esc_attr($srv['cat_name']); ?>" data-en="<?php echo esc_attr($srv['cat_name_en'] ?? $srv['cat_name']); ?>"><?php echo esc_html($srv['cat_name']); ?></span>
                            <?php if (!empty($srv['badge'])): ?>
                                <span class="service-badge-pill lang-text" data-hi="<?php echo esc_attr($srv['badge']); ?>" data-en="<?php echo esc_attr($srv['badge_en'] ?? $srv['badge']); ?>"><?php echo esc_html($srv['badge']); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="card-icon-title">
                            <div class="service-icon-box" aria-hidden="true">
                                <?php echo jsk_get_svg_icon($srv['icon']); ?>
                            </div>
                            <h3 class="service-title lang-text" data-hi="<?php echo esc_attr($srv['title']); ?>" data-en="<?php echo esc_attr($srv['title_en'] ?? $srv['title']); ?>"><?php echo esc_html($srv['title']); ?></h3>
                        </div>

                        <p class="service-desc"><?php echo esc_html($srv['excerpt']); ?></p>

                        <div class="service-meta-box">
                            <div class="meta-item">
                                <span class="meta-label lang-text" data-hi="शुल्क:" data-en="Fee:">शुल्क:</span>
                                <strong class="meta-value text-primary lang-text" data-hi="<?php echo esc_attr($srv['fee']); ?>" data-en="<?php echo esc_attr($srv['fee_en'] ?? $srv['fee']); ?>"><?php echo esc_html($srv['fee']); ?></strong>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label lang-text" data-hi="समय:" data-en="TAT:">समय:</span>
                                <strong class="meta-value lang-text" data-hi="<?php echo esc_attr($srv['time']); ?>" data-en="<?php echo esc_attr($srv['time_en'] ?? $srv['time']); ?>"><?php echo esc_html($srv['time']); ?></strong>
                            </div>
                        </div>

                        <div class="service-docs-preview">
                            <span class="docs-icon"><?php echo jsk_get_svg_icon('check-circle'); ?></span>
                            <span class="docs-text"><strong class="lang-text" data-hi="दस्तावेज:" data-en="Docs:">दस्तावेज:</strong> <?php echo esc_html($srv['documents']); ?></span>
                        </div>

                        <div class="service-card-actions">
                            <button 
                                type="button" 
                                class="btn btn-card-details" 
                                data-service-id="<?php echo esc_attr($srv['id']); ?>"
                                data-title="<?php echo esc_attr($srv['title']); ?>"
                                data-fee="<?php echo esc_attr($srv['fee']); ?>"
                                data-time="<?php echo esc_attr($srv['time']); ?>"
                                data-docs="<?php echo esc_attr($srv['documents']); ?>"
                                data-desc="<?php echo esc_attr($srv['excerpt']); ?>"
                                data-badge="<?php echo esc_attr($srv['badge']); ?>"
                                data-title-en="<?php echo esc_attr($srv['title_en'] ?? $srv['title']); ?>"
                                data-fee-en="<?php echo esc_attr($srv['fee_en'] ?? $srv['fee']); ?>"
                                data-time-en="<?php echo esc_attr($srv['time_en'] ?? $srv['time']); ?>"
                                data-badge-en="<?php echo esc_attr($srv['badge_en'] ?? $srv['badge']); ?>"
                            >
                                <span class="lang-text" data-hi="विवरण" data-en="Details">विवरण</span>
                            </button>
                            <a 
                                href="<?php echo esc_url(home_url('/apply/')); ?>?service_id=<?php echo esc_attr($srv['id']); ?>" 
                                class="btn btn-card-apply"
                                data-service-id="<?php echo esc_attr($srv['id']); ?>"
                                data-service-title="<?php echo esc_attr($srv['title']); ?>"
                            >
                                <span class="lang-text" data-hi="आवेदन करें" data-en="Apply Now">आवेदन करें</span>
                                <span class="btn-arrow">→</span>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="no-search-results" id="noSearchResults" style="display: none;">
            <div class="empty-icon"><?php echo jsk_get_svg_icon('file-text'); ?></div>
            <h3 class="lang-text" data-hi="आपकी खोज से संबंधित कोई सेवा नहीं मिली" data-en="No services match your search">आपकी खोज से संबंधित कोई सेवा नहीं मिली</h3>
            <p class="lang-text" data-hi="कृपया अन्य शब्द खोजें या नीचे दिए गए नंबर पर सीधे संपर्क करें।" data-en="Please try different keywords or contact our helpline directly.">कृपया अन्य शब्द खोजें या नीचे दिए गए नंबर पर सीधे संपर्क करें।</p>
            <button type="button" class="btn btn-secondary mt-3 lang-text" id="resetSearchBtn" data-hi="सभी सेवाएं देखें" data-en="View All Services">सभी सेवाएं देखें</button>
        </div>
    </div>
</section>

<!-- Bottom Guidance Callout -->
<section class="container mb-5">
    <div class="guidance-callout-card">
        <div class="callout-icon"><?php echo jsk_get_svg_icon('shield-check'); ?></div>
        <div class="callout-content">
            <h3 class="lang-text" data-hi="क्या आपको किसी अन्य सेवा की आवश्यकता है?" data-en="Need Any Other Government Service?">क्या आपको किसी अन्य सेवा की आवश्यकता है?</h3>
            <p class="lang-text" data-hi="यदि आपकी वांछित सेवा ऊपर सूची में नहीं दिख रही है, तो आप सीधे हमारे ऑपरेटर से संपर्क कर सकते हैं। केंद्र पर 100+ अतिरिक्त सरकारी पोर्टल सेवाएं उपलब्ध हैं।" data-en="If your required service is not listed above, contact our operator directly. Over 100+ additional government portal services are supported.">यदि आपकी वांछित सेवा ऊपर सूची में नहीं दिख रही है, तो आप सीधे हमारे ऑपरेटर से संपर्क कर सकते हैं। केंद्र पर 100+ अतिरिक्त सरकारी पोर्टल सेवाएं उपलब्ध हैं।</p>
            <div class="callout-actions">
                <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="btn btn-primary lang-text" data-hi="ऑनलाइन आवेदन फॉर्म" data-en="Online Application Form">ऑनलाइन आवेदन फॉर्म</a>
                <a href="https://wa.me/<?php echo esc_attr(jsk_opt('whatsapp')); ?>?text=नमस्ते" target="_blank" rel="noopener" class="btn btn-whatsapp lang-text" data-hi="व्हाट्सएप सहायता" data-en="WhatsApp Help">व्हाट्सएप सहायता</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
