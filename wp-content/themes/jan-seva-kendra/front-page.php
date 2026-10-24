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
                <span>डिजिटल भारत • अधिकृत जन सेवा केंद्र (CSC Portal)</span>
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
                        autocomplete="off"
                        aria-label="सेवा खोजें"
                    >
                    <button type="button" class="search-clear-btn" id="searchClearBtn" aria-label="खोज साफ़ करें">&times;</button>
                </div>
                <div class="hero-quick-tags">
                    <span class="tags-label">लोकप्रिय खोज:</span>
                    <button type="button" class="quick-tag-btn" data-search="आधार">आधार कार्ड</button>
                    <button type="button" class="quick-tag-btn" data-search="पैन कार्ड">पैन कार्ड</button>
                    <button type="button" class="quick-tag-btn" data-search="आय प्रमाण पत्र">आय प्रमाण पत्र</button>
                    <button type="button" class="quick-tag-btn" data-search="पीएम किसान">पीएम किसान</button>
                    <button type="button" class="quick-tag-btn" data-search="आयुष्मान">आयुष्मान कार्ड</button>
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
                    <span>100% सरकारी मान्यता प्राप्त</span>
                </div>
                <div class="feat-item">
                    <span class="feat-check">✓</span>
                    <span>अधिकृत डिजिटल हस्ताक्षर</span>
                </div>
                <div class="feat-item">
                    <span class="feat-check">✓</span>
                    <span>सुरक्षित बायोमेट्रिक प्रणाली</span>
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
                        <span class="stat-text">संतुष्ट स्थानीय नागरिक</span>
                    </div>
                </div>
                <div class="glass-card card-stat-2">
                    <div class="glass-stat-icon text-success"><?php echo jsk_get_svg_icon('award'); ?></div>
                    <div>
                        <strong class="stat-number">99.8%</strong>
                        <span class="stat-text">समयबद्ध निस्तारण</span>
                    </div>
                </div>
                <div class="glass-card card-stat-3">
                    <div class="glass-stat-icon text-orange"><?php echo jsk_get_svg_icon('shield-check'); ?></div>
                    <div>
                        <strong class="stat-title">सीएससी अधिकृत केंद्र</strong>
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
            <span class="stat-label">सक्रिय डिजिटल सेवाएं</span>
        </div>
        <div class="stat-box">
            <span class="stat-digit"><?php echo esc_html(jsk_opt('stat_tat')); ?></span>
            <span class="stat-label">औसत प्रमाण पत्र निस्तारण</span>
        </div>
        <div class="stat-box">
            <span class="stat-digit"><?php echo esc_html(jsk_opt('stat_fee')); ?></span>
            <span class="stat-label">शून्य अतिरिक्त गुप्त शुल्क</span>
        </div>
        <div class="stat-box">
            <span class="stat-digit"><?php echo esc_html(jsk_opt('stat_hours')); ?></span>
            <span class="stat-label">प्रतिदिन केंद्र सेवा समय</span>
        </div>
    </div>
</section>

<!-- 3. SERVICES DIRECTORY SECTION -->
<section class="services-section" id="services">
    <div class="container">
        <div class="section-header text-center">
            <div class="section-badge-pill">नागरिक सेवा निर्देशिका</div>
            <h2 class="section-title">हमारे केंद्र द्वारा प्रदान की जाने वाली प्रमुख सेवाएं</h2>
            <p class="section-subtitle">
                अपनी वांछित सेवा चुनें, आवश्यक दस्तावेज देखें और घर बैठे तुरंत ऑनलाइन आवेदन जमा करें
            </p>
        </div>

        <!-- Category Filter Tabs -->
        <div class="category-tabs-wrapper">
            <div class="category-tabs" role="tablist" aria-label="सेवा श्रेणियां">
                <button type="button" class="tab-btn active" data-filter="all" role="tab" aria-selected="true">
                    <span>सभी सेवाएं (All)</span>
                </button>
                <button type="button" class="tab-btn" data-filter="identity" role="tab" aria-selected="false">
                    <span>पहचान व दस्तावेज</span>
                </button>
                <button type="button" class="tab-btn" data-filter="certificate" role="tab" aria-selected="false">
                    <span>आय, जाति व निवास</span>
                </button>
                <button type="button" class="tab-btn" data-filter="schemes" role="tab" aria-selected="false">
                    <span>सरकारी योजनाएं व पेंशन</span>
                </button>
                <button type="button" class="tab-btn" data-filter="banking" role="tab" aria-selected="false">
                    <span>बैंकिंग व बीमा (AEPS)</span>
                </button>
                <button type="button" class="tab-btn" data-filter="utility" role="tab" aria-selected="false">
                    <span>बिल व रिचार्ज</span>
                </button>
                <button type="button" class="tab-btn" data-filter="education" role="tab" aria-selected="false">
                    <span>शिक्षा व भर्ती फॉर्म</span>
                </button>
            </div>
        </div>

        <!-- Live Services Count & Filter Status -->
        <div class="services-status-bar">
            <span id="serviceResultsCount">कुल <strong><?php echo count($services); ?></strong> सेवाएं उपलब्ध हैं</span>
            <span class="filter-hint">किसी भी सेवा पर क्लिक करके आवश्यक दस्तावेज व शुल्क जानें</span>
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
                            <span class="service-cat-pill"><?php echo esc_html($srv['cat_name']); ?></span>
                            <?php if (!empty($srv['badge'])): ?>
                                <span class="service-badge-pill"><?php echo esc_html($srv['badge']); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="card-icon-title">
                            <div class="service-icon-box" aria-hidden="true">
                                <?php echo jsk_get_svg_icon($srv['icon']); ?>
                            </div>
                            <h3 class="service-title"><?php echo esc_html($srv['title']); ?></h3>
                        </div>

                        <p class="service-desc"><?php echo esc_html($srv['excerpt']); ?></p>

                        <div class="service-meta-box">
                            <div class="meta-item">
                                <span class="meta-label">शुल्क:</span>
                                <strong class="meta-value text-primary"><?php echo esc_html($srv['fee']); ?></strong>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">समय:</span>
                                <strong class="meta-value"><?php echo esc_html($srv['time']); ?></strong>
                            </div>
                        </div>

                        <div class="service-docs-preview">
                            <span class="docs-icon"><?php echo jsk_get_svg_icon('check-circle'); ?></span>
                            <span class="docs-text"><strong>दस्तावेज:</strong> <?php echo esc_html($srv['documents']); ?></span>
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
                            >
                                <span>विवरण</span>
                            </button>
                            <button 
                                type="button" 
                                class="btn btn-card-apply" 
                                data-service-id="<?php echo esc_attr($srv['id']); ?>"
                                data-service-title="<?php echo esc_attr($srv['title']); ?>"
                            >
                                <span>आवेदन करें</span>
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
            <h3>आपकी खोज से संबंधित कोई सेवा नहीं मिली</h3>
            <p>कृपया अन्य शब्द खोजें या नीचे दिए गए नंबर पर सीधे संपर्क करें।</p>
            <button type="button" class="btn btn-secondary mt-3" id="resetSearchBtn">सभी सेवाएं देखें</button>
        </div>
    </div>
</section>

<!-- 4. ONLINE APPLICATION FORM SECTION -->
<section class="apply-section" id="apply-form-section">
    <div class="container">
        <div class="apply-card-container">
            <div class="apply-info-side">
                <div class="section-badge-pill pill-light">सुगम नागरिक सेवा</div>
                <h2 class="apply-side-title">घर बैठे ऑनलाइन सेवा आवेदन दर्ज करें</h2>
                <p class="apply-side-text">
                    आपको केंद्र पर लाइन में लगने की आवश्यकता नहीं है। नीचे दिया गया फॉर्म भरें, आपको तुरंत ट्रैकिंग आईडी मिलेगी और हमारा ऑपरेटर आपसे संपर्क करेगा।
                </p>

                <div class="citizen-success-card">
                    <img src="<?php echo esc_url($citizen_img); ?>" alt="संतुष्ट नागरिक प्रमाण पत्र प्राप्त करते हुए" class="citizen-success-img" loading="lazy">
                    <div class="citizen-success-overlay">
                        <span class="badge-verified">✓ 100% अधिकृत सरकारी प्रमाण पत्र</span>
                        <p class="citizen-success-text">गांव व शहर के 50,000+ नागरिकों का अटूट भरोसा</p>
                    </div>
                </div>

                <div class="apply-steps-list">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <div class="step-text">
                            <strong>सेवा व विवरण चुनें</strong>
                            <span>जिस सेवा का लाभ लेना चाहते हैं उसका चयन करें।</span>
                        </div>
                    </div>
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <div class="step-text">
                            <strong>ट्रैकिंग संदर्भ रसीद प्राप्त करें</strong>
                            <span>फॉर्म सबमिट होते ही आपकी अनूठी संदर्भ आईडी (JSK ID) जनरेट होगी।</span>
                        </div>
                    </div>
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <div class="step-text">
                            <strong>दस्तावेज सत्यापन एवं निस्तारण</strong>
                            <span>दस्तावेज व्हाट्सएप या केंद्र पर जमा करें और प्रमाण पत्र प्राप्त करें।</span>
                        </div>
                    </div>
                </div>

                <div class="side-support-box">
                    <div class="support-icon"><?php echo jsk_get_svg_icon('phone'); ?></div>
                    <div>
                        <span class="support-label">फॉर्म भरने में सहायता चाहिए?</span>
                        <a href="tel:+919876543210" class="support-phone">+91 98765 43210</a>
                    </div>
                </div>
            </div>

            <!-- Form Side -->
            <div class="apply-form-side">
                <div class="form-header-box">
                    <h3 class="form-title">ऑनलाइन नागरिक सेवा अनुरोध फॉर्म</h3>
                    <p class="form-subtitle">कृपया अपनी सही जानकारी भरें (सभी विवरण सुरक्षित हैं)</p>
                </div>

                <form id="citizenApplyForm" class="citizen-form" novalidate>
                    <!-- Service Select -->
                    <div class="form-group">
                        <label for="applyServiceSelect" class="form-label">
                            वांछित सेवा का चयन करें <span class="required">*</span>
                        </label>
                        <select id="applyServiceSelect" name="service_id" class="form-select" required>
                            <option value="">-- कृपया एक सेवा चुनें --</option>
                            <?php foreach ($services as $srv): ?>
                                <option value="<?php echo esc_attr($srv['id']); ?>" data-title="<?php echo esc_attr($srv['title']); ?>">
                                    <?php echo esc_html($srv['title']); ?> (<?php echo esc_html($srv['cat_name']); ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" id="applyServiceName" name="service_name" value="">
                    </div>

                    <!-- Row: Name & Mobile -->
                    <div class="form-row-2">
                        <div class="form-group">
                            <label for="applyName" class="form-label">
                                आवेदक का पूरा नाम <span class="required">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="applyName" 
                                name="name" 
                                class="form-input" 
                                placeholder="उदा. रमेश कुमार शर्मा" 
                                required
                            >
                        </div>
                        <div class="form-group">
                            <label for="applyMobile" class="form-label">
                                मोबाइल नंबर (10 अंक) <span class="required">*</span>
                            </label>
                            <input 
                                type="tel" 
                                id="applyMobile" 
                                name="mobile" 
                                class="form-input" 
                                placeholder="उदा. 9876543210" 
                                pattern="[6-9][0-9]{9}"
                                maxlength="10"
                                required
                            >
                        </div>
                    </div>

                    <!-- Row: Village/City & District -->
                    <div class="form-row-2">
                        <div class="form-group">
                            <label for="applyVillage" class="form-label">ग्राम / कस्बा / वार्ड</label>
                            <input 
                                type="text" 
                                id="applyVillage" 
                                name="village_city" 
                                class="form-input" 
                                placeholder="उदा. रामपुर / वार्ड संख्या 5"
                            >
                        </div>
                        <div class="form-group">
                            <label for="applyDistrict" class="form-label">जिला एवं राज्य</label>
                            <input 
                                type="text" 
                                id="applyDistrict" 
                                name="district" 
                                class="form-input" 
                                placeholder="उदा. मेरठ, उत्तर प्रदेश"
                                value="उत्तर प्रदेश"
                            >
                        </div>
                    </div>

                    <!-- Row: Identity hint -->
                    <div class="form-group">
                        <label for="applyAadhaar" class="form-label">
                            आधार कार्ड के अंतिम 4 अंक (पहचान सत्यापन हेतु)
                        </label>
                        <input 
                            type="text" 
                            id="applyAadhaar" 
                            name="aadhaar_last" 
                            class="form-input" 
                            placeholder="XXXX XXXX 1234"
                            maxlength="4"
                        >
                        <small class="form-hint">गोपनीयता के लिए केवल अंतिम 4 अंक दर्ज करें।</small>
                    </div>

                    <!-- Notes -->
                    <div class="form-group">
                        <label for="applyNotes" class="form-label">अतिरिक्त टिप्पणी या विशेष आवश्यकता</label>
                        <textarea 
                            id="applyNotes" 
                            name="notes" 
                            rows="2" 
                            class="form-textarea" 
                            placeholder="उदा. मुझे तत्काल प्रमाण पत्र की आवश्यकता है / मोबाइल नंबर लिंक है..."
                        ></textarea>
                    </div>

                    <!-- Privacy & Submission Consent -->
                    <div class="form-consent">
                        <input type="checkbox" id="applyConsent" class="form-checkbox" checked required>
                        <label for="applyConsent">
                            मैं पुष्टि करता/करती हूँ कि मेरे द्वारा दी गई जानकारी सही है एवं मैं जन सेवा केंद्र द्वारा संपर्क किए जाने की सहमति देता/देती हूँ।
                        </label>
                    </div>

                    <!-- Form Alert message -->
                    <div id="applyAlert" class="form-alert" style="display: none;"></div>

                    <!-- Submit Button -->
                    <div class="form-submit-row">
                        <button type="submit" class="btn btn-submit-apply" id="applySubmitBtn">
                            <span class="btn-spinner" style="display: none;"></span>
                            <span class="btn-text">आवेदन दर्ज करें (सबमिट)</span>
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
            <div class="section-badge-pill">त्वरित ट्रैकिंग</div>
            <h2 class="section-title">अपने आवेदन की ताज़ा स्थिति जांचें</h2>
            <p class="section-subtitle">
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
                        required
                    >
                    <button type="submit" class="btn btn-track-submit" id="trackSubmitBtn">
                        <span class="track-spinner" style="display: none;"></span>
                        <span>स्थिति जांचें</span>
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
                        <p class="track-res-service">सेवा: <strong id="trackResService">आय प्रमाण पत्र</strong></p>
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
                    <span>कोई प्रश्न है या दस्तावेज जमा करना चाहते हैं?</span>
                    <a href="https://wa.me/919876543210?text=नमस्ते,%20मैं%20अपने%20आवेदन%20के%20बारे%20में%20पूछना%20चाहता%20हूँ" target="_blank" rel="noopener" class="btn btn-whatsapp-sm">
                        व्हाट्सएप पर सहायता लें
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
            <div class="section-badge-pill">पारदर्शी व्यवस्था</div>
            <h2 class="section-title">सरकारी एवं केंद्र सेवा शुल्क दर तालिका</h2>
            <p class="section-subtitle">
                हमारे केंद्र पर शासन द्वारा निर्धारित न्यूनतम शुल्क लिया जाता है, कोई गुप्त या अतिरिक्त चार्ज नहीं
            </p>
        </div>

        <div class="fee-table-card">
            <div class="table-responsive">
                <table class="fee-table">
                    <thead>
                        <tr>
                            <th>क्र.सं.</th>
                            <th>सेवा का नाम</th>
                            <th>सरकारी शुल्क (Govt Fee)</th>
                            <th>केंद्र सेवा शुल्क (CSC Fee)</th>
                            <th>कुल देय शुल्क (Total)</th>
                            <th>निस्तारण समय</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><strong>आय प्रमाण पत्र (Income Certificate)</strong></td>
                            <td>₹15</td>
                            <td>₹15</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td>3 से 5 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><strong>जाति प्रमाण पत्र (Caste Certificate)</strong></td>
                            <td>₹15</td>
                            <td>₹15</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td>4 से 7 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><strong>मूल निवास प्रमाण पत्र (Domicile)</strong></td>
                            <td>₹15</td>
                            <td>₹15</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td>3 से 5 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><strong>नया पैन कार्ड (NSDL/UTI)</strong></td>
                            <td>₹107</td>
                            <td>₹43</td>
                            <td><strong class="fee-total">₹150</strong></td>
                            <td>3 से 7 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><strong>आधार सुधार / बायोमेट्रिक अपडेट</strong></td>
                            <td>₹50</td>
                            <td>₹0 (शून्य)</td>
                            <td><strong class="fee-total">₹50</strong></td>
                            <td>3 से 7 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><strong>आयुष्मान भारत गोल्डन कार्ड</strong></td>
                            <td>₹0 (निशुल्क)</td>
                            <td>₹20 (पीवीसी प्रिंट)</td>
                            <td><strong class="fee-total">₹20</strong></td>
                            <td>तत्काल 10 मिनट</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><strong>पीएम किसान ई-केवाईसी (Biometric)</strong></td>
                            <td>₹0 (निशुल्क)</td>
                            <td>₹30</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td>तत्काल 5 मिनट</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td><strong>बिजली बिल भुगतान</strong></td>
                            <td>बिल अनुसार</td>
                            <td>₹0 (शून्य अतिरिक्त)</td>
                            <td><strong class="fee-total">केवल बिल राशि</strong></td>
                            <td>तत्काल रसीद</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td><strong>आधार एटीएम (AEPS) नगद निकासी</strong></td>
                            <td>बैंक अनुसार</td>
                            <td>₹0 (शून्य)</td>
                            <td><strong class="fee-total">निशुल्क निकासी</strong></td>
                            <td>तत्काल 1 मिनट</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td><strong>ई-श्रम कार्ड नया पंजीकरण</strong></td>
                            <td>₹0 (निशुल्क)</td>
                            <td>₹30 (लैमिनेटेड प्रिंट)</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td>तत्काल 10 मिनट</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="fee-note-strip">
                <span class="note-icon">ℹ️</span>
                <span>नोट: सभी शुल्कों की अधिकृत रसीद दी जाती है। किसी भी अतिरिक्त राशि की मांग होने पर हेल्पलाइन 1800-3000-3468 पर शिकायत करें।</span>
            </div>
        </div>
    </div>
</section>

<!-- 7. DOCUMENTS GUIDELINES & CHECKLIST -->
<section class="docs-guide-section" id="documents-guide">
    <div class="container">
        <div class="section-header text-center">
            <div class="section-badge-pill">तैयारी चेकलिस्ट</div>
            <h2 class="section-title">आवेदन से पहले जरूरी दस्तावेज चेकलिस्ट</h2>
            <p class="section-subtitle">
                आवेदन को त्वरित और बिना त्रुटि स्वीकृत कराने हेतु इन दस्तावेजों को तैयार रखें
            </p>
        </div>

        <div class="docs-guide-grid">
            <div class="guide-card">
                <div class="guide-header">
                    <span class="guide-badge">पहचान दस्तावेज</span>
                    <h3>आय / जाति / निवास प्रमाण पत्र हेतु</h3>
                </div>
                <ul class="guide-list">
                    <li>✓ आवेदक का आधार कार्ड (दोनों तरफ साफ कॉपी)</li>
                    <li>✓ नवीनतम पासपोर्ट साइज फोटो (सफेद पृष्ठभूमि)</li>
                    <li>✓ स्वप्रमाणित घोषणा पत्र (केंद्र पर उपलब्ध)</li>
                    <li>✓ बिजली का बिल / राशन कार्ड की छायाप्रति</li>
                    <li>✓ जाति प्रमाण पत्र हेतु परिवार के सदस्य का पुराना रिकॉर्ड</li>
                </ul>
            </div>

            <div class="guide-card">
                <div class="guide-header">
                    <span class="guide-badge">पैन कार्ड सेवाएं</span>
                    <h3>नया पैन कार्ड अथवा सुधार हेतु</h3>
                </div>
                <ul class="guide-list">
                    <li>✓ आधार कार्ड (नाम, जन्मतिथि व पिता का नाम सही हो)</li>
                    <li>✓ दो पासपोर्ट साइज रंगीन फोटो</li>
                    <li>✓ आधार से लिंक चालू मोबाइल नंबर (ओटीपी हेतु)</li>
                    <li>✓ सुधार हेतु पुराने पैन कार्ड की कॉपी</li>
                </ul>
            </div>

            <div class="guide-card">
                <div class="guide-header">
                    <span class="guide-badge">किसान व कल्याण</span>
                    <h3>पीएम किसान एवं पेंशन योजनाओं हेतु</h3>
                </div>
                <ul class="guide-list">
                    <li>✓ जमीन की खतौनी / भूलेख की नकल</li>
                    <li>✓ आधार कार्ड एवं आधार लिंक बैंक पासबुक</li>
                    <li>✓ आय प्रमाण पत्र एवं आयु प्रमाण पत्र</li>
                    <li>✓ मोबाइल नंबर जिस पर बैंक संदेश आते हों</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- 8. WHY CHOOSE OUR JAN SEVA KENDRA -->
<section class="why-us-section">
    <div class="container">
        <div class="section-header text-center">
            <div class="section-badge-pill">हमारी विशेषताएं</div>
            <h2 class="section-title">नागरिक हमें क्यों चुनते हैं?</h2>
            <p class="section-subtitle">100% सरकारी विश्वसनीयता, आधुनिक सुरक्षा और त्वरित समाधान</p>
        </div>

        <div class="features-grid">
            <div class="feature-item">
                <div class="feat-icon-bubble"><?php echo jsk_get_svg_icon('shield-check'); ?></div>
                <h4 class="feat-item-title">अधिकृत सीएससी मान्यता</h4>
                <p class="feat-item-desc">भारत सरकार एवं राज्य ई-डिस्ट्रिक्ट द्वारा पूर्णतः अधिकृत सेवा केंद्र। सभी प्रमाण पत्र 100% वैध व डिजिटल हस्ताक्षरित।</p>
            </div>

            <div class="feature-item">
                <div class="feat-icon-bubble"><?php echo jsk_get_svg_icon('award'); ?></div>
                <h4 class="feat-item-title">समयबद्ध एवं त्वरित निस्तारण</h4>
                <p class="feat-item-desc">हम फॉर्म भरते समय हर दस्तावेज को बारीकी से जांचते हैं जिससे रिजेक्शन का खतरा नगण्य हो जाता है।</p>
            </div>

            <div class="feature-item">
                <div class="feat-icon-bubble"><?php echo jsk_get_svg_icon('file-text'); ?></div>
                <h4 class="feat-item-title">पक्की सरकारी रसीद</h4>
                <p class="feat-item-desc">हर सेवा आवेदन और भुगतान पर वैध कंप्यूटर जनरेटेड पावती एवं संदर्भ नंबर दिया जाता है।</p>
            </div>

            <div class="feature-item">
                <div class="feat-icon-bubble"><?php echo jsk_get_svg_icon('fingerprint'); ?></div>
                <h4 class="feat-item-title">बायोमेट्रिक सुरक्षा</h4>
                <p class="feat-item-desc">आरडी सर्विस प्रमाणित उच्च गुणवत्ता वाले फिंगरप्रिंट व आईरिस स्कैनर द्वारा सुरक्षित आधार प्रमाणीकरण।</p>
            </div>

            <div class="feature-item">
                <div class="feat-icon-bubble"><?php echo jsk_get_svg_icon('dollar-sign'); ?></div>
                <h4 class="feat-item-title">शून्य अतिरिक्त शुल्क</h4>
                <p class="feat-item-desc">शासन द्वारा तय की गई दर सूची के अनुसार ही भुगतान लिया जाता है। किसी बिचौलिए की जरूरत नहीं।</p>
            </div>

            <div class="feature-item">
                <div class="feat-icon-bubble"><?php echo jsk_get_svg_icon('phone'); ?></div>
                <h4 class="feat-item-title">व्हाट्सएप एवं फोन सहायता</h4>
                <p class="feat-item-desc">घर बैठे दस्तावेज भेजने व स्थिति पूछने के लिए समर्पित ऑपरेटर हेल्पलाइन और व्हाट्सएप सपोर्ट।</p>
            </div>
        </div>
    </div>
</section>

<!-- 9. FAQ ACCORDION SECTION -->
<section class="faq-section" id="faq-section">
    <div class="container faq-container">
        <div class="section-header text-center">
            <div class="section-badge-pill">नागरिक जिज्ञासा</div>
            <h2 class="section-title">अक्सर पूछे जाने वाले सवाल (FAQ)</h2>
            <p class="section-subtitle">सेवाओं से संबंधित आपके सामान्य प्रश्नों के त्वरित उत्तर</p>
        </div>

        <div class="faq-accordion" id="faqAccordion">
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>आय, जाति व निवास प्रमाण पत्र बनने में कितने दिन का समय लगता है?</span>
                    <span class="faq-toggle-icon">+</span>
                </button>
                <div class="faq-answer">
                    <p>सामान्यतः ई-डिस्ट्रिक्ट पोर्टल पर आवेदन के बाद लेखपाल और तहसीलदार की जांच प्रक्रिया में 3 से 7 कार्य दिवस का समय लगता है। प्रमाण पत्र जारी होते ही हम आपको सूचित करते हैं और आप इसे हमारे केंद्र या ऑनलाइन डाउनलोड कर सकते हैं।</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>क्या मुझे प्रमाण पत्र लेने के लिए तहसील जाने की आवश्यकता है?</span>
                    <span class="faq-toggle-icon">+</span>
                </button>
                <div class="faq-answer">
                    <p>बिल्कुल नहीं! जन सेवा केंद्र से बने सभी प्रमाण पत्र डिजिटल रूप से हस्ताक्षरित (Digitally Signed) होते हैं। आपको तहसील जाने की कोई आवश्यकता नहीं है, हमारे केंद्र से प्राप्त प्रिंटेड कॉपी सभी सरकारी कार्यों में 100% मान्य है।</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>अगर मेरे आधार कार्ड में मोबाइल नंबर लिंक नहीं है तो क्या पैन कार्ड बन सकता है?</span>
                    <span class="faq-toggle-icon">+</span>
                </button>
                <div class="faq-answer">
                    <p>हाँ, बिल्कुल! यदि आपके आधार में मोबाइल नंबर नहीं जुड़ा है, तो भी हमारे केंद्र पर बायोमेट्रिक (अंगूठे के निशान) द्वारा पैन कार्ड बनाया जा सकता है।</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>ऑनलाइन आवेदन फॉर्म सबमिट करने के बाद आगे क्या करना होगा?</span>
                    <span class="faq-toggle-icon">+</span>
                </button>
                <div class="faq-answer">
                    <p>फॉर्म सबमिट होते ही आपको स्क्रीन पर ट्रैकिंग नंबर (उदा. JSK-2026-XXXX) प्राप्त होगा। आप इसकी पर्ची प्रिंट कर सकते हैं। हमारे ऑपरेटर 2 घंटे के भीतर आपसे फोन या व्हाट्सएप पर संपर्क कर जरूरी दस्तावेज मंगवा लेंगे।</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>पीएम किसान की 18वीं किस्त के लिए ई-केवाईसी कैसे कराएं?</span>
                    <span class="faq-toggle-icon">+</span>
                </button>
                <div class="faq-answer">
                    <p>आप अपना आधार कार्ड लेकर हमारे केंद्र पर आएं। केवल 2 मिनट में बायोमेट्रिक मशीन पर अंगूठा लगाकर तुरंत ई-केवाईसी पूर्ण हो जाती है एवं सरकारी पोर्टल पर स्टेटस अपडेट हो जाता है।</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 10. CENTER LOCATION & CONTACT -->
<section class="contact-section" id="contact-center">
    <div class="container contact-container-box">
        <div class="contact-info-col">
            <div class="section-badge-pill pill-light">हमारा केंद्र</div>
            <h2 class="contact-col-title">जन सेवा केंद्र पर पधारें</h2>
            <p class="contact-col-desc">
                हम आपके नजदीकी बाजार में स्थित हैं। किसी भी सेवा के लिए बेझिझक पधारें या फोन पर संपर्क करें।
            </p>

            <div class="center-details-card">
                <div class="c-detail-item">
                    <span class="c-icon"><?php echo jsk_get_svg_icon('home'); ?></span>
                    <div>
                        <strong>केंद्र का पता:</strong>
                        <span>दुकान नं. 4, मुख्य बाजार, तहसील रोड, पोस्ट ऑफिस के सामने, जिला केंद्र</span>
                    </div>
                </div>

                <div class="c-detail-item">
                    <span class="c-icon"><?php echo jsk_get_svg_icon('user-check'); ?></span>
                    <div>
                        <strong>अधिकृत संचालक (VLE):</strong>
                        <span>राजेश कुमार शर्मा (सीएससी आईडी: CSC-UP-984210)</span>
                    </div>
                </div>

                <div class="c-detail-item">
                    <span class="c-icon"><?php echo jsk_get_svg_icon('phone'); ?></span>
                    <div>
                        <strong>हेल्पलाइन फोन:</strong>
                        <a href="tel:+919876543210" class="c-link">+91 98765 43210 / 1800-3000-3468</a>
                    </div>
                </div>

                <div class="c-detail-item">
                    <span class="c-icon"><?php echo jsk_get_svg_icon('clock'); ?></span>
                    <div>
                        <strong>कार्य समय:</strong>
                        <span>सोमवार से शनिवार: प्रातः 8:00 से सायं 8:00 बजे तक (रविवार: प्रातः 9:00 से दोपहर 2:00)</span>
                    </div>
                </div>
            </div>

            <div class="contact-cta-buttons">
                <a href="https://wa.me/919876543210?text=नमस्ते,%20मुझे%20जन%20सेवा%20केंद्र%20की%20सेवाओं%20के%20बारे%20में%20पूछना%20है" target="_blank" rel="noopener" class="btn btn-whatsapp-lg">
                    <span>व्हाट्सएप पर संपर्क करें</span>
                </a>
                <a href="tel:+919876543210" class="btn btn-call-lg">
                    <span>कॉल करें</span>
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
                    <span>केंद्र अभी खुला है (Open Now)</span>
                </div>
                <div class="map-card-body">
                    <h4>सुविधाजनक एवं सुगम नागरिक सेवा</h4>
                    <p>पीने का शुद्ध पानी, बैठने की उचित व्यवस्था, जनरेटर बैकअप एवं त्वरित फोटोस्टेट/लैमिनेशन सुविधा उपलब्ध।</p>
                    <a href="https://maps.google.com" target="_blank" rel="noopener" class="btn btn-outline-map">
                        <span>गूगल मैप्स पर मार्ग देखें →</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
