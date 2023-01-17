

$(document).ready(function () {


console.log($.cookie());




  $(document).on('click', '.expand-icon', function (event) {

  //  alert("jax");

    var id = $(this).parent().attr('id');
    $.ajax({
      type: "get",
      data: {
        "id": id,
      },
      url: "/backend/web/bot/screens/screen-expanded",
      error: function (data) {
        console.log(data);
      },
      success: function (data) {
        data = JSON.parse(data);
        if (data.result) {
          //setTimeout(function () {
          console.log('  в сокет отправлено');
          //
          //   $.pjax.reload({container: '#pjaxdialog'});
          //   console.log('прокрутка');
          //
          // }, 2000);
        }
      }
    });
  });



});




function getScreen(undefined, item) {


  $.ajax({
    type: "get",
    url: "/backend/web/bot/screens/screen",
    data: {
      "id": item.id,
    },
    dataType: "json",
    success: function (data) {

      $('#cont').html(data);
    }
  });

  console.log(item);
}

