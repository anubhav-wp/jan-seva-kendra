<?php
/**
 * Template Name: आवेदन स्थिति जांचें (Track Page)
 */
if (!defined('ABSPATH')) exit;

get_header();
?>

<!-- Page Header Banner -->
<div class="page-hero-banner">
    <div class="container">
        <div class="breadcrumbs-nav">
            <a href="<?php echo esc_url(home_url('/')); ?>">मुख्य पृष्ठ</a> &raquo; 
            <span>आवेदन स्थिति जांचें</span>
        </div>
        <div class="section-badge-pill pill-light">लाइव ट्रैकिंग पोर्टल</div>
        <h1 class="page-banner-title">
            <span class="lang-text" data-hi="अपने आवेदन की वर्तमान स्थिति जांचें" data-en="Track Your Application Status Online">अपने आवेदन की वर्तमान स्थिति जांचें</span>
        </h1>
        <p class="page-banner-subtitle">
            <span class="lang-text" data-hi="अपना संदर्भ नंबर (उदा. JSK-2026-XXXXX) या 10 अंकों का पंजीकृत मोबाइल नंबर दर्ज करें" data-en="Enter your Tracking Reference ID (e.g. JSK-2026-XXXXX) or 10-digit mobile number">
                अपना संदर्भ नंबर (उदा. JSK-2026-XXXXX) या 10 अंकों का पंजीकृत मोबाइल नंबर दर्ज करें
            </span>
        </p>
    </div>
</div>

<!-- Tracking Section -->
<section class="track-section py-5" id="track-section">
    <div class="container">
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
                        <span>स्थिति खोजें</span>
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
                    <a href="https://wa.me/<?php echo esc_attr(jsk_opt('whatsapp')); ?>?text=नमस्ते,%20मैं%20अपने%20आवेदन%20के%20बारे%20में%20पूछना%20चाहता%20हूँ" target="_blank" rel="noopener" class="btn btn-whatsapp-sm">
                        व्हाट्सएप पर सहायता लें
                    </a>
                </div>
            </div>
        </div>

        <!-- Tracking Stages Explanation -->
        <div class="tracking-stages-guide mt-5">
            <div class="section-header text-center mb-4">
                <span class="section-badge-pill">प्रक्रिया मार्गदर्शिका</span>
                <h3>आवेदन के 4 मुख्य चरण (4 Stages of Application)</h3>
            </div>

            <div class="stages-grid">
                <div class="stage-item">
                    <div class="stage-num">1</div>
                    <h4>आवेदन पंजीकरण (Registration)</h4>
                    <p>नागरिक द्वारा ऑनलाइन फॉर्म सबमिट किया गया और JSK ट्रैकिंग नंबर जनरेट हुआ।</p>
                </div>
                <div class="stage-item">
                    <div class="stage-num">2</div>
                    <h4>दस्तावेज सत्यापन (Verification)</h4>
                    <p>सीएससी ऑपरेटर द्वारा आधार, फोटो व घोषणा पत्र आदि की पात्रता जांच की जाती है।</p>
                </div>
                <div class="stage-item">
                    <div class="stage-num">3</div>
                    <h4>विभागीय प्रक्रिया (Department Process)</h4>
                    <p>सरकारी ई-डिस्ट्रिक्ट पोर्टल / संबंधित विभाग के सक्षम अधिकारी (लेखपाल/तहसीलदार) के पास अग्रसारित।</p>
                </div>
                <div class="stage-item">
                    <div class="stage-num">4</div>
                    <h4>स्वीकृति व वितरण (Approval & Ready)</h4>
                    <p>प्रमाण पत्र डिजिटल रूप से हस्ताक्षरित होकर तैयार। ऑनलाइन डाउनलोड या केंद्र से प्राप्त करें।</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
