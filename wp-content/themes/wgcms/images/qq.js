function CloseQQ() {
	document.getElementById("qq_show_big").style.display="none";
}

function showQQ() {
	document.getElementById("qq_show_big").style.display="block";
}
    var tips; var theTop = 185/*???,??*/; var old = theTop;
    function initFloatTips() {
      tips = document.getElementById('divStayTopleft');
      moveTips();
    };
    function moveTips() {
      var tt=50;
      if (window.innerHeight) {
        pos = window.pageYOffset
      }
      else if (document.documentElement && document.documentElement.scrollTop) {
        pos = document.documentElement.scrollTop
      }
      else if (document.body) {
        pos = document.body.scrollTop;
      }

      pos=pos-tips.offsetTop+theTop;
      pos=tips.offsetTop+pos/10;
    	
      if (pos < theTop) pos = theTop;
      if (pos != old) {
        tips.style.top = pos+"px";
        tt=10;
	        //alert(tips.style.top);
      }
    	
      old = pos;
      setTimeout(moveTips,tt);
    }
    //!]]>
    initFloatTips();