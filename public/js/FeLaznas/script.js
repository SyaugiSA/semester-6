document.getElementById("cancel-search").addEventListener("click", hideSearch);

var searchButton = document.getElementsByClassName("btn-search");
for (var i = 0; i < searchButton.length; i++) {
  searchButton[i].addEventListener("click", showSearch);
}

function showSearch(e) {
  e.preventDefault();
  document.getElementById("search-wrapper").classList.remove("d-none");
}

function hideSearch(e) {
  e.preventDefault();
  document.getElementById("search-wrapper").classList.add("d-none");
}

function hideAll() {
  $(".kebersihan_epl").hide(); 
  $("#kebersihan").html("Show"); 
  $('#kebersihan_content').removeClass("bg-warning");

  $('.humas_epl').hide(); 
  $('#humas').html("Show");  
  $('#humas_content').removeClass("bg-primary");

  $('.imam_epl').hide();
  $('#imam').html("Show");
  $('#imam_content').removeClass("bg-success");
  
  $('.gurungaji_epl').hide();
  $('#gurungaji').html("Show");
  $('#gurungaji_content').removeClass("bg-secondary");
  
  $('.muadzin_epl').hide();
  $('#muadzin').html("Show");
  $('#muadzin_content').removeClass("bg-info");
  
  $('.penasehat_epl').hide();
  $('#penasehat').html("Show");
  $('#penasehat_content').removeClass("bg-danger");
  
  $('.khatib_epl').hide();
  $('#khatib').html("Show");
  $("#khatib_content").removeClass("bg-indigo");
  
  $('.remas_epl').hide();
  $('#remas').html("Show");
  $("#remas_content").removeClass("bg-cyan");




}


//JQ Halaman About
$(document).ready(function () {
  hideAll();
  $("#kebersihan").click(function (e) {
    e.preventDefault();
    if ($("#kebersihan").text() == "Show") {
      hideAll();
      $("#kebersihan_content").addClass("bg-warning");
      $(".kebersihan_epl").slideToggle();
      $("#kebersihan").html("Hide");
    } else if ($("#kebersihan").text() == "Hide") {
      $("#kebersihan_content").removeClass("bg-warning");
      $('.kebersihan_epl').slideToggle();
      $("#kebersihan").html("Show");
    }
  });

  
  $("#humas").click(function (e) {
    e.preventDefault();
    if($('#humas').text() == "Show"){
      hideAll();
      $('#humas_content').addClass("bg-primary");
      $('.humas_epl').slideToggle();
      $('#humas').html("Hide");
    } else if( $('#humas').text() == "Hide" ){
      $("#humas_content").removeClass("bg-primary");
      $('.humas_epl').slideToggle();
      $("#humas").html("Show");
    }
  });

  $('#imam').click(function (e) { 
    e.preventDefault();
    if ($('#imam').text() == "Show") {
      hideAll();
      $('#imam_content').addClass('bg-success');
      $('.imam_epl').slideToggle();
      $('#imam').html("Hide");
    }else if($('#imam').text() == "Hide"){
      $('#imam_content').removeClass("bg-success");
      $('.imam_epl').slideToggle();
      $('#imam').html('Show');
    }
  });

   $("#gurungaji").click(function (e) {
       e.preventDefault();
       if ($("#gurungaji").text() == "Show") {
           hideAll();
           $("#gurungaji_content").addClass("bg-secondary");
           $(".gurungaji_epl").slideToggle();
           $("#gurungaji").html("Hide");
       } else if ($("#gurungaji").text() == "Hide") {
           $("#gurungaji_content").removeClass("bg-secondary");
           $(".gurungaji_epl").slideToggle();
           $("#gurungaji").html("Show");
       }
   });

   $("#muadzin").click(function (e) {
       e.preventDefault();
       if ($("#muadzin").text() == "Show") {
           hideAll();
           $("#muadzin_content").addClass("bg-info");
           $(".muadzin_epl").slideToggle();
           $("#muadzin").html("Hide");
       } else if ($("#muadzin").text() == "Hide") {
           $("#muadzin_content").removeClass("bg-info");
           $(".muadzin_epl").slideToggle();
           $("#muadzin").html("Show");
       }
   });

   $("#penasehat").click(function (e) {
       e.preventDefault();
       if ($("#penasehat").text() == "Show") {
           hideAll();
           $("#penasehat_content").addClass("bg-danger");
           $(".penasehat_epl").slideToggle();
           $("#penasehat").html("Hide");
       } else if ($("#penasehat").text() == "Hide") {
           $("#penasehat_content").removeClass("bg-danger");
           $(".penasehat_epl").slideToggle();
           $("#penasehat").html("Show");
       }
   });
   
   $("#khatib").click(function (e) {
       e.preventDefault();
       if ($("#khatib").text() == "Show") {
           hideAll();
           $("#khatib_content").addClass("bg-indigo");
           $(".khatib_epl").slideToggle();
           $("#khatib").html("Hide");
       } else if ($("#khatib").text() == "Hide") {
           $("#khatib_content").removeClass("bg-indigo");
           $(".khatib_epl").slideToggle();
           $("#khatib").html("Show");
       }
   });
   
   $("#remas").click(function (e) {
       e.preventDefault();
       if ($("#remas").text() == "Show") {
           hideAll();
           $("#remas_content").addClass("bg-cyan");
           $(".remas_epl").slideToggle();
           $("#remas").html("Hide");
       } else if ($("#remas").text() == "Hide") {
           $("#remas_content").removeClass("bg-cyan");
           $(".remas_epl").slideToggle();
           $("#remas").html("Show");
       }
   });




});


