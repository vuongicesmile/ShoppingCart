<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="products mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('showCart')}}" class="btn btn-primary mb-3">Show Cart to checkout</a>
            </div>
        </div>
        <div class="row">
           @foreach($products as $product)
            <div class="col-md4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $product->image_path}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                        <p class="card-text">{{number_format($product->price)}} VND</p>
                        <a href="#" data-url="{{route('addToCart',['id'=>$product->id])}}" class="btn btn-primary add_to_cart">Add to cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    function addToCart(event)
    {
        event.preventDefault();//ngan viec chuyen trang
        let urlCart = $(this).data('url'); //set hoac lay du lieu cua url

        $.ajax({
            type:"GET",
            url: urlCart,
            dataType:'json',
            success: function(data) {
                if (data.code===200)
                {
                    alert('Thêm sản phẩm thành công');
                }
                    else
                {

                }
            },
            error: function(){}
        });
    }
    $(function () {
        $('.add_to_cart').on('click',addToCart);
    });
</script>

</body>
</html>
