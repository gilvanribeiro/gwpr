<?php get_header(); ?>
<link rel="stylesheet"
href="<?php echo bloginfo('template_directory')?>/css/validationEngine.jquery.css"
type="text/css" />
<script
src="<?php echo bloginfo('template_directory')?>/js/jquery.validationEngine-pt_BR.js"></script>
<script
src="<?php echo bloginfo('template_directory')?>/js/jquery.validationEngine.js"></script>
<script
src="<?php echo bloginfo('template_directory')?>/js/validationEngine.js"></script>
<div class="container content">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 page-conteudo">
			<div class="page-foto">
				<img src="<?php echo bloginfo('template_directory')?>/images/titulo-contato.png" class="img-responsive left hidden-xs hidden-sm" alt="Contato">
				<?php
					$foto = get_field ("foto_pagina");
					$foto = remove_thumbnail($foto['url']);
				?>
				<img src="<?php echo $foto; ?>" class="img-responsive right">
				<div class="clearfix"></div>
			</div>
			<div class="page-contato">
				<?php if (!($_POST)) : ?>
					<form id="contato" method="POST">
						<span>Nome:</span>
						<input type="text" id="nome" name="nome" class="validate[required,minSize[3]] feedback-input">

						<span>E-mail:</span>
						<input type="text" id="email" name="email" class="validate[required, custom[email]] feedback-input">

						<span>Telefone:</span>
						<input type="text" id="telefone" name="telefone" style="max-width: 300px;">

						<span>Mensagem:</span>
						<textarea id="mensagem" name="mensagem" class="validate[required,minSize[15]] feedback-input"></textarea>

						<input type="submit" value="Enviar" class="enviar" />
						<div class="clearfix"></div>
					</form>
				<?php else : ?>
					<?php
						$nome = $_POST['nome'];
						$email = $_POST['email'];
						$telefone = $_POST['telefone'];
						$mensagem = $_POST['mensagem'];

						require 'libs/PHPMailer/PHPMailerAutoload.php';
				
						$mail = new PHPMailer ();
						
						$mail->isSMTP ();
						$mail->Host = 'smtp.gmail.com';
						$mail->SMTPAuth = true;
						$mail->SMTPSecure = 'tls'; 
						$mail->Username = 'formulario.anita@gmail.com';
						$mail->Password = '@nitabemcriada';
						$mail->Port = 587;
						$mail->IsHTML(true);
						$mail->CharSet  = "UTF-8";
						
						$mail->From = 'formulario.anita@gmail.com';
						$mail->FromName = 'Formulário de Contato';
						$mail->addAddress ( 'anita@anitabemcriada.com' );
						$mail->AddReplyTo($email, $nome);
						
						$mail->Subject = "Contato - $nome";
						$mail->Body = '<b>Nome:</b> '.$nome.'<br/><b>E-mail:</b> '.$email.'<br/><b>Telefone:</b> '.$telefone.'<br/><b>Mensagem:</b><br/>'.nl2br($mensagem);

						if (! $mail->send ()) {
							echo "<div class='message-ok'>Erro ao enviar a mensagem. Tente novamente mais tarde.</div>";
						} else {
							echo "<div class='message-ok'>Obrigado, $nome. Sua mensagem ser&aacute respondida em breve.</div>";
						}
					?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>