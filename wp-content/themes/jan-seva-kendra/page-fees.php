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
            <a href="<?php echo esc_url(home_url('/')); ?>" class="lang-text" data-hi="मुख्य पृष्ठ" data-en="Home">मुख्य पृष्ठ</a> &raquo; 
            <span class="lang-text" data-hi="सेवा शुल्क दर सूची" data-en="Fee Rate Chart">सेवा शुल्क दर सूची</span>
        </div>
        <div class="section-badge-pill pill-light lang-text" data-hi="100% पारदर्शी दरें" data-en="100% Transparent Fees">100% पारदर्शी दरें</div>
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
                            <th class="lang-text" data-hi="क्र.सं." data-en="S.No.">क्र.सं.</th>
                            <th class="lang-text" data-hi="सेवा का नाम (Service Name)" data-en="Service Name">सेवा का नाम (Service Name)</th>
                            <th class="lang-text" data-hi="सरकारी शुल्क (Govt Fee)" data-en="Govt Fee">सरकारी शुल्क (Govt Fee)</th>
                            <th class="lang-text" data-hi="केंद्र सेवा शुल्क (CSC Fee)" data-en="CSC Fee">केंद्र सेवा शुल्क (CSC Fee)</th>
                            <th class="lang-text" data-hi="कुल देय शुल्क (Total)" data-en="Total Fee">कुल देय शुल्क (Total)</th>
                            <th class="lang-text" data-hi="निस्तारण समय (TAT)" data-en="TAT">निस्तारण समय (TAT)</th>
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
                            <td><strong class="lang-text" data-hi="जाति प्रमाण पत्र (Caste Certificate SC/ST/OBC/EWS)" data-en="Caste Certificate (SC/ST/OBC/EWS)">जाति प्रमाण पत्र (Caste Certificate SC/ST/OBC/EWS)</strong></td>
                            <td>₹15</td>
                            <td>₹15</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td class="lang-text" data-hi="4 से 7 कार्य दिवस" data-en="4 to 7 Working Days">4 से 7 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><strong class="lang-text" data-hi="मूल निवास प्रमाण पत्र (Domicile / Resident)" data-en="Domicile / Resident Certificate">मूल निवास प्रमाण पत्र (Domicile / Resident)</strong></td>
                            <td>₹15</td>
                            <td>₹15</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td class="lang-text" data-hi="3 से 5 कार्य दिवस" data-en="3 to 5 Working Days">3 से 5 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><strong class="lang-text" data-hi="नया पैन कार्ड (PAN Card NSDL/UTI)" data-en="New PAN Card (NSDL/UTI)">नया पैन कार्ड (PAN Card NSDL/UTI)</strong></td>
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
                            <td><strong class="lang-text" data-hi="आयुष्मान भारत गोल्डन कार्ड (₹5 लाख मुफ्त इलाज)" data-en="Ayushman Bharat Golden Card (₹5 Lakh Free Treatment)">आयुष्मान भारत गोल्डन कार्ड (₹5 लाख मुफ्त इलाज)</strong></td>
                            <td class="lang-text" data-hi="₹0 (निशुल्क)" data-en="₹0 (Free)">₹0 (निशुल्क)</td>
                            <td class="lang-text" data-hi="₹20 (पीवीसी प्रिंट)" data-en="₹20 (PVC Print)">₹20 (पीवीसी प्रिंट)</td>
                            <td><strong class="fee-total">₹20</strong></td>
                            <td class="lang-text" data-hi="तत्काल 10 मिनट" data-en="Instant 10 Mins">तत्काल 10 मिनट</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><strong class="lang-text" data-hi="पीएम किसान ई-केवाईसी (Biometric Verification)" data-en="PM-Kisan e-KYC (Biometric)">पीएम किसान ई-केवाईसी (Biometric Verification)</strong></td>
                            <td class="lang-text" data-hi="₹0 (निशुल्क)" data-en="₹0 (Free)">₹0 (निशुल्क)</td>
                            <td>₹30</td>
                            <td><strong class="fee-total">₹30</strong></td>
                            <td class="lang-text" data-hi="तत्काल 5 मिनट" data-en="Instant 5 Mins">तत्काल 5 मिनट</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td><strong class="lang-text" data-hi="बिजली बिल भुगतान (Electricity Bill Payment)" data-en="Electricity Bill Payment">बिजली बिल भुगतान (Electricity Bill Payment)</strong></td>
                            <td class="lang-text" data-hi="बिल अनुसार" data-en="As per bill">बिल अनुसार</td>
                            <td class="lang-text" data-hi="₹0 (शून्य अतिरिक्त)" data-en="₹0 (Zero Charge)">₹0 (शून्य अतिरिक्त)</td>
                            <td><strong class="fee-total lang-text" data-hi="केवल बिल राशि" data-en="Only Bill Amount">केवल बिल राशि</strong></td>
                            <td class="lang-text" data-hi="तत्काल अधिकृत रसीद" data-en="Instant Receipt">तत्काल अधिकृत रसीद</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td><strong class="lang-text" data-hi="आधार एटीएम (AEPS) नगद निकासी" data-en="Aadhaar ATM (AEPS) Cash Withdrawal">आधार एटीएम (AEPS) नगद निकासी</strong></td>
                            <td class="lang-text" data-hi="बैंक नियमानुसार" data-en="As per bank rules">बैंक नियमानुसार</td>
                            <td class="lang-text" data-hi="₹0 (शून्य)" data-en="₹0 (Free)">₹0 (शून्य)</td>
                            <td><strong class="fee-total lang-text" data-hi="निशुल्क निकासी" data-en="Free Cash Withdrawal">निशुल्क निकासी</strong></td>
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
                        <tr>
                            <td>11</td>
                            <td><strong class="lang-text" data-hi="पासपोर्ट ऑनलाइन आवेदन फॉर्म" data-en="Passport Online Application">पासपोर्ट ऑनलाइन आवेदन फॉर्म</strong></td>
                            <td class="lang-text" data-hi="₹1500 (सरकारी शुल्क)" data-en="₹1500 (Govt Fee)">₹1500 (सरकारी शुल्क)</td>
                            <td class="lang-text" data-hi="₹100 (फॉर्म व स्लॉट बुकिंग)" data-en="₹100 (Form & Slot Booking)">₹100 (फॉर्म व स्लॉट बुकिंग)</td>
                            <td><strong class="fee-total">₹1600</strong></td>
                            <td class="lang-text" data-hi="15 से 20 कार्य दिवस" data-en="15 to 20 Working Days">15 से 20 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td><strong class="lang-text" data-hi="मतदाता पहचान पत्र (Voter Card Form 6/8)" data-en="Voter ID Card (Form 6/8)">मतदाता पहचान पत्र (Voter Card Form 6/8)</strong></td>
                            <td class="lang-text" data-hi="₹0 (निशुल्क)" data-en="₹0 (Free)">₹0 (निशुल्क)</td>
                            <td class="lang-text" data-hi="₹40 (आवेदन शुल्क)" data-en="₹40 (Service Fee)">₹40 (आवेदन शुल्क)</td>
                            <td><strong class="fee-total">₹40</strong></td>
                            <td class="lang-text" data-hi="7 से 15 कार्य दिवस" data-en="7 to 15 Working Days">7 से 15 कार्य दिवस</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td><strong class="lang-text" data-hi="खतौनी नकल / भूलेख प्रिंट" data-en="Land Records / Khatauni Print">खतौनी नकल / भूलेख प्रिंट</strong></td>
                            <td class="lang-text" data-hi="₹15 प्रति पृष्ठ" data-en="₹15 per page">₹15 प्रति पृष्ठ</td>
                            <td>₹0</td>
                            <td><strong class="fee-total">₹15</strong></td>
                            <td class="lang-text" data-hi="तत्काल 2 मिनट" data-en="Instant 2 Mins">तत्काल 2 मिनट</td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td><strong class="lang-text" data-hi="सरकारी नौकरी व परीक्षा ऑनलाइन फॉर्म" data-en="Govt Job & Exam Online Form">सरकारी नौकरी व परीक्षा ऑनलाइन फॉर्म</strong></td>
                            <td class="lang-text" data-hi="विभागीय परीक्षा शुल्क" data-en="Dept Exam Fee">विभागीय परीक्षा शुल्क</td>
                            <td class="lang-text" data-hi="₹70 (त्रुटिरहित फॉर्म)" data-en="₹70 (Form Assistance)">₹70 (त्रुटिरहित फॉर्म)</td>
                            <td><strong class="fee-total lang-text" data-hi="विभागीय + ₹70" data-en="Exam Fee + ₹70">विभागीय + ₹70</strong></td>
                            <td class="lang-text" data-hi="तत्काल फॉर्म सबमिशन" data-en="Instant Submission">तत्काल फॉर्म सबमिशन</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="fee-note-strip">
                <span class="note-icon">ℹ️</span>
                <span class="lang-text" data-hi="सूचना: हमारे केंद्र पर किसी भी सेवा के लिए निर्धारित दर से अधिक शुल्क नहीं लिया जाता है। सभी भुगतानों की मुद्रित रसीद अनिवार्य रूप से प्राप्त करें।" data-en="Notice: Our center strictly charges only approved rates without any hidden fees. Always collect printed computer receipt.">सूचना: हमारे केंद्र पर किसी भी सेवा के लिए निर्धारित दर से अधिक शुल्क नहीं लिया जाता है। सभी भुगतानों की मुद्रित रसीद अनिवार्य रूप से प्राप्त करें।</span>
            </div>
        </div>

        <!-- Rules & Consumer Protection -->
        <div class="fee-rules-grid mt-4">
            <div class="rule-card">
                <div class="rule-icon">📜</div>
                <h4 class="lang-text" data-hi="पक्की डिजिटल रसीद" data-en="Authentic Digital Receipt">पक्की डिजिटल रसीद</h4>
                <p class="lang-text" data-hi="प्रत्येक आवेदन और सेवा भुगतान की कंप्यूटर जनरेटेड सरकारी रसीद तुरंत दी जाती है जिसमें लेन-देन क्रमांक अंकित होता है।" data-en="Every application payment is accompanied by an instant official computer-generated receipt with transaction ID.">प्रत्येक आवेदन और सेवा भुगतान की कंप्यूटर जनरेटेड सरकारी रसीद तुरंत दी जाती है जिसमें लेन-देन क्रमांक अंकित होता है।</p>
            </div>
            <div class="rule-card">
                <div class="rule-icon">⚖️</div>
                <h4 class="lang-text" data-hi="शासन द्वारा अधिकृत दरें" data-en="Government Authorized Rates">शासन द्वारा अधिकृत दरें</h4>
                <p class="lang-text" data-hi="सभी शुल्क राज्य सरकार एवं सीएससी ई-गवर्नेंस दिशा-निर्देशों के अनुरूप निर्धारित हैं। किसी बिचौलिए की आवश्यकता नहीं है।" data-en="All fees adhere to State Govt and CSC e-Governance guidelines. No middlemen required.">सभी शुल्क राज्य सरकार एवं सीएससी ई-गवर्नेंस दिशा-निर्देशों के अनुरूप निर्धारित हैं। किसी बिचौलिए की आवश्यकता नहीं है।</p>
            </div>
            <div class="rule-card">
                <div class="rule-icon">📞</div>
                <h4 class="lang-text" data-hi="शिकायत निवारण सहायता" data-en="Grievance Redressal Helpdesk">शिकायत निवारण सहायता</h4>
                <p class="lang-text" data-hi="यदि आपसे अतिरिक्त शुल्क की मांग की जाए, तो तत्काल टोल-फ्री <?php echo esc_attr(jsk_opt('tollfree')); ?> पर शिकायत दर्ज कराएं।" data-en="In case of any overcharging concern, report immediately to toll-free <?php echo esc_attr(jsk_opt('tollfree')); ?>.">यदि आपसे अतिरिक्त शुल्क की मांग की जाए, तो तत्काल टोल-फ्री <strong><?php echo esc_html(jsk_opt('tollfree')); ?></strong> पर शिकायत दर्ज कराएं।</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
