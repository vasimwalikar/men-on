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

	<?php require_once "header.php";?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Terms of Services </li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--faq-->
	<div class="faq-info">
		<div class="container" style="text-ali">
			<div class="title-info">
				<h3 class="title" style="font-family:Orbitron,sans-serif;">Terms of<span> Services</span></h3>
				<p style="text-align:center;">A real game in the UNREAL WORLD</p>
			</div>
			<ul class="faq">
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">DEFINITIONS AND GETTING STARTED<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>The terms of use is an agreement between KrisMen Rennsport Pvt. Ltd. and all its subsidiaries, from here on referred to as the "company" (the company could also be referred to as "we", "us", "our" and other such adjectives), including its website www.men-on.com (Real Steal Racing) , from here on is referred to as the "website" and you from here on will be referred as "gamer","you", "your", "user" or "player", "customer".</p>
							<p>The agreement must be read by you (user) completely and well understood before you agree to the terms of use governing any and all relationship in this agreement and terms of services, products or information and there usage, from here on are referred to as "Terms and conditions". The user should read, understand and agree to the terms of use which includes those terms and conditions expressly set out below and those incorporated by reference, which you can access by clicking on the relevant link.</p>
						</li>										
					</ul>
				</li>
				
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">DEFINITION OF "MEMBERSHIP"<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>The Website and its membership are strictly private and in no way should be considered to be public. In order to gain membership to the website enabling the user to play the games offered/ use the software or any other product or services offered by the website, company or its associates, they will have to first register themselves with the website.</p>
							<p>The registration does not guarantee membership, only after the company or its representatives deem fit by their own subjective judgment will they grant membership informing you of the same by sending you an e-mail. The right to grant membership is completely reserved by the company / website and its representatives. Such membership can be terminated by giving instant notice for any subjective reason that they deem fit and by agreeing to the terms of use the user grants its consent for the same.</p>
							<p>The server where the software is installed and the games hosted will be placed in a strictly non-public / confidential area where the access to the server is completely restricted both physically and virtually. Any person/persons or group that will be authorized to access the server where the games are held are not allowed to register themselves as users, thus, not allowed to become members. Such people are not allowed to use the software / play games or use any other product or service provided by the company. This is in the interests of promoting fair play.</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">ACCOUNT CREATION AND MAINTAINANCE<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>You may only have one account on our website from here on referred to as "Account", for which you will register using your own, correct name. You may not use the service by means of another person's account. Should you attempt to open more than one account, under your own name or under any other name, or should you attempt to use the service by means of any other person's account, we will be entitled to close all Your Accounts and bar you from playing games in our website in future immediately. You should ensure that you have read and understood the rules and regulations of the games available through the service, here on referred to as the "games". You agree to abide by the rules and regulations of each of the Games as published and periodically changed on the website.</p>
							<p>The rules that govern the games and services offered by the website form part of the terms and conditions and they will be available under the "Help-> Rules" or similar section on the website. For all rules, however they may or may not be explicitly mentioned on the website. The user is encouraged to seek clarification by using the customer services offered. The determination decided by the company and/or its website will be final and you agree to abide by them by accepting the terms and conditions.
							</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">SHARING OF PASSWORD AND OTHER PLAYER RESPONSIBILITIES<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>Sharing or distribution of the password with any other user/ person/ group or any third party is strictly prohibited. KrisMen Rennsport Pvt. Ltd. is not responsible if your account is accessed or opened by others using your password. You are held legally responsible and liable for all of your activities on the website made from your account. The players admit that they may be exposed to content posted by other users which they may find offensive, obnoxious or indecent and that the website may not be able to prevent such content being posted. Such content should be brought to notice of the website. The website shall act upon the information as it deems acceptable. The decision taken by the management of the company or the website in this regard shall be final and binding on the player and the player specifically agrees that KrisMen Rennsport Pvt. Ltd. will not incur any liability under any circumstance whatsoever regarding the same. You understand that it is your obligation to protect the information you have provided on the website including, but not limited, to usernames, passwords, email addresses, contact details, and telephone numbers. You explicitly understand and agree that we will not incur any liability for information provided by you to anyone which may result in your account on the website being exposed or misused by any other person or any other harm or loss being suffered by you. You are accountable to obey any applicable law, while taking part in any competition or tournament organized through the website. You undertake and agree to indemnify us against any claims, expenses or liabilities suffered by or claimed against us by any person or entity arising out of your non-compliance with any applicable laws.</p>
							<p>You also understand and accept that your mere participation in a game/ tournament/contest available on the website does not create any obligation on us to give you a prize. Your winning a prize is entirely dependent on your skill as a player same as other players in the game/tournament/contest and subject to the rules of the game/ tournament/ contest. You acknowledge that your participation in any game/tournament/contest available on the website is purely voluntary and is at your sole discretion and risk. You understand and acknowledge that once a game/tournament/contest has commenced, not being able to play due to slow internet connections, faulty hardware, internet connection failure, low computer configuration or for any other reason does not attributable to us to a refund of the entry fee you may have paid for participation. You agree, understand and acknowledge that you will use your account with us solely for the purpose of playing on the website and for any other transactions with us which you may have to carry out with respect to your usage of the services. You understand and acknowledge the fact that we are neither a bank nor a financial institution and that the purchases/balance standing to the credit in your account do not accumulate any interest. You also understand and agree that your account maintained with us is purely for the purpose of payment of the entry/ subscription fee to participate in games/tournaments made available on the website and for purchase of products that you may win. You also agree that you are required to furnish your PAN (Permanent Account Number) duly issued to you by the Income Tax Department, Government of India, as the case may be, to deduct TDS as per the rules and regulations of the government of India. You acknowledge that you are making use of the services knowing that you may face a risk of monetary loss, when using the services and that KrisMen Rennsport Pvt. Ltd. shall have no responsibility to you for any such loss that arises in the course of your participation in the services. You may not impersonate another person or user, attempt to get a password, other account information, or other private information from a user, or harvest email addresses or other information. In the event, we have reasonable grounds to believe that your activities include any of the acts specified above, we may initiate appropriate legal proceedings against you as well as notify the relevant regulatory or law enforcement authorities where appropriate, apart from suspending or terminating your privileges for the use of the website. You may not purchase, sell, trade, rent, lease, license, grant a security interest in, or transfer your user account, any content, currency, points, standings, rankings, ratings, or any other attributes appearing in, originating from or associated with the Website or by using any Services. </p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">INTELLECTUAL PROPERTY<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>KrisMen Rennsport Private Limited hold all rights tangible or intangible for the website and all the services offered on the website including but not limited to all games and other content, promotional material, all strategic and development plans, ideas, designs, financial conditions, business plans, data banks, information related to technology and process, the technology developed including the software and methodology of usage from here on referred to as "intellectual Property". The company is only permitting the user to use the Intellectual property to play the games and use other services offered and under all circumstances the user is strictly prohibited to use the intellectual capital otherwise, which includes but is not limited to copying, reproducing or transmitting any media known to / or will be known to human kind of the intellectual property. The user is not being granted any rights whatsoever with respect to the intellectual property by allowing him to play games on the website and use other services on the website.</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">DESCRIPTION OF SERVICES OFFERED<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>KrisMen Rennsport Private Limited is a technology company which through its website www.men-on.com (Real Steal Racing) and others aims at providing technology and IT services to enable online multiplayer gaming in real time. Besides providing technology and IT services to enable online games of skill, the company will also create software and technology to enable play of game of skills on multiple technology platform, real time or otherwise. Such technology will not be sold but the users will be allowed to use it at the sole discretion of the KrisMen Rennsport Private Limited.</p>
							<p>The services provided by the website are only intended to play with skill and for entertainment purpose only. The company is not responsible for any betting or gambling acts that may take place outside the website. </p>
							<p>KrisMen Rennsport Private Ltd. will charge the users for providing such services. A service tax is applicable for the services and the service charge collected at the beginning of each game will include the service tax and other taxes and charges as applicable. The service charge levied is subject to change from time to time and the users will be informed accordingly by answering to such specific request from customer care. We reserve the right to collect service charge at varying rates and at different times and for multiple types of games and other services offered by us. The service charge and applicable taxes may vary as per the changes in the law and we may change the levy of service charge accordingly based on the companyes discretion.</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">SOFTWARE USAGE<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>Commercial use of the Software is strictly forbidden. The User is only allowed to use the Software for his/her personal use. Under no circumstances shall a User be permitted to use his/her account with KrisMen Rennsport Pvt. Ltd. for any purpose other than for playing the Games. You may open only one account per person. KrisMen Rennsport Pvt. Ltd. reserves the right to monitor any effort to establish multiple accounts; in the event KrisMen Rennsport Pvt. Ltd. discovers that you have opened more than one account per person, all additional accounts will be closed immediately without notice and continued violation will result in the termination of any and all of your accounts and KrisMen Rennsport Private Limited may void any associated winnings. The user may not attempt to modify, decompile, reverse-engineer or disassemble the software in any way. The use of artificial intelligence including, without limitation, "robots" is strictly forbidden in connection with the Software and the Games. All actions taken in relation to the Games by a User must be executed personally by the User through the user interface accessible by use of the Software. You agree that KrisMen Rennsport Private Limited may take steps to detect and prevent the use of prohibited EPA Programs. Such action may include, but is not limited to, the examination of software programs running concurrently with the KrisMen Rennsport Private Limited Software on the User's computer</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">FAIRPLAY AND PREVENTION OF COLLUSION AND FRAUD<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>All necessary steps have been taken in order to ensure fair play on the website. We will prevent you from colluding with other players in order to win/loose. When you agree to the terms and conditions mentioned here, you agree that you will not play any game in partnership or by communicating with other players which may give benefit you over other players. In case a player is found involved in such activities, KrisMen Rennsport Pvt. Ltd. has the right to withhold all the funds in the player's account and to cancel and close the account without any prior communication to the player.</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s">
					<a href="#">FAIRPLAY AND PREVENTION OF COLLUSION AND FRAUD<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>When you use our Services, you will be required to send money to us and may be required to receive product/money from us. To process such financial transactions, we may use third-party electronic payment processors or service providers (ESPs). As required, you permanently authorize us to instruct such ESPs to handle Account deposits and withdrawals from your account. You also permanently agree that in accordance with your requests as submitted, we may give such instructions on your behalf. You agree to be certain by the terms and conditions of use of each appropriate ESP. In the event of conflict between these Agreements and the ESP's terms and conditions, these Agreements shall prevail.</p>
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