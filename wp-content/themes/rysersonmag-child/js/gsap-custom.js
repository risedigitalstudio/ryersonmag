gsap.registerPlugin(ScrollTrigger);


ScrollTrigger.matchMedia({
	
  "(min-width: 960px)": function() {
    ScrollTrigger.create({
        trigger: "#timeline",
        start: "top 120px",
        end : "bottom 900px",
        pin: "#timelinepin"
    })
  }
	
}); 