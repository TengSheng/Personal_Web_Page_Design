        window.onload=function(){
				var oBtn1=document.getElementById('id_btn_1');
				var oDiv2=document.getElementById('id_div_2');
				var oBtn2=document.getElementById('id_btn_2');
				var oDiv3=document.getElementById('id_div_3');
				var oBtn3=document.getElementById('id_btn_3');
				var oDiv4=document.getElementById('id_div_4');
				var oBtn4=document.getElementById('id_btn_4');
				var oDiv5=document.getElementById('id_div_5');
				
				oBtn1.onclick=function(){
					if(oDiv2.style.display=='block')
					{
						oDiv2.style.display='none';
					}
					else{
						oDiv2.style.display='block';
						oDiv3.style.display='none';
						oDiv4.style.display='none';
						oDiv5.style.display='none';
					}
				}
				oBtn2.onclick=function(){
					if(oDiv3.style.display=='block')
					{
						oDiv3.style.display='none';
					}
					else{
						oDiv3.style.display='block';
						oDiv2.style.display='none';
						oDiv4.style.display='none';
						oDiv5.style.display='none';
					}
				}
				oBtn3.onclick=function(){
					if(oDiv4.style.display=='block')
					{
						oDiv4.style.display='none';
					}
					else{
						oDiv4.style.display='block';
						oDiv3.style.display='none';
						oDiv2.style.display='none';
						oDiv5.style.display='none';
					}
				}
				oBtn4.onclick=function(){
					if(oDiv5.style.display=='block')
					{
						oDiv5.style.display='none';
					}
					else{
						oDiv5.style.display='block';
						oDiv3.style.display='none';
						oDiv4.style.display='none';
						oDiv2.style.display='none';
					}
				}
				var oBtn5=document.getElementById('id_btn_5');
				
				oBtn5.onclick=function(){
					if(window.confirm('您确定要退出吗？')) {
						top.location = '../unset.php';
					}
				}
		}
        