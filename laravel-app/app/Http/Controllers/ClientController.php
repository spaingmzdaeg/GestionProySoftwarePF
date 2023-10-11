<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ShippingInfo;
use App\Models\Order;

class ClientController extends Controller
{
    public function CategoryPage($id) {
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view('user_template.category', compact('category', 'products'));
    }

    public function SingleProduct($id) {
        $product = Product::findOrFail($id);
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id', $subcat_id)->latest()->get();
        return view('user_template.product', compact('product', 'related_products'));
    }

    public function AddToCart() {
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        return view('user_template.addtocart', compact('cart_items'));
    }

    public function Checkout() {
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();

        return view('user_template.checkout', compact('cart_items', 'shipping_address'));
    }

    public function PendingOrders() {
        $pending_orders = Order::where('status', 'pending')->latest()->get();
        return view('user_template.pendingorders', compact('pending_orders'));
    }

    public function UserProfile() {
        return view('user_template.userprofile');
    }

    public function History() {
        return view('user_template.history');
    }

    // public function NewRelease() {
    //     return view('user_template.newrelease');
    // }

    public function TodaysDeal() {
        return view('user_template.todaysdeal');
    }

    public function CustomerService() {
        return view('user_template.customerservice');
    }

    
    public function AddProductToCart(Request $request) {
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;

        Cart::insert([
        'product_id' => $request->product_id,
        'user_id' => Auth::id(),
        'quantity' => $request->quantity,
        'price' => $price
        ]);

        return redirect()->route('addtocart')->with('message', 'Your item added to cart succesfully');
    }

    public function RemoveCartItem($id) {
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Your item removed from cart succesfully!');
    }

    public function GetShippingAddress() {
        return view('user_template.shippingaddress');
    }

    public function AddShippingAddress(Request $request) {
        ShippingInfo::insert([
        'user_id' => Auth::id(),
        'phone_number' => $request->phone_number,
        'city_name' => $request->city_name,
        'postal_code' => $request->postal_code,
        ]);

        return redirect()->route('checkout');
    }

    public function PlaceOrder() {
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();

        foreach($cart_items as $item) {
            Order::insert([
                'userid' => $userid,
                'shipping_phoneNumber' => $shipping_address->phone_number,
                'shipping_city' => $shipping_address->city_name,
                'shipping_postalcode' => $shipping_address->postal_code,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->price,
            ]);

            // Esto es para que cada vez que se inserte una orden , el carrito de compras vuelva a estar en 0
            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }

        // Esto es para eliminar la direccion de envio cuando realizo un pedido 

        return redirect()->route('pendingorders')->with('message', 'Your Order Has Been Placed Succesfully');
        
    }
}
