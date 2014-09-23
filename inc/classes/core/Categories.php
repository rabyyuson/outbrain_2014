<?php

/**
 * Categories Class
 * 
 * Extend the Categories taxonomy
 * 
 * -----------------------------------------------------------------------------
 */

/**
 * Create the new options
 * 
 * @return null
 */
function category_edit_fields( $category ){ ?>

    <?php
        // Grab the webinar account category options
        $category_options = unserialize( get_option( 'category_meta_options-' . $category->term_id ) );
    ?>
    <style>
        .form-table.newFields input[type=text] {
            border-style: solid;
            border-width: 1px;
            width: 95%;
            border: 1px solid #ddd;
            -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.07);
            box-shadow: inset 0 1px 2px rgba(0,0,0,.07);
            background-color: #fff;
            color: #333;
            -webkit-transition: .05s border-color ease-in-out;
            transition: .05s border-color ease-in-out;
        }
    </style>
    <table class="form-table newFields">
        <tbody>
            <tr>
                <th scope="row" valign="top">
                    <label>Sidebar Subscription Box</label>
                </th>
                <td style="padding-top:20px;">
                    <label for="yes_subscribe">Yes</label>
                    <input id="yes_subscribe" type="radio" name="subscribe_selection" value="1" <?php echo ( (int)$category_options['subscribe_selection'] === 1 ? 'checked="checked"' : 'checked="checked"' ); ?> />
                    <label for="no_subscribe">No</label>
                    <input id="no_subscribe" type="radio" name="subscribe_selection" value="2" <?php echo ( (int)$category_options['subscribe_selection'] === 2 ? 'checked="checked"' : null ); ?>  />
                    <p class="description">Show the Subscription Box?</p>
                    <br/>
                    <input type="text" name="subscribe_content_segment" id="subscribe_content_segment" value="<?php echo ( $category_options['subscribe_content_segment'] ? $category_options['subscribe_content_segment'] : null ); ?>" style="width:100%; font-size:14px" placeholder="Enter content segment...">
                    <p class="description">&nbsp;</p>
                    <input type="text" placeholder="Enter title..." name="subscribe_sidebar_title" value="<?php echo ( isset( $category_options['subscribe_sidebar_title'] ) ? $category_options['subscribe_sidebar_title'] : null ); ?>" style="width:100%; font-size:14px">
                    <p class="space">&nbsp;</p>
                    <textarea style="font-size:14px;width:100%;" name="subscribe_sidebar_description" rows="3" cols="27" placeholder="Enter description..."><?php echo ( isset( $category_options['subscribe_sidebar_description'] ) ? $category_options['subscribe_sidebar_description'] : null ); ?></textarea>
                    <p class="space">&nbsp;</p>
                    <input placeholder="Enter button text..." type="text" name="subscribe_sidebar_button_text" value="<?php echo ( isset( $category_options['subscribe_sidebar_button_text'] ) ? $category_options['subscribe_sidebar_button_text'] : null ); ?>" style="width:100%; font-size:14px" >
                    <p class="space">&nbsp;</p>
                </td>
            </tr>
        </tbody>
    </table>

<?php }

add_action( 'category_edit_form', 'category_edit_fields' );

/**
 * Get the category options and save the category data.
 * 
 * @param int $id
 */
function category_edit( $id ){
    
    $mydata = serialize(array(
        'subscribe_selection' => $_POST['subscribe_selection'],
        'subscribe_content_segment' => $_POST['subscribe_content_segment'],
        'subscribe_sidebar_title' => stripslashes($_POST['subscribe_sidebar_title']),
        'subscribe_sidebar_description' => stripslashes($_POST['subscribe_sidebar_description']),
        'subscribe_sidebar_button_text' => stripslashes($_POST['subscribe_sidebar_button_text']),
    ));

    update_option( 'category_meta_options-' . $id, $mydata );
    
}

add_action( 'edited_category', 'category_edit' );

?>
