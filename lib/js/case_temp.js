$(function() {
  $(".case-thumb .case-thumb-item").each(function() {
    $(this).click(function() {
      var curItem = $(this).index();
      var cntItem = $(".case-thumb .case-thumb-item").length;
      $("#displayModal .pos").html(curItem+1 + " / " + cntItem);
      if(curItem === 0) {
        $("#displayModal .modal-footer .prev").addClass("disabled");
      }
      else if(curItem === cntItem-1) {
        $("#displayModal .modal-footer .next").addClass("disabled");
      }
      else {
        $("#displayModal .modal-footer .prev").removeClass("disabled");
        $("#displayModal .modal-footer .next").removeClass("disabled");
      }
      
      $("#displayModal .modal-body img:eq("+curItem+")").addClass("in").siblings().removeClass("in");
      $("#displayModalLabel").html($("#displayModal .modal-body img[class='fade in']").attr("title"));
      
      $("#displayModal").modal({
        "backdrop": "static"
      }).on("hidden.bs.modal", function() {
        $("#displayModal .modal-body img").removeClass("in");
        $("#displayModal .modal-footer .prev").removeClass("disabled");
        $("#displayModal .modal-footer .next").removeClass("disabled");
      });
    });
  });

  $("#displayModal .modal-footer .prev").click(function() {
    if(!$(this).hasClass("disabled")) {
      $("#displayModal .modal-body img[class='fade in']").removeClass("in").prev().addClass("in");
      $("#displayModalLabel").html($("#displayModal .modal-body img[class='fade in']").attr("title"));

      var curItem = $("#displayModal .modal-body img[class='fade in']").index();
      var cntItem = $("#displayModal .modal-body img").length;
      $("#displayModal .pos").html(curItem+1 + " / " + cntItem);

      
      $("#displayModal .modal-footer .prev").removeClass("disabled");
      $("#displayModal .modal-footer .next").removeClass("disabled");
      if(curItem === 0) {
        $("#displayModal .modal-footer .prev").addClass("disabled");
      }
      else if(curItem === cntItem-1) {
        $(this).addClass("disabled");
      }
    }
  });
  $("#displayModal .modal-footer .next").click(function() {
    if(!$(this).hasClass("disabled")) {
      $("#displayModal .modal-body img[class='fade in']").removeClass("in").next().addClass("in");
      $("#displayModalLabel").html($("#displayModal .modal-body img[class='fade in']").attr("title"));

      var curItem = $("#displayModal .modal-body img[class='fade in']").index();
      var cntItem = $("#displayModal .modal-body img").length;
      $("#displayModal .pos").html(curItem+1 + " / " + cntItem);

      $("#displayModal .modal-footer .prev").removeClass("disabled");
      $("#displayModal .modal-footer .next").removeClass("disabled");
      if(curItem === 0) {
        $("#displayModal .modal-footer .prev").addClass("disabled");
      }
      else if(curItem === cntItem-1) {
        $(this).addClass("disabled");
      }
    }
  });
});