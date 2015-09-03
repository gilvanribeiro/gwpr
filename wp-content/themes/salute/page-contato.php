<?php get_header(); ?>
<link rel="stylesheet"
href="<?php echo bloginfo('template_directory')?>/css/validationEngine.jquery.css"
type="text/css" />
<script
src="<?php echo bloginfo('template_directory')?>/js/newsletter.js"></script>
<script
src="<?php echo bloginfo('template_directory')?>/js/jquery.validationEngine-pt_BR.js"></script>
<script
src="<?php echo bloginfo('template_directory')?>/js/jquery.validationEngine.js"></script>
<script
src="<?php echo bloginfo('template_directory')?>/js/validationEngine.js"></script>
<div class="container banner">
	<div class="banner">
		<img class="img-responsive" src="<?php echo bloginfo('template_directory')?>/images/contato-banner.jpg">
	</div>
</div>
<div class="content contato container">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h1>Contato</h1>
			<?php if (!($_POST)) : ?>
				<section>
					<form id="contato" method="POST">
						<span>Nome:</span>
						<input type="text" id="nome" name="nome" class="validate[required,minSize[3]] feedback-input">

						<span>E-mail:</span>
						<input type="text" id="email" name="email" class="validate[required, custom[email]] feedback-input">

						<span>Telefone:</span>
						<input type="text" id="telefone" name="telefone">

						<span>Mensagem:</span>
						<textarea id="mensagem" name="mensagem" class="validate[required,minSize[15]] feedback-input"></textarea>

						<input type="submit" value="Enviar" class="enviar" />
					</form>
				</section>
			<?php else : ?>
				<?php
					$nome = $_POST['nome'];
					$email = $_POST['email'];
					$telefone = $_POST['telefone'];
					$mensagem = $_POST['mensagem'];

					$corpo = "<b>Nome:</b> " . $nome . "<br />\n";
					$corpo .= "<b>E-mail:</b> " . $email . "<br />\n";
					$corpo .= "<b>Telefone:</b> " . $telefone . "<br />\n";
					$corpo .= "<b>Mensagem:</b><br />" . nl2br ( $mensagem ) . "\n";

					$headers = "MIME-Version: 1.0\n";
					$headers .= "Content-type: text/html; charset=UTF-8";
					$headers .= "From: Formulário de Contato <contato@salutelight.com.br>\n";
					$headers .= "Return-Path: <contato@salutelight.com.br>\n";
				
					mail ( "contato@salutelight.com.br", "Formulário de Contato", $corpo, $headers );

					echo "<div class='message-ok'>Obrigado, $nome. Sua mensagem ser&aacute respondida em breve.</div>";
				?>
			<?php endif; ?>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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