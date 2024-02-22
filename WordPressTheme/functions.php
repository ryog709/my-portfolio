<?php
function my_custom_scripts()
{
    // Lato, Montserrat, Noto Serif JP フォントを一つのリクエストで追加
    wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Montserrat:wght@100;300&family=Noto+Serif+JP:wght@200;400&display=swap', array(), null);


    // CSS
    wp_enqueue_style('swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.4.1/swiper-bundle.css');
    wp_enqueue_style('my-theme-css', get_theme_file_uri('/assets/css/style.css'));

    // JavaScript
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.js', array(), null, true);
    wp_enqueue_script('swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.4.1/swiper-bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), null, true);
    wp_enqueue_script('scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array('gsap'), null, true);
    wp_enqueue_script('my-theme-js', get_theme_file_uri('/assets/js/script.js'), array('jquery', 'swiper-js', 'gsap', 'scrolltrigger'), null, true); // 他のスクリプトに依存する場合
}

add_action('wp_enqueue_scripts', 'my_custom_scripts');

//投稿ページの編集
function change_post_menu_label_to_blog()
{
    global $menu;
    global $submenu;

    // メニュー名を「ブログ」に変更
    $menu[5][0]                 = 'スタッフブログ';
    $submenu['edit.php'][5][0]  = 'ブログ一覧';
    $submenu['edit.php'][10][0] = '新規ブログ';
    $submenu['edit.php'][16][0] = 'ブログタグ';
    $submenu['edit.php'][15][0] = 'ブログカテゴリー';
}
add_action('admin_menu', 'change_post_menu_label_to_blog');

//アイキャッチ画像編集
function my_setup()
{
    add_theme_support('post-thumbnails'); /* アイキャッチ */
    add_theme_support('automatic-feed-links'); /* RSSフィード */
    add_theme_support('title-tag'); /* タイトルタグ自動生成 */
    add_theme_support(
        'html5',
        array( /* HTML5のタグで出力 */
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );
}
add_action('after_setup_theme', 'my_setup');

//アーカイブページの表示件数変更
function change_posts_per_page($query)
{
    if (is_admin() || !$query->is_main_query())
        return;
    if ($query->is_archive('limited')) {   //カスタム投稿タイプを指定
        $query->set('posts_per_page', '4'); //表示件数を指定
    }
    if ($query->is_post_type_archive('voice')) {
        $query->set('posts_per_page', '6'); //お客様の声の投稿を6件に制御
    }
}
add_action('pre_get_posts', 'change_posts_per_page');


//SCFでのオプションページ作成
/**
 * @param string      $page_title ページのtitle属性値
 * @param string      $menu_title 管理画面のメニューに表示するタイトル
 * @param string      $capability メニューを操作できる権限（manage_options とか）
 * @param string      $menu_slug オプションページのスラッグ。ユニークな値にすること。
 * @param string|null $icon_url メニューに表示するアイコンの URL
 * @param int         $position メニューの位置
 */
SCF::add_options_page('', '料金一覧', 'manage_options', 'price-options', 'dashicons-money-alt', '7');
SCF::add_options_page('', 'ギャラリー', 'manage_options', 'gallery-options', 'dashicons-format-gallery', '8');
SCF::add_options_page('', 'よくある質問', 'manage_options', 'faq-options', 'dashicons-editor-help', '9');


// サイドバーの人気記事用のコード
// 投稿の閲覧数をカウントする関数
function post_view_count()
{
    global $post; // 現在の投稿にアクセスするためのグローバル変数
    $post_id  = $post->ID;                                // 現在の投稿のIDを取得
    $meta_key = 'post_views_count';                       // 閲覧数を保存するメタキー
    $views    = get_post_meta($post_id, $meta_key, true); // 現在の投稿の閲覧数を取得

    if ($views === '') {
        // 閲覧数がまだ設定されていない場合
        delete_post_meta($post_id, $meta_key);   // 古いメタデータを削除
        add_post_meta($post_id, $meta_key, '0'); // 閲覧数を0で初期化
    } else {
        // 閲覧数が存在する場合、1増やす
        $views++;
        update_post_meta($post_id, $meta_key, $views); // 新しい閲覧数で更新
    }
}


// 単一投稿ページで閲覧されたときに閲覧数を追跡する関数
function track_post_views()
{
    if (is_single()) {
        // 現在表示されているページが単一投稿ページの場合
        post_view_count(); // 閲覧数カウント関数を呼び出す
    }
}
add_action('wp_head', 'track_post_views'); // WordPressのヘッダにアクションフックを追加


// キャンペーン・お客様の声は詳細ページは無し
add_action('template_redirect', 'disable_cpt_single_pages');
function disable_cpt_single_pages()
{
    if (is_singular('limited') || is_singular('voice')) {
        wp_redirect(home_url()); // ホームページにリダイレクト
        exit();
    }
}

// Contact Form 7の自動pタグ無効
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
    return false;
}

//Contact Form 7 セレクトボックスの選択肢をカスタム投稿のタイトルから自動生成
function wpcf7_select_list($tag, $unused)
{
    if ($tag['name'] != 'menu-1') {
        return $tag; // 名前が一致しない場合、処理を終了
    }

    // カスタム投稿タイプ 'limited' の投稿を取得するためのクエリパラメータ
    $args = array(
        'posts_per_page' => -1,         // 全ての投稿を取得
        'post_type'      => 'limited', // カスタム投稿タイプを指定
        'order'          => 'DESC'      // 降順で取得
    );

    // クエリを実行し、結果を取得
    $job_posts = get_posts($args);

    // 重複したタイトルを排除するための配列
    $unique_job_posts = array_unique(array_map(function ($post) {
        return $post->post_title; // 投稿のタイトルだけを抽出
    }, $job_posts), SORT_REGULAR);

    $overlapping_titles = array(); // 重複チェック用の一時的な配列

    // 重複のない投稿タイトルをループ処理
    foreach ($unique_job_posts as $title) {
        // 重複がないかチェック
        if (!in_array($title, $overlapping_titles)) {
            $overlapping_titles[] = $title; // 重複チェック用配列に追加
            // セレクトボックスの値、表示ラベルにタイトルを追加
            $tag['raw_values'][]  = $title;
            $tag['values'][]      = $title;
            $tag['labels'][]      = $title;
        }
    }
    return $tag; // 変更されたタグを返却
}
// Contact Form 7のフィルターフックに関数を追加
add_filter('wpcf7_form_tag', 'wpcf7_select_list', 10, 2);


// Contact Form7の送信ボタンをクリックした後の遷移先設定
add_action('wp_footer', 'add_origin_thanks_page');
function add_origin_thanks_page()
{
    $thanks = esc_url(home_url('/thanks/'));
    echo <<< EOC
    <script>
        var thanksPage = {
            318: '{$thanks}',
        };
        document.addEventListener( 'wpcf7mailsent', function( event ) {
        location = thanksPage[event.detail.contactFormId];
        }, false );
        </script>
    EOC;
}

/* the_archive_title 余計な文字を削除 */
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_date()) {
        $title = get_the_time('Y年n月');
    } elseif (is_search()) {
        $title = '検索結果：' . esc_html(get_search_query(false));
    } elseif (is_404()) {
        $title = '「404」ページが見つかりません';
    } else {
    }
    return $title;
});