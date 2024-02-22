<?php get_header(); ?>
<main>
    <!-- sub-mv -->
    <section class="sub-mv">
        <div class="sub-mv__inner">
            <picture class="sub-mv__picture">
                <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-mv-pc.webp" media="(min-width: 768px)" type="image/webp" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-mv-pc.webp" alt="チョコレート" />
            </picture>
            <h1 class="sub-mv__title">price</h1>
        </div>
    </section>

    <!-- breadcrumbs -->
    <?php get_template_part('parts/breadcrumbs') ?>

    <!-- price -->
    <section class="price layout-price">
        <div class="price__inner inner">
            <?php
            // この部分で、SCFプラグインを使って全てのプラン情報を取得
            $all_plans = SCF::get_option_meta('price-options');
            $plans = [];
            foreach ($all_plans as $key => $value) {
                // プランIDを取得して配列に格納する部分
                // プランのキーが特定のフォーマットに合致するかチェックして、合致したらプランIDを取得
                if (preg_match('/^price_course_([0-9]+)$/', $key, $matches)) {
                    $plan_id = $matches[1];
                    $plans[$plan_id] = [
                        'title'        => $value, // プランのタイトル
                        'group'        => 'price-' . $plan_id, // グループ名
                        'course_array' => ['course_' . $plan_id, 'sp-course_' . $plan_id, 'price_' . $plan_id] // コース情報の配列
                    ];
                }
            }

            // $plans 配列が空の場合は「準備中です」と表示する
            if (empty($plans)) {
                echo '<p class="blog-cards__no-posts no-posts-text">準備中です</p>';
            } else {
                // 各プランの情報を表示する部分
                foreach ($plans as $plan_id => $plan) :
                    $price_group = SCF::get_option_meta('price-options', $plan['group']);
                    if (!empty($price_group)) :
                        $rowspan = count($price_group); // rowspanの値を設定（テーブルの行数）
                        // テーブルでプラン情報を表示
            ?>
                        <table id="price<?php echo $plan_id; ?>" class="price__list price-list">
                            <tr class="price-list_row">
                                <th class="price-list__head" rowspan="<?php echo $rowspan; ?>">
                                    <span><?php echo $plan['title']; ?></span> <!-- プランのタイトル -->
                                </th>
                                <?php
                                // 各コースの詳細を表示
                                $first = true;
                                foreach ($price_group as $item) :
                                    if (!$first) {
                                        echo '</tr><tr class="price-list_row">';
                                    }
                                    $first = false;
                                ?>
                                    <td class="price-list__course"><?php echo $item[$plan['course_array'][0]]; ?><br class="u-mobile" /><?php echo $item[$plan['course_array'][1]]; ?></td> <!-- コース情報 -->
                                    <td class="price-list__value"><?php echo $item[$plan['course_array'][2]]; ?></td> <!-- 価格情報 -->
                                <?php endforeach; ?>
                            </tr>
                        </table>
            <?php endif;
                endforeach;
            }
            ?>
        </div>
    </section>

    <?php get_footer(); ?>