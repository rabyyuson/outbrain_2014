<?php

/**
 * Template Name: Customer Terms
 *
 * The template for the customer terms page
 * @url: www.outbrain.com/legal/customer-terms
 *
 * -----------------------------------------------------------------------------
 */

get_header(); ?>
<div class="container legal customer-terms" role="main">
    <div class="row hero">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="details">
                    <h1><?php echo strtoupper( $post->post_title ); ?></h1>
                </div>
            </div>
        </div>
    </div>
    <?php
        // Reference the legal page template navigation menu
        include_once( TEMPLATEPATH . '/inc/templates/page-templates/legal/navigation.php' );
    ?>
    <div class="row content navigation-clip">
        <div class="inner clearfix">
            <div class="columns twelve">
                <article>
                    <div class="country-selector">
                        <p>
                            The Terms and Conditions vary according to the country where your billing address is located. Please choose your billing country below to view the appropriate Terms and Conditions.
                            <br/>
                            <br/>
                            My billing address is located in:
                            <select name="country-list">
                                <option value="us" selected>United States of America</option>
                                <option value="us">Afghanistan</option>
                                <option value="us">Albania</option>
                                <option value="us">Algeria</option>
                                <option value="us">American Samoa</option>
                                <option value="us">Andorra</option>
                                <option value="us">Angola</option>
                                <option value="us">Anguilla</option>
                                <option value="us">Antigua &amp; Barbuda</option>
                                <option value="us">Argentina</option>
                                <option value="us">Armenia</option>
                                <option value="us">Aruba</option>
                                <option value="us">Australia</option>
                                <option value="eu">Austria</option>
                                <option value="us">Azerbaijan</option>
                                <option value="us">Bahamas</option>
                                <option value="us">Bahrain</option>
                                <option value="us">Bangladesh</option>
                                <option value="us">Barbados</option>
                                <option value="eu">Belgium</option>
                                <option value="us">Belize</option>
                                <option value="us">Benin</option>
                                <option value="us">Bermuda</option>
                                <option value="us">Bhutan</option>
                                <option value="us">Bolivia</option>
                                <option value="us">Bonaire</option>
                                <option value="us">Bosnia &amp; Herzegovina</option>
                                <option value="us">Botswana</option>
                                <option value="us">Brazil</option>
                                <option value="us">British Indian Ocean Ter</option>
                                <option value="us">Brunei</option>
                                <option value="eu">Bulgaria</option>
                                <option value="us">Burkina Faso</option>
                                <option value="us">Burundi</option>
                                <option value="us">Cambodia</option>
                                <option value="us">Cameroon</option>
                                <option value="us">Canada</option>
                                <option value="us">Canary Islands</option>
                                <option value="us">Cape Verde</option>
                                <option value="us">Cayman Islands</option>
                                <option value="us">Central African Republic</option>
                                <option value="us">Chad</option>
                                <option value="us">Channel Islands</option>
                                <option value="us">Chile</option>
                                <option value="us">China</option>
                                <option value="us">Christmas Island</option>
                                <option value="us">Cocos Island</option>
                                <option value="us">Colombia</option>
                                <option value="us">Comoros</option>
                                <option value="us">Cook Islands</option>
                                <option value="us">Costa Rica</option>
                                <option value="eu">Croatia</option>
                                <option value="us">Curacao</option>
                                <option value="eu">Cyprus</option>
                                <option value="eu">Czech Republic</option>
                                <option value="eu">Denmark</option>
                                <option value="us">Djibouti</option>
                                <option value="us">Dominica</option>
                                <option value="us">Dominican Republic</option>
                                <option value="us">East Timor</option>
                                <option value="us">Ecuador</option>
                                <option value="us">Egypt</option>
                                <option value="us">El Salvador</option>
                                <option value="us">Equatorial Guinea</option>
                                <option value="us">Eritrea</option>
                                <option value="eu">Estonia</option>
                                <option value="us">Ethiopia</option>
                                <option value="us">Falkland Islands</option>
                                <option value="us">Faroe Islands</option>
                                <option value="us">Fiji</option>
                                <option value="eu">Finland</option>
                                <option value="eu">France</option>
                                <option value="us">French Guiana</option>
                                <option value="us">French Polynesia</option>
                                <option value="us">French Southern Ter</option>
                                <option value="us">Gabon</option>
                                <option value="us">Gambia</option>
                                <option value="us">Georgia</option>
                                <option value="eu">Germany</option>
                                <option value="us">Ghana</option>
                                <option value="us">Gibraltar</option>
                                <option value="us">Great Britain</option>
                                <option value="eu">Greece</option>
                                <option value="us">Greenland</option>
                                <option value="us">Grenada</option>
                                <option value="us">Guadeloupe</option>
                                <option value="us">Guam</option>
                                <option value="us">Guatemala</option>
                                <option value="us">Guinea</option>
                                <option value="us">Guyana</option>
                                <option value="us">Haiti</option>
                                <option value="us">Hawaii</option>
                                <option value="us">Honduras</option>
                                <option value="us">Hong Kong</option>
                                <option value="eu">Hungary</option>
                                <option value="us">Iceland</option>
                                <option value="us">India</option>
                                <option value="us">Indonesia</option>
                                <option value="eu">Ireland</option>
                                <option value="us">Isle of Man</option>
                                <option value="us">Israel</option>
                                <option value="eu">Italy</option>
                                <option value="us">Jamaica</option>
                                <option value="us">Japan</option>
                                <option value="us">Jordan</option>
                                <option value="us">Kazakhstan</option>
                                <option value="us">Kenya</option>
                                <option value="us">Kiribati</option>
                                <option value="us">Korea South</option>
                                <option value="us">Kuwait</option>
                                <option value="us">Kyrgyzstan</option>
                                <option value="us">Laos</option>
                                <option value="eu">Latvia</option>
                                <option value="us">Lesotho</option>
                                <option value="us">Liechtenstein</option>
                                <option value="eu">Lithuania</option>
                                <option value="eu">Luxembourg</option>
                                <option value="us">Macau</option>
                                <option value="us">Macedonia</option>
                                <option value="us">Madagascar</option>
                                <option value="us">Malaysia</option>
                                <option value="us">Malawi</option>
                                <option value="us">Maldives</option>
                                <option value="us">Mali</option>
                                <option value="eu">Malta</option>
                                <option value="us">Marshall Islands</option>
                                <option value="us">Martinique</option>
                                <option value="us">Mauritania</option>
                                <option value="us">Mauritius</option>
                                <option value="us">Mayotte</option>
                                <option value="us">Mexico</option>
                                <option value="us">Midway Islands</option>
                                <option value="us">Moldova</option>
                                <option value="us">Monaco</option>
                                <option value="us">Mongolia</option>
                                <option value="us">Montserrat</option>
                                <option value="us">Morocco</option>
                                <option value="us">Mozambique</option>
                                <option value="us">Nambia</option>
                                <option value="us">Nauru</option>
                                <option value="us">Nepal</option>
                                <option value="us">Netherland Antilles</option>
                                <option value="eu">Netherlands (Holland, Europe)</option>
                                <option value="us">Nevis</option>
                                <option value="us">New Caledonia</option>
                                <option value="us">New Zealand</option>
                                <option value="us">Nicaragua</option>
                                <option value="us">Niger</option>
                                <option value="us">Nigeria</option>
                                <option value="us">Niue</option>
                                <option value="us">Norfolk Island</option>
                                <option value="us">Norway</option>
                                <option value="us">Oman</option>
                                <option value="us">Pakistan</option>
                                <option value="us">Palau Island</option>
                                <option value="us">Palestine</option>
                                <option value="us">Panama</option>
                                <option value="us">Papua New Guinea</option>
                                <option value="us">Paraguay</option>
                                <option value="us">Peru</option>
                                <option value="us">Philippines</option>
                                <option value="us">Pitcairn Island</option>
                                <option value="eu">Poland</option>
                                <option value="eu">Portugal</option>
                                <option value="us">Puerto Rico</option>
                                <option value="us">Qatar</option>
                                <option value="us">Republic of Montenegro</option>
                                <option value="us">Republic of Serbia</option>
                                <option value="us">Reunion</option>
                                <option value="eu">Romania</option>
                                <option value="us">Russia</option>
                                <option value="us">Rwanda</option>
                                <option value="us">St Barthelemy</option>
                                <option value="us">St Eustatius</option>
                                <option value="us">St Helena</option>
                                <option value="us">St Kitts-Nevis</option>
                                <option value="us">St Lucia</option>
                                <option value="us">St Maarten</option>
                                <option value="us">St Pierre &amp; Miquelon</option>
                                <option value="us">St Vincent &amp; Grenadines</option>
                                <option value="us">Saipan</option>
                                <option value="us">Samoa</option>
                                <option value="us">Samoa American</option>
                                <option value="us">San Marino</option>
                                <option value="us">Sao Tome &amp; Principe</option>
                                <option value="us">Saudi Arabia</option>
                                <option value="us">Senegal</option>
                                <option value="us">Serbia</option>
                                <option value="us">Seychelles</option>
                                <option value="us">Sierra Leone</option>
                                <option value="us">Singapore</option>
                                <option value="eu">Slovakia</option>
                                <option value="eu">Slovenia</option>
                                <option value="us">Solomon Islands</option>
                                <option value="us">South Africa</option>
                                <option value="eu">Spain</option>
                                <option value="us">Sri Lanka</option>
                                <option value="us">Sudan</option>
                                <option value="us">Suriname</option>
                                <option value="us">Swaziland</option>
                                <option value="eu">Sweden</option>
                                <option value="us">Switzerland</option>
                                <option value="us">Tahiti</option>
                                <option value="us">Taiwan</option>
                                <option value="us">Tajikistan</option>
                                <option value="us">Tanzania</option>
                                <option value="us">Thailand</option>
                                <option value="us">Togo</option>
                                <option value="us">Tokelau</option>
                                <option value="us">Tonga</option>
                                <option value="us">Trinidad &amp; Tobago</option>
                                <option value="us">Tunisia</option>
                                <option value="us">Turkey</option>
                                <option value="us">Turkmenistan</option>
                                <option value="us">Turks &amp; Caicos Is</option>
                                <option value="us">Tuvalu</option>
                                <option value="us">Uganda</option>
                                <option value="us">Ukraine</option>
                                <option value="us">United Arab Emirates</option>
                                <option value="eu">United Kingdom</option>
                                <option value="us">Uruguay</option>
                                <option value="us">Uzbekistan</option>
                                <option value="us">Vanuatu</option>
                                <option value="us">Vatican City State</option>
                                <option value="us">Venezuela</option>
                                <option value="us">Vietnam</option>
                                <option value="us">Virgin Islands (Brit)</option>
                                <option value="us">Virgin Islands (USA)</option>
                                <option value="us">Wake Island</option>
                                <option value="us">Wallis &amp; Futana Is</option>
                                <option value="us">Yemen</option>
                                <option value="us">Zaire</option>
                                <option value="us">Zambia</option>
                            </select>
                        </p>
                    </div>
                    <div class="loader" style="display:none;"></div>
                    <div class="body-copy">
                        <?php
                            // Start the Loop.
                            while ( have_posts() ) : the_post();
                                the_content();
                            endwhile;
                        ?>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
<?php get_footer();