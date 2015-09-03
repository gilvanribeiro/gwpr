<?php get_header(); ?>
<script
src="<?php echo bloginfo('template_directory')?>/js/newsletter.js"></script>
<div class="content blog container">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<?php get_template_part('loop'); ?>
			<?php endwhile; wp_pagenavi(); endif; ?>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="suco">
				<h1>Sucos Funcionais</h1>
				<?php create_sucos_carousel(); ?>
			</div>
			<br />
			<div class="programa">
				<h1>Programa Detox</h1>
				<span>A quantidade de substâncias nocivas que ingerimos no dia a dia é alarmante. São medicamentos, corantes, conservantes e gorduras, entre outros. O organismo, claro, pede uma desintoxicação. Por isso mesmo, o Salute apresenta o seu Programa Detox Funcional.</span>
				<a href="<?php echo get_bloginfo ( 'url' ); ?>/programa-detox/">Continue lendo.</a>
			</div>
			<br />
			<div class="facebook hidden-xs hidden-sm">
				<div class="fb-like-box"
				data-href="http://www.facebook.com/salutelight"
				data-colorscheme="light" data-show-faces="true" data-header="false"
				data-stream="false" data-show-border="false"></div>
			</div>
			<br />
			<div class="newsletter">
				<h1>Receba nossa newsletter</h1>
				<span>Cadastre-se e receba novidades.</span>
				<div>
					<input type="text" class="newsletter-email" maxlength="150">
					<a href="#" class="newsletter-submit">OK</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>