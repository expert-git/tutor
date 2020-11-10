
$(document).ready(function(){
  console.log("a");

    // NumbersOnly
    $.validator.addMethod("numbers", function(value, element) {
      return this.optional(element) || /^[0-9\ \-\+]+$/i.test(value);
    }, "Phone must contain only numbers, + and -.");

    // Only Letters
    $.validator.addMethod("fullname", function(value, element) {
      return this.optional(element) || /^[a-z\ \_]+$/i.test(value);
    }, "Username must contain only letters");

    

    // Set countries list in combobox
    var $select = $('.country');
    $.getJSON('http://site.startupbug.net:6888/actor-pass/frontend/assets/js/countries.json', function(data) {
      $select.html('');
      console.log('ciuntryzz');
      
      $.each(data, function(key, val){
        $select.append('<option value="' + val.dial_code+ '">' + val.name + '</option>');
      })
    });

    // Get Country Code in combobox
    $(".country").change(function(){
      var selectedValue = this.value;
      var $phone = $('#phone');
      $phone.val('');
      $phone.val(selectedValue);
    });


    // Get image and file url and set image tag
    $(".profile-img").change(function(){
      var ext = $(this).val().split('.').pop().toLowerCase();
      if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
        if (this.files && this.files[0]) {
          var className = $(this).data('class');
          var reader = new FileReader();
          reader.onload = function (e) {
            $('.'+className).attr('href', e.target.result);
            $('.'+className).attr('src', '');
            $('span.'+className).slideDown("slow");
          }
          reader.readAsDataURL(this.files[0]);
        }
      }
      else {
        if (this.files && this.files[0]) {
          var className = $(this).data('class');
          var reader = new FileReader();
          reader.onload = function (e) {
            $('.'+className).attr('href', e.target.result);
            $('.'+className).attr('src', e.target.result);
            $('span.'+className).slideUp("slow");
          }
          reader.readAsDataURL(this.files[0]);
        }
      }
    });

});
