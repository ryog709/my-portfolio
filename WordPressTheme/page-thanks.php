<?php
/*
Template Name: お問い合わせ(送信完了)
*/
get_header();
?>
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

    <!-- thanks -->
    <div class="thanks layout-thanks">
        <div class="thanks__inner">
            <p class="thanks__send">お問い合わせ内容を送信完了しました。</p>
            <p class="thanks__message">このたびは、お問い合わせ頂き<br class="u-mobile" />誠にありがとうございます。<br />お送り頂きました内容を確認の上、<br class="u-mobile" />3営業日以内に折り返しご連絡させて頂きます。<br />また、ご記入頂いたメールアドレスへ、<br class="u-mobile" />自動返信の確認メールをお送りしております。</p>
        </div>
    </div>

    <?php get_footer(); ?>