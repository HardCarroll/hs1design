$(function() {
  $(".case-nav-item>a").each(function() {
    $(this).click(function() {
      // console.log($(this).attr("data-type"));
      $(".current-position>.breadcrumb>li.active").html($(this).attr("data-type"));
    });
  });
});