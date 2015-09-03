<section class="post">
	<div class="data">
		<div class="dia"><?php the_time('j');?></div>
		<div class="mes-ano"><?php the_time('F'); ?> de <?php the_time('Y'); ?></div>
	</div>
	<div class="post-content">
		<h1 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
		<?php the_content('', true); ?>
	</div>
	<div class="share">
		<div class="twitter">
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink (); ?>" data-text="<?php echo get_the_title (); ?>" data-lang="pt">Tweet</a>
		</div>
		<div class="fb">
			<div class="fb-like" data-href="<?php echo get_permalink (); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
		</div>
	</div>
</section>