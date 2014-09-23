<?php

/**
 * Template Name: Contact
 *
 * The template for the contact page
 * @url: www.outbrain.com/contact
 *
 * -----------------------------------------------------------------------------
 */

get_header(); ?>
<div class="container contact" role="main">
    <div class="row hero">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="details">
                    <h1>We are here to help.</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row content">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="form-selector">
                    <label>Who would you like to contact?</label>
                    <select name="forms">
                        <option>Choose one</option>
                        <option value="sales">Sales</option>
                        <option value="support">Support</option>
                        <option value="marketing">Marketing</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="forms">
                    <div class="form sales">
                        <?php gravity_form(11, false, false, false, null, true, 1); ?>
                    </div>
                    <div class="form support">
                        <?php gravity_form(13, false, false, false, null, true, 2); ?>
                    </div>
                    <div class="form marketing">
                        <?php gravity_form(12, false, false, false, null, true, 3); ?>
                    </div>
                    <div class="form other">
                        <?php gravity_form(14, false, false, false, null, true, 4); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();