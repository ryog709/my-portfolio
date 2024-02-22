<?php get_header(); ?>
<main>
    <!-- sub-mv -->
    <section class="sub-mv">
        <div class="sub-mv__inner">
            <picture class="sub-mv__picture">
                <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-mv-pc.webp" media="(min-width: 768px)" type="image/webp" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-mv-pc.webp" alt="チョコレート" />
            </picture>
            <h1 class="sub-mv__title">FAQ</h1>
        </div>
    </section>

    <!-- breadcrumbs -->
    <?php get_template_part('parts/breadcrumbs') ?>

    <!-- faq -->
    <section class="faq layout-faq">
        <div class="faq__inner inner">
            <?php
            // FAQの項目を取得する
            $faq_items = SCF::get_option_meta('faq-options', 'faq');
            if (!empty($faq_items)) :
            ?>
                <ul class="faq__list faq-list">
                    <?php
                    // FAQの各項目に対して繰り返し処理を行う
                    foreach ($faq_items as $faq_item) :
                        // 質問と回答のテキストをエスケープ処理する
                        $question = esc_html($faq_item['question']);
                        $answer = esc_html($faq_item['answer']);
                        // 質問と回答が空でない場合のみ表示する
                        if (!empty($question) && !empty($answer)) :
                    ?>
                            <!-- FAQの項目をリスト表示する -->
                            <li class='faq-list__item'>
                                <p class='faq-list__item-question js-faq-question'><?= $question ?></p>
                                <p class='faq-list__item-answer'><?= $answer ?></p>
                            </li>
                    <?php
                        endif;    // 空のチェック終了
                    endforeach; // FAQ項目の繰り返し終了
                    ?>
                </ul>
            <?php
            else :
                // FAQ項目が空の場合、「準備中です」と表示
                echo '<p class="blog-cards__no-posts no-posts-text">準備中です</p>';
            endif;          // FAQ項目の存在チェック終了
            ?>
        </div>
    </section>

    <?php get_footer(); ?>