<?php get_header(
/*
Template Name: Level 1 Template
*/
); ?>


        <div class="main-container level-2-template">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="main clearfix" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
                <div class="module hero-wrapper">
                    <figure class="hero primary-hero">
                        <?php $image = get_field('background_image'); if( !empty($image) ): $url = $image['url']; $size = 'super-hero'; $thumb = $image['sizes'][ $size ];  ?>
                            <img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php else: ?>
                            <img src="http://placehold.it/1020x490" alt="dummy image" />
                        <?php endif; ?>    
                        <div class="image-overlay">
                            <figcaption class="caption caption-title">
                                <h1 class="title"><?php the_title(); ?></h1>
                            </figcaption>
                        </div>
                        <?php if( get_field( "main_image_caption_text" ) ): ?>
                            <figcaption class="caption caption-right caption-green">
                                <div class="caption-inner">
                                    <?php the_field( "main_image_caption_text" ); ?>
                                </div><!-- end of innercaption -->
                            </figcaption>
                        <?php endif;?>
                    </figure>
                </div><!-- end of module -->
            <?php endwhile; endif; ?>

                <?php $this_page_id=$wp_query->post->ID; ?>

                <?php query_posts(array('showposts' => -1, 'post_parent' => $this_page_id, 'post_type' => 'page' ,'orderby' => 'menu_order',
'order' => 'ASC')); ?>
                <?php $count = 1; ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <?php $count++; ?>
                    <?php if ($count % 2 == 1) : ?>
     
                        <div class="module hero-wrapper">
                            <figure class="hero hero-box-caption">
                                <?php $image = get_field('background_image'); if( !empty($image) ): $url = $image['url']; $size = 'hero'; $thumb = $image['sizes'][ $size ];  ?>
                                    <img src="<?php echo $thumb ?>" alt="<?php echo $image['alt']; ?>" />
                                <?php else: ?>
                                    <img src="http://placehold.it/1020x400" alt="dummy image" />
                                <?php endif; ?>
                                <div class="image-overlay">
                                    <figcaption class="caption caption-title">
                                        <h2 class="title"><?php the_title(); ?></h2>
                                    </figcaption>
                                </div>
                                <figcaption class="caption caption-right caption-green">
                                    <div class="caption-inner">
                                        <div class="hide-overflow">
                                            <?php the_field( "main_image_caption_text" ); ?>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="more more-brown">Find Out More</a>
                                    </div><!-- end of innercaption -->
                                </figcaption>
                            </figure>
                        </div><!-- end of module -->
                            
                    <?php else : ?> 

                       <div class="module wrapper">
                            <div class="section-block">
                                <a href="<?php the_permalink(); ?>" class="section-block-item">
                                    <?php $image = get_field('background_image'); if( !empty($image) ): $url = $image['url']; $size = 'section-image'; $thumb = $image['sizes'][ $size ];  ?>
                                        <img class="section-images-image" src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                                    <?php else: ?>
                                        <img class="section-images-image" src="http://placehold.it/455x330">
                                    <?php endif; ?>
                                </a>
                                <div class="section-block-item">
                                    <h2 class="title"><?php the_title(); ?></h2>
                                    <div class="text-entry">
                                        <?php the_field( "main_image_caption_text" ); ?>
                                        <a href="<?php the_permalink(); ?>" class="more more-green">Find Out More</a>     
                                    </div>

                                </div>
                            </div>
                        </div><!-- end of module -->
         
                    <?php endif; ?>
                    
                <?php endwhile; ?>

            
    
            </div> <!-- #main -->
            
        </div> <!-- #main-container -->
<?php get_footer(); ?>