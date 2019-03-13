$(function() {
  // 关闭按钮点击事件处理函数
  $(".btn-close").off("click").on("click", function() {
    clearTabContent({target: $("#uploadArticle")});
    $("#pageTabs").find(".active").children().last().click();
  });
  // 保存按钮点击事件处理函数
  $(".btn-save").off("click").on("click", function() {
    window.editor.sync();
    var jsonData = {
      p_title: $("[name='cp-title']").val(),
      p_keywords: $("[name='cp-keywords']").val(),
      p_description: $("[name='cp-description']").val(),
      a_title: $("[name='article-title']").val(),
      a_author: $("[name='article-author']").val(),
      a_class: $("[name='article-class']").val(),
      a_issue: $("[name='article-date']").val(),
      a_content: $("#article-content").val()
    };
    var fmd = new FormData();
    fmd.append("token", "updateArticle");
    fmd.append("data", JSON.stringify(jsonData));
    $.ajax({
      url: "/cms/include/php/handle.php",
      type: "POST",
      data: fmd,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(res) {
        console.log(res);
      },
      error: function(msg) {
        console.log("fail: " + msg);
      }
    });
  });
  $(".btn-post").off("click").on("click", function() {
    editor.html("hello world");
  });

});

KindEditor.ready(function(K) {
  window.editor = K.create('#article-content', {
    width: '100%',
    height: '400px',
    resizeType: 0,
    allowFileManager : true,
    items: ['preview', '|', 'undo', 'redo', '|', 'template', 'plainpaste', '|', 'justifyleft', 'justifycenter', 'justifyright', 'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript', 'superscript', 'clearhtml', 'quickformat', '|', 'selectall', 'formatblock', 'fontsize', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image','anchor', 'link', 'unlink', '|', 'source']
  });
});

/**
 * 
 * @param {JSON} $argJson
 */
function refreshTabContent(argJson) {
  clearTabContent({target: argJson.target});

  var fmd = new FormData();
  fmd.append("token", "refreshTabContent");
  fmd.append("aid", argJson.id);
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
      if($(this).attr("data-aid")) {
        $(this).find("[name='cp-title']").val(data.p_title);
        $(this).find("[name='cp-keywords']").val(data.p_keywords);
        $(this).find("[name='cp-description']").val(data.p_description);
        $(this).find("[name='article-title']").val(data.a_title);
        $(this).find("[name='article-author']").val(data.a_author);
        $(this).find("[name='article-class']").val(data.a_class);
        $(this).find("[name='article-date']").val(data.a_issue);
        window.editor.html(data.a_content);
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
 * 清除案例编辑、上传标签页的内容
 * @param {JSON} argJson: JSON形式参数
 */
function clearTabContent(argJson) {
  argJson.target.find("input").val("");
  argJson.target.find("textarea").val("");
  argJson.target.find("select").val(1);
  window.editor.html("");
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