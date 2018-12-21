$(function() {
  $(".thumb-list>li").each(function() {
    $(this).click(function() {
      // console.log($(this).index());
      // var lis = $(".thumb-list>li").length;
      // console.log(lis);
      var curLi = $(this).index()+1;
      var cntLi = $(".thumb-list>li").length;
      $("#displayModal .pos").html(curLi + " / " + cntLi);
      if(curLi === 1) {
        $("#displayModal .modal-footer .prev").addClass("disabled");
      }
      else if(curLi === cntLi) {
        $("#displayModal .modal-footer .next").addClass("disabled");
      }
      else {
        $("#displayModal .modal-footer .prev").removeClass("disabled");
        $("#displayModal .modal-footer .next").removeClass("disabled");
      }
      $(this).addClass("active").siblings().removeClass("active");
      $("#displayModalLabel").html($(this).attr("data-imgtitle"));
      $("#displayModal .modal-body>img").attr("src", $(this).attr("data-imgurl")).attr("alt", $(this).attr("data-imgalt"));
      $("#displayModal").modal({
        "backdrop": "static"
      }).on("hidden.bs.modal", function() {
        $(".thumb-list>li").removeClass("active");
      });
    });
  });

  // $("#displayModal .modal-footer .prev").click(function() {});
  $("#displayModal .modal-footer .next").click(function(e) {
    e.preventDefault();
    // $("#displayModal .modal-body .tab-pane.active").next().tab("show");
    // console.log($("#displayModal .modal-body .tab-pane.active").next());
  });
});