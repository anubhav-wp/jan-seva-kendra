<?php
/**
 * Template Name: सेवा शुल्क दर सूची (Fees Page)
 */
if (!defined('ABSPATH')) exit;

get_header();
?>

<!-- Page Header Banner -->
<div class="page-hero-banner">
    <div class="container">
        <div class="breadcrumbs-nav">
            <a href="<?php echo esc_url(home_url('/')); ?>">मुख्य पृष्ठ</a> &raquo; 
            <span>सेवा शुल्क दर सूची</span>
        </div>
        <div class="section-badge-pill pill-light">100% पारदर्शी दरें</div>
        <h1 class="page-banner-title">
            <span class="lang-text" data-hi="सरकारी एवं केंद्र सेवा शुल्क दर तालिका" data-en="Government & CSC Center Service Fee Chart">सरकारी एवं केंद्र सेवा शुल्क दर तालिका</span>
        </h1>
        <p class="page-banner-subtitle">
            <span class="lang-text" data-hi="शासन द्वारा निर्धारित अधिकृत शुल्क दरें — शून्य अतिरिक्त चार्ज, हर सेवा की पक्की कंप्यूटर रसीद" data-en="Officially approved service fees — Zero hidden charges, authentic computer receipt for every service">
                शासन द्वारा निर्धारित अधिकृत शुल्क दरें — शून्य अतिरिक्त चार्ज, हर सेवा की पक्की कंप्यूटर रसीद
            </span>
        </p>
    </div>
</div>

<!-- Fee Section -->
<section class="fee-section py-5" id="fee-chart">
    <div class="container">
        <div class="fee-table-card">
            <div class="table-responsive">
                <table class="fee-table">
                    <thead>
                        <tr>
                            <th>क्र.सं.</th>
                            <th>सेवा का नाम (Service Name)</th>
                            <th>सरकारी शुल्क (Govt Fee)</th>
                            <th>केंद्र सेवा शुल्क (CSC Fee)</th>
                            <th>कुल देय शुल्क (Total)</th>
                            <th>निस्तारण समय (TAT)</th>
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
                            <td><strong>जाति प्रमाण पत्र (Caste Certificate SC/ST/OBC/EWS)</strong></td>
                            <td>₹15</td>
                            <td>₹15</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td>4 से 7 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><strong>मूल निवास प्रमाण पत्र (Domicile / Resident)</strong></td>
                            <td>₹15</td>
                            <td>₹15</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td>3 से 5 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><strong>नया पैन कार्ड (PAN Card NSDL/UTI)</strong></td>
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
                            <td><strong>आयुष्मान भारत गोल्डन कार्ड (₹5 लाख मुफ्त इलाज)</strong></td>
                            <td>₹0 (निशुल्क)</td>
                            <td>₹20 (पीवीसी प्रिंट)</td>
                            <td><strong class="fee-total">₹20</strong></td>
                            <td>तत्काल 10 मिनट</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><strong>पीएम किसान ई-केवाईसी (Biometric Verification)</strong></td>
                            <td>₹0 (निशुल्क)</td>
                            <td>₹30</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td>तत्काल 5 मिनट</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td><strong>बिजली बिल भुगतान (Electricity Bill Payment)</strong></td>
                            <td>बिल अनुसार</td>
                            <td>₹0 (शून्य अतिरिक्त)</td>
                            <td><strong class="fee-total">केवल बिल राशि</strong></td>
                            <td>तत्काल अधिकृत रसीद</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td><strong>आधार एटीएम (AEPS) नगद निकासी</strong></td>
                            <td>बैंक नियमानुसार</td>
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
                        <tr>
                            <td>11</td>
                            <td><strong>पासपोर्ट ऑनलाइन आवेदन फॉर्म</strong></td>
                            <td>₹1500 (सरकारी शुल्क)</td>
                            <td>₹100 (फॉर्म व स्लॉट बुकिंग)</td>
                            <td><strong class="fee-total">₹1600</strong></td>
                            <td>15 से 20 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td><strong>मतदाता पहचान पत्र (Voter Card Form 6/8)</strong></td>
                            <td>₹0 (निशुल्क)</td>
                            <td>₹40 (आवेदन शुल्क)</td>
                            <td><strong class="fee-total">₹40</strong></td>
                            <td>7 से 15 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td><strong>खतौनी नकल / भूलेख प्रिंट</strong></td>
                            <td>₹15 प्रति पृष्ठ</td>
                            <td>₹0</td>
                            <td><strong class="fee-total">₹15</strong></td>
                            <td>तत्काल 2 मिनट</td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td><strong>सरकारी नौकरी व परीक्षा ऑनलाइन फॉर्म</strong></td>
                            <td>विभागीय परीक्षा शुल्क</td>
                            <td>₹70 (त्रुटिरहित फॉर्म)</td>
                            <td><strong class="fee-total">विभागीय + ₹70</strong></td>
                            <td>तत्काल फॉर्म सबमिशन</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="fee-note-strip">
                <span class="note-icon">ℹ️</span>
                <span>सूचना: हमारे केंद्र पर किसी भी सेवा के लिए निर्धारित दर से अधिक शुल्क नहीं लिया जाता है। सभी भुगतानों की मुद्रित रसीद अनिवार्य रूप से प्राप्त करें।</span>
            </div>
        </div>

        <!-- Rules & Consumer Protection -->
        <div class="fee-rules-grid mt-4">
            <div class="rule-card">
                <div class="rule-icon">📜</div>
                <h4>पक्की डिजिटल रसीद</h4>
                <p>प्रत्येक आवेदन और सेवा भुगतान की कंप्यूटर जनरेटेड सरकारी रसीद तुरंत दी जाती है जिसमें लेन-देन क्रमांक अंकित होता है।</p>
            </div>
            <div class="rule-card">
                <div class="rule-icon">⚖️</div>
                <h4>शासन द्वारा अधिकृत दरें</h4>
                <p>सभी शुल्क राज्य सरकार एवं सीएससी ई-गवर्नेंस दिशा-निर्देशों के अनुरूप निर्धारित हैं। किसी बिचौलिए की आवश्यकता नहीं है।</p>
            </div>
            <div class="rule-card">
                <div class="rule-icon">📞</div>
                <h4>शिकायत निवारण सहायता</h4>
                <p>यदि आपसे अतिरिक्त शुल्क की मांग की जाए, तो तत्काल टोल-फ्री <strong><?php echo esc_html(jsk_opt('tollfree')); ?></strong> पर शिकायत दर्ज कराएं।</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
