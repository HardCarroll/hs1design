$(function() {
  // 案例管理标签页上传按钮
  $("#caseTab>.case-head>.btn").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    activateTab($(this));
  });

  // 添加图片按钮点击事件
  $("#uploadTab .case-thumb>div>.btn").off("click").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    // 本地上传按钮
    if($(this).hasClass("btn-local")) {
      $(this).prev().off("change").on("change", function(e) {
        var fmd = new FormData();
        fmd.append("token", "uploadFiles");
        for(var i in e.target.files) {
          fmd.append("files["+i+"]", e.target.files[i]);
        }
        $.ajax({
          url: "/cms/include/php/handle.php",
          type: "POST",
          data: fmd,
          processData: false,
          contentType: false,
          dataType: "json",
          context: $(this),
          success: function(img_path) {
            for(var i in img_path) {
              proc_addPictures($(this), JSON.parse(img_path[i]));
            }
            $(this).val("");
          },
          error: function(err) {
            console.log(err);
          }
        });
      }).click();
    }
    // 远程图片按钮
    if($(this).hasClass("btn-remote")) {
      proc_addPictures($(this), {url: "/src/case-thumb-hotel.jpg"});
    }
    // 网络图片按钮
    if($(this).hasClass("btn-online")) {
      proc_addPictures($(this), {url: "https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1548685758785&di=9457da526fb1b08a4eae2c8bbd66913f&imgtype=0&src=http%3A%2F%2Fimgsrc.baidu.com%2Fimgad%2Fpic%2Fitem%2Fb8389b504fc2d562e613fdc4ec1190ef76c66cfb.jpg"});
    }
  });

  // 保存按钮点击事件处理函数
  $(".btn-save").off("click").on("click", function() {
    uploadCase("os");
  });

  // 发布按钮点击事件处理函数
  $(".btn-post").off("click").on("click", function() {
    // 
  });

  refresh_caseList({page: "1"});

});

/**
 * ajax更新上传案例标签页
 */
function refresh_uploadTab(cid) {
  var fmd = new FormData();
  fmd.append("token", "refreshUploadTab");
  fmd.append("cid", cid);
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
      if($(this).attr("data-cid")) {
        $(this).find("#cp-title").val(data.p_title);
        $(this).find("#cp-keywords").val(data.p_keywords);
        $(this).find("#cp-description").val(data.p_description);
        $(this).find("#case-title").val(data.c_title);
        $(this).find("#case-area").val(data.c_area);
        $(this).find("#case-class").val(data.c_class);
        $(this).find("#case-address").val(data.c_address);
        $(this).find("#case-team").val(data.c_team);
        $(this).find("#case-company").val(data.c_company);
        $(this).find("#case-description").val(data.c_description);
        // for(var i=0; i<$(this).find(".case-thumb").children().length-1; i++) {
        //   $(this).find(".case-thumb").children(i).remove();
        // }
        for(var i in data.c_image) {
          if(data.c_image.length < $(this).find(".case-thumb").children().length) {
            $(this).find(".case-thumb").children().eq(0).remove();
          }
          proc_addPictures($(this).find(".case-thumb>div>div.btn"), data.c_image[i]);
        }
      }
      else {
        $(this).find("#cp-title").val(data.title);
        $(this).find("#cp-keywords").val(data.keywords);
        $(this).find("#cp-description").val(data.description);
      }
    },
    error: function(err) {
      console.log("fail: "+err);
    }
  });
}

/**
 * ajax刷新案例列表
 * @param {JSON} data:{page: 1, //按10条每页计算，获取第几页的内容
 *                      rule: "c_recommends=1"  //查询数据库规则
 *                    }
 */
function refresh_caseList(data) {
  var fmd = new FormData();
  fmd.append("token", "refreshCaseList");
  if(data) {
    fmd.append("data", JSON.stringify(data));
  }
  $.ajax({
    url: "/cms/include/php/handle.php",
    type: "POST",
    data: fmd,
    processData: false,
    contentType: false,   //数据为formData时必须定义此项
    // dataType: "json",     //返回json格式数据
    context: $("#caseTab>.case-wrap"),
    success: function(result) {
      // 先清空内容后再追加
      $(this).html("").append(result);

      // 注册按钮点击事件
      $(this).find(".panel-collapse .btn").each(function() {
        $(this).off("click").on("click", function() {
          switch($(this).attr("data-token")) {
            case "mark":
              $(this).toggleClass("glyphicon-star-empty").toggleClass("glyphicon-star");
              if($(this).hasClass("glyphicon-star")) {
                console.log("recommonds: " + $(this).parent().attr("data-id"));
              }
              else {
                console.log("normal " + $(this).parent().attr("data-id"));
              }
              $.ajax({
                url: "/cms/include/php/handle.php",
                type: "POST",
                data: fmd,
                processData: false,
                contentType: false, //数据为formData时必须定义此项
                success: function(result) {},
                error: function(err) {
                  console.log("fail: "+err);
                }
              });
              break;
            case "edit":
              activateTab($(this));
              console.log("edit: " + $(this).parent().attr("data-id"));
              break;
            case "post":
              console.log("post: " + $(this).parent().attr("data-id"));
              break;
            case "remove":
              var fmd = new FormData();
              fmd.append("token", "removeCase");
              fmd.append("data", $(this).parent().attr("data-id"));
              $.ajax({
                url: "/cms/include/php/handle.php",
                post: "POST",
                data: fmd,
                processData: false,
                contentType: false, //数据为formData时必须定义此项
                success: function(result) {
                  console.log(result);
                },
                error: function(err) {
                  console.log("fail: "+err);
                }
              });
              // console.log("remove: " + $(this).parent().attr("data-id"));
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

/**
 * 上传案例处理函数
 * @param {string} flag: 上传案例分类请求标签
 */
function uploadCase(flag) {
  var imgArray = new Array();
  $("#uploadTab .case-thumb").children().not(":last").each(function() {
    var str = '{"url": "'+$(this).find("img").attr("src")+'", "attr_alt": "'+$(this).find('[name="data-alt"]').val()+'", "attr_title": "'+$(this).find('[name="data-title"]').val()+'"}';
    imgArray.push(str);
  });
  
  var caseData = '{"p_title": "'+$("#cp-title").val()+'", "p_keywords": "'+$("#cp-keywords").val()+'", "p_description": "'+$("#cp-description").val()+'", "c_path": "", "c_title": "'+$("#case-title").val()+'", "c_area": "'+$("#case-area").val()+'", "c_address": "'+$("#case-address").val()+'", "c_class": "'+$("#case-class").val()+'", "c_team": "'+$("#case-team").val()+'", "c_company": "'+$("#case-company").val()+'", "c_description": "'+$("#case-description").val()+'", "c_image": ['+imgArray+'], "c_recommends": 0, "c_posted": '+((flag==="sp" || flag==="op" || flag==="up")?1:0)+'}';
  var fmd = new FormData();
  fmd.append("token", "uploadCase");
  fmd.append("flag", flag);
  fmd.append("data", caseData);
  $.ajax({
    url: "/cms/include/php/handle.php",
    type: "POST",
    data: fmd,
    processData: false,
    contentType: false,   //数据为formData时必须定义此项
    dataType: "json",     //返回json格式数据
    // context: $(".case-page"),
    success: function(result) {
      console.log(result);
    },
    error: function(err) {
      console.log("fail: "+err);
    }
  }); // ajax_func

  // console.log("upload case");
}