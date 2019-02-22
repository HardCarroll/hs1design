$(function() {
  // 分页按钮列表
  paginationList({
    token: "refreshPagination",
    url: "/cms/include/php/handle.php",
    target: $("#caseTab>.list-wrap")
  });

  // 案例管理标签页上传按钮
  $("#caseTab .btn-upload").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    activateTab($(this));
  });

  // 案例管理标签页上分类按钮处理函数
  $(".overview .wrap").each(function() {
    $(this).off("click").on("click", function(e) {
      e.stopPropagation();
      e.preventDefault();
      if($(this).hasClass("total")) {
        refresh_caseList({page: 1, rule: ""});
        paginationList({token: "refreshPagination", url: "/cms/include/php/handle.php", target: $("#caseTab>.list-wrap"), rule: ""});
      }
      if($(this).hasClass("unpost")) {
        refresh_caseList({page: 1, rule: "c_posted=0"});
        paginationList({token: "refreshPagination", url: "/cms/include/php/handle.php", target: $("#caseTab>.list-wrap"), rule: "c_posted=0"});
      }
      if($(this).hasClass("marked")) {
        refresh_caseList({page: 1, rule: "c_recommends=1"});
        paginationList({token: "refreshPagination", url: "/cms/include/php/handle.php", target: $("#caseTab>.list-wrap"), rule: "c_recommends=1"});
      }
    });
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
      // proc_addPictures($(this), {url: "/src/case-thumb-hotel.jpg"});
      alert("此功能正在开发中，敬请期待！");
    }
    // 网络图片按钮
    if($(this).hasClass("btn-online")) {
      // proc_addPictures($(this), {url: "https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1548685758785&di=9457da526fb1b08a4eae2c8bbd66913f&imgtype=0&src=http%3A%2F%2Fimgsrc.baidu.com%2Fimgad%2Fpic%2Fitem%2Fb8389b504fc2d562e613fdc4ec1190ef76c66cfb.jpg"});
      alert("此功能正在开发中，敬请期待！");
    }
  });

  // 保存按钮点击事件处理函数
  $(".btn-save").off("click").on("click", function() {
    uploadCase("os");
  });

  // 发布按钮点击事件处理函数
  $(".btn-post").off("click").on("click", function() {
    if($(this).prev().hasClass("disabled")) {
      uploadCase("op");
    }
    else {
      uploadCase("sp");
    }
  });

  // 删除确认对话框处理函数
  $("#modalConfirm .btn-danger").off("click").on("click", function() {
    var fmd = new FormData();
    fmd.append("token", "removeCase");
    fmd.append("id", $(this).attr("data-id"));
    $.ajax({
      url: "/cms/include/php/handle.php",
      type: "POST",
      data: fmd,
      processData: false,
      contentType: false,   //数据为formData时必须定义此项
      dataType: "json",     //返回json格式数据
      context: $(this),
      success: function(result) {
        if(!JSON.parse(result).err_no) {
          location.reload(true);
        }
      },
      error: function(err) {
        console.log("fail: "+err);
      }
    });
  });

  refresh_caseList({page: 1});

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
        $(this).find("#ucp-title").val(data.p_title);
        $(this).find("#ucp-keywords").val(data.p_keywords);
        $(this).find("#ucp-description").val(data.p_description);
        $(this).find("#ucase-title").val(data.c_title);
        $(this).find("#ucase-area").val(data.c_area);
        $(this).find("#ucase-class").val(data.c_class);
        $(this).find("#ucase-address").val(data.c_address);
        $(this).find("#ucase-team").val(data.c_team);
        $(this).find("#ucase-company").val(data.c_company);
        $(this).find("#ucase-description").val(data.c_description);
        for(var i in data.c_image) {
          if(data.c_image.length < $(this).find(".case-thumb").children().length) {
            $(this).find(".case-thumb").children().eq(0).remove();
          }
          proc_addPictures($(this).find(".case-thumb>div>div.btn"), data.c_image[i]);
        }
      }
      else {
        $(this).find("#ucp-title").val(data.title);
        $(this).find("#ucp-keywords").val(data.keywords);
        $(this).find("#ucp-description").val(data.description);
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
    context: $("#caseTab>.case-wrap"),
    success: function(result) {
      // 先清空内容后再追加
      $(this).html("").append(result);

      // 注册按钮点击事件
      $(this).find(".panel-collapse .btn").each(function() {
        $(this).off("click").on("click", function() {
          switch($(this).attr("data-token")) {
            // 推荐阅读
            case "mark":
              var fmd = new FormData();
              fmd.append("token", "markCase");
              fmd.append("id", $(this).parent().attr("data-id"));
              $(this).toggleClass("glyphicon-star-empty").toggleClass("glyphicon-star");
              if($(this).hasClass("glyphicon-star")) {
                fmd.append("data", '{"c_recommends": 1}');
              }
              else {
                fmd.append("data", '{"c_recommends": 0}');
              }
              $.ajax({
                url: "/cms/include/php/handle.php",
                type: "POST",
                data: fmd,
                processData: false,
                contentType: false,   //数据为formData时必须定义此项
                dataType: "json",     //返回json格式数据
                context: $(this),
                success: function(result) {
                  if(JSON.parse(result).err_no) {
                    $(this).toggleClass("glyphicon-star-empty").toggleClass("glyphicon-star");
                    alert(JSON.parse(result).err_code);
                  }
                  else {
                    getCounts({rule: "c_recommends=1", target: $(".wrap.marked>span.digital")});
                  }
                },
                error: function(err) {
                  console.log("fail: "+err);
                }
              });
              break;
            // 编辑案例
            case "edit":
              activateTab($(this));
              console.log("edit: " + $(this).parent().attr("data-id"));
              break;
            // 发布案例
            case "post":
              var fmd = new FormData();
              fmd.append("token", "postCase");
              fmd.append("data", $(this).parent().attr("data-id"));
              $.ajax({
                url: "/cms/include/php/handle.php",
                type: "POST",
                data: fmd,
                processData: false,
                contentType: false,   //数据为formData时必须定义此项
                dataType: "json",     //返回json格式数据
                success: function(result) {
                  if(!JSON.parse(result).err_no) {
                    refresh_caseList({page: 1});
                    getCounts({rule: "c_posted=0", target: $(".wrap.unpost>span.digital")});
                    alert("案例已成功发布！");
                  }
                },
                error: function(err) {
                  console.log("fail: "+err);
                }
              });
              break;
            // 删除案例
            case "remove":
              $("#modalConfirm").modal("show").find(".btn-danger").attr("data-id", $(this).parent().attr("data-id"));
              break;
          }
        });
      });
    },
    error: function(err) {
      console.log("fail: "+err);
    }
  }); // ajax_func

}

/**
 * 实时获取数据库对应条件的记录数
 * @param {JSON} argJson {rule: 数据库查询条件, target: 目标DOM对象}
 */
function getCounts(argJson) {
  var fmd = new FormData();
  fmd.append("token", "getCounts");
  fmd.append("rule", argJson.rule);
  $.ajax({
    url: "/cms/include/php/handle.php",
    type: "POST",
    data: fmd,
    processData: false,
    contentType: false,   //数据为formData时必须定义此项
    context: argJson.target,
    success: function(result) {
      $(this).html("").html(result);
    },
    error: function(err) {
      console.log("fail: "+err);
    }
  });
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
  
  var caseData = '{"p_title": "'+$("#ucp-title").val()+'", "p_keywords": "'+$("#ucp-keywords").val()+'", "p_description": "'+$("#ucp-description").val()+'", "c_path": "", "c_title": "'+$("#ucase-title").val()+'", "c_area": "'+$("#ucase-area").val()+'", "c_address": "'+$("#ucase-address").val()+'", "c_class": "'+$("#ucase-class").val()+'", "c_team": "'+$("#ucase-team").val()+'", "c_company": "'+$("#ucase-company").val()+'", "c_description": "'+$("#ucase-description").val()+'", "c_image": ['+imgArray+'], "c_recommends": 0, "c_posted": '+((flag==="sp" || flag==="op" || flag==="up")?1:0)+'}';
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
    context: $("#uploadTab span.btn-save"),
    success: function(result) {
      if(!JSON.parse(result).err_no) {
        $(this).addClass("disabled");
        if(JSON.parse(result).err_code === "案例已成功发布！") {
          location.reload(true);
        }
      }
      // console.log(JSON.parse(result));
    },
    error: function(err) {
      console.log("fail: "+err);
    }
  }); // ajax_func
}