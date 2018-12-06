$(function(){
  var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $("html") : $("body")) : $("html,body");
  var offTop_navbar_hsd = $("#navbar_hsd").offset().top;
  var height_navbar_hsd = $("#navbar_hsd").outerHeight();

  // 解决移动端下点其他地方不失焦的问题
  $("body").on("touchend", function(e){
    if(e.target !== "input") {
      $("input").blur();
    }
  });

  if ($(window).width() < 768) {
    $("#pageFooter").css({paddingBottom: "50px"});
    $("#asidebar_tools").css({bottom: "115px"});
  }
  else {
    $("#pageFooter").css({paddingBottom: "0"});
    $("#asidebar_tools").css({bottom: "65px"});
  }

  if ($(document).scrollTop() >= $(".navbar-hsd>.container-fluid").outerHeight()) {
    $("#tools_bottom").removeClass("hidden");
  }
  else {
    $("#tools_bottom").addClass("hidden");
  }

  // 窗口resize事件处理过程
  $(window).resize(function() {
    offTop_navbar_hsd = $("#navbar_hsd").offset().top;
    height_navbar_hsd = $("#navbar_hsd").outerHeight();
    if ($(window).width() < 768) {
      $("#pageFooter").css({paddingBottom: "50px"});
      $("#asidebar_tools").css({bottom: "115px"});
    }
    else {
      $("#pageFooter").css({paddingBottom: "0"});
      $("#asidebar_tools").css({bottom: "65px"});
    }
  });

  // 窗口scroll事件处理过程
  $(window).scroll(function() {
    // 导航栏#navbar_hsd随滚动切换position: fixed和relative状态
    if ($(window).width() >= 768) {
      if ($(document).scrollTop() >= offTop_navbar_hsd) {
        if (!$("#navbar_hsd").hasClass("fixed fixed-top")) {
          $("#navbar_hsd").addClass("fixed fixed-top").css({opacity: 0.9});
          $("#pageContent").css({paddingTop: height_navbar_hsd});
        }
      }
      else {
        if ($("#navbar_hsd").hasClass("fixed fixed-top")) {
          $("#navbar_hsd").removeClass("fixed fixed-top").css({opacity: 1.0});
          $("#pageContent").css({paddingTop: 0});
        }
      }
    }
    // 侧边栏按钮#btn_backtop回到顶部的显示和隐藏
    if ($(document).scrollTop() >= $(window).height()) {
      $("li#btn_backtop").removeClass("hidden");
      $("#tools_bottom").removeClass("hidden");
    }
    else {
      $("li#btn_backtop").addClass("hidden");
      $("#tools_bottom").addClass("hidden");
    }
    // 移动端下底部导航工具条#tools_bottom的显示与隐藏
    if ($(document).scrollTop() >= $(".navbar-hsd>.container-fluid").outerHeight()) {
      $("#tools_bottom").removeClass("hidden");
    }
    else {
      $("#tools_bottom").addClass("hidden");
    }
    
    // console.log($(window).height());
  });

  // 返回顶部按钮#btn_backtop处理过程
  $("#btn_backtop").click(function() {
    $body.animate({scrollTop: 0}, 300);
  });

});

function scrollTo(target) {
  var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $("html") : $("body")) : $("html,body");
  $body.animate({scrollTop: $(target).offset().top}, 600, function(){
    $(this).removeClass("of-hidden").find("[id='full-screen']").addClass("hidden");
    // 解决Safari浏览器滚动BUG
    $(this).animate({scrollTop: 0}, 0);
  });
}