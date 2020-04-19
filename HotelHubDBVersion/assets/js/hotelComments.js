function saveComment(hotelId, email, firstName, lastName) {
    comment = $("#comment-" + hotelId).val();
    if(comment.length < 4){
        errorSelector = $('#error_comment-' + hotelId);
        errorSelector.html("Comment must be more than 3 characters");
        return;
    } else{
        errorSelector = $('#error_comment-' + hotelId);
        errorSelector.html("");
    }
    jQuery.ajax({
        url: "../HotelHubDBVersion/functions/comment.php",
        data: 'hotelId=' + hotelId + '&email=' + email + '&comment=' + comment,
        type: "POST",
        success: function (data) {
            if(data=="success") {
                $('#comment-' + hotelId).val("");
                date = js_yyyy_mm_dd_hh_mm_ss();
                prependHtml = '<li class="media"><a href="#" class="pull-left"></a><div class="media-body"><span class="text-muted pull-right"><small class="text-muted">' + date + '</small></span><strong class="text-success">' + firstName + ' ' + lastName + '</strong><p>' + comment + '</p></div></li>';
                $('#media-list-' + hotelId).prepend(prependHtml);
            }
        },
        error: function () {}
    });
}

function js_yyyy_mm_dd_hh_mm_ss () {
    now = new Date();
    year = "" + now.getFullYear();
    month = "" + (now.getMonth() + 1); if (month.length == 1) { month = "0" + month; }
    day = "" + now.getDate(); if (day.length == 1) { day = "0" + day; }
    hour = "" + now.getHours(); if (hour.length == 1) { hour = "0" + hour; }
    minute = "" + now.getMinutes(); if (minute.length == 1) { minute = "0" + minute; }
    second = "" + now.getSeconds(); if (second.length == 1) { second = "0" + second; }
    return year + "-" + month + "-" + day + " " + hour + ":" + minute + ":" + second;
  }