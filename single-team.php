
<div class="module wrapper team-single  ">
    <div class="section-block featured-bio" id="anchor">
        <?php $image = get_field('image'); if( !empty($image) ): $url = $image['url']; $size = 'section-image'; $thumb = $image['sizes'][ $size ];  ?>
        <div class="section-block-item team-photo">
            <img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />            
        </div>
        <?php endif; ?> 
        <div class="section-block-item">
            <h2 class="title"><?php the_title(); ?></h2>
            <?php if(get_field('position')): ?>
                <h3 class="subtitle"><?php the_field('position'); ?></h3>
            <? endif; ?>
            <?php if(get_field('text')): ?>
                <div class="text-entry">
                    <?php the_field('text'); ?>
                </div>
            <? endif; ?>
        </div>
    </div>
</div>