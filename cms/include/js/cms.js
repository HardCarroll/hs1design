$(function(){
  // 右侧导航列表点击事件处理
  $(".list-item").on("click", function() {
    if($(this).find("ul[class='slide-menu']").length) {
      // 如果是下拉菜单，则点击会切换状态
      $(this).toggleClass("active").siblings().removeClass("active");
    }
    else if(!$("#pageTabs").find("a[href='" + $(this).find("span.title").attr("data-target") + "']").length) {
      // 如果标签页没有打开，则创建标签页
      var eleItem = document.createElement("li");
      eleItem.setAttribute("role", "presentation");
      $(eleItem).append('<span class="pull-left glyphicon glyphicon-file"></span><a href="' + $(this).find("span.title").attr("data-target") + '" data-toggle="tab">' + $(this).find("span.title").html() + '</a><span class="pull-right glyphicon glyphicon-remove"role="button"></span>');
      $("#pageTabs").append(eleItem);
    }

    var targetEle = $("#pageTabs").find("a[href='" + $(this).find("span.title").attr("data-target") + "']");
    activeTab(targetEle);

    // console.log($(this).find("ul[class='slide-menu']").length);
  });

  $(".slide-menu>li").on("click", function(e) {
    e.stopPropagation();
    $(this).addClass("active").siblings().removeClass("active");
    var str = '<div class="modal fade" id="modPwd" tabindex="-1" role="dialog" aria-labelledby="modPwdLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="modPwdLabel">修改用户密码</h4></div><div class="modal-body"><form><div class="form-group"><label for="old-pwd" class="control-label">旧密码:</label><input type="password" class="form-control" id="old-pwd" name="old-pwd" required></div><div class="form-group"><label for="new-pwd1" class="control-label">新的密码:</label><input type="password" class="form-control" id="new-pwd1" name="new-pwd1" required></div><div class="form-group"><label for="new-pwd2" class="control-label">确认新密码:</label><input type="password" class="form-control" id="new-pwd2" name="new-pwd2" required></div></form></div><div class="modal-footer"><span class="tips"></span><button type="button" class="btn btn-default" data-dismiss="modal">取消</button><button type="button" class="btn btn-primary" id="btn_ok">确认</button></div></div></div></div>';
    $('body').append(str);
    $("#modPwd").modal({"backdrop": "static"});
    $("#modPwd").on("hidden.bs.modal", function (e) {
      e.target.remove();
      $(".slide-menu>li").removeClass("active");
    });
  });

  registeTabRemove();

});

function registeTabRemove() {
  $("span.glyphicon-remove").on("click", function() {
    if($(this).parent().hasClass("active")) {
      $($(this).prev().attr("href")).removeClass("active in");
    }
    $(this).parent().remove();
  });
}

function activeTab(target) {
  registeTabRemove();
  $(target).tab("show").parent().addClass("active").siblings().removeClass("active");

  // $("#pageTabs a[href='#profile']").tab('show');

  // console.log($(target).children().eq(1));
}