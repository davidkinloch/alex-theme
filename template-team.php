<?php get_header(
/**
 * Template Name: Team Template
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
            
                <div class="module wrapper beamme">
                    
                </div>

                <div class="module hero-wrapper green-colour-wrapper">
                    <div class="section-block team-lisiting-block">
                        <h2 class="title">Alphabetical list</h2>
                        <p>Please click on a name below for some more detail.</p>
                        <ul class="team-list">
                            <?php 
                            the_post();

                            // Get 'team' posts
                            $team_posts = get_posts( array(
                                'post_type' => 'team',
                                'posts_per_page' => -1, // Unlimited posts
                                'orderby' => 'title',
                                'order' => 'ASC' 
                            ) );

                            if ( $team_posts ):
                            ?>
                                <?php 
                                    foreach ( $team_posts as $post ): 
                                    setup_postdata($post);
                                ?>
                                <li class="team-list-item">
                                    <a class="team-list-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>       
                                </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div><!-- team-lisitng -->
                </div><!-- end of module -->
            </div> <!-- #main -->
            <?php endwhile; endif; ?>
        </div> <!-- #main-container -->
<?php get_footer(); ?>