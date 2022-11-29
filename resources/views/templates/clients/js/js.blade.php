<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



function loadCart(data) {
    $(".item-cart").empty();
    $(".item-cart").html(data);
    if ($('#totalQuanty').val()) {
        $('.cart_counter').text($("#totalQuanty").val());
    } else {
        $('.cart_counter').text(0);
    }
    if ($('#totalPrice').data('price')) {
        $('.carsub').text($('#totalPrice').data('price'));
    } else {
        $('.carsub').text(' 0đ');
    }
}

function loadCartItem(data) {
    $("#cart").empty();
    $("#cart").html(data);
    if ($('#totalQuanty1').val()) {
        $('#priceTotal').text('(' + $("#totalQuanty1").val() + ' Món)');
    } else {
        $('#priceTotal').text(0);
    }
}





//đăng nhập với tài khoản
$(document).on('click', '#loginAcc', function(e) {
    e.preventDefault();
    let email = $('.emailAcc').val();
    let password = $('.passwordAcc').val();
    $.ajax({
        url: "{{ route('post.login')}}",
        type: 'post',
        data: {
            email: email,
            password: password

        },
        success: function(data) {
            if (data == true) {
                location.reload();
                toastr.options.timeOut = 30;
                toastr.success('Đăng nhập thành công');
            } else {
                $('.massage').empty()
                $('.massage').append(data.loginAcc)
                $('.massage').show().delay(3000).fadeOut()
            }

        }
    });
})

$(document).on('click', '.sendComments', function(e) {
    e.preventDefault()
    let textContent = $('.content-commment')
    let content = textContent.val()
    let url = $(this).attr('href');
    let list_commment = $('.review-list');

    if (content) {
        $.ajax({
            url: url,
            type: 'post',
            data: {
                content: content,
            },
            success: function(data) {
                if (data) {
                    list_commment.html(data)
                }
            }
        });
    } else {
        textContent.addClass('danger')
        toastr.error('Bình luận không được bỏ trống.')
    }
})

$(document).on('click', '.reply_commment', function(e) {
    e.preventDefault()
    let id_rep = $(this).data('id')
    $('.form-rep-' + id_rep).slideToggle();
})

$(document).on('click', '.sendCommentsReply', function(e) {
    e.preventDefault()
    let id = $(this).data('id')
    let textContent = $('.content-' + id)
    let content = textContent.val()
    let url = $(this).attr('href');
    let list_commment = $('.review-list');

    if (content) {
        $.ajax({
            url: url,
            type: 'post',
            data: {
                content: content,
                id_reply: id
            },
            success: function(data) {
                if (data) {
                    console.log(data)
                    list_commment.html(data)
                }
            }
        });
    } else {
        textContent.addClass('danger')
        toastr.error('Bình luận không được bỏ trống.')
    }

})

$(document).on('click', '.reply_commment.delete', function(e) {
    e.preventDefault()
    let url = $(this).attr('href');
    let list_commment = $('.review-list');
    $.ajax({
        url: url,
        type: 'get',
        success: function(data) {
            if (data) {
                list_commment.html(data)
            }
        }
    });
})




$(document).on('click', '.up_user', function(e) {
    e.preventDefault()
    if ($(this).hasClass('btn-primary')) {
        $('.update_user').submit()
    } else {
        let form = document.querySelector('.form-upuser');
        form.classList.add('editing')
        $(this).addClass('btn-primary')
        $(this).text('Lưu')
    }

})

$(document).on('click', '.btn-wishlist', function(e) {
    e.preventDefault()
    let url = $(this).attr('href')
    console.log(url)
    $.ajax({
            method: 'post',
            url: url,
        })
        .done(function(results) {
            toastr.info(results.message);
        });
});
</script>
