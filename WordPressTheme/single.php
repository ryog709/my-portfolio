<?php get_header(); ?>

<main>
	<!-- sub-mv -->
	<section class="sub-mv">
		<div class="sub-mv__inner">
			<picture class="sub-mv__picture">
				<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-mv-pc.webp" media="(min-width: 768px)" type="image/webp" />
				<img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-mv-sp.webp" alt="チョコレートとナッツ" />
			</picture>
			<h1 class="sub-mv__title">blog</h1>
		</div>
	</section>

	<!-- breadcrumbs -->
	<?php get_template_part('parts/breadcrumbs') ?>

	<!-- blog-detail -->
	<section class="blog-detail layout-blog-detail">
		<div class="blog-detail__inner inner">
			<div class="blog-detail__wrap blog-wrap">
				<article class="blog-detail-main">
					<time class="blog-detail-main__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.d'); ?></time>
					<h2 class="blog-detail-main__title"><?php the_title(); ?></h2>
					<div class="blog-detail-main__content">
						<!-- 投稿があるかどうかをチェック -->
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<figure>
									<?php if (has_post_thumbnail()) : ?>
										<!-- サムネイル画像を表示 -->
										<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="345" height="231" loading="lazy" decoding="auto" />
										<!-- サムネイルがない場合はnoimage画像を表示 -->
									<?php else : ?>
										<img class="noimage" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.webp" alt="noimage" width="301" height="201" loading="lazy" />
									<?php endif; ?>
									<!-- 投稿の抜粋を表示 -->
									<figcaption><?php the_excerpt(); ?></figcaption>
								</figure>
								<!-- 投稿の本文を表示 -->
								<?php the_content(); ?>
						<?php endwhile;
						endif; ?>
					</div>

					<div class="blog-detail-main__pagenavi pagenavi">
						<?php
						// 前の投稿と次の投稿を取得
						$prev_post = get_previous_post();
						$next_post = get_next_post();
						// 次の投稿がある場合、リンクを表示
						if (!empty($next_post)) {
							$next_post_url = get_permalink($next_post->ID);
							echo '<a class="pagenavi-next" rel="next" href="' . esc_url($next_post_url) . '" aria-label="次のページへ"></a>';
						}
						// 前の投稿がある場合、リンクを表示
						if (!empty($prev_post)) {
							$prev_post_url = get_permalink($prev_post->ID);
							echo '<a class="pagenavi-prev" rel="prev" href="' . esc_url($prev_post_url) . '" aria-label="前のページへ"></a>';
						}
						?>
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