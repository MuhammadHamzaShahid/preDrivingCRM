  var i=0;
    "use strict";
	jq331(".frst-timeline-img span").click(function(){
    if (jq331(this).parent().parent().hasClass("scale-effect")){
    }
    else{
      i=0;
    }
    jq331(".frst-timeline-style-2 .frst-timeline-block").removeClass("scale-effect");
    jq331(this).parent().parent().find(".frst-timeline-content-inner h2").removeClass("transition-ease");
    jq331(this).parent().parent().find(".frst-timeline-content-inner span").removeClass("transition-ease");
    jq331(this).parent().parent().find(".frst-timeline-content-inner p").removeClass("transition-ease");
		i++;
		if(i%2==0){
    jq331(this).parent().parent().removeClass("scale-effect");
    jq331(this).parent().parent().find(".frst-timeline-content-inner h2").addClass("transition-ease");
    jq331(this).parent().parent().find(".frst-timeline-content-inner span").addClass("transition-ease");
    jq331(this).parent().parent().find(".frst-timeline-content-inner p").addClass("transition-ease");
		}
		if(i%2==1){
    jq331(this).parent().parent().addClass("scale-effect");

		}
	});

jq331(".frst-timeline-style-18 .frst-timeline-content-inner").on("click", function(){
    jq331(".frst-timeline-block").removeClass("active");
    jq331(this).parents(".frst-timeline-block").addClass("active");
})
