<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShoppingCartController extends FrontendController
{
    public function addProduct(Request $request,$id){
        $product = Product::select('pro_name','id','pro_price','pro_sale','pro_avatar','pro_number')->find($id);
        if(!$product) return redirect()->route('home');
        $price = $product->pro_price;

        if (isset($product->pro_sale)){
            $price = $price - $price*$product->pro_sale/100;
        }
        if ($product->pro_number==0){
            return redirect()->back()->with('wrong',"Sản phẩm đã hết hàng");
        }
        $quantity = 1;
        if ($request->quantity){
            $quantity = $request->quantity;
        }
        \Cart::add([
            'id' => $id,
            'name' => $product->pro_name,
            'qty' => $quantity,
            'price' => $price,
            'options' => [
                'avatar' => $product->pro_avatar,
                'sale'   => $product->pro_sale,
                'old_price'=> $product->pro_price
            ]
        ]);
        return redirect()->back()->with('success',"Đã thêm vào giỏ hàng");
    }
    public function deleteProduct($key){
        \Cart::remove($key);
        return redirect()->back();
    }
    public function getListShoppingCart(){
        $products = \Cart::content();
        return view('shopping.index',compact('products'));
    }
    public function getFormPay(){
        $products = \Cart::content();
        return view('shopping.pay',compact('products'));
    }

    //Lưu thông tin đơn hàng
    public function saveInfoShoppingCart(Request $request){
        $totalMoney =str_replace(',','',\Cart::subtotal())  ;
        $transactionId = Transaction::insertGetId([
            'tr_user_id' => get_data_user('web'),
            'tr_total'      => (int)$totalMoney,
            'tr_note'       => $request->note,
            'tr_address'    => $request->address,
            'tr_phone'    => $request->phone,

        ]);
        if ($transactionId){
            $products = \Cart::content();
            foreach ($products as $product)
            {

                Order::insert([
                    'or_transaction_id'  =>  $transactionId,
                    'or_product_id'  =>  $product->id,
                    'or_qty'  =>  $product->qty,
                    'or_price'  =>  $product->price,
                    'or_sale'  =>  $product->options['sale'],

                ]);
            }
        }
        \Cart::destroy();
        return redirect()->route('home');
    }
    public function getUpdateShoppingCart(Request $request){

        foreach ($request->quantity as $key => $item)

        Cart::update($key,$item);
        return redirect()->back()->with("success","Cập nhật giỏ hàng thành công");
    }
    public  function getDestroy(){
        \Cart::destroy();
        return redirect()->back()->with("success","Bạn hủy bỏ tất cả sản phẩm trong giỏ hàng thành công");
    }
}
