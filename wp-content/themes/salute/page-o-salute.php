<?php get_header(); ?>
<script
src="<?php echo bloginfo('template_directory')?>/js/newsletter.js"></script>
<div class="container banner">
	<div class="banner">
		<img class="img-responsive" src="<?php echo bloginfo('template_directory')?>/images/o-salute-banner.jpg">
	</div>
</div>
<div class="content o-salute container">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h1>O Salute</h1>
			<section>
				<?php if (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endif; ?>
			</section>
			<div class="unidades">
				<?php $unidades = get_unidades(); ?>
				<?php foreach ($unidades as $unidade) { ?>
					<div class="unidade">
						<div class="foto">
						<?php if($unidade['foto'] != null) { ?>
							<img src="<?php echo $unidade['foto']; ?>">
						<?php } ?>
						</div>
						<div class="info">
							<span class="nome"><b><?php echo $unidade['nome']; ?></b></span>
							<span><b>Endereço:</b> <?php echo $unidade['endereco']; ?></span>
							<span><b>Telefone:</b> <?php echo $unidade['telefone']; ?></span>
							<span><a href="http://maps.google.com/?q=<?php echo $unidade['endereco']; ?>">Como chegar</a></span>
						</div>
					</div>
				<?php } ?>
			</div>
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