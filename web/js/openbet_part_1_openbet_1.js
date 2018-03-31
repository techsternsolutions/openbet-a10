$(document).ready(function(){
    $("#video_block").fitVids();

    function showProducts(){
		$('#second_section').removeClass().addClass("products");
		$(".tab-pane").removeClass("fade").removeClass("in").removeClass("active");
		$("#products").addClass("fade in active");
		$('html, body').animate({
        	scrollTop: $(".nav_here").offset().top
    	}, 1000);

    	$(".nav-tabs li").removeClass("active");
    	$(".nav-tabs li.products").addClass("active");

    }

    function scrollToContent(){
    	$('html, body').animate({
        	scrollTop: $(".nav_here").offset().top
    	}, 1000);
    }

    function showSolutions(){
		$('#second_section').removeClass().addClass("solutions");
		$(".tab-pane").removeClass("fade").removeClass("in").removeClass("active");
		$("#solutions").addClass("fade in active");
		$('html, body').animate({
        	scrollTop: $(".nav_here").offset().top
    	}, 1000);
    	$(".nav-tabs li").removeClass("active");
    	$(".nav-tabs li.solutions").addClass("active");
    }
    $('.click_more').on('click', function(){
		scrollToContent();
	});

	$('.products-bt-h').on('click', function(){
		showProducts();
	});

	$('.services-bt-h').on('click', function(){
		showSolutions();

	});
	$('.products-bt-v').on('click', function(){
		showProducts();
	});
	$('.services-bt-v').on('click', function(){
		showSolutions();
	
	});

    $('.f1_container img').on('click', function(){
		var $box = $(this).parent().parent().parent();
		if($box.hasClass('clicked')){$box.removeClass('clicked')}
		else{
			$box.addClass('clicked');
		}
    });
	$('.f1_container .text').on('click', function(){
		var $box = $(this).parent().parent().parent();
		if($box.hasClass('clicked')){$box.removeClass('clicked')}
		else{
			$box.addClass('clicked');
		}
	});

	$('.nav_here li').on('click', function () {
		$('#second_section').removeClass().addClass($(this).data('panelname'));
	});

    $('.marker_tab').on('click', function () {
        $('#second_section').removeClass().addClass($(this).data('panelname'));
    });

	function startPlayback(){
		$(".scene .sceneitem.bus").animate({
			left: "50px"
		}, 2500, function() {
			setTimeout(function(){
				$(".scene .sceneitem.bus").css('-webkit-transform','rotate(-2deg)');
			},1800);
			setTimeout(function(){
				$(".scene .sceneitem.bus").css('-webkit-transform','rotate(0deg)');
			},2000);
			setTimeout(function() {
				animateLandscape(0);
			}, 2000);
		});
	}

	startPlayback();


	var landscapeEl = $( ".landscape" );

	var step = 0;
	var offsets = ["-327px","-1250px"];
	var animtime = [10497,13503];

	function hideBus(){
		$(".sceneitem.bus").removeClass("animated_visible").addClass("animated_hidden");
		$(".busstops").removeClass("animated_visible").addClass("animated_hidden");
	}

	function showBus(){
		$(".sceneitem.bus").removeClass("animated_hidden").addClass("animated_visible");
		$(".busstops").removeClass("animated_hidden").addClass("animated_visible");
	}

	function animateLandscape(step){
		landscapeEl.animate({
			left: offsets[step]
		}, animtime[step], function() {
			setTimeout(function(){
				$(".sceneitem.bus").css('-webkit-transform','rotate(-2deg)');
			},3800);
			setTimeout(function(){
				$(".sceneitem.bus").css('-webkit-transform','rotate(0deg)');
			},4000);
			setTimeout(function() {
				if(step == 1){
					landscapeEl.css("left", "550px");
					step = 0;	
				}else{
					step += 1;
				}
				animateLandscape(step);
			}, 4000);
		});


		$(".sceneitem.bus" ).hover(function(){
			landscapeEl.pause();
		}, function(){
			landscapeEl.resume();
		});

		$(".sceneitem.casino" ).hover(function(){
			landscapeEl.pause();
			hideBus();
		}, function(){
			landscapeEl.resume();
			showBus();
		});

		$(".sceneitem.housedouble" ).hover(function(){
			landscapeEl.pause();
			hideBus();
		}, function(){
			landscapeEl.resume();
			showBus();
		});

		$(".sceneitem.offices" ).hover(function(){
			landscapeEl.pause();
			hideBus();
		}, function(){
			landscapeEl.resume();
			showBus();
		});

		$(".sceneitem.betshop" ).hover(function(){
			landscapeEl.pause();
			hideBus();
		}, function(){
			landscapeEl.resume();
			showBus();
		});

		$(".sceneitem.casino2" ).hover(function(){
			landscapeEl.pause();
			hideBus();
		}, function(){
			landscapeEl.resume();
			showBus();
		});

		$(".sceneitem.housedouble2" ).hover(function(){
			landscapeEl.pause();
			hideBus();
		}, function(){
			landscapeEl.resume();
			showBus();
		});
	}

	function pauseLandscape(){
		console.log("pause");
		$(".landscape").pause();
	}

	function resumeLandscape(){
		console.log("resume");
		$(".landscape").resume();
	}
	var right_pos = $( window ).width() + 100;

	$( window ).resize(function() {
		right_pos = $( window ).width() + 100;
	});

	var animspeed = 60000;
	var cloudspeed = 80000;
	var birdspan = [8000, 24000, 40000];
	var cloudspan = [14000, 33000, 60000];

	if($( window ).width() < 1200){ 
		animspeed = 30000; 
		cloudspeed = 40000;
		birdspan = [4000, 12000, 20000];
		cloudspan = [7000, 17500, 30000];
	} else if($( window ).width() < 500){ 
		animspeed = 15000;
		cloudspeed = 20000; 
		birdspan = [2000, 6000, 10000];
		cloudspan = [3500, 9000, 15000];
	}


	function animate_birds(){

			$( ".bird_one.part1" ).animate({
				right: right_pos
			}, animspeed, function() {
				$(this).css("right", "-75px");
			});

			setTimeout(function() {
				$( ".bird_two.part1" ).animate({
					right: right_pos
				}, animspeed, function() {
					$(this).css("right", "-45px");
				});
			}, birdspan[0]);

			setTimeout(function() {
				$( ".bird_one.part2" ).animate({
					right: right_pos
				}, animspeed, function() {
					$(this).css("right", "-45px");
				});
			}, birdspan[1]);

			setTimeout(function() {
				$( ".bird_two.part2" ).animate({
					right: right_pos
				}, animspeed, function() {
					$(this).css("right", "-45px");
				});
			}, birdspan[2]);
	}

	animate_birds();
	setInterval(function() {
		animate_birds();
	}, animspeed);

	function animate_clouds(){
		$(".cloud1").show();
		$(".cloud2").show();

		$( ".cloud1.part1" ).animate({
			right: right_pos
		}, cloudspeed, function() {
			$(this).css("right", "-200px");
		});

		setTimeout(function() {
			$( ".cloud2.part1" ).animate({
				right: right_pos
			}, cloudspeed, function() {
				$(this).css("right", "-200px");
			});
		}, cloudspan[0]);

		setTimeout(function() {
			$( ".cloud2.part2" ).animate({
				right: right_pos
			}, cloudspeed, function() {
				$(this).css("right", "-200px");
			});
		}, cloudspan[1]);

		setTimeout(function() {
			$( ".cloud1.part2" ).animate({
				right: right_pos
			}, cloudspeed, function() {
				$(this).css("right", "-200px");
			});
		}, cloudspan[2]);

	}

	animate_clouds();
	
	setInterval(function() {
			animate_clouds();
		}, 80000);

	$('#contact_Send').click(function(){
		var $error = $('#errors_here .error_div');

		var entered_email = $("#contact_email").val();
		var entered_name = $("#contact_name").val();
		var entered_job = $("#contact_jobTitle").val();
		var entered_company = $("#contact_company").val();

		if (entered_name.length <= 0){$("#contact_name").parent().addClass('has-error'); return false;}
		if (entered_job.length <= 0){$("#contact_jobTitle").parent().addClass('has-error'); return false;}
		if (entered_company.length <= 0){$("#contact_company").parent().addClass('has-error'); return false;}

		if(!validateEmail(entered_email)){
			$("input[type='email']").parent().addClass('has-error').append($error);
			return false;
		}
	});

	$("input[type='text']").click(function(){
		$(this).parent().removeClass('has-error');
	});

	$("input[type='email']").click(function(){
		$(this).parent().removeClass('has-error');
	});

	$("#click_to_close").click(function(){
		$(this).parent().parent().removeClass('has-error');
	});

	$("input[type='text']").focus(function(){
		$(this).parent().removeClass('has-error');
	});

	$("input[type='email']").focus(function(){
		$(this).parent().removeClass('has-error');
	});


	var slider = $('#mobile-slider');
                
    slider.carousel({
        interval: 5800
    });

    setTimeout(function () {
            $('#mobile-slider .active .flip-container').toggleClass('do-magic');
    }, 950);

    slider.on('slide.bs.carousel', function () {
        setTimeout(function () {
            $('#mobile-slider .active .flip-container').toggleClass('do-magic');
        }, 950);
        $('.do-magic').removeClass('do-magic');
    });

    $('#myCarousel').hammer().on('swipeleft', function(){
  		$(this).carousel('next'); 
	});
	$('#myCarousel').hammer().on('swiperight', function(){
		$(this).carousel('prev'); 
	});


});

function validateEmail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

