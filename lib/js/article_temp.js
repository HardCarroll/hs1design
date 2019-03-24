$(function() {
  refresh_recommends();
});

/**
 * ajax 刷新推荐列表
 */
function refresh_recommends() {
  $.ajax({
    url: "/cms/include/php/handle.php",
    type: "POST",
    data: "token=refreshRecommends&handle=article",
    processData: false,
    // contentType: false,   //数据为formData时必须定义此项
    // dataType: "json",     //返回json格式数据
    context: $(".recommends>div.list-group"),
    success: function(result) {
      if(result) {
        $(this).html("").html(result);
      }
    },
    error: function(err) {
      console.log("fail: "+err);
    }
  });
}