$(function() {
  $('input[name="memberId"]').on('change', function() {
    if ($(this).is(':checked')) {
      var memberId = $(this).val();
      $.ajax({
        type: 'post',
        url : '../src/demo.php',//request path 
        datatype: 'json',
        data: {request: memberId}
      }).done(function (data) {
        console.log(data.radio.checked);
        $('input[name=radio_botton]:eq('+data.radio.checked+')').prop('checked', true);
        var texts = data.text;
        console.log(texts);
        for (var i in texts) {
          $('input[name='+i+']').val(texts[i]);
        }
      })
    }
  })
});