<?php

/**
 * The Webinar Information
 * 
 * Displays the Webinar's details
 * 
 * -----------------------------------------------------------------------------
 */

// Get the account data..
$accounts['data'] = get_the_terms( $post->ID, 'webinar-account' );

// Check to see if there are multiple accounts associated with this webinar..
( count( $accounts['data'] ) > 1 ? call_user_func( function(){ echo 'You use multiple accounts! Please only use one and then try again!'; return; }) : false );

// Loop through the accounts adata and look for the category id..
foreach( $accounts['data'] as $k => $v ){ $accounts['term_id'] = $v->term_id; }

// Pull account options..
$accounts['options'] = unserialize( get_option( 'webinar-account_category_options-' . $accounts['term_id'] ) );

// Pull the webinar post meta options..
$post_meta = get_post_meta( $post->ID, 'post_webinar_metabox-' . $post->ID, true );
$post_meta = json_decode($post_meta);

// Require files..
require_once get_template_directory() . '/inc/addons/webinar/classes/GoToWebinar.php';

// Create a new GoToWebinar object and pass the user supplied information..
$webinar = new \Outbrain\Classes\GoToWebinar( array(
    'user_id' => $accounts['options']['gotowebinar-username'],
    'user_password' => $accounts['options']['gotowebinar-password'],
    'webinar_key' => $post_meta->webinarKey,
    'submitBtnTxt' => $post_meta->submitBtnTxt,
    'webinar_error_tinymce' => $post_meta->webinar_error_tinymce,
    'webinar_success_tinymce' => $post_meta->webinar_success_tinymce,
    'citrix_api_key' => $accounts['options']['gotowebinar-consumerKey'],
) );

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">	
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
    <meta NAME="robotos" CONTENT="noindex, nofollow">
    <title>Webinar: <?php echo $webinar->get_the_title(); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/css/style.min.css" />
    <script src="http://use.typekit.net/xsa6cds.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
</head>
<body>
    <div class="container">
        <div class="webinar">
            <div class="inner">
                <?php if( !$webinar->is_registration_form_error() ): ?>
                    <h1 class="title">
                        <?php echo $webinar->get_the_title(); ?>
                    </h1>
                    <div class="date">
                        <div class="date_time">
                            <div class="webinar_local_time">
                                <div class="current">
                                    <?php echo date( 'l, F j, Y', strtotime( $webinar->get_the_start_time() ) )?>
                                    <br/>
                                    <?php echo date( 'g:i', strtotime( $webinar->get_the_start_time() ) )  . ' - ' . date( 'g:i A (T)', strtotime( $webinar->get_the_end_time() ) ); ?>
                                </div>
                                <div class="new-time"></div>
                            </div>
                            <div class="webinar_start_time" value="<?php echo $webinar->get_the_start_time() ?>"></div>
                            <div class="webinar_end_time" value="<?php echo $webinar->get_the_end_time() ?>"></div>
                            <div class="timezone">
                                <a class="ftz" href="javascript:">Find your timezone</a>
                                <select class="tz-control">
                                    <option value="" selected="selected">Choose Your Timezone...</option>
                                    <option value="Pacific/Samoa">(GMT-11:00) Midway Island, Samoa</option>
                                    <option value="Pacific/Honolulu">(GMT-10:00) Hawaii</option>
                                    <option value="America/Anchorage">(GMT-09:00) Alaska</option>
                                    <option value="America/Los_Angeles">(GMT-08:00) Pacific Time (US and Canada);Tijuana</option>
                                    <option value="America/Phoenix">(GMT-07:00) Arizona</option>
                                    <option value="America/Denver">(GMT-07:00) Mountain Time (US and Canada)</option>
                                    <option value="America/Chicago">(GMT-06:00) Central Time (US and Canada)</option>
                                    <option value="America/Mexico_City">(GMT-06:00) Mexico City</option>
                                    <option value="America/New_York">(GMT-05:00) Eastern Time (US and Canada)</option>
                                    <option value="America/Bogota">(GMT-05:00) Bogota, Lima, Quito</option>
                                    <option value="America/Indianapolis">(GMT-05:00) Indiana (East)</option>
                                    <option value="America/Caracas">(GMT-04:00) Caracas, La Paz</option>
                                    <option value="America/Halifax">(GMT-04:00) Atlantic Time (Canada)</option>
                                    <option value="America/Santiago">(GMT-04:00) Santiago</option>
                                    <option value="America/St_Johns">(GMT-03:30) Newfoundland</option>
                                    <option value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
                                    <option value="America/Buenos_Aires">(GMT-03:00) Buenos Aires, Georgetown</option>
                                    <option value="Atlantic/Azores">(GMT-01:00) Azores</option>
                                    <option value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
                                    <option value="GMT">(GMT) Greenwich Mean Time</option>
                                    <option value="Africa/Casablanca">(GMT) Casablanca, Monrovia</option>
                                    <option value="Europe/London">(GMT) Dublin, Edinburgh, Lisbon, London</option>
                                    <option value="Africa/Malabo">(GMT+01:00) West Central Africa</option>
                                    <option value="Europe/Brussels">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                    <option value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                    <option value="Europe/Prague">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                    <option value="Europe/Warsaw">(GMT+01:00) Sarajevo, Skopje, Sofija, Vilnius, Warsaw, Zagreb</option>
                                    <option value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
                                    <option value="Europe/Bucharest">(GMT+02:00) Bucharest</option>
                                    <option value="Europe/Athens">(GMT+02:00) Athens, Istanbul, Minsk</option>
                                    <option value="Africa/Harare">(GMT+02:00) Harare, Pretoria</option>
                                    <option value="Africa/Cairo">(GMT+02:00) Cairo</option>
                                    <option value="Europe/Helsinki">(GMT+02:00) Helsinki, Riga, Tallinn</option>
                                    <option value="Asia/Baghdad">(GMT+03:00) Baghdad</option>
                                    <option value="Asia/Kuwait">(GMT+03:00) Kuwait, Riyadh</option>
                                    <option value="Africa/Nairobi">(GMT+03:00) Nairobi</option>
                                    <option value="Europe/Moscow">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                    <option value="Asia/Tehran">(GMT+03:30) Tehran</option>
                                    <option value="Asia/Tbilisi">(GMT+04:00) Baku,Tbilisi, Yerevan</option>
                                    <option value="Asia/Muscat">(GMT+04:00) Abu Dhabi, Muscat</option>
                                    <option value="Asia/Kabul">(GMT+04:30) Kabul</option>
                                    <option value="Asia/Karachi">(GMT+05:00) Islamabad, Karachi, Tashkent</option>
                                    <option value="Asia/Yekaterinburg">(GMT+05:00) Ekaterinburg</option>
                                    <option value="Asia/Colombo">(GMT+06:00) SriJayawardenepura</option>
                                    <option value="Asia/Calcutta">(GMT+05:30) Calcutta, Chennai, Mumbai, New Delhi</option>
                                    <option value="Asia/Katmandu">(GMT+05:45) Kathmandu</option>
                                    <option value="Asia/Novosibirsk">(GMT+06:00) Almaty, Novosibirsk</option>
                                    <option value="Asia/Dhaka">(GMT+06:00) Astana, Dhaka</option>
                                    <option value="Asia/Rangoon">(GMT+06:30) Rangoon</option>
                                    <option value="Asia/Jakarta">(GMT+07:00) Hanoi, Jakarta</option>
                                    <option value="Asia/Bangkok">(GMT+07:00) Bangkok</option>
                                    <option value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                    <option value="Asia/Taipei">(GMT+08:00) Taipei</option>
                                    <option value="Australia/Perth">(GMT+08:00) Perth</option>
                                    <option value="Asia/Singapore">(GMT+08:00) Kuala Lumpur, Singapore</option>
                                    <option value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                    <option value="Asia/Shanghai">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                    <option value="Asia/Seoul">(GMT+09:00) Seoul</option>
                                    <option value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                    <option value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
                                    <option value="Australia/Darwin">(GMT+09:30) Darwin</option>
                                    <option value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
                                    <option value="Australia/Hobart">(GMT+10:00) Hobart</option>
                                    <option value="Australia/Sydney">(GMT+10:00) Canberra, Melbourne, Sydney</option>
                                    <option value="Pacific/Guam">(GMT+10:00) Guam, Port Moresby</option>
                                    <option value="Asia/Vladivostok">(GMT+10:00) Vladivostok</option>
                                    <option value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
                                    <option value="Asia/Magadan">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
                                    <option value="Pacific/Auckland">(GMT+12:00) Auckland, Wellington</option>
                                    <option value="Pacific/Fiji">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                    <option value="Pacific/Tongatapu">(GMT+13:00) Nukualofa</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <?php echo \Outbrain\Classes\Core\Functions::get_replaced_public_links( wpautop( $post->post_content ) ); ?>
                    </div>
                <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/images/minion.jpg" />
                <?php endif; ?>
            </div>
        </div>
        <div class="registration">
            <div class="inner">
                <img class="logo" src="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/images/outbrain-logo.png" />
                <?php if( $post_meta->webinar_summarytext_tinymce ): ?>
                    <div class="intro-copy">
                        <?php echo $post_meta->webinar_summarytext_tinymce; ?>
                    </div>
                <?php
                    endif;
                    $validate = $webinar->validate_the_registration_form( $_POST );
                    if( $validate['status'] ): echo $validate['html']; else: echo $validate['html'];
                ?>
                <form action="<?php echo get_permalink(); ?>" method="POST" role="form">
                    <?php echo $webinar->get_the_registration_form( $_POST ); ?>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/library/moment/moment.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/library/moment/moment-timezone.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/js/script.min.js"></script>
</body>
</html>