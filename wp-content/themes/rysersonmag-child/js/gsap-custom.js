gsap.registerPlugin(ScrollTrigger);


//start and end - when x of triggeer element meets x of viewport


ScrollTrigger.matchMedia({
	
  "(min-width: 960px)": function() {
    ScrollTrigger.create({
        trigger: "#timeline",
        start: "top 120px",
        end : "bottom bottom",
        pin: "#timelinepin"
    })
  }
	
}); 

ScrollTrigger.matchMedia({
	
  "(min-width: 960px)": function() {
    ScrollTrigger.create({
        trigger: "#currentIssuePin",
        start: "top 10%",
        end : 1650,
        pin: true
    })
  }
	
}); 