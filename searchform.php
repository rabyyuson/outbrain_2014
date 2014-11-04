<form action="<?php echo home_url( '/' ); ?>" method="get">
    <input type="text" name="s" id="search" placeholder="Search" value="<?php the_search_query(); ?>" />
</form>