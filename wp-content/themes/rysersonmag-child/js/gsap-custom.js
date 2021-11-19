gsap.registerPlugin(ScrollTrigger);


ScrollTrigger.create({
    trigger: "#timeline",
    start: "top 120px",
    end : "bottom 900px",
    pin: "#timelinepin"
})



