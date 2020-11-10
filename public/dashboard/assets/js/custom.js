$( function() {

  $( "#slider" ).slider();

	// With JQuery
	$("#ex2").slider({});
console.log("ASdasd");
	// Without JQuery
	// var slider = new Slider('#ex2', {});

  $('.offline').on('change', function() {
      if ($(this).is(":checked")) {
        $('.form_address').removeClass('hidden');
        $('.job_address').attr('disabled', false);
      }else {
        $('.form_address').addClass('hidden');
        $('.job_address').attr('disabled', true);
      }
  });

});


$(".f_tab").click(function(){
  $(".f_tab").removeClass("active-tab");
  $(this).addClass("active-tab");
})
var myIndex = 0;
var slideIndex = 1;
carousel();
function plusDivs(n) {
  showDivs(slideIndex += n);
}
function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       // x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    // x[myIndex-1].style.display = "block";
    setTimeout(carousel, 3000); // Change image every 2 seconds
}

$(document).ready(function(){
  $(".sendReqMsg").on('click', function(e){
      console.log("data id" + $(this).data('id'));
      $("#job_id").val($(this).data('id'));
      
     

      console.log($(this).data('tutor'));
      $("#reply_tutor_id").val( $(this).data('tutor') );
  });
  $(".s_btn_margin").on('click', function(e){
      var current_job_id = $(this).data('current_job_id');
      var current_tutor_id = $(this).data('tutor');
      console.log(current_job_id);
      $("#job_id").val(current_job_id); 
      $("#current_tutor_id").val(current_tutor_id); 
  });
  $(".s_btn_margin22").on('click', function(e){
      var current_job_id_new = $(this).data('current_job_id_new');
      var current_tutor_id_new = $(this).data('current_tutor_id_new');
      var current_comment_new = $(this).data('comment');
      var current_rating_new = $(this).data('rating');
      
      $("#current_job_id_new").val(current_job_id_new); 
      $("#current_tutor_id_new").val(current_tutor_id_new); 
      $("#current_comment_new").val(current_comment_new); 
      $("#current_rating_new").val(current_rating_new); 

      var stars = $('#review-stars_view li').parent().children('li.review-star');
      for (i = 0; i < current_rating_new; i++) {
        $(stars[i]).addClass('selected');
      }

      $('.success-box').removeClass('hidden');
      $('.success-box div.text-message').html("<span>You rated this " + current_rating_new + " stars.</span>");

  });
  $("#rating_review").on('submit', function(e){
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });
    $.ajax({
      type: $(this).attr('method'),
      url: $(this).attr('action'),
      data: formData,
      success: function (data) {
        console.log(data);
        if(data.status == 200){
          alertify.success(data.msg);      
          $('#myModal_review').modal('hide');
        }else if(data.status == 202){
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
  $("#replyTutorForm").on('submit', function(e){
      e.preventDefault();

        console.log("reply form");
        var formData = new FormData(this);
        console.log(formData);

        $.ajaxSetup({
          headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
        });

        $.ajax({
          type: "POST",
          url: $(this).attr('action'),
          data: formData,
          processData: false,
          contentType: false,
          success: function(data){

            if(data.success == true){
              toastr.success(data.msg);

              $("#myModal").modal('toggle');

              setTimeout(function(){
                location.reload();
              }, 5000);

            }else if(data.success == false){
              toastr.success(data.msg);
            }
          },
          error: function(data){
            toastr.error(data.msg);
          }
        });
  });

  $(".contact").on('click', function(e){
        var id = $(this).data("id");
        console.log(id);
        var route = $(this).data('action');
        $.ajaxSetup({
          headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
        });

        $.ajax({
          type: "POST",
          url: $(this).data('action'),
          data: {'chatId': id},
          success: function(data){
            console.log(data);

            $(".content").html(data.html);

            $('.messages').scrollTop($('.messages')[0].scrollHeight - $('.messages')[0].clientHeight);
            
            setInterval(function(){ 
              
              reloadChat(id, route);

            }, 18000);

            loadJS();

          },
          error: function(data){
             console.log(data);
           // toastr.error(data.msg);
          }
        });

  });

  //Form submit Chat Ajax
function loadJS(){

    $("#chatSubmit").on('submit', function(e){
        e.preventDefault();

        $.ajaxSetup({
          headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
        });

        $.ajax({
          type: "POST",
          url: $(this).attr('action'),
          data: {'chatId': $('#chat_id').val(), 'chat_msg': $('#chat_msg').val()},
          success: function(data){
            console.log(data);

            if(data!=0){
              //msg sent reload chat 
              //sending chat id
                reloadChat(data.chat_id, data.route);

            }else{
              //msg not sent show error
              alertify.warning("Message not Sent");
            }
          },
          error: function(data){
             console.log(data);
           // toastr.error(data.msg);
          }
        });

  });

}

function reloadChat(chatId, route){

    console.log('reload chat');
    console.log(route);

      var chat_id = chatId;
      $.ajaxSetup({
          headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
        });

        $.ajax({
          type: "POST",
          url: route,
          data: {'chatId': chat_id},
          success: function(data){
            console.log(data);

            $(".content").html(data.html);

            $('.messages').scrollTop($('.messages')[0].scrollHeight - $('.messages')[0].clientHeight);

            loadJS();


          },
          error: function(data){
             console.log(data);
           // toastr.error(data.msg);
          }
        });

}

});
