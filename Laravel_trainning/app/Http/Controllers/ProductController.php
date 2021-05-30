<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products=Product::latest()->get();
        return view('products.index',compact('products'));
    }
    public function addToCart($id)
    {
//        session()->forget('cart');
//        dd('end');

//        $cart=session()->get('cart');
//        session()->flush('cart');
        $products = Product::find($id);
        $cart=session()->get('cart');
        if(isset($cart[$id]) )
        {
            $cart[$id]['quantity']=$cart[$id]['quantity']+1;
        }
        else
        {
            $cart[$id] =[
                'name' => $products->name,
                'price'=>$products->price,
                'image'=>$products->image_path,
                'quantity'=>1,
            ];
        }
        session()->put('cart',$cart);//  qua cac trang khac van luu duoc du lieu nay

//        print_r(session()->get('cart'));

        return response()->json([
            'code'=> 200,
            'message'=>'sucess'],200);
    }
    public  function showCart()
    {
//       echo "<pre>";
//       print_r(session()->get('cart'));
       $cart = session()->get('cart');
       return view('products.cart',compact('cart'));
    }
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity)
        {
            $cart =session()->get('cart');
            $cart[$request->id]['quantity'] =$request->quantity;
            session()->put('cart',$cart);
            $cart = session()->get('cart');
            $cartCompenent = view('products.components.cart_component',compact('cart'))->render();
            return response()->json([
                'cart_component' =>$cartCompenent,
                'code'=>200],200);
        }
    }
    public function deleteCart(Request $request)
    {
        if ($request->id)
        {
            $cart =session()->get('cart');
            unset($cart[$request->id]);
            session()->put('cart',$cart);
            $cart = session()->get('cart');
            $cartCompenent = view('products.components.cart_component',compact('cart'))->render();
            return response()->json([
                'cart_component' =>$cartCompenent,
                'code'=>200],200);
        }
    }
}
