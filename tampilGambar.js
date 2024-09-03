function sembunyikanDetail(id)
{
	var element = document.getElementById(id);
	element.style.opacity = "1";
}
function tampilkanDetail(id)
{
	var element = document.getElementById(id);
	element.style.opacity = "0.5";
	var xmlhttp;    
	if (id=="")
	{
		document.getElementById("txtHint").innerHTML="";
		return;
	}
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","getDetailGambar.php?id="+id,true);
	xmlhttp.send();
}