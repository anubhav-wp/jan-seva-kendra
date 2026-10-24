<?php
/**
 * Template Name: संपर्क एवं सहायता (Contact Page)
 */
if (!defined('ABSPATH')) exit;

get_header();

$csc_center_img = JSK_THEME_URI . '/assets/images/center-storefront.jpg';
?>

<!-- Page Header Banner -->
<div class="page-hero-banner">
    <div class="container">
        <div class="breadcrumbs-nav">
            <a href="<?php echo esc_url(home_url('/')); ?>">मुख्य पृष्ठ</a> &raquo; 
            <span>संपर्क एवं सहायता</span>
        </div>
        <div class="section-badge-pill pill-light">24x7 नागरिक हेल्पलाइन</div>
        <h1 class="page-banner-title">
            <span class="lang-text" data-hi="जन सेवा केंद्र संपर्क एवं सहायता केंद्र" data-en="Jan Seva Kendra Contact & Helpdesk">
                जन सेवा केंद्र संपर्क एवं सहायता केंद्र
            </span>
        </h1>
        <p class="page-banner-subtitle">
            <span class="lang-text" data-hi="किसी भी सेवा, दस्तावेज अथवा आवेदन स्थिति से संबंधित प्रश्न के लिए निसंकोच संपर्क करें" data-en="Feel free to reach out for any inquiry, document verification or application status assistance">
                किसी भी सेवा, दस्तावेज अथवा आवेदन स्थिति से संबंधित प्रश्न के लिए निसंकोच संपर्क करें
            </span>
        </p>
    </div>
</div>

<!-- Contact Main Section -->
<section class="contact-section py-5" id="contact-center">
    <div class="container">
        <div class="contact-container-box">
            <div class="contact-info-col">
                <span class="section-badge-pill">हमसे संपर्क करें</span>
                <h2 class="contact-col-title">हम सदैव आपकी सेवा में तत्पर हैं</h2>
                <p class="contact-col-desc">
                    आप सीधे हमारे केंद्र पर पधार सकते हैं अथवा नीचे दिए गए फोन या व्हाट्सएप नंबरों पर घर बैठे जानकारी प्राप्त कर सकते हैं।
                </p>

                <div class="center-details-card">
                    <div class="c-detail-item">
                        <span class="c-icon"><?php echo jsk_get_svg_icon('home'); ?></span>
                        <div>
                            <strong>केंद्र का भौतिक पता:</strong>
                            <span><?php echo esc_html(jsk_opt('address_hi')); ?></span>
                        </div>
                    </div>

                    <div class="c-detail-item">
                        <span class="c-icon"><?php echo jsk_get_svg_icon('user-check'); ?></span>
                        <div>
                            <strong>अधिकृत सीएससी संचालक (VLE):</strong>
                            <span><?php echo esc_html(jsk_opt('vle_name')); ?> (आईडी: <strong><?php echo esc_html(jsk_opt('csc_id')); ?></strong>)</span>
                        </div>
                    </div>

                    <div class="c-detail-item">
                        <span class="c-icon"><?php echo jsk_get_svg_icon('phone'); ?></span>
                        <div>
                            <strong>हेल्पलाइन मोबाइल नंबर:</strong>
                            <a href="tel:<?php echo esc_attr(jsk_opt('phone')); ?>" class="c-link"><strong><?php echo esc_html(jsk_opt('phone')); ?></strong></a>
                        </div>
                    </div>

                    <div class="c-detail-item">
                        <span class="c-icon"><?php echo jsk_get_svg_icon('clock'); ?></span>
                        <div>
                            <strong>टोल-फ्री नागरिक सहायता:</strong>
                            <a href="tel:<?php echo esc_attr(jsk_opt('tollfree')); ?>" class="c-link"><strong><?php echo esc_html(jsk_opt('tollfree')); ?></strong> (निशुल्क)</a>
                        </div>
                    </div>

                    <div class="c-detail-item">
                        <span class="c-icon"><?php echo jsk_get_svg_icon('clock'); ?></span>
                        <div>
                            <strong>कार्य दिवस एवं समय:</strong>
                            <span><?php echo esc_html(jsk_opt('timings_hi')); ?></span>
                        </div>
                    </div>
                </div>

                <div class="contact-cta-buttons">
                    <a href="https://wa.me/<?php echo esc_attr(jsk_opt('whatsapp')); ?>?text=नमस्ते,%20मुझे%20जन%20सेवा%20केंद्र%20की%20सेवाओं%20के%20बारे%20में%20जानकारी%20चाहिए" target="_blank" rel="noopener" class="btn btn-whatsapp-lg">
                        <span>व्हाट्सएप पर संपर्क करें</span>
                    </a>
                    <a href="tel:<?php echo esc_attr(jsk_opt('phone')); ?>" class="btn btn-call-lg">
                        <span>सीधे कॉल करें</span>
                    </a>
                </div>
            </div>

            <!-- Storefront Image & Map Location -->
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
                        <h4>सुविधाजनक एवं सुगम स्थान</h4>
                        <p><?php echo esc_html(jsk_opt('address_hi')); ?></p>
                        <a href="<?php echo esc_url(jsk_opt('maps_url')); ?>" target="_blank" rel="noopener" class="btn btn-outline-map">
                            <span>गूगल मैप्स पर रास्ता देखें (Google Maps) →</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Direct Callback / Query Form -->
        <div class="inquiry-form-card mt-5">
            <div class="inquiry-header text-center">
                <span class="section-badge-pill">त्वरित संदेश</span>
                <h3>कॉल-बैक या पूछताछ संदेश भेजें</h3>
                <p>अपना नाम और मोबाइल नंबर दर्ज करें, हमारा प्रतिनिधि आपसे 30 मिनट में संपर्क करेगा।</p>
            </div>

            <form id="contactInquiryForm" class="inquiry-form">
                <div class="form-row-2">
                    <div class="form-group">
                        <label class="form-label">आपका नाम:</label>
                        <input type="text" id="inqName" class="form-input" placeholder="उदा. सुरेश शर्मा" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">मोबाइल नंबर:</label>
                        <input type="tel" id="inqMobile" class="form-input" placeholder="उदा. 9876543210" pattern="[6-9][0-9]{9}" maxlength="10" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">किस सेवा के बारे में पूछना चाहते हैं?</label>
                    <input type="text" id="inqService" class="form-input" placeholder="उदा. आय प्रमाण पत्र / आधार सुधार / किसान सम्मान निधि">
                </div>
                <div class="form-group">
                    <label class="form-label">संदेश / टिप्पणी:</label>
                    <textarea id="inqMessage" rows="3" class="form-textarea" placeholder="अपना प्रश्न या आवश्यकता विस्तार से लिखें..."></textarea>
                </div>
                <div id="inqAlert" class="form-alert mt-2" style="display: none;"></div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary" style="padding: 12px 36px;">
                        <span>संदेश भेजें / कॉल-बैक अनुरोध</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?>
