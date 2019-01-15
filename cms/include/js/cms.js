$(function(){
  $(".slide-head").on("click", function() {
    $(this).parent().toggleClass("active");
    $(this).children().eq(2).toggleClass("glyphicon-menu-down");
  });

  $(".list-item").on("click", function() {
    // var ele = '<li role="presentation><span class="glyphicon glyphicon-">'
    var ele = '<li role="presentation"><a href="#profile" data-toggle="tab">' + $(this).html() + '</a><span class="pull-right glyphicon glyphicon-remove"role="button"></span></li>';

    // $("#pageTabs").append(ele).children().removeClass("active").last().addClass("active");
    $("#pageTabs").append(ele);

    $("#pageTabs>li>span.glyphicon-remove").on("click", function() {
      if($(this).parent().hasClass("active") && $(this).parent().next().html()) {
        $(this).parent().next().addClass("active");
        $($(this).parent().next().children().eq(0).attr("href")).addClass("active in");
      }
      $($(this).prev().attr("href")).remove();
      $(this).parent().remove();
  
      
      // console.log($(this).parent().hasClass("active"));
    });

    console.log($(this).html());
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

  $("#pageTabs>li>span.glyphicon-remove").on("click", function() {
    if($(this).parent().hasClass("active") && $(this).parent().next().html()) {
      $(this).parent().next().addClass("active");
      $($(this).parent().next().children().eq(0).attr("href")).addClass("active in");
    }
    $($(this).prev().attr("href")).remove();
    $(this).parent().remove();

    
    // console.log($(this).parent().hasClass("active"));
  });


});