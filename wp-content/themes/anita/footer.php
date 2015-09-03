<footer>
	<div class="container">
		<ul class="nav navbar-nav hidden-xs">
			<?php wp_nav_menu(array( 
				'container' => false, 
				'items_wrap' => '%3$s',
				'menu' => 'principal' 
				));
			?>
		</ul>

		<div class="row">
			<div class="news">
				<div class="input-group">
					<input type="text" class="newsletter-email form-control" placeholder="Digite seu email e receba as news">
					<span class="input-group-btn">
        				<button class="btn btn-default newsletter-submit" type="button">OK</button>
      				</span>
				</div>
			</div>

			<div class="fale">
				<a href="<?php bloginfo('url'); ?>/contato/">Fale com a Anita</a>
			</div>

			<div class="rede-social">
				<?php criar_redes_sociais(false); ?>
			</div>
		</div>

		<div class="anis">
			<a href="http://www.anis.art.br/" target="_blank" class="notext">Anis</a>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>