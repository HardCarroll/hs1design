$(function() {
  // 分页按钮列表
  paginationList({
    token: "refreshPagination_Article",
    url: "/cms/include/php/handle.php",
    target: $("#articleTab>.list-wrap")
  });

  // 文章管理标签页上传按钮
  $("#articleTab .btn-upload").off("click").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    activateTab($(this));
  });

  // 关闭按钮点击事件处理函数
  $(".btn-close").off("click").on("click", function() {
    // clearTabContent({target: $("#uploadArticle")});
    $("#pageTabs").find(".active").children().last().click();
    getCounts({rule: "", target: $(".wrap.total>span.digital")});
    getCounts({rule: "b_posted='F'", target: $(".wrap.unpost>span.digital")});
    getCounts({rule: "b_recommends='T'", target: $(".wrap.marked>span.digital")});
    paginationList({token: "refreshPagination_Article", url: "/cms/include/php/handle.php", target: $("#articleTab>.list-wrap")});
  });

  // 保存按钮点击事件处理函数
  $(".btn-save").off("click").on("click", function() {
    window.editor_upload.sync();
    updateArticle({target: $(this).parent().parent().parent(), token: "updateArticle", id: $(this).parent().parent().parent().attr("data-id")});
  });

  // 删除确认对话框处理函数
  $("#modalConfirm .btn-danger").off("click").on("click", function() {
    var fmd = new FormData();
    fmd.append("token", "removeItem");
    fmd.append("handle", "article");
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

  refreshTabList({page: 1});
});

KindEditor.ready(function(K) {
  window.editor_upload = K.create('#article-content', {
    width: '100%',
    height: '400px',
    resizeType: 0,
    allowFileManager : true,
    items: ['preview', '|', 'undo', 'redo', '|', 'template', 'plainpaste', '|', 'justifyleft', 'justifycenter', 'justifyright', 'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript', 'superscript', 'clearhtml', 'quickformat', '|', 'selectall', 'formatblock', 'fontsize', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image','anchor', 'link', 'unlink', '|', 'source']
  });
  window.editor_edit = K.create('#edit-content', {
    width: '100%',
    height: '400px',
    resizeType: 0,
    allowFileManager : true,
    items: ['preview', '|', 'undo', 'redo', '|', 'template', 'plainpaste', '|', 'justifyleft', 'justifycenter', 'justifyright', 'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript', 'superscript', 'clearhtml', 'quickformat', '|', 'selectall', 'formatblock', 'fontsize', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image','anchor', 'link', 'unlink', '|', 'source']
  });
});

/**
 * ajax刷新案例列表
 * @param {JSON} data:{page: 1, //按10条每页计算，获取第几页的内容
 *                      rule: "b_recommends='T'"  //查询数据库规则
 *                    }
 */
function refreshTabList(data) {
  var fmd = new FormData();
  fmd.append("token", "refreshArticleList");
  if(data) {
    fmd.append("data", JSON.stringify(data));
  }
  $.ajax({
    url: "/cms/include/php/handle.php",
    type: "POST",
    data: fmd,
    processData: false,
    contentType: false,   //数据为formData时必须定义此项
    context: $("#articleTab>.article-wrap"),
    success: function(result) {
      // 先清空内容后再追加
      $(this).html("").append(result);

      // 注册按钮点击事件
      $(this).find(".panel-collapse .btn").each(function() {
        $(this).off("click").on("click", function() {
          switch($(this).attr("data-token")) {
            // 推荐阅读
            case "mark":
              console.log("mark");
              // var fmd = new FormData();
              // fmd.append("token", "markCase");
              // fmd.append("id", $(this).parent().attr("data-id"));
              // $(this).toggleClass("glyphicon-star-empty").toggleClass("glyphicon-star");
              // if($(this).hasClass("glyphicon-star")) {
              //   fmd.append("data", '{"b_recommends": "T"}');
              // }
              // else {
              //   fmd.append("data", '{"b_recommends": "F"}');
              // }
              // $.ajax({
              //   url: "/cms/include/php/handle.php",
              //   type: "POST",
              //   data: fmd,
              //   processData: false,
              //   contentType: false,   //数据为formData时必须定义此项
              //   dataType: "json",     //返回json格式数据
              //   context: $(this),
              //   success: function(result) {
              //     if(JSON.parse(result).err_no) {
              //       $(this).toggleClass("glyphicon-star-empty").toggleClass("glyphicon-star");
              //       alert(JSON.parse(result).err_code);
              //     }
              //     else {
              //       getCounts({rule: "b_recommends='T'", target: $(".wrap.marked>span.digital")});
              //     }
              //   },
              //   error: function(err) {
              //     console.log("fail: "+err);
              //   }
              // });
              break;
            // 编辑案例
            case "edit":
              $("#editArticle").attr("data-id", $(this).parent().attr("data-id"));
              activateTab($(this));
              break;
            // 发布案例
            case "post":
              updateArticle({token: "updateArticle", id: $(this).parent().attr("data-id")});
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
 * 
 * @param {JSON} $argJson
 */
function refreshTabContent(argJson) {
  clearTabContent({target: argJson.target});

  var fmd = new FormData();
  fmd.append("token", "refreshTabContent");
  fmd.append("id", argJson.id);
  $.ajax({
    url: "/cms/include/php/handle.php",
    type: "POST",
    data: fmd,
    processData: false,
    contentType: false,
    dataType: "json",
    context: argJson.target,
    success: function(result) {
      var data = JSON.parse(result);
      if($(this).attr("data-id")) {
        $(this).find("[name='cp-title']").val(data.st_title);
        $(this).find("[name='cp-keywords']").val(data.st_keywords);
        $(this).find("[name='cp-description']").val(data.st_description);
        $(this).find("[name='article-title']").val(data.ct_title);
        $(this).find("[name='article-author']").val(data.ct_author);
        $(this).find("[name='article-class']").val(data.ct_class);
        $(this).find("[name='article-date']").val(data.ct_issue);
        window.editor_upload.html(data.ct_content);
      }
      else {
        $(this).find("[name='cp-title']").val(data.title);
        $(this).find("[name='cp-keywords']").val(data.keywords);
        $(this).find("[name='cp-description']").val(data.description);
      }
    },
    error: function(msg) {
      console.log("fail: " + msg);
    }
  });
}

/**
 * 更新文章处理函数
 * @param {JSON} argJson: 
 * {
 *  target: 目标DOM对象,
 *  token: 请求标识,
 *  id: 数据库记录ID
 * }
 */
function updateArticle(argJson) {
  var fmd = new FormData();
  fmd.append("token", argJson.token);
  if(argJson.id) {
    fmd.append("id", argJson.id);
  }
  if(argJson.target) {
    var jsonData = {
      st_title: argJson.target.find("[name='cp-title']").val(),
      st_keywords: argJson.target.find("[name='cp-keywords']").val(),
      st_description: argJson.target.find("[name='cp-description']").val(),
      ct_title: argJson.target.find("[name='article-title']").val(),
      ct_author: argJson.target.find("[name='article-author']").val(),
      ct_class: argJson.target.find("[name='article-class']").val(),
      ct_issue: argJson.target.find("[name='article-date']").val(),
      ct_content: argJson.target.find("#article-content").val()
    };
    fmd.append("data", JSON.stringify(jsonData));
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
          argJson.target.attr("data-id", JSON.parse(result).err_code);
        }
        if(JSON.parse(result).err_code === "已成功发布") {
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
 * 实时获取数据库对应条件的记录数
 * @param {JSON} argJson {rule: 数据库查询条件, target: 目标DOM对象}
 */
function getCounts(argJson) {
  var fmd = new FormData();
  fmd.append("token", "getArticleCounts");
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
 * 清除案例编辑、上传标签页的内容
 * @param {JSON} argJson: JSON形式参数
 */
function clearTabContent(argJson) {
  argJson.target.find("input").val("");
  argJson.target.find("textarea").val("");
  argJson.target.find("select").val(0);
  window.editor_upload.html("");
  argJson.target.find(".btn-save").removeClass("disabled");
}

/**
 * 转换日期为指定分隔符字符串
 * @param {JSON} jsonData 
 */
function transferDateString(jsonData) {
  var dd = new Date(jsonData.dateString);
  var sep = jsonData.seperator ? jsonData.seperator : "-";
  var result = dd.getFullYear()+sep+("0"+(dd.getMonth()+1)).slice(-2)+sep+("0"+dd.getDate()).slice(-2);
  return result;
}