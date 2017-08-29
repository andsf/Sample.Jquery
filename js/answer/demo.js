$(function() {
  $('.jq-get-btn').on('click', function () {
    var value = $(this).parent().find("input[name='get']").val();
    $.ajax({
      type: 'get',
      url: 'http://ajax.sample.com',
      datatype: 'json',
      data:{data: value}
    }).done(function (data) {
      $('.jq-response-disp').append('<div>リクエストタイプ：'+data['REQUEST_TYPE']+'</div>');
      $('.jq-response-disp').append('<div>入力データ：'+data['data']+'</div>');
    })
  })
  
  $('.jq-post-btn').on('click', function () {
    var value = $(this).parent().find("input[name='post']").val();
    $.ajax({
      type: 'post',
      url: 'http://ajax.sample.com',
      datatype: 'json',
      data:{data: value}
    }).done(function (data) {
      $('.jq-response-disp').append('<div>リクエストタイプ：'+data['REQUEST_TYPE']+'</div>');
      $('.jq-response-disp').append('<div>入力データ：'+data['data']+'</div>');
    })
  })
  
});