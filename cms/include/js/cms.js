$(function(){
  $(".slide").on("click", function() {
    $(this).toggleClass("active").children().eq(0).toggleClass("glyphicon-triangle-bottom");
    // console.log($(this).children().eq(0));
  });
});