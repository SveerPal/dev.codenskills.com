


$('.screenshot_slider').owlCarousel({
    loop: true,
    margin:20,
    center:true,
    responsiveClass: true,
    nav: true,    
    autoplayTimeout: 4000,
    smartSpeed: 400,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2
        },
        800: {
            items: 2
        },
        900: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
});

/****************************/


$('#astrology').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        700:{
            items:3
        },
        1000:{
            items:4
        },
        1100:{
            items:4
        },
        1200:{
            items:4
        },
        1400:{
            items:5
        }
    }
}) 




$('#product').owlCarousel({
    loop:true,
    margin:16,
    nav:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        400:{
            items:1
        },
        500:{
            items:2
        },
        1000:{
            items:3
        },
        1100:{
            items:3
        },
        1200:{
            items:4
        },
        1300:{
            items:5
        }
    }
}) 


/* JavaScript to animate the 
counters sequentially*/
	
function animateCounters() { 
	const counters = 
		document 
			.querySelectorAll(".counter"); 
	counters 
		.forEach((counter, index) => { 
			const target = 
				parseInt(counter 
					.getAttribute( 
						"data-target") 
				); 
			const duration = 1000; 
			const step = 
				Math.ceil( 
					(target / duration) * 15 
				); 
			let current = 0; 

			const updateCounter = () => { 
				current += step; 
				if (current <= target) { 
					counter 
						.innerText = current; 
					requestAnimationFrame(updateCounter); 
				} else { 
					counter.innerText = target; 
				} 
			}; 

			setTimeout(() => { 
				updateCounter(); 
			}, index * 1000); 
			// Delay each counter by 1 second 
		}); 
} 

animateCounters();

