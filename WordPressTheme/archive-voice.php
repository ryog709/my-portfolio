<?php get_header(); ?>
<main>
	<!-- sub-mv -->
	<section class="sub-mv">
		<div class="sub-mv__inner">
			<picture class="sub-mv__picture">
				<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice-pc.webp" media="(min-width: 768px)" type="image/webp" />
				<img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice-sp.webp" alt="ダイビングをしている様子" />
			</picture>
			<h1 class="sub-mv__title">voice</h1>
		</div>
	</section>
	<!-- breadcrumbs -->
	<?php get_template_part('parts/breadcrumbs') ?>

	<!-- tag -->
	<div class="tag layout-tag">
		<div class="tag__inner inner">
			<ul class="tag__list tag-list">
				<!-- 「ALL」タグのリンクを表示する -->
				<li class="tag-list__item tag-item is-color">
					<span>ALL</span>
				</li>
				<!-- voice_categoryという名前のカテゴリーを取得する -->
				<?php $voice_terms = get_terms('voice_category', array('hide_empty' => false)) ?>
				<!-- 取得したカテゴリーの各項目に対してループ処理 -->
				<?php foreach ($voice_terms as $voice_term) : ?>
					<!-- カテゴリーごとのリンクと名前を表示する -->
					<li class="tag-list__item tag-item">
						<a href="<?php echo get_term_link($voice_term, 'voice_category') ?>"><?php echo $voice_term->name; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<!-- limited-card-contents -->
	<section class="voice layout-voice">
		<div class="voice__inner inner">
			<?php if (have_posts()) : ?>
				<ul class="voice__cards voice-cards">
					<?php while (have_posts()) : the_post(); ?>
						<li class="voice-cards__item voice-card">
							<div class="voice-card__container">
								<div class="voice-card__wrap">
									<div class="voice-card__content">
										<!-- カスタムフィールド 'voice_customer' から情報を取得 -->
										<?php $voiceCustomer = get_field('voice_customer');
										if ($voiceCustomer) : ?>
											<!-- 顧客の年齢と性別を表示 -->
											<p class="voice-card__customer"><?php echo $voiceCustomer['voice_age']; ?>(<?php echo $voiceCustomer['voice_gender']; ?>)</p>
										<?php endif; ?>
										<!-- 投稿に関連するカテゴリーを表示 -->
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
									<h2 class="voice-card__title"><?php echo $title; ?></h2>
								</div>
								<div class="voice-card__img colorbox js-colorbox">
									<!-- 投稿にサムネイル画像がある場合、画像を表示 -->
									<?php if (has_post_thumbnail()) : ?>
										<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="151" height="117" loading="lazy" />
									<?php else : ?>
										<!-- サムネイルがない場合の代替画像 -->
										<img class="noimage" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.webp" alt="noimage" width="151" height="117" loading="lazy" />
									<?php endif; ?>
								</div>
							</div>
							<!-- カスタムフィールド 'voice_text' を表示 -->
							<p class="voice-card__text"><?php the_field('voice_text'); ?></p>
						</li>
					<?php endwhile; ?>
				</ul>
		</div>

		<!-- wp-pagenavi -->
		<div class="voice__wp-pagenavi">
			<?php wp_pagenavi(); ?>
		</div>
	<?php else : ?>
		<!-- 投稿がない場合のメッセージを表示 -->
		<p class="blog-cards__no-posts no-posts-text">投稿記事がありません。</p>
	<?php endif; ?>
	</section>
	<?php get_footer(); ?>