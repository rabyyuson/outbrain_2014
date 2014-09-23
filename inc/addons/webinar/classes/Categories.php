<?php

/**
 * Extend Accounts (Categories)
 * 
 * Add some options in the Webinars post type 
 * 
 * -----------------------------------------------------------------------------
 */

/**
 * Create the new options
 * 
 * @return null
 */
function edit_category_fields( $category ){ ?>

    <?php
        // Grab the webinar account category options
        $category_options = unserialize( get_option( 'webinar-account_category_options-' . $category->term_id ) );
    ?>
    <style>
        .form-table.newFields input {
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
                    <label for="gotowebinar-username">GoToWebinar Username</label>
                </th>
                <td>
                    <input name="gotowebinar-username" id="gotowebinar-username" type="text" value="<?php echo ( $category_options['gotowebinar-username'] ? $category_options['gotowebinar-username'] : null ); ?>">
                    <p class="description">The GoToWebinar username/user-id</p>
                </td>
            </tr>
            <tr>
                <th scope="row" valign="top">
                    <label>GoToWebinar Password</label>
                </th>
                <td>
                    <input name="gotowebinar-password" id="gotowebinar-password" type="password" value="<?php echo ( $category_options['gotowebinar-password'] ? $category_options['gotowebinar-password'] : null ); ?>">
                    <p class="description">The GoToWebinar password</p>
                </td>
            </tr>
            <tr>
                <th scope="row" valign="top">
                    <label>GoToWebinar API Consumer Key</label>
                </th>
                <td>
                    <input name="gotowebinar-consumerKey" id="gotowebinar-consumerKey" type="text" value="<?php echo ( $category_options['gotowebinar-consumerKey'] ? $category_options['gotowebinar-consumerKey'] : null ); ?>">
                    <p class="description">The GoToWebinar API Consumer Key (application consumer key)</p>
                </td>
            </tr>
        </tbody>
    </table>

<?php }

add_action( 'webinar-account_edit_form', 'edit_category_fields' );

/**
 * Get the category options and save the category data.
 * 
 * @param int $id
 */
function edit_category( $id ){
    
    // Declare the option name.
    $option_name = 'webinar-account_category_options-' . $id ;
    
    // Pull the category options.
    $category_options = unserialize( get_option( 'webinar-account_category_options' ) );
    
    // Pull the form data and save it to the category options array.
    $category_options['gotowebinar-username'] = $_POST['gotowebinar-username'];
    $category_options['gotowebinar-password'] = $_POST['gotowebinar-password'];
    $category_options['gotowebinar-consumerKey'] = $_POST['gotowebinar-consumerKey'];
    
    // Serialize the array data and save it to a variable.
    $save_options = serialize( $category_options );

    // If the option exists then update the option.
    if ( get_option( $option_name ) !== false ) {

        update_option( $option_name, $save_options );

    // If the option does not exist then create the option.
    } else {

        add_option( $option_name, $save_options, null, true );
    }
    
}

add_action( 'created_webinar-account', 'edit_category' );
add_action( 'edited_webinar-account', 'edit_category' );

?>
