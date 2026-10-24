<?php
/**
 * Front Page Template - Jan Seva Kendra Online Citizen Portal
 */
if (!defined('ABSPATH')) exit;

get_header();

// Fetch all services
$services = jsk_fetch_and_format_services();

// Authentic Jan Seva Kendra citizen & center imagery
$hero_img = JSK_THEME_URI . '/assets/images/hero-service.jpg';
$csc_center_img = JSK_THEME_URI . '/assets/images/center-storefront.jpg';
$citizen_img = JSK_THEME_URI . '/assets/images/citizen-success.jpg';
?>

<!-- 1. HERO SECTION -->
<section class="hero-section">
    <div class="hero-pattern-bg" aria-hidden="true"></div>
    <div class="container hero-container">
        <div class="hero-content">
            <div class="hero-badge">
                <span class="badge-dot"></span>
                <span class="lang-text" data-hi="डिजिटल भारत • अधिकृत जन सेवा केंद्र (CSC Portal)" data-en="Digital India • Authorized Jan Seva Kendra (CSC Portal)">डिजिटल भारत • अधिकृत जन सेवा केंद्र (CSC Portal)</span>
            </div>
            <h1 class="hero-title lang-text" data-hi="<?php echo esc_attr(jsk_opt('hero_title_hi')); ?>" data-en="<?php echo esc_attr(jsk_opt('hero_title_en')); ?>">
                <?php echo wp_kses_post(jsk_opt('hero_title_hi')); ?>
            </h1>
            <p class="hero-lead lang-text" data-hi="<?php echo esc_attr(jsk_opt('hero_lead_hi')); ?>" data-en="<?php echo esc_attr(jsk_opt('hero_lead_en')); ?>">
                <?php echo esc_html(jsk_opt('hero_lead_hi')); ?>
            </p>

            <!-- Hero Live Search Bar -->
            <div class="hero-search-box">
                <div class="search-input-wrapper">
                    <span class="search-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    </span>
                    <input 
                        type="search" 
                        id="heroSearchInput" 
                        class="search-input" 
                        placeholder="सेवा का नाम खोजें (उदा. आधार, पैन कार्ड, आय प्रमाण पत्र, पेंशन, बिजली बिल)..."
                        data-placeholder-hi="सेवा का नाम खोजें (उदा. आधार, पैन कार्ड, आय प्रमाण पत्र, पेंशन, बिजली बिल)..."
                        data-placeholder-en="Search service name (e.g. Aadhaar, PAN Card, Income Certificate, Pension)..."
                        autocomplete="off"
                        aria-label="सेवा खोजें"
                    >
                    <button type="button" class="search-clear-btn" id="searchClearBtn" aria-label="खोज साफ़ करें">&times;</button>
                </div>
                <div class="hero-quick-tags">
                    <span class="tags-label lang-text" data-hi="लोकप्रिय खोज:" data-en="Popular Searches:">लोकप्रिय खोज:</span>
                    <button type="button" class="quick-tag-btn lang-text" data-search="आधार" data-hi="आधार कार्ड" data-en="Aadhaar Card">आधार कार्ड</button>
                    <button type="button" class="quick-tag-btn lang-text" data-search="पैन कार्ड" data-hi="पैन कार्ड" data-en="PAN Card">पैन कार्ड</button>
                    <button type="button" class="quick-tag-btn lang-text" data-search="आय प्रमाण पत्र" data-hi="आय प्रमाण पत्र" data-en="Income Certificate">आय प्रमाण पत्र</button>
                    <button type="button" class="quick-tag-btn lang-text" data-search="पीएम किसान" data-hi="पीएम किसान" data-en="PM Kisan">पीएम किसान</button>
                    <button type="button" class="quick-tag-btn lang-text" data-search="आयुष्मान" data-hi="आयुष्मान कार्ड" data-en="Ayushman Card">आयुष्मान कार्ड</button>
                </div>
            </div>

            <!-- Hero Action Buttons -->
            <div class="hero-cta-group">
                <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="btn btn-hero-primary">
                    <span class="icon"><?php echo jsk_get_svg_icon('file-text'); ?></span>
                    <span class="lang-text" data-hi="ऑनलाइन सेवा आवेदन करें" data-en="Apply Online Now">ऑनलाइन सेवा आवेदन करें</span>
                </a>
                <a href="<?php echo esc_url(home_url('/track/')); ?>" class="btn btn-hero-secondary">
                    <span class="icon"><?php echo jsk_get_svg_icon('clock'); ?></span>
                    <span class="lang-text" data-hi="आवेदन स्थिति जांचें (Track)" data-en="Track Application Status">आवेदन स्थिति जांचें (Track)</span>
                </a>
            </div>

            <!-- Trust Pills Under CTA -->
            <div class="hero-features-list">
                <div class="feat-item">
                    <span class="feat-check">✓</span>
                    <span class="lang-text" data-hi="100% सरकारी मान्यता प्राप्त" data-en="100% Government Recognized">100% सरकारी मान्यता प्राप्त</span>
                </div>
                <div class="feat-item">
                    <span class="feat-check">✓</span>
                    <span class="lang-text" data-hi="अधिकृत डिजिटल हस्ताक्षर" data-en="Authorized Digital Signatures">अधिकृत डिजिटल हस्ताक्षर</span>
                </div>
                <div class="feat-item">
                    <span class="feat-check">✓</span>
                    <span class="lang-text" data-hi="सुरक्षित बायोमेट्रिक प्रणाली" data-en="Secure Biometric System">सुरक्षित बायोमेट्रिक प्रणाली</span>
                </div>
            </div>
        </div>

        <!-- Hero Visual Showcase -->
        <div class="hero-visual-card">
            <div class="visual-card-inner">
                <img 
                    src="<?php echo esc_url($hero_img); ?>" 
                    alt="जन सेवा केंद्र नागरिक सेवा सहायता" 
                    class="hero-main-img" 
                    loading="eager"
                    width="600" 
                    height="400"
                >
                <div class="glass-card card-stat-1">
                    <div class="glass-stat-icon"><?php echo jsk_get_svg_icon('user-check'); ?></div>
                    <div>
                        <strong class="stat-number"><?php echo esc_html(jsk_opt('stat_citizens')); ?></strong>
                        <span class="stat-text lang-text" data-hi="संतुष्ट स्थानीय नागरिक" data-en="Satisfied Citizens">संतुष्ट स्थानीय नागरिक</span>
                    </div>
                </div>
                <div class="glass-card card-stat-2">
                    <div class="glass-stat-icon text-success"><?php echo jsk_get_svg_icon('award'); ?></div>
                    <div>
                        <strong class="stat-number">99.8%</strong>
                        <span class="stat-text lang-text" data-hi="समयबद्ध निस्तारण" data-en="Timely Resolution">समयबद्ध निस्तारण</span>
                    </div>
                </div>
                <div class="glass-card card-stat-3">
                    <div class="glass-stat-icon text-orange"><?php echo jsk_get_svg_icon('shield-check'); ?></div>
                    <div>
                        <strong class="stat-title lang-text" data-hi="सीएससी अधिकृत केंद्र" data-en="CSC Authorized Center">सीएससी अधिकृत केंद्र</strong>
                        <span class="stat-text">आईडी: <?php echo esc_html(jsk_opt('csc_id')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. QUICK STATS COUNTER BAR -->
<section class="stats-counter-strip">
    <div class="container stats-grid">
        <div class="stat-box">
            <span class="stat-digit">100+</span>
            <span class="stat-label lang-text" data-hi="सक्रिय डिजिटल सेवाएं" data-en="Active Digital Services">सक्रिय डिजिटल सेवाएं</span>
        </div>
        <div class="stat-box">
            <span class="stat-digit"><?php echo esc_html(jsk_opt('stat_tat')); ?></span>
            <span class="stat-label lang-text" data-hi="औसत प्रमाण पत्र निस्तारण" data-en="Average Certificate TAT">औसत प्रमाण पत्र निस्तारण</span>
        </div>
        <div class="stat-box">
            <span class="stat-digit"><?php echo esc_html(jsk_opt('stat_fee')); ?></span>
            <span class="stat-label lang-text" data-hi="शून्य अतिरिक्त गुप्त शुल्क" data-en="Zero Hidden Charges">शून्य अतिरिक्त गुप्त शुल्क</span>
        </div>
        <div class="stat-box">
            <span class="stat-digit"><?php echo esc_html(jsk_opt('stat_hours')); ?></span>
            <span class="stat-label lang-text" data-hi="प्रतिदिन केंद्र सेवा समय" data-en="Daily Center Working Hours">प्रतिदिन केंद्र सेवा समय</span>
        </div>
    </div>
</section>

<!-- 3. SERVICES DIRECTORY SECTION -->
<section class="services-section" id="services">
    <div class="container">
        <div class="section-header text-center">
            <div class="section-badge-pill lang-text" data-hi="नागरिक सेवा निर्देशिका" data-en="Citizen Services Directory">नागरिक सेवा निर्देशिका</div>
            <h2 class="section-title lang-text" data-hi="हमारे केंद्र द्वारा प्रदान की जाने वाली प्रमुख सेवाएं" data-en="Major Citizen & E-Governance Services">हमारे केंद्र द्वारा प्रदान की जाने वाली प्रमुख सेवाएं</h2>
            <p class="section-subtitle lang-text" data-hi="अपनी वांछित सेवा चुनें, आवश्यक दस्तावेज देखें और घर बैठे तुरंत ऑनलाइन आवेदन जमा करें" data-en="Select your desired service, view required documents, and submit your application online from home">
                अपनी वांछित सेवा चुनें, आवश्यक दस्तावेज देखें और घर बैठे तुरंत ऑनलाइन आवेदन जमा करें
            </p>
        </div>

        <!-- Category Filter Tabs -->
        <div class="category-tabs-wrapper">
            <div class="category-tabs" role="tablist" aria-label="सेवा श्रेणियां">
                <button type="button" class="tab-btn active" data-filter="all" role="tab" aria-selected="true">
                    <span class="lang-text" data-hi="सभी सेवाएं (All)" data-en="All Services">सभी सेवाएं (All)</span>
                </button>
                <button type="button" class="tab-btn" data-filter="identity" role="tab" aria-selected="false">
                    <span class="lang-text" data-hi="पहचान व दस्तावेज" data-en="Identity & Documents">पहचान व दस्तावेज</span>
                </button>
                <button type="button" class="tab-btn" data-filter="certificate" role="tab" aria-selected="false">
                    <span class="lang-text" data-hi="आय, जाति व निवास" data-en="Certificates & Revenue">आय, जाति व निवास</span>
                </button>
                <button type="button" class="tab-btn" data-filter="schemes" role="tab" aria-selected="false">
                    <span class="lang-text" data-hi="सरकारी योजनाएं व पेंशन" data-en="Govt Schemes & Pension">सरकारी योजनाएं व पेंशन</span>
                </button>
                <button type="button" class="tab-btn" data-filter="banking" role="tab" aria-selected="false">
                    <span class="lang-text" data-hi="बैंकिंग व बीमा (AEPS)" data-en="Banking & Insurance (AEPS)">बैंकिंग व बीमा (AEPS)</span>
                </button>
                <button type="button" class="tab-btn" data-filter="utility" role="tab" aria-selected="false">
                    <span class="lang-text" data-hi="बिल व रिचार्ज" data-en="Bills & Utilities">बिल व रिचार्ज</span>
                </button>
                <button type="button" class="tab-btn" data-filter="education" role="tab" aria-selected="false">
                    <span class="lang-text" data-hi="शिक्षा व भर्ती फॉर्म" data-en="Education & Jobs">शिक्षा व भर्ती फॉर्म</span>
                </button>
            </div>
        </div>

        <!-- Live Services Count & Filter Status -->
        <div class="services-status-bar">
            <span id="serviceResultsCount" class="lang-text" data-hi="कुल <?php echo count($services); ?> सेवाएं उपलब्ध हैं" data-en="Total <?php echo count($services); ?> services available">कुल <strong><?php echo count($services); ?></strong> सेवाएं उपलब्ध हैं</span>
            <span class="filter-hint lang-text" data-hi="किसी भी सेवा पर क्लिक करके आवश्यक दस्तावेज व शुल्क जानें" data-en="Click on any service to view required documents and fee details">किसी भी सेवा पर क्लिक करके आवश्यक दस्तावेज व शुल्क जानें</span>
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
                    >
                        <div class="card-header-row">
                            <span class="service-cat-pill lang-text" data-hi="<?php echo esc_attr($srv['cat_name']); ?>" data-en="<?php echo esc_attr($srv['cat_name_en']); ?>"><?php echo esc_html($srv['cat_name']); ?></span>
                            <?php if (!empty($srv['badge'])): ?>
                                <span class="service-badge-pill lang-text" data-hi="<?php echo esc_attr($srv['badge']); ?>" data-en="<?php echo esc_attr($srv['badge_en']); ?>"><?php echo esc_html($srv['badge']); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="card-icon-title">
                            <div class="service-icon-box" aria-hidden="true">
                                <?php echo jsk_get_svg_icon($srv['icon']); ?>
                            </div>
                            <h3 class="service-title lang-text" data-hi="<?php echo esc_attr($srv['title']); ?>" data-en="<?php echo esc_attr($srv['title_en']); ?>"><?php echo esc_html($srv['title']); ?></h3>
                        </div>

                        <p class="service-desc"><?php echo esc_html($srv['excerpt']); ?></p>

                        <div class="service-meta-box">
                            <div class="meta-item">
                                <span class="meta-label lang-text" data-hi="शुल्क:" data-en="Fee:">शुल्क:</span>
                                <strong class="meta-value text-primary lang-text" data-hi="<?php echo esc_attr($srv['fee']); ?>" data-en="<?php echo esc_attr($srv['fee_en']); ?>"><?php echo esc_html($srv['fee']); ?></strong>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label lang-text" data-hi="समय:" data-en="Time:">समय:</span>
                                <strong class="meta-value lang-text" data-hi="<?php echo esc_attr($srv['time']); ?>" data-en="<?php echo esc_attr($srv['time_en']); ?>"><?php echo esc_html($srv['time']); ?></strong>
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
                                data-title-en="<?php echo esc_attr($srv['title_en']); ?>"
                                data-fee="<?php echo esc_attr($srv['fee']); ?>"
                                data-fee-en="<?php echo esc_attr($srv['fee_en']); ?>"
                                data-time="<?php echo esc_attr($srv['time']); ?>"
                                data-time-en="<?php echo esc_attr($srv['time_en']); ?>"
                                data-docs="<?php echo esc_attr($srv['documents']); ?>"
                                data-desc="<?php echo esc_attr($srv['excerpt']); ?>"
                                data-badge="<?php echo esc_attr($srv['badge']); ?>"
                                data-badge-en="<?php echo esc_attr($srv['badge_en']); ?>"
                            >
                                <span class="lang-text" data-hi="विवरण" data-en="Details">विवरण</span>
                            </button>
                            <button 
                                type="button" 
                                class="btn btn-card-apply" 
                                data-service-id="<?php echo esc_attr($srv['id']); ?>"
                                data-service-title="<?php echo esc_attr($srv['title']); ?>"
                                data-service-title-en="<?php echo esc_attr($srv['title_en']); ?>"
                            >
                                <span class="lang-text" data-hi="आवेदन करें" data-en="Apply Now">आवेदन करें</span>
                                <span class="btn-arrow">→</span>
                            </button>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-services-box">
                    <p>सेवाएं लोड हो रही हैं... कृपया पृष्ठ को रीफ्रेश करें।</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="no-search-results" id="noSearchResults" style="display: none;">
            <div class="empty-icon"><?php echo jsk_get_svg_icon('file-text'); ?></div>
            <h3 class="lang-text" data-hi="आपकी खोज से संबंधित कोई सेवा नहीं मिली" data-en="No services found matching your search">आपकी खोज से संबंधित कोई सेवा नहीं मिली</h3>
            <p class="lang-text" data-hi="कृपया अन्य शब्द खोजें या नीचे दिए गए नंबर पर सीधे संपर्क करें।" data-en="Please try another keyword or contact our helpline directly.">कृपया अन्य शब्द खोजें या नीचे दिए गए नंबर पर सीधे संपर्क करें।</p>
            <button type="button" class="btn btn-secondary mt-3" id="resetSearchBtn">
                <span class="lang-text" data-hi="सभी सेवाएं देखें" data-en="View All Services">सभी सेवाएं देखें</span>
            </button>
        </div>
    </div>
</section>

<!-- 4. ONLINE APPLICATION FORM SECTION -->
<section class="apply-section" id="apply-form-section">
    <div class="container">
        <div class="apply-card-container">
            <div class="apply-info-side">
                <div class="section-badge-pill pill-light lang-text" data-hi="सुगम नागरिक सेवा" data-en="Citizen Service Delivery">सुगम नागरिक सेवा</div>
                <h2 class="apply-side-title lang-text" data-hi="घर बैठे ऑनलाइन सेवा आवेदन दर्ज करें" data-en="Submit Online Service Request From Home">घर बैठे ऑनलाइन सेवा आवेदन दर्ज करें</h2>
                <p class="apply-side-text lang-text" data-hi="आपको केंद्र पर लाइन में लगने की आवश्यकता नहीं है। नीचे दिया गया फॉर्म भरें, आपको तुरंत ट्रैकिंग आईडी मिलेगी और हमारा ऑपरेटर आपसे संपर्क करेगा।" data-en="No need to stand in long queues. Fill the form below to receive an instant tracking ID, and our operator will contact you promptly.">
                    आपको केंद्र पर लाइन में लगने की आवश्यकता नहीं है। नीचे दिया गया फॉर्म भरें, आपको तुरंत ट्रैकिंग आईडी मिलेगी और हमारा ऑपरेटर आपसे संपर्क करेगा।
                </p>

                <div class="citizen-success-card">
                    <img src="<?php echo esc_url($citizen_img); ?>" alt="संतुष्ट नागरिक प्रमाण पत्र प्राप्त करते हुए" class="citizen-success-img" loading="lazy">
                    <div class="citizen-success-overlay">
                        <span class="badge-verified lang-text" data-hi="✓ 100% अधिकृत सरकारी प्रमाण पत्र" data-en="✓ 100% Authorized Govt Certificate">✓ 100% अधिकृत सरकारी प्रमाण पत्र</span>
                        <p class="citizen-success-text lang-text" data-hi="गांव व शहर के 50,000+ नागरिकों का अटूट भरोसा" data-en="Trusted by 50,000+ Citizens Across Villages & City">गांव व शहर के 50,000+ नागरिकों का अटूट भरोसा</p>
                    </div>
                </div>

                <div class="apply-steps-list">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <div class="step-text">
                            <strong class="lang-text" data-hi="सेवा व विवरण चुनें" data-en="Select Service & Details">सेवा व विवरण चुनें</strong>
                            <span class="lang-text" data-hi="जिस सेवा का लाभ लेना चाहते हैं उसका चयन करें।" data-en="Choose the government or banking service you need.">जिस सेवा का लाभ लेना चाहते हैं उसका चयन करें।</span>
                        </div>
                    </div>
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <div class="step-text">
                            <strong class="lang-text" data-hi="ट्रैकिंग संदर्भ रसीद प्राप्त करें" data-en="Get Instant Reference Receipt">ट्रैकिंग संदर्भ रसीद प्राप्त करें</strong>
                            <span class="lang-text" data-hi="फॉर्म सबमिट होते ही आपकी अनूठी संदर्भ आईडी (JSK ID) जनरेट होगी।" data-en="Your unique tracking ID (JSK ID) is generated immediately.">फॉर्म सबमिट होते ही आपकी अनूठी संदर्भ आईडी (JSK ID) जनरेट होगी।</span>
                        </div>
                    </div>
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <div class="step-text">
                            <strong class="lang-text" data-hi="दस्तावेज सत्यापन एवं निस्तारण" data-en="Document Verification & Resolution">दस्तावेज सत्यापन एवं निस्तारण</strong>
                            <span class="lang-text" data-hi="दस्तावेज व्हाट्सएप या केंद्र पर जमा करें और प्रमाण पत्र प्राप्त करें।" data-en="Submit documents via WhatsApp or at center and collect verified certificate.">दस्तावेज व्हाट्सएप या केंद्र पर जमा करें और प्रमाण पत्र प्राप्त करें।</span>
                        </div>
                    </div>
                </div>

                <div class="side-support-box">
                    <div class="support-icon"><?php echo jsk_get_svg_icon('phone'); ?></div>
                    <div>
                        <span class="support-label lang-text" data-hi="फॉर्म भरने में सहायता चाहिए?" data-en="Need help filling the form?">फॉर्म भरने में सहायता चाहिए?</span>
                        <a href="tel:+919876543210" class="support-phone">+91 98765 43210</a>
                    </div>
                </div>
            </div>

            <!-- Form Side -->
            <div class="apply-form-side">
                <div class="form-header-box">
                    <h3 class="form-title lang-text" data-hi="ऑनलाइन नागरिक सेवा अनुरोध फॉर्म" data-en="Online Citizen Service Request Form">ऑनलाइन नागरिक सेवा अनुरोध फॉर्म</h3>
                    <p class="form-subtitle lang-text" data-hi="कृपया अपनी सही जानकारी भरें (सभी विवरण सुरक्षित हैं)" data-en="Please enter accurate details (all information is encrypted & secure)">कृपया अपनी सही जानकारी भरें (सभी विवरण सुरक्षित हैं)</p>
                </div>

                <form id="citizenApplyForm" class="citizen-form" novalidate>
                    <!-- Service Select -->
                    <div class="form-group">
                        <label for="applyServiceSelect" class="form-label lang-text" data-hi="वांछित सेवा का चयन करें *" data-en="Select Desired Service *">
                            वांछित सेवा का चयन करें <span class="required">*</span>
                        </label>
                        <select id="applyServiceSelect" name="service_id" class="form-select" required>
                            <option value="" class="lang-text" data-hi="-- कृपया एक सेवा चुनें --" data-en="-- Please Select a Service --">-- कृपया एक सेवा चुनें --</option>
                            <?php foreach ($services as $srv): ?>
                                <option 
                                    value="<?php echo esc_attr($srv['id']); ?>" 
                                    data-title="<?php echo esc_attr($srv['title']); ?>"
                                    data-title-en="<?php echo esc_attr($srv['title_en'] ?? $srv['title']); ?>"
                                    data-cat="<?php echo esc_attr($srv['cat_name']); ?>"
                                    data-cat-en="<?php echo esc_attr($srv['cat_name_en'] ?? $srv['cat_name']); ?>"
                                >
                                    <?php echo esc_html($srv['title']); ?> (<?php echo esc_html($srv['cat_name']); ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" id="applyServiceName" name="service_name" value="">
                    </div>

                    <!-- Row: Name & Mobile -->
                    <div class="form-row-2">
                        <div class="form-group">
                            <label for="applyName" class="form-label lang-text" data-hi="आवेदक का पूरा नाम *" data-en="Applicant Full Name *">
                                आवेदक का पूरा नाम <span class="required">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="applyName" 
                                name="name" 
                                class="form-input" 
                                placeholder="उदा. रमेश कुमार शर्मा" 
                                data-placeholder-hi="उदा. रमेश कुमार शर्मा"
                                data-placeholder-en="e.g. Ramesh Kumar Sharma"
                                required
                            >
                        </div>
                        <div class="form-group">
                            <label for="applyMobile" class="form-label lang-text" data-hi="मोबाइल नंबर (10 अंक) *" data-en="Mobile Number (10 digits) *">
                                मोबाइल नंबर (10 अंक) <span class="required">*</span>
                            </label>
                            <input 
                                type="tel" 
                                id="applyMobile" 
                                name="mobile" 
                                class="form-input" 
                                placeholder="उदा. 9876543210" 
                                data-placeholder-hi="उदा. 9876543210"
                                data-placeholder-en="e.g. 9876543210"
                                pattern="[6-9][0-9]{9}"
                                maxlength="10"
                                required
                            >
                        </div>
                    </div>

                    <!-- Row: Village/City & District -->
                    <div class="form-row-2">
                        <div class="form-group">
                            <label for="applyVillage" class="form-label lang-text" data-hi="ग्राम / कस्बा / वार्ड" data-en="Village / Town / Ward">ग्राम / कस्बा / वार्ड</label>
                            <input 
                                type="text" 
                                id="applyVillage" 
                                name="village_city" 
                                class="form-input" 
                                placeholder="उदा. रामपुर / वार्ड संख्या 5"
                                data-placeholder-hi="उदा. रामपुर / वार्ड संख्या 5"
                                data-placeholder-en="e.g. Rampur / Ward No. 5"
                            >
                        </div>
                        <div class="form-group">
                            <label for="applyDistrict" class="form-label lang-text" data-hi="जिला एवं राज्य" data-en="District & State">जिला एवं राज्य</label>
                            <input 
                                type="text" 
                                id="applyDistrict" 
                                name="district" 
                                class="form-input" 
                                placeholder="उदा. मेरठ, उत्तर प्रदेश"
                                data-placeholder-hi="उदा. मेरठ, उत्तर प्रदेश"
                                data-placeholder-en="e.g. Meerut, Uttar Pradesh"
                                value="उत्तर प्रदेश"
                            >
                        </div>
                    </div>

                    <!-- Row: Identity hint -->
                    <div class="form-group">
                        <label for="applyAadhaar" class="form-label lang-text" data-hi="आधार कार्ड के अंतिम 4 अंक (पहचान सत्यापन हेतु)" data-en="Last 4 Digits of Aadhaar (For Verification)">
                            आधार कार्ड के अंतिम 4 अंक (पहचान सत्यापन हेतु)
                        </label>
                        <input 
                            type="text" 
                            id="applyAadhaar" 
                            name="aadhaar_last" 
                            class="form-input" 
                            placeholder="XXXX XXXX 1234"
                            data-placeholder-hi="XXXX XXXX 1234"
                            data-placeholder-en="XXXX XXXX 1234"
                            maxlength="4"
                        >
                        <small class="form-hint lang-text" data-hi="गोपनीयता के लिए केवल अंतिम 4 अंक दर्ज करें।" data-en="For your privacy, only enter the last 4 digits.">गोपनीयता के लिए केवल अंतिम 4 अंक दर्ज करें।</small>
                    </div>

                    <!-- Notes -->
                    <div class="form-group">
                        <label for="applyNotes" class="form-label lang-text" data-hi="अतिरिक्त टिप्पणी या विशेष आवश्यकता" data-en="Additional Remarks or Special Requirements">अतिरिक्त टिप्पणी या विशेष आवश्यकता</label>
                        <textarea 
                            id="applyNotes" 
                            name="notes" 
                            rows="2" 
                            class="form-textarea" 
                            placeholder="उदा. मुझे तत्काल प्रमाण पत्र की आवश्यकता है / मोबाइल नंबर लिंक है..."
                            data-placeholder-hi="उदा. मुझे तत्काल प्रमाण पत्र की आवश्यकता है / मोबाइल नंबर लिंक है..."
                            data-placeholder-en="e.g. Need certificate urgently / Mobile is linked..."
                        ></textarea>
                    </div>

                    <!-- Privacy & Submission Consent -->
                    <div class="form-consent">
                        <input type="checkbox" id="applyConsent" class="form-checkbox" checked required>
                        <label for="applyConsent" class="lang-text" data-hi="मैं पुष्टि करता/करती हूँ कि मेरे द्वारा दी गई जानकारी सही है एवं मैं जन सेवा केंद्र द्वारा संपर्क किए जाने की सहमति देता/देती हूँ।" data-en="I confirm that the details provided are accurate and I consent to being contacted by Jan Seva Kendra operators.">
                            मैं पुष्टि करता/करती हूँ कि मेरे द्वारा दी गई जानकारी सही है एवं मैं जन सेवा केंद्र द्वारा संपर्क किए जाने की सहमति देता/देती हूँ।
                        </label>
                    </div>

                    <!-- Form Alert message -->
                    <div id="applyAlert" class="form-alert" style="display: none;"></div>

                    <!-- Submit Button -->
                    <div class="form-submit-row">
                        <button type="submit" class="btn btn-submit-apply" id="applySubmitBtn">
                            <span class="btn-spinner" style="display: none;"></span>
                            <span class="btn-text lang-text" data-hi="आवेदन दर्ज करें (सबमिट)" data-en="Submit Application Now">आवेदन दर्ज करें (सबमिट)</span>
                            <span class="btn-arrow">✓</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- 5. APPLICATION STATUS TRACKER SECTION -->
<section class="track-section" id="track-section">
    <div class="container">
        <div class="section-header text-center">
            <div class="section-badge-pill lang-text" data-hi="त्वरित ट्रैकिंग" data-en="Instant Tracking">त्वरित ट्रैकिंग</div>
            <h2 class="section-title lang-text" data-hi="अपने आवेदन की ताज़ा स्थिति जांचें" data-en="Check Live Application Status">अपने आवेदन की ताज़ा स्थिति जांचें</h2>
            <p class="section-subtitle lang-text" data-hi="अपना आवेदन संदर्भ नंबर (उदा. JSK-2026-XXXXX) या पंजीकृत मोबाइल नंबर दर्ज करें" data-en="Enter your reference code (e.g. JSK-2026-XXXXX) or registered 10-digit mobile number">
                अपना आवेदन संदर्भ नंबर (उदा. JSK-2026-XXXXX) या पंजीकृत मोबाइल नंबर दर्ज करें
            </p>
        </div>

        <div class="track-card">
            <form id="trackForm" class="track-search-form" novalidate>
                <div class="track-input-group">
                    <span class="track-icon"><?php echo jsk_get_svg_icon('clock'); ?></span>
                    <input 
                        type="text" 
                        id="trackRefInput" 
                        class="track-input" 
                        placeholder="संदर्भ नंबर (उदा. JSK-2026-AB12C) या 10 अंकों का मोबाइल दर्ज करें..." 
                        data-placeholder-hi="संदर्भ नंबर (उदा. JSK-2026-AB12C) या 10 अंकों का मोबाइल दर्ज करें..." 
                        data-placeholder-en="Reference number (e.g. JSK-2026-AB12C) or 10-digit mobile number..." 
                        required
                    >
                    <button type="submit" class="btn btn-track-submit" id="trackSubmitBtn">
                        <span class="track-spinner" style="display: none;"></span>
                        <span class="lang-text" data-hi="स्थिति जांचें" data-en="Check Status">स्थिति जांचें</span>
                    </button>
                </div>
            </form>

            <div id="trackAlert" class="form-alert mt-3" style="display: none;"></div>

            <!-- Tracking Result Display Box -->
            <div id="trackResultBox" class="track-result-wrapper" style="display: none;">
                <div class="track-result-header">
                    <div class="track-res-info">
                        <span class="track-res-id" id="trackResId">JSK-2026-00000</span>
                        <h3 class="track-res-name" id="trackResName">नागरिक नाम</h3>
                        <p class="track-res-service"><span class="lang-text" data-hi="सेवा:" data-en="Service:">सेवा:</span> <strong id="trackResService">आय प्रमाण पत्र</strong></p>
                    </div>
                    <div class="track-res-status">
                        <span class="status-badge" id="trackResBadge">प्रक्रियाधीन</span>
                    </div>
                </div>

                <!-- Animated Progress Stepper -->
                <div class="stepper-wrapper">
                    <div class="stepper-line" id="stepperLine"></div>
                    <div class="stepper-steps" id="stepperSteps">
                        <!-- Populated dynamically via JS -->
                    </div>
                </div>

                <div class="track-footer-help">
                    <span class="lang-text" data-hi="कोई प्रश्न है या दस्तावेज जमा करना चाहते हैं?" data-en="Have questions or need to submit supporting documents?">कोई प्रश्न है या दस्तावेज जमा करना चाहते हैं?</span>
                    <a href="https://wa.me/919876543210?text=नमस्ते,%20मैं%20अपने%20आवेदन%20के%20बारे%20में%20पूछना%20चाहता%20हूँ" target="_blank" rel="noopener" class="btn btn-whatsapp-sm">
                        <span class="lang-text" data-hi="व्हाट्सएप पर सहायता लें" data-en="Get Help on WhatsApp">व्हाट्सएप पर सहायता लें</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. TRANSPARENT FEE LIST SECTION -->
<section class="fee-section" id="fee-chart">
    <div class="container">
        <div class="section-header text-center">
            <div class="section-badge-pill lang-text" data-hi="पारदर्शी व्यवस्था" data-en="Transparent Pricing">पारदर्शी व्यवस्था</div>
            <h2 class="section-title lang-text" data-hi="सरकारी एवं केंद्र सेवा शुल्क दर तालिका" data-en="Government & Center Official Fee Rate Chart">सरकारी एवं केंद्र सेवा शुल्क दर तालिका</h2>
            <p class="section-subtitle lang-text" data-hi="हमारे केंद्र पर शासन द्वारा निर्धारित न्यूनतम शुल्क लिया जाता है, कोई गुप्त या अतिरिक्त चार्ज नहीं" data-en="Only government mandated nominal service charges are collected at our center, no hidden charges">
                हमारे केंद्र पर शासन द्वारा निर्धारित न्यूनतम शुल्क लिया जाता है, कोई गुप्त या अतिरिक्त चार्ज नहीं
            </p>
        </div>

        <div class="fee-table-card">
            <div class="table-responsive">
                <table class="fee-table">
                    <thead>
                        <tr>
                            <th class="lang-text" data-hi="क्र.सं." data-en="S.No.">क्र.सं.</th>
                            <th class="lang-text" data-hi="सेवा का नाम" data-en="Service Name">सेवा का नाम</th>
                            <th class="lang-text" data-hi="सरकारी शुल्क (Govt Fee)" data-en="Govt Fee">सरकारी शुल्क (Govt Fee)</th>
                            <th class="lang-text" data-hi="केंद्र सेवा शुल्क (CSC Fee)" data-en="CSC Fee">केंद्र सेवा शुल्क (CSC Fee)</th>
                            <th class="lang-text" data-hi="कुल देय शुल्क (Total)" data-en="Total Fee">कुल देय शुल्क (Total)</th>
                            <th class="lang-text" data-hi="निस्तारण समय" data-en="TAT / Resolution Time">निस्तारण समय</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><strong class="lang-text" data-hi="आय प्रमाण पत्र (Income Certificate)" data-en="Income Certificate">आय प्रमाण पत्र (Income Certificate)</strong></td>
                            <td>₹15</td>
                            <td>₹15</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td class="lang-text" data-hi="3 से 5 कार्य दिवस" data-en="3 to 5 Working Days">3 से 5 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><strong class="lang-text" data-hi="जाति प्रमाण पत्र (Caste Certificate)" data-en="Caste Certificate">जाति प्रमाण पत्र (Caste Certificate)</strong></td>
                            <td>₹15</td>
                            <td>₹15</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td class="lang-text" data-hi="4 से 7 कार्य दिवस" data-en="4 to 7 Working Days">4 से 7 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><strong class="lang-text" data-hi="मूल निवास प्रमाण पत्र (Domicile)" data-en="Domicile Certificate">मूल निवास प्रमाण पत्र (Domicile)</strong></td>
                            <td>₹15</td>
                            <td>₹15</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td class="lang-text" data-hi="3 से 5 कार्य दिवस" data-en="3 to 5 Working Days">3 से 5 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><strong class="lang-text" data-hi="नया पैन कार्ड (NSDL/UTI)" data-en="New PAN Card (NSDL/UTI)">नया पैन कार्ड (NSDL/UTI)</strong></td>
                            <td>₹107</td>
                            <td>₹43</td>
                            <td><strong class="fee-total">₹150</strong></td>
                            <td class="lang-text" data-hi="3 से 7 कार्य दिवस" data-en="3 to 7 Working Days">3 से 7 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><strong class="lang-text" data-hi="आधार सुधार / बायोमेट्रिक अपडेट" data-en="Aadhaar Correction / Biometric Update">आधार सुधार / बायोमेट्रिक अपडेट</strong></td>
                            <td>₹50</td>
                            <td class="lang-text" data-hi="₹0 (शून्य)" data-en="₹0 (Free)">₹0 (शून्य)</td>
                            <td><strong class="fee-total">₹50</strong></td>
                            <td class="lang-text" data-hi="3 से 7 कार्य दिवस" data-en="3 to 7 Working Days">3 से 7 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><strong class="lang-text" data-hi="आयुष्मान भारत गोल्डन कार्ड" data-en="Ayushman Bharat Golden Card">आयुष्मान भारत गोल्डन कार्ड</strong></td>
                            <td class="lang-text" data-hi="₹0 (निशुल्क)" data-en="₹0 (Free)">₹0 (निशुल्क)</td>
                            <td class="lang-text" data-hi="₹20 (पीवीसी प्रिंट)" data-en="₹20 (PVC Print)">₹20 (पीवीसी प्रिंट)</td>
                            <td><strong class="fee-total">₹20</strong></td>
                            <td class="lang-text" data-hi="तत्काल 10 मिनट" data-en="Instant 10 Mins">तत्काल 10 मिनट</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><strong class="lang-text" data-hi="पीएम किसान ई-केवाईसी (Biometric)" data-en="PM Kisan e-KYC (Biometric)">पीएम किसान ई-केवाईसी (Biometric)</strong></td>
                            <td class="lang-text" data-hi="₹0 (निशुल्क)" data-en="₹0 (Free)">₹0 (निशुल्क)</td>
                            <td>₹30</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td class="lang-text" data-hi="तत्काल 5 मिनट" data-en="Instant 5 Mins">तत्काल 5 मिनट</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td><strong class="lang-text" data-hi="बिजली बिल भुगतान" data-en="Electricity Bill Payment">बिजली बिल भुगतान</strong></td>
                            <td class="lang-text" data-hi="बिल अनुसार" data-en="As per Bill">बिल अनुसार</td>
                            <td class="lang-text" data-hi="₹0 (शून्य अतिरिक्त)" data-en="₹0 (Zero Extra)">₹0 (शून्य अतिरिक्त)</td>
                            <td><strong class="fee-total lang-text" data-hi="केवल बिल राशि" data-en="Exact Bill Amount">केवल बिल राशि</strong></td>
                            <td class="lang-text" data-hi="तत्काल रसीद" data-en="Instant Receipt">तत्काल रसीद</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td><strong class="lang-text" data-hi="आधार एटीएम (AEPS) नगद निकासी" data-en="Aadhaar ATM (AEPS) Cash Withdrawal">आधार एटीएम (AEPS) नगद निकासी</strong></td>
                            <td class="lang-text" data-hi="बैंक अनुसार" data-en="As per Bank">बैंक अनुसार</td>
                            <td class="lang-text" data-hi="₹0 (शून्य)" data-en="₹0 (Free)">₹0 (शून्य)</td>
                            <td><strong class="fee-total lang-text" data-hi="निशुल्क निकासी" data-en="Free Withdrawal">निशुल्क निकासी</strong></td>
                            <td class="lang-text" data-hi="तत्काल 1 मिनट" data-en="Instant 1 Min">तत्काल 1 मिनट</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td><strong class="lang-text" data-hi="ई-श्रम कार्ड नया पंजीकरण" data-en="e-Shram Card Registration">ई-श्रम कार्ड नया पंजीकरण</strong></td>
                            <td class="lang-text" data-hi="₹0 (निशुल्क)" data-en="₹0 (Free)">₹0 (निशुल्क)</td>
                            <td class="lang-text" data-hi="₹30 (लैमिनेटेड प्रिंट)" data-en="₹30 (Laminated Print)">₹30 (लैमिनेटेड प्रिंट)</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td class="lang-text" data-hi="तत्काल 10 मिनट" data-en="Instant 10 Mins">तत्काल 10 मिनट</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="fee-note-strip">
                <span class="note-icon">ℹ️</span>
                <span class="lang-text" data-hi="नोट: सभी शुल्कों की अधिकृत रसीद दी जाती है। किसी भी अतिरिक्त राशि की मांग होने पर हेल्पलाइन 1800-3000-3468 पर शिकायत करें।" data-en="Note: Official computer receipt is issued for every service. Report any overcharging to helpline 1800-3000-3468.">नोट: सभी शुल्कों की अधिकृत रसीद दी जाती है। किसी भी अतिरिक्त राशि की मांग होने पर हेल्पलाइन 1800-3000-3468 पर शिकायत करें।</span>
            </div>
        </div>
    </div>
</section>

<!-- 7. DOCUMENTS GUIDELINES & CHECKLIST -->
<section class="docs-guide-section" id="documents-guide">
    <div class="container">
        <div class="section-header text-center">
            <div class="section-badge-pill lang-text" data-hi="तैयारी चेकलिस्ट" data-en="Preparation Checklist">तैयारी चेकलिस्ट</div>
            <h2 class="section-title lang-text" data-hi="आवेदन से पहले जरूरी दस्तावेज चेकलिस्ट" data-en="Documents Checklist Before Applying">आवेदन से पहले जरूरी दस्तावेज चेकलिस्ट</h2>
            <p class="section-subtitle lang-text" data-hi="आवेदन को त्वरित और बिना त्रुटि स्वीकृत कराने हेतु इन दस्तावेजों को तैयार रखें" data-en="Keep these mandatory documents ready for swift and error-free application processing">
                आवेदन को त्वरित और बिना त्रुटि स्वीकृत कराने हेतु इन दस्तावेजों को तैयार रखें
            </p>
        </div>

        <div class="docs-guide-grid">
            <div class="guide-card">
                <div class="guide-header">
                    <span class="guide-badge lang-text" data-hi="पहचान दस्तावेज" data-en="Identity Documents">पहचान दस्तावेज</span>
                    <h3 class="lang-text" data-hi="आय / जाति / निवास प्रमाण पत्र हेतु" data-en="For Income / Caste / Domicile Certificates">आय / जाति / निवास प्रमाण पत्र हेतु</h3>
                </div>
                <ul class="guide-list">
                    <li class="lang-text" data-hi="✓ आवेदक का आधार कार्ड (दोनों तरफ साफ कॉपी)" data-en="✓ Applicant Aadhaar Card (Clear both sides copy)">✓ आवेदक का आधार कार्ड (दोनों तरफ साफ कॉपी)</li>
                    <li class="lang-text" data-hi="✓ नवीनतम पासपोर्ट साइज फोटो (सफेद पृष्ठभूमि)" data-en="✓ Recent Passport Size Photo (White background)">✓ नवीनतम पासपोर्ट साइज फोटो (सफेद पृष्ठभूमि)</li>
                    <li class="lang-text" data-hi="✓ स्वप्रमाणित घोषणा पत्र (केंद्र पर उपलब्ध)" data-en="✓ Self-Declaration Form (Available at Center)">✓ स्वप्रमाणित घोषणा पत्र (केंद्र पर उपलब्ध)</li>
                    <li class="lang-text" data-hi="✓ बिजली का बिल / राशन कार्ड की छायाप्रति" data-en="✓ Electricity Bill / Ration Card copy">✓ बिजली का बिल / राशन कार्ड की छायाप्रति</li>
                    <li class="lang-text" data-hi="✓ जाति प्रमाण पत्र हेतु परिवार के सदस्य का पुराना रिकॉर्ड" data-en="✓ Family old caste record for Caste Certificate">✓ जाति प्रमाण पत्र हेतु परिवार के सदस्य का पुराना रिकॉर्ड</li>
                </ul>
            </div>

            <div class="guide-card">
                <div class="guide-header">
                    <span class="guide-badge lang-text" data-hi="पैन कार्ड सेवाएं" data-en="PAN Card Services">पैन कार्ड सेवाएं</span>
                    <h3 class="lang-text" data-hi="नया पैन कार्ड अथवा सुधार हेतु" data-en="For New PAN Card or Correction">नया पैन कार्ड अथवा सुधार हेतु</h3>
                </div>
                <ul class="guide-list">
                    <li class="lang-text" data-hi="✓ आधार कार्ड (नाम, जन्मतिथि व पिता का नाम सही हो)" data-en="✓ Aadhaar Card (Accurate Name, DOB & Father's Name)">✓ आधार कार्ड (नाम, जन्मतिथि व पिता का नाम सही हो)</li>
                    <li class="lang-text" data-hi="✓ दो पासपोर्ट साइज रंगीन फोटो" data-en="✓ Two Passport Size Color Photos">✓ दो पासपोर्ट साइज रंगीन फोटो</li>
                    <li class="lang-text" data-hi="✓ आधार से लिंक चालू मोबाइल नंबर (ओटीपी हेतु)" data-en="✓ Active Aadhaar-linked Mobile Number for OTP">✓ आधार से लिंक चालू मोबाइल नंबर (ओटीपी हेतु)</li>
                    <li class="lang-text" data-hi="✓ सुधार हेतु पुराने पैन कार्ड की कॉपी" data-en="✓ Copy of Existing PAN Card for Correction">✓ सुधार हेतु पुराने पैन कार्ड की कॉपी</li>
                </ul>
            </div>

            <div class="guide-card">
                <div class="guide-header">
                    <span class="guide-badge lang-text" data-hi="किसान व कल्याण" data-en="Farmer & Welfare">किसान व कल्याण</span>
                    <h3 class="lang-text" data-hi="पीएम किसान एवं पेंशन योजनाओं हेतु" data-en="For PM Kisan & Pension Schemes">पीएम किसान एवं पेंशन योजनाओं हेतु</h3>
                </div>
                <ul class="guide-list">
                    <li class="lang-text" data-hi="✓ जमीन की खतौनी / भूलेख की नकल" data-en="✓ Land Record (Khatauni) / Bhulekh copy">✓ जमीन की खतौनी / भूलेख की नकल</li>
                    <li class="lang-text" data-hi="✓ आधार कार्ड एवं आधार लिंक बैंक पासबुक" data-en="✓ Aadhaar Card & Aadhaar-seeded Bank Passbook">✓ आधार कार्ड एवं आधार लिंक बैंक पासबुक</li>
                    <li class="lang-text" data-hi="✓ आय प्रमाण पत्र एवं आयु प्रमाण पत्र" data-en="✓ Income Certificate & Age Proof">✓ आय प्रमाण पत्र एवं आयु प्रमाण पत्र</li>
                    <li class="lang-text" data-hi="✓ मोबाइल नंबर जिस पर बैंक संदेश आते हों" data-en="✓ Mobile Number registered with Bank">✓ मोबाइल नंबर जिस पर बैंक संदेश आते हों</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- 8. WHY CHOOSE OUR JAN SEVA KENDRA -->
<section class="why-us-section">
    <div class="container">
        <div class="section-header text-center">
            <div class="section-badge-pill lang-text" data-hi="हमारी विशेषताएं" data-en="Key Features">हमारी विशेषताएं</div>
            <h2 class="section-title lang-text" data-hi="नागरिक हमें क्यों चुनते हैं?" data-en="Why Citizens Trust Our Center">नागरिक हमें क्यों चुनते हैं?</h2>
            <p class="section-subtitle lang-text" data-hi="100% सरकारी विश्वसनीयता, आधुनिक सुरक्षा और त्वरित समाधान" data-en="100% Government Reliability, Modern Security & Rapid Turnaround">100% सरकारी विश्वसनीयता, आधुनिक सुरक्षा और त्वरित समाधान</p>
        </div>

        <div class="features-grid">
            <div class="feature-item">
                <div class="feat-icon-bubble"><?php echo jsk_get_svg_icon('shield-check'); ?></div>
                <h4 class="feat-item-title lang-text" data-hi="अधिकृत सीएससी मान्यता" data-en="Authorized CSC Recognition">अधिकृत सीएससी मान्यता</h4>
                <p class="feat-item-desc lang-text" data-hi="भारत सरकार एवं राज्य ई-डिस्ट्रिक्ट द्वारा पूर्णतः अधिकृत सेवा केंद्र। सभी प्रमाण पत्र 100% वैध व डिजिटल हस्ताक्षरित।" data-en="Fully authorized by Government of India and State e-District portal. All certificates 100% legally valid and digitally signed.">भारत सरकार एवं राज्य ई-डिस्ट्रिक्ट द्वारा पूर्णतः अधिकृत सेवा केंद्र। सभी प्रमाण पत्र 100% वैध व डिजिटल हस्ताक्षरित।</p>
            </div>

            <div class="feature-item">
                <div class="feat-icon-bubble"><?php echo jsk_get_svg_icon('award'); ?></div>
                <h4 class="feat-item-title lang-text" data-hi="समयबद्ध एवं त्वरित निस्तारण" data-en="Timely & Error-Free Resolution">समयबद्ध एवं त्वरित निस्तारण</h4>
                <p class="feat-item-desc lang-text" data-hi="हम फॉर्म भरते समय हर दस्तावेज को बारीकी से जांचते हैं जिससे रिजेक्शन का खतरा नगण्य हो जाता है।" data-en="Every document is scrutinized before submission, reducing rejection risk to near zero.">हम फॉर्म भरते समय हर दस्तावेज को बारीकी से जांचते हैं जिससे रिजेक्शन का खतरा नगण्य हो जाता है।</p>
            </div>

            <div class="feature-item">
                <div class="feat-icon-bubble"><?php echo jsk_get_svg_icon('file-text'); ?></div>
                <h4 class="feat-item-title lang-text" data-hi="पक्की सरकारी रसीद" data-en="Official Computer Receipt">पक्की सरकारी रसीद</h4>
                <p class="feat-item-desc lang-text" data-hi="हर सेवा आवेदन और भुगतान पर वैध कंप्यूटर जनरेटेड पावती एवं संदर्भ नंबर दिया जाता है।" data-en="Every application and fee payment receives a valid computer-generated receipt with tracking ID.">हर सेवा आवेदन और भुगतान पर वैध कंप्यूटर जनरेटेड पावती एवं संदर्भ नंबर दिया जाता है।</p>
            </div>

            <div class="feature-item">
                <div class="feat-icon-bubble"><?php echo jsk_get_svg_icon('fingerprint'); ?></div>
                <h4 class="feat-item-title lang-text" data-hi="बायोमेट्रिक सुरक्षा" data-en="Biometric Security">बायोमेट्रिक सुरक्षा</h4>
                <p class="feat-item-desc lang-text" data-hi="आरडी सर्विस प्रमाणित उच्च गुणवत्ता वाले फिंगरप्रिंट व आईरिस स्कैनर द्वारा सुरक्षित आधार प्रमाणीकरण।" data-en="RD-Service certified biometric fingerprint and iris scanners for secure authentication.">आरडी सर्विस प्रमाणित उच्च गुणवत्ता वाले फिंगरप्रिंट व आईरिस स्कैनर द्वारा सुरक्षित आधार प्रमाणीकरण।</p>
            </div>

            <div class="feature-item">
                <div class="feat-icon-bubble"><?php echo jsk_get_svg_icon('dollar-sign'); ?></div>
                <h4 class="feat-item-title lang-text" data-hi="शून्य अतिरिक्त शुल्क" data-en="Zero Extra Charges">शून्य अतिरिक्त शुल्क</h4>
                <p class="feat-item-desc lang-text" data-hi="शासन द्वारा तय की गई दर सूची के अनुसार ही भुगतान लिया जाता है। किसी बिचौलिए की जरूरत नहीं।" data-en="Transparent fees charged strictly in accordance with official government schedules. No middlemen.">शासन द्वारा तय की गई दर सूची के अनुसार ही भुगतान लिया जाता है। किसी बिचौलिए की जरूरत नहीं।</p>
            </div>

            <div class="feature-item">
                <div class="feat-icon-bubble"><?php echo jsk_get_svg_icon('phone'); ?></div>
                <h4 class="feat-item-title lang-text" data-hi="व्हाट्सएप एवं फोन सहायता" data-en="WhatsApp & Phone Support">व्हाट्सएप एवं फोन सहायता</h4>
                <p class="feat-item-desc lang-text" data-hi="घर बैठे दस्तावेज भेजने व स्थिति पूछने के लिए समर्पित ऑपरेटर हेल्पलाइन और व्हाट्सएप सपोर्ट।" data-en="Dedicated operator helpline and WhatsApp support to send documents and check application progress.">घर बैठे दस्तावेज भेजने व स्थिति पूछने के लिए समर्पित ऑपरेटर हेल्पलाइन और व्हाट्सएप सपोर्ट।</p>
            </div>
        </div>
    </div>
</section>

<!-- 9. FAQ ACCORDION SECTION -->
<section class="faq-section" id="faq-section">
    <div class="container faq-container">
        <div class="section-header text-center">
            <div class="section-badge-pill lang-text" data-hi="नागरिक जिज्ञासा" data-en="Citizen FAQ">नागरिक जिज्ञासा</div>
            <h2 class="section-title lang-text" data-hi="अक्सर पूछे जाने वाले सवाल (FAQ)" data-en="Frequently Asked Questions (FAQ)">अक्सर पूछे जाने वाले सवाल (FAQ)</h2>
            <p class="section-subtitle lang-text" data-hi="सेवाओं से संबंधित आपके सामान्य प्रश्नों के त्वरित उत्तर" data-en="Quick answers to common citizen queries regarding our services">सेवाओं से संबंधित आपके सामान्य प्रश्नों के त्वरित उत्तर</p>
        </div>

        <div class="faq-accordion" id="faqAccordion">
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span class="lang-text" data-hi="आय, जाति व निवास प्रमाण पत्र बनने में कितने दिन का समय लगता है?" data-en="How many days does it take to get Income, Caste, and Domicile certificates?">आय, जाति व निवास प्रमाण पत्र बनने में कितने दिन का समय लगता है?</span>
                    <span class="faq-toggle-icon">+</span>
                </button>
                <div class="faq-answer">
                    <p class="lang-text" data-hi="सामान्यतः ई-डिस्ट्रिक्ट पोर्टल पर आवेदन के बाद लेखपाल और तहसीलदार की जांच प्रक्रिया में 3 से 7 कार्य दिवस का समय लगता है। प्रमाण पत्र जारी होते ही हम आपको सूचित करते हैं और आप इसे हमारे केंद्र या ऑनलाइन डाउनलोड कर सकते हैं।" data-en="Typically, after submission on the e-District portal, field verification by Lekhpal and Tehsildar takes 3 to 7 working days. You will be notified immediately upon certificate issuance, available for digital download or print at our center.">सामान्यतः ई-डिस्ट्रिक्ट पोर्टल पर आवेदन के बाद लेखपाल और तहसीलदार की जांच प्रक्रिया में 3 से 7 कार्य दिवस का समय लगता है। प्रमाण पत्र जारी होते ही हम आपको सूचित करते हैं और आप इसे हमारे केंद्र या ऑनलाइन डाउनलोड कर सकते हैं।</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span class="lang-text" data-hi="क्या मुझे प्रमाण पत्र लेने के लिए तहसील जाने की आवश्यकता है?" data-en="Do I need to visit the Tehsil office to collect my certificate?">क्या मुझे प्रमाण पत्र लेने के लिए तहसील जाने की आवश्यकता है?</span>
                    <span class="faq-toggle-icon">+</span>
                </button>
                <div class="faq-answer">
                    <p class="lang-text" data-hi="बिल्कुल नहीं! जन सेवा केंद्र से बने सभी प्रमाण पत्र डिजिटल रूप से हस्ताक्षरित (Digitally Signed) होते हैं। आपको तहसील जाने की कोई आवश्यकता नहीं है, हमारे केंद्र से प्राप्त प्रिंटेड कॉपी सभी सरकारी कार्यों में 100% मान्य है।" data-en="Not at all! All certificates issued through Jan Seva Kendra are digitally signed and legally certified. You do not need to visit Tehsil; the printed copy from our center is 100% valid for all official purposes.">बिल्कुल नहीं! जन सेवा केंद्र से बने सभी प्रमाण पत्र डिजिटल रूप से हस्ताक्षरित (Digitally Signed) होते हैं। आपको तहसील जाने की कोई आवश्यकता नहीं है, हमारे केंद्र से प्राप्त प्रिंटेड कॉपी सभी सरकारी कार्यों में 100% मान्य है।</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span class="lang-text" data-hi="अगर मेरे आधार कार्ड में मोबाइल नंबर लिंक नहीं है तो क्या पैन कार्ड बन सकता है?" data-en="Can I get a PAN card if my mobile number is not linked to Aadhaar?">अगर मेरे आधार कार्ड में मोबाइल नंबर लिंक नहीं है तो क्या पैन कार्ड बन सकता है?</span>
                    <span class="faq-toggle-icon">+</span>
                </button>
                <div class="faq-answer">
                    <p class="lang-text" data-hi="हाँ, बिल्कुल! यदि आपके आधार में मोबाइल नंबर नहीं जुड़ा है, तो भी हमारे केंद्र पर बायोमेट्रिक (अंगूठे के निशान) द्वारा पैन कार्ड बनाया जा सकता है।" data-en="Yes, absolutely! Even without a linked mobile number, we can issue an instant e-PAN or physical PAN card via biometric fingerprint authentication at our center.">हाँ, बिल्कुल! यदि आपके आधार में मोबाइल नंबर नहीं जुड़ा है, तो भी हमारे केंद्र पर बायोमेट्रिक (अंगूठे के निशान) द्वारा पैन कार्ड बनाया जा सकता है।</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span class="lang-text" data-hi="ऑनलाइन आवेदन फॉर्म सबमिट करने के बाद आगे क्या करना होगा?" data-en="What should I do after submitting the online service request?">ऑनलाइन आवेदन फॉर्म सबमिट करने के बाद आगे क्या करना होगा?</span>
                    <span class="faq-toggle-icon">+</span>
                </button>
                <div class="faq-answer">
                    <p class="lang-text" data-hi="फॉर्म सबमिट होते ही आपको स्क्रीन पर ट्रैकिंग नंबर (उदा. JSK-2026-XXXX) प्राप्त होगा। आप इसकी पर्ची प्रिंट कर सकते हैं। हमारे ऑपरेटर 2 घंटे के भीतर आपसे फोन या व्हाट्सएप पर संपर्क कर जरूरी दस्तावेज मंगवा लेंगे।" data-en="Upon submission, you receive an authentic tracking ID (e.g. JSK-2026-XXXX) and printable receipt slip. Our operator will contact you via WhatsApp or phone within 2 hours to collect supporting documents.">फॉर्म सबमिट होते ही आपको स्क्रीन पर ट्रैकिंग नंबर (उदा. JSK-2026-XXXX) प्राप्त होगा। आप इसकी पर्ची प्रिंट कर सकते हैं। हमारे ऑपरेटर 2 घंटे के भीतर आपसे फोन या व्हाट्सएप पर संपर्क कर जरूरी दस्तावेज मंगवा लेंगे।</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span class="lang-text" data-hi="पीएम किसान की 18वीं किस्त के लिए ई-केवाईसी कैसे कराएं?" data-en="How do I complete e-KYC for PM-Kisan installment?">पीएम किसान की 18वीं किस्त के लिए ई-केवाईसी कैसे कराएं?</span>
                    <span class="faq-toggle-icon">+</span>
                </button>
                <div class="faq-answer">
                    <p class="lang-text" data-hi="आप अपना आधार कार्ड लेकर हमारे केंद्र पर आएं। केवल 2 मिनट में बायोमेट्रिक मशीन पर अंगूठा लगाकर तुरंत ई-केवाईसी पूर्ण हो जाती है एवं सरकारी पोर्टल पर स्टेटस अपडेट हो जाता है।" data-en="Bring your Aadhaar card to our center. Biometric fingerprint scan completes the PM-Kisan e-KYC in under 2 minutes, instantly updating your record on the central portal.">आप अपना आधार कार्ड लेकर हमारे केंद्र पर आएं। केवल 2 मिनट में बायोमेट्रिक मशीन पर अंगूठा लगाकर तुरंत ई-केवाईसी पूर्ण हो जाती है एवं सरकारी पोर्टल पर स्टेटस अपडेट हो जाता है।</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 10. CENTER LOCATION & CONTACT -->
<section class="contact-section" id="contact-center">
    <div class="container contact-container-box">
        <div class="contact-info-col">
            <div class="section-badge-pill pill-light lang-text" data-hi="हमारा केंद्र" data-en="Our Center">हमारा केंद्र</div>
            <h2 class="contact-col-title lang-text" data-hi="जन सेवा केंद्र पर पधारें" data-en="Visit Our Jan Seva Kendra">जन सेवा केंद्र पर पधारें</h2>
            <p class="contact-col-desc lang-text" data-hi="हम आपके नजदीकी बाजार में स्थित हैं। किसी भी सेवा के लिए बेझिझक पधारें या फोन पर संपर्क करें।" data-en="Centrally located in your local main market. Visit us in person or reach out via phone for swift assistance.">
                हम आपके नजदीकी बाजार में स्थित हैं। किसी भी सेवा के लिए बेझिझक पधारें या फोन पर संपर्क करें।
            </p>

            <div class="center-details-card">
                <div class="c-detail-item">
                    <span class="c-icon"><?php echo jsk_get_svg_icon('home'); ?></span>
                    <div>
                        <strong class="lang-text" data-hi="केंद्र का पता:" data-en="Center Address:">केंद्र का पता:</strong>
                        <span class="lang-text" data-hi="दुकान नं. 4, मुख्य बाजार, तहसील रोड, पोस्ट ऑफिस के सामने, जिला केंद्र" data-en="Shop No. 4, Main Market, Tehsil Road, Opposite Post Office, District Center">दुकान नं. 4, मुख्य बाजार, तहसील रोड, पोस्ट ऑफिस के सामने, जिला केंद्र</span>
                    </div>
                </div>

                <div class="c-detail-item">
                    <span class="c-icon"><?php echo jsk_get_svg_icon('user-check'); ?></span>
                    <div>
                        <strong class="lang-text" data-hi="अधिकृत संचालक (VLE):" data-en="Authorized VLE:">अधिकृत संचालक (VLE):</strong>
                        <span class="lang-text" data-hi="राजेश कुमार शर्मा (सीएससी आईडी: CSC-UP-984210)" data-en="Rajesh Kumar Sharma (CSC ID: CSC-UP-984210)">राजेश कुमार शर्मा (सीएससी आईडी: CSC-UP-984210)</span>
                    </div>
                </div>

                <div class="c-detail-item">
                    <span class="c-icon"><?php echo jsk_get_svg_icon('phone'); ?></span>
                    <div>
                        <strong class="lang-text" data-hi="हेल्पलाइन फोन:" data-en="Helpline Phone:">हेल्पलाइन फोन:</strong>
                        <a href="tel:+919876543210" class="c-link">+91 98765 43210 / 1800-3000-3468</a>
                    </div>
                </div>

                <div class="c-detail-item">
                    <span class="c-icon"><?php echo jsk_get_svg_icon('clock'); ?></span>
                    <div>
                        <strong class="lang-text" data-hi="कार्य समय:" data-en="Working Hours:">कार्य समय:</strong>
                        <span class="lang-text" data-hi="सोमवार से शनिवार: प्रातः 8:00 से सायं 8:00 बजे तक (रविवार: प्रातः 9:00 से दोपहर 2:00)" data-en="Monday to Saturday: 8:00 AM to 8:00 PM (Sunday: 9:00 AM to 2:00 PM)">सोमवार से शनिवार: प्रातः 8:00 से सायं 8:00 बजे तक (रविवार: प्रातः 9:00 से दोपहर 2:00)</span>
                    </div>
                </div>
            </div>

            <div class="contact-cta-buttons">
                <a href="https://wa.me/919876543210?text=नमस्ते,%20मुझे%20जन%20सेवा%20केंद्र%20की%20सेवाओं%20के%20बारे%20में%20पूछना%20है" target="_blank" rel="noopener" class="btn btn-whatsapp-lg">
                    <span class="lang-text" data-hi="व्हाट्सएप पर संपर्क करें" data-en="Chat on WhatsApp">व्हाट्सएप पर संपर्क करें</span>
                </a>
                <a href="tel:+919876543210" class="btn btn-call-lg">
                    <span class="lang-text" data-hi="कॉल करें" data-en="Call Operator">कॉल करें</span>
                </a>
            </div>
        </div>

        <div class="contact-map-col">
            <div class="map-mockup-card">
                <img 
                    src="<?php echo esc_url($csc_center_img); ?>" 
                    alt="जन सेवा केंद्र कार्यालय" 
                    class="center-img-box" 
                    loading="lazy"
                    width="550" 
                    height="320"
                >
                <div class="map-badge-overlay">
                    <span class="badge-status-dot"></span>
                    <span class="lang-text" data-hi="केंद्र अभी खुला है (Open Now)" data-en="Center Open Now">केंद्र अभी खुला है (Open Now)</span>
                </div>
                <div class="map-card-body">
                    <h4 class="lang-text" data-hi="सुविधाजनक एवं सुगम नागरिक सेवा" data-en="Convenient & Citizen-Friendly Facilities">सुविधाजनक एवं सुगम नागरिक सेवा</h4>
                    <p class="lang-text" data-hi="पीने का शुद्ध पानी, बैठने की उचित व्यवस्था, जनरेटर बैकअप एवं त्वरित फोटोस्टेट/लैमिनेशन सुविधा उपलब्ध।" data-en="Purified drinking water, comfortable seating lounge, 100% generator power backup, and fast Xerox / lamination service.">पीने का शुद्ध पानी, बैठने की उचित व्यवस्था, जनरेटर बैकअप एवं त्वरित फोटोस्टेट/लैमिनेशन सुविधा उपलब्ध।</p>
                    <a href="https://maps.google.com" target="_blank" rel="noopener" class="btn btn-outline-map">
                        <span class="lang-text" data-hi="गूगल मैप्स पर मार्ग देखें →" data-en="Get Directions on Google Maps →">गूगल मैप्स पर मार्ग देखें →</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
