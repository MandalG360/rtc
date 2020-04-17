// JavaScript Document
function chkBlnk(field_id, error_Id)
{
	var name=document.getElementById(field_id).value;	
	if(name=="")
	{
		document.getElementById(error_Id).innerHTML="This is required field!";	
	}
	else if(name.length<4)
	{
		document.getElementById(error_Id).innerHTML="Atleast 4 characters";
	}
	else
	{
	document.getElementById(error_Id).innerHTML="";	
	}
}

//check ascii value for name
function chkNum(event, error_Id)
{
	if(!((event.which>=65 && event.which<=90) || (event.which>=97 && event.which<=122) || event.which==0 || event.which==8 ||event.which==32))
	{
		document.getElementById(error_Id).innerHTML="invalid entry";
		return false;
	}
	else{
		document.getElementById(error_Id).innerHTML="";
		return true;
	}
		
}

// Adhar Document check
function Aadhar(field_id, error_Id)
{
	var num = document.getElementById(field_id).value;	
	if(num=="")
	{
		document.getElementById(error_Id).innerHTML="This is required field!";	
	}
	else if(num.length!=12)
	{
		document.getElementById(error_Id).innerHTML="Aadhar number have total 12 digit only!";
	}
	else
	{
	document.getElementById(error_Id).innerHTML="";	
	}
}
// Mobile Document check
function Mobile(field_id, error_Id)
{
	var num = document.getElementById(field_id).value;	
	if(num=="")
	{
		document.getElementById(error_Id).innerHTML="This is required field!";	
	}
	else if(num.length!=10)
	{
		document.getElementById(error_Id).innerHTML="Mobile number require total 10 digit only!";
	}
	else
	{
	document.getElementById(error_Id).innerHTML="";	
	}
}
//check number only
function chkNumOnly(event, error)
{
	if(!(event.which>=48 && event.which<=57))
	{
		document.getElementById(error).innerHTML="invalid entry";
		return false;
	}
	else{
		document.getElementById(error).innerHTML="";
		return true;
	}
}

//chekc email id
function emails()
{
	var x=document.getElementById("f4").value;
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	//alert(atpos+" "+dotpos );
	if(atpos<5 || dotpos<atpos+5)
	{
		document.getElementById("error4").innerHTML="invalid email";
	}
	else
	{
	document.getElementById("error4").innerHTML="";	
	}
}

