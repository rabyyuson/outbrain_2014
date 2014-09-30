<!DOCTYPE html>
<html>
<head>
<title>How to create an Outbrain designed webinar</title>
<style>				article,aside,details,figcaption,figure,footer,header,hgroup,nav,section,summary{display:block}audio,canvas,video{display:inline-block;*display:inline;*zoom:1}audio:not([controls]){display:none}[hidden]{display:none}html{font-size:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}html,button,input,select,textarea{font-family:'freight-sans-pro',sans-serif}body{margin:0}a:focus{outline:thin dotted}a:hover,a:active{outline:0}h1{font-size:2em;margin:.67em 0}h2{font-size:1.5em;margin:.83em 0}h3{font-size:1.17em;margin:1em 0}h4{font-size:1em;margin:1.33em 0}h5{font-size:.83em;margin:1.67em 0}h6{font-size:.75em;margin:2.33em 0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:bold}blockquote{margin:1em 40px}dfn{font-style:italic}mark{background:#ff0;color:#000}p,pre{margin:1em 0}pre,code,kbd,samp{font-family:monospace,serif;_font-family:'courier new',monospace;font-size:1em}pre{white-space:pre;white-space:pre-wrap;word-wrap:break-word}q{quotes:none}q:before,q:after{content:'';content:none}small{font-size:75%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-0.5em}sub{bottom:-0.25em}dl,menu,ol,ul{margin:1em 0}dd{margin:0 0 0 40px}menu,ol,ul{padding:0 0 0 40px}nav ul,nav ol{list-style:none;list-style-image:none}img{border:0;-ms-interpolation-mode:bicubic}svg:not(:root){overflow:hidden}figure{margin:0}form{margin:0}fieldset{border:1px solid #c0c0c0;margin:0 2px;padding:.35em .625em .75em}legend{border:0;padding:0;white-space:normal;*margin-left:-7px}button,input,select,textarea{font-size:100%;margin:0;vertical-align:baseline;*vertical-align:middle}button,input{line-height:normal}button,input[type="button"],input[type="reset"],input[type="submit"]{cursor:pointer;-webkit-appearance:button;*overflow:visible}button[disabled],input[disabled]{cursor:default}input[type="checkbox"],input[type="radio"]{box-sizing:border-box;padding:0;*height:13px;*width:13px}input[type="search"]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}input[type="search"]::-webkit-search-decoration,input[type="search"]::-webkit-search-cancel-button{-webkit-appearance:none}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}textarea{overflow:auto;vertical-align:top}table{border-collapse:collapse;border-spacing:0}
	body {
		font:normal normal normal 100%/1.5em Helvetica,Arial,sans-serif;
	}
	img {
		max-width:100%;
		height:auto;
	}
	.main {		
		max-width:960px;
		margin:0 auto;
		padding:2em;
		background-color:#fff;
		border:1px solid #ddd;
	}
	h1 {
		font-size:1.75em;
		margin-bottom:1em;
	}
</style>
</head>
<body>
	<div class="main">
		<h1>How to create an Outbrain designed webinar</h1>
		<ol>
			<li>
				<p>Log into <a href="https://global.gotowebinar.com/" target="_blank">GoToWebinar</a> and click the <b>Schedule a webinar</b> button.
				<br/>Complete all fields (i.e. Title, Description, Start Date, Start Time, End Time, and Webinar Time Zone).
				<br/>Click on the <b>Schedule</b> button.</p>
                                <img style="display:block;" src="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/help/images/schedule.jpg" />
			</li>
			<li>
				<p>Complete the remaining details of this webinar (e.g. add registration fields/questions, customize email, add polls/survey, etc.).. </p>
				<img style="display:block;" src="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/help/images/manage.jpg" />
			</li>
			<li>
				<a name="step3"></a>
				<p>Focus your attention to the browser's address bar URL. Copy the webinar id (i.e. the number sequence located at the end of the address bar url) and store it somewhere (e.g. notepad). We will use this later when we start building the webinar from Wordpress.</p>
				<img style="display:block;" src="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/help/images/webinar_key.jpg" />
			</li>
			<li>
				<p>Log into <a href="http://site-20000-prod-ladc1.ladc1.outbrain.com/wp-admin/" target="_blank">Wordpress</a> and click on the <b>Webinars</b> section.</p>
				<img style="display:block;" src="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/help/images/webinars.jpg" />
			</li>
			<li>
				<a name="step5"></a>
				<p>If you already have a GoToWebinar account, skip to <a href="#step6">step #6</a>, otherwise click on the <b>Setup Accounts</b> link.
				<br/>
				<b>Note:</b> You must have a valid GoToWebinar account set up in <a href="https://global.gotowebinar.com/" target="_blank">GoToWebinar's website</a> before setting up an account here. The details you enter here will only be used to connect to the GoToWebinar API.</p>
				<img style="display:block;" src="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/help/images/setupaccounts.jpg" />
				<p>
					<ol type="a">
						<li>
							<p>Enter a <b>Name</b>, <b>Slug</b> <i>(the account name in lower case mode separated by dash)</i>, and <b>Description</b> of the GoToWebinar account.
							Click on the <b>Add New Account</b> button.</p>
							<img style="display:block;" src="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/help/images/gotowebinar-account.jpg" />
						</li>
						<li>
							<p>Click on the newly created account name <b>link</b>.</p>
							<img style="display:block;" src="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/help/images/created-account.jpg" />
						</li>
						<li>
							<p>Enter your <b>GoToWebinar Username</b> and <b>GoToWebinar Password</b>.
							<br/>For the <b>GoToWebinar API Consumer Key</b>, copy and paste this value:  <span style="background-color:yellow">AckItiDoLAlqDAVvGQqNJFrwMdNJxP2b</span>.
							<br/>Click on the <b>Update</b> button.
							</p>
							<img style="display:block;" src="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/help/images/edit-account.jpg" />
						</li>
					</ol>
				</p>
			</li>
			<li>
				<a name="step6"></a>
				<p>Click on the <b>Add New</b> link.</p>
				<img style="display:block;" src="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/help/images/addnew.jpg" />
			</li>
			<li>
				<p>
				Edit the webinar details (refer to the legend below).
				<br/>
				Once complete, click on the <b>Publish/Update</b> button.
				</p>
				<img style="display:block;" src="<?php echo get_template_directory_uri(); ?>/inc/addons/webinar/help/images/new-webinar.jpg" />
				<p>
					<ol>
						<li><b>Title</b> - the webinar title</li>
						<li><b>Description</b> - the webinar description</li>
						<li><b>Photo/Speaker Name/Title or Position</b> - the webinar's speaker information</li>
						<li><b>GoToWebinar Account</b> - the account you created in <a href="#step5">step #5</a></li>
						<li><b>Webinar Key</b> - the webinar id you copied from <a href="#step3">step #3</a>.</li>
						<li><b>Submit Button text</b> - the submit button text to display on the registration form</li>
						<li><b>Error Message</b> - the error message to display on the registration form</li>
						<li><b>Success Message</b> - the success message to display on the registration form</li>
					</ol>
				</p>
			</li>
		</ol>
	</div>
</body>
</html>