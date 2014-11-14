<?php

/**
 * Downloads Single Page
 *
 * The template for displaying the blog post detail page.
 * @url: www.outbrain.com/downloads/{slug}
 *
 * -----------------------------------------------------------------------------
 */

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">	
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <meta property="og:url" content="<?php echo get_permalink( $post->ID ); ?>" /> 
        <meta property="og:title" content="<?php echo $post->post_title; ?>" />
        <meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />
        <meta property="og:image" content="<?php echo \Outbrain\Classes\Core\Functions::get_first_post_image(); ?>" />
    <?php endwhile; endif; ?>
    <title><?php echo $wp_query->posts[0]->post_title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/inc/addons/downloads/css/style.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://use.typekit.net/xsa6cds.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
</head>
<body>
<header class="container">
    <div class="row head">
        <div class="inner clearfix">
            <div class="columns eight">
                <a class="logo" href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/global/logo.png" alt="Outbrain Logo" />
                </a>
                <a class="back" href="<?php echo esc_url( $_POST['origin_url'] ? $_POST['origin_url'] : get_permalink( get_page_by_title( 'Blog' ) ) ); ?>">Back to Blog</a>
            </div>
            <nav class="columns four">
                <ul>
                    <li>
                        <a href="http://facebook.com/outbrain" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-facebook.png" />
                        </a>
                    </li>
                    <li>
                        <a href="http://twitter.com/outbrain" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-twitter.png" />
                        </a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/+outbrain" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-googleplus.png" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/outbrain" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-linkedin.png" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/user/ContentDiscovery" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-youtube.png" />
                        </a>
                    </li>
                    <li>
                        <a href="http://www.pinterest.com/outbrain/" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-pinterest.png" />
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
    
<?php 

/*******************************************************************************
 * 
 * The Thank You view
 * Check to see if the parameters passed are correct and valid.
 * This prevents anybody from passing a 'guess' id values and getting the file.
 * 
 ******************************************************************************/

// First, let's get the form lead.
// Make sure to escape the input values!
$lead = RGFormsModel::get_lead( filter_input( INPUT_GET, 'lid', FILTER_SANITIZE_NUMBER_INT ) );

// Now let's check the parameter value passed from the url.
if( 
    (int)$post->ID === (int)filter_input( INPUT_GET, 'pid', FILTER_SANITIZE_NUMBER_INT ) &&
    (int)$post->post_author === (int)filter_input( INPUT_GET, 'paid', FILTER_SANITIZE_NUMBER_INT ) &&
    (int)$lead['form_id'] === (int)filter_input( INPUT_GET, 'fid', FILTER_SANITIZE_NUMBER_INT ) 
): 
    
// Get the origin_url value from the form fields in the back-end.
// Since there is no built-in function to retrieve the value based on the 
// parameter name, we need to loop through the array id's of each field
// and find out which is a url structure.
for( $i = 0; $i < 20; $i++ ){
    if( strpos( $lead[$i], 'http://' ) === 0 ){ ?>
        <script>var back_url = '<?php echo $lead[$i]; ?>';</script>
    <?php
    }
}
    
// Retrieve the file from the post.
// Let's find out which download file url to use.
if( function_exists( 'get_field' ) ) {
    $download_post = array(
        'header_title'      => get_field( 'download_thank_you_header_title', $post->ID ),
        'header_subtitle'   => get_field( 'download_thank_you_header_subtitle', $post->ID ),
        'file'              => get_field( 'download_file', $post->ID ),
        'url'               => get_field( 'download_url', $post->ID )
    );
    $download = array(
        'url' => ( $download_post['file']['url'] ? $download_post['file']['url'] : $download_post['url'] )
    );
} ?>
    
    <div class="container content ty" role="main">
        <div class="row">
            <div class="inner clearfix">
                <div class="columns twelve">
                    <h1 class="heading-title"><?php echo $download_post['header_title']; ?></h1>
                    <h3 class="heading-subtitle"><?php echo $download_post['header_subtitle']; ?></h3>
                    <div class="links">
                        <div class="buttons">
                            <a class="download" href="<?php echo $download['url']; ?>">Download File</a>
                            <a class="email" href="mailto: ?subject=Check%20out%20this%20download%20file%20from%20Outbrain!&amp;body=Download%3A%0A--file--">Email to a friend</a>
                        </div>
                        <div class="social">
                            <a class="facebook" href="<?php echo \Outbrain\Classes\Core\Functions::share_this_page( 'facebook', $post ); ?>" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/inc/addons/downloads/images/social-facebook.png" />
                            </a>
                            <a class="twitter" href="<?php echo \Outbrain\Classes\Core\Functions::share_this_page( 'twitter', $post ); ?>" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/inc/addons/downloads/images/social-twitter.png" />
                            </a>
                            <a class="linkedin" href="<?php echo \Outbrain\Classes\Core\Functions::share_this_page( 'linkedin', $post ); ?>" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/inc/addons/downloads/images/social-linkedin.png" />
                            </a>
                        </div>
                        <div class="back">
                            <a href="<?php echo get_permalink( $post->ID ); ?>">&lsaquo; Back to previous page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php 

/*******************************************************************************
 * 
 * The Form view
 * Check to see if no data is provided or the parameters passed are invalid.
 * 
 ******************************************************************************/

else: ?>
    
    <div class="container content" role="main">
        <div class="row">
            <div class="inner clearfix">
                <div class="columns eight">
                    <?php

                        // Loop through the posts and show them
                        if ( have_posts() ) :
                            // Pull the view template for displaying the post data
                            while ( have_posts() ) : the_post(); ?>

                                <div class="content">
                                    <?php the_content(); ?>
                                </div>

                    <?php 
                            endwhile;
                        endif; ?>
                </div>
                <div class="columns four">
                    <h3 class="download_header_label">
                        <?php
                            // Get the download header label and populate the form header title
                            if( function_exists( 'get_field' ) && get_field( 'download_header_label', $post->ID ) ) {
                                echo ( get_field( 'download_header_label', $post->ID ) );
                            } else {
                                echo 'Complete the form to download the report';
                            }
                        ?>
                    </h3>
                    <?php if( function_exists( 'get_field' ) ): ?>
                        <script>
                            // Get the post options form selection to show or hide
                            var post_options = [
                            <?php foreach( get_field( 'download_field_selection', $post->ID ) as $class_name ):
                                echo "'" . $class_name . "',";
                            endforeach; ?>
                            ]
                        </script>
                        <div class="hide">
                            <p class="download_checkbox_label"><?php echo get_field( 'download_checkbox_label', $post->ID ); ?></p>
                            <p class="download_submit_button_text"><?php echo get_field( 'download_submit_button_text', $post->ID ); ?></p>
                        </div>
                    <?php endif; ?>
                        
                    <?php
                    
                        // Get the form selected.
                        $form = get_field( 'download_form_selection', $post->ID );
                        $origin_url = esc_url( $_POST['origin_url'] ? $_POST['origin_url'] : get_permalink( get_page_by_title( 'Blog' ) ) );
                        
                        if( (string)$form === 'blog' ){
                            gravity_form( \Outbrain\Classes\Core\Functions::get_gravity_form_by_id( 'outbrain_2014_blog_form' ), false, false, false, array( 'origin_url' => $origin_url ), true, 1 );
                        } elseif( (string)$form === 'download' ) {
                            gravity_form( \Outbrain\Classes\Core\Functions::get_gravity_form_by_id( 'outbrain_2014_download_form' ), false, false, false, array( 'origin_url' => $origin_url ), true, 1 );
                        }
                        
                    ?>
                    <p class="download_footer_note_label">
                        <?php
                            // Get the download footer note label and populate the form footer note title
                            if( function_exists( 'get_field' ) && get_field( 'download_footer_note_label', $post->ID ) ) {
                                echo ( get_field( 'download_footer_note_label', $post->ID ) );
                            } else {
                                echo 'Get Weekly Content Marketing Tips';
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
<?php endif; ?>
    
<footer class="container">
    <div class="row">
        <div class="inner clearfix">
            <div class="columns four">
                <ul>
                    <li>
                        <a href="javascript:void(0)">About Outbrain</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Privacy Policy</a>
                    </li>
                </ul>
            </div>
            <div class="columns eight">
                <p>Copyright © 2014 Outbrain Inc. All rights reserved. Outbrain is a trademark of Outbrain Inc.</p>
            </div>
        </div>
    </div>
</footer>
<script src="<?php echo get_template_directory_uri(); ?>/inc/addons/downloads/js/script.js"></script>
</body>
</html>