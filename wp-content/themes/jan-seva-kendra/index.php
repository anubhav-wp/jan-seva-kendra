<?php
/**
 * Main Index Template Fallback
 */
if (!defined('ABSPATH')) exit;

if (is_front_page()) {
    include get_template_directory() . '/front-page.php';
    return;
}

get_header();
?>
<div class="container py-5">
    <div class="page-card">
        <h1 class="page-title"><?php single_post_title(); ?></h1>
        <div class="page-content">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            else :
                echo '<p>कोई सामग्री उपलब्ध नहीं है।</p>';
            endif;
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
