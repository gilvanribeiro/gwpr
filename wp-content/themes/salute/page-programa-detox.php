<?php get_header(); ?>
<script
src="<?php echo bloginfo('template_directory')?>/js/newsletter.js"></script>
<div class="container banner">
	<div class="banner">
		<img class="img-responsive" src="<?php echo bloginfo('template_directory')?>/images/programa-detox-banner.jpg">
	</div>
</div>
<div class="content programa-detox container">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h1>Programa Detox Funcional</h1>
			<section>
				<?php if (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endif; ?>
			</section>
			<div style="overflow-y: scroll; overflow: auto;">
				<table border="1">
					<tr>
						<th class="first"></th>
						<th>1º Dia</th>
						<th>2º Dia</th>
						<th>3º Dia</th>
						<th>4º Dia</th>
						<th>5º Dia</th>
					</tr>
					<tr>
						<td class="first">Café da Manhã</td>
						<td>Suco DETOX</td>
						<td>Suco DETOX</td>
						<td>Suco DETOX</td>
						<td>Suco DETOX</td>
						<td>Suco DETOX</td>
					</tr>
					<tr>
						<td class="first">Colação</td>
						<td>Suco Pele Perfeita + 1 barrinha de gergilim</td>
						<td>1 barrinha harts sem glútem</td>
						<td>1 Suco Pré Treino + 3 castanhas</td>
						<td>1 barrinha harts sem glútem</td>
						<td>Suco Afina Cintura</td>
					</tr>
					<tr>
						<td class="first">Almoço</td>
						<td>Linguado espanhol com creme de baroa</td>
						<td>Almondêga de frango</td>
						<td>Salmão com risoto de manjericão</td>
						<td>Frango ao funghi</td>
						<td>Creme de bacalhau divino</td>
					</tr>
					<tr>
						<td class="first">Lanche</td>
						<td>Chá + mix de oleaginosas</td>
						<td>Chá + lascas de batata assada</td>
						<td>Chá + lascas de mandioquinha</td>
						<td>Chá + cookies chia</td>
						<td>Chá + cookies cacau</td>
					</tr>
					<tr>
						<td class="first">Jantar</td>
						<td>Sopa emagrecedora</td>
						<td>Creme de abobrinha</td>
						<td>Quinha com legumes</td>
						<td>Abóbora com gengibre</td>
						<td>Sopa emagrecedora</td>
					</tr>
					<tr>
						<td class="first">Ceia</td>
						<td>Suco de morango com colágeno</td>
						<td>Suco Anti Stress</td>
						<td>Suco de morango com colágeno</td>
						<td>Suco Anti Stress</td>
						<td>Sudo de morango com colágeno</td>
					</tr>
				</table>
			</div>
			<span class="kcal">* Cardápio calculado com aproximadamente 1100 kcal diárias</span>
			<div class="atencao">
				<span><b>Atenção:</b></span>
				<span>O programa deve ser adotado periodicamente.</span>
				<span>Para uma completa reeducação alimentar, um nutricionista deve ser consultado.</span>
				<span>Em caso de restrições alimentares, modificações nos pratos podem ser feitas.</span>
			</div>
		</div>

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