<?php
/**
 * Template Name: आवश्यक दस्तावेज चेकलिस्ट (Documents Page)
 */
if (!defined('ABSPATH')) exit;

get_header();
?>

<!-- Page Header Banner -->
<div class="page-hero-banner">
    <div class="container">
        <div class="breadcrumbs-nav">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="lang-text" data-hi="मुख्य पृष्ठ" data-en="Home">मुख्य पृष्ठ</a> &raquo; 
            <span class="lang-text" data-hi="आवश्यक दस्तावेज चेकलिस्ट" data-en="Documents Checklist">आवश्यक दस्तावेज चेकलिस्ट</span>
        </div>
        <div class="section-badge-pill pill-light lang-text" data-hi="सटीक मार्गदर्शन" data-en="Accurate Guidance">सटीक मार्गदर्शन</div>
        <h1 class="page-banner-title">
            <span class="lang-text" data-hi="आवेदन से पूर्व आवश्यक दस्तावेज चेकलिस्ट" data-en="Required Documents Checklist Before Applying">आवेदन से पूर्व आवश्यक दस्तावेज चेकलिस्ट</span>
        </h1>
        <p class="page-banner-subtitle">
            <span class="lang-text" data-hi="त्रुटिरहित और पहली बार में ही स्वीकृत होने वाले आवेदन के लिए जरूरी कागजात की संपूर्ण सूची" data-en="Complete list of documents required for error-free and instant application approval">
                त्रुटिरहित और पहली बार में ही स्वीकृत होने वाले आवेदन के लिए जरूरी कागजात की संपूर्ण सूची
            </span>
        </p>
    </div>
</div>

<!-- Documents Checklist Section -->
<section class="docs-guide-section py-5" id="documents-guide">
    <div class="container">
        <div class="docs-guide-grid">
            <!-- 1. Income, Caste, Domicile -->
            <div class="guide-card">
                <div class="guide-header">
                    <span class="guide-badge lang-text" data-hi="ई-डिस्ट्रिक्ट सेवाएं" data-en="e-District Services">ई-डिस्ट्रिक्ट सेवाएं</span>
                    <h3 class="lang-text" data-hi="आय, जाति एवं निवास प्रमाण पत्र हेतु" data-en="Income, Caste & Domicile Certificates">आय, जाति एवं निवास प्रमाण पत्र हेतु</h3>
                </div>
                <ul class="guide-list">
                    <li class="lang-text" data-hi="✓ आवेदक का आधार कार्ड: दोनों तरफ की स्पष्ट प्रति।" data-en="✓ Applicant Aadhaar Card: Clear copy of both sides.">✓ <strong>आवेदक का आधार कार्ड:</strong> दोनों तरफ की स्पष्ट प्रति।</li>
                    <li class="lang-text" data-hi="✓ स्वप्रमाणित घोषणा पत्र: केंद्र पर निशुल्क उपलब्ध।" data-en="✓ Self-Declaration Form: Free available at center.">✓ <strong>स्वप्रमाणित घोषणा पत्र:</strong> केंद्र पर निशुल्क उपलब्ध।</li>
                    <li class="lang-text" data-hi="✓ पासपोर्ट साइज फोटो: 1 नवीनतम रंगीन फोटो।" data-en="✓ Passport Size Photo: 1 latest colored photo.">✓ <strong>पासपोर्ट साइज फोटो:</strong> 1 नवीनतम रंगीन फोटो।</li>
                    <li class="lang-text" data-hi="✓ निवास का प्रमाण: बिजली बिल, राशन कार्ड या वोटर आईडी।" data-en="✓ Address Proof: Electricity bill, Ration card or Voter ID.">✓ <strong>निवास का प्रमाण:</strong> बिजली बिल, राशन कार्ड या वोटर आईडी।</li>
                    <li class="lang-text" data-hi="✓ जाति प्रमाण हेतु: पिता/परिवार के सदस्य का पुराना जाति प्रमाण पत्र या खतौनी।" data-en="✓ For Caste: Father's caste certificate or Khatauni copy.">✓ <strong>जाति प्रमाण हेतु:</strong> पिता/परिवार के सदस्य का पुराना जाति प्रमाण पत्र या खतौनी।</li>
                    <li class="lang-text" data-hi="✓ आय प्रमाण हेतु: वेतन पर्ची, कृषि भूमि रिकॉर्ड या शपथ पत्र।" data-en="✓ For Income: Salary slip, land record or affidavit.">✓ <strong>आय प्रमाण हेतु:</strong> वेतन पर्ची, कृषि भूमि रिकॉर्ड या शपथ पत्र।</li>
                </ul>
                <div class="guide-card-footer">
                    <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="btn btn-primary-sm w-100 lang-text" data-hi="तुरंत आवेदन करें" data-en="Apply Now">तुरंत आवेदन करें</a>
                </div>
            </div>

            <!-- 2. PAN Card -->
            <div class="guide-card">
                <div class="guide-header">
                    <span class="guide-badge lang-text" data-hi="आयकर विभाग" data-en="Income Tax Dept">आयकर विभाग</span>
                    <h3 class="lang-text" data-hi="नया पैन कार्ड (Form 49A) व सुधार हेतु" data-en="New PAN Card (Form 49A) & Correction">नया पैन कार्ड (Form 49A) व सुधार हेतु</h3>
                </div>
                <ul class="guide-list">
                    <li class="lang-text" data-hi="✓ पहचान प्रमाण (POI): आधार कार्ड (सर्वोत्तम) या वोटर आईडी।" data-en="✓ Identity Proof (POI): Aadhaar card or Voter ID.">✓ <strong>पहचान प्रमाण (POI):</strong> आधार कार्ड (सर्वोत्तम) या वोटर आईडी।</li>
                    <li class="lang-text" data-hi="✓ पता प्रमाण (POA): आधार कार्ड या निवास प्रमाण।" data-en="✓ Address Proof (POA): Aadhaar card or Domicile certificate.">✓ <strong>पता प्रमाण (POA):</strong> आधार कार्ड या निवास प्रमाण।</li>
                    <li class="lang-text" data-hi="✓ जन्मतिथि प्रमाण (DOB): 10वीं अंकपत्र या जन्म प्रमाण पत्र।" data-en="✓ Date of Birth Proof (DOB): 10th marksheet or Birth certificate.">✓ <strong>जन्मतिथि प्रमाण (DOB):</strong> 10वीं अंकपत्र या जन्म प्रमाण पत्र।</li>
                    <li class="lang-text" data-hi="✓ फोटो व हस्ताक्षर: 2 पासपोर्ट फोटो, सफेद कागज पर हस्ताक्षर।" data-en="✓ Photo & Sign: 2 passport photos, signature on white paper.">✓ <strong>फोटो व हस्ताक्षर:</strong> 2 पासपोर्ट फोटो, सफेद कागज पर हस्ताक्षर।</li>
                    <li class="lang-text" data-hi="✓ सुधार हेतु: पुराने पैन कार्ड की छायाप्रति।" data-en="✓ For Correction: Photocopy of existing PAN card.">✓ <strong>सुधार हेतु:</strong> पुराने पैन कार्ड की छायाप्रति।</li>
                </ul>
                <div class="guide-card-footer">
                    <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="btn btn-primary-sm w-100 lang-text" data-hi="पैन कार्ड हेतु आवेदन" data-en="Apply for PAN Card">पैन कार्ड हेतु आवेदन</a>
                </div>
            </div>

            <!-- 3. PM Kisan & Schemes -->
            <div class="guide-card">
                <div class="guide-header">
                    <span class="guide-badge lang-text" data-hi="कृषि एवं किसान" data-en="Agriculture & Farmers">कृषि एवं किसान</span>
                    <h3 class="lang-text" data-hi="पीएम किसान एवं समाज कल्याण पेंशन" data-en="PM-Kisan & Welfare Pensions">पीएम किसान एवं समाज कल्याण पेंशन</h3>
                </div>
                <ul class="guide-list">
                    <li class="lang-text" data-hi="✓ जमीन की खतौनी: काश्तकार के नाम की प्रमाणित खतौनी नकल।" data-en="✓ Land Records: Certified Khatauni copy in farmer's name.">✓ <strong>जमीन की खतौनी:</strong> काश्तकार के नाम की प्रमाणित खतौनी नकल।</li>
                    <li class="lang-text" data-hi="✓ बैंक पासबुक: बैंक खाता आधार एवं एनपीसीआई (NPCI) लिंक हो।" data-en="✓ Bank Passbook: Account linked with Aadhaar & NPCI.">✓ <strong>बैंक पासबुक:</strong> बैंक खाता आधार एवं एनपीसीआई (NPCI) लिंक हो।</li>
                    <li class="lang-text" data-hi="✓ आधार कार्ड: आधार में चालू मोबाइल नंबर जुड़ा होना अनिवार्य।" data-en="✓ Aadhaar Card: Active mobile number linked is mandatory.">✓ <strong>आधार कार्ड:</strong> आधार में चालू मोबाइल नंबर जुड़ा होना अनिवार्य।</li>
                    <li class="lang-text" data-hi="✓ पेंशन हेतु: आय प्रमाण पत्र, आयु प्रमाण (60 वर्ष+), दिव्यांगता प्रमाण (यदि लागू)।" data-en="✓ For Pension: Income certificate, age proof (60+ yrs), disability certificate.">✓ <strong>पेंशन हेतु:</strong> आय प्रमाण पत्र, आयु प्रमाण (60 वर्ष+), दिव्यांगता प्रमाण (यदि लागू)।</li>
                </ul>
                <div class="guide-card-footer">
                    <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="btn btn-primary-sm w-100 lang-text" data-hi="योजना फॉर्म भरें" data-en="Apply for Scheme">योजना फॉर्म भरें</a>
                </div>
            </div>

            <!-- 4. Ayushman & Health -->
            <div class="guide-card">
                <div class="guide-header">
                    <span class="guide-badge lang-text" data-hi="स्वास्थ्य सुरक्षा" data-en="Health & Ayushman">स्वास्थ्य सुरक्षा</span>
                    <h3 class="lang-text" data-hi="आयुष्मान भारत गोल्डन कार्ड (₹5 लाख)" data-en="Ayushman Bharat Golden Card (₹5 Lakh)">आयुष्मान भारत गोल्डन कार्ड (₹5 लाख)</h3>
                </div>
                <ul class="guide-list">
                    <li class="lang-text" data-hi="✓ राशन कार्ड: पात्र गृहस्थी (6 या अधिक सदस्य) अथवा अंत्योदय राशन कार्ड।" data-en="✓ Ration Card: Eligible household (6+ members) or Antyodaya card.">✓ <strong>राशन कार्ड:</strong> पात्र गृहस्थी (6 या अधिक सदस्य) अथवा अंत्योदय राशन कार्ड।</li>
                    <li class="lang-text" data-hi="✓ आधार कार्ड: परिवार के सभी सदस्यों के आधार कार्ड।" data-en="✓ Aadhaar Card: Aadhaar cards of all family members.">✓ <strong>आधार कार्ड:</strong> परिवार के सभी सदस्यों के आधार कार्ड।</li>
                    <li class="lang-text" data-hi="✓ बायोमेट्रिक: केंद्र पर अंगूठे के निशान द्वारा तत्काल ई-केवाईसी।" data-en="✓ Biometric: Instant e-KYC using thumb impression at center.">✓ <strong>बायोमेट्रिक:</strong> केंद्र पर अंगूठे के निशान द्वारा तत्काल ई-केवाईसी।</li>
                    <li class="lang-text" data-hi="✓ पीवीसी प्रिंट: तत्काल 10 मिनट में प्लास्टिक कार्ड उपलब्ध।" data-en="✓ PVC Print: Instant plastic card available in 10 minutes.">✓ <strong>पीवीसी प्रिंट:</strong> तत्काल 10 मिनट में प्लास्टिक कार्ड उपलब्ध।</li>
                </ul>
                <div class="guide-card-footer">
                    <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="btn btn-primary-sm w-100 lang-text" data-hi="आयुष्मान जांचें" data-en="Check Ayushman Eligibility">आयुष्मान जांचें</a>
                </div>
            </div>

            <!-- 5. Passport Seva -->
            <div class="guide-card">
                <div class="guide-header">
                    <span class="guide-badge lang-text" data-hi="विदेश मंत्रालय" data-en="Ministry of External Affairs">विदेश मंत्रालय</span>
                    <h3 class="lang-text" data-hi="पासपोर्ट ऑनलाइन आवेदन (Passport)" data-en="Passport Online Application">पासपोर्ट ऑनलाइन आवेदन (Passport)</h3>
                </div>
                <ul class="guide-list">
                    <li class="lang-text" data-hi="✓ जन्मतिथि प्रमाण: 10वीं अंकपत्र या जन्म प्रमाण पत्र।" data-en="✓ DOB Proof: 10th marksheet or Birth certificate.">✓ <strong>जन्मतिथि प्रमाण:</strong> 10वीं अंकपत्र या जन्म प्रमाण पत्र।</li>
                    <li class="lang-text" data-hi="✓ पते का प्रमाण: आधार कार्ड, बैंक पासबुक (1 वर्ष का स्टेटमेंट)।" data-en="✓ Address Proof: Aadhaar card, Bank passbook (1 year statement).">✓ <strong>पते का प्रमाण:</strong> आधार कार्ड, बैंक पासबुक (1 वर्ष का स्टेटमेंट)।</li>
                    <li class="lang-text" data-hi="✓ पैन कार्ड एवं वोटर कार्ड: पहचान सत्यापन हेतु।" data-en="✓ PAN Card & Voter ID: For identity verification.">✓ <strong>पैन कार्ड एवं वोटर कार्ड:</strong> पहचान सत्यापन हेतु।</li>
                    <li class="lang-text" data-hi="✓ माता-पिता का विवरण: नाम की स्पेलिंग सभी कागजों में समान होनी चाहिए।" data-en="✓ Parents Details: Spelling of parents names must match across docs.">✓ <strong>माता-पिता का विवरण:</strong> नाम की स्पेलिंग सभी कागजों में समान होनी चाहिए।</li>
                </ul>
                <div class="guide-card-footer">
                    <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="btn btn-primary-sm w-100 lang-text" data-hi="पासपोर्ट आवेदन करें" data-en="Apply for Passport">पासपोर्ट आवेदन करें</a>
                </div>
            </div>

            <!-- 6. Education & Scholarships -->
            <div class="guide-card">
                <div class="guide-header">
                    <span class="guide-badge lang-text" data-hi="शिक्षा व छात्रवृत्ति" data-en="Education & Scholarship">शिक्षा व छात्रवृत्ति</span>
                    <h3 class="lang-text" data-hi="छात्रवृत्ति एवं सरकारी नौकरी फॉर्म" data-en="Scholarship & Govt Exam Forms">छात्रवृत्ति एवं सरकारी नौकरी फॉर्म</h3>
                </div>
                <ul class="guide-list">
                    <li class="lang-text" data-hi="✓ शैक्षणिक अंकपत्र: 10वीं, 12वीं, स्नातक की मूल मार्कशीट।" data-en="✓ Academic Marksheets: 10th, 12th, Degree original marksheets.">✓ <strong>शैक्षणिक अंकपत्र:</strong> 10वीं, 12वीं, स्नातक की मूल मार्कशीट।</li>
                    <li class="lang-text" data-hi="✓ प्रमाण पत्र: 3 वर्ष के भीतर का आय, जाति व निवास प्रमाण पत्र।" data-en="✓ Certificates: Income, caste & domicile certificate within 3 years.">✓ <strong>प्रमाण पत्र:</strong> 3 वर्ष के भीतर का आय, जाति व निवास प्रमाण पत्र।</li>
                    <li class="lang-text" data-hi="✓ फीस रसीद: स्कूल/कॉलेज में जमा की गई वर्तमान वर्ष की फीस रसीद।" data-en="✓ Fee Receipt: Current academic year college/school fee receipt.">✓ <strong>फीस रसीद:</strong> स्कूल/कॉलेज में जमा की गई वर्तमान वर्ष की फीस रसीद।</li>
                    <li class="lang-text" data-hi="✓ बैंक खाता: छात्र के नाम का आधार लिंक बचत खाता।" data-en="✓ Bank Account: Aadhaar-linked savings account in student's name.">✓ <strong>बैंक खाता:</strong> छात्र के नाम का आधार लिंक बचत खाता।</li>
                </ul>
                <div class="guide-card-footer">
                    <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="btn btn-primary-sm w-100 lang-text" data-hi="छात्रवृत्ति फॉर्म भरें" data-en="Apply for Scholarship">छात्रवृत्ति फॉर्म भरें</a>
                </div>
            </div>
        </div>

        <!-- DigiLocker Banner -->
        <div class="digilocker-info-banner mt-5">
            <div class="digi-icon">📂</div>
            <div class="digi-text">
                <h3 class="lang-text" data-hi="डिजिलॉकर (DigiLocker) की सुविधा उपलब्ध" data-en="DigiLocker Verification Facility Available">डिजिलॉकर (DigiLocker) की सुविधा उपलब्ध</h3>
                <p class="lang-text" data-hi="यदि आपके पास दस्तावेजों की भौतिक कॉपी नहीं है, तो आप अपने डिजिलॉकर खाते से सीधे डिजिटल रूप से सत्यापित दस्तावेज भी जमा कर सकते हैं। यह भारत सरकार के आईटी अधिनियम के तहत 100% मान्य है।" data-en="If you do not carry physical copies, you can directly submit digitally verified documents from your DigiLocker account. 100% legally recognized under Govt of India IT Act.">यदि आपके पास दस्तावेजों की भौतिक कॉपी नहीं है, तो आप अपने डिजिलॉकर खाते से सीधे डिजिटल रूप से सत्यापित दस्तावेज भी जमा कर सकते हैं। यह भारत सरकार के आईटी अधिनियम के तहत 100% मान्य है।</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
