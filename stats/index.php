<?php require_once "header.php";?>
<?php
      if($_REQUEST['page']!=""){
	$page = explode("/",$_REQUEST['page']);
	//echo "<p align='right'>";
	$folder = $page[0];  $file = $page[1];
	//echo "</p>";
	if($file!=""){
	  require_once "$folder/$file.php";
	  ?>
	    <script src="<?php echo $folder ?>/js/<?php echo $file ?>.js"></script>
	  <?php
	}else{
	  require_once "$folder.php";
	  ?>
	    <script src="js/<?php echo $folder ?>.js"></script>
	  <?php
	}
     }else{
	require_once("stats.php");
	?>
	    <script src="js/home.js"></script>
	  <?php
     }
     
?>

