<?php

/**
 * GoToWebinar Class
 * 
 * The Wordpress to GoToWebinar integration class
 * 
 * -----------------------------------------------------------------------------
 */

namespace Outbrain\Classes;

class GoToWebinar {
    
    // The user data..
    private $_user;
    
    // The GoToWebinar data..
    private $_gotowebinar = array();
    
    // The citrix data..
    private $_citrix = array(
        'access_token_url' => 'https://api.citrixonline.com/oauth/access_token',
        'webinar_url' => 'https://api.citrixonline.com/G2W/rest/'
    );
    
    // The current session.
    private $_session;
    
    // The webinar data.
    private $_webinar = array();
    
    /**
     * Magic __construct.
     * @param array $args
     */
    public function __construct( $args ) {
        
        // Check if user filled out all the required fields..
        if( array_filter( $args ) ){
                        
            // Map out the retrieved array data to the class property.
            $this->_user = array(
                'user_id' => $args['user_id'],
                'user_password' => $args['user_password'],
            );
            $this->_gotowebinar['webinar_key'] = $args['webinar_key'];
            $this->_gotowebinar['submitBtnTxt'] = $args['submitBtnTxt'];
            $this->_gotowebinar['webinar_error_tinymce'] = $args['webinar_error_tinymce'];
            $this->_gotowebinar['webinar_success_tinymce'] = $args['webinar_success_tinymce'];
            $this->_citrix['api_key'] = $args['citrix_api_key'];
            
            // Call the authorize method..
            $this->authorize();
            
            // Call the get_webinar method.
            $this->get_webinar_data();
            
            // Call the get_registration_fields method..
            $this->get_registration_fields_data();
        
        // If the user complete the required fields, then return an error message..
        } else {
            echo 'There was a problem connecting to GoToWebinar using the account details you provided. Please try again...';
            return;
        }
    }
    
    /**
     * Perform the authorization process..
     * return null
     */
    protected function authorize() {
        
        // Do a try/catch block..
        try {
            
            // Initiate a curl session..
            $this->_session['curl_session'] = $cs = curl_init();

            // Stop curl from verifying the peer's certificate..
            curl_setopt( $cs, CURLOPT_SSL_VERIFYPEER, false );

            // Return the transfer as a string of the return value of curl_exec()..
            curl_setopt( $cs, CURLOPT_RETURNTRANSFER, true );

            // Authorization: 
            // Use the Direct Login process so we won't have to log in using the 
            // login prompt. We also use the retrieved access_token for later use.

            // Retrieve the authorization data..
            $authorize['data'] = $this->curl_execute_url( 
                $this->_citrix['access_token_url']. '?grant_type=password&user_id=' . 
                $this->_user['user_id'] . '&password=' . $this->_user['user_password'] . '&client_id=' . 
                $this->_citrix['api_key'],
                false 
            );

            // Assignment:
            // Assign the retrieved GoToWebinar information to the class' properties..
            // These properties will be used later..
            
            // Assign the GoToWebinar organizer key..
            $this->_gotowebinar['organizer_key'] = $authorize['data']['organizer_key'];

            // Assign the GoToWebinar account key..
            $this->_gotowebinar['account_key'] = $authorize['data']['account_key'];

            // Assign the GoToWebinar access token..
            $this->_gotowebinar['access_token'] = $authorize['data']['access_token'];

            // Assign the GoToWebinar refresh token..
            $this->_gotowebinar['refresh_token'] = $authorize['data']['refresh_token'];
                    
            // Set the headers to allow OAuth authentication and pass the 
            // retrieved access token..
            $authorize['headers'] = array(
                'Accept: application/json',
                'Accept: application/vnd.citrix.g2wapi-v1.1+json',
                'Content-type: application/json',
                'Authorization: OAuth oauth_token=' . $authorize['data']['access_token']
            );
            
            // Assign the array of HTTP header fields to set..
            curl_setopt( $cs, CURLOPT_HTTPHEADER, $authorize['headers'] );
            
        // If there are errors..
        } catch( Exception $exception ) {
            
            // Show error message..
            echo 'Error: ' . $exception->getMessage();
            
        }
        
    }
    
    /**
     * Close the curl session.
     */
    protected function close_session() {
        curl_close( $this->_session['curl_session'] );
    }
    
    /**
     * Execute a curl url and return the data as a JSON array data
     * @param resource $session
     * @param string $url
     * @param array $fields
     * @return JSON
     */
    protected function curl_execute_url( $url, $fields ) {

        // Set the URL to fetch..
        curl_setopt( $this->_session['curl_session'], CURLOPT_URL, $url );

        // If we have HTTP POST fields to pass, let's assign them..
        ( $fields ? curl_setopt( $this->_session['curl_session'], CURLOPT_POSTFIELDS, $fields ) : false );

        // Execute the given curl session and decode the returned data as a JSON string.
        $json = json_decode( curl_exec( $this->_session['curl_session'] ), true );

        // Return the JSON string..
        return $json;
    }
    
    /**
     * Get the webinar data..
     * @return none
     */
    protected function get_webinar_data() {
        
        // Get the webinar data and assign it to the class' property..
        $this->_webinar['data'] = $this->curl_execute_url(
            $this->_citrix['webinar_url'] . 'organizers/' . $this->_gotowebinar['organizer_key'] . 
            '/webinars/' . $this->_gotowebinar['webinar_key'], 
            false 
        );
        
        // Get the Webinar date/time and set the default timezone to America/New_York
        date_default_timezone_set( $this->get_the_timezone() );
        
    }
    
    /**
     * Get the webinar registration fields data..
     * @return none
     */
    protected function get_registration_fields_data() {
        
        // Get the registration fields data and assign it to the class' property..
        $this->_webinar['registration_fields'] = $this->curl_execute_url( 
            $this->_citrix['webinar_url'] . 'organizers/' . $this->_gotowebinar['organizer_key'] .
            '/webinars/' . $this->_gotowebinar['webinar_key'] . '/registrants/fields', 
            false 
        );
        
    }
    
    /**
     * Get the webinar subject/title.
     * @return string
     */
    public function get_the_title() {
        
        return $this->_webinar['data']['subject'];
        
    }
    
    /**
     * Get the webinar description/content.
     * @return string
     */
    public function get_the_content() {
        
        return $this->_webinar['data']['description'];
        
    }
    
    /**
     * Get the webinar start time.
     * @return string
     */
    public function get_the_start_time() {
        
        return $this->_webinar['data']['times'][0]['startTime'];
        
    }
    
    /**
     * Get the webinar end time.
     * @return string
     */
    public function get_the_end_time() {
        
        return $this->_webinar['data']['times'][0]['endTime'];
        
    }
    
    /**
     * Get the webinar timezone.
     * @return string
     */
    public function get_the_timezone() {
        
        return $this->_webinar['data']['timeZone'];
        
    }
    
    /**
     * Get the webinar registration url.
     * @return string
     */
    public function get_the_registration_url() {
        
        return $this->_webinar['data']['registrationUrl'];
        
    }
    
    /**
     * Check if there is an error retrieving the registration form.
     * @return boolean.
     */
    public function is_registration_form_error() {
        return ( $this->_webinar['registration_fields']['int_err_code'] || $this->_webinar['registration_fields']['errorCode'] || $this->_webinar['registration_fields']['incident'] ? true : false );
    }

    /**
     * Get the registration form fields..
     * @return string
     */    
    public function get_the_registration_form( $http_post = array() ) {
        
        // Check if there is an issue retrieving the registration form..
        if( $this->is_registration_form_error() ){

            // Build the html string to return.
            $html = '<p><strong>Eh what?! Jerry that didn\'t work!!!</strong></p>';
            $html .= '<p>Ok. Let\'s back up a bit and make sure that you have done the following:</p>';
            $html .= '<ul>';
                $html .= '<li>Entered a valid GoToWebinar username, password, and API consumer key</li>';
                $html .= '<li>Selected a GoToWebinar account</li>';
                $html .= '<li>Entered a correct webinar key</li>';
            $html .= '</ul>';
            $html .= '<p>Please try that and then refresh this page.</p>';
            $html .= '<p>If you are still having problems, please send an email to Raby Yuson ( ryuson@outbrain.com ).</p>';
            
            echo $html;
            
            return;
        }
        
        $_post = ( ( isset( $http_post ) && ! empty( $http_post ) ) ? $http_post : null );
        
        // Prepare the questions and comments field for later use..
        $q_c = '';
        
        // Initialize the fields container.
        $html = '<div class="fields">';
        
            // Iterate through the registration_fields 'fields' array and extract it.
            foreach( $this->_webinar['registration_fields']['fields'] as $k1 => $v1 ) {

                // Check if questions and comments field.
                if( $v1['field'] == 'questionsAndComments' ){
                    
                    // Build the HTML output for Questions and Comments.
                    $q_c .= '<label for="' . $v1['field'] . '">' . ucfirst( preg_replace( '/(?<! )(?<!^)[A-Z]/', ' $0', $v1['field'] ) ) . '</label>';
                    $q_c .= '<textarea id="' . $v1['field'] . '" name="' . $v1['field'] . '" cols="0" rows="3" maxlength="' . $v1['maxSize'] . '">' . $_post[ $v1['field'] ] . '</textarea>';
                    
                } else {
                
                    // Build the HTML to output.
                    $html .= '<div class="field">';
                        $html .= '<label for="' . $v1['field'] . '">' . ucfirst( preg_replace( '/(?<! )(?<!^)[A-Z]/', ' $0', $v1['field'] ) ) . ( $v1['required'] ? '<span class="req">*</span>' : null ) . '</label>';

                        // Find out if a field is an <INPUT> text field
                        if( ! isset( $v1['answers'] ) ){
                            $html .= '<input ' . ( strtolower( $v1['field'] ) === 'email' ? 'type="email"' : 'type="text"' ) . ' id="' . $v1['field'] . '" name="' . $v1['field'] . '" value="' . $_post[ $v1['field'] ] . '" maxlength="' . $v1['maxSize'] . '" ' . ( $v1['required'] ? 'required' : null ) . ' /> ';
                        }

                        // Find out if a field is an <SELECT> options field
                        else {
                            $html .= '<select id="' .  $v1['field']. '" name="' . $v1['field'] . '" ' . ( $v1['required'] ? 'required' : null ) . '>';

                                // Declare the default option.
                                $html .= '<option value="">Choose One...</option>';
                            
                                // Iterate through the answers array..
                                foreach( $v1['answers'] as $k2 => $v2 ){
                                    $html .= '<option value="' . $v2 . '" ' . ( $_post[ $v1['field'] ] == $v2 ? 'selected="selected"' : false ) . '>' . $v2 . '</option>';
                                }

                            $html .= '</select>';
                        }
                    $html .= '</div>';
                    
                }

            }
        
        // Close the fields container.
        $html .= '</div>';
        
        // Initialize the questions container
        $html .= '<div class="questions">';
        
            // Iterate through the registration_fields 'questions' array and extract it.
            foreach( $this->_webinar['registration_fields']['questions'] as $k1 => $v1 ) {

                // Build the HTML to output.
                $html .= '<div class="question">';
                    $html .= '<label for="question_' . $k1 . '">' . $v1['question'] . ( $v1['required'] ? '<span class="req">*</span>' : null ) . '</label>';
                        
                    // Find out if a field is an <INPUT> text field
                    if( $v1['type'] == 'shortAnswer' ){
                        $html .= '<input type="hidden" name="responses[' . $k1 . '][questionKey]" value="' . $v1['questionKey'] . '" />';
                        $html .= '<input type="text" id="question_' . $k1 . '" name="responses[' . $k1 . '][responseText]" value="' . $_post['responses'][$k1]['responseText'] . '" maxlength="' . $v1['maxSize'] . '" ' . ( $v1['required'] ? 'required' : null ) . ' /> ';
                    }

                    // Find out if a field is an <SELECT> options field
                    elseif( $v1['type'] == 'multipleChoice' ) {
                        $html .= '<input type="hidden" name="responses[' . $k1 . '][questionKey]" value="' . $v1['questionKey'] . '" />';
                        $html .= '<select id="question_' . $k1 . '" name="responses[' . $k1 . '][answerKey]" ' . ( $v1['required'] ? 'required' : null ) . '>';
                            // Declare the default option.
                            $html .= '<option value="">Choose One...</option>';
                            
                            // Iterate through the answers array..
                            foreach( $v1['answers'] as $k2 => $v2 ){
                                $html .= '<option value="' . $v2['answerKey'] . '" ' . ( $_post['responses'][$k1]['answerKey'] == $v2['answerKey'] ? 'selected="selected"' : false ) . '>' . $v2['answer'] . '</option>';
                            }

                        $html .= '</select>';
                    }
                $html .= '</div>';

            }
        
        // Close the questions container.
        $html .= '</div>';
        
        // Initialize the questions and comments container..
        $html .= '<div class="questions_comments">';
        
        // Include the questions and comments textarea.
        $html .= $q_c;
        
        // Close the questions and commetns container..
        $html .= '</div>';
        
        // Generate the Submit button
        $html .= '<div class="field submit">';
            $html .= '<input type="submit" value="' . $this->_gotowebinar['submitBtnTxt'] . '" /> ';
        $html .= '</div>';
        
        // Finally return the html..
        return $html;
        
    }
    
    /**
     * Validate the registration form..
     * @param POST data $http_post
     * @return string
     */
    public function validate_the_registration_form( $http_post ) {
        
        // Form Validation 
        if( isset( $http_post ) && ! empty( $http_post ) ){
            
            // Submit registrant information.
            $registrant_data = $this->create_registration( $http_post );
            $status = 0;
            
            // Build the response message..
            $html = '<div class="validation">';
                $html .= '<div class="message">';
                    if( $registrant_data['errorCode'] == 'RegistrationInvalid' ){
                        $html .= '<div class="error">';
                            $html .= $this->_gotowebinar['webinar_error_tinymce'];
                        $html .= '</div>';
                    } elseif( $registrant_data['registrantKey'] ) {
                        $html .= '<div class="success">';
                            $html .= $this->_gotowebinar['webinar_success_tinymce'];
                        $html .= '</div>';
                        $status = 1;
                        
                    }
                $html .= '</div>';
            $html .= '</div>';
            
            // Close the curl session..
            $this->close_session();
            
            return array( 'html' => $html, 'status' => $status );
            
        }
        
    }
    
    /**
     * Create the registrant..
     * @param array $fields
     * @return JSON string
     */
    protected function create_registration( $fields ) {
        
        // Submit registrant information.
        return $this->curl_execute_url(
            $this->_citrix['webinar_url'] . 'organizers/' . $this->_gotowebinar['organizer_key'] .
            '/webinars/' . $this->_gotowebinar['webinar_key'] . '/registrants',
            json_encode( $fields )
        );
        
    }
    
}

