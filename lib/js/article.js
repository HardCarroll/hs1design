$(function() {
  paginationClick({
    object: $("#news-pagination").children(),
    url: "/cms/debug.php",
    data: '{"token": "test", "value": "hello world"}',
    target: $("#test")
  });
})