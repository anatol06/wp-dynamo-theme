<?php get_header(); ?>
<?php while(have_posts()) : the_post() ?>   
<section class="bar">
    <div class="wrap wider">
        <div class="grid">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</section>

<section>
    <div class="wrap wider">
        <div class="grid">
            <div class="post-wrap"> 
                <div class="unit three-fourths">
                    <article class="post">
                        <?php if(has_post_thumbnail()) : ?>
                            <div class="post-thumb">
                                <?php the_post_thumbnail(); ?>
                            </div>  
                        <?php endif; ?>

                        <h3><?php the_title(); ?></h3>
                            <ul class="meta">
                                <li>Posted on <?php the_time('F j, Y g:i a'); ?></li><li>by
                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                        <?php the_author(); ?></a>
                                </li>                                                 
                            </ul>
                        <?php the_content(); ?>
                    </article>
                    <?php endwhile; ?>
                </div>
                <div class="unit one-fourth">
                   <?php if(is_active_sidebar('sidebar')) : ?>
                       <?php dynamic_sidebar('sidebar'); ?>
                   <?php endif; ?>
                </div>
            </div>
            <!-- post-wrap -->
        </div>
        <!-- grid -->
    </div>
    <!-- wrap wider -->
</section>

<!-- Blog Posts Section -->
<?php get_footer(); ?>