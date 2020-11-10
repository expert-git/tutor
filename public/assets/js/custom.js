/*$('.collapse').on('shown.bs.collapse', function(){
$(this).parent().find(".fa fa-chevron-right").removeClass("fa fa-chevron-right").addClass("fa fa-angle-down");
}).on('hidden.bs.collapse', function(){
$(this).parent().find(".fa fa-angle-down").removeClass("fa fa-angle-down").addClass("fa fa-chevron-right");
});*/

$(".nav__item-text").click(function(){
  $('.nav__item-text').removeClass('active');
  $(this).addClass('active')
});
    $(".student_faq").show();
    $(".tutor_faq").hide();
    $('#for_student').on("click", function(e){
      e.preventDefault();
    $(".student_faq").show();
    $(".tutor_faq").hide();
  });

    $('#for_tutor').on("click", function(e){
      e.preventDefault();
    $(".tutor_faq").show();
    $(".student_faq").hide();
  });

$( function() {

  $(".s_accordion").click(function(){
      $(this).siblings('.s_panel').slideToggle('300').toggleClass('active');
  });

  $( "#slider" ).slider();

  // With JQuery
  $("#ex2").slider({});

  // Without JQuery
  // var slider = new Slider('#ex2', {});

 } );


$(".f_tab").click(function(){
  $(".f_tab").removeClass("active-tab");
  $(this).addClass("active-tab")
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
      x[i].style.display = "none";
   }
   myIndex++;
   if (myIndex > x.length) {
     myIndex = 1;
    }
   x[myIndex-1].style.display = "block";
   setTimeout(carousel, 3000); // Change image every 2 seconds
}


function filterFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
    var input, filter, ul, li, a, i;
    input = document.getElementById("Name");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}

$("#btn_apply_now").on('click', function(e){
  e.preventDefault();
  if ($("#applyForm").find('input[name = "resume"]').val() == "") {
    $("#applyForm").find('input[name = "resume"]').siblings('.error').removeClass('hidden');
  }else if ($("#applyForm").find('input[name = "resume"]').val() == "") {
    $("#applyForm").find('input[name = "resume"]').siblings('.error').addClass('hidden');
    $("#applyForm").find('input[name = "resume"]').siblings('.error').removeClass('hidden');
  }else if ($("#applyForm").find('input[name = "resume"]').val() == "") {

  }else if ($("#applyForm").find('input[name = "resume"]').val() == "") {

  }else if ($("#applyForm").find('input[name = "resume"]').val() == "") {

  }else if ($("#applyForm").find('input[name = "resume"]').val() == "") {

  }else if ($("#applyForm").find('input[name = "resume"]').val() == "") {

  }else if ($("#applyForm").find('input[name = "resume"]').val() == "") {

  }else if ($("#applyForm").find('input[name = "resume"]').val() == "") {

  }else if ($("#applyForm").find('input[name = "resume"]').val() == "") {

  }

  // $("#applyForm").submit();
});

$(".nav__item-text").click(function(){
  $('.nav__item-text').removeClass('active');
  $(this).addClass('active')
});

// $(document).ready(function () {




// });
