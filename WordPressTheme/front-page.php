<?php get_header(); ?>
<main>
    <!-- top-mv -->
    <section class="top-mv layout-top-mv">
        <div class="top-mv__inner">
            <div class="top-mv__opening opening-mv">
                <div class="opening-mv__mask js-opening-mv-mask"></div>
                <div class="opening-mv__title-content">
                    <p class="opening-mv__title js-opening-mv__title">bliss<br>butter<br>cookies</p>
                </div>
            </div>
            <div class="top-mv__swiper swiper js-mv-swiper">
                <div class="top-mv__swiper-wrapper swiper-wrapper">
                    <?php
                    $i = 1; // 初期化
                    while (true) : // 無限ループ
                        $slide = get_field('slide' . $i); // スライドデータを取得
                        if (!$slide) break; // スライドがなければループを抜ける
                        // サブフィールドからデータを取得
                        $pc_src = $slide['slide_pc' . $i];
                        $sp_src = $slide['slide_sp' . $i];
                        $alt    = $slide['slide_alt' . $i];
                        // 両方の画像が設定されている場合のみスライドを表示
                        if (isset($pc_src) && isset($sp_src)) : ?>
                            <div class="top-mv__swiper-slide swiper-slide">
                                <picture class="top-mv__picture">
                                    <source srcset="<?php echo $pc_src; ?>" media="(min-width: 768px)" type="image/webp" />
                                    <img src="<?php echo $sp_src; ?>" alt="<?php echo $alt; ?>" />
                                </picture>
                            </div>
                    <?php endif;
                        $i++; // インクリメント
                    endwhile;
                    ?>
                </div>
            </div>
            <div class="top-mv__title-content js-mv-title-content">
                <h2 class="top-mv__title js-mv-title">bliss<br>butter<br>cookies</h2>
            </div>
        </div>
    </section>

    <!-- top-limited -->
    <?php
    // 新しいWP_Queryインスタンスを作成し、'campaign'カスタム投稿タイプの投稿を取得
    $campaign_query      = new WP_Query([
        'post_type'      => 'limited', // カスタム投稿タイプを指定
        'posts_per_page' => 16,         // 最大16件の投稿を表示
        'orderby'        => "rand"      // ランダムな順序で投稿を取得
    ]);
    // 投稿があるかどうかをチェック
    if ($campaign_query->have_posts()) : ?>
        <section class="top-limited layout-top-limited">
            <div class="top-limited__inner inner">
                <div class="top-limited__header">
                    <div class="top-limited__title-wrap section-title js-wipeAnimation">
                        <span class="section-title__sub">limited&nbsp;edition</span>
                        <h2 class="section-title__main">期間限定商品</h2>
                    </div>
                    <div class="top-limited__swiper-buttons">
                        <div class="top-limited__swiper-button-prev swiper-button-prev"></div>
                        <div class="top-limited__swiper-button-next swiper-button-next"></div>
                    </div>
                </div>
                <div class="top-limited__swiper-container">
                    <div class="top-limited__swiper swiper js-card-swiper">
                        <div class="top-limited__swiper-wrapper swiper-wrapper">
                            <!-- 各投稿に対してループ -->
                            <?php while ($campaign_query->have_posts()) : $campaign_query->the_post(); ?>
                                <div class="top-limited__swiper-slide swiper-slide">
                                    <figure class="top-limited__swiper-card limited-card">
                                        <!-- 投稿のサムネイルを表示 -->
                                        <div class="limited-card__image">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <!-- サムネイル画像のサイズと属性を指定して表示 -->
                                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="280" height="188" loading="lazy" />
                                            <?php else : ?>
                                                <!-- サムネイルがない場合の代替画像 -->
                                                <img class="noimage" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.webp" alt="noimage" width="280" height="188" loading="lazy" />
                                            <?php endif; ?>
                                        </div>
                                        <figcaption class="limited-card__body">
                                            <!-- カスタムタクソノミー（カテゴリー）を表示 -->
                                            <p class="limited-card__tag"><span><?php the_terms(null, 'limited_category'); ?></span></p>
                                            <!-- 投稿のタイトルを表示 -->
                                            <p class="limited-card__title"><?php the_title(); ?></p>
                                            <!-- カスタムフィールドからキャンペーン価格情報を取得 -->
                                            <?php $campaignPrice = get_field('campaign_price_list');
                                            if ($campaignPrice) : ?>
                                                <!-- キャンペーン価格情報を表示 -->
                                                <p class="limited-card__text"><?php echo $campaignPrice['campaign_text']; ?></p>
                                                <div class="limited-card__price-wrap">
                                                    <!-- <div class="limited-card__price-sub"><span><?php echo $campaignPrice['normal_price']; ?></span></div> -->
                                                    <div class="limited-card__price-main"><?php echo $campaignPrice['campaign_price']; ?></div>
                                                </div>
                                            <?php endif; ?>
                                        </figcaption>
                                    </figure>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <div class="top-limited__button">
                    <a href="<?php echo esc_url(home_url('/limited/')); ?>" class="button">View more<span></span></a>
                </div>
            </div>
        </section>
    <?php endif;
    wp_reset_postdata(); ?>

    <!-- top-aboutUs -->
    <section class="top-aboutUs layout-top-aboutUs">
        <div class="top-aboutUs__inner inner">
            <div class="top-aboutUs__title-wrap section-title js-wipeAnimation">
                <span class="section-title__sub">concept</span>
                <h2 class="section-title__main">コンセプト</h2>
            </div>
            <div class="top-aboutUs__container js-fadeUp">
                <div class="top-aboutUs__image-box">
                    <figure class="top-aboutUs__image-left">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/img001.webp" alt="洋菓子店" width="194" height="128" loading="lazy" />
                    </figure>
                    <figure class="top-aboutUs__image-right">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutUs-img.webp" alt="チョコレートソースクッキー" width="281" height="186" loading="lazy" />
                    </figure>
                </div>
                <div class="top-aboutUs__text-wrap">
                    <h3 class="top-aboutUs__sub-head">brand<br />concept</h3>
                    <div class="top-aboutUs__content">
                        <p class="top-aboutUs__text">より良い材料を使い、しっかり手間をかけてかけて、これからのお菓子を追求し続ける私たちからの新しい美味しさのギフト。<br>それが<span>bliss&nbsp;butter&nbsp;cookies</span>です。</p>
                        <div class="top-aboutUs__button">
                            <a href="<?php echo esc_url(home_url('/about/')); ?>" class="button">View more<span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- top-information -->
    <section class="top-information layout-top-information">
        <div class="top-information__inner inner">
            <div class="top-information__title-wrap section-title js-wipeAnimation">
                <span class="section-title__sub">category</span>
                <h2 class="section-title__main">カテゴリー</h2>
            </div>
            <div class="top-information__wrap js-fadeUp">
                <div class="top-information__image">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/img013.webp" alt="チョコレートの画像" width="345" height="227" loading="lazy" />
                </div>
                <div class="top-information__content">
                    <p class="top-information__head">カテゴリー</p>
                    <p class="top-information__text">当店では、繊細な味わいと洗練されたデザインが融合したお菓子をご提供しています。各カテゴリーでは、バターサンド、ショコラ、チーズケーキなど、選りすぐりの逸品をお楽しみいただけます。美しいお菓子で、日常に特別なひと時を。</p>
                    <div class="top-information__button">
                        <a href="<?php echo esc_url(home_url('/information/')); ?>" class="button">View more<span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- top-blog -->
    <?php
    // WordPressのカスタムクエリを設定し、ブログ投稿を取得
    $blog_query          = new WP_Query([
        'post_type'      => 'post',    // 投稿タイプを'投稿'に指定
        'posts_per_page' => 3,         // 表示する投稿数
    ]);
    // 投稿がある場合の処理
    if ($blog_query->have_posts()) : ?>
        <section class="top-blog layout-top-blog">
            <div class="top-blog__inner">
                <div class="top-blog__title-wrap section-title js-wipeAnimation">
                    <span class="section-title__sub">staff&nbsp;blog</span>
                    <h2 class="section-title__main">スタッフブログ</h2>
                </div>
                <ul class="top-blog__cards blog-cards js-fadeUp">
                    <!-- /各投稿に対するループ -->
                    <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                        <li class="blog-cards__item blog-card">
                            <a href="<?php the_permalink(); ?>"> <!-- 個別投稿へのリンク -->
                                <div class="blog-card__img">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <!-- サムネイル画像がある場合、サムネイルを表示 -->
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="280" height="188" loading="lazy" />
                                    <?php else : ?>
                                        <!-- サムネイル画像がない場合、noimage画像を表示 -->
                                        <img class="noimage" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.webp" alt="noimage" width="301" height="201" loading="lazy" />
                                    <?php endif; ?>
                                </div>
                                <div class="blog-card__body">
                                    <time class="blog-card__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.d'); ?></time><!-- 投稿の日付を'年.月.日'の形式で表示 -->
                                    <p class="blog-card__title"><?php the_title(); ?></p><!-- 投稿のタイトルを表示 -->
                                    <p class="blog-card__text"><?php echo wp_trim_words(get_the_content(), 40, '…'); ?></p><!-- 投稿の内容を40語まで表示し、それ以上は'…'で省略 -->
                                </div>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <div class="top-blog__button">
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="button">View more<span></span></a>
                </div>
            </div>
        </section>
    <?php endif;
    wp_reset_postdata(); ?>

    <!-- top-voice -->
    <?php
    // カスタム投稿タイプ 'voice' から投稿を取得するためのクエリ設定
    $voice_query         = new WP_Query([
        'post_type'      => 'voice',    // カスタム投稿タイプ 'voice' を指定
        'posts_per_page' => 2,          // 一度に表示する投稿数
        'orderby'        => "rand"      // 投稿をランダムに表示
    ]);
    // 投稿が存在する場合の処理
    if ($voice_query->have_posts()) : ?>
        <section class="top-voice layout-top-voice">
            <div class="top-voice__inner inner">
                <div class="top-voice__title-wrap section-title js-wipeAnimation">
                    <span class="section-title__sub">recommend</span>
                    <h2 class="section-title__main">レコメンド</h2>
                </div>
                <ul class="top-voice__cards voice-cards">
                    <!--  投稿をループして表示 -->
                    <?php while ($voice_query->have_posts()) : $voice_query->the_post(); ?>
                        <li class="voice-cards__item voice-card">
                            <div class="voice-card__container">
                                <div class="voice-card__wrap">
                                    <div class="voice-card__content">
                                        <!-- 顧客情報の表示 -->
                                        <?php $voiceCustomer = get_field('voice_customer');
                                        if ($voiceCustomer) : ?>
                                            <p class="voice-card__customer"><?php echo $voiceCustomer['voice_age']; ?>(<?php echo $voiceCustomer['voice_gender']; ?>)</p>
                                        <?php endif; ?>
                                        <p class="voice-card__tag"><?php the_terms(get_the_ID(), 'voice_category'); ?></p>
                                    </div>
                                    <?php
                                    // タイトルを取得
                                    $title = get_the_title();
                                    // タイトルが20文字以上なら切り取る
                                    if (mb_strlen($title) > 20) {
                                        $title = mb_substr($title, 0, 20) . '...';
                                    }
                                    ?>
                                    <!-- 投稿のタイトルを表示 -->
                                    <p class="voice-card__title"><?php echo $title; ?></p>
                                </div>
                                <div class="voice-card__img">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="151" height="117" loading="lazy" />
                                    <?php else : ?>
                                        <!-- サムネイルがない場合の代替画像 -->
                                        <img class="noimage" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.webp" alt="noimage" width="151" height="117" loading="lazy" />
                                    <?php endif; ?>
                                </div>
                            </div>
                            <p class="voice-card__text"><?php echo wp_trim_words(get_field('voice_text'), 170, '…'); ?></p><!-- 投稿の内容を160単語でトリミングして表示 -->
                        </li>
                    <?php endwhile; ?>
                </ul>
                <div class="top-voice__button">
                    <a href="<?php echo esc_url(home_url('/voice/')); ?>" class="button">View more<span></span></a>
                </div>
            </div>
        </section>
    <?php endif;
    wp_reset_postdata(); ?>

    <!-- top-price -->
    <?php
    $all_plans = SCF::get_option_meta('price-options');
    // 価格プランのデータが存在する場合のみセクションを表示
    if (!empty($all_plans)) :
    ?>
        <section class="top-price layout-top-price">
            <div class="top-price__inner inner">
                <div class="top-price__title-wrap section-title js-wipeAnimation">
                    <span class="section-title__sub">price</span>
                    <h2 class="section-title__main">プライス</h2>
                </div>
                <div class="top-price__container js-fadeUp">
                    <div class="top-price__block">
                        <?php
                        $plans = [];
                        // 各プランをループで処理
                        foreach ($all_plans as $key => $value) {
                            // プランのIDを抽出
                            if (preg_match('/^price_course_([0-9]+)$/', $key, $matches)) {
                                $plan_id = $matches[1];
                                // プランの詳細情報を配列に格納
                                $plans[$plan_id] = [
                                    'title'        => $value,
                                    'group'        => 'price-' . $plan_id,
                                    'course_array' => ['course_' . $plan_id, 'sp-course_' . $plan_id, 'price_' . $plan_id]
                                ];
                            }
                        }
                        // 各プランの価格情報を表示
                        foreach ($plans as $plan_id => $plan) {
                            $price_group = SCF::get_option_meta('price-options', $plan['group']);
                            if (!empty($price_group)) {
                        ?>
                                <div class="top-price__list-wrap">
                                    <p class="top-price__list-title"><?php echo $plan['title']; ?></p>
                                    <dl class="top-price__list">
                                        <!-- 各価格情報をリストとして出力 -->
                                        <?php foreach ($price_group as $item) { ?>
                                            <div class="top-price__list-item">
                                                <dt class="top-price__list-menu"><?php echo $item[$plan['course_array'][0]] . $item[$plan['course_array'][1]]; ?></dt>
                                                <dd class="top-price__list-price"><?php echo $item[$plan['course_array'][2]]; ?></dd>
                                            </div>
                                        <?php } ?>
                                    </dl>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <picture class="top-price__image">
                        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-price-img.webp" media="(min-width: 768px)" type="image/webp" width="492" height="746" />
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-price-img.webp" alt="飾り付けられたチョコレート" width="345" height="227" loading="lazy" />
                    </picture>
                </div>
                <div class="top-price__button">
                    <a href="<?php echo esc_url(home_url('/price/')); ?>" class="button">View more<span></span></a>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php get_footer(); ?>