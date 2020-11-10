$(document).ready(function(){

  $('body').on( 'click', 'a[href^="#/"]', function() {
    alert( "Thank you for clicking, but that's a demo link." );
    return false;
  });

  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#review-stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.review-star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });

  }).on('mouseout', function(){
    $(this).parent().children('li.review-star').each(function(e){
      $(this).removeClass('hover');
    });
  });

  /* 2. Action to perform on click */
  $('#review-stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.review-star');

    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }

    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }

    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#review-stars li.selected').last().data('value'), 10);
    var msg = "Thanks! You rated this " + ratingValue + " stars.";
    responseMessage(msg,ratingValue);

  });

  $('[data-toggle="tooltip"]').tooltip();

  $('.custom-tooltip').on('click', function() {
    var id = $(this).data('id');
    console.log(id);
  });

  $('#s-table').on('click', '.create_schedule', function() {
    var abc = $(this).attr('data-status');
    var status;
    if (abc === "0") {
      status = 1;
      $(this).attr('data-status', 1);
      $(this).attr('title', 'Available');
      $(this).attr('data-original-title', 'Available');
      $(this).closest('td').css('background', "#0aaf0a");
    }
    if (abc === "1") {
      status = 2;
      $(this).attr('data-status', 2);
      $(this).attr('title', 'Booked');
      $(this).attr('data-original-title', 'Booked');
      $(this).closest('td').css('background', "red");
    }
    if (abc === "2") {
      status = 0;
      $(this).attr('data-status', 0);
      $(this).attr('title', 'Not Available');
      $(this).attr('data-original-title', 'Not Available');
      $(this).closest('td').css('background', "transparent");
    }

    var tutor_id = $(this).data('tutor_id');
    var time = $(this).data('time');
    var date = $(this).data('date');
    var href = $(this).data('href');
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });
    $.ajax({
        type: "POST",
        url: href,
        data: {'tutor_id': tutor_id,'time':time,'date':date,'status':status},
        success: function (data) {
          console.log(data);
          if(data.status == 200){           
            alertify.success(data.msg);            
          }else if(data.status == 201){
            alertify.warning(data.msg);
          }else{
            alertify.warning(data.array.errorInfo[2]);
          }
        },
      error: function (data) {
        alertify.warning("Oops. something went wrong. Please try again");
      }
    });

  });
});


function responseMessage(msg,ratingValue) {
  $('.success-box').fadeIn(200);
  $('.success-box').removeClass('hidden');
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
  $('.review_input').val(ratingValue);
}
