$(document).ready(function () {
    var landscapeEl = $( ".landscape" );
    var viewport = $(window).width();
    var stopPos = $('.busstop.first').offset();
    var busStop = +stopPos.left - 180;

    $(".guy").hide();
    $(".logo").hide();

    $(window).resize(function() {
        viewport = $(window).width();
        var busstopPos = $('.busstop.first').offset();

        if (viewport > 480) {
            var left = (+busstopPos.left - 160) + "px";
        } else {
            var left = (+busstopPos.left - 75) + "px";
        };

        $('.sceneitem.bus').css("left", left);
    });

    if (viewport < 481) {
        busStop = 195;
    }

    function startPlayback () {
        $(".sceneitem.bus").animate({
            left: busStop + "px"
        }, 7200, function () {
            $('.guy.first').show();
            setTimeout(function () {
                $('.guy.second').show();
            }, 400);
            setTimeout(function () {
                $('.guy.third').show();
            }, 800);
        });

        setTimeout(function () {
            $(".logo.first").fadeIn("slow");
        }, 1000);
    };

    setTimeout(function () {
        $(".logo.first").fadeOut(850, function () {
            $(".logo.second").fadeIn(870);
        });
    }, 7200);

    startPlayback();

    $("#homeBanner").on("click", function () {
        window.open("https://www.openbet.com/oneaccount", "_blank");
    });
});