$('#barcode').keypress(function(e){
	var barc = $(this);
	if ( e.which == 13 ) return false;
    if ( e.which == 13 ) e.preventDefault();
	setTimeout(function(){ barc.select(); },300);	
});

idleTimer = null;
idleState = false;
idleWait = 5000;
$(document).ready(function(){
	$('*').bind('mousemove keydown scroll', function () {
    clearTimeout(idleTimer);
            if (idleState == true) { 
                // Reactivated event
                //$("body").append("<p>Welcome Back.</p>");            
            }
            
            idleState = false;
            
            idleTimer = setTimeout(function () { 
                // Idle Event
                //$("body").append("<p>You've been idle for " + idleWait/1000 + " seconds.</p>");
				$("#barcode").focus().select();
                idleState = true; }, idleWait);
        });
        
        $("body").trigger("mousemove");
});