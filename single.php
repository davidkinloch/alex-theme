<?php get_header('project'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <!-- article page -->
        <div class="main-container article-section">
            <div class="main clearfix" role="main" itemscope itemprop="mainContentOfPage">
            <div class="boss-section">
                <div class="module hero-wrapper">
                    <figure class="hero hero-article">    
                        <?php $image = get_field('background_image'); if( !empty($image) ): $url = $image['url']; $size = 'hero'; $thumb = $image['sizes'][ $size ];  ?>
                            <img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php else: ?>
                            <img src="http://placehold.it/1020x400" alt="dummy image" />
                        <?php endif; ?>
                        <div class="image-overlay">
                            <figcaption class="caption caption-title">
                                <h1 class="title"><?php the_title(); ?></h1>
                                <div class="breaker">
                                    <h3 class="author">by <?php the_author(); ?> 
                                        <?php if( get_field( "other_authors" ) ): ?>
                                            <?php $other_authors = get_field('other_authors');    ?>

                                            with the help of 
                               
                                            <?php foreach( $other_authors as $other_author): ?>
                                               
                                                <span class="fellow-authors"><?php echo $other_author['display_name'], ''; ?></span><?php endforeach; ?><?php endif; ?></h3>

                                    <?php if( get_field( "main_image_caption_text" ) ): ?>
                                    <div class="text-entry">
                                        <?php $content = get_field( "main_image_caption_text" ); echo mb_strimwidth($content, 0, 400);?>      
                                    </div>
                                    <?php endif;?>
                                </div>
                            </figcaption>
                        </div>
                    </figure>
                </div><!-- end hero-wrapper -->

                <!-- page sections -->
                <div class="module hero-wrapper article-wrapper">
                    <div class="main-article">

                        <?php while( have_rows('add_your_section_templates') ): the_row(); ?>

                            <?php if (get_sub_field('select_your_section_template', 'option') == 'video') { ?>
                                <div class="article-block">
                                    <div class="article-block-content">
                                        <?php if ( get_sub_field('section_title') ): ?>
                                            <h2 class="title" id="early-life"><?php the_sub_field('section_title'); ?></h2>
                                        <?php endif; ?>
                                        <div class="text-entry">
                                            <div class="wp-caption alignleft">    
                                                <?php if( in_array( 'vimeo', get_sub_field('embed_a_video') ) ) : ?>
                                                    <iframe style="width:100%;" height="315" src="https://player.vimeo.com/video/<?php the_sub_field('video_id');?>" frameborder="0" allowfullscreen></iframe>
                                                <?php else: ?>
                                                    <iframe style="width:100%;" height="315" src="https://www.youtube.com/embed/<?php the_sub_field('video_id');?>" frameborder="0" allowfullscreen></iframe>
                                                <?php endif; ?>
                                                <div class="embed-caption">
                                                    <p><?php the_sub_field('video_caption') ;?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end of article block content -->
                                    <?php if( get_sub_field('add_exploration_section') ): ?>
                               
                                        <!-- explore button -->
                                        <div class="article-block-secondary">
                                            <a href="#" class="article-cont" id="<?php the_sub_field('unique_id'); ?>"><?php the_sub_field('exlporation_link_title');?></a>
                                        </div>
                                        
                                    <?php endif; ?>
                                </div><!-- end of article block -->

                                
                            <?php } else if (get_sub_field('select_your_section_template', 'option') == 'textonly') { ?>
                                <div class="article-block">
                                    <div class="article-block-content">
                                        <h2 class="title"><?php the_sub_field('section_title'); ?></h2>
                                        <div class="text-entry">
                                            <?php the_sub_field('section_text'); ?>
                                        </div>
                                    </div><!-- end of article block content -->
                                
                                    <?php if( get_sub_field('add_exploration_section') ): ?>
                                        <!-- explore button -->
                                        <div class="article-block-secondary">
                                            <a href="#" class="article-cont" id="<?php the_sub_field('unique_id'); ?>"><?php the_sub_field('exlporation_link_title');?></a>
                                        </div>
                                    <?php endif; ?>
                            </div><!-- end of article block -->
                            

                            <?php } else if (get_sub_field('select_your_section_template', 'option') == 'textandimage') { ?>
                                <div class="article-block reverse-position">
                                    <div class="article-block-secondary">
                                        <div class="wp-caption alignright">
                                           <?php $image = get_sub_field('choose_an_image'); if( !empty($image) ): $url = $image['url']; $size = 'section-image'; $thumb = $image['sizes'][ $size ];  ?>
                                                <img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                                            <?php else: ?>
                                                <img src="http://placehold.it/462x374" alt="dummy image" />
                                            <?php endif; ?>
                                           <div class="embed-caption">
                                                <?php the_sub_field('image_caption');?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="article-block-content">
                                        <h2 class="title" id="home-of-great-man"><?php the_sub_field('section_title'); ?></h2>
                                        <div class="text-entry">
                                            <?php the_sub_field('section_text'); ?>
                                        </div>
                                    </div><!-- end of article block content -->
                                </div><!-- end of article block -->
                     
                            
                            <?php } else if (get_sub_field('select_your_section_template', 'option') == 'thumbnails') { ?>
                                <div class="article-block article-thumbnails">
                                    <div class="article-thumbnails-content">
                                        <h2 class="title" id="the-wonder-of-man"><?php the_sub_field('section_title'); ?></h2>
                                        <?php if( have_rows('thumbnail_images') ): ?>
                                            <ul class="article-thumbnails-content-list">
                                            <?php while( have_rows('thumbnail_images') ): the_row(); $image = get_sub_field('thumbnail_image'); ?>
                                                <li class="article-thumbnails-content-item">
                                                    <?php if( !empty($image) ): $url = $image['url']; $size = 'projects-thumb'; $thumb = $image['sizes'][ $size ];  ?>
                                                        <img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                                                    <?php else: ?>
                                                        <img src="http://placehold.it/220x126" alt="dummy image" />
                                                    <?php endif; ?>
                                                </li>
                                            <?php endwhile; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                    <div class="article-block-secondary">
                                        <div class="embed-caption">
                                            <p><?php the_sub_field('thumbnail_caption'); ?></p>
                                        </div>
                                        <?php if( get_sub_field('add_exploration_section') ): ?>
                                            <!-- explore button -->
                                            <a href="#" class="article-cont" id="<?php the_sub_field('unique_id'); ?>"><?php the_sub_field('exlporation_link_title');?></a>                                            
                                        <?php endif; ?>
                                    </div>
                                </div>
                 
                             <?php } ?>

                        <?php endwhile; ?>
                        <!-- end of page sections -->                      

                        <div class="article-block">
                            <div class="article-block-content">
                                <h2 class="title" id="credits-and-references">Credits and References</h2>
                                <div class="meta-data">
                                    <p class="brown">
                                        This work was written, edited and published using Alexanders College online publishing system by <?php the_author();?> 

                                         <?php if( get_field( "other_authors" ) ): ?>
                                            <?php $other_authors = get_field('other_authors');    ?>

                                            with the help of
                               
                                            <?php foreach( $other_authors as $other_author): ?>
                                                <span class="fellow-authors"><?php echo $other_author['display_name'],''; ?></span><?php endforeach; ?><?php endif; ?>.
                                    </p>
                                    <p class="brown">
                                        We published this work on <?php the_date(); ?>.
                                    </p>
                                </div>
                                <div class="article-credits">
                                    <?php the_content(); ?>
                                    <p>We hope you enjoyed this article.</p>
                                </div>
                                <div class="article-smallprint">
                                    <p>All open access articles in Alexanders College Work are published under Creative Commons licenses and may be reproduced for non-profit purposes. We would ask as a courtesy, that any reproduction of this article is accompanied by an attribution to Alexanders College and to the student authors. Thank you.</p>
                                </div>
                            </div><!-- end of article block content -->
                        </div><!-- end of article block -->

                        </div><!-- end of main article -->
                    </div><!-- end of module -->
               
                </div><!--boss-section-->
                
                        
                    <?php while( have_rows('add_your_section_templates') ): the_row(); ?>
                        <?php if( get_sub_field('add_exploration_section') ): ?>                                    
                            <!-- explore section -->
                            <div class="module article-wrapper explore-wrapper <?php the_sub_field('unique_id'); ?>">
                                <div class="main-article">
                                    <div class="article-block reverse-position">
                                        <div class="article-block-secondary">
                                            <div class="wp-caption alignright">
                                                <?php $image = get_sub_field('exploration_image'); if( !empty($image) ): $url = $image['url']; $size = 'projects-small'; $thumb = $image['sizes'][ $size ];  ?>
                                                    <img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                                                <?php else: ?>
                                                    <img src="http://placehold.it/462x374" alt="dummy image" />
                                                <?php endif; ?>
                                               <div class="embed-caption">
                                                    <?php the_sub_field('exploration_image_caption');?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="article-block-content">
                                            <h2 class="title" id="<?php the_sub_field('unique_id'); ?>"><?php the_sub_field('exploration_title');?></h2>
                                            <div class="text-entry">
                                                <?php the_sub_field('exploration_text');?>
                                            </div>
                                            <a href="#" class="article-prev">Main Article</a>
                                        </div><!-- end of article block content -->
                                    </div><!-- end of article block -->
                                </div><!-- end of main article -->
                            </div><!-- end of module -->
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <!-- explore that yo -->
                </div><!-- end of main -->
            
       </div><!-- end of main-container -->
    </div><!-- end of article template -->
        <div class="floaty-social-holder">
            <ul class="social-nav-menu">
                <li class="facebook"><a href="http://www.facebook.com/sharer.php?s=100&amp;p[url]=<?php the_permalink(); ?>" target="_blank" title="Share on Facebook" class="btn share-link link-facebook" rel="nofollow" data-ssbp-title="<?php the_title(); ?>" data-ssbp-url="<?php the_permalink(); ?>" data-ssbp-site="Facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600,left=200,top=200');return false;">Facebook</a></li>
                <li class="twitter"><a href="http://twitter.com/home?status=Reading <?php the_title(); ?> via <?php the_permalink(); ?>" target="_blank" title="Share on Twitter" class="btn share-link link-twitter" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600,left=200,top=200');return false;">Twitter</a></li>
                <li class="google"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">Google+</a></li>
            </ul>
        </div><!-- end of floaty holder -->
        <?php endwhile; endif; ?>
<?php get_footer(); ?>