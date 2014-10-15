/**
 * Blog Post Editor JS
 *
 * The blog post editor js
 * @url: www.outbrain.com/wp-admin/post.php?post={post_id}&action=edit
 *
 * -----------------------------------------------------------------------------
 */
;(function() {
    
    // Add and initialize the new button
    tinymce.PluginManager.add( 'indented_text_with_rule', function(editor, url) {
        editor.addButton( 'indented_text_with_rule', {
            title : 'Indent text with vertical rule',
            image : 'wp-content/themes/outbrain_2014/images/core/post/tinymce-indented-text-rule.png',
            onclick : function() {
                 editor.selection.setContent( '<div class="text_rule_indent">' + editor.selection.getContent() + '</div>' );
            }
        });
    } );
    tinymce.PluginManager.add( 'tip_box', function(editor, url) {
        editor.addButton( 'tip_box', {
            title : 'Tip Box',
            image : 'wp-content/themes/outbrain_2014/images/core/post/tinymce-tip-box.png',
            onclick : function() {
                 editor.selection.setContent( '<div class="tip_box"><h3>Enter Title here...</h3><p>Enter description here...</p></div>' );
            }
        });
    } );
    
})();