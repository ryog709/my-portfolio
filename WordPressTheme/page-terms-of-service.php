<?php get_header(); ?>

<main>
    <!-- sub-mv -->
    <section class="sub-mv">
        <div class="sub-mv__inner">
            <picture class="sub-mv__picture">
                <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/privacy-policy.webp" media="(min-width: 768px)" type="image/webp" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/privacy-policy.webp" alt="チョコレート" />
            </picture>
            <h1 class="sub-mv__title">terms&nbsp;of<span>&nbsp;service</span></h1>
        </div>
    </section>
    <!-- breadcrumbs -->
    <?php get_template_part('parts/breadcrumbs') ?>

    <!-- legal-document -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <section class="legal-document layout-legal-document">
                <div class="legal-document__inner">
                    <h2 class="legal-document__title"><?php the_title(); ?></h2>
                    <div class="legal-document__terms">
                        <?php the_content(); ?>
                    </div>
                </div>
            </section>
    <?php endwhile;
    endif; ?>

    <?php get_footer(); ?>