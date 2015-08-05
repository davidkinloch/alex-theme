<?php get_header(
/*
Template Name: Level 2 Template
*/
); ?>


        <div class="main-container template02">
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
            
            <!-- page sections -->
            <?php while( have_rows('page_sections') ): the_row();
                $fullimage = get_sub_field('full_width_image');
                $smallimage = get_sub_field('section_image');
            ?>

                <?php if (get_sub_field('section_type', 'option') == 'fullwidthimage') { ?>
                    <div class="module hero-wrapper">
                        <figure class="hero hero-box-caption">
                            <?php if( !empty($fullimage) ): $url = $fullimage['url']; $size = 'hero'; $thumb = $fullimage['sizes'][ $size ];  ?>
                                    <img src="<?php echo $thumb; ?>" alt="<?php echo $fullimage['alt']; ?>" />
                                <?php else: ?>
                                    <img src="http://placehold.it/1020x400" alt="dummy image" />
                            <?php endif; ?>
                            <?php if(get_sub_field('section_title')): ?>
                                <div class="image-overlay">    
                                    <figcaption class="caption caption-title">
                                        <h2 class="title <?php the_sub_field('title_colour'); ?>"><?php the_sub_field('section_title'); ?></h2>
                                    </figcaption>
                                </div>
                            <?php endif;?>
                                
                            <?php if(get_sub_field('text_content')): ?>
                                <figcaption class="caption caption-right caption-green">
                                    <div class="caption-inner">
                                        <?php the_sub_field('text_content'); ?>
                                    </div><!-- end of innercaption -->
                                </figcaption>
                            <?php endif;?>
                        </figure>
                    </div><!-- end of module -->

                <?php } else if (get_sub_field('section_type', 'option') == 'imageandtext') { ?>
                    <div class="module wrapper">
                        <div class="section-block">
                            <div class="section-block-item">
                                <?php if( !empty($smallimage) ): $url = $smallimage['url']; $size = 'section-image'; $thumb = $smallimage['sizes'][ $size ];  ?>
                                    <img src="<?php echo $thumb; ?>" alt="<?php echo $smallimage['alt']; ?>" />
                                <?php else: ?>
                                    <img class="section-images-image" src="http://placehold.it/455x330">
                                <?php endif; ?> 
                            </div>
                            <div class="section-block-item">
                                <h2 class="title"><?php the_sub_field( "section_title" ); ?></h2>
                                <div class="text-entry">
                                    <?php the_sub_field( "text_content" ); ?>
                                </div>
                            </div>
                        </div>
                    </div><!-- end of module -->
                
                <?php } else if (get_sub_field('section_type', 'option') == 'table') { ?>
                    <div class="module hero-wrapper brown-colour-wrapper">
                        <div class="section-block">
                            <div class="section-block-item table-block">
                                <h2 class="title"><?php the_sub_field( "section_title" ); ?></h2>
                                <div class="text-entry">
                                    <?php the_sub_field( "text_content" ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
  
                    
                
                
                <?php } else if (get_sub_field('section_type', 'option') == 'imageonly') { ?>
                    <div class="module hero-wrapper">
                        <figure class="hero hero-box-caption">
                            <?php if( !empty($fullimage) ): ?>
                                    <img src="<?php echo $fullimage['url']; ?>" alt="<?php echo $fullimage['alt']; ?>" />
                                <?php else: ?>
                                    <img src="http://placehold.it/1020x400" alt="dummy image" />
                            <?php endif; ?>
                            <?php if(get_sub_field('section_title')): ?>
                                <figcaption class="caption caption-title">
                                    <h2 class="title <?php the_sub_field('title_colour'); ?>"><?php the_sub_field('section_title'); ?></h2>
                                </figcaption>
                            <?php endif;?>
                        </figure>
                    </div><!-- end of module -->
                <?php } else if (get_sub_field('section_type', 'option') == 'textonly') { ?>
                    <div class="module wrapper">
                        <div class="section-block">
                            <div class="section-block-item text-only">
                                <h2 class="title"><?php the_sub_field( "section_title" ); ?></h2>
                                <div class="text-entry">
                                    <?php the_sub_field( "text_content" ); ?>
                                </div>
                            </div>
                        </div>
                    </div><!-- end of module -->            
                 <?php } ?>
            
            <?php endwhile; ?>
            <!-- end of page sections -->
    
            </div> <!-- #main -->
            <?php endwhile; endif; ?>
        </div> <!-- #main-container -->
<?php get_footer(); ?>