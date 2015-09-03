<?php get_header(); ?>
<div class="container content">
	<div class="row">
		<div class="col-lg-8 col-md-9 col-sm-8 col-xs-12 conteudo">
			<div class="search">
				<form role="search" method="get" id="searchform" class="searchform" action="<?php esc_url( home_url( '/' )); ?>">
					<div>
						<div class="input-group">
							<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Pesquisa" class="form-control">
							<span class="input-group-btn">
								<span class="input-group-btn">
        							<button type="submit" class="btn btn-default">OK</button>
      							</span>
      						</span>
						</div>
					</div>
				</form>
			</div>
			<section class="posts">
				<?php $i = 0; if ( have_posts() ) : while ( have_posts() ): the_post(); ?>
					<article class="post">
						<?php if(!is_page()) { ?>
						<div class="post-header">
							<div class="post-date">
								<?php the_time('d');?>/<?php the_time('m'); ?>/<?php the_time('Y'); ?>
							</div>
							<div class="post-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</div>
							<div class="post-category">
								<?php 
									$post_categories = wp_get_post_categories($post->ID);
									
									$list = "";								
									foreach($post_categories as $c){
										$category_name = get_cat_name( $c );
										$category_link = get_category_link( $c );
										$list .= "<a href='".esc_url( $category_link )."'>$category_name</a>, ";
									}
									if($list != "") {
										$list = substr($list, 0, -2);
									}
									echo $list;
								?>
							</div>
						</div>
						<?php } ?>
						<div class="post-content">
							<?php the_content(); ?>
						</div>
						<?php if(!is_page()) { ?>
						<div class="post-footer">
							<?php comments_popup_link('Comentários', 'Comentários', 'Comentários', 'comentario-btn-texto', 'Comentários'); ?>
							<div class="bubble">
								<?php comments_popup_link('0', '1', '%', 'comentario-balao', '0'); ?>
							</div>
							<div class="share">
								<?php $url = get_the_permalink(); $title = get_the_title(); ?>
								<a target="_blank" href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo $url; ?>&p[title]=<?php echo $title; ?>">
									<img src="<?php echo bloginfo('template_directory')?>/images/fb.png" class="share-icon"> compartilhe
								</a>
								<a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>&text=<?php echo $title; ?>&via=anitabemcriada">
									<img src="<?php echo bloginfo('template_directory')?>/images/tw.png" class="share-icon"> retweet
								</a>
								<?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
							</div>
							<div class="clearfix"></div>
						</div>
						<?php } ?>
						<?php 
						if(!is_page() && is_single()) { 
							comments_template();
						} 
						?>
					</article>
					<?php if($i == 0 && is_home()) { ?>
						<?php dynamic_sidebar('Propaganda-Post'); ?>
					<?php } ?>
				<?php $i++; endwhile; wp_pagenavi(); endif; ?>
			</section>
		</div>

		<div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 sidebar">
			<div class="rs-btns hidden-xs">
				<?php criar_redes_sociais(); ?>
			</div>
			<a href="<?php bloginfo('url'); ?>/sobre/" class="about hidden-xs">
				<div>
					<span class="title">A Anita</span>
					<?php
						$sobre = get_page_by_title ('Sobre');
						$foto = get_field ("foto", $sobre->ID);
						$foto = remove_thumbnail($foto['url']);
						$frase = get_field ("frase", $sobre->ID);
					?>
					<img src="<?php echo $foto;?>">
					<span class="frase"><?php echo $frase; ?></span>
				</div>
			</a>
			<div class="looks hidden-xs">
				<span class="title">Looks</span>
				<?php
					$looks = get_posts (array(
						'category_name' => 'looks-da-anita',
						'posts_per_page' => 7
					));
				?>
					<div id="carousel-looks" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<ol class="carousel-indicators">
						<?php
								for($i = 0; $i < count($looks); $i++) {
									echo "<li data-target='#carousel-looks' data-slide-to='$i'".($i == 0 ? " class='active'" : "")."></li>";
								}
						?>
	  						</ol>
						<?php
							for($i = 0; $i < count($looks); $i++) {
								$look = $looks[$i];
								//preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $look->post_content, $matches);
								// $img = $matches[1][0];
								//$img = get_post_thumbnail($look->ID,'large',$look->post_content);
								echo "<div class='item ".($i == 0 ? " active" : "")."'>";
								//echo "	<a href='".get_permalink($look->ID)."'>$img</a>";
								$img = get_first_img($look->post_content);
								echo "	<a href='".get_permalink($look->ID)."'><img src='$img' /></a>";
								echo "</div>";
							}
						?>
						</div>
					</div>
			</div>
			<a href="http://instagram.com/anitabemcriada/" class="insta hidden-xs">
				<div>
					<span class="title">Instagram</span>
					<?php
						$instagram = new Instagram (array (
							'apiKey' => 'a64dd0e225fe43068eda6ecab1460360',
							'apiSecret' => '95a1fe8eb7d143ca8927ee22e2fa3977' 
						));
						$medias = $instagram->getUserMedia ( '31128683', 4 )->data;
					?>

					<?php
						foreach ($medias as $media) {
							echo "<img src='".$media->images->standard_resolution->url."'>";
						}
					?>
				</div>
			</a>
			<?php dynamic_sidebar('Propaganda-Sidebar'); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>