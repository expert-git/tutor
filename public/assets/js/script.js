$(document).ready(function () {

    //for jquery functions
$('#subscribe_1').on('submit',function(e){
    e.preventDefault();
    console.log("herezz");
    var formData = $(this).serialize();
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,
        success: function (data) {
          if(data.status == 200){
            alertify.success(data.msg);
             setTimeout(function(){
         window.location.reload(1);
       }, 1000);
          }else if(data.status == 202){
            alertify.warning(data.msg);
          }else if(data.status == 203){
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

  // call validation on form
  // $("#Sign_up_form").validate();
  //
  // //contact form validation
  // $("#contact_form").validate();
  //  //signin form validation
  //
  // $("#signin_form").validate();
  //
  //    //signin form validation
  //
  // $("#registration_form").validate();
  //
  //   //monthly cost
  //
  //
  // $("#monthlycost_form").validate();
});


$(function() {

  // $("#my-menu").mmenu({
  //   extensions  : [ "shadow-panels", "fx-panels-slide-100", "border-none", "theme-black", "fullscreen" ],
  //   navbars   : {
  //     content : [ "prev", "<img src='assets/images/logo_actor.png' class='mobile-logo' />", "close" ],
  //     height  : 2
  //   },
  //   setSelected: true,
  //   searchfield: {
  //     resultsPanel: true
  //   }}, {
  // });
  //
  // $(".mh-head.mm-sticky").mhead({
  //   scroll: {
  //     hide: 200
  //   }
  // });
  //
  // $(".mh-head:not(.mm-sticky)").mhead({
  //   scroll: false
  // });

  $('body').on( 'click',
    'a[href^="#/"]',
    function() {
      alert( "Thank you for clicking, but that's a demo link." );
      return false;
    }
  );
});

$('#upload').change(function() {
    var filename = $('#upload').val();
    $('#selected_file').html(filename);
});

$('#apply_button_now').on('click', function() {
  $('#applyForm_container').removeClass('hidden');
  $('#btn_apply_now').removeClass('hidden');
  $(this).addClass('hidden');
});

//for custom javascript functions function
