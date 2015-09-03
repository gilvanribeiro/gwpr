<?php get_header(); ?>
<script
src="<?php echo bloginfo('template_directory')?>/js/newsletter.js"></script>
<div class="container banner">
	<div class="banner">
		<img class="img-responsive" src="<?php echo bloginfo('template_directory')?>/images/vita-todo-dia-banner.jpg">
	</div>
</div>
<div class="content sucos-funcionais container">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h1>Vita Todo Dia</h1>
			<section>
				<?php if (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endif; ?>
			</section>
			<?php $sucos = get_sucos(); ?>
			<div class="sucos">
				<?php for($i = 0; $i < count($sucos); $i++) { ?>
					<?php if ($i % 2 == 0) { ?>
						<div class="row">
					<?php } ?>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 suco" data-toggle="modal" data-target="#sucoModal_<?php echo $sucos[$i]['id']; ?>">
								<div class="img">
									<img src="<?php echo $sucos[$i]['foto']; ?>">
								</div>
								<div class="info">
									<span class="titulo"><?php echo $sucos[$i]['nome']; ?></span>
									<span class="texto"><?php echo $sucos[$i]['texto']; ?></span>
								</div>
							</div>
					<?php if ($i % 2 == 1 || ($i % 2 == 0 && $i == (count($sucos) - 1))) { ?>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
		<?php for($i = 0; $i < count($sucos); $i++) { ?>
		<div class="modal fade" id="sucoModal_<?php echo $sucos[$i]['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel"><?php echo $sucos[$i]['nome']; ?></h4>
					</div>
					<div class="modal-body">
						<?php echo $sucos[$i]['informacoes']; ?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="suco">
				<h1>Sucos Funcionais</h1>
				<?php create_sucos_carousel(); ?>
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