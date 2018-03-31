/**
 * Created by sergey on 21/01/15.
 */
$(document).ready(function(){
    $("#video_block").fitVids();

    $('.marker').on('click', function () {
        var color = $(this).data('color');
        $('#second_section').css('background-color',color);
    })

});