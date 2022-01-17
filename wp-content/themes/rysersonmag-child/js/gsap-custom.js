function getCurrentIssueEnd() {
    $stoppingPoint = $('#currentIssueStories').height() - ($('#currentIssuePin').height() + 50);
    return $stoppingPoint;
}

gsap.registerPlugin(ScrollTrigger);

//start and end - when x of triggeer element meets x of viewport


ScrollTrigger.matchMedia({
	
  "(min-width: 960px)": function() {
    ScrollTrigger.create({
        trigger: "#timeline",
        start: "top 95px",
        end : "bottom bottom",
        pin: "#timelinepin"
    })
  }
	
}); 

ScrollTrigger.matchMedia({
	
  "(min-width: 767px)": function() {
    ScrollTrigger.create({
        trigger: "#currentIssuePin",
        start: "top 5%",
        end : getCurrentIssueEnd(),
        pin: true
    })
  }

}); 
