<?php get_header(); ?>
<main>
    <!-- sub-mv -->
    <section class="sub-mv">
        <div class="sub-mv__inner">
            <picture class="sub-mv__picture">
                <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/img003.webp" media="(min-width: 768px)" type="image/webp" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/img003.webp" alt="店内の様子" />
            </picture>
            <h1 class="sub-mv__title">concept</h1>
        </div>
    </section>

    <!-- breadcrumbs -->
    <?php get_template_part('parts/breadcrumbs') ?>

    <!-- aboutUs -->
    <article class="aboutUs layout-aboutUs">
        <div class="aboutUs__inner inner">
            <div class="aboutUs__container">
                <div class="aboutUs__image-box">
                    <figure class="aboutUs__image-left u-desktop">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/img001.webp" alt="店内の様子" width="194" height="128" loading="lazy" />
                    </figure>
                    <figure class="aboutUs__image-right">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutUs-img.webp" alt="チョコレートバターサンド" width="281" height="186" loading="lazy" />
                    </figure>
                </div>
                <div class="aboutUs__text-box">
                    <p class="aboutUs__sub-head">brand<br />concept</p>
                    <p class="aboutUs__text">より良い材料を使い、しっかり手間をかけてかけて、これからのお菓子を追求し続ける私たちからの新しい美味しさのギフト。<br>それが<span>bliss&nbsp;butter&nbsp;cookies</span>です。</p>
                </div>
            </div>
        </div>
    </article>

    <!-- gallery -->
    <?php
    // オプションページ 'gallery-options' から繰り返しフィールド 'gallery' を取得
    $gallery_items = SCF::get_option_meta('gallery-options', 'gallery');
    // $gallery_items が空でないかつ配列であることを確認
    if (is_array($gallery_items) && !empty($gallery_items)) {
        // カスタムフィールドからギャラリーのデータを取得
        $valid_gallery_items = array_filter($gallery_items, function ($item) {
            return !empty($item['gallery_img']);
        });
        // array_filterを使って、画像が実際に存在するアイテムだけを$valid_gallery_itemsに保存
        // 画像があるアイテムが1つでもある場合にのみセクションを表示
        if (!empty($valid_gallery_items)) : ?>
            <section class="gallery layout-gallery">
                <div class="gallery__inner inner">
                    <div class="gallery__title-wrap section-title js-wipeAnimation">
                        <span class="section-title__sub">gallery</span>
                        <h2 class="section-title__main">フォト</h2>
                    </div>
                    <ul class="gallery__list gallery-list">
                        <!-- ギャラリーリスト開始 -->
                        <?php foreach ($valid_gallery_items as $key => $gallery_item) : ?>
                            <!-- 画像があるアイテムをループで表示 -->
                            <?php
                            $image = $gallery_item['gallery_img'];
                            $image_url = wp_get_attachment_image_url($image, 'full');
                            $image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
                            // 各画像アイテムのURLとALTテキストを取得
                            ?>
                            <li class="gallery-list__item js-modal-open" data-target="modal-<?php echo $key; ?>">
                                <!-- 各画像アイテムをリストアイテムとして表示 -->
                                <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" />
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- modal -->
                    <div class="gallery__modal gallery-modal">
                        <ul class="gallery-modal__list gallery-modal-list">
                            <?php foreach ($valid_gallery_items as $key => $gallery_item) : ?>
                                <!-- 画像があるアイテムをループで表示 -->
                                <li class="gallery-modal-list__item modal js-modal" id="modal-<?php echo $key; ?>">
                                    <div class="modal__inner">
                                        <figure class="modal__image">
                                            <?php
                                            $image = $gallery_item['gallery_img'];
                                            $image_url = wp_get_attachment_image_url($image, 'full');
                                            $image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
                                            ?>
                                            <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" />
                                        </figure>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </section>
    <?php endif;
    } ?>

    <?php get_footer(); ?>