<?php
/**
 * Generic Page Template
 */
if (!defined('ABSPATH')) exit;

get_header();
?>
<div class="generic-page-header">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
</div>

<div class="container py-5">
    <div class="page-card">
        <div class="entry-content">
            <?php
            while (have_posts()) : the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
