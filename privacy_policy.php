	<?php
		include_once "dbconnect.inc.php";
		if(isset($_COOKIE['Username'])==""){
			$User_name="";
		}else if(isset($_COOKIE['Username'])!==""){
			$User_name=$_COOKIE['Username'];
		}
		
		if(isset($_COOKIE['Email'])==""){
			$Email="";
		}else if(isset($_COOKIE['Email'])!==""){
			$Email=$_COOKIE['Email'];
		}
		session_start();
		if(!isset($_SESSION['loggedin'])){
			$_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
		}
	?>

	<!--header-->
	<?php require_once "header.php";?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Privacy Policy </li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--faq-->
	<div class="faq-info">
		<div class="container" style="text-ali">
			<div class="title-info">
				<h3 class="title" style="font-family:Orbitron,sans-serif;">Privacy<span> Policy</span></h3>
				<p>At <b>KrisMen Rennsport Private Limited</b>, our attempt is to offer you a safe, protected and reliable environment to play. <b>KrisMen Rennsport Pvt. Ltd.</b> respects your privacy and thus assures you that any information provided by you to www.men-on.com (Real Steal Racing) or any other website developed in the future is protected and will be dealt with according to this Policy. <b>KrisMen Rennsport Pvt. Ltd.</b> shall not provide, distribute, trade, sell or rent your name, e-mail address or other personal information provided on any site owned by <b>KrisMen Rennsport Pvt. Ltd.</b> to any third party or information related to your usage of the Website, except as provided in this Privacy Policy.</p>
			</div>
			<ul class="faq">
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">INFORMATION GATHERED
						<span class="icon"> </span>
					</a>
					<ul>
						<li class="subitem1">
							<p>To avail the facilities offered on <b>KrisMen Rennsport Pvt. Ltd.</b>, you may have to provide certain information to us including your Username, Password and a Valid Email address.</p>
							<p>Additionally, for those of you who wish to participate in any of the tournaments organized by <b>KrisMen Rennsport Pvt. Ltd.</b>, the information that is collected includes Name, Date of Birth, Telephone number, Postal/Contact address, PAN number (as applicable).</p>
							<p>When you visit www.men-on.com (Real Steal Racing) and all other website owned by <b>KrisMen Rennsport Pvt. Ltd.</b>, certain information may also be automatically collected and stored, including the IP address of your computer, browser type and language, the date and the time during which you accessed the site, the address of the website which you may have used to link.</p>
							<p>When you visit www.men-on.com (Real Steal Racing), cookies may be left in your computer. A cookie is a small text file that uniquely identifies your browser. The cookies assigned by the servers of www.men-on.com (Real Steal Racing) may be used to personalize your experience on www.men-on.com (Real Steal Racing). Moreover, cookies may also be used for authentication, game management and security purposes.</p>
							<p>Cookies may also be assigned by the advertisers of <b>KrisMen Rennsport Pvt. Ltd.</b> when you click on any of the advertisements which may be displayed on www.men-on.com (Real Steal Racing) in which case such cookies are controlled by these advertisers and not <b>KrisMen Rennsport Pvt. Ltd.</b></p>
						</li>										
					</ul>
				</li>
				
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">'WWW.MEN-ON.COM' (Real Steal Racing) USES THE COLLECTED INFORMATION
						<span class="icon"> </span>
					</a>
					<ul>
						<li class="subitem1">
							<p>When you register your email address with <b>KrisMen Rennsport Pvt. Ltd.</b>, on any of the websites owned by <b>KrisMen Rennsport Pvt. Ltd.</b> you agree to receive email communication from <b>KrisMen Rennsport Pvt. Ltd.</b>, and other users. You also agree and acknowledge that when you use our referral program for referring someone, <b>KrisMen Rennsport Pvt. Ltd.</b> will send emails to that person on your behalf and the email headers will carry your email address as the address from which such emails are sent.</p>
							<p><b>KrisMen Rennsport Pvt. Ltd.</b> also uses software applications for website traffic analysis and to gather statistics, used for advertising and for determining the efficiency and popularity of the websites owned by <b>KrisMen Rennsport Pvt. Ltd.</b></p>
							<p>The data which is transmitted over the Internet is intrinsically exposed to security risks or threats. For instance, information transmitted via chat or email can be compromised and used by others. Therefore, <b>KrisMen Rennsport Pvt. Ltd.</b> cannot guarantee any security for such information.</p>
							<p>When you register with <b>KrisMen Rennsport Pvt. Ltd.</b>, your account is protected by means of login information which includes a username and a password that is known only to you. Therefore, you are responsible for maintaining the confidentiality of your login information including your username and password. <b>KrisMen Rennsport Pvt. Ltd.</b> is not responsible for any activity which is undertaken when your password is used. Please do not disclose your password to anyone. If you become aware of or reasonably suspect any breach of security, including compromise of your login information, it is your responsibility to immediately notify <b>KrisMen Rennsport Pvt. Ltd.</b></p>
							<p><b>KrisMen Rennsport Pvt. Ltd.</b> may contain links to other websites. Such websites are governed by their own privacy policies and <b>KrisMen Rennsport Pvt. Ltd.</b> does not exercise any control over them. It is your responsibility to read and understand the privacy policy of such websites when you follow a link outside <b>KrisMen Rennsport Pvt. Ltd.</b></p>
							<p><b>KrisMen Rennsport Pvt. Ltd.</b> has a policy of not sharing any personally identifiable information with anyone other than entities specifically authorized by <b>KrisMen Rennsport Pvt. Ltd.</b> which may include advertisers and sponsors of KrisMen Rennsport Pvt. Ltd. However, <b>KrisMen Rennsport Pvt. Ltd.</b> may use your name, Login ID and the state from where you are participating when announcing the results of any contests run on the Website. Such contests are further governed by the Terms and Conditions which shall be available on the website as and when such a contest is run on the website by <b>KrisMen Rennsport Pvt. Ltd.</b></p>
							<p><b>KrisMen Rennsport Pvt. Ltd.</b> conducts periodic analysis and survey of the traffic to for market research and advertising purposes. <b>KrisMen Rennsport Pvt. Ltd.</b> reserves the right to share your registration information with <b>KrisMen Rennsport Pvt. Ltd.</b> appointed market research and advertising companies or firms from time to time for the said purposes. <b>KrisMen Rennsport Pvt. Ltd.</b> may also use cumulative non-personal information for auditing and analysis purposes with the aim of improving its product and services.</p>
							<p>Additionally, <b>KrisMen Rennsport Pvt. Ltd.</b> may share personally identifiable information if sharing of such information is necessary to comply with legal processes or governmental request, or to enforce the Terms of Use and this Privacy Policy, or for prevention of fraud, or for issues involving information security, or to protect your rights or the rights of <b>KrisMen Rennsport Pvt. Ltd.</b> or the rights of the general public.</p>
						</li>										
					</ul>
				</li>
				
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">PROTECTION OF CHILDREN
						<span class="icon"> </span>
					</a>
					<ul>
						<li class="subitem1">
							<p>The Services are not intended for or directed at persons under the age of eighteen (18). Any person who informs us that their age is eighteen (18) years or above, it is our policy to uncover the services which may require us to access and verify the person's Personal Information. If we become aware that a minor has attempted to or has submitted personal information via the Services, We will not accept this information and will take steps to remove such information from our records in a secure manner.</p>
						</li>										
					</ul>
				</li>
				
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">CONSENT
						<span class="icon"> </span>
					</a>
					<ul>
						<li class="subitem1">
							<p>By using our websites, it is understood that you have given your consent to the collection and use of this information by <b>KrisMen Rennsport Pvt. Ltd.</b> and its partners and affiliates.</p>
							<p>In order to play real money games, you will be required to send money to and receive money from us. We may use third-party electronic payment processors and/or financial institutions ('ESPs') to process such financial transactions. By accepting this Privacy Policy, You expressly consent to Personal Information necessary for the processing of transactions being shared with ESPs. We take steps to ensure that our arrangements with ESPs protect your privacy.</p>
							<p>We reserve the right to conduct a security review at any time to validate your identity, age, the registration data provided by you and to verify your use of the Services and your financial transactions for potential breach of Our Terms and Conditions of Use and of applicable law. By using our websites, you authorize Us, Our staff, agents and suppliers to use Your Personal Information and to disclose your Personal Information to third parties for the purposes of validating the information you provide to us.</p>
						</li>										
					</ul>
				</li>
				
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">CONSENT TO USE OF ANTI-CHEATING SOFTWARE
						<span class="icon"> </span>
					</a>
					<ul>
						<li class="subitem1">
							<p>Our software package contains certain features designed to detect use of automated programs that enable artificial (non-human) e.g. Other hacking software/computers etc intelligence to play on our site. Use of such 'bot' software programs violates Our Terms and Conditions of Use, where we deem it detrimental to other players. By installing our software and using the Services, You consent to our software performing the functions described in this section. Our software may perform any or all of the following functions in order to detect the use of illicit automated programs and ensure that we maintain a 'hack free/cheat free' environment for all users: </p>
							<ol  type="a">
								<li>Scan your list of active software applications while you are using the services;</li>
								<li>Scan your list of active processes while you are using the services; and</li>
								<li>Scan the files in your services and site-related program folders to ensure that only 'non-hacked' versions of our software are being used. If any of the foregoing processes reveals a suspect application or process, Our software may scan the files associated with the suspect application or process and compile a composite mesh (i.e., a profile that characterizes the files associated with the application or process) to be matched against profiles for known illicit automated programs. Our software will not perform any random search of large portions of your hard drive, equipment or files, and it will not transmit any information to us or to any third party other than the information you provide to us.</li>
							 </ol>
						</li>										
					</ul>
				</li>
				
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">DISCONNECTIONS AND TECHNICAL ISSUES
						<span class="icon"> </span>
					</a>
					<ul>
						<li class="subitem1">
							<p>In case of any technical failures, server crashes, breakdowns, software defects, disruption or malfunction of service, as a policy, KrisMen Rennsport will cancel the games and refund the amounts after proper verification and no rake will be taken from such games and you accept that KrisMen Rennsport is not responsible to you in all such cases. KrisMen Rennsport Pvt. Ltd is also not liable for any prospective winnings from any incomplete tournament.</p>
							<p>KrisMen Rennsport Pvt. Ltd does not hold any liability to any disconnection, lag, freeze or interference in network on the user's computer or any other external networks. In case of any disruption for an ongoing game due to server crash, the game will be manually cancelled by KrisMen Rennsport Pvt. Ltd and the amount shall be refunded irrespective of the status of the game. For any game, KrisMen Rennsport Pvt. Ltd has the right to cancel and refund the amount. In no case, other than a server crash, KrisMen Rennsport Pvt. Ltd is accountable for any of the player's disconnections from server.</p>
						</li>										
					</ul>
				</li>
				
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">DISCLAIMERS AND INDEMNIFICATION
						<span class="icon"> </span>
					</a>
					<ul>
						<li class="subitem1">
							<p>By registering, you are considered to have accepted and understood all the Terms and conditions. We recommend that you keep a copy of all transactions, rules of playing, cancellation and payment policies. Our failure or delay to act or exercise any right or remedy with respect to a breach of any of these Terms and conditions by You does not surrender Our rights to act with respect to any prior, concurrent, subsequent or similar breaches. Any competition or tournament organized by us on the Website shall be governed by these Terms and conditions and any additional terms and conditions which may be explicitly defined for a competition or tournament.</p>
							<p><b>KrisMen Rennsport Pvt. Ltd.</b> and/or its website solely reserve the right to singly change the terms and conditions and update the same on the website. It is the user's responsibility to check the updated terms and conditions on a regular basis and to decide whether to continue his membership on this website or not. At any point of time you may choose to discontinue the use of our website or any services offered by the company. If you continue to use the Service/product or the Software, you will be responsible for your acceptance of the changes to this Agreement. If any judicial or quasi-judicial body in India declares any of these Terms or condition to be unlawful, invalid, void or unenforceable for any reason, the validity and enforceability of the remaining Terms and conditions will not be affected. Any such inappropriate Term or condition will be replaced with another term that is valid and enforceable and is in most nearly with effect to the original invalid term.</p>
							<p>By agreeing to the terms of use you agree to the fact that the information you have provided to the company, website or affiliate on our website and its affiliates, will be used by the company and its affiliates as considered appropriate. Our methods of gathering information may change from time to time and our privacy policy may be modified too. These changes will be posted on this page. You can always understand the information we collect, how we use it, and under what circumstances we disclose it.</p>
						</li>										
					</ul>
				</li>
				
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">WARRANTY
						<span class="icon"> </span>
					</a>
					<ul>
						<li class="subitem1">
							<p><b>KrisMen Rennsport Pvt. Ltd.</b> any and all Warranties, expressed or implied, in connection with the software, the site and the games, all of which are provided to the user "AS IS". You access and use the website at your sole risk. The Company explicitly disclaims all warranties or conditions of any kind, express, implied or statutory, including without limitation the implied warranties of title, non-infringement, merchantability, and fitness for a particular purpose.</p>
							<p>Without limiting the foregoing, the company does not represent or warrant:</p>
							<ol  type="a">
								<li>the quality, fitness for purpose, completeness, merchantability, non-infringement or accuracy of the software, the site and the games;</li>
								<li>the suitability of the information contained in the documents or other information published on this site;</li>
								<li>continuous, error-free, secure or virus-free operation of www.men-on.com (Real Steal Racing) or its content including software, games, your account or continued operation or availability of any facility on www.men-on.com (Real Steal Racing); </li>
								<li>that the defects in the website will be corrected;</li>
								<li>that the website or the servers that operate the website are free of viruses or other harmful components;</li>
								<li>that the data, results and information within the website will be correct, accurate, adequate, useful, reliable or otherwise; and</li>
								<li>that the website will meet your needs, requirements or expectations.</li>
							</ol>
						</li>										
					</ul>
				</li>
				
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">No person affiliated, or claiming affiliation with the Site has authority to extend such Warranties.
						<span class="icon"> </span>
					</a>
					<ul>
						<li class="subitem1">
							<p>You undertake and agree as under: </p>
							<ol  type="a">
								<li style="text-align: justify;">The Company does not promise or ensure that you will be able to access your account whenever you want. It is entirely possible that you may not be able to access your account or the Services provided by the Company at times or for extended periods of time due to, but not limited to system maintenance and updates;</li>
								<li style="text-align: justify;">You are aware that participation in the games of skill organized by us may result in financial loss to you. With full knowledge of the facts and circumstances surrounding the Activity, you are voluntarily participating in the Activity and assume all responsibility for it and risk resulting from your participation, including all risks of financial loss. The Company makes no guarantees, warranties, representations, or other promises relative to the Activity, and assumes no liability or responsibility for any financial loss that you may sustain as a result of participation in the Activity;</li>
								<li style="text-align: justify;">You agree to indemnify and hold the Company, its employees, directors, officers, and agents harmless with respect to any and all claims and costs associated with your participation in the Activity. You acknowledge that You are solely responsible for any action that arises from Your participation with this Activity or around this Activity, regardless of occurring before, during or after the period of the Activity;</li>
								<li style="text-align: justify;">To hereby save, hold harmless, discharge and release the Company from any and all liability, claims, causes of actions, damages or demands of any kind and nature, whatsoever, that may arise from or in connection with your participation in the Activity;</li>
								<li style="text-align: justify;">You will be solely responsible for any delay and/or damage to your computer systems or loss of data that results from installation of website games or software on Your computer and the website expressly disclaims liability for any such failure delay or failure;</li>
								<li style="text-align: justify;">You are solely responsible for maintaining the confidentiality of your account access credentials (i.e. username & password) and financial instruments (i.e. credit/debit card number).</li>
								<li style="text-align: justify;">You agree to assume the entire risk as to the results and performance of any software and/or games availed by you on KrisMen Rennsport Pvt. Ltd. As such, result and performance among other things depends on your Internet connection and hardware. You also assume the entire cost of all servicing, repair and/or correction of your hardware when you access, download or execute software or games available on KrisMen Rennsport Pvt. Ltd. The Company explicitly disclaims liability for any delay or failure to perform resulting from installation of its games or software on your computer.</li>
								<li style="text-align: justify;">You specifically acknowledge, agree and accept that we are not liable to you for: (i) the defamatory, offensive or illegal conduct of any other player or for anything that turns out to be misleading, inaccurate, defamatory, threatening, obscene or otherwise illegal whether originating from another player or otherwise: (ii) any loss whatsoever arising from the use, abuse or misuse of your account on our Website; (iii) any loss incurred in transmitting information from you to our Website by the internet or by other connecting media; (iv) any technical failures, system breakdowns, defects, delays, interruptions, manipulated or improper data transmission, loss or corruption of data or communications' lines failure, distributed denial of service attacks, viruses or any other adverse technological occurrences arising in connection with your access to or use of our Website; (v) the accuracy, completeness or currency of any information services provided or any statistics shown on the Website;</li>
								<li style="text-align: justify;">You agree to indemnify, defend and hold the Company, harmless from all claims, damages and expenses made by any third party arising out of (a) your content, or (b) your violation of these Terms or Privacy Policy; or (c) use of www.men-on.com (Real Steal Racing) by any other person accessing the Services using your username or password, whether or not with your authorization.</li>
								<li style="text-align: justify;">The Company reserves the right to change, modify or delete the sites, information, and terms & conditions listed on this site at any time without prior notice.</li>
							</ol>
						</li>										
					</ul>
				</li>
				
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">LIMITATION OF LIABILITY
						<span class="icon"> </span>
					</a>
					<ul>
						<li class="subitem1">
							<p>You clearly understand and agree that the company shall under no circumstances (including, without limitation, in contract, negligence or other sort), be liable for any direct, indirect, ancillary, special, incidental, consequential or exemplary damages. This includes, but  is not limited to injury, claim, loss of data, loss of income, loss of profit or loss of opportunity, loss of or damage to property, damages for monetary loss, goodwill, use, data or other  intangible loss (even if the company has been advised of the possibility of such damages), resulting from or arising out of the use of or the inability to use the service, even if we have been advised or become aware of the possibility of such damages or loss or that such loss was foreseeable. You agree to indemnify us against any claims in respect of any such matter.</p>
						</li>										
					</ul>
				</li>
				
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">GOVERNING LAW AND JURISDICTION
						<span class="icon"> </span>
					</a>
					<ul>
						<li class="subitem1">
							<p>This Agreement shall in all respects be governed, interpreted by, and construed in accordance with the laws of India. All disputes, differences, complaints etc., shall be subject to Arbitration under the Indian Arbitration and Conciliation Act, 1996. The arbitrator will be appointed by the company after due consent from the company and the Board of Directors. The place of arbitration shall be Bangalore, Karnataka, India.</p>
							<p>There could be instances where the company is not able to receive prompt updates about the change in applicable laws of your place of stay. Please ensure that any activities you engage on the Website are legal as per the applicable laws. You agree to indemnify and hold harmless the company or its website from any claim, demand, damage, or loss whatsoever coming out due to your non-compliance with the laws of your jurisdiction.</p>
						</li>										
					</ul>
				</li>
				
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">CONTACTING US
						<span class="icon"> </span>
					</a>
					<ul>
						<li class="subitem1">
							<p>In case of any questions or assistance, feel free to contact us any time, In case of any change in your personal information, please contact Customer Service. In case, if you forget your password, or suspect that someone else has learnt and used your password please contact Customer Services. Also, in case of any clarification that you may wish to seek regarding anything, please feel free to contact us through customer services at <b>support@men-on.com<b> </p>
						</li>										
					</ul>
				</li>
				
			</ul>
			<!-- script for tabs -->
			<script type="text/javascript">
				$(function() {
				
					var menu_ul = $('.faq > li > ul'),
						   menu_a  = $('.faq > li > a');
					
					menu_ul.hide();
				
					menu_a.click(function(e) {
						e.preventDefault();
						if(!$(this).hasClass('active')) {
							menu_a.removeClass('active');
							menu_ul.filter(':visible').slideUp('normal');
							$(this).addClass('active').next().stop(true,true).slideDown('normal');
						} else {
							$(this).removeClass('active');
							$(this).next().stop(true,true).slideUp('normal');
						}
					});
				
				});
			</script>
			<!-- script for tabs -->
		</div>			
	</div>			
	<!--//faq-->
	<?php require_once "footer.php"?>