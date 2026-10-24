<?php
/**
 * Template Name: ऑनलाइन आवेदन फॉर्म (Apply Page)
 */
if (!defined('ABSPATH')) exit;

get_header();

$services = jsk_fetch_and_format_services();
$preselected_id = isset($_GET['service_id']) ? intval($_GET['service_id']) : 0;
$citizen_img = JSK_THEME_URI . '/assets/images/citizen-success.jpg';
?>

<!-- Page Header Banner -->
<div class="page-hero-banner">
    <div class="container">
        <div class="breadcrumbs-nav">
            <a href="<?php echo esc_url(home_url('/')); ?>">मुख्य पृष्ठ</a> &raquo; 
            <span>ऑनलाइन आवेदन फॉर्म</span>
        </div>
        <div class="section-badge-pill pill-light">सुगम नागरिक पोर्टल</div>
        <h1 class="page-banner-title">
            <span class="lang-text" data-hi="घर बैठे ऑनलाइन सेवा आवेदन दर्ज करें" data-en="Apply Online for Citizen Services">घर बैठे ऑनलाइन सेवा आवेदन दर्ज करें</span>
        </h1>
        <p class="page-banner-subtitle">
            <span class="lang-text" data-hi="बिना लाइन में लगे केवल 2 मिनट में फॉर्म भरें और तत्काल ट्रैकिंग संदर्भ रसीद (JSK ID) प्राप्त करें" data-en="Fill the application form in 2 minutes and get instant tracking reference receipt (JSK ID)">
                बिना लाइन में लगे केवल 2 मिनट में फॉर्म भरें और तत्काल ट्रैकिंग संदर्भ रसीद (JSK ID) प्राप्त करें
            </span>
        </p>
    </div>
</div>

<!-- Main Application Section -->
<section class="apply-section py-5" id="apply-form-section">
    <div class="container">
        <div class="apply-card-container">
            <div class="apply-info-side">
                <div class="section-badge-pill pill-light">प्रमाणित नागरिक सेवा</div>
                <h2 class="apply-side-title">सरल, सुरक्षित एवं समयबद्ध समाधान</h2>
                <p class="apply-side-text">
                    आपके द्वारा सबमिट किया गया अनुरोध सीधे अधिकृत सीएससी ऑपरेटर को प्राप्त होता है और विभागीय पोर्टल पर तत्काल प्रेषित किया जाता है।
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
                            <strong>सेवा व विवरण भरें</strong>
                            <span>वांछित सेवा और आवेदक की सही जानकारी दर्ज करें।</span>
                        </div>
                    </div>
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <div class="step-text">
                            <strong>ट्रैकिंग संदर्भ रसीद प्राप्त करें</strong>
                            <span>सबमिट करते ही आपको JSK-2026-XXXXX रसीद पर्ची मिलेगी।</span>
                        </div>
                    </div>
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <div class="step-text">
                            <strong>दस्तावेज सत्यापन व निस्तारण</strong>
                            <span>दस्तावेज सत्यापन उपरांत प्रमाण पत्र तैयार कर दिया जाएगा।</span>
                        </div>
                    </div>
                </div>

                <div class="side-support-box">
                    <div class="support-icon"><?php echo jsk_get_svg_icon('phone'); ?></div>
                    <div>
                        <span class="support-label">फॉर्म भरने में सहायता चाहिए?</span>
                        <a href="tel:<?php echo esc_attr(jsk_opt('phone')); ?>" class="support-phone"><?php echo esc_html(jsk_opt('phone')); ?></a>
                    </div>
                </div>
            </div>

            <!-- Form Side -->
            <div class="apply-form-side">
                <div class="form-header-box">
                    <h3 class="form-title">नागरिक सेवा अनुरोध फॉर्म</h3>
                    <p class="form-subtitle">कृपया अपनी सही जानकारी भरें (सभी विवरण सुरक्षित एवं गोपनीय हैं)</p>
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
                                <option 
                                    value="<?php echo esc_attr($srv['id']); ?>" 
                                    data-title="<?php echo esc_attr($srv['title']); ?>"
                                    <?php selected($preselected_id, $srv['id']); ?>
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
                        <small class="form-hint">गोपनीयता सुरक्षा के लिए केवल अंतिम 4 अंक ही दर्ज करें।</small>
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
                            मैं पुष्टि करता/करती हूँ कि मेरे द्वारा दी गई जानकारी सत्य है एवं मैं जन सेवा केंद्र द्वारा संपर्क किए जाने की सहमति देता/देती हूँ।
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

<?php get_footer(); ?>
