<?php get_header(
/*
Template Name: Contact Page Template
*/
); ?>


        <div class="main-container">
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
                                <?php if( !empty($smallimage) ): ?>
                                    <img src="<?php echo $smallimage['url']; ?>" alt="<?php echo $smallimage['alt']; ?>" />
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
                    <?php the_sub_field( "section_title" ); ?>
                    <?php the_sub_field( "section_table" ); ?>
                
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
                    <?php if(get_sub_field('section_title')): ?>
                        <h2 class="title <?php the_sub_field('title_colour'); ?>"><?php the_sub_field('section_title'); ?></h2>                           
                    <?php endif;?>
                 <?php } ?>
            
            <?php endwhile; ?>
            <!-- end of page sections -->
                <div class="module wrapper">
                    <div class="section-block">
                        <div  class="section-block-item">
                            <h2 class="title">Contact Form</h2>
                            <div class="text-entry single-column">
                                <?php the_field('form_text'); ?>
                            </div>
                        </div>
                        <div class="section-block-item">
                            <div class="text-entry single-column">
                                
                                <form class="contact-form">
                                    <div class="input-holder">
                                        <label>Name</label>
                                        <input type="text" placeholder="Name" />
                                    </div>
                                    <div class="input-holder">
                                        <label>Email</label>
                                        <input type="text" placeholder="Email" />
                                    </div>
                                    <div class="input-holder">
                                        <label>Telephone</label>
                                        <input type="text" placeholder="Telephone" />
                                    </div>
                                    <div class="input-holder">
                                        <label>Subject</label>
                                        <input type="text" placeholder="Subject" />
                                    </div>
                                    <div class="input-holder">
                                        <label>Message</label>
                                        <textarea placeholder="Message" ></textarea>
                                    </div>
                                    <div class="input-holder">
                                        <input class="more more-green submit" type="submit" value="Send" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- section-block -->
                </div><!-- end of module -->

                <div class="module hero-wrapper">
                    <figure class="hero hero-box-caption">
                        <div class="google-maps">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d2456.978826534057!2d1.396496222496652!3d51.989039552066345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!1i0!3e6!4m0!4m5!1s0x47d9785fea639f4b%3A0xaeb3becb86926dd3!2sAlexanders+College%2C+Bawdsey+Manor%2C+Bawdsey+Woodbridge%2C+Suffolk+IP12+3AZ%2C+United+Kingdom!3m2!1d51.989522!2d1.399695!5e0!3m2!1sen!2ses!4v1427064710688" width="1020" height="400" frameborder="0" style="border:0"></iframe>
                        </div>
                    </figure>
                </div><!-- end of module -->
      
            </div> <!-- #main -->
            <?php endwhile; endif; ?>
        </div> <!-- #main-container -->
<?php get_footer(); ?>