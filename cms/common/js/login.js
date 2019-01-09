$(function(){
  // 账号密码输入框(#in_account, #in_password)
  // 输入内容变化处理函数
  $("#in_account, #in_password").on("input", function(){
    if($(this).next().hasClass("hidden")) {
      $(this).next().removeClass("hidden");
    }
    else {
      if(!$(this).val()) {
        $(this).next().addClass("hidden");
      }
    }
  });
  // 获取焦点处理函数
  $("#in_account, #in_password").focus(function(e){
    if($(this).val()) {
      setTimeout(function(){
        $(e.target).next().removeClass("hidden");
      }, 100, e.target);
    }
  });
  // 失去焦点处理函数
  $("#in_account, #in_password").blur(function(e){
    setTimeout(function(){
      $(e.target).next().addClass("hidden");
    }, 100, e.target);
  });
  // 清空按钮(.empty-value)点击处理函数
  $(".empty-value").on("click", function(){
    $(this).addClass("hidden").prev().val("").focus();
  });
  // 登录按钮(.btn-login)点击处理函数
  $(".btn-login").on("click", function(e){
    e.stopPropagation();
    e.preventDefault();
    var fmd_login = new FormData();
    fmd_login.append('token', 'login');
    fmd_login.append('data', '{"uid":"'+$("#in_account").val()+'", "pwd": "'+$("#in_password").val()+'"}');
    $.ajax({
      url: "/cms/common/php/handle.php",
      type: "POST",
      data: fmd_login,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(result) {
        if (result.href) {
          window.location.href = result.href;
        }
        else {
          $("#out_message").html(result.err_code);
        }
        console.log("success: " + result.err_code);
      },
      error: function(msg) {
        console.log("fail: " + msg);
      }

    });
    // $("#out_message").removeClass().addClass("text-warning");
  });
});