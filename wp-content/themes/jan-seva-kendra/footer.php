<?php
/**
 * Footer template for Jan Seva Kendra
 */
if (!defined('ABSPATH')) exit;
?>
</main><!-- /#main-content -->

<!-- Official Important Government Portals Quick Links -->
<section class="govt-portals-section">
    <div class="container">
        <div class="section-badge-pill pill-light lang-text" data-hi="राष्ट्रीय डिजिटल लिंक" data-en="National Digital Links">राष्ट्रीय डिजिटल लिंक</div>
        <h3 class="portals-title lang-text" data-hi="प्रमुख आधिकारिक सरकारी ई-गवर्नेंस पोर्टल" data-en="Major Official Government E-Governance Portals">प्रमुख आधिकारिक सरकारी ई-गवर्नेंस पोर्टल</h3>
        <p class="portals-subtitle lang-text" data-hi="नागरिक सीधे इन राष्ट्रीय पोर्टल्स पर भी आधिकारिक सेवाओं का सत्यापन कर सकते हैं" data-en="Citizens can directly access and verify services on official national portals">नागरिक सीधे इन राष्ट्रीय पोर्टल्स पर भी आधिकारिक सेवाओं का सत्यापन कर सकते हैं</p>
        <div class="portals-grid">
            <a href="https://uidai.gov.in" target="_blank" rel="noopener" class="portal-card">
                <span class="portal-tag">UIDAI</span>
                <strong>आधार सेवा पोर्टल</strong>
                <span class="portal-desc">ई-आधार, पीवीसी कार्ड, आधार सत्यापन</span>
            </a>
            <a href="https://edistrict.up.gov.in" target="_blank" rel="noopener" class="portal-card">
                <span class="portal-tag">e-District</span>
                <strong>ई-डिस्ट्रिक्ट पोर्टल</strong>
                <span class="portal-desc">आय, जाति, निवास व राजस्व प्रमाण पत्र</span>
            </a>
            <a href="https://pmkisan.gov.in" target="_blank" rel="noopener" class="portal-card">
                <span class="portal-tag">PM-KISAN</span>
                <strong>पीएम किसान पोर्टल</strong>
                <span class="portal-desc">ई-केवाईसी, किस्त स्थिति, नया पंजीकरण</span>
            </a>
            <a href="https://www.onlineservices.nsdl.com" target="_blank" rel="noopener" class="portal-card">
                <span class="portal-tag">NSDL/UTI</span>
                <strong>पैन कार्ड सेवा</strong>
                <span class="portal-desc">नया पैन कार्ड, पैन सुधार, ई-पैन</span>
            </a>
            <a href="https://voters.eci.gov.in" target="_blank" rel="noopener" class="portal-card">
                <span class="portal-tag">ECI/NVSP</span>
                <strong>मतदाता सेवा पोर्टल</strong>
                <span class="portal-desc">वोटर कार्ड, नाम जोड़ना, ई-एपिक डाउनलोड</span>
            </a>
            <a href="https://digilocker.gov.in" target="_blank" rel="noopener" class="portal-card">
                <span class="portal-tag">DigiLocker</span>
                <strong>डिजिलॉकर भारत</strong>
                <span class="portal-desc">सभी सरकारी दस्तावेजों का डिजिटल भंडार</span>
            </a>
            <a href="https://beneficiary.nha.gov.in" target="_blank" rel="noopener" class="portal-card">
                <span class="portal-tag">PM-JAY</span>
                <strong>आयुष्मान भारत पोर्टल</strong>
                <span class="portal-desc">₹5 लाख मुफ्त उपचार गोल्डन कार्ड</span>
            </a>
            <a href="https://eshram.gov.in" target="_blank" rel="noopener" class="portal-card">
                <span class="portal-tag">e-Shram</span>
                <strong>ई-श्रम राष्ट्रीय पोर्टल</strong>
                <span class="portal-desc">असंगठित कामगार पंजीकरण एवं सुरक्षा</span>
            </a>
        </div>
    </div>
</section>

<!-- Footer Main -->
<footer class="site-footer">
    <div class="container footer-main-grid">
        <!-- Col 1: About Center -->
        <div class="footer-col footer-about">
            <div class="footer-brand">
                <div class="footer-emblem" aria-hidden="true">
                    <svg viewBox="0 0 36 36" width="36" height="36" fill="none">
                        <circle cx="18" cy="18" r="17" fill="#0D3B66"/>
                        <circle cx="18" cy="18" r="13" stroke="#FF7722" stroke-width="1.5"/>
                        <circle cx="18" cy="18" r="5" stroke="#FFFFFF" stroke-width="1.2"/>
                        <circle cx="18" cy="18" r="1.5" fill="#15803D"/>
                    </svg>
                </div>
                <div>
                    <h4 class="footer-brand-title lang-text" data-hi="<?php echo esc_attr(jsk_opt('portal_name_hi')); ?>" data-en="<?php echo esc_attr(jsk_opt('portal_name_en')); ?>">
                        <?php echo esc_html(jsk_opt('portal_name_hi')); ?>
                    </h4>
                    <p class="footer-brand-sub">कॉमन सर्विस सेंटर (CSC E-Governance)</p>
                </div>
            </div>
            <p class="footer-text lang-text" data-hi="<?php echo esc_attr(jsk_opt('footer_about_hi')); ?>" data-en="<?php echo esc_attr(jsk_opt('footer_about_en')); ?>">
                <?php echo esc_html(jsk_opt('footer_about_hi')); ?>
            </p>
            <div class="trust-pill-group">
                <span class="trust-badge">✓ 100% अधिकृत सीएससी केंद्र</span>
                <span class="trust-badge">✓ सुरक्षित बायोमेट्रिक प्रणाली</span>
                <span class="trust-badge">✓ न्यूनतम सरकारी शुल्क</span>
            </div>
        </div>

        <!-- Col 2: Quick Links (Multi-Page Navigation) -->
        <div class="footer-col">
            <h4 class="footer-col-title lang-text" data-hi="नागरिक सेवाएं" data-en="Citizen Services">नागरिक सेवाएं</h4>
            <ul class="footer-links">
                <li><a href="<?php echo esc_url(home_url('/services/')); ?>">आधार एवं पैन कार्ड सेवाएं</a></li>
                <li><a href="<?php echo esc_url(home_url('/services/')); ?>">आय, जाति व निवास प्रमाण पत्र</a></li>
                <li><a href="<?php echo esc_url(home_url('/services/')); ?>">पीएम किसान एवं पेंशन योजनाएं</a></li>
                <li><a href="<?php echo esc_url(home_url('/services/')); ?>">आयुष्मान भारत ₹5 लाख कार्ड</a></li>
                <li><a href="<?php echo esc_url(home_url('/services/')); ?>">आधार एटीएम (AEPS) नगद निकासी</a></li>
                <li><a href="<?php echo esc_url(home_url('/services/')); ?>">बिजली, पानी व गैस बिल भुगतान</a></li>
            </ul>
        </div>

        <!-- Col 3: Guidelines & Pages -->
        <div class="footer-col">
            <h4 class="footer-col-title lang-text" data-hi="नागरिक सहायता व पोर्टल" data-en="Citizen Helpdesk & Pages">नागरिक सहायता व पोर्टल</h4>
            <ul class="footer-links">
                <li><a href="<?php echo esc_url(home_url('/track/')); ?>">आवेदन की ताज़ा स्थिति जांचें</a></li>
                <li><a href="<?php echo esc_url(home_url('/apply/')); ?>">ऑनलाइन सेवा आवेदन फॉर्म</a></li>
                <li><a href="<?php echo esc_url(home_url('/fees/')); ?>">सरकारी व केंद्र शुल्क दर सूची</a></li>
                <li><a href="<?php echo esc_url(home_url('/documents/')); ?>">आवश्यक दस्तावेज चेकलिस्ट</a></li>
                <li><a href="<?php echo esc_url(home_url('/about/')); ?>">हमारे केंद्र के बारे में</a></li>
                <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">केंद्र का पता एवं समय</a></li>
            </ul>
        </div>

        <!-- Col 4: Center Contact Info -->
        <div class="footer-col footer-contact-col" id="center-info">
            <h4 class="footer-col-title lang-text" data-hi="हमारा केंद्र एवं संपर्क" data-en="Center & Contact">हमारा केंद्र एवं संपर्क</h4>
            <div class="contact-card-box">
                <p><strong>संचालक (VLE):</strong> <?php echo esc_html(jsk_opt('vle_name')); ?></p>
                <p><strong>सीएससी आईडी:</strong> <?php echo esc_html(jsk_opt('csc_id')); ?></p>
                <p><strong>पता:</strong> <?php echo esc_html(jsk_opt('address_hi')); ?></p>
                <p><strong>हेल्पलाइन:</strong> <a href="tel:<?php echo esc_attr(jsk_opt('phone')); ?>"><?php echo esc_html(jsk_opt('phone')); ?></a></p>
                <p><strong>टोल-फ्री:</strong> <a href="tel:<?php echo esc_attr(jsk_opt('tollfree')); ?>"><?php echo esc_html(jsk_opt('tollfree')); ?></a></p>
                <p><strong>व्हाट्सएप:</strong> <a href="https://wa.me/<?php echo esc_attr(jsk_opt('whatsapp')); ?>?text=नमस्ते" target="_blank" rel="noopener">+<?php echo esc_html(jsk_opt('whatsapp')); ?></a></p>
                <p><strong>कार्य दिवस:</strong> <?php echo esc_html(jsk_opt('timings_hi')); ?></p>
            </div>
        </div>
    </div>

    <!-- Bottom Disclaimer & Copyright -->
    <div class="footer-bottom">
        <div class="container footer-bottom-inner">
            <p class="copyright-text">
                © <?php echo date('Y'); ?> <?php echo esc_html(jsk_opt('portal_name_hi')); ?> (CSC Digital Portal). सर्वाधिकार सुरक्षित।
            </p>
            <p class="disclaimer-note lang-text" data-hi="<?php echo esc_attr(jsk_opt('disclaimer_hi')); ?>" data-en="<?php echo esc_attr(jsk_opt('disclaimer_en')); ?>">
                <?php echo esc_html(jsk_opt('disclaimer_hi')); ?>
            </p>
        </div>
    </div>
</footer>

<!-- Floating Quick Action Bar for Mobile Devices -->
<div class="mobile-floating-bar" aria-label="त्वरित मोबाइल संपर्क">
    <a href="tel:<?php echo esc_attr(jsk_opt('phone')); ?>" class="mobile-action-item call-action">
        <span class="action-icon"><?php echo jsk_get_svg_icon('phone'); ?></span>
        <span class="action-label lang-text" data-hi="कॉल करें" data-en="Call">कॉल करें</span>
    </a>
    <a href="https://wa.me/<?php echo esc_attr(jsk_opt('whatsapp')); ?>?text=नमस्ते,%20मुझे%20जन%20सेवा%20केंद्र%20की%20सेवाओं%20के%20बारे%20में%20जानकारी%20चाहिए" target="_blank" rel="noopener" class="mobile-action-item whatsapp-action">
        <span class="action-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.97.529 1.831.813 2.796.814 3.183 0 5.769-2.587 5.77-5.767 0-3.181-2.587-5.768-5.77-5.768zm3.385 8.163c-.145.411-.842.766-1.168.809-.328.043-.75.062-2.378-.609-1.921-.793-3.161-2.736-3.256-2.863-.096-.127-.78-1.037-.78-1.977s.484-1.403.656-1.593c.172-.19.375-.238.5-.238.125 0 .25 0 .359.006.115.006.269-.044.421.32.156.376.532 1.3.578 1.395.047.095.078.206.016.333-.063.127-.094.206-.188.317-.094.111-.197.248-.281.333-.094.095-.192.198-.083.385.109.187.484.799 1.038 1.292.715.637 1.317.834 1.505.928.188.095.297.079.406-.047.109-.127.469-.547.594-.734.125-.19.25-.159.422-.095.172.063 1.094.516 1.282.609.188.094.313.141.359.222.047.079.047.458-.098.869z"/></svg>
        </span>
        <span class="action-label">व्हाट्सएप</span>
    </a>
    <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="mobile-action-item apply-action">
        <span class="action-icon"><?php echo jsk_get_svg_icon('file-text'); ?></span>
        <span class="action-label lang-text" data-hi="आवेदन करें" data-en="Apply">आवेदन करें</span>
    </a>
    <a href="<?php echo esc_url(home_url('/track/')); ?>" class="mobile-action-item track-action">
        <span class="action-icon"><?php echo jsk_get_svg_icon('clock'); ?></span>
        <span class="action-label lang-text" data-hi="स्थिति जांचें" data-en="Track">स्थिति जांचें</span>
    </a>
</div>

<!-- ==========================================================================
     LANGUAGE SELECTION POPUP MODAL (As Requested: Ask User to Choose Language)
     ========================================================================== -->
<div class="jsk-modal lang-modal" id="languageModal" aria-hidden="true" role="dialog" aria-labelledby="langModalTitle">
    <div class="modal-backdrop" id="langModalBackdrop"></div>
    <div class="modal-dialog lang-dialog">
        <div class="lang-modal-header text-center">
            <div class="lang-globe-icon">🌐</div>
            <h3 class="modal-title" id="langModalTitle">अपनी पसंदीदा भाषा चुनें<br><small style="font-size:15px; color:#64748B; font-weight:600;">Choose Your Preferred Language</small></h3>
            <p class="lang-modal-sub">कृपया पोर्टल का उपयोग करने के लिए अपनी भाषा चुनें / Select language to view portal</p>
        </div>
        <div class="modal-body">
            <div class="lang-cards-grid">
                <!-- Hindi Card -->
                <button type="button" class="lang-choice-card active" data-lang="hi" id="chooseLangHi">
                    <span class="lang-flag">🇮🇳</span>
                    <strong class="lang-name">हिंदी (Hindi)</strong>
                    <span class="lang-desc">सभी सरकारी सेवाएं, प्रमाण पत्र, स्थिति ट्रैकिंग और नागरिक सहायता</span>
                    <span class="lang-check-badge">✓ चयनित (Selected)</span>
                </button>
                <!-- English Card -->
                <button type="button" class="lang-choice-card" data-lang="en" id="chooseLangEn">
                    <span class="lang-flag">🌐</span>
                    <strong class="lang-name">English</strong>
                    <span class="lang-desc">All citizen services, certificates, application tracking and helpdesk</span>
                    <span class="lang-check-badge">✓ Selected</span>
                </button>
            </div>
        </div>
        <div class="modal-footer" style="justify-content: center;">
            <button type="button" class="btn btn-primary w-100" id="confirmLangBtn" style="padding: 13px;">
                <span>पुष्टि करें एवं आगे बढ़ें / Confirm & Continue →</span>
            </button>
        </div>
    </div>
</div>

<!-- Modal: Service Details Drawer / Dialog -->
<div class="jsk-modal" id="serviceModal" aria-hidden="true" role="dialog" aria-labelledby="modalServiceTitle">
    <div class="modal-backdrop" id="modalBackdrop"></div>
    <div class="modal-dialog">
        <div class="modal-header">
            <div>
                <span class="modal-badge" id="modalServiceBadge">विस्तार</span>
                <h3 class="modal-title" id="modalServiceTitle">सेवा विवरण</h3>
            </div>
            <button class="modal-close-btn" id="modalCloseBtn" aria-label="बंद करें">&times;</button>
        </div>
        <div class="modal-body">
            <div class="modal-meta-row">
                <div class="meta-box">
                    <span class="meta-label">सरकारी व केंद्र शुल्क:</span>
                    <strong class="meta-val text-primary" id="modalServiceFee">₹50</strong>
                </div>
                <div class="meta-box">
                    <span class="meta-label">अनुमानित समय:</span>
                    <strong class="meta-val" id="modalServiceTime">3 से 5 दिन</strong>
                </div>
            </div>
            <div class="modal-desc-box">
                <h4>सेवा के बारे में:</h4>
                <p id="modalServiceDesc"></p>
            </div>
            <div class="modal-docs-box">
                <h4>आवश्यक दस्तावेज (Required Documents):</h4>
                <ul id="modalServiceDocsList" class="docs-checklist"></ul>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="modalCloseBtn2">वापस जाएं</button>
            <a href="#" class="btn btn-primary" id="modalApplyBtn">इस सेवा के लिए आवेदन करें</a>
        </div>
    </div>
</div>

<!-- Modal: Application Success / Printable Slip Modal -->
<div class="jsk-modal" id="receiptModal" aria-hidden="true" role="dialog" aria-labelledby="receiptModalTitle">
    <div class="modal-backdrop" id="receiptBackdrop"></div>
    <div class="modal-dialog receipt-dialog">
        <div class="modal-header receipt-header">
            <div>
                <div class="success-icon-badge">✓</div>
                <h3 class="modal-title" id="receiptModalTitle">आवेदन रसीद एवं संदर्भ पर्ची</h3>
                <p class="receipt-sub">जन सेवा केंद्र - ऑनलाइन नागरिक आवेदन पावती</p>
            </div>
            <button class="modal-close-btn" id="receiptCloseBtn" aria-label="बंद करें">&times;</button>
        </div>
        <div class="modal-body print-area" id="receiptPrintArea">
            <div class="receipt-card">
                <div class="receipt-top-info">
                    <div class="receipt-gov-header">
                        <span class="receipt-org">जन सेवा केंद्र (Common Service Center)</span>
                        <span class="receipt-code">सीएससी आईडी: <?php echo esc_html(jsk_opt('csc_id')); ?></span>
                    </div>
                    <div class="ref-highlight-box">
                        <span class="ref-title">आपका ट्रैकिंग संदर्भ नंबर (Tracking ID):</span>
                        <div class="ref-code-wrapper">
                            <span class="ref-code" id="receiptTrackingId">JSK-2026-00000</span>
                            <button type="button" class="btn-copy-ref" id="copyRefBtn" title="कॉपी करें">कॉपी करें</button>
                        </div>
                        <small class="ref-hint">कृपया इस नंबर को सुरक्षित रखें। भविष्य में स्थिति जांचने के लिए इसकी आवश्यकता होगी।</small>
                    </div>
                </div>

                <div class="receipt-details-table">
                    <div class="receipt-row">
                        <span class="rc-label">आवेदक का नाम:</span>
                        <strong class="rc-val" id="receiptName">-</strong>
                    </div>
                    <div class="receipt-row">
                        <span class="rc-label">मोबाइल नंबर:</span>
                        <strong class="rc-val" id="receiptMobile">-</strong>
                    </div>
                    <div class="receipt-row">
                        <span class="rc-label">चयनित सेवा:</span>
                        <strong class="rc-val" id="receiptService">-</strong>
                    </div>
                    <div class="receipt-row">
                        <span class="rc-label">आवेदन दिनांक:</span>
                        <span class="rc-val" id="receiptDate">-</span>
                    </div>
                    <div class="receipt-row">
                        <span class="rc-label">अनुमानित निस्तारण समय:</span>
                        <span class="rc-val text-success" id="receiptEstTime">1 से 3 कार्य दिवस</span>
                    </div>
                    <div class="receipt-row">
                        <span class="rc-label">वर्तमान स्थिति:</span>
                        <span class="badge badge-success">आवेदन पंजीकृत (Under Review)</span>
                    </div>
                </div>

                <div class="receipt-instruction-box">
                    <strong>महत्वपूर्ण निर्देश:</strong>
                    <ul>
                        <li>हमारा केंद्र प्रतिनिधि 2 घंटे के भीतर आपके मोबाइल पर संपर्क करेगा।</li>
                        <li>जरूरी दस्तावेज आप सीधे व्हाट्सएप या केंद्र पर उपस्थित होकर जमा कर सकते हैं।</li>
                        <li>प्रमाण पत्र तैयार होने पर आपके मोबाइल पर एसएमएस एवं डिजिटल कॉपी भेजी जाएगी।</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="receiptCloseBtn2">बंद करें</button>
            <button type="button" class="btn btn-primary" id="printReceiptBtn">
                <span>रसीद प्रिंट / PDF सेव करें</span>
            </button>
            <a href="#" target="_blank" rel="noopener" class="btn btn-whatsapp" id="whatsappShareBtn">
                <span>व्हाट्सएप पर भेजें</span>
            </a>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
