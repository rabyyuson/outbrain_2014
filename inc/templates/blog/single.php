<?php

/**
 * Blog Post Single
 *
 * The view for the blog post single page
 * @url: www.outbrain.com/blog/{postname}
 *
 * -----------------------------------------------------------------------------
 */

?>
<div class="title">
    <?php the_title(); ?>
</div>
<div class="content">
    <?php the_content(); ?>
</div>
<div class="author">
    <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 68 ) ); ?>
    <br/>
    <?php printf( __( 'About %s', 'twentyeleven' ), get_the_author() ); ?>
    <br/>
    <?php the_author_meta( 'description' ); ?>
    <br/><br/>
    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
        <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyeleven' ), get_the_author() ); ?>
    </a>
</div>