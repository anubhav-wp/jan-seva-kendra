<?php
/**
 * 404 Error Page Template - Jan Seva Kendra
 */
if (!defined('ABSPATH')) exit;

get_header();
?>

<div class="container py-5 text-center">
    <div class="page-card" style="max-width: 680px; margin: 40px auto; padding: 48px 30px; background: #FFFFFF; border-radius: 20px; border: 1.5px solid #E2E8F0; box-shadow: 0 10px 30px rgba(0,0,0,0.06);">
        <span class="section-badge-pill" style="margin-bottom: 16px;">त्रुटि 404 • पृष्ठ अनुपलब्ध</span>
        <div style="font-size: 80px; font-weight: 900; color: #0D3B66; line-height: 1; margin-bottom: 8px; letter-spacing: -2px;">404</div>
        <h1 style="font-size: 26px; font-weight: 800; color: #07223D; margin-bottom: 12px;">यह पृष्ठ या सेवा उपलब्ध नहीं है</h1>
        <p style="color: #64748B; font-size: 15.5px; margin-bottom: 28px; line-height: 1.6;">
            आप जिस पृष्ठ या सेवा की तलाश कर रहे हैं, वह स्थानांतरित कर दी गई है या उसका लिंक बदल गया है। कृपया नीचे दी गई मुख्य सेवाओं में से चुनें या सीधे सर्च करें।
        </p>

        <!-- Quick Search on 404 page -->
        <form action="<?php echo esc_url(home_url('/')); ?>" method="get" style="display: flex; gap: 8px; max-width: 480px; margin: 0 auto 30px;">
            <input 
                type="search" 
                name="s" 
                placeholder="वांछित सेवा खोजें (उदा. आधार, पैन, प्रमाण पत्र)..." 
                style="flex: 1; padding: 12px 16px; border: 2px solid #E2E8F0; border-radius: 10px; font-size: 14.5px; outline: none;"
            >
            <button type="submit" class="btn btn-primary" style="padding: 12px 20px;">खोजें</button>
        </form>

        <!-- Quick Links -->
        <div style="border-top: 1px dashed #E2E8F0; padding-top: 24px;">
            <span style="display: block; font-size: 13px; font-weight: 700; color: #94A3B8; margin-bottom: 12px; text-transform: uppercase;">लोकप्रिय नागरिक सेवाएं</span>
            <div style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;">
                <a href="<?php echo esc_url(home_url('/')); ?>#services" class="btn btn-outline-nav" style="display: inline-flex;">सभी सेवाएं</a>
                <a href="<?php echo esc_url(home_url('/')); ?>#apply-form-section" class="btn btn-primary">ऑनलाइन आवेदन</a>
                <a href="<?php echo esc_url(home_url('/')); ?>#track-section" class="btn btn-secondary">स्थिति जांचें</a>
                <a href="https://wa.me/919876543210?text=नमस्ते" target="_blank" rel="noopener" class="btn btn-whatsapp">व्हाट्सएप सहायता</a>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
