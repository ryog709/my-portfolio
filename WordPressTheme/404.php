<?php get_header(); ?>
<main>
    <!-- breadcrumbs -->
    <div class="breadcrumbs breadcrumbs--color-reverse layout-breadcrumbs layout-breadcrumbs--large">
        <div class="breadcrumbs__inner inner">
            <?php if (function_exists('bcn_display')) {
                bcn_display();
            } ?>
        </div>
    </div>

    <!-- section -->
    <section class="notfound layout-notfound">
        <div class="notfound__inner inner">
            <h1 class="notfound__title">404</h1>
            <p class="notfound__text">申し訳ありません。<br />お探しのページが見つかりません。</p>
            <div class="notfound__button">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="button button--color-reverse">Page TOP<span></span></a>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>