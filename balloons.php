<script type="text/javascript" src="js/balloon.js"> </script>
<script type="text/javascript">

/***********************************************
* Floating image script
***********************************************/

//Step 1: Define unique variable names depending on number of flying images (ie:3):
var flyimage1, flyimage2, flyimage3

function pagestart(){
//Step 2: Using the same variable names as 1), add or delete more of the below lines (60=width, height=80 of image):
 flyimage1=new Chip("flyimage1",47,68);
 flyimage2=new Chip("flyimage2",47,68);
 flyimage3=new Chip("flyimage3",47,68);


//Step 3: Using the same variable names as 1), add or delete more of the below lines:
movechip("flyimage1");
movechip("flyimage2");
movechip("flyimage3");

}

if (window.addEventListener)
window.addEventListener("load", pagestart, false)
else if (window.attachEvent)
window.attachEvent("onload", pagestart)
else if (document.getElementById)
window.onload=pagestart

</script>

<!--Define your flying images-->

	<DIV ID="flyimage1" STYLE="position:absolute; left: -500px; width:47; height:68;">
	<a href="play/game/Men-on.php"><IMG SRC="images/green.png" BORDER=0></a>
	</DIV>

	<DIV ID="flyimage2" STYLE="position:absolute; left: -500px; width:47; height:68;">
	<IMG SRC="images/ora.png" BORDER=0>
	</DIV>

	<DIV ID="flyimage3" STYLE="position:absolute; left: -500px; width:47; height:68;">
	<IMG SRC="images/white.png" BORDER=0>
	</DIV>