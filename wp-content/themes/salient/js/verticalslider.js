jQuery(document).ready(function(){
// invoke the carousel
jQuery('#myCarousel').carousel({
      interval: false
    });

// scroll slides on mouse scroll 
jQuery('#myCarousel').bind('mousewheel DOMMouseScroll', function(e){

        if(e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) {
            jQuery(this).carousel('prev');
			
        }
        else{
            jQuery(this).carousel('next');
			
        }
    });

//scroll slides on swipe for touch enabled devices 

jQuery("#myCarousel").on("touchstart", function(event){
 
        var yClick = event.originalEvent.touches[0].pageY;
    	jQuery(this).one("touchmove", function(event){

        var yMove = event.originalEvent.touches[0].pageY;
        if( Math.floor(yClick - yMove) > 1 ){
            jQuery(".carousel").carousel('next');
        }
        else if( Math.floor(yClick - yMove) < -1 ){
            jQuery(".carousel").carousel('prev');
        }
    });
    jQuery(".carousel").on("touchend", function(){
        jQuery(this).off("touchmove");
    });
});
    
});
