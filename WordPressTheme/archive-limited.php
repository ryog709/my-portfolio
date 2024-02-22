<?php get_header(); ?>
<main>
	<!-- sub-mv -->
	<section class="sub-mv">
		<div class="sub-mv__inner">
			<picture class="sub-mv__picture">
				<source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/img004.webp" media="(min-width: 768px)" type="image/webp" />
				<img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/img004.webp" alt="いちご味のドーナツ" />
			</picture>
			<h1 class="sub-mv__title">limited&nbsp;edition</h1>
		</div>
	</section>

	<!-- breadcrumbs -->
	<?php get_template_part('parts/breadcrumbs') ?>

	<!-- tag -->
	<div class="tag layout-tag">
		<div class="tag__inner inner">
			<ul class="tag__list tag-list">
				<li class="tag-list__item tag-item is-color">
					<span>ALL</span>
				</li>
				<!-- 'limited_category'のタクソノミー取得 -->
				<?php $campaign_terms = get_terms('limited_category', array('hide_empty' => false)) ?>
				<!-- 各タクソノミーのループ処理 -->
				<?php foreach ($campaign_terms as $campaign_term) : ?>
					<li class="tag-list__item tag-item">
						<a href="<?php echo get_term_link($campaign_term, 'limited_category') ?>"><?php echo $campaign_term->name; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>


	<!-- limited-card-contents -->
	<section class="limited-card-contents layout-limited-card-contents">
		<div class="limited-card-contents__inner">
			<ul class="limited-card-contents__list limited-card-list">
				<?php
				if (have_posts()) : while (have_posts()) : the_post(); ?>
						<li class="limited-card-list__item limited-card">
							<figure class="limited-card__image">
								<?php
								// もし投稿にサムネイル画像があれば表示
								if (has_post_thumbnail()) : ?>
									<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="280" height="188" loading="lazy" />
								<?php else : ?>
									<!-- サムネイルがない場合の代替画像 -->
									<img class="noimage" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.webp" alt="noimage" width="280" height="188" loading="lazy" />
								<?php endif; ?>
							</figure>
							<div class="limited-card__body-wrap">
								<div class="limited-card__body limited-card__body--small-space">
									<p class="limited-card__tag">
										<span>
											<?php
											// キャンペーンカテゴリーを表示
											the_terms(get_the_ID(), 'limited_category'); ?>
										</span>
									</p>
									<h2 class="limited-card__title limited-card__title--large">
										<?php
										// 投稿タイトルを表示
										the_title(); ?>
									</h2>

									<?php
									// カスタムフィールドからキャンペーン価格情報を取得
									$campaignPrice = get_field('campaign_price_list');
									if ($campaignPrice) : ?>
										<p class="limited-card__text">
											<?php
											// キャンペーンテキストを表示
											echo $campaignPrice['campaign_text']; ?>
										</p>
										<div class="limited-card__price-wrap">
											<div class="limited-card__price-sub">
												<span>
													<?php
													// 通常価格を表示
													echo $campaignPrice['normal_price']; ?>
												</span>
											</div>
											<div class="limited-card__price-main">
												<?php
												// キャンペーン価格を表示
												echo $campaignPrice['campaign_price']; ?>
											</div>
										</div>
									<?php endif; ?>

									<?php
									// カスタムフィールドからキャンペーン説明を取得
									$campaignDescription = get_field('campaign_description');
									if ($campaignDescription) : ?>
										<!-- <p class="limited-card__content u-desktop">
											<?php
											// キャンペーン内容を表示
											echo $campaignDescription['campaign_content']; ?>
										</p> -->
								</div>
								<div class="limited-card__guide u-desktop">

									<?php
										// キャンペーン期間情報を取得
										$campaignTime = $campaignDescription['campaign_time'];
										if ($campaignTime) : ?>
										<p class="limited-card__date">
											<?php
											// キャンペーン開始時間と終了時間を表示
											echo $campaignTime['campaign_start_time']; ?>-<?php echo $campaignTime['campaign_end_time']; ?>
										</p>
									<?php endif; ?>
									<p class="limited-card__reserved">
										<?php
										// キャンペーン追加情報を表示
										the_field('campaign_info'); ?>
									</p>
								<?php endif; ?>
								<div class="limited-card__button">
									<a href="<?php echo esc_url(home_url('/contact/')); ?>" class="button">Contact us<span></span></a>
								</div>
								</div>
							</div>
						</li>
				<?php endwhile;
				else :
					// 投稿がない場合のメッセージを表示
					echo '<p class="limited-card-contents__no-posts no-posts-text">投稿記事がありません。</p>';
				endif;
				?>
			</ul>

			<!-- wp-pagenavi -->
			<div class="limited-card-contents__wp-pagenavi">
				<?php wp_pagenavi(); ?>
			</div>
		</div>
	</section>
	<?php get_footer(); ?>