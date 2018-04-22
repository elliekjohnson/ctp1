
ack.module("ack.widget",function(c){c.init=function(){ack.ui.rc.isVisible=function(){return!1};ack.ui.rc.hide=function(){};ack.ui.rc.toggle();setInterval(function(){for(var b=document.querySelectorAll(".ack .btn"),a=0;a<b.length;a++)(b[a].textContent===ack.lang("Close")||b[a].textContent===ack.lang("close"))&&b[a].parentNode.removeChild(b[a])},250)}});
