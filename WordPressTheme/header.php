<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="keywords" content="buttersand, cookie, chocolate" />
    <?php wp_head(); ?>
</head>

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

<body>
    <div class="wrap <?php echo is_404() ? 'wrap-bg-color' : ''; ?>">
        <header class="header layout-header js-header">
            <div class="header__inner">
                <div class="header__content">
                    <?php if (is_front_page()) : ?>
                        <h1 class="header__logo">
                            <a href="<?php echo $top; ?>">bliss<br>butter<br>cookies</a>
                        </h1>
                    <?php else : ?>
                        <div class="header__logo">
                            <a href="<?php echo $top; ?>">bliss<br>butter<br>cookies</a>
                        </div>
                    <?php endif; ?>
                    <nav class="header__nav">
                        <button class="header__hamburger hamburger js-hamburger" aria-label="メニューを開く">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </nav>
                </div>
                <div class="header__drawer drawer js-drawer">
                    <div class="drawer__inner inner">
                        <nav class="drawer__nav-menu global-menu">
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
                                        <li class="global-menu__item-head"><a href="<?php echo $privacypolicy; ?>">プライバシー<br class="u-mobile" />ポリシー</a>
                                        </li>
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
            </div>
        </header>