<?php

$speakers = get_event_speakers(get_the_ID());
$cpe_credits = get_post_meta(get_the_ID(), 'CPE Credits', true);
$primary_category = get_primary_category(get_the_ID());
$custom_content_by_studioid = get_post_meta(get_the_ID(), 'Custom Content by StudioID', true);
$content_lead_source = get_post_meta( get_the_ID(), 'Content Lead Source', true );
$content_type = get_post_meta( get_the_ID(), 'Content Type', true );
?>

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="landing-page__details">
				<div class="landing-page__sponsor-logo">
					<div class="netsuite-logo">
						<img src="<?php image_url('oracle-netsuite-logo-dark.svg'); ?>" alt="NetSuite">
					</div>
					<div class="cfo-logo">
						<img src="<?php image_url('cfo-logo-dark.svg'); ?>" alt="CFO.com">
					</div>

				</div>
				<h1 class="single__title"><?php the_title(); ?></h1>
				<div class="single__excerpt">
					<?php echo get_short_description(get_the_ID()); ?>

					<?php if ( $custom_content_by_studioid ) : ?>
						<div class="custom-content">
							Custom content for Oracle NetSuite by studioID
						</div>
					<?php endif; ?>
				</div>

				<?php if ($cpe_credits) : ?>
					<div class="event__cpe">Eligible for <?php echo $cpe_credits; ?> CPE Credit<?php echo $cpe_credits == 1 ? '' : 's'; ?></div>
				<?php endif;

				if ( is_event_post( get_the_ID() ) ) : ?>
					<h2>Details</h2>
					<?php if ( get_post_meta(get_the_ID(), 'Event Date', true ) ) : ?>
						<div class="landing-page__date">
							<img src="<?php image_url('icon-calendar-dark.svg'); ?>" alt="Event date">
							Date: <?php echo get_post_meta(get_the_ID(), 'Event Date', true); ?>
						</div>
					<?php endif;
					if ( get_post_meta(get_the_ID(), 'Event Duration', true ) ) : ?>
						<div class="landing-page__duration">
							<img src="<?php image_url('icon-clock-dark.svg'); ?>" alt="Event duration">
							Duration: <?php echo get_post_meta(get_the_ID(), 'Event Duration', true); ?>
						</div>
					<?php endif;

					if ($speakers) : ?>
						<h2>Speakers</h2>
						<div class="landing-page__speakers">
							<?php foreach ($speakers as $speaker) : ?>
								<div class="landing-page__speaker">
									<div class="speaker__image">
										<?php mt_profile_img($speaker->ID, [
											'size' => 'thumbnail',
											'attr' => ['alt' => $speaker->display_name],
											'echo' => true,
										]); ?>
									</div>
									<div class="speaker__details">
										<div class="speaker__name"><?php echo $speaker->display_name; ?></div>
										<div class="speaker__title"><?php echo get_user_meta($speaker->ID, 'title', true); ?></div>
										<div class="speaker__company"><?php echo get_user_meta($speaker->ID, 'company', true); ?></div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

				<?php endif; ?>

				<div class="landing-page__content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="landing-page__form-wrapper">
				<form id="landing-page-form" class="landing-page__form" data-type="<?php echo is_resource_post(get_the_ID()) ? 'resource' : 'event'; ?>">
					<h2 class="title"><?php echo is_resource_post(get_the_ID()) ? get_card_cta_text(get_the_ID()) : 'Register Now'; ?></h2>

					<input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">

					<div class="row">
						<label class="col-md-6 half-width">
							<span>First name</span>
							<input type="text" name="first_name" required>
						</label>
						<label class="col-md-6 half-width">
							<span>Last name</span>
							<input type="text" name="last_name" required>
						</label>
						<label class="col-md-12">
							<span>Business email</span>
							<input type="email" name="email" required>
						</label>
						<label class="col-md-12">
							<span>Job title</span>
							<input type="text" name="job_title" required>
						</label>
						<label class="col-md-12">
							<span>Company name</span>
							<input type="text" name="company_name" required>
						</label>
						<label class="col-md-12">
							<span>Company type</span>
							<select name="companytype" required>
								<option value="" disabled selected>Select company type</option>
								<option value="Advertising Agency">Advertising Agency</option>
								<option value="Bank">Bank</option>
								<option value="Retail">Retail</option>
								<option value="Education">Education</option>
								<option value="Food and Beverage">Food and Beverage</option>
								<option value="Construction">Construction</option>
								<option value="Hospitality and Travel">Hospitality and Travel</option>
								<option value="Utility">Utility</option>
								<option value="Waste">Waste</option>
								<option value="Aerospace">Aerospace</option>
								<option value="Agriculture">Agriculture</option>
								<option value="Automotive">Automotive</option>
								<option value="BioPharma">BioPharma</option>
								<option value="Healthcare">Healthcare</option>
								<option value="Manufacturing">Manufacturing</option>
								<option value="Telecom">Telecom</option>
								<option value="Transportation">Transportation</option>
								<option value="Human Resources Management Firm">Human Resources Management Firm</option>
								<option value="IT/Software Development Firm">IT/Software Development Firm</option>
								<option value="Non-profit">Non-profit</option>
								<option value="Academia, College/University">Academia, College/University</option>
								<option value="Consulting">Consulting</option>
								<option value="Financial Services / Investor">Financial Services / Investor</option>
								<option value="Government/Regulator/Policy Maker">Government/Regulator/Policy Maker</option>
								<option value="Law Firm">Law Firm</option>
								<option value="Media / Analyst / Trade Association / Professional Society">Media / Analyst / Trade Association / Professional Society</option>
								<option value="Recruiting and Staffing Firm">Recruiting and Staffing Firm</option>
								<option value="Other">Other</option>
							</select>
						</label>
						<label class="col-md-12">
							<span>Company revenue</span>
							<select name="company_revenue" required>
								<option value="" disabled selected>Select revenue</option>
								<option value="$1B+">$1B+</option>
								<option value="$501M - $1B">$501M - $1B</option>
								<option value="$250M - $500M">$250M - $500M</option>
								<option value="$100M - $249M">$100M - $249M</option>
								<option value="$10M - $99M">$10M - $99M</option>
								<option value="$2M - $9M">$2M - $9M</option>
								<option value="Less than $2M">Less than $2M</option>
							</select>
						</label>	
						<label class="col-md-12">
							<span>Country</span>
							<select name="country" required>
								<option value="" disabled selected>Select country</option>
								<option value="US">United States</option>
								<option value="AF">Afghanistan</option>
								<option value="AL">Albania</option>
								<option value="DZ">Algeria</option>
								<option value="AS">American Samoa</option>
								<option value="AD">Andorra</option>
								<option value="AO">Angola</option>
								<option value="AI">Anguilla</option>
								<option value="AQ">Antarctica</option>
								<option value="AG">Antigua and Barbuda</option>
								<option value="AR">Argentina</option>
								<option value="AM">Armenia</option>
								<option value="AW">Aruba</option>
								<option value="AU">Australia</option>
								<option value="AT">Austria</option>
								<option value="AZ">Azerbaijan</option>
								<option value="BS">Bahamas</option>
								<option value="BH">Bahrain</option>
								<option value="BD">Bangladesh</option>
								<option value="BB">Barbados</option>
								<option value="BY">Belarus</option>
								<option value="BE">Belgium</option>
								<option value="BZ">Belize</option>
								<option value="BJ">Benin</option>
								<option value="BM">Bermuda</option>
								<option value="BT">Bhutan</option>
								<option value="BO">Bolivia</option>
								<option value="BA">Bosnia and Herzegovina</option>
								<option value="BW">Botswana</option>
								<option value="BV">Bouvet Island</option>
								<option value="BR">Brazil</option>
								<option value="IO">British Indian Ocean Territory</option>
								<option value="BN">Brunei Darussalam</option>
								<option value="BG">Bulgaria</option>
								<option value="BF">Burkina Faso</option>
								<option value="BI">Burundi</option>
								<option value="KH">Cambodia</option>
								<option value="CM">Cameroon</option>
								<option value="CA">Canada</option>
								<option value="CV">Cape Verde</option>
								<option value="KY">Cayman Islands</option>
								<option value="CF">Central African Republic</option>
								<option value="TD">Chad</option>
								<option value="CL">Chile</option>
								<option value="CN">China</option>
								<option value="CX">Christmas Island</option>
								<option value="CC">Cocos (Keeling) Islands</option>
								<option value="CO">Colombia</option>
								<option value="KM">Comoros</option>
								<option value="CG">Congo</option>
								<option value="CD">Congo, the Democratic Republic of the</option>
								<option value="CK">Cook Islands</option>
								<option value="CR">Costa Rica</option>
								<option value="CI">Cote D'Ivoire</option>
								<option value="HR">Croatia</option>
								<option value="CU">Cuba</option>
								<option value="CY">Cyprus</option>
								<option value="CZ">Czech Republic</option>
								<option value="DK">Denmark</option>
								<option value="DJ">Djibouti</option>
								<option value="DM">Dominica</option>
								<option value="DO">Dominican Republic</option>
								<option value="EC">Ecuador</option>
								<option value="EG">Egypt</option>
								<option value="SV">El Salvador</option>
								<option value="GQ">Equatorial Guinea</option>
								<option value="ER">Eritrea</option>
								<option value="EE">Estonia</option>
								<option value="ET">Ethiopia</option>
								<option value="FK">Falkland Islands (Malvinas)</option>
								<option value="FO">Faroe Islands</option>
								<option value="FJ">Fiji</option>
								<option value="FI">Finland</option>
								<option value="FR">France</option>
								<option value="GF">French Guiana</option>
								<option value="PF">French Polynesia</option>
								<option value="TF">French Southern Territories</option>
								<option value="GA">Gabon</option>
								<option value="GM">Gambia</option>
								<option value="GE">Georgia</option>
								<option value="DE">Germany</option>
								<option value="GH">Ghana</option>
								<option value="GI">Gibraltar</option>
								<option value="GR">Greece</option>
								<option value="GL">Greenland</option>
								<option value="GD">Grenada</option>
								<option value="GP">Guadeloupe</option>
								<option value="GU">Guam</option>
								<option value="GT">Guatemala</option>
								<option value="GN">Guinea</option>
								<option value="GW">Guinea-Bissau</option>
								<option value="GY">Guyana</option>
								<option value="HT">Haiti</option>
								<option value="HM">Heard Island and Mcdonald Islands</option>
								<option value="VA">Holy See (Vatican City State)</option>
								<option value="HN">Honduras</option>
								<option value="HK">Hong Kong</option>
								<option value="HU">Hungary</option>
								<option value="IS">Iceland</option>
								<option value="IN">India</option>
								<option value="ID">Indonesia</option>
								<option value="IR">Iran, Islamic Republic of</option>
								<option value="IQ">Iraq</option>
								<option value="IE">Ireland</option>
								<option value="IL">Israel</option>
								<option value="IT">Italy</option>
								<option value="JM">Jamaica</option>
								<option value="JP">Japan</option>
								<option value="JO">Jordan</option>
								<option value="KZ">Kazakhstan</option>
								<option value="KE">Kenya</option>
								<option value="KI">Kiribati</option>
								<option value="KP">Korea, Democratic People's Republic of</option>
								<option value="KR">Korea, Republic of</option>
								<option value="KW">Kuwait</option>
								<option value="KG">Kyrgyzstan</option>
								<option value="LA">Lao People's Democratic Republic</option>
								<option value="LV">Latvia</option>
								<option value="LB">Lebanon</option>
								<option value="LS">Lesotho</option>
								<option value="LR">Liberia</option>
								<option value="LY">Libyan Arab Jamahiriya</option>
								<option value="LI">Liechtenstein</option>
								<option value="LT">Lithuania</option>
								<option value="LU">Luxembourg</option>
								<option value="MO">Macao</option>
								<option value="MK">Macedonia, the Former Yugoslav Republic of</option>
								<option value="MG">Madagascar</option>
								<option value="MW">Malawi</option>
								<option value="MY">Malaysia</option>
								<option value="MV">Maldives</option>
								<option value="ML">Mali</option>
								<option value="MT">Malta</option>
								<option value="MH">Marshall Islands</option>
								<option value="MQ">Martinique</option>
								<option value="MR">Mauritania</option>
								<option value="MU">Mauritius</option>
								<option value="YT">Mayotte</option>
								<option value="MX">Mexico</option>
								<option value="FM">Micronesia, Federated States of</option>
								<option value="MD">Moldova, Republic of</option>
								<option value="MC">Monaco</option>
								<option value="MN">Mongolia</option>
								<option value="MS">Montserrat</option>
								<option value="MA">Morocco</option>
								<option value="MZ">Mozambique</option>
								<option value="MM">Myanmar</option>
								<option value="NA">Namibia</option>
								<option value="NR">Nauru</option>
								<option value="NP">Nepal</option>
								<option value="NL">Netherlands</option>
								<option value="AN">Netherlands Antilles</option>
								<option value="NC">New Caledonia</option>
								<option value="NZ">New Zealand</option>
								<option value="NI">Nicaragua</option>
								<option value="NE">Niger</option>
								<option value="NG">Nigeria</option>
								<option value="NU">Niue</option>
								<option value="NF">Norfolk Island</option>
								<option value="MP">Northern Mariana Islands</option>
								<option value="NO">Norway</option>
								<option value="OM">Oman</option>
								<option value="PK">Pakistan</option>
								<option value="PW">Palau</option>
								<option value="PS">Palestinian Territory, Occupied</option>
								<option value="PA">Panama</option>
								<option value="PG">Papua New Guinea</option>
								<option value="PY">Paraguay</option>
								<option value="PE">Peru</option>
								<option value="PH">Philippines</option>
								<option value="PN">Pitcairn</option>
								<option value="PL">Poland</option>
								<option value="PT">Portugal</option>
								<option value="PR">Puerto Rico</option>
								<option value="QA">Qatar</option>
								<option value="RE">Reunion</option>
								<option value="RO">Romania</option>
								<option value="RU">Russian Federation</option>
								<option value="RW">Rwanda</option>
								<option value="SH">Saint Helena</option>
								<option value="KN">Saint Kitts and Nevis</option>
								<option value="LC">Saint Lucia</option>
								<option value="PM">Saint Pierre and Miquelon</option>
								<option value="VC">Saint Vincent and the Grenadines</option>
								<option value="WS">Samoa</option>
								<option value="SM">San Marino</option>
								<option value="ST">Sao Tome and Principe</option>
								<option value="SA">Saudi Arabia</option>
								<option value="SN">Senegal</option>
								<option value="CS">Serbia and Montenegro</option>
								<option value="SC">Seychelles</option>
								<option value="SL">Sierra Leone</option>
								<option value="SG">Singapore</option>
								<option value="SK">Slovakia</option>
								<option value="SI">Slovenia</option>
								<option value="SB">Solomon Islands</option>
								<option value="SO">Somalia</option>
								<option value="ZA">South Africa</option>
								<option value="GS">South Georgia and the South Sandwich Islands</option>
								<option value="ES">Spain</option>
								<option value="LK">Sri Lanka</option>
								<option value="SD">Sudan</option>
								<option value="SR">Suriname</option>
								<option value="SJ">Svalbard and Jan Mayen</option>
								<option value="SZ">Swaziland</option>
								<option value="SE">Sweden</option>
								<option value="CH">Switzerland</option>
								<option value="SY">Syrian Arab Republic</option>
								<option value="TW">Taiwan, Province of China</option>
								<option value="TJ">Tajikistan</option>
								<option value="TZ">Tanzania, United Republic of</option>
								<option value="TH">Thailand</option>
								<option value="TL">Timor-Leste</option>
								<option value="TG">Togo</option>
								<option value="TK">Tokelau</option>
								<option value="TO">Tonga</option>
								<option value="TT">Trinidad and Tobago</option>
								<option value="TN">Tunisia</option>
								<option value="TR">Turkey</option>
								<option value="TM">Turkmenistan</option>
								<option value="TC">Turks and Caicos Islands</option>
								<option value="TV">Tuvalu</option>
								<option value="UG">Uganda</option>
								<option value="UA">Ukraine</option>
								<option value="AE">United Arab Emirates</option>
								<option value="GB">United Kingdom</option>
								<option value="UM">United States Minor Outlying Islands</option>
								<option value="UY">Uruguay</option>
								<option value="UZ">Uzbekistan</option>
								<option value="VU">Vanuatu</option>
								<option value="VE">Venezuela</option>
								<option value="VN">Viet Nam</option>
								<option value="VG">Virgin Islands, British</option>
								<option value="VI">Virgin Islands, U.s.</option>
								<option value="WF">Wallis and Futuna</option>
								<option value="EH">Western Sahara</option>
								<option value="YE">Yemen</option>
								<option value="ZM">Zambia</option>
								<option value="ZW">Zimbabwe</option>
							</select>
						</label>
					
						<?php if ( $content_lead_source ) { ?>
						<input type="hidden" name="cfocontentleadsource" value="<?php echo $content_lead_source; ?>">
						<?php } ?>

						<?php if ( $content_type ) { ?>
						<input type="hidden" name="cfocontenttype" value="<?php echo $content_type; ?>">
						<?php } ?>

						<div class="col-md-12">
							<label class="checkbox-label">
								<input type="checkbox" required name="single_checkbox">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-width="4" stroke-miterlimit="10" fill="none" d="M22.9 3.7l-15.2 16.6-6.6-7.1"></path>
								</svg>
								By completing this form, you agree to our <a href="https://www.industrydive.com/terms-of-use/" target="_blank" rel="noopener noreferrer">Terms of Use</a>, <a href="https://www.industrydive.com/privacy-policy/" target="_blank" rel="noopener noreferrer">Privacy Policy</a>, and your information being shared with Oracle NetSuite.
							</label>

							<?php get_template_part( 'modules/legal-copy' ); ?>
						</div>
						<div class="col-md-12">
							<button type="submit" class="button button--dark">
								<span class="button__text"><?php echo get_card_cta_text(get_the_ID()); ?></span>
								<span class="button__spinner"></span>
							</button>
						</div>
					</div>
				</form>
				<div class="landing-page__info landing-page__info--resource">
					<div class="message"></div>
					<a target="_blank" href="" class="button button--dark"><?php echo get_card_cta_text(get_the_ID()); ?></a>
				</div>

				<div class="landing-page__info landing-page__info--event">
					<div class="message"></div>
				</div>
			</div>
		</div>
	</div>
</div>