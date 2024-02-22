<?php get_header(); ?>
<main>
    <!-- sub-mv -->
    <section class="sub-mv">
        <div class="sub-mv__inner">
            <picture class="sub-mv__picture">
                <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/contact-mv01.webp" media="(min-width: 768px)" type="image/webp" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/contact-mv01.webp" alt="店内でチョコ菓子を作っている様子" />
            </picture>
            <h1 class="sub-mv__title">contact</h1>
        </div>
    </section>

    <!-- breadcrumbs -->
    <?php get_template_part('parts/breadcrumbs') ?>

    <!-- contact-form -->
    <section class="contact-form layout-contact-form">
        <div class="contact-form__inner inner">
            <div class="contact-form__entry form js-form">
                <?php echo do_shortcode('[contact-form-7 id="915fb7c" title="お問い合わせ"]'); ?>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>