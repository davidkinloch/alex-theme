<?php get_header(); ?>

        <div class="main-container article-section">
            <div class="main clearfix" role="main" itemscope itemprop="mainContentOfPage">
                <div class="module hero-wrapper search-wrapper">
                    <div class="article-feed-header">
                        <div class="title-block">
                            <h1 class="title">What we Do</h1>
                            <h2 class="title-section">Our Work at Alexanders</h2>
                        </div>
                        <div class="text-entry">
                            <p>Rather than just telling you about the amazing work we do at Alexanders College we prefer to show you a collection of actual work undertaken by students individually, in project groups or in the class room, put together and published with our very own online authoring platform.</p>
                        </div>
                        <a href="#" class="search-toggle" aria-hidden="false">Search Toggle</a>
                        <div class="search-options">
                            <h3 class="title-section">Search Collection</h3>
                            <form class="search-collection">
                                <div class="input-holder">   
                                    <select id="filters">
                                        <option value="*">show all</option>
                                          <?php
                                            $args = array(
                                              'orderby' => 'name',
                                              'order' => 'ASC'
                                              );
                                            $categories = get_categories($args);
                                              foreach($categories as $category) { 
                                                echo '<option value=".'. $category->slug . '">' . $category->slug . '</option>';
                                               } 
                                            ?>
                                    </select>                                   
                                </div>
                                <!--
                                <div class="input-holder">
                                    <label for="title-input">Title</label>
                                    <input type="text" class="title-input" id="title-input" placeholder="Title"/>
                                </div>
                                -->
                                <div class="input-holder">
                                    <label for="keyword-input">Keyword</label>
                                    <input type="text" class="keyword-input noEnterSubmit" id="quicksearch" placeholder="Keyword"/>
                                </div>
                                <!--
                                <div class="input-holder">
                                    <input class="more more-green submit" type="submit" value="Search" />
                                </div>
                                -->
                            </form><!-- end of search collection form -->
                        </div>
                    </div>
                </div><!-- end of hero-wrapper -->
                <div class="module hero-wrapper">
                    <div class="hfeed container" id="container">
                        
                        <?php $count = (int)0; if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php
                            //Set the span to our default span12
                            $span = 'item w4';
                            $size = 'hero';
                            //If the count is 2 or 3 change span to be span3. You can put whatever conditions you want here
                            if($count == 1){
                            $span = 'item grid-sizer w1';
                            $size = 'super-hero-thumb';
                            }
                            if($count == 2){
                            $span = 'item w1';
                            $size = 'super-hero-thumb';
                            }
                            if($count == 3){
                            $span = 'item w1';
                            $size = 'super-hero-thumb';
                            }
                            if($count == 4){
                            $span = 'item w3';
                            $size = 'super-hero-thumb';
                            }
                            if($count == 5){
                            $span = 'item w3';
                            $size = 'super-hero-thumb';
                            }
                            if($count == 6){
                            $span = 'item w1';
                            $size = 'super-hero-thumb';
                            }
                            if($count == 7){
                            $span = 'item w1';
                            $size = 'super-hero-thumb';
                            }
                            //If the count is equal to 7 or higher (which it should not be) then reset the count to 0
                            if($count >= 7){
                            $count = 0;
                            }
                            //If its not 7 or higher, increase the count
                            else{
                            $count++;
                            }
                        ?>

                    

                        <div class="<?php echo $span; ?> <?php foreach(get_the_category() as $category) {echo " " .$category->slug;} ?>" data-category="<?php foreach(get_the_category() as $category) {echo " " .$category->slug;} ?>">
                            <a href="<?php the_permalink(); ?>" class="item-link"> 
                                <div class="image-holder">
                            
                                        <?php $image = get_field('background_image'); if( !empty($image) ): $url = $image['url']; $thumb = $image['sizes'][ $size ];  ?>
                                            <img class="item-image" src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
                                        <?php else: ?>
                                            <img class="item-image" src="http://placehold.it/510x245" alt="dummy image" />
                                        <?php endif; ?>
                                </div>
                                <h3 class="title"><?php the_title(); ?></h3>
                                <div class="text-entry">
                                    <?php the_field( "main_image_caption_text" ); ?>
                                </div>
                            </a>
                        </div>
                        <?php endwhile; endif; ?>
                    </div><!-- ned hfeed container -->
                    <!--<a class="more more-articles">Load More Articles</a>-->
                </div><!-- end of module -->
            </div><!-- end of main -->
        </div><!-- end of main-container -->
<?php get_footer(); ?>