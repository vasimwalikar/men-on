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
				<li class="active">Disclaimer </li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--faq-->
	<div class="faq-info">
		<div class="container" style="text-ali">
			<div class="title-info">
				<h3 class="title" style="font-family:Orbitron,sans-serif;">Disclaimer<span></span></h3>
				<p>KrisMen Rennsport Private Limited is the owner of, and reserves all rights to the assets, content, services, information, and products and graphics in the website except any third party content.</p>
				<p>KrisMen Rennsport Private Limited refuses to acknowledge or represent about the accuracy or completeness or reliability or adequacy of the website's third party content. These content, materials, information, services, and products in this website, including text, graphics, and links, are provided "AS IS" and without warranties of any kind, whether expressed or implied. </p>
				<p>KrisMen Rennsport Private Limited is in no way responsible for any content of any linked site or any link contained in a link site.</p>
				<p>KrisMen Rennsport Private Limited disclaims all warranties, express and implied with regard to the merchantability and fitness for a particular purpose. KrisMen Rennsport Private Limited also does not guarantee that users shall be able to use the website without any interruption which could be leading to loss in continuity.</p>
				<p>Although, KrisMen Rennsport Private Limited shall make reasonable efforts to ensure that the website remains free of viruses or other harmful components. However, KrisMen Rennsport Private Limited does not represent or warrant the website or the server that make the site available to be free of such harmful components. Use of the services of this website is at user's own risk and KrisMen Rennsport Private Limited shall not be responsible for any costs of servicing, repair or correction of users systems. KrisMen Rennsport Private Limited does not endorse the Advertisements hosted on its website. Users responding to advertisements or purchasing any products advertised on Men-on.com (Real Steal Racing) do so at their own risk.</p>
			</div>
		</div>			
	</div>			
	<!--//faq-->
	<?php require_once "footer.php"?>