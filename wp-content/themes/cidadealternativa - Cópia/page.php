<?php get_header();?>
<?php if(have_posts()):while(have_posts()):the_post();?>
    <div class="container-fluid container-conteudo">
    <div class="row col-lg-9 col-md-9 col-xs-9" style="margin: 0;padding: 0;">
        <div class="pull-left col-md-12 col-xs-12 ">
            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
            <p><?php the_content();?></p>

        </div>
    </div>
<?php endwhile; else:?>
    Nenhum Post Encontrado
<?php endif;?>
<?php get_sidebar();?>
    </div>

<?php get_footer();?>