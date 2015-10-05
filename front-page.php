<?php get_header(); ?>

 <div class="main-container homepage-template">
  
            <div class="main" role="main">
                
                <div class="module hero-wrapper">
                    <figure class="hero hero-thumbs">
                        <?php $image = get_field('what_we_do_main_image', 330); $url = $image['url']; $size = 'super-hero'; $thumb = $image['sizes'][ $size ]; if( !empty($image) ): ?>
                            <img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php else: ?>
                            <img src="http://placehold.it/1020x490" alt="dummy image" />
                        <?php endif; ?>                        
                        <div class="image-overlay hero-overlay">
                            <figcaption class="caption caption-title">
                                <h2 class="title-section"><a href="/?page_id=219">What We Do</a></h2>
                                <h1 class="title">Our Stories</h1>
                                <a href="/?page_id=219" class="more more-brown">Find Out More</a>
                            </figcaption>
                        </div>
                    </figure>
                    
                    <div class="thumbnails">
                        <ul class="thumbnails-list">
                            <?php if( have_rows('what_we_do_project_order') ): $cnt=0; while ( have_rows('what_we_do_project_order') && $cnt<8 ) : the_row(); ?>
                                <?php $cnt++; $projectID = get_sub_field('choose_a_project'); ?>
                                <li class="thumbnails-item">
                                <a href="<?php echo get_the_permalink($projectID); ?>">
                                    <?php $image = get_field('background_image', $projectID); if( !empty($image) ): $url = $image['url']; $size = 'super-hero-thumb' ; $thumb = $image['sizes'][ $size ];  ?>
                                        <img class="thumbnail-image" src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                                    <?php else: ?>
                                        <img class="thumbnail-image" src="http://placehold.it/510x245/555555" alt="dummy image" />
                                    <?php endif; ?> 
                                  
                                    <h5 class="thumbnail-caption">

                                        <?php $miniTitle = get_field('home_page_description', $projectID); if( !empty($miniTitle) ): ?>
                                            <?php the_field('home_page_description', $projectID); ?>
                                        <?php else: ?>
                                            <?php echo get_the_title($projectID); ?>
                                        <?php endif; ?> 
                                    </h5>
                                </a>
                            </li>    
                                    
                            <?php endwhile; else : endif; ?>
                        </ul>
                        
                    </div>
                </div><!-- end of module -->

                <div class="module wrapper">
                    <ul class="section-block big-blocks">
                        <?php $my_query = new WP_Query('page_id=217');
                        while ($my_query->have_posts()) : $my_query->the_post();
                        ?>
                            <li class="section-block-item">
                                <a href="<?php the_permalink();?>">
                                    <?php $image = get_field('background_image'); $url = $image['url']; $size = 'big-block-image'; $thumb = $image['sizes'][ $size ]; if( !empty($image) ): ?>
                                        <img class="section-images-image" src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                                    <?php else: ?>
                                        <img class="section-images-image" src="http://placehold.it/457x296">
                                    <?php endif; ?> 
                                    <h5 class="section-images-caption"><?php the_title();?></h5>
                                </a>
                            </li>
                         <?php endwhile; ?>

                         
                        
                            <li class="section-block-item">
                                <a href="/?page_id=219">
                                    <?php $image = get_field('background_image', 219); $url = $image['url']; $size = 'big-block-image'; $thumb = $image['sizes'][ $size ]; if( !empty($image) ): ?>
                                        <img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                                    <?php else: ?>
                                        <img class="section-images-image" src="http://placehold.it/457x296">
                                    <?php endif; ?>
                                    
                                    <h5 class="section-images-caption">What We Do</h5>
                                </a>
                            </li>
                     
                        

                         <?php $my_query = new WP_Query('page_id=221');
                        while ($my_query->have_posts()) : $my_query->the_post();
                        ?>
                            <li class="section-block-item">
                                <a href="<?php the_permalink();?>">
                                    <?php $image = get_field('background_image'); $url = $image['url']; $size = 'big-block-image'; $thumb = $image['sizes'][ $size ]; if( !empty($image) ): ?>
                                        <img class="section-images-image" src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                                    <?php else: ?>
                                        <img class="section-images-image" src="http://placehold.it/457x296">
                                    <?php endif; ?> 
                                    <h5 class="section-images-caption"><?php the_title();?></h5>
                                </a>
                            </li>
                         <?php endwhile; ?>

                         <?php $my_query = new WP_Query('page_id=223');
                        while ($my_query->have_posts()) : $my_query->the_post();
                        ?>
                            <li class="section-block-item">
                                <a href="<?php the_permalink();?>">
                                    <?php $image = get_field('background_image'); $url = $image['url']; $size = 'big-block-image'; $thumb = $image['sizes'][ $size ]; if( !empty($image) ): ?>
                                        <img class="section-images-image" src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                                    <?php else: ?>
                                        <img class="section-images-image" src="http://placehold.it/457x296">
                                    <?php endif; ?>     
                                    <h5 class="section-images-caption"><?php the_title();?></h5>
                                </a>
                            </li>
                         <?php endwhile; ?>
                    </ul>
                </div><!-- end of module -->

                <!-- location slither -->
                <div class="module hero-wrapper">
                    <?php $my_query = new WP_Query('page_id=217'); while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <figure class="hero hero-box-caption">
                        <?php $image = get_field('background_image'); $url = $image['url']; $size = 'hero'; $thumb = $image['sizes'][ $size ]; if( !empty($image) ): ?>
                            <img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php else: ?>
                            <img class="section-images-image" src="http://placehold.it/1020x400">
                        <?php endif; ?> 
                        <div class="image-overlay">
                            <figcaption class="caption caption-title">
                                <h2 class="title"><?php the_title(); ?></h2>
                            </figcaption>
                        </div>
                        <?php if( get_field( "main_image_caption_text" ) ): ?>
                            <figcaption class="caption caption-right caption-green">
                                <div class="caption-inner">
                                    <div class="hide-overflow">
                                        <?php the_field( "main_image_caption_text" ); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="more more-brown">Find Out More</a>
                                </div><!-- end of innercaption -->
                            </figcaption>
                        <?php endif;?>
                        
                    </figure>
                    <?php endwhile; ?>
                </div><!-- end of module -->

                <!-- TEAM SLITHER -->
                <div class="module wrapper">
                    <?php $my_query = new WP_Query('page_id=227'); while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <div class="section-block">
                        <a href="<?php the_permalink();?>" class="section-block-item">
                        <?php $image = get_field('background_image'); $url = $image['url']; $size = 'section-image'; $thumb = $image['sizes'][ $size ]; if( !empty($image) ): ?>
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
                    <?php endwhile; ?>
                </div>
                    
                <!-- facilities -->
                <div class="module hero-wrapper facilities-wrapper">
                    <figure class="hero hero-box-caption">
                        
                        <?php $image = get_field('campus_facilities_plan', 330); $url = $image['url']; $size = 'hero'; $thumb = $image['sizes'][ $size ]; if( !empty($image) ): ?>
                            <img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php else: ?>
                            <img src="http://placehold.it/1020x400" alt="dummy image" />
                        <?php endif; ?> 
                        <div class="image-overlay">
                            <figcaption class="caption caption-title">
                                <h2 class="title">Campus facilities</h2>
                            </figcaption>
                        </div>
                    </figure>
                </div><!-- end of module -->

                 <div class="module wrapper">
                    <?php $my_query = new WP_Query('page_id=243'); while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <div class="section-block">
                        <a href="<?php the_permalink();?>" class="section-block-item">
                            <?php $image = get_field('background_image');  if( !empty($image) ): $url = $image['url']; $size = 'section-image'; $thumb = $image['sizes'][ $size ]; ?>
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
                    <?php endwhile; ?>
                </div>
                
                <div class="module hero-wrapper brown-colour-wrapper">
                    <div class="section-block">
                        <div class="section-block-item table-block">
                            <h2 class="title">Term Dates</h2>
                            <div class="text-entry">
                                <p><?php the_field('term_date_intro', 330); ?></p>
                     
                                <?php the_field('term_dates', 330); ?>

                                <a href="/?page_id=817" class="more more-green">Academic Year Fees</a> 
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="module wrapper">
                    <div class="section-block">
                        <div class="section-block-item">
                            <?php $image = get_field('faqs_image', 330); $url = $image['url']; $size = 'section-image'; $thumb = $image['sizes'][ $size ]; if( !empty($image) ): ?>
                                <img class="section-images-image" src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php else: ?>
                                <img class="section-images-image" src="http://placehold.it/455x330">
                            <?php endif; ?> 
                        </div>
                        <div class="section-block-item">
                            <h2 class="title">FAQS</h2>
                            <div class="text-entry">
                                <?php the_field('faqs_text', 330); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="module hero-wrapper hero-quad-thumbs">
                    <figure class="hero hero-thumbs">
                        <?php $image = get_field('what_we_do_last_image', 330); $url = $image['url']; $size = 'hero'; $thumb = $image['sizes'][ $size ]; if( !empty($image) ): ?>
                            <img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php else: ?>
                            <img src="http://placehold.it/1020x400" alt="dummy image" />
                        <?php endif; ?>    
                        <div class="image-overlay hero-overlay">
                            <figcaption class="caption caption-title">
                                <h2 class="title">What We Do</h2>
                            </figcaption>
                        </div>
                    </figure>
                    <div class="thumbnails">
                        <ul class="thumbnails-list">
                        <?php $the_query = new WP_Query( 'showposts=4' ); ?>
                        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                            <li class="thumbnails-item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php $image = get_field('background_image');  if( !empty($image) ): $url = $image['url']; $size = 'super-hero-thumb'; $thumb = $image['sizes'][ $size ]; ?>
                                        <img class="thumbnail-image" src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                                    <?php else: ?>
                                        <img class="thumbnail-image" src="http://placehold.it/510x245/555555" alt="dummy image" />
                                    <?php endif; ?> 
                                    <h5 class="thumbnail-caption">
                                        <?php $miniTitle = get_field('home_page_description'); if( !empty($miniTitle) ): ?>
                                            <?php the_field('home_page_description'); ?>
                                        <?php else: ?>
                                            <?php the_title(); ?>
                                        <?php endif; ?> 
                                    </h5>
                                </a>
                            </li>
                        <?php endwhile;?>
                        </ul>
                    </div>
                </div><!-- end of module -->

            </div> <!-- #main -->
         
        </div><!-- #min-container -->

<?php get_footer(); ?>

