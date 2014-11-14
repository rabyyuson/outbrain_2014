<?php

/**
 * Author Single Template
 *
 * Displays the author detail
 * @url: www.outbrain.com/author/{name}
 * 
 * -----------------------------------------------------------------------------
 */

?>
<article>
    <div class="category-title">
        <?php
            // Get the category list and then extract the first category
            // from the array.
            $category = get_the_category();
            $category = $category[0];
        ?>
        <a href="<?php echo get_category_link( $category->term_id ); ?>">
            <?php echo $category->name; ?>
        </a>
    </div>
    <h1 class="title">
        <a href="<?php echo esc_url( get_permalink() ); ?>">
            <?php echo get_the_title(); ?>
        </a>
    </h1>
    <div class="meta">
        <time>
            <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
        </time>
    </div>
    <div class="information">
        <div class="content">
            <div class="excerpt">
                <?php
                    // Get the excerpt and limit the string out to 200
                    $excerpt = explode( ' ',get_the_excerpt() );
                    if( (int)strpos( $excerpt[0], '&nbsp' ) === 0 ) {
                        unset( $excerpt[0] );
                    }
                    echo substr( implode( ' ', $excerpt ), 0, 220 ) . '...';
                ?>
            </div>
            <div class="read-more">
                <a href="<?php echo get_the_permalink(); ?>">Read More &rsaquo;</a>
            </div>
        </div>
    </div>
    <div class="close">
        <div class="dash"></div>
    </div>
</article>