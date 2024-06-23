var http_request = false;
      
   function makePOSTRequest(url, parameters) {
      http_request = false;
      if (window.XMLHttpRequest) { // Mozilla, Safari,...
         http_request = new XMLHttpRequest();
         if (http_request.overrideMimeType) {
         	// set type accordingly to anticipated content type
            //http_request.overrideMimeType('text/xml');
            http_request.overrideMimeType('text/html');
         }
      } else if (window.ActiveXObject) { // IE
         try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
            try {
               http_request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
         }
      }
      if (!http_request) {
         alert('Cannot create XMLHTTP instance');
         return false;
      }
      
      http_request.onreadystatechange = alertContents;
      http_request.open('POST', url, true);
      http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      http_request.setRequestHeader("Content-length", parameters.length);
      http_request.setRequestHeader("Connection", "close");
      http_request.send(parameters);
   }

   function alertContents() {
      if (http_request.readyState == 4) {
         if (http_request.status == 200) {//alert(http_request.responseText);
            var result = http_request.responseText;
			result = result.replace(" ","");
			
			//alert(result);
						
			spres = result.split("<~>");
			if (spres[0] == 'GETLGA' || spres[0] == 'GETSUBCAT'){
				result = spres[0];
			}
			
			if(result == "GETLGA"){
			 	document.getElementById('selcity').innerHTML  = '<select name="city" id="city">'+spres[1]+'</select>';
				
			}else if(result == "RegSuccess"){
				loading(0);
				window.location.href = 'confirm.php?success';
				
			}else if(result == "CLOGIN"){
				loading(0);
				window.location.href = 'client/index.php';
				
			}else{
				popup('<red>Notice</red>',result,'','','');				
			}
			
			
			
         } else {
            //alert('There was a problem with the request.');
         }
      }
   }
   
   
   function login(obj) {
	   loading(1);
      var poststr = "username=" + encodeURI(escape(obj.username.value))+
        "&password=" + encodeURI(escape(obj.password.value)) + 
		"&accttype=" + encodeURI(escape(obj.accttype.value)) + 
		"&dwat=signin";
      makePOSTRequest('fxn/index.php', poststr);
   }
   
   function alogin(obj) {
	   loading(1);
      var poststr = "username=" + encodeURI(escape(obj.username.value))+
        "&password=" + encodeURI(escape(obj.password.value)) + 
		"&accttype=" + encodeURI(escape(obj.accttype.value)) + 
		"&dwat=signin";
      makePOSTRequest('../fxn/index.php', poststr);
   }
   
function register(obj) {
    loading(1);
	if (obj.firstname.value == '' || obj.firstname.value == 'First Name:'){popup('<red>Notice</red>',"First Name is required",'','','');}
	else if (obj.lastname.value == '' || obj.lastname.value == 'Last Name:'){popup('<red>Notice</red>',"Last Name is required",'','','');}
	else if (obj.email.value == ''){popup('<red>Notice</red>',"Invalid email address",'','','');}
	else if (obj.phone.value == '' || obj.phone.value == 'Phone:'){popup('<red>Notice</red>',"Phone Number is required",'','','');}
	else if (obj.username.value == '' || obj.username.value == 'Username:'){popup('<red>Notice</red>',"UserName is required",'','','');}
	else if (obj.password.value == '' || obj.password.value == 'Password:'){popup('<red>Notice</red>',"Password is required",'','','');}
	else if (obj.cpassword.value != obj.password.value){popup('<red>Notice</red>',"Password not match",'','','');}
	else if (obj.company.value == '' || obj.company.value == 'Company:'){popup('<red>Notice</red>',"Company is required",'','','');}
	else if (obj.companyaddress.value == '' || obj.companyaddress.value == 'Company Address:'){popup('<red>Notice</red>',"Company address is required",'','','');}
	else{
      var poststr = "firstname=" + encodeURI(escape(obj.firstname.value))+
        "&lastname=" + encodeURI(escape(obj.lastname.value)) + 
		"&email=" + encodeURI(escape(obj.email.value)) + 
		"&phone=" + encodeURI(escape(obj.phone.value)) + 
		"&username=" + encodeURI(escape(obj.username.value)) + 
		"&password=" + encodeURI(escape(obj.password.value)) + 
		"&company=" + encodeURI(escape(obj.company.value)) + 
		"&companyaddress=" + encodeURI(escape(obj.companyaddress.value)) + 
		"&website=" + encodeURI(escape(obj.website.value)) + 
		"&state=" + encodeURI(escape(obj.state.value)) + 
		"&country=" + encodeURI(escape(obj.country.value)) + 
		"&dwat=signup";
      makePOSTRequest('fxn/index.php', poststr);
    }
   }
   
   function selectlga(obj) {
   //alert(obj);
      var poststr = "id=" + encodeURI(escape(obj))+
		"&dwat=getlga";
      makePOSTRequest('proc.php', poststr);
   }
   
   function selectsubcat(obj) {
   	  var poststr = "id=" + encodeURI(escape(obj))+
		"&dwat=getsubcat";
      makePOSTRequest('proc.php', poststr);
   }
   
   
   function tellus(obj) {
      var poststr = "email=" + encodeURI(escape(obj.email.value))+
        "&phone=" + encodeURI(escape(obj.phone.value)) + 
		"&name=" + encodeURI(escape(obj.name.value)) + 
		"&message=" + encodeURI(escape(obj.message.value)) + 
		"&dwat=tellus";
		//alert(obj.message.value);
      makePOSTRequest('proc.php', poststr);
   }
   
     function reLoad(){
	location.reload();  
  }

function winpopup(u,w,h) {
	   if (w == ''){w="width=300";}else{w="width="+w;}
	   if (h == ''){h="height=400";}else{h="height="+h;}
	   if (u == ''){n='../404.html';}
	  window.open(u,"win1",w+","+h+",top=50,left=300,fullscreen=0,location=0,scrollbars=yes,resizable=yes,titlebar=0,toolbar=0,status=0,standard=0,menubar=0");
   }