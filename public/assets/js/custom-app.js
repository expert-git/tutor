
/*Jquery Custom JS File */

$(document).ready(function(){

  $("#btn_apply_now").on('click', function(e){
    e.preventDefault();
    if ($("#applyForm").find('input[name = "resume"]').val() == "") {

      $("#applyForm").find('input[name = "resume"]').siblings('.error').removeClass('hidden');

    }
    else if ($("#applyForm").find('input[name = "full_name"]').val() == "") {

      $("#applyForm").find('input[name = "resume"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "full_name"]').siblings('.error').removeClass('hidden');

    }
    else if ($("#applyForm").find('input[name = "age"]').val() == "") {

      $("#applyForm").find('input[name = "resume"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "full_name"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "age"]').siblings('.error').removeClass('hidden');

    }
    else if ($("#applyForm").find('select[name = "gender"]').val() == "") {

      $("#applyForm").find('input[name = "resume"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "full_name"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "age"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('select[name = "gender"]').siblings('.error').removeClass('hidden');

    }
    else if ($("#applyForm").find('input[name = "education"]').val() == "") {

      $("#applyForm").find('input[name = "resume"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "full_name"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "age"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('select[name = "gender"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "education"]').siblings('.error').removeClass('hidden');

    }
    else if ($("#applyForm").find('input[name = "id_num"]').val() == "") {

      $("#applyForm").find('input[name = "resume"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "full_name"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "age"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('select[name = "gender"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "education"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "id_num"]').siblings('.error').removeClass('hidden');

    }
    else if ($("#applyForm").find('input[name = "language"]').val() == "") {

      $("#applyForm").find('input[name = "resume"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "full_name"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "age"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('select[name = "gender"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "education"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "id_num"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "language"]').siblings('.error').removeClass('hidden');

    }
    else if ($("#applyForm").find('input[name = "contact_num"]').val() == "") {

      $("#applyForm").find('input[name = "resume"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "full_name"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "age"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('select[name = "gender"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "education"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "id_num"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "language"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "contact_num"]').siblings('.error').removeClass('hidden');

    }
    else if ($("#applyForm").find('input[name = "email_address"]').val() == "") {

      $("#applyForm").find('input[name = "resume"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "full_name"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "age"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('select[name = "gender"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "education"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "id_num"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "language"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "contact_num"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "email_address"]').siblings('.error').removeClass('hidden');

    }
    else if ($("#applyForm").find('select[name = "shift"]').val() == "") {

      $("#applyForm").find('input[name = "resume"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "full_name"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "age"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('select[name = "gender"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "education"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "id_num"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "language"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "contact_num"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "email_address"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('select[name = "shift"]').siblings('.error').removeClass('hidden');

    }
    else {
      $("#applyForm").find('input[name = "resume"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "full_name"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "age"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('select[name = "gender"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "education"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "id_num"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "language"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "contact_num"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('input[name = "email_address"]').siblings('.error').addClass('hidden');
      $("#applyForm").find('select[name = "shift"]').siblings('.error').addClass('hidden');

        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var email = $("#applyForm").find('input[name = "email_address"]').val();
        console.log();
        if(regex.test(email)){
          $("#applyForm").submit();
        }else {
          $("#applyForm").find('input[name = "email_address"]').siblings('.error').removeClass('hidden');
        }
    }

  });

  $('#applyForm').on('keyup', '.required', function() {
    if($(this).val() == ""){
      $(this).siblings('.error').removeClass('hidden');
    }else {
      $(this).siblings('.error').addClass('hidden');
    }
  });

  $("#roleSelect").change(function(e){
  		e.preventDefault();
  		if($(this).val() == 3){
  			$("#teach_div").toggle();
  		}else if($(this).val() == 2){
  			$("#teach_div").toggle();
  		}
  });

  	$(".sendJobReqButton").on('click', function(e){
  			e.preventDefault();

  			$("#job_id").val($(this).data('id'));

  	});

    $("#sendRequestTestimonial").on('submit', function(e){
        e.preventDefault();
        console.log("assad");
        var formData = new FormData(this);
        console.log(formData);

        $.ajaxSetup({
          headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
        });

        $.ajax({
          type: "POST",
          url: $(this).attr('action'),
          data: {'testComment':$("#testComment").val()},
          success: function(data){

            console.log(data);

            if(data.status == 200){

              toastr.success(data.msg);

              $("#jobRequestModal").modal('toggle');

            }else if(data.status == 202){
              toastr.error(data.msg);
            }
          },
          error: function(data){
            toastr.error(data.msg);
          }
        });

    });

});
