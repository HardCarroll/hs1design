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
  });

  // 网站信息标签页输入框输入内容
  $(".siteWrap input").on("input", function() {
    $(".btn-save").removeClass("disabled");
  });

  // 案例管理标签页上传按钮
  $(".caseWrap>.case-head>.btn").on("click", function() {
    activateTab($(this));
  });

  $(".caseWrap .panel-collapse .btn").each(function() {
    $(this).off("click").on("click", function() {
      if($(this).hasClass("glyphicon-star") || $(this).hasClass("glyphicon-star-empty")) {
        $(this).toggleClass("glyphicon-star-empty").toggleClass("glyphicon-star");
        if($(this).hasClass("glyphicon-star")) {
          console.log("recommonds");
        }
        else {
          console.log("normal");
        }
      }
    });
  });

  proc_regTabEvent();
  refresh_siteInfo();
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
    refresh_siteInfo();
  }
}
/**
 * ajax更新网站信息
 */
function refresh_siteInfo() {
  var fmd = new FormData();
  fmd.append("token", "getSiteInfo");
  $.ajax({
    url: "/cms/include/php/handle.php",
    type: "POST",
    data: fmd,
    processData: false,
    contentType: false,   //数据为formData时必须定义此项
    dataType: "json",     //返回json格式数据
    context: $(".siteWrap"),
    success: function(result) {
      if(result) {
        var data = JSON.parse(result);
        $(this).find("input[id='domain']").val(data.domain);
        $(this).find("input[id='title']").val(data.title);
        $(this).find("input[id='keywords']").val(data.keywords);
        $(this).find("input[id='description']").val(data.description);
      }
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
 * ajax刷新案例列表
 */
function refresh_caseList() {
  console.log("refresh case list");
}

function test() {
  console.log("hello world, this is a test!");
}