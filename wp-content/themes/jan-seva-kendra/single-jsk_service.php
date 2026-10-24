<?php
/**
 * Single Service Template
 */
if (!defined('ABSPATH')) exit;

get_header();

$service_id = get_the_ID();
$docs = get_post_meta($service_id, '_jsk_docs', true) ?: 'आधार कार्ड, पासपोर्ट फोटो, मोबाइल नंबर';
$fee = get_post_meta($service_id, '_jsk_fee', true) ?: '₹50 सरकारी + सेवा शुल्क';
$time = get_post_meta($service_id, '_jsk_time', true) ?: '2 से 5 कार्य दिवस';
$badge = get_post_meta($service_id, '_jsk_badge', true) ?: 'नागरिक सेवा';
$terms = get_the_terms($service_id, 'jsk_service_cat');
$cat_name = ($terms && !is_wp_error($terms)) ? $terms[0]->name : 'सामान्य सेवाएं';
?>

<div class="single-service-header">
    <div class="container">
        <a href="<?php echo esc_url(home_url('/')); ?>#services" class="back-link">← सभी सेवाओं पर वापस जाएं</a>
        <div class="single-service-top">
            <span class="service-cat-pill"><?php echo esc_html($cat_name); ?></span>
            <span class="service-badge-pill"><?php echo esc_html($badge); ?></span>
        </div>
        <h1 class="single-title"><?php the_title(); ?></h1>
        <div class="single-meta-strip">
            <div class="s-meta-item">
                <span>सरकारी व केंद्र शुल्क:</span>
                <strong><?php echo esc_html($fee); ?></strong>
            </div>
            <div class="s-meta-item">
                <span>अनुमानित निस्तारण समय:</span>
                <strong><?php echo esc_html($time); ?></strong>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="single-service-layout">
        <div class="single-content-side">
            <div class="service-detail-card">
                <h2>सेवा का संक्षिप्त विवरण</h2>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <div class="docs-detail-box">
                    <h3>आवश्यक दस्तावेज (Required Documents Checklist)</h3>
                    <p>आवेदन करने के लिए निम्नलिखित दस्तावेजों की स्पष्ट फोटो या प्रति आवश्यक है:</p>
                    <ul class="docs-checklist">
                        <?php 
                        $doc_items = explode(',', $docs);
                        foreach ($doc_items as $item): 
                            $clean_item = trim($item);
                            if (!empty($clean_item)):
                        ?>
                            <li>✓ <?php echo esc_html($clean_item); ?></li>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </ul>
                </div>

                <div class="service-process-box">
                    <h3>आवेदन प्रक्रिया कैसे पूर्ण होती है?</h3>
                    <ol class="process-steps">
                        <li><strong>ऑनलाइन अनुरोध सबमिट करें:</strong> फॉर्म भरकर तत्काल ट्रैकिंग आईडी प्राप्त करें।</li>
                        <li><strong>दस्तावेज सत्यापन:</strong> हमारे ऑपरेटर द्वारा दस्तावेजों की जांच कर सरकारी पोर्टल पर प्रेषित किया जाता है।</li>
                        <li><strong>स्वीकृति एवं रसीद:</strong> विभागीय सत्यापन उपरांत मूल प्रमाण पत्र / रसीद तैयार होती है।</li>
                        <li><strong>डाउनलोड / प्राप्ति:</strong> आपके व्हाट्सएप पर डिजिटल कॉपी भेजी जाती है या आप केंद्र से लैमिनेटेड प्रति प्राप्त कर सकते हैं।</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="single-form-side">
            <div class="quick-apply-box">
                <h3>इस सेवा के लिए तुरंत आवेदन करें</h3>
                <p>सीधे नीचे दिए गए बटन पर क्लिक करें या ऑनलाइन फॉर्म भरें:</p>
                <a href="<?php echo esc_url(home_url('/')); ?>#apply-form-section" class="btn btn-primary w-100 mb-3">
                    ऑनलाइन आवेदन फॉर्म खोलें
                </a>
                <a href="https://wa.me/919876543210?text=नमस्ते,%20मुझे%20<?php echo urlencode(get_the_title()); ?>%20के%20लिए%20आवेदन%20करना%20है" target="_blank" rel="noopener" class="btn btn-whatsapp w-100">
                    व्हाट्सएप पर सहायता लें
                </a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
