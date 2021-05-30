<div class="cart" data-url="{{route('deleteCart')}}">
    <div class="container">
        <div class="row">
            <table class="table update_cart_url" data-url="{{route('updateCart')}}">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ảnh sản phẩm </th>
                    <th scope="col">Tên</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach($cart as $id => $cartItem)
                    @php
                        $total += $cartItem['price'] * $cartItem['quantity'];
                    @endphp

                    <tr>
                        <th scope="row">{{$id}}</th>
                        <td><img style="width: 100px;height: 100px;object-fit: contain" src="{{$cartItem['image']}}" alt=""></td>
                        <td>{{$cartItem['name']}}</td>
                        <td>{{$cartItem['price']}} VND</td>
                        <td><input type="number" value="{{$cartItem['quantity']}}" min="1" class="quantity"></td>
                        <td>{{number_format($cartItem['price'] * $cartItem['quantity'])}} VND</td>
                        <td>
                            <a href="" data-id="{{$id}}" class="btn btn-primary cart_update">Update</a>
                            <a href="" data-id="{{$id}}" class="btn btn-danger cart_delete">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="col-md-12">
                <h2>Total = {{number_format($total)}} VND</h2>
            </div>
        </div>
    </div>
</div>
