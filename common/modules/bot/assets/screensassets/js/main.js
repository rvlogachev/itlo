/*
 Основной скрипт виджета
 */

function findquestion() {


    $('.messages-list').append('<li class="message clearfix findquestion"> ' +
        ' <div class="media-body message-bot">' +
        ' <div class="message-text" style="background: rgb(240, 239, 239);"><p><span>Может быть вы искали?</span>' +
        '</p>' +
        '<div class="message-tail">' +
        '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="24" viewBox="0 0 25 24">' +
        '<g>' +
        '<path d="M19,2a11.921,11.921,0,0,1-6.86,7.5c-5.8,2.317-8.38,1.5-8.38,1.5l16,6" style="fill: rgb(240, 239, 239);"></path>' +
        '</g>' +
        '</svg>' +
        '</div>' +
        '</div>' +
        '</div> ' +
        '<div class="message-buttons-bot media-body media-hint">' +
        '<ul class="buttons-list">  ' +
        '<li class="btn-width btn-width-1"> ' +
        '<p>Подсказка: <span id="txtHint"></span></p> ' +
        ' </li> ' +
        '</ul>' +
        '</div>' +
        '</li>');
}

$(document).ready(function () {

   // console.log('document-domain');
    //document.domain = 'ritual.ru';
    $(".send-message-input").keyup(function (event) {

        if (event.keyCode == 13) {
            //call send data function here
         // console.log('отправка по ентер: ---- ' );
            $(".send-message-trig-style").click();

        }



    });
    $(".send-message-input").on('input keyup', function (e) {
        str($(this).val())
    });
    $('.send-message-menu').on("click", function () {



        switch ($('.send-message-menu-but').attr('style')) {
            case 'display:block;':
                $('.send-message-menu-but').attr('style', 'display:none;');
                break;

            case 'display:none;':
                $('.send-message-menu-but').attr('style', 'display:block;');
                break;
        }

    });
    $('.send-message-trig-style').on("click", function () {

     // console.log('отправить нажали: ---- ' );


       text = $('.send-message-input').val();


      sendMes(text );

      $('.findquestion').remove();


        //sendMessageUser(text);
      ScrollMsg();

    });


    $('#restart').on("click", function () {
      Restart();

      setTimeout(function () {
        ScrollMsg();
      }, 500 );

    });

    $(document).on('click', '.btn-width', function (event) {
       // console.log('нажали кнопку');
        sendMes($(this).find('> a').text());
    });

    $(document).on('click', '.btnScreen', function (event) {

        btn = $(this).data('callback');
        txt = $(this).text();


        SendScreen(btn, txt);
        ScrollMsg();
    });

    $(document).on('click', '.close-chat-exit', function (event) {

      window.parent.postMessage( {
        ev: 'closewidget',
      }, "*");

  });

    $(document).on('click', '.send-message-menu', function (event) {

   // console.log();
    if ($('.send-message-menu-but').is(":visible")) {

      $('<li class="message clearfix empty"> <div class="media-body  "> ' +
        '<div  > <p>&nbsp; </p> ' +
        '</div></div></li>').appendTo('.messages-list').hide().fadeOut(4000);
      // $('.messages-list').append('<li class="message clearfix empty"> <div class="media-body  "> ' +
      //   '<div  > <p>&nbsp; </p> ' +
      //   '</div></div></li>');


      ScrollMsg();

    } else {
      $('.empty').remove().fadeIn(4000);
    }

  });

  var timer;

  clearTimeout(timer);

  $.ajax({
    type: "get",
    url: "/frontend/web/chat/default/gettimeout",
    headers: {
      "Access-Control-Allow-Origin": "ritual.ru",
      "Access-Control-Allow-Headers": "origin, content-type, accept"
    },
    error: function (data) {
      console.log(data);
    },
    success: function (data) {
      data = JSON.parse(data);

      if (data.result) {

//        console.log( 'timeout triggers '+data.data);
  //      console.log( 'window.snowchat '+window.snowchat);

        setTimeout(function () {

          window.parent.postMessage( {
            ev: 'triggers',
          }, "*");

       //    console.log( 'Показали виджет');




        }, data.data );


      }

    }
  });

  var url = (window.location != window.parent.location)
    ? document.referrer
    : document.location.href;
//  console.log('url for gettimeoutscreen: '+url);

  //console.log('url d: '+url);
 // console.log('показ виджета по таймауту');
  $.ajax({
    type: "get",
    url: "/frontend/web/chat/default/gettimeoutscreen",
    headers: {
      "Access-Control-Allow-Origin": "*",
      "Access-Control-Allow-Headers": "origin, content-type, accept"
    },
    data: {
      key: url
    },
    error: function (data) {
      console.log(data);
    },
    success: function (data) {
      data = JSON.parse(data);
//      console.log( data );
      if (data.result) {

      //  console.log( data.data);
      //  console.log( 'gettimeoutscreen function');
        setTimeout(function () {

          window.parent.postMessage( {
            ev: 'timeout',
          }, "*");

          ScrollMsg();

        //   console.log('timeout');
        }, data.data );


      }

    }
  });


  ScrollMsg();



  //
  // if (window.addEventListener) {
  //   window.addEventListener("message", listener);
  // } else {
  //   // IE8
  //   window.attachEvent("onmessage", listener);
  // }
  //
  // window.addEventListener("message", receiveMessage, false);
});
// $(function() {
//   window.onload = function() {
//     // create listener
//
//     function receiveMessage(e) {
//       console.log('recieve'+e.data.event_id);
//       document.documentElement.style.setProperty('--header_bg', e.data.wl.header_bg);
//       document.documentElement.style.setProperty('--header_text', e.data.wl.header_text);
//       document.documentElement.style.setProperty('--button_bg', e.data.wl.button_bg);
//       //alert(e.data.data.header_bg);
//     }
//     console.log('addlistener');
//     window.addEventListener('message', receiveMessage);
//     // call parent
//     console.log('call');
//     parent.postMessage("GetWhiteLabel","*");
//   }
// });

// function receiveMessage(event)
// {
//   console.log('listenerrecieve');
//   if (event.origin !== "http://example.org:8080")
//     return;
//
//
// }
// function listener(event) {
//   console.log(event);
//   if (event.origin != 'https://ritual.ru') {
//     // что-то прислали с неизвестного домена - проигнорируем..
//     return;
//   }
//
//   alert( "получено: " + event.data );
// }
// window.addEventListener('message', function(event) {
//   console.log(event);
//   // IMPORTANT: Check the origin of the data!
//   if (~event.origin.indexOf('https://ritual.ru')) {
//     // The data has been sent from your site
//
//     // The data sent with postMessage is stored in event.data
//     console.log('test');
//     console.log(event.data);
//   } else {
//     // The data hasn't been sent from your site!
//     // Be careful! Do not use it.
//     return;
//   }
// },false);



function showWidget() {
  console.log(document.parent);
  localStorage.setItem('snowchat', true);
  height = window.parent.document.getElementById('infomarket_widget_iframe').getAttribute('height');
  if (height  < 0 && !window.parent.snowchat) {
    window.parent.document.getElementById('widget_button_img').click();
  }

}

function findquestion() {


    $('.messages-list').append('<li class="message clearfix findquestion"> ' +
        ' <div class="media-body message-bot">' +
        ' <div class="message-text" style="background: rgb(240, 239, 239);"><p><span>Может быть вы искали?</span>' +
        '</p>' +
        '<div class="message-tail">' +
        '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="24" viewBox="0 0 25 24">' +
        '<g>' +
        '<path d="M19,2a11.921,11.921,0,0,1-6.86,7.5c-5.8,2.317-8.38,1.5-8.38,1.5l16,6" style="fill: rgb(240, 239, 239);"></path>' +
        '</g>' +
        '</svg>' +
        '</div>' +
        '</div>' +
        '</div> ' +
        '<div class="message-buttons-bot media-body media-hint">' +
        '<ul class="buttons-list">  ' +
        '<li class="btn-width btn-width-1"> ' +
        '<p>Подсказка: <span id="txtHint"></span></p> ' +
        ' </li> ' +
        '</ul>' +
        '</div>' +
        '</li>');
}

// function sendMessageUser(message) {
//     $('.messages-list').append("<li  class='message clearfix'><div  class='media-body message-my'>" +
//         "<div  class='message-text' style='background: lightpink;'><p >" + message + "<span   class='emoji-mart-emoji' style='vertical-align: top; margin-right: 2px;'> </span></p> <div  class='message-tail'><svg  xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='25' height='24' viewBox='0 0 25 24'><g ><path  d='M19,2a11.921,11.921,0,0,1-6.86,7.5c-5.8,2.317-8.38,1.5-8.38,1.5l16,6' style='fill: lightpink;'></path></g></svg></div></div></div> </li> ");
//     $('.messages-wrapper').scrollTop($(document).height());
//     ScrollMsg();
// }
//
// function sendMessageBotGoogle(text) {
//     $('.messages-list').children().last().html();
//     $('.messages-list').append("<li class='message clearfix'> <div class='media-body message-bot'> <div class='message-text' style='background: rgb(240, 239, 239);'> <p ><span >" + text + " </span> </p> <div class='message-tail'> <svg xmlns='http://www.w3.org/2000/svg'  xmlns:xlink='http://www.w3.org/1999/xlink' width='25' height='24'  viewBox='0 0 25 24'>  <g > <path   d='M19,2a11.921,11.921,0,0,1-6.86,7.5c-5.8,2.317-8.38,1.5-8.38,1.5l16,6' style='fill: rgb(240, 239, 239);'></path></g></svg></div></div> </div> ");
//     $('.messages-wrapper').scrollTop($(document).height());
//     ScrollMsg();
// }

function sendMessageUser(message) {
  $("<li  class='message clearfix'><div  class='media-body message-my'>" +
    "<div  class='message-text' style='background: lightpink;'><p >" + message +
    "<span   class='emoji-mart-emoji' style='vertical-align: top; margin-right: 2px;'> " +
    "</span></p> <div  class='message-tail'><svg  xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='25' height='24' viewBox='0 0 25 24'>" +
    "<g ><path  d='M19,2a11.921,11.921,0,0,1-6.86,7.5c-5.8,2.317-8.38,1.5-8.38,1.5l16,6' style='fill: lightpink;'></path></g></svg>" +
    "</div></div></div> </li> ").appendTo('.messages-list').hide().fadeIn(1000);
  ScrollMsg();
}

function sendMessageBotGoogle(text) {

  $("<li class='message clearfix'> <div class='media-body message-bot'> <div class='message-text' style='background: rgb(240, 239, 239);'> <p >" +
    "<span >" + text + " </span> </p> <div class='message-tail'> " +
    "<svg xmlns='http://www.w3.org/2000/svg'  xmlns:xlink='http://www.w3.org/1999/xlink' width='25' height='24'  viewBox='0 0 25 24'>  <g > " +
    "<path   d='M19,2a11.921,11.921,0,0,1-6.86,7.5c-5.8,2.317-8.38,1.5-8.38,1.5l16,6' style='fill: rgb(240, 239, 239);'></path></g></svg>" +
    "</div></div> </div>").appendTo(".messages-list").hide().fadeIn(1000);
  //$('.messages-wrapper').scrollTop($(document).height());
  ScrollMsg();

}

function sendOperatorOnline(text,img) {
  $("<li  class='message clearfix'><div  class='media-body operator-online'>" +
    text+"<img src='"+img+"'>" +"</div> </li> ").appendTo('.messages-list').hide().fadeIn(1000);
  ScrollMsg();
}

function sendOperatorOffline(text) {

  $("<li  class='message clearfix'><div  class='media-body operator-offline'>" +
    text+"</div> </li> ").appendTo('.messages-list').hide().fadeIn(1000);
  ScrollMsg();

}

function sendMessageBot(text) {

    $('.messages-list').children().last().html();
    $('.messages-list').append("<li class='message clearfix'> <div class='media-body message-botgoogle'> <div class='message-text' style='background: rgb(240, 239, 239);'> <p ><span >" + text + " </span> </p> <div class='message-tail'> <svg xmlns='http://www.w3.org/2000/svg'  xmlns:xlink='http://www.w3.org/1999/xlink' width='25' height='24'  viewBox='0 0 25 24'>  <g > <path   d='M19,2a11.921,11.921,0,0,1-6.86,7.5c-5.8,2.317-8.38,1.5-8.38,1.5l16,6' style='fill: rgb(240, 239, 239);'></path></g></svg></div></div> </div> ");
    $('.messages-wrapper').scrollTop($(document).height());
    ScrollMsg();
}

function sendMessageImage(url, alt) {

    //$('.messages-list').children().last().html();

  $('<li class="message clearfix"><div class="media-body message-bot"><div class="message-img-wrapper"><div class="message-img">' +
    '<img src="' + url + '" alt="' + alt + '"></div></div> </div> <!----> <!----></li>').appendTo('.messages-list').hide().fadeIn(500);

  //  $('.messages-list').append('');
    //$('.messages-wrapper').scrollTop($(document).height());
    ScrollMsg();
}

function getClientByCookie(cookie, text) {


    $.ajax({
        type: "get",
        url: "/frontend/web/chat/default/getclientbycookie",
        data: {
            cookie: cookie
        },
        error: function (data) {
            console.log(data);
        },
        success: function (data) {
            data = JSON.parse(data);
            console.log('старта');
            if (data.result) {

                getDialogByClient(data.data, text, cookie);

            }


        }
    });


}

function getDialogByClient(client_id, text, cookie) {


    $.ajax({
        type: "get",
        url: "/frontend/web/chat/default/getdialogbyclient",
        data: {
            client_id: client_id
        },
        error: function (data) {
            console.log(data);
        },
        success: function (data) {
            data = JSON.parse(data);
           // console.log('уровень 2');
            if (data.result) {
                addMessage(text, data.data, 'user', 'in', 366, cookie);
            }

        }
    });

}

function ScrollMsg() {
    var objDiv = $('.messages-wrapper');
    if (objDiv.length > 0) {
        objDiv[0].scrollTop = objDiv[0].scrollHeight;
    }
}

function addClient(cookie, text) {

    var client_id = false;

    $.ajax({
        type: "get",
        url: "/frontend/web/chat/default/addclientsdb",

        data: {
            cookie: cookie
        },
        error: function (data) {
            console.log(data);
        },
        success: function (data) {
            data = JSON.parse(data);

            if (data.result) {

                addDialog(data.data, text);
            }


        }
    });


}

function addDialog(clients_id, text) {
    $.ajax({
        type: "get",
        url: "/frontend/web/chat/default/adddialogdb",
        data: {
            clients_id: clients_id
        },
        error: function (data) {
            console.log(data);
        },
        success: function (data) {
            data = JSON.parse(data);
            if (data.result) {
                addMessage(text, data.data, 'user', 'in', 366);
            }
        }
    });

}

function addMessage(text, dialogs_id, from, type, widget_id, cookie) {

    $.ajax({
        type: "get",
        url: "/frontend/web/chat/default/send-messagedb",
        data: {
            message: text,
            dialogs_id: dialogs_id,
            from: from,
            type: type,
            widget_id: widget_id
        },
        error: function (data) {
            console.log(data);
        },
        success: function (data) {
            data = JSON.parse(data);
            if (data.result) {


            }

        }
    });

}

function addMessageDb(text, dialogs_id, from, type, widget_id) {

    $.ajax({
        type: "get",
        url: "/frontend/web/chat/default/send-messagedb",
        data: {
            message: text,
            dialogs_id: dialogs_id,
            from: from,
            type: type,
            widget_id: widget_id
        },
        error: function (data) {
            console.log(data);
        },
        success: function (data) {
            data = JSON.parse(data);
            if (data.result) {
                console.log('сообщение добавлено в базу');

            }

        }
    });

}



function Printing() {


    $("<li  class='message clearfix printing'><div  class='media-body message-bot '><!----> <div  class='message-text' style='background: rgb(240, 239, 239);'><div  class='loader ball-beat'><div ></div> <div ></div> <div ></div></div> <div  class='message-tail'><svg  xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='25' height='24' viewBox='0 0 25 24'><g ><path  d='M19,2a11.921,11.921,0,0,1-6.86,7.5c-5.8,2.317-8.38,1.5-8.38,1.5l16,6' style='fill: rgb(240, 239, 239);'></path></g></svg></div></div></div> <!----> <!----></li>").appendTo('.messages-list').hide().fadeIn(3000);
}

function EndPrinting() {
    $('.printing').remove();
}

function str(value) {
    if (value.length == 3 || value.length == 4 || value.length == 5 || value.length == 6 || value.length == 7 || value.length == 8 || value.length == 9 || value.length == 10 || value.length == 11   ) {
        $.ajax({
            type: "get",
            url: "/chat/default/findquestionbyvalue",
            data: {
                value: value,

            },
            error: function (data) {

            },
            success: function (data) {

                text = JSON.parse(data)

                //console.log(text[0]);
                if (text[0] == 'нет подходящих вопросов') {
                    $('.findquestion').remove();
                    $('#txtHint').html(text[0]);
                } else {


                    $('.findquestion').remove();

                    findquestion();

                    if (text[0]) {

                        sendBtn('.media-hint > .buttons-list', text[0]);
                        if (text[1]) {
                          sendBtn('.media-hint > .buttons-list', text[1]);

                        }
                        if (text[2]) {
                          sendBtn('.media-hint > .buttons-list', text[2]);
                        }



                        ScrollMsg();
                    }


                }


            }
        });
    }
}

function sendBtn(toclass, question, size = 1) {


    // $('.media-hint > .buttons-list').append(
    //   ' <li class="btn-width btn-width-1"> <a target="_blank" ' +
    //   'class="btn btn-default btn-sm" style="color: #ad5a55; border-color: #ad5a55;">'
    //   +question+' </a>' +
    //   '</li>  ' )

    $(toclass).append(
        '  <li class="btn-width btn-width-' + size + '">' +
        '<a  target="_blank" class="btn btn-default btn-sm" ' +
        'style="color: #ad5a55; border-color: #ad5a55;">' + question + '</a> </li> ');
}

function sendButton(buttons) {


    txt = '<div class="message-buttons-bot media-body">' +
        '<ul class="buttons-list">';
    btn = '';
    $.each(buttons, function (index, value) {
        switch (value.size) {
            case 'big':
                size = 1;
                break;

            case 'middle':
                size = 2;
                break;
            default:
                size = 3;
        }
       // console.log(value.text);
        if (value.type == 'ReplyKeyboardMarkup') {
            txt1 = '<ul class="buttons-list">';
            btn1 = '<li class=" btnScreen btn-width-' + size + '">' +
                '<a class="btn btn-default btn-sm" id="restart" style="color: #ad5a55; border-color: #ad5a55; background-color: rgb(255, 255, 255);"><span>' + value.text + ' </span></a></li>';
            txtend1 = '</ul>';
            $('.send-message-menu-but').html(txt1 + btn1 + txtend1);
        } else {
          if (value.type == 'InlineKeyboardMarkup_url') {
            btn = btn + '<li   class="    btn-width-' + size + '">' +
              '<a class="btn btn-default btn-sm" href="' + value.callback_data + '" target="_blank" style="color: #ad5a55; border-color: #ad5a55; background-color: rgb(255, 255, 255);"><span>' +
              value.text + ' </span></a></li>';
          } else {
            btn = btn + '<li data-callback="' + value.callback_data + '" class="  btnScreen btn-width-' + size + '">' +
              '<button class="btn btn-default btn-sm"  style="color: #ad5a55; border-color: #ad5a55; background-color: rgb(255, 255, 255);"><span>' +
              value.text + ' </span></button></li>';
          }
        }

    });

    txtend = '</ul>' + '</div>';


    $('.message').last().append(txt + btn + txtend);
}

function sendDefaultReplyButton() {
    txt = '<ul class="buttons-list">';
    btn = '<li class="btn-width btn-width-1">' +
        '<a class="btn btn-default btn-sm" id="restart" style="color: #ad5a55; border-color: #ad5a55; background-color: rgb(255, 255, 255);"><span>Перезапуск </span></a></li>';
    txtend = '</ul>';
    $('.send-message-menu-but').html(txt + btn + txtend);

}

function set_cookie(name, value, exp_y, exp_m, exp_d, path, domain, secure) {
    var cookie_string = name + "=" + escape(value);

    if (exp_y) {
        var expires = new Date(exp_y, exp_m, exp_d);
        cookie_string += "; expires=" + expires.toGMTString();
    }

    if (path)
        cookie_string += "; path=" + escape(path);

    if (domain)
        cookie_string += "; domain=" + escape(domain);

    if (secure)
        cookie_string += "; secure";

    document.cookie = cookie_string;
}

function delete_cookie(cookie_name) {
    var cookie_date = new Date();  // Текущая дата и время
    cookie_date.setTime(cookie_date.getTime() - 1);
    document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
}

function get_cookie(cookie_name) {
    var results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');

    if (results)
        return ( unescape(results[2]) );
    else
        return null;
}



