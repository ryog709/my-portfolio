<?php
$top      = esc_url(home_url('/'));
$limited = esc_url(home_url('/limited/'));
$about    = esc_url(home_url('/about/'));
$information = esc_url(home_url('/information/'));
$blog  = esc_url(home_url('/blog/'));
$voice = esc_url(home_url('/voice/'));
$price = esc_url(home_url('/price/'));
$faq   = esc_url(home_url('/faq/'));
$privacypolicy = esc_url(home_url('/privacypolicy/'));
$terms   = esc_url(home_url('/terms-of-service/'));
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

<?php if (!is_page('contact') && !is_page('contact/thanks') && !is_404()) : ?>
    <!-- contact -->
    <section class="<?php echo is_front_page() ? 'contact layout-top-contact' : 'contact layout-contact'; ?>">
        <div class="contact__inner inner">
            <div class="contact__container">
                <div class="contact__access-content">
                    <div class="contact__logo">
                        <a href="<?php echo $top; ?>">bliss&nbsp;butter&nbsp;cookies</a>
                    </div>
                    <div class="contact__access">
                        <address class="contact__text-wrap">
                            <p class="contact__text">福岡県福岡市1-1</p>
                            <p class="contact__text">TEL:0120-000-0000</p>
                            <p class="contact__text">営業時間:8:30-19:00</p>
                            <p class="contact__text">定休日:毎週火曜日</p>
                        </address>
                        <div class="contact__map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2540.4612837416435!2d130.42041038762304!3d33.590461334260816!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354191c7ea885905%3A0xca47a6716a9884ec!2z5Y2a5aSa6Ziq5oCl!5e0!3m2!1sja!2sjp!4v1708569394426!5m2!1sja!2sjp" title="マップ" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="contact__info-content">
                    <div class="contact__title-wrap section-title">
                        <span class="section-title__sub section-title__sub--large">contact</span>
                        <h2 class="section-title__main section-title__main--space">お問い合わせ</h2>
                        <p class="section-title__info">ご予約・お問い合わせはコチラ</p>
                    </div>
                    <div class="contact__button">
                        <a href="<?php echo $contact; ?>" class="button">Contact us<span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

</main>
<div class="page-top js-page-top">
    <a href="#top">
        <span class="page-top__button"></span>
    </a>
</div>

<!-- マウスストーカー -->
<div class="stalker js-stalker"></div>

<footer class="footer <?php echo (is_page('contact')) ? 'layout-footer-contact' : 'layout-footer'; ?> js-footer">
    <div class="footer__inner inner">
        <div class="footer__logo-wrap">
            <div class="footer__logo">
                <a href="<?php echo $top; ?>">bliss&nbsp;butter&nbsp;cookies</a>
            </div>
            <div class="footer__sns-icon-wrap">
                <a href="https://www.facebook.com" class="footer__sns-icon" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/FacebookLogo.svg" alt="FacebookLogo" width="24" height="24" loading="lazy" />
                </a>
                <a href="https://www.instagram.com" class="footer__sns-icon" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/InstagramLogo.svg" alt="InstagramLogo" width="24" height="24" loading="lazy" />
                </a>
            </div>
        </div>
        <nav class="footer__menu global-menu">
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
            <div class="global-menu__right global-menu__right--space">
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
    <small class="footer__copyright"> Copyright&nbsp;©&nbsp;2021&nbsp;-&nbsp;2023&nbsp;CodeUps&nbsp;LLC.&nbsp;All&nbsp;Rights&nbsp;Reserved. </small>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>