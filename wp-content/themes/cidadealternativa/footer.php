</div>
<!--
<nav class="navbar navbar-default container-footer " role="navigation" style="border-radius: 0;">
    <div class="navbar-text col-md-4 col-sm-4">
        <img src="<?php // echo bloginfo('template_directory')?>/img/image6.png">
    </div>
    <div class="navbar-text col-md-7 col-sm-7  pull-right">
        <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 3%">
            <img src="<?php //echo bloginfo('template_directory')?>/img/image10.png">
        </div>
        <div class="pull-left col-md-5 col-sm-5 col-xs-12">
            <img src="<?php //echo bloginfo('template_directory')?>/img/footer.png" class="img-responsive">
            <?php //var_dump(get_theme_mod('rodape_detalhe'));?>
        </div>
    </div>
</nav>-->
<footer class="footer">
    <div class="container">
        <div class="navbar-text col-md-4 col-sm-4">
            <img src="<?php  echo bloginfo('template_directory')?>/img/image6.png">
        </div>
        <div class="navbar-text col-md-7 col-sm-7  pull-right">
            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 3%">
                <img src="<?php echo bloginfo('template_directory')?>/img/image10.png">
            </div>
            <div class="pull-left col-md-5 col-sm-5 col-xs-12">
                <p>Cidade e Alteridade</p>
                <p> Endereço: Av. João Pinheiro, 100 - Prédio I - 5º
                    andar - Centro (Faculdade de Direito UFMG) Belo
                    Horizonte - 30130180 - Brasil
                    e-mail: contato@cidadeealteridade.com.br
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery (necessary for -Bootstrap's JavaScript plugins) -->
<script src="<?php echo bloginfo('template_directory')?>/js/jquery-2.1.4.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo bloginfo('template_directory')?>/js/bootstrap.min.js"></script>
<script src="<?php echo bloginfo('template_directory')?>/js/navbar.js"></script>
<script src="<?php echo bloginfo('template_directory')?>/js/util-menu.js"></script>
</body>
<?php wp_footer();?>
</html>