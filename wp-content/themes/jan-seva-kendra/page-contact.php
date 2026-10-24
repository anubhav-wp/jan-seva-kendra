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
            <a href="<?php echo esc_url(home_url('/')); ?>" class="lang-text" data-hi="मुख्य पृष्ठ" data-en="Home">मुख्य पृष्ठ</a> &raquo; 
            <span class="lang-text" data-hi="संपर्क एवं सहायता" data-en="Contact & Support">संपर्क एवं सहायता</span>
        </div>
        <div class="section-badge-pill pill-light lang-text" data-hi="24x7 नागरिक हेल्पलाइन" data-en="24x7 Citizen Helpdesk">24x7 नागरिक हेल्पलाइन</div>
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
                <span class="section-badge-pill lang-text" data-hi="हमसे संपर्क करें" data-en="Contact Us">हमसे संपर्क करें</span>
                <h2 class="contact-col-title lang-text" data-hi="हम सदैव आपकी सेवा में तत्पर हैं" data-en="Always at Your Service">हम सदैव आपकी सेवा में तत्पर हैं</h2>
                <p class="contact-col-desc lang-text" data-hi="आप सीधे हमारे केंद्र पर पधार सकते हैं अथवा नीचे दिए गए फोन या व्हाट्सएप नंबरों पर घर बैठे जानकारी प्राप्त कर सकते हैं।" data-en="Visit our center in person or connect conveniently via phone or WhatsApp from home.">
                    आप सीधे हमारे केंद्र पर पधार सकते हैं अथवा नीचे दिए गए फोन या व्हाट्सएप नंबरों पर घर बैठे जानकारी प्राप्त कर सकते हैं।
                </p>

                <div class="center-details-card">
                    <div class="c-detail-item">
                        <span class="c-icon"><?php echo jsk_get_svg_icon('home'); ?></span>
                        <div>
                            <strong class="lang-text" data-hi="केंद्र का भौतिक पता:" data-en="Physical Address:">केंद्र का भौतिक पता:</strong>
                            <span class="lang-text" data-hi="<?php echo esc_attr(jsk_opt('address_hi')); ?>" data-en="<?php echo esc_attr(jsk_opt('address_en')); ?>"><?php echo esc_html(jsk_opt('address_hi')); ?></span>
                        </div>
                    </div>

                    <div class="c-detail-item">
                        <span class="c-icon"><?php echo jsk_get_svg_icon('user-check'); ?></span>
                        <div>
                            <strong class="lang-text" data-hi="अधिकृत सीएससी संचालक (VLE):" data-en="Authorized VLE:">अधिकृत सीएससी संचालक (VLE):</strong>
                            <span><?php echo esc_html(jsk_opt('vle_name')); ?> (<span class="lang-text" data-hi="आईडी:" data-en="ID:">आईडी:</span> <strong><?php echo esc_html(jsk_opt('csc_id')); ?></strong>)</span>
                        </div>
                    </div>

                    <div class="c-detail-item">
                        <span class="c-icon"><?php echo jsk_get_svg_icon('phone'); ?></span>
                        <div>
                            <strong class="lang-text" data-hi="हेल्पलाइन मोबाइल नंबर:" data-en="Helpline Mobile:">हेल्पलाइन मोबाइल नंबर:</strong>
                            <a href="tel:<?php echo esc_attr(jsk_opt('phone')); ?>" class="c-link"><strong><?php echo esc_html(jsk_opt('phone')); ?></strong></a>
                        </div>
                    </div>

                    <div class="c-detail-item">
                        <span class="c-icon"><?php echo jsk_get_svg_icon('clock'); ?></span>
                        <div>
                            <strong class="lang-text" data-hi="टोल-फ्री नागरिक सहायता:" data-en="Toll-Free Support:">टोल-फ्री नागरिक सहायता:</strong>
                            <a href="tel:<?php echo esc_attr(jsk_opt('tollfree')); ?>" class="c-link"><strong><?php echo esc_html(jsk_opt('tollfree')); ?></strong> <span class="lang-text" data-hi="(निशुल्क)" data-en="(Toll-Free)">(निशुल्क)</span></a>
                        </div>
                    </div>

                    <div class="c-detail-item">
                        <span class="c-icon"><?php echo jsk_get_svg_icon('clock'); ?></span>
                        <div>
                            <strong class="lang-text" data-hi="कार्य दिवस एवं समय:" data-en="Working Days & Hours:">कार्य दिवस एवं समय:</strong>
                            <span class="lang-text" data-hi="<?php echo esc_attr(jsk_opt('timings_hi')); ?>" data-en="<?php echo esc_attr(jsk_opt('timings_en')); ?>"><?php echo esc_html(jsk_opt('timings_hi')); ?></span>
                        </div>
                    </div>
                </div>

                <div class="contact-cta-buttons">
                    <a href="https://wa.me/<?php echo esc_attr(jsk_opt('whatsapp')); ?>?text=नमस्ते,%20मुझे%20जन%20सेवा%20केंद्र%20की%20सेवाओं%20के%20बारे%20में%20जानकारी%20चाहिए" target="_blank" rel="noopener" class="btn btn-whatsapp-lg">
                        <span class="lang-text" data-hi="व्हाट्सएप पर संपर्क करें" data-en="Chat on WhatsApp">व्हाट्सएप पर संपर्क करें</span>
                    </a>
                    <a href="tel:<?php echo esc_attr(jsk_opt('phone')); ?>" class="btn btn-call-lg">
                        <span class="lang-text" data-hi="सीधे कॉल करें" data-en="Call Directly">सीधे कॉल करें</span>
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
                        <span class="lang-text" data-hi="केंद्र अभी खुला है (Open Now)" data-en="Center Open Now">केंद्र अभी खुला है (Open Now)</span>
                    </div>
                    <div class="map-card-body">
                        <h4 class="lang-text" data-hi="सुविधाजनक एवं सुगम स्थान" data-en="Convenient & Accessible Location">सुविधाजनक एवं सुगम स्थान</h4>
                        <p class="lang-text" data-hi="<?php echo esc_attr(jsk_opt('address_hi')); ?>" data-en="<?php echo esc_attr(jsk_opt('address_en')); ?>"><?php echo esc_html(jsk_opt('address_hi')); ?></p>
                        <a href="<?php echo esc_url(jsk_opt('maps_url')); ?>" target="_blank" rel="noopener" class="btn btn-outline-map">
                            <span class="lang-text" data-hi="गूगल मैप्स पर रास्ता देखें (Google Maps) →" data-en="Get Directions on Google Maps →">गूगल मैप्स पर रास्ता देखें (Google Maps) →</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Direct Callback / Query Form -->
        <div class="inquiry-form-card mt-5">
            <div class="inquiry-header text-center">
                <span class="section-badge-pill lang-text" data-hi="त्वरित संदेश" data-en="Quick Inquiry">त्वरित संदेश</span>
                <h3 class="lang-text" data-hi="कॉल-बैक या पूछताछ संदेश भेजें" data-en="Send Inquiry / Request Callback">कॉल-बैक या पूछताछ संदेश भेजें</h3>
                <p class="lang-text" data-hi="अपना नाम और मोबाइल नंबर दर्ज करें, हमारा प्रतिनिधि आपसे 30 मिनट में संपर्क करेगा।" data-en="Enter your name and mobile number. Our representative will contact you in 30 minutes.">अपना नाम और मोबाइल नंबर दर्ज करें, हमारा प्रतिनिधि आपसे 30 मिनट में संपर्क करेगा।</p>
            </div>

            <form id="contactInquiryForm" class="inquiry-form">
                <div class="form-row-2">
                    <div class="form-group">
                        <label class="form-label lang-text" data-hi="आपका नाम:" data-en="Your Name:">आपका नाम:</label>
                        <input type="text" id="inqName" class="form-input" placeholder="उदा. सुरेश शर्मा" data-placeholder-hi="उदा. सुरेश शर्मा" data-placeholder-en="e.g. Suresh Sharma" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label lang-text" data-hi="मोबाइल नंबर:" data-en="Mobile Number:">मोबाइल नंबर:</label>
                        <input type="tel" id="inqMobile" class="form-input" placeholder="उदा. 9876543210" data-placeholder-hi="उदा. 9876543210" data-placeholder-en="e.g. 9876543210" pattern="[6-9][0-9]{9}" maxlength="10" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label lang-text" data-hi="किस सेवा के बारे में पूछना चाहते हैं?" data-en="Which service are you inquiring about?">किस सेवा के बारे में पूछना चाहते हैं?</label>
                    <input type="text" id="inqService" class="form-input" placeholder="उदा. आय प्रमाण पत्र / आधार सुधार / किसान सम्मान निधि" data-placeholder-hi="उदा. आय प्रमाण पत्र / आधार सुधार / किसान सम्मान निधि" data-placeholder-en="e.g. Income Certificate / Aadhaar / PM-Kisan">
                </div>
                <div class="form-group">
                    <label class="form-label lang-text" data-hi="संदेश / टिप्पणी:" data-en="Message / Details:">संदेश / टिप्पणी:</label>
                    <textarea id="inqMessage" rows="3" class="form-textarea" placeholder="अपना प्रश्न या आवश्यकता विस्तार से लिखें..." data-placeholder-hi="अपना प्रश्न या आवश्यकता विस्तार से लिखें..." data-placeholder-en="Write your inquiry or question in detail..."></textarea>
                </div>
                <div id="inqAlert" class="form-alert mt-2" style="display: none;"></div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary" style="padding: 12px 36px;">
                        <span class="lang-text" data-hi="संदेश भेजें / कॉल-बैक अनुरोध" data-en="Send Message / Request Callback">संदेश भेजें / कॉल-बैक अनुरोध</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?>
