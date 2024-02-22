<?php get_header(); ?>

<?php
$top = esc_url(home_url('/'));
$limited = esc_url(home_url('/limited/'));
$about = esc_url(home_url('/about/'));
$information = esc_url(home_url('/information/'));
$blog = esc_url(home_url('/blog/'));
$voice = esc_url(home_url('/voice/'));
$price = esc_url(home_url('/price/'));
$faq = esc_url(home_url('/faq/'));
$privacypolicy = esc_url(home_url('/privacypolicy/'));
$terms = esc_url(home_url('/terms-of-service/'));
$contact = esc_url(home_url('/contact/'));
$sitemap = esc_url(home_url('/sitemap/'));
// 各キャンペーンカテゴリーへのリンク
$limited_category1 = esc_url(home_url('/limited_category/cookie/'));
$limited_category2 = esc_url(home_url('/limited_category/chocolate/'));
$limited_category3 = esc_url(home_url('/limited_category/cheese/'));
// インフォメーション各タブへのリンク
$tab1 = $information . '#tab01';
$tab2 = $information . '#tab02';
$tab3 = $information . '#tab03';
// 各料金一覧へのリンク
$price_course1 = $price . '#price1';
$price_course2 = $price . '#price2';
$price_course3 = $price . '#price3';
$price_course4 = $price . '#price4';
?>

<main>
    <!-- sub-mv -->
    <section class="sub-mv">
        <div class="sub-mv__inner">
            <picture class="sub-mv__picture">
                <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/site-map-mv.webp" media="(min-width: 768px)" type="image/webp" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/site-map-mv.webp" alt="チョコレートを作っている様子" />
            </picture>
            <h1 class="sub-mv__title">Site MAP</h1>
        </div>
    </section>
    <!-- breadcrumbs -->
    <?php get_template_part('parts/breadcrumbs') ?>

    <!-- sitemap -->
    <div class="sitemap layout-sitemap">
        <div class="sitemap__inner inner">
            <nav class="sitemap__menu global-menu">
                <div class="global-menu__left">
                    <div class="global-menu__wrap">
                        <ul class="global-menu__items">
                            <li class="global-menu__item-head"> <a href="<?php echo $limited; ?>">期間限定商品</a></li>
                            <li class="global-menu__item"><a href="<?php echo $limited_category1; ?>">クッキー</a></li>
                            <li class="global-menu__item"><a href="<?php echo $limited_category2; ?>">ショコラ</a></li>
                            <li class="global-menu__item"><a href="<?php echo $limited_category3; ?>">チーズクリーム</a></li>
                        </ul>
                        <ul class="global-menu__items">
                            <li class="global-menu__item-head"><a href="<?php echo $about; ?>">コンセプト</a></li>
                        </ul>
                    </div>
                    <div class="global-menu__wrap">
                        <ul class="global-menu__items">
                            <li class="global-menu__item-head"><a href="<?php echo $information; ?>">カテゴリー</a></li>
                            <li class="global-menu__item"><a href="<?php echo $tab1; ?>">バターサンド</a></li>
                            <li class="global-menu__item"><a href="<?php echo $tab2; ?>">ショコラ</a></li>
                            <li class="global-menu__item"><a href="<?php echo $tab3; ?>">チーズケーキ</a></li>
                        </ul>
                        <ul class="global-menu__items">
                            <li class="global-menu__item-head"><a href="<?php echo $blog; ?>">スタッフブログ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="global-menu__right">
                    <div class="global-menu__wrap">
                        <ul class="global-menu__items">
                            <li class="global-menu__item-head"><a href="<?php echo $price; ?>">料金一覧</a></li>
                            <li class="global-menu__item"><a href="<?php echo $price_course1; ?>">バターサンド</a></li>
                            <li class="global-menu__item"><a href="<?php echo $price_course2; ?>">チーズクリーム<br class="u-mobile" />サンド</a></li>
                            <li class="global-menu__item"><a href="<?php echo $price_course3; ?>">チョコレート</a></li>
                            <li class="global-menu__item"><a href="<?php echo $price_course4; ?>">クッキー</a></li>
                        </ul>
                    </div>
                    <div class="global-menu__wrap">
                        <ul class="global-menu__items">
                            <li class="global-menu__item-head"><a href="<?php echo $faq; ?>">よくある質問</a></li>
                        </ul>
                        <ul class="global-menu__items">
                            <li class="global-menu__item-head"><a href="<?php echo $privacypolicy; ?>">プライバシー<br class="u-mobile" />ポリシー</a></li>
                        </ul>
                        <ul class="global-menu__items">
                            <li class="global-menu__item-head"><a href="<?php echo $terms; ?>">利用規約</a></li>
                        </ul>
                        <ul class="global-menu__items">
                            <li class="global-menu__item-head"><a href="<?php echo $contact; ?>">お問い合わせ</a></li>
                        </ul>
                        <ul class="global-menu__items">
                            <li class="global-menu__item-head"><a href="<?php echo $sitemap; ?>">サイトマップ</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <?php get_footer(); ?>