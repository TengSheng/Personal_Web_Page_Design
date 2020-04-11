			window.onload=function(){
				var oSpan0=document.getElementById('id_span_0');
				var oDiv6=document.getElementById('id_div_6');
				var oSpan1=document.getElementById('id_span_1');
				var oDiv2=document.getElementById('id_div_2');
				var oSpan2=document.getElementById('id_span_2');
				var oDiv3=document.getElementById('id_div_3');
				var oSpan3=document.getElementById('id_span_3');
				var oDiv4=document.getElementById('id_div_4');
				var oSpan4=document.getElementById('id_span_4');
				var oDiv5=document.getElementById('id_div_5');
				var oSpan5=document.getElementById('id_span_5');
				var oDiv7=document.getElementById('id_div_7');
				
				var oUl1=document.getElementById('ul_wel');
				var oUl2=document.getElementById('ul_talk');
				var oUl3=document.getElementById('ul_album');
				var oUl4=document.getElementById('ul_jour');
				var oUl5=document.getElementById('ul_leave');
				var oUl6=document.getElementById('ul_friends');
				var time=null;
				
				oUl1.onmouseover=oSpan0.onmouseover=function(){
					clearTimeout(time);
					oDiv6.style.display='block';
					oDiv2.style.display='none';
					oDiv3.style.display='none';
					oDiv4.style.display='none';
					oDiv5.style.display='none';
					oDiv7.style.display='none';
				}
				oUl1.onmouseout=oSpan0.onmouseout=function(){
				    time=setTimeout(function(){oDiv6.style.display='none';},500);			
				}
				oUl2.onmouseover=oSpan1.onmouseover=function(){
					clearTimeout(time);
					oDiv2.style.display='block';
					oDiv6.style.display='none';
					oDiv3.style.display='none';
					oDiv4.style.display='none';
					oDiv5.style.display='none';
					oDiv7.style.display='none';
				}
				oUl2.onmouseout=oSpan1.onmouseout=function(){
				    time=setTimeout(function(){oDiv2.style.display='none';},500);		
				}
				oUl3.onmouseover=oSpan2.onmouseover=function(){
					clearTimeout(time);
					oDiv3.style.display='block';	
					oDiv2.style.display='none';
					oDiv6.style.display='none';
					oDiv4.style.display='none';
					oDiv5.style.display='none';
					oDiv7.style.display='none';
				}
				oUl3.onmouseout=oSpan2.onmouseout=function(){
				    time=setTimeout(function(){oDiv3.style.display='none';},500);			
				}
				oUl4.onmouseover=oSpan3.onmouseover=function(){
					clearTimeout(time);
					oDiv4.style.display='block';
					oDiv2.style.display='none';
					oDiv3.style.display='none';
					oDiv6.style.display='none';
					oDiv5.style.display='none';
					oDiv7.style.display='none';
				}
				oUl4.onmouseout=oSpan3.onmouseout=function(){
				    time=setTimeout(function(){oDiv4.style.display='none';},500);		
				}
				oUl5.onmouseover=oSpan4.onmouseover=function(){
					clearTimeout(time);
					oDiv5.style.display='block';	
					oDiv2.style.display='none';
					oDiv3.style.display='none';
					oDiv4.style.display='none';
					oDiv6.style.display='none';
					oDiv7.style.display='none';
				}
				oUl5.onmouseout=oSpan4.onmouseout=function(){
				    time=setTimeout(function(){oDiv5.style.display='none';},500);		
				}
				oUl6.onmouseover=oSpan5.onmouseover=function(){
					clearTimeout(time);
					oDiv7.style.display='block';	
					oDiv2.style.display='none';
					oDiv3.style.display='none';
					oDiv4.style.display='none';
					oDiv6.style.display='none';
					oDiv5.style.display='none';
				}
				oUl6.onmouseout=oSpan5.onmouseout=function(){
				    time=setTimeout(function(){oDiv7.style.display='none';},500);		
				}
				
//				var oSpan5=document.getElementById('id_input_1');
//				
//				oSpan5.onclick=function(){
//					if(window.confirm('您确定要退出吗？')) {
//						top.location = '../user/user_unset.php';
//					}
//				}	
			}