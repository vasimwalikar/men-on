
	function validate(){
		var Username=document.forms["login"]["Username"].value
		if (Username==null || Username==""){
			alert("Username Cannot Be Left Blank.");
			return false;
		}
		var Password=document.forms["login"]["Password"].value
		if (Password==null || Password==""){
			alert("Password Cannot Be Left Blank.");
			return false;
		}else{
			return true;
		}
		
	}
						