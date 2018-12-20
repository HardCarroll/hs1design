$(function() {
  $(".thumb-list>li").each(function() {
    $(this).click(function() {
      $(this).addClass("active").siblings().removeClass("active");
      $("#displayModalLabel").html($(this).attr("data-imgtitle"));
      $("#displayModal .modal-body>img").attr("src", $(this).attr("data-imgurl")).attr("alt", $(this).attr("data-imgalt"));
      $("#displayModal").modal({
        "backdrop": "static"
      }).on("show.bs.modal", function() {
        // $("body").addClass("of-hidden");
      }).on("hidden.bs.modal", function() {
        $(".thumb-list>li").removeClass("active");
        // $("body").removeClass("of-hidden");
      });
    });
  });
});