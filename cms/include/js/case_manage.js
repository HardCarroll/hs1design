$(function() {
  // 分页按钮列表
  paginationList({
    token: "refreshPagination",
    url: "/cms/include/php/handle.php",
    target: $("#caseTab>.list-wrap")
  });

  // 案例管理标签页上传按钮
  $("#caseTab .btn-upload").off("click").on("click", function(e) {
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
        refresh_caseList({page: 1, rule: "b_posted='F'"});
        paginationList({token: "refreshPagination", url: "/cms/include/php/handle.php", target: $("#caseTab>.list-wrap"), rule: "b_posted='F'"});
      }
      if($(this).hasClass("marked")) {
        refresh_caseList({page: 1, rule: "b_recommends='T'"});
        paginationList({token: "refreshPagination", url: "/cms/include/php/handle.php", target: $("#caseTab>.list-wrap"), rule: "b_recommends='T'"});
      }
    });
  });

  // 添加图片按钮点击事件
  $(".case-thumb>div>.btn").off("click").on("click", function(e) {
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

  // 关闭按钮点击事件处理函数
  $(".btn-close").off("click").on("click", function() {
    $("#pageTabs").find(".active").children().last().click();
    getCounts({rule: "", target: $(".wrap.total>span.digital")});
    getCounts({rule: "b_posted='F'", target: $(".wrap.unpost>span.digital")});
    getCounts({rule: "b_recommends='T'", target: $(".wrap.marked>span.digital")});
    paginationList({token: "refreshPagination", url: "/cms/include/php/handle.php", target: $("#caseTab>.list-wrap")});
  });

  // 保存按钮点击事件处理函数
  $(".btn-save").off("click").on("click", function() {
    // if($(this).parent().parent().parent().attr("id") === "uploadTab") {
    //   updateCase({target: $("#uploadTab"), token: "uploadCase", flag: "os"});
    // }
    // if($(this).parent().parent().parent().attr("id") === "editTab") {
    //   updateCase({target: $("#editTab"), token: "updateCase", id: $("#editTab").attr("data-cid")});
    // }
    updateCase({target: $(this).parent().parent().parent(), token: "updateCase", id: $(this).parent().parent().parent().attr("data-cid")});
  });

  // 发布按钮点击事件处理函数
  // $(".btn-post").off("click").on("click", function() {
  //   if($(this).parent().parent().parent().attr("id") === "uploadTab") {
  //     if($(this).prev().hasClass("disabled")) {
  //       updateCase({target: $("#uploadTab"), token: "uploadCase", flag: "op"});
  //     }
  //     else {
  //       updateCase({target: $("#uploadTab"), token: "uploadCase", flag: "sp"});
  //     }
  //   }
  //   if($(this).parent().parent().parent().attr("id") === "editTab") {
  //     // updateCase({target: $("#editTab"), token: "updateCase", id: $("#editTab").attr("data-cid")});
  //   }
  // });

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
 * ajax更新上传\编辑案例标签页
 * @param {JSON} argJson
 * {
 *  target: 目标DOM对象,
 *  id: 数据库记录ID
 * }
 */
function refresh_uploadTab(argJson) {
  clearTabContent({target: argJson.target});
  var fmd = new FormData();
  fmd.append("token", "refreshUploadTab");
  fmd.append("cid", argJson.id);
  $.ajax({
    url: "/cms/include/php/handle.php",
    type: "POST",
    data: fmd,
    processData: false,
    contentType: false,   //数据为formData时必须定义此项
    dataType: "json",     //返回json格式数据
    context: argJson.target,
    success: function(result) {
      var data = JSON.parse(result);
      if($(this).attr("data-cid")) {
        $(this).find("[name='cp-title']").val(data.p_title);
        $(this).find("[name='cp-keywords']").val(data.p_keywords);
        $(this).find("[name='cp-description']").val(data.p_description);
        $(this).find("[name='case-title']").val(data.c_title);
        $(this).find("[name='case-area']").val(data.c_area);
        $(this).find("[name='case-class']").val(data.c_class);
        $(this).find("[name='case-address']").val(data.c_address);
        $(this).find("[name='case-team']").val(data.c_team);
        $(this).find("[name='case-company']").val(data.c_company);
        $(this).find("[name='case-description']").val(data.c_description);
        for(var i in data.c_image) {
          if(data.c_image.length < $(this).find(".case-thumb").children().length) {
            $(this).find(".case-thumb").children().eq(0).remove();
          }
          proc_addPictures($(this).find(".case-thumb>div>div.btn"), data.c_image[i]);
        }
      }
      else {
        $(this).find("[name='cp-title']").val(data.title);
        $(this).find("[name='cp-keywords']").val(data.keywords);
        $(this).find("[name='cp-description']").val(data.description);
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
 *                      rule: "b_recommends='T'"  //查询数据库规则
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
                fmd.append("data", '{"b_recommends": "T"}');
              }
              else {
                fmd.append("data", '{"b_recommends": "F"}');
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
                    getCounts({rule: "b_recommends='T'", target: $(".wrap.marked>span.digital")});
                  }
                },
                error: function(err) {
                  console.log("fail: "+err);
                }
              });
              break;
            // 编辑案例
            case "edit":
              $("#editTab").attr("data-cid", $(this).parent().attr("data-id"));
              activateTab($(this));
              // console.log("edit: " + $(this).parent().attr("data-id"));
              break;
            // 发布案例
            case "post":
              updateCase({token: "updateCase", id: $(this).parent().attr("data-id")});
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
 * 更新案例处理函数
 * @param {JSON} argJson: 
 * {
 *  target: 目标DOM对象,
 *  token: 请求标识,
 *  id: 数据库记录ID
 * }
 */
function updateCase(argJson) {
  var fmd = new FormData();
  fmd.append("token", argJson.token);
  if(argJson.id) {
    fmd.append("id", argJson.id);
  }
  if(argJson.target) {
    var imgArray = new Array();
    argJson.target.find(".case-thumb").children().not(":last").each(function() {
      var str = '{"url": "'+$(this).find("img").attr("src")+'", "attr_alt": "'+$(this).find('[name="data-alt"]').val()+'", "attr_title": "'+$(this).find('[name="data-title"]').val()+'"}';
      imgArray.push(str);
    });
    var caseData = '{"p_title": "'+argJson.target.find("[name='cp-title']").val()+'", "p_keywords": "'+argJson.target.find("[name='cp-keywords']").val()+'", "p_description": "'+argJson.target.find("[name='cp-description']").val()+'", "c_title": "'+argJson.target.find("[name='case-title']").val()+'", "c_area": "'+argJson.target.find("[name='case-area']").val()+'", "c_address": "'+argJson.target.find("[name='case-address']").val()+'", "c_class": "'+argJson.target.find("[name='case-class']").val()+'", "c_team": "'+argJson.target.find("[name='case-team']").val()+'", "c_company": "'+argJson.target.find("[name='case-company']").val()+'", "c_description": "'+argJson.target.find("[name='case-description']").val()+'", "c_image": ['+imgArray+']}';
    fmd.append("data", caseData);
  }
  $.ajax({
    url: "/cms/include/php/handle.php",
    type: "POST",
    data: fmd,
    processData: false,
    contentType: false,   //数据为formData时必须定义此项
    dataType: "json",     //返回json格式数据
    success: function(result) {
      if(!JSON.parse(result).err_no) {
        if(argJson.target) {
          argJson.target.find("span.btn-save").addClass("disabled");
          argJson.target.attr("data-cid", JSON.parse(result).err_code);
        }
        if(JSON.parse(result).err_code === "案例已成功发布") {
          alert(JSON.parse(result).err_code);
          location.reload(true);
        }
      }
      console.log(JSON.parse(result));
    },
    error: function(err) {
      console.log("fail: "+err);
    }
  }); // ajax_func
}

/**
 * 清除案例编辑、上传标签页的内容
 * @param {JSON} argJson: JSON形式参数
 */
function clearTabContent(argJson) {
  argJson.target.find("input[type='text']").val("");
  argJson.target.find("textarea").val("");
  argJson.target.find("select").val(0);
  argJson.target.find(".case-thumb").children().not(":last-child").remove();
  argJson.target.find(".btn-save").removeClass("disabled");
}