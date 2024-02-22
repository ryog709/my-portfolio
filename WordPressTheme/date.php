<?php get_header(); ?>
<main>
	<!-- sub-mv -->
	<section class="sub-mv">
		<div class="sub-mv__inner">
			<picture class="sub-mv__picture">
				<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-mv-pc.webp" media="(min-width: 768px)" type="image/webp" />
				<img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-mv-sp.webp" alt="海中を漂う熱帯魚" />
			</picture>
			<h1 class="sub-mv__title"><?php the_archive_title(); ?></h1>
		</div>
	</section>

	<!-- breadcrumbs -->
	<?php get_template_part('parts/breadcrumbs') ?>

	<!-- blog -->
	<section class="blog layout-blog">
		<div class="blog__inner inner">
			<div class="blog__menu-wrap blog-wrap">
				<article class="blog__main-menu blog-main-menu">
					<ul class="blog-main-menu__list blog-cards blog-cards--column">
						<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<li class="blog-main-menu__list-card blog-card">
									<!-- 各投稿へのリンク -->
									<a href="<?php the_permalink(); ?>">
										<figure class="blog-card__img">
											<!-- サムネイル画像の表示 -->
											<?php if (has_post_thumbnail()) : ?>
												<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="301" height="201" loading="lazy" />
											<?php else : ?>
												<!-- サムネイルがない場合の代替画像 -->
												<img class="noimage" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.webp" alt="noimage" width="301" height="201" loading="lazy" />
											<?php endif; ?>
											<figcaption class="blog-card__body">
												<!-- 投稿日 -->
												<time class="blog-card__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.d'); ?></time>
												<!-- 投稿タイトル -->
												<p class="blog-card__title"><?php the_title(); ?></p>
												<!-- 投稿内容の一部 -->
												<p class="blog-card__text"><?php echo wp_trim_words(get_the_content(), 80, '…'); ?></p>
											</figcaption>
										</figure>
									</a>
								</li>
								<!-- 各々の記事に関する処理 -->
						<?php endwhile;
						else :
							// 投稿がない場合のメッセージを表示
							echo '<p class="blog-cards__no-posts no-posts-text">投稿記事がありません。</p>';
						endif; ?>
					</ul>

					<!-- wp-pagenavi -->
					<div class="blog__wp-pagenavi">
						<?php wp_pagenavi(); ?>
					</div>
				</article>

				<!-- サイドバー -->
				<div class="blog__side-menu">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>
	<?php get_footer(); ?>