<?php

/**
 * Extend Post
 * 
 * Add some options in the Post editor that will allow us to modify the behavior
 * of posts in listing pages.
 * 
 * -----------------------------------------------------------------------------
 */

/**
 * Adds the meta box container.
 * Restrict functionality for "post" post-types only.
 */
function webinars_add_meta_boxes( ) {
    // Create the metabox.
    add_meta_box(
        'post_sidebar_metabox',
        'Webinar Options',
        'webinars_render_meta_box_content',
        'webinars',
        'normal',
        'high'
    );
}

/**
 * Render Meta Box content.
 *
 * @param WP_Post $post The post object.
 */
function webinars_render_meta_box_content( $post ) {

    // Add an nonce field so we can check for it later.
    wp_nonce_field( 'webinar_inner_custom_box', 'webinar_inner_custom_box_nonce' );

    // Use get_post_meta to retrieve an existing value from the database.
    $post_webinar_metabox = get_post_meta( $post->ID, 'post_webinar_metabox-' . $post->ID, true );
    $post_webinar_metabox = json_decode($post_webinar_metabox);

    // create the tinymce editor
    ?>
    <script>
        (function($){
            var sl = [ $('#sample-permalink'),$('#shortlink'),$('#view-post-btn a'),$('#preview-action a') ];
            for(var i in sl){
                if(sl[i][0].nodeName === 'SPAN'){
                    sl[i].text(makeLive(sl[i].text()))
                } else if(sl[i][0].nodeName === 'A'){
                    var newLink = makeLive(sl[i].attr('href'));
                    sl[i].attr('href',newLink)
                    sl[i].on('click',function(e){
                        e.preventDefault();
                        location.href = newLink;
                    })
                } else if(sl[i][0].nodeName === 'INPUT'){
                    sl[i].remove()
                    $('#edit-slug-box a.button.button-small').eq(1).remove()
                }
            }
            function makeLive(string) {
                string = string.replace("site-20000-prod-ladc1.ladc1","www");
                string = string.replace("site-19002-stg-nydc1.nydc1","www2");
                return string;
            }
        })(jQuery)
    </script>
    <div>
        <p>1. Webinar Key</p>
        <div>
            <input type="text" name="webinarKey" value="<?php echo ( $post_webinar_metabox->webinarKey ? $post_webinar_metabox->webinarKey : null ); ?>"  style="width:100% !important" placeholder="Ex. 1234567890123456789" />
        </div>
        <p>2. Submit Button Text</p>
        <div>
            <input type="text" name="submitBtnTxt" value="<?php echo ( $post_webinar_metabox->submitBtnTxt ? $post_webinar_metabox->submitBtnTxt : 'Register Me' ); ?>"  style="width:100% !important" />
        </div>
        <p>3. Summary Text</p>
        <?php 
            if( $post_webinar_metabox->webinar_summarytext_tinymce ){
                $summarytext_content = $post_webinar_metabox->webinar_summarytext_tinymce;
            }
            wp_editor( $summarytext_content, 'webinar_summarytext_tinymce', array(
                'wpautop' => true,
                'media_buttons' => true,
                'textarea_rows' => 10,
                'tinymce' => true,
                'quicktags' => true,
                'drag_drop_upload' => true
            ) );
        ?>
        <p>4. Error Message</p>
        <?php 
            if( $post_webinar_metabox->webinar_error_tinymce ){
                $error_content = $post_webinar_metabox->webinar_error_tinymce;
            } else {
                $error_content = '<h3 class="title">There was a problem with your submission.</h3>';
                $error_content .= '<p class="description">Registration request is invalid. Please make sure that all required fields are filled out correctly and then try again.</p>';
            }
            wp_editor( $error_content, 'webinar_error_tinymce', array(
                'wpautop' => true,
                'media_buttons' => true,
                'textarea_rows' => 10,
                'tinymce' => true,
                'quicktags' => true,
                'drag_drop_upload' => true
            ) );
        ?>
        <p>5. Success Message</p>
        <?php 
            if( $post_webinar_metabox->webinar_success_tinymce ){
                $success_content = $post_webinar_metabox->webinar_success_tinymce;
            } else {
                $success_content = '<h3 class="title">We\'ve saved you a spot!</h3>';
                $success_content .= '<p class="description">A confirmation email with information on how to join the webinar has been sent to you.</p>';
                $success_content .= '<p class="questions">Questions? Contact <a href="mailto:selfserve@outbrain.com?subject=GoToWebinar {{dynamic_webinar_title}} Question">selfserve@outbrain.com</a>.</p>';
                $success_content .= '<p>Want more campaign help? Check out our Amplify Help Center <a target="_blank" href="http://help.outbrain.com/?b_id=1524">here</a>.</p>';
            }
            wp_editor( $success_content, 'webinar_success_tinymce', array(
                'wpautop' => true,
                'media_buttons' => true,
                'textarea_rows' => 10,
                'tinymce' => true,
                'quicktags' => true,
                'drag_drop_upload' => true
            ) );
        ?>
        
        
    </div>
    <?php 

}

/**
 * Save the meta when the post is saved.
 *
 * @param int $post_id The ID of the post being saved.
 */
function webinars_save_post( $post_id ) {

   /*
    * We need to verify this came from the our screen and with proper authorization,
    * because save_post can be triggered at other times.
    */

   // Check if our nonce is set.
   if ( ! isset( $_POST['webinar_inner_custom_box_nonce'] ) ) { return $post_id; }

   $nonce = $_POST['webinar_inner_custom_box_nonce'];

   // Verify that the nonce is valid.
   if ( ! wp_verify_nonce( $nonce, 'webinar_inner_custom_box' ) ) { return $post_id; }

   // If this is an autosave, our form has not been submitted, 
   // so we don't want to do anything.
   if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return $post_id; }

   // Check the user's permissions.
   if ( 'post' == $_POST['post_type'] ) {

       if ( ! current_user_can( 'edit_post', $post_id ) ) { return $post_id; }

   }

   /* OK, its safe for us to save the data now. */

   // Sanitize the user input.
   $search = array("\r","\n","\"");
   $replace = array("","","'");
   $mydata = array(
       'webinarKey' => $_POST['webinarKey'],
       'submitBtnTxt' => $_POST['submitBtnTxt'],
       'webinar_summarytext_tinymce' => stripslashes(str_replace($search,$replace,$_POST['webinar_summarytext_tinymce'])),
       'webinar_error_tinymce' => stripslashes(str_replace($search,$replace,$_POST['webinar_error_tinymce'])),
       'webinar_success_tinymce' => stripslashes(str_replace($search,$replace,$_POST['webinar_success_tinymce'])),
   );
   
   // Update the meta field.
   update_post_meta( $post_id, 'post_webinar_metabox-' . $post_id, json_encode( $mydata ) );

}

add_action( 'add_meta_boxes', 'webinars_add_meta_boxes' );
add_action( 'save_post', 'webinars_save_post' );