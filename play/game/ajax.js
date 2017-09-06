var ajobj;

function createajax()
{
	if (window.XMLHttpRequest) // Mozilla, Safari,...
	{ajobj = new XMLHttpRequest();} 		
	else if (window.ActiveXObject) // IE
	{ 
			try {ajobj = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) 
			{
				try {ajobj = new ActiveXObject("Microsoft.XMLHTTP");} catch (e) {}
			}
	 }
	else 
	{
		return false;
	}
	return  ajobj;
}
function MakePostRequest(url,parameters,functionname)
{
	ajobj = createajax();
	eval("ajobj.onreadystatechange = "+functionname+";");
	ajobj.open('POST', url, true);
	ajobj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajobj.setRequestHeader("Content-length", parameters.length);
	ajobj.setRequestHeader("Connection", "close");
	ajobj.send(parameters);
	return ajobj;
}
function MakeGetRequest(url,functionname)
{
	ajobj = createajax();
	if(functionname!=null && functionname!="")
	{eval("ajobj.onreadystatechange = "+functionname+";");}
	ajobj.open('GET', url, true);
	ajobj.send(null);
	return ajobj;
}


