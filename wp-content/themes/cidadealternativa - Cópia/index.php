<?php get_header();?>
    <div class="container-fluid">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <!--
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            </ol>
            -->
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
            <?php query_posts('showposts=1')?>
            <?php if(have_posts()): while(have_posts()):the_post();?>
                <div class="item active">
                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail('teste');?></a>
                    <div class="carousel-caption">
                        <h4><?php the_title();?></h4>
                        <p><?php the_excerpt();?></p>
                    </div>
                </div><!-- item -->
            
            <?php endwhile; wp_reset_postdata(); else:?>
                <div class="item">
                    <strong>Nenhum Post Encontrado</strong>
                </div>
            </div>
            <?php endif;?>
                                    <!-- Primeiro Carousel tem que receber a classe active-->
            <?php query_posts('showposts&offset=1')?>
            <?php if(have_posts()): while(have_posts()):the_post();?>
                <div class="item ">
                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail('teste');?></a>
                    <div class="carousel-caption">
                        <h4><?php the_title();?></h4>
                        <p><?php the_excerpt();?></p>
                    </div>
                </div><!-- item -->

            <?php endwhile; wp_reset_postdata(); else:?>
            <div class="item">
                <strong>Nenhum Post Encontrado</strong>
            </div>
        </div>
        <?php endif;?>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <div class="container-fluid container-conteudo">

        <div class="row col-md-9 col-xs-9" style="margin: 0;padding: 0;">
            <?php query_posts('showposts=1')?>
            <?php if(have_posts()): while(have_posts()):the_post();?>
            <div class="pull-left col-md-6 col-xs-12 ">
                <strong>
                    <a href="<?php the_permalink();?>"> <?php the_title();?></a>
                    <?php the_excerpt();?>
                </strong>
            </div>
            <div class="pull-right col-md-6 col-xs-12 " >
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
            </div>

            <?php endwhile; else:?>
            <div class="pull-left col-md-6 col-xs-12 ">
                <strong>
                   Nenhum Post Encontrado
                </strong>
            </div>
            <?php endif; ?>
        </div>

        <?php get_sidebar();?>

        <div class="row col-md-9 col-sm-9 col-xs-9" style="margin: 0;padding: 0;">
            <?php query_posts('showposts=3')?>
            <?php if(have_posts()): while(have_posts()):the_post();?>
                <div class="col-md-4 col-sm-4 col-xs-12 box ">


                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
                    <footer >
                        <strong>
                               <?php the_excerpt();?>
                        </strong>
                    </footer>
                </div>

            <?php endwhile; else:?>
                <header>
                    <strong>
                        Nenhum Pos Encontrado
                    </strong>
                </header>
                <footer>
                    <strong>
                        Nenhum Post Encontrado
                    </strong>
                </footer>
            </div>
            <?php endif;?>
    </div>

</div>
<?php get_footer();?>

