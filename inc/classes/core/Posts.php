<?php

/**
 * Posts Class
 * 
 * Extend the Post post-type and include new functionalities.
 * 
 * -----------------------------------------------------------------------------
 */

namespace Outbrain\Classes\Core;

class Posts {
    
    /**
     * Default constructor
     */
    function __construct() {
        // do nothing
    }
    
    /**
     * Get the class' fully qualified namespace and name
     * @return string
     */
    public static function get_class_full_name(){
        return get_class();
    }
    
    /**
     * Adds the meta box container.
     * Restrict functionality for "post" post-types only.
     */
    public function add_meta_boxes( $post_type ) {
        $post_types = array('post');
        if ( in_array( $post_type, $post_types ) && current_user_can('activate_plugins') ) {
            
            // Create the metabox.
            add_meta_box(
                'post_sidebar_metabox',
                __( 'Other Options', 'post_sidebar_metabox_textdomain' ),
                array( Posts::get_class_full_name(), 'render_meta_box_content' ),
                $post_type,
                'side',
                'high'
            );
        }
    }

    
    /**
    * Render Meta Box content.
    *
    * @param WP_Post $post The post object.
    */
    public function render_meta_box_content( $post ) {

        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'posts_inner_custom_box', 'posts_inner_custom_box_nonce' );

        // Use get_post_meta to retrieve an existing value from the database.
        $subscribe_options = unserialize( get_post_meta( $post->ID, 'post_metabox_other-' . $post->ID, true ) );
        
        // create the tinymce editor
        ?>
        <style>
            .space {
                margin:0;
            }
        </style>
        <div>
            
            <div>
                <p>Content Segment:</p>
                <div>
                    <input type="text" name="subscribe_content_segment" value="<?php echo ( isset( $subscribe_options['subscribe_content_segment'] ) ? $subscribe_options['subscribe_content_segment'] : null ); ?>" style="width:100%; font-size:14px">
                </div>
            </div>
            
            <div style="margin-top:15px;border-top:1px dashed #ddd">
                <p>Show the subscription box?</p>
                <label for="yes_subscribe">Yes</label>
                <input id="yes_subscribe" type="radio" name="subscribe_selection" value="1" <?php echo ( (int)$subscribe_options['subscribe_selection'] === 1 ? 'checked="checked"' : 'checked="checked"' ); ?> />
                <label for="no_subscribe">No</label>
                <input id="no_subscribe" type="radio" name="subscribe_selection" value="2" <?php echo ( (int)$subscribe_options['subscribe_selection'] === 2 ? 'checked="checked"' : null ); ?>  />
            </div>
            
            <div style="margin-top:15px;border-top:1px dashed #ddd">
                <p>Show the pixel redirect iframe code?</p>
                <label for="yes_iframe_code">Yes</label>
                <input id="yes_iframe_code" type="radio" name="iframe_selection" value="1" <?php echo ( (int)$subscribe_options['iframe_selection'] === 1 ? 'checked="checked"' : null ); ?> />
                <label for="no_iframe_code">No</label>
                <input id="no_iframe_code" type="radio" name="iframe_selection" value="0" <?php echo ( (int)$subscribe_options['iframe_selection'] === 0 || !isset( $subscribe_options['iframe_selection'] ) ? 'checked="checked"' : null ); ?>  />
            </div>
            
            <div style="margin-top:15px;border-top:1px dashed #ddd">
                
                <div style="width:100%;font-size:16px;font-weight:bold;margin:1em 0;">Bottom Subscription Box</div>
                
                <input type="text" placeholder="Enter title..." name="subscribe_bottom_title" value="<?php echo ( isset( $subscribe_options['subscribe_bottom_title'] ) ? $subscribe_options['subscribe_bottom_title'] : 'Get Weekly Content Marketing Tips' ); ?>" style="width:100%; font-size:14px">
                <p class="space">&nbsp;</p>
                <textarea style="font-size:14px" name="subscribe_bottom_description" rows="3" cols="27" placeholder="Enter description..."><?php echo ( isset( $subscribe_options['subscribe_bottom_description'] ) ? $subscribe_options['subscribe_bottom_description'] : 'Subscribe to get weekly tips and insights directly to your inbox' ); ?></textarea>
                <p class="space">&nbsp;</p>
                <input placeholder="Enter button text..." type="text" name="subscribe_bottom_button_text" value="<?php echo ( isset( $subscribe_options['subscribe_bottom_button_text'] ) ? $subscribe_options['subscribe_bottom_button_text'] : 'Join Us' ); ?>" style="width:100%; font-size:14px" >
                <p class="space">&nbsp;</p>
                
                <div style="width:100%;font-size:16px;font-weight:bold;margin:0 0 1em 0;">Sidebar Subscription Box</div>
                
                <input type="text" placeholder="Enter title..." name="subscribe_sidebar_title" value="<?php echo ( isset( $subscribe_options['subscribe_sidebar_title'] ) ? $subscribe_options['subscribe_sidebar_title'] : 'Get Weekly Content Marketing Tips' ); ?>" style="width:100%; font-size:14px">
                <p class="space">&nbsp;</p>
                <textarea style="font-size:14px" name="subscribe_sidebar_description" rows="3" cols="27" placeholder="Enter description..."><?php echo ( isset( $subscribe_options['subscribe_sidebar_description'] ) ? $subscribe_options['subscribe_sidebar_description'] : 'Subscribe to get weekly tips and insights directly to your inbox' ); ?></textarea>
                <p class="space">&nbsp;</p>
                <input placeholder="Enter button text..." type="text" name="subscribe_sidebar_button_text" value="<?php echo ( isset( $subscribe_options['subscribe_sidebar_button_text'] ) ? $subscribe_options['subscribe_sidebar_button_text'] : 'Join Us' ); ?>" style="width:100%; font-size:14px" >
                <p class="space">&nbsp;</p>
                
            </div>

        </div>
        <?php
        
    }
    

    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save_post( $post_id ) {

        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */

        // Check if our nonce is set.
        if ( ! isset( $_POST['posts_inner_custom_box_nonce'] ) ) { return $post_id; }

        $nonce = $_POST['posts_inner_custom_box_nonce'];

        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce, 'posts_inner_custom_box' ) ) { return $post_id; }

        // If this is an autosave, our form has not been submitted, 
        // so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return $post_id; }

        // Check the user's permissions.
        if ( 'post' == $_POST['post_type'] ) {

            if ( ! current_user_can( 'edit_post', $post_id ) ) { return $post_id; }

        }

        /* OK, its safe for us to save the data now. */

        // Sanitize the user input.
        $mydata = serialize(array(
            'subscribe_selection' => $_POST['subscribe_selection'],
            'subscribe_content_segment' => $_POST['subscribe_content_segment'],
            'iframe_selection' => $_POST['iframe_selection'],
            'subscribe_bottom_title' => stripslashes($_POST['subscribe_bottom_title']),
            'subscribe_bottom_description' => stripslashes($_POST['subscribe_bottom_description']),
            'subscribe_bottom_button_text' => stripslashes($_POST['subscribe_bottom_button_text']),
            'subscribe_sidebar_title' => stripslashes($_POST['subscribe_sidebar_title']),
            'subscribe_sidebar_description' => stripslashes($_POST['subscribe_sidebar_description']),
            'subscribe_sidebar_button_text' => stripslashes($_POST['subscribe_sidebar_button_text']),
        ));

        // Update the meta field.
        update_post_meta( $post_id, 'post_metabox_other-' . $post_id, $mydata );
    
    }

    
}

// call the after theme setup method
add_action( 'add_meta_boxes', array( Posts::get_class_full_name(), 'add_meta_boxes' ) );

// call the save method
add_action( 'save_post', array( Posts::get_class_full_name(), 'save_post' ) );