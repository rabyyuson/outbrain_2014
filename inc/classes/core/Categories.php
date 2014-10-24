<?php

/**
 * Categories Class
 * 
 * Responsible for adding custom functionalities and behavior for the Categories.
 * These functionalities are used across the blog page.
 * 
 * -----------------------------------------------------------------------------
 */

namespace Outbrain\Classes\Core;

class Categories {
    
    /**
     * Magic __construct.
     * @param array $args
     */
    public function __construct( $args ){
        
    }
    
    /**
     * Get the class' fully qualified namespace and name
     * @return string
     */
    public static function get_class_full_name() {
        
        return get_class();
        
    }
    
    /**
     * Add custom fields to the Category edit screen
     * @param object $category
     * @return null
     */
    public function category_edit_form( $category ) {
        
        // Grab the category options
        $category_options = unserialize( get_option( 'category_meta_options_' . $category->term_id ) );
        ?>

        <style>
            .form-table.new-fields input[type=text] {
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
        <table class="form-table new-fields">
            <tbody>
                <tr>
                    <th scope="row" valign="top">
                        <label>Other Options</label>
                    </th>
                    <td style="padding-top:20px;">
                        <label for="yes_feature">Yes</label>
                        <input id="yes_feature" type="radio" name="feature_category" value="1" <?php echo ( (int)$category_options['feature_category'] === 1 ? 'checked="checked"' : false ); ?> />
                        <label for="no_feature">No</label>
                        <input id="no_feature" type="radio" name="feature_category" value="0" <?php echo ( (int)$category_options['feature_category'] === 0 && !(int)$category_options['feature_category'] ? 'checked="checked"' : false ); ?>  />
                        <p class="description">Feature this Category? (Note: You need a post associated with this Category for this to show in the Featured area)</p>
                        <p style="margin:10px 0;"></p>
                        <input style="width:60px" type="text" name="order_category" value="<?php echo ( $category_options['order_category'] ? $category_options['order_category'] : '' ); ?>" placeholder="ex. 1" />
                        <p class="description">Enter the order of this category (0 being the first position).</p>
                    </td>
                </tr>
            </tbody>
        </table>

    <?php return;
    
    }
    
    /**
     * Save the category options
     * @param int $id
     * @return null
     */
    public function edited_category( $id ){

        $data = serialize( array(
            'feature_category' => $_POST[ 'feature_category' ],
            'order_category' => $_POST[ 'order_category' ],
        ));

        update_option( 'category_meta_options_' . $id, $data );
        
        return;

    }


}

add_action( 'category_edit_form', array( Categories::get_class_full_name(), 'category_edit_form' ) );
add_action( 'edited_category', array( Categories::get_class_full_name(), 'edited_category' ) );
