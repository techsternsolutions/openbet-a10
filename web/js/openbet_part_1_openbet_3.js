$(document).ready(function(){
    $("#video_block").fitVids();

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

    $('.marker_tab').on('click', function () {
        $('#second_section').removeClass().addClass($(this).data('panelname'));
    });

    var canvas, stage, exportRoot;

	function init() {
		canvas = document.getElementById("canvas");
		images = images||{};

		var loader = new createjs.LoadQueue(false);
		loader.addEventListener("fileload", handleFileLoad);
		loader.addEventListener("complete", handleComplete);
		loader.loadManifest(lib.properties.manifest);
	}

	function handleFileLoad(evt) {
		if (evt.item.type == "image") { images[evt.item.id] = evt.result; }
	}

	function handleComplete() {
		exportRoot = new lib.animation();

		stage = new createjs.Stage(canvas);
		stage.addChild(exportRoot);
		stage.update();

		createjs.Ticker.setFPS(lib.properties.fps);
		createjs.Ticker.addEventListener("tick", stage);
	}

	init();

	function animateLandscape(){
		$( ".landscape" ).animate({
			left: "-1873px"
		}, 24000, function() {
			$(this).css("left", "300px");
			animateLandscape();
		});
	}

	setTimeout(function() {
		animateLandscape();
	}, 2000);


	$(".sceneitem.casino" ).mouseenter(pauseLandscape()).mouseleave(resumeLandscape());
	$(".sceneitem.housedouble" ).mouseenter(pauseLandscape()).mouseleave(resumeLandscape());

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

	function animate_birds(){
		var $width = $(window).width();
		if ($width<1200){
			$( "#bird1" ).animate({
				right: right_pos
			}, 30000, function() {
				$(this).css("right", "-75px");
			});

			setTimeout(function() {
				$( "#bird2" ).animate({
					right: right_pos
				}, 24000, function() {
					$(this).css("right", "-45px");
				});
			}, 4000);
		}else{
			$( "#bird1" ).animate({
				right: right_pos
			}, 30000, function() {
				$(this).css("right", "-75px");
			});

			setTimeout(function() {
				$( "#bird2" ).animate({
					right: right_pos
				}, 24000, function() {
					$(this).css("right", "-45px");
				});
			}, 4000);
		}

	}

	animate_birds();
	var $width = $(window).width();
	if ($width<1200){
		setInterval(function() {
			animate_birds();
		}, 26000);
	}else{
		setInterval(function() {
			animate_birds();
		}, 50000);
	}


	function animate_clouds(){
		var $width = $(window).width();
		if ($width<1200){
			$( "#cloud1" ).animate({
				right: right_pos
			}, 60000, function() {
				$(this).css("right", "-200px");
			});

			setTimeout(function() {
				$( "#cloud2" ).animate({
					right: right_pos
				}, 45000, function() {
					$(this).css("right", "-200px");
				});
			}, 6000);
		}
		else{
			$( "#cloud1" ).animate({
				right: right_pos
			}, 60000, function() {
				$(this).css("right", "-200px");
			});

			setTimeout(function() {
				$( "#cloud2" ).animate({
					right: right_pos
				}, 51000, function() {
					$(this).css("right", "-200px");
				});
			}, 6000);
		}

	}

	animate_clouds();
	if ($width<1200){
		setInterval(function() {
			animate_clouds();
		}, 70000);
	}else{
		setInterval(function() {
			animate_clouds();
		}, 150000);
	}


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
});

function validateEmail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

