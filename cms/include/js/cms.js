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
  $(".nav-list>.list-item").off("click").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    if(!$(this).hasClass("active")) {
      window.location.href = $(this).attr("href");
    }
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

  regTabEvent();
  // refresh_caseList({page: "1", rule: "c_recommends=1"});
});

/**
 * 添加图片处理函数
 * @param {Object} target
 * @param {JSON} img
 */
function proc_addPictures(target, img) {
  // 添加图片节点
  $(target).parent().before('<div class="col-sm-4 col-md-3"><div class="thumbnail"><input type="file" style="display:none;"><img><div class="caption"><input type="text" placeholder="图片名称(如：效果图)" name="data-title"><input type="text" placeholder="图片alt属性(SEO关键词)" name="data-alt" value="'+JSON.parse(getCookie("siteInfo")).keywords+'"></div></div><span class="btn btn-remove glyphicon glyphicon-trash"></span></div>');
  // 更改图片路径
  $(target).parent().prev().find("img").attr("src", img.url);
  if(img.attr_title) {
    $(target).parent().prev().find("[name='data-title']").val(img.attr_title);
  }
  if(img.attr_alt) {
    $(target).parent().prev().find("[name='data-alt']").val(img.attr_alt);
  }
  // 注册图片删除按钮事件
  $(target).parent().prev().find("span.btn-remove").off("click").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).parent().remove();
  });
}

function activateTab(target) {
  // 如果此标签页没有打开，则创建并打开标签页
  if(!$("#pageTabs").find("li[href='" + $(target).attr("href") + "']").length) {
    var tabEle = '<li role="presentation" href="'+$(target).attr("href")+'">';
    tabEle += '<span class="pull-left '+$(target).find("span.title").prev().attr("class")+'"></span>';
    tabEle += '<span class="title">'+$(target).find("span.title").html()+'</span>';
    tabEle += '<span class="pull-right glyphicon glyphicon-remove tabRemove" role="button"></span>';
    tabEle += '</li>';
    $("#pageTabs").append(tabEle);
    regTabEvent();
  }
  // 激活当前标签页
  $("#pageTabs").find("li[href='" + $(target).attr("href") + "']").addClass("active").siblings().removeClass("active");
  $($(target).attr("href")).addClass("active").siblings().removeClass("active");

  // 更新左侧导航栏激活状态
  $(".nav-list").find('[href="#' + $("#pageTabContent").find(".active").attr("id") + '"]').addClass("active").siblings().removeClass("active");

  if($(target).attr("href") === "#siteTab") {
    refresh_siteTab();
  }
  if($(target).attr("href") === "#caseTab") {
    refresh_caseList({page: 1});
  }
  if($(target).attr("href") === "#uploadTab") {
    refresh_uploadTab($("#uploadTab").attr("data-cid"));
  }
}

function regTabEvent() {
  // 标签页关闭按钮点击事件处理函数
  $(".tabRemove").off("click").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    // 已激活标签页对应的标签页内容节点隐藏，即去掉active类
    if($(this).parent().hasClass("active")) {
      $($(this).parent().attr("href")).removeClass("active");

      if($(this).parent().next().length) {
        $($(this).parent().next().addClass("active").attr("href")).addClass("active");
      }
      else if($(this).parent().prev().length) {
        $($(this).parent().prev().addClass("active").attr("href")).addClass("active");
      }
    }

    // 删除当前标签页节点
    $(this).parent().remove();

    // 更新左侧导航栏激活状态
    $(".nav-list").find('[href="#' + $("#pageTabContent").find(".active").attr("id") + '"]').addClass("active").siblings().removeClass("active");
    
    if($("#pageTabs").find(".active").attr("href") === "#caseTab") {
      refresh_caseList({page: 1});
    }
  });

  // 标签页点击事件处理函数
  $("#pageTabs>li").off("click").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    activateTab($(this));
  });
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