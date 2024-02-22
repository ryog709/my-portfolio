<?php get_header(); ?>
<main>
    <!-- sub-mv -->
    <section class="sub-mv">
        <div class="sub-mv__inner">
            <picture class="sub-mv__picture">
                <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common//category-pc.webp" media="(min-width: 768px)" type="image/webp" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/category-pc.webp" alt="チョコレート" />
            </picture>
            <h1 class="sub-mv__title">category</h1>
        </div>
    </section>

    <!-- breadcrumbs -->
    <?php get_template_part('parts/breadcrumbs') ?>

    <!-- information -->
    <section class="information layout-information">
        <div class="information__inner inner">
            <div class="information__tab information-tab">
                <ul class="information-tab__menu">
                    <li class="information-tab__menu-item js-tab-menu is-active" data-number="tab01">バター<br class="u-mobile" />サンド</li>
                    <li class="information-tab__menu-item js-tab-menu" data-number="tab02">ショコラ</li>
                    <li class="information-tab__menu-item js-tab-menu" data-number="tab03">チーズ<br class="u-mobile" />ケーキ</li>
                </ul>
                <ul class="information-tab__list">
                    <li id="tab01" class="information-tab__list-item js-tab-content is-active">
                        <div class="information-tab__wrap">
                            <div class="information-tab__content">
                                <h2 class="information-tab__head">バターサンド</h2>
                                <p class="information-tab__text">口どけの良いバターとサクサクのビスケットが奏でる、バターサンドの幸福な味。極上のバターの香りと豊かな風味が一口ごとに広がり、ビスケットの軽やかな歯ざわりとの完璧な調和が、日常に甘美な至福をもたらします。</p>
                            </div>
                            <figure class="information-tab__image">
                                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/butter-sand.webp" alt="ラムレーズンバターサンド" width="297" height="189" loading="lazy" />
                            </figure>
                        </div>
                    </li>
                    <li id="tab02" class="information-tab__list-item js-tab-content">
                        <div class="information-tab__wrap">
                            <div class="information-tab__content">
                                <h2 class="information-tab__head">ショコラ</h2>
                                <p class="information-tab__text">深みのあるカカオの香りが漂うショコラは、心を満たす極上の甘美を約束します。その滑らかな口当たりは、繊細ながらも力強いフレーバーのハーモニーを奏で、一片の中に感動の物語を秘めています。日々の小さな贅沢として、また特別な瞬間の記念に、ショコラはいつでもあなたのそばに。</p>
                            </div>
                            <figure class="information-tab__image">
                                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/chocolat.webp" alt="トリュフショコラ" width="297" height="189" loading="lazy" />
                            </figure>
                        </div>
                    </li>
                    <li id="tab03" class="information-tab__list-item js-tab-content">
                        <div class="information-tab__wrap">
                            <div class="information-tab__content">
                                <h2 class="information-tab__head">チーズケーキ</h2>
                                <p class="information-tab__text">クリーミーなチーズと優しい甘さが融合した絶品チーズケーキ。滑らかな口当たりと豊かな風味のクリームチーズ、サクサクのクラストが心を弾ませ、日常を特別なものに変えます。</p>
                            </div>
                            <figure class="information-tab__image">
                                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/cheese.webp" alt="チーズケーキ" width="297" height="189" loading="lazy" />
                            </figure>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>