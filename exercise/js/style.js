function formvalidation(){
	var name=document.getElementById("name").value;
	var email=document.getElementById("email").value;
	var phone=document.getElementById("phone").value;
	var password=document.getElementById("password").value;
	var namepattern= /^[A-Za-z]{4,25}$/;
	var emailpattern=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var phonepattern=/^\d{10}$/;
	var passwordpattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
	
	
	if(!name || !email || !phone|| !password){
		alert("all fields are required");
		return false;
	}
	else if(!name.match(namepattern)){
		alert("enter the valid name");
		return false;
	}
	else if(!phone.match(phonepattern)){
		alert("enter the valid phone");
		return false;
	}
	else if(!email.match(emailpattern)){
		alert("enter the valid email");
		return false;
	}
	
	else if(!password.match(passwordpattern)){
		alert("enter the valid password");
		return false;
	}
	else{
	alert("form submited");
	}
}