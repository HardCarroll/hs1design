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
    var target = $(this).find("span.title").attr("data-target");
      // 如果是下拉菜单，则点击会切换状态
    $(this).toggleClass("active").siblings().removeClass("active");
    if(!$("#pageTabs").find("a[href='#" + target + "']").length) {
      // 如果标签页没有打开，则创建并添加标签页
      var tabEle = document.createElement("li");
      tabEle.setAttribute("role", "presentation");
      $(tabEle).append('<span class="pull-left"></span><a href="#' + target + '" data-toggle="tab">' + $(this).find("span.title").html() + '</a><span class="pull-right glyphicon glyphicon-remove tabRemove" role="button"></span>').find("span.pull-left").addClass($(this).find("span.title").prev().attr("class"));
      $("#pageTabs").append(tabEle);
      proc_regTabEvent();
    }

    // #pageTabContent下没有对应的标签页内容节点，则创建并添加此标签页内容节点
    if(!$("#pageTabContent").find("div[id='" + target + "']").length) {
      $("#pageTabContent").append('<div role="tabpanel" class="tab-pane" id="' + target + '"><a href="javascript:test();">click</a></div>');
    }

    var targetEle = $("#pageTabs").find("a[href='#" + target + "']");
    activateTab(targetEle);

    // console.log($(this).find("ul[class='slide-menu']").length);
  });

  // 功能未完成！！！！！！
  // $("#pageTabs>li").on("click", function(e) {
  //   // e.stopPropagation();
  //   $(".nav-list").find('[data-target = ' + $("#pageTabs").find(".active").attr("data-target") + ']').parent().parent().addClass("active").siblings().removeClass("active");
  //   console.log(16);
  // });

  $(".slide-menu>li").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).addClass("active").siblings().removeClass("active");
    var str = '<div class="modal fade" id="modPwd" tabindex="-1" role="dialog" aria-labelledby="modPwdLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="modPwdLabel">修改用户密码</h4></div><div class="modal-body"><form><div class="form-group"><label for="old-pwd" class="control-label">旧密码:</label><input type="password" class="form-control" id="old-pwd" name="old-pwd" required></div><div class="form-group"><label for="new-pwd1" class="control-label">新的密码:</label><input type="password" class="form-control" id="new-pwd1" name="new-pwd1" required></div><div class="form-group"><label for="new-pwd2" class="control-label">确认新密码:</label><input type="password" class="form-control" id="new-pwd2" name="new-pwd2" required></div></form></div><div class="modal-footer"><span class="tips"></span><button type="button" class="btn btn-default" data-dismiss="modal">取消</button><button type="button" class="btn btn-primary" id="btn_ok">确认</button></div></div></div></div>';
    $('body').append(str);
    $("#modPwd").modal({"backdrop": "static"});
    $("#modPwd").on("hidden.bs.modal", function (e) {
      e.target.remove();
      $(".slide-menu>li").removeClass("active");
    });
  });

  proc_regTabEvent();
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

    $(".nav-list").find('[data-target="' + $("#pageTabContent").find(".active").attr("id") + '"]').parent().parent().addClass("active").siblings().removeClass("active");
  });

  // 标签页点击事件处理函数
  $("#pageTabs>li>a").off("click").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    activateTab(this);
    $(".nav-list").find('[data-target="' + $("#pageTabContent").find(".active").attr("id") + '"]').parent().parent().addClass("active").siblings().removeClass("active");
  });
  
}

function activateTab(target) {
  $(target).tab("show").parent().addClass("active").siblings().removeClass("active");
}

function test() {
  console.log("hello world, this is a test!");
}