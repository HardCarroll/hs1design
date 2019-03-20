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
  // 咨询按钮点击处理事件
  $("#btn_consult").on("click", function() {
    var $btn = $(this).button('loading');
    var type = $("#consult select[name='type']").val();
    var area = $("#consult input[name='area']").val();
    var phone = $("#consult input[name='phone']").val();
    var jsonData = '"type":"'+type+'","area":"'+area+'","phone":"'+phone+'"';
    
    var fmdConsult = new FormData();
    fmdConsult.append("token", "consult");
    fmdConsult.append("consultData", jsonData);
    $.ajax({
      url: "/lib/php/handle.php",
      type: "POST",
      data: fmdConsult,
      dataType: "json",
      processData: false,
      contentType: false,  //数据为FormData时contentType必须为false
      success: function(res) {
        var result = JSON.parse(res);
        $("#btn_consult").popover({
          trigger: 'manual',
          placement: 'top',
          html: true,
          title: 'Tips',
          content: result.err_code}).popover("show").on('shown.bs.popover', function(){
          setTimeout(function(){$("#btn_consult").popover('destroy')}, 3000);
        });
        $btn.button('reset');
        // console.log(result);
      },
      error: function(msg) {
        console.log(msg);
      }
    });
    // console.log("type: "+type+"; area: "+area+"; phone: "+phone);
  });

  // 窗口resize事件处理过程
  $(window).resize(function() {
    offTop_navbar_hsd = $("#navbar_hsd").offset().top;
    height_navbar_hsd = $("#navbar_hsd").outerHeight();
    if ($(window).width() < 768) {
      if ($("#navbar_hsd").hasClass("fixed fixed-top")) {
        $("#navbar_hsd").removeClass("fixed fixed-top").css({opacity: 1.0});
        $("#pageContent").css({paddingTop: 0});
      }
      $("#pageFooter").css({paddingBottom: "50px"});
      $("#asidebar_tools").css({bottom: "115px"});
    }
    else {
      $("#pageFooter").css({paddingBottom: "0"});
      $("#asidebar_tools").css({bottom: "65px"});
    }

    $("#displayModal").modal("handleUpdate");
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

/**
 * 获取指定cookie键的值
 * @param key 指定要获取的cookie键
*/
function getCookie(key) {
  var arr,reg=new RegExp("(^| )"+key+"=([^;]*)(;|$)");
  if(arr=document.cookie.match(reg)) {
    return unescape(arr[2]);
  }
  else {
    return null;
  }
}

/**
 * 设置浏览器Cookie，默认不设置过期时间，浏览器关闭时清除
 * @param key cookie键
 * @param value cookie值
 * @param expires cookie过期时间，以秒为单位，默认为0，即不设置过期时间，浏览器关闭时清除
*/
function setCookie(key, value, expires=0) {
  var cookie = key + "=" + escape(value);
  if (expires) {
    var date = new Date();
    date.setTime(date.getTime()+expires*1000);
    cookie = cookie + ";expires=" + date.toGMTString();
  }
  document.cookie = cookie;
}

/**
 * 清除指定cookie键的值
 * @param key 指定要清除的cookie键
**/
function delCookie(key) {
  var date = new Date();
  date.setTime(date.getTime() - 1000);
  document.cookie = key + "='';expires=" + date.toGMTString();
}

/**
 * 分页按钮点击处理函数
 * @param paramJson
 * {
 *  object: "target_object",
 *  url: "ajax_url",
 * }  
 * 
 */
// function paginationClick(paramJson) {
//   paramJson.object.each(function() {
//     $(this).click(function() {
//       var curIndex = 0;
//       if ($(this).index() === 0) {
//         // previous process 上一页处理
//         if(!$(this).hasClass("disabled")) {
//           $(this).parent().children().last().removeClass("disabled");
//           $(this).parent().find(".active").removeClass("active").prev().addClass("active");
//           if($(this).parent().find(".active").index() === $(this).parent().children().first().index()+1) {
//             $(this).addClass("disabled");
//           }
//         }
//         curIndex = $(this).parent().find(".active").index();
//       }
//       else if($(this).index() === $(this).parent().children().length-1){
//         // next process 下一页处理
//         if(!$(this).hasClass("disabled")) {
//           $(this).parent().children().first().removeClass("disabled");
//           $(this).parent().find(".active").removeClass("active").next().addClass("active");
//           if($(this).parent().find(".active").index() === $(this).parent().children().last().index()-1) {
//             $(this).addClass("disabled");
//           }
//         }
//         curIndex = $(this).parent().find(".active").index();
//       }
//       else {
//         // index process 索引标签处理
//         $(this).addClass("active").siblings().removeClass("active");
//         $(this).parent().children().first().removeClass("disabled");
//         $(this).parent().children().last().removeClass("disabled");
//         if($(this).index() === 1) {
//           $(this).parent().children().first().addClass("disabled");
//         }
//         else if($(this).index() === $(this).parent().children().length-2) {
//           $(this).parent().children().last().addClass("disabled");
//         }
//         curIndex = $(this).index();
//       }

//       if (paramJson.url) {
//         var fmd = new FormData();
//         fmd.append("dataJson", paramJson.data);
//         $.ajax({
//           // url: "/news/refresh_news_list.php?token="+paramJson.token+"&cls="+paramJson.class+"&page="+curIndex,
//           url: paramJson.url,
//           type: "POST",
//           data: fmd,
//           processData: false,
//           contentType: false,   //数据为formData时必须定义此项
//           context: paramJson.target,
//           success: function(result) {
//             $(this).html(result);
//             console.log(result);
//           },
//           error: function(err) {
//             console.log("fail: "+err);
//           }
//         }); // ajax_func
//       }
      
//     }); // click_func
//   }); // each_func
// }

function paginationClick(argJson) {
  argJson.object.each(function() {
    $(this).off("click").on("click", function() {
      var curIndex = 0;
      if ($(this).index() === 0) {
        // previous process 上一页处理
        if(!$(this).hasClass("disabled")) {
          $(this).parent().children().last().removeClass("disabled");
          $(this).parent().find(".active").removeClass("active").prev().addClass("active");
          if($(this).parent().find(".active").index() === $(this).parent().children().first().index()+1) {
            $(this).addClass("disabled");
          }
        }
        curIndex = $(this).parent().find(".active").index();
      }
      else if($(this).index() === $(this).parent().children().length-1){
        // next process 下一页处理
        if(!$(this).hasClass("disabled")) {
          $(this).parent().children().first().removeClass("disabled");
          $(this).parent().find(".active").removeClass("active").next().addClass("active");
          if($(this).parent().find(".active").index() === $(this).parent().children().last().index()-1) {
            $(this).addClass("disabled");
          }
        }
        curIndex = $(this).parent().find(".active").index();
      }
      else {
        // index process 索引标签处理
        $(this).addClass("active").siblings().removeClass("active");
        $(this).parent().children().first().removeClass("disabled");
        $(this).parent().children().last().removeClass("disabled");
        if($(this).index() === 1) {
          $(this).parent().children().first().addClass("disabled");
        }
        else if($(this).index() === $(this).parent().children().length-2) {
          $(this).parent().children().last().addClass("disabled");
        }
        curIndex = $(this).index();
      }

      // refreshTabList({page: curIndex, rule: argJson.rule});
      
    }); // click_func
  }); // each_func
}