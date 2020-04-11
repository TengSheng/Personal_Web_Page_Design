            function ckPwd2() {  
    		    var pwd1 = document.getElementById('div_id_psw1').value;  
        		var pwd2 = document.getElementById('div_id_psw2').value;  
        		var span1 = document.getElementById("id_span3");  
        		if(pwd2.length<6 || pwd2.length>12) {  
            		span1.innerHTML = "<font size='3' color='red'>密码为6—12个字符</font>";  
            		return false;  
        		}else if(pwd1 != pwd2) {  
         		   span1.innerHTML = "<font size='3' color='red'>密码不一致</font>";  
           		 return false;  
        		}else{  
         		   span1.innerHTML = "<font size='3' color='green'>密码一致</font>";  
           		 return true;  
       		    }  
    		}
            
    		function ckPwd1() {
    			var pwd1 = document.getElementById('div_id_psw1').value;
    			var span2 = document.getElementById("id_span2");
    			if(pwd1.length<6 || pwd1.length>12) {
    				span2.innerHTML = "<font size='3' color='red'>密码为6—12个字符</font>";
    				return false;
    			}else{
    				span2.innerHTML = "<font size='3' color='green'>密码可用</font>";
    				return true;
    			}
    		}
    		
    		function ckUsername() {  
        		var username = document.getElementById('div_id_name').value;  
        		var span1 = document.getElementById("id_span1");  
        		if(username.length<3 || username.length>12) {  
           		    span1.innerHTML = "<font size='3' color='red'>用户名为2—12个字</font>";  
            		return false;  
       		 }else{  
            		span1.innerHTML = "<font size='3' color='green'>用户名可用</font>";  
           		    return true;  
        		}  
    		}
    		function mySubmit() {
    			if(ckUsername() && ckPwd1() && ckPwd2()) {
    				window.location="Log In.html"; 
    			}
    		}
    		
