$(function(){
  $(".layer").click(function(){
    // 解决sarfri浏览器不触发点击事件
  });

  // 点击空白处隐藏菜单栏
  $(document).on("click", function() {
    $(".navbar-collapse").removeClass("in");
  });
  $(".navbar-toggle").on("click", function(e) {
    e.stopPropagation();
    $(".navbar-collapse").removeClass("in");
    $($(this).attr("data-target")).toggleClass("in");
  });

  // 左侧导航列表点击事件处理
  $(".list-item").on("click", function() {
    if($(this).find(".slide-menu").length) {
      // 如果是下拉菜单，则点击会切换状态
      $(this).toggleClass("active").find(".active").removeClass("active");
    }
    else {
      $(this).addClass("active");
    }
    $(this).siblings().removeClass("active");

    activateTab($(this));

    // console.log($(this).find("ul[class='slide-menu']").length);
  });
  $(".slide-menu>li").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).addClass("active").siblings().removeClass("active");
    activateTab($(this));
  });

  // tabpanel 标签页面按钮
  // 关闭按钮点击事件处理函数
  $(".btn-close").off("click").on("click", function() {
    $("#pageTabs").find(".active").children().last().click();
  });
  // 保存按钮点击事件处理函数
  $(".btn-save").off("click").on("click", function() {
    if(!$(this).hasClass("disabled") && $(this).parent().parent().parent().attr("id") === "siteTab") {
      save_siteInfo();
    }
    if($(this).parent().parent().parent().attr("id") === "uploadTab") {
      // uploadCase();
      refresh_uploadTab();
    }
  });
  // 发布按钮点击事件处理函数
  $(".btn-post").off("click").on("click", function() {
    

    // console.log($("#uploadTab .case-thumb").children());
    // console.log("post click");
    // console.log("str: " + caseData);
  });

  // 网站信息标签页输入框输入内容
  $(".site-wrap input, .site-wrap textarea").on("input", function() {
    $(".btn-save").removeClass("disabled");
  });

  // 案例管理标签页上传按钮
  $(".case-wrap>.case-head>.btn").on("click", function() {
    activateTab($(this));
  });

  $("#uploadTab .thumbnail img").off("click").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    console.log($(this).next().find("[name='data-alt']").val());
  });
  
  $("#uploadTab .add-thumb").off("click").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).parent().before('<div class="col-sm-4 col-md-3"><div class="thumbnail"><img src="/src/case-thumb-hotel.jpg" alt="..."><div class="caption"><input type="text" placeholder="XX效果图" name="data-title"><input type="text" placeholder="alt属性值" name="data-alt" value="'+JSON.parse(getCookie("siteInfo")).keywords+'"></div></div><span class="btn btn-remove glyphicon glyphicon-trash"></span></div>');
    $("#uploadTab span.btn-remove").off("click").on("click", function(e) {
      e.stopPropagation();
      e.preventDefault();
      $(this).parent().remove();
    });
    $("#uploadTab .thumbnail img").off("click").on("click", function(e) {
      e.stopPropagation();
      e.preventDefault();
      console.log($(this).next().find("[name='data-alt']").val());
    });
  });

  proc_regTabEvent();
  refresh_siteTab();
  refresh_caseList();
});

function proc_regTabEvent() {
  // 标签页关闭按钮点击事件处理函数
  $(".tabRemove").off("click").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    // 已激活标签页对应的标签页内容节点隐藏，即去掉active类
    if($(this).parent().hasClass("active")) {
      $($(this).prev().attr("href")).removeClass("active");

      if($(this).parent().next().find("a").length) {
        $($(this).parent().next().addClass("active").find("a").attr("href")).addClass("active");
      }
      else if($(this).parent().prev().find("a").length) {
        $($(this).parent().prev().addClass("active").find("a").attr("href")).addClass("active");
      }
    }

    $(this).parent().remove();

    // 标签页全部关闭时去掉.list-item激活状态
    if(!$("#pageTabs").children().length) {
      $(".nav-list>.list-item").removeClass("active");
    }

    $(".nav-list").find('[data-target="' + $("#pageTabContent").find(".active").attr("id") + '"]').addClass("active").siblings().removeClass("active");
  });

  // 标签页点击事件处理函数
  $("#pageTabs>li>a").off("click").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    activateTab(this);

    $(".nav-list").find('[data-target="' + $("#pageTabContent").find(".active").attr("id") + '"]').addClass("active").siblings().removeClass("active");
  });
  
}

function activateTab(target) {
  if(!$("#pageTabs").find("a[href='" + $(target).attr("href") + "']").length) {
    // 如果标签页没有打开，则创建并添加标签页
    var tabEle = document.createElement("li");
    tabEle.setAttribute("role", "presentation");
    $(tabEle).append('<span class="pull-left"></span><a href="' + $(target).attr("href") + '" data-toggle="tab">' + $(target).find("span.title").html() + '</a><span class="pull-right glyphicon glyphicon-remove tabRemove" role="button"></span>').find("span.pull-left").addClass($(target).find("span.title").prev().attr("class"));
    $("#pageTabs").append(tabEle);
    proc_regTabEvent();
  }
  // #pageTabContent下没有对应的标签页内容节点，则创建并添加此标签页内容节点
  if(!$("#pageTabContent").find("div[id='" + $(target).attr("data-target") + "']").length) {
    $("#pageTabContent").append('<div role="tabpanel" class="tab-pane" id="' + $(target).attr("data-target") + '"><a href="javascript:test();">click</a></div>');
  }

  $("#pageTabs").find("a[href='" + $(target).attr("href") + "']").tab("show").parent().addClass("active").siblings().removeClass("active");

  if($(target).attr("href") === "#siteTab") {
    refresh_siteTab();
  }
  if($(target).attr("href") === "#uploadTab") {
    refresh_uploadTab();
  }
}

/**
 * ajax更新上传案例标签页
 */
function refresh_uploadTab() {
  var fmd = new FormData();
  fmd.append("token", "refreshUploadTab");
  $.ajax({
    url: "/cms/include/php/handle.php",
    type: "POST",
    data: fmd,
    processData: false,
    contentType: false,   //数据为formData时必须定义此项
    dataType: "json",     //返回json格式数据
    context: $("#uploadTab"),
    success: function(result) {
      var data = JSON.parse(result);
      $(this).find("#cp-title").val(data.title);
      $(this).find("#cp-keywords").val(data.keywords);
      $(this).find("#cp-description").val(data.description);
      $(this).find("#cp-path").val("http://"+data.domain+"/case/");
    },
    error: function(err) {
      console.log("fail: "+err);
    }
  });
}

/**
 * ajax更新网站信息
 */
function refresh_siteTab() {
  var fmd = new FormData();
  fmd.append("token", "getSiteInfo");
  $.ajax({
    url: "/cms/include/php/handle.php",
    type: "POST",
    data: fmd,
    processData: false,
    contentType: false,   //数据为formData时必须定义此项
    dataType: "json",     //返回json格式数据
    context: $(".site-wrap"),
    success: function(result) {
      if(result) {
        var data = JSON.parse(result);
        $(this).find("[id='domain']").val(data.domain);
        $(this).find("[id='title']").val(data.title);
        $(this).find("[id='keywords']").val(data.keywords);
        $(this).find("[id='description']").val(data.description);
        setCookie("siteInfo", result);
      }
      // console.log(getCookie("siteInfo"));
    },
    error: function(err) {
      console.log("fail: "+err);
    }
  }); // ajax_func
}

/**
 * ajax设置网站基本信息，并反馈状态信息
 */
function save_siteInfo() {
  var fmd = new FormData();
  var siteInfo = '{"domain":"'+$("#domain").val()+'", "title": "'+$("#title").val()+'", "keywords": "'+$("#keywords").val()+'", "description": "'+$("#description").val()+'"}';
  fmd.append("token", "setSiteInfo");
  fmd.append("siteInfo", siteInfo);
  $.ajax({
    url: "/cms/include/php/handle.php",
    type: "POST",
    data: fmd,
    processData: false,
    contentType: false,   //数据为formData时必须定义此项
    // dataType: "json",     //返回json格式数据
    context: $(".text-state"),
    success: function(result) {
      // console.log(fmd.siteInfo);
      $(this).addClass("text-success").html(result);
      $(".btn-save").addClass("disabled");
      setTimeout(function() {
        $(".text-state").html("&nbsp;");
      }, 2000);
    },
    error: function(err) {
      console.log("fail: "+err);
    }
  }); // ajax_func
}

/**
 * 保存案例处理函数
 */
function uploadCase() {
  var imgArray = new Array();
  $("#uploadTab .case-thumb").children().each(function() {
    var str = '{"url": "'+$(this).find("img").attr("src")+'", "attr_alt": "'+$(this).find('[name="data-alt"]').val()+'", "attr_title": "'+$(this).find('[name="data-title"]').val()+'"}';
    imgArray.push(str);
  }
  );
  var caseData = '{"page_title": "'+$("#cp-title").val()+'", "meta_keywords": "'+$("#cp-keywords").val()+'", "meta_description": "'+$("#cp-description").val()+'", "case_url": "'+$("#cp-path").val()+'", "case_name": "'+$("#case-title").val()+'", "case_area": "'+$("#case-area").val()+'", "case_address": "'+$("#case-address").val()+'", "case_type": "'+$("#case-class").val()+'", "case_team": "'+$("#case-team").val()+'", "case_company": "'+$("#case-company").val()+'", "case_description": "'+$("#case-description").val()+'", "case_images": ['+imgArray+']}';
  var fmd = new FormData();
  fmd.append("token", "saveCase");
  fmd.append("data", caseData);
  $.ajax({
    url: "/cms/debug.php",
    type: "POST",
    data: fmd,
    processData: false,
    contentType: false,   //数据为formData时必须定义此项
    // dataType: "json",     //返回json格式数据
    context: $(".case-page"),
    success: function(result) {
      // for(var i=0; i<$(this).find(".thumbnail>img").length; i++) {
      //   $(this).find(".thumbnail>img").eq(i).attr("src", JSON.parse(result)[i].url);
      // }
      // console.log(JSON.parse(result)[0].url);
      console.log(result);
    },
    error: function(err) {
      console.log("fail: "+err);
    }
  }); // ajax_func

  // console.log("upload case");
}

/**
 * ajax刷新案例列表
 */
function refresh_caseList() {
  var fmd = new FormData();
  fmd.append("token", "refreshCaseList");
  fmd.append("data", 1);
  $.ajax({
    url: "/cms/include/php/handle.php",
    type: "POST",
    data: fmd,
    processData: false,
    contentType: false,   //数据为formData时必须定义此项
    // dataType: "json",     //返回json格式数据
    context: $("#caseTab>.case-wrap"),
    success: function(result) {
      $(this).find(".panel-group").html(result);
      $(this).find(".panel-collapse .btn").each(function() {
        $(this).off("click").on("click", function() {
          switch($(this).attr("data-token")) {
            case "mark":
              $(this).toggleClass("glyphicon-star-empty").toggleClass("glyphicon-star");
              if($(this).hasClass("glyphicon-star")) {
                console.log("recommonds");
              }
              else {
                console.log("normal");
              }
              break;
            case "edit":
              console.log("edit: " + $(this).parent().attr("data-id"));
              break;
            case "post":
              console.log("post: " + $(this).parent().attr("data-id"));
              break;
            case "remove":
              console.log("remove: " + $(this).parent().attr("data-id"));
              break;
          }
        });
      });
      // console.log(result);
    },
    error: function(err) {
      console.log("fail: "+err);
    }
  }); // ajax_func

  // console.log("refresh case list");
}

function test() {
  console.log("hello world, this is a test!");
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