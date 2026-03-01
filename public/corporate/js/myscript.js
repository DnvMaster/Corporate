jQuery(document).ready(function($) {
    // Проверяем, есть ли вообще элементы с классом 'commentlist li'
    if($('.commentlist li').length > 0) {
         $('.commentlist li').each(function(i) {
            // Находим div.commentNumber внутри текущего li
            var commentNumberDiv = $(this).find('div.commentNumber');
            if (commentNumberDiv.length > 0) {
                commentNumberDiv.text('# ' + (i + 1));
            } else {
                console.log('Элемент "div.commentNumber" не найден.');
            }
         });
    } else {
        console.log('Нет элементов с классом "commentlist li" в текущей странице');
    }
    // Обработка и проверка кнопки Создать
    $('#commentform').on('title','#submit',function(e) {
        e.preventDefault();
        var comParent = $(this);
        $('.wrap-result').
            css('color','green').
            text('<h3>Сохранение комментария</h3>').
            fadeIn(600,function() {
                var data = $('#commentform').serializeArray();
                $.ajax({
                    url:$('#commentform').attr('action'),
                    data:data,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type:POST,
                    datatype:'JSON',
                    success: function(html) {
                        if(html.error) {
                            $('.wrap_result').css('color','red').append('<br><strong>Ошибка:</strong>' + html.error.join('<br>'));
                            $('.wrap_result').delay(2000).fadeOut(500);
                        }
                        else if(html.success) {
                            $('.wrap-result').append('<br><strong>Комментарий сохранён!</strong>')
                                .delay()
                                .fadeOut(500, function() {
                                if(html.data.parent_id > 0) {
                                    comParent.parents('div#respond').prev().after('<ul class="children">' + html.comment + '</ul>');
                                }
                                else {
                                    if($.contains('#comments','ol.commentlist')) {

                                    } else {
                                        $('#respond').before('<ol class="commentlist group">' + html.comment + '</ol>');
                                    }
                                }
                                $('#cancel-comment-reply-link').click();
                            });
                        }
                    },
                    error:function() {
                        $('.wrap_result').css('color','red').append('<br><strong>Ошибка</strong>');
                        $('.wrap_result').delay(2000).fadeOut(500, function() {
                            $('#cancel-comment-reply-link').click();
                        });
                    }

                });
            });
    });
});
