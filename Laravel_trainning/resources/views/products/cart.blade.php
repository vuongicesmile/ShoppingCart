<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Show cart</title>
</head>
<body>
<div class="cart_wrapper">
    @include('products.components.cart_component')
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    function cartUpdate(event)
    {
        event.preventDefault();
        let urlUpdateCart = $('.update_cart_url').data('url');
        let id =$(this).data('id');
        let quantity =$(this).parents('tr').find('input.quantity').val();

        $.ajax({
            type:"GET",
            url:urlUpdateCart,
            data: {id: id, quantity: quantity},
            success: function (data) {
                if (data.code=== 200) {
                    $('.cart_wrapper').html(data.cart_component);
                    alert('Câp nhật thành công');
                }
            },
            error: function () {}
        });

    }
    function cartDelete(event) {
        event.preventDefault();
        let urlDelete=$('.cart').data('url');
        let id = $(this).data('id');
        $.ajax({
            type:"GET",
            url:urlDelete,
            data: {id: id},
            success: function (data) {
                if (data.code=== 200) {
                    $('.cart_wrapper').html(data.cart_component);
                    alert('Xoá thành công');
                }
            },
            error: function () {}
        });

    }
    $(function (){
        $(document).on('click','.cart_update',cartUpdate);
        $(document).on('click','.cart_delete',cartDelete);
    })
</script>
</body>
</html>
