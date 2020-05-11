<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;
use Session;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getHomePage(){
        $slide = Slide::all();
    	//return view('page.trangchu',['slide'=>$slide]);
        $new_product = Product::WHERE('new',1)->paginate(8);
        $sale_product = Product::WHERE('promotion_price','<>',0)->paginate(8);
        return view('page.HomePage',compact('slide','new_product','sale_product'));
    }

    public function getProductType($type){
        $product = Product::WHERE('id_type',$type)->get();
        $other_product = Product::WHERE('id_type','<>',$type)->paginate(3);
        $all_type = ProductType::all();
        $type_product = ProductType::WHERE('id',$type)->first();
    	return view('page.ProductType',compact('product','other_product','all_type','type_product'));
    }

    public function getProductDetail(Request $req){
        $product = Product::WHERE('name',$req->name)->first();
        $new_product = Product::WHERE('new',1)->paginate(4);
        $other_product = Product::WHERE('id_type',$req->type)->WHERE('name','<>',$req->name)->paginate(6);
        $top_product = Product::ORDERBY('unit_price','DESC')->WHERE('name','<>',$req->name)->paginate(4);//Lấy 4 sản phẩm có giá cao nhất giảm dần
        return view('page.Product_detail',compact('product','new_product','other_product','top_product'));
    }

    public function getContact(){
    	return view('page.Contact');
    }

    public function getAbout(){
    	return view('page.About');
    }

    public function getAddToCart(Request $req, $id, $qty){
        $product = Product::find($id);
        $oldcart = Session('cart') ? Session::get('cart') : null; // toan tu 3 ngoi
        $cart = new Cart($oldcart);
        $cart -> add($product,$id,$qty);
        $req -> Session() -> put('cart',$cart);
        return redirect()->back();
        //return view('header');
    }
    public function postAddMultiToCart(Request $req, $id){
        $product = Product::find($id);
        $oldcart = Session('cart') ? Session::get('cart') : null; // toan tu 3 ngoi
        $cart = new Cart($oldcart);
        $qty = $req->quantity;
        $cart -> add($product,$id,$qty);
        $req -> Session() -> put('cart',$cart);
        return redirect()->back();
        //return view('header');
    }

    public function getRemoveItem($id){
        $oldcart = Session('cart') ? Session::get('cart') : null; // toan tu 3 ngoi
        $cart = new Cart($oldcart);
        $cart -> removeItem($id);
        Session::put('cart',$cart);
        
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getBill(){
        return view('page.DetailBill');
    }
    public function postCheckOut(Request $req){
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone_number;
        $customer->note = $req->note;
        $customer->save();

        $bill = new Bill;
        $bill->id = $customer->id;
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->note;
        $bill->save();

        foreach($cart->items as $key => $value){
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price']/ $value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
           // return redirect()->route('HomePage')
        return redirect()->route('HomePage')->with('thong bao','Đặt hàng thành công!');
    }
    public function getLoginPage(){
        return view('page.LoginPage');
    }
    /*
    public function postLogin(Request $req){
        $this->validate($req,
        [
            'email'=>'required|email|',
            'password'=>'required|min:6|max:30', 

        ],
        [
            'email.required'=>'Nhập email đi cháu', 
            'email.email'=>'Thứ m nhập đéo phải email', 
            'password.required'=>'Không có mật khẩu sau đăng nhập đây',
            'password.min'=>'Mật khẩu phải ít nhất 6 kí tự anh ơi', 
            'password.max'=>'Mật khẩu gì mà dài thế', 
        ]);
        $credentials = array('email' => email ,'p' );
        
    }
    */
    public function postLogin(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect()->back()->with('dang nhap', 'Đăng nhập thành công!');
        } else {
            return redirect()->back()->with('dang nhap', 'Đăng nhập không thành công!');
        }
    }
    public function getSignup(){
        return view('page.Signup');
    }
    public function postSignup(Request $req){
        $validatedate = $req->validate(
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:30', 
                'username'=>'required',
                'password_confirmation'=>'required|same:password'
            ],
            [
                'username.required'=>'Không có tên à em',
                'email.required'=>'Nhập email đi cháu', 
                'email.email'=>'Thứ m nhập đéo phải email', 
                'email.unique'=>'Dùng lại email ko đc nha cháu', 
                'password.required'=>'Không có mật khẩu sau đăng nhập đây',
                'password_confirmation.required'=>'Nhập lại mật khẩu cho đỡ nhầm nhé', 
                'password_confirmation.same'=>'Mật khẩu ko trùng nhé cháu', 
                'password.min'=>'Mật khẩu phải ít nhất 6 kí tự anh ơi', 
                'password.max'=>'Mật khẩu gì mà dài thế', 
            ]);
        $user = new User();
        $user->name = $req->username;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->save();
        /*if($validatedate->$errors->any()){
            return redirect()->back()->with('dang ky', 'Đăng ký thành công');
        }
        else{
            return redirect()->route('LoginPage')->with('dang ky', 'Đăng ký thành công');
        }
        */
        return redirect()->back()->with('dang ky', 'Đăng ký thành công');

    }
    public function getSearch(Request $req){
        $name = $req->key;
        $slide = Slide::all();
        $product = Product::WHERE('name','like','%'.$req->key.'%')->ORWHERE('unit_price',$req->key)->paginate(16);
        return view('page.Search',compact('slide','product','name'));
    }
    public function check(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            //true
        } else {
            //false
        }
    }
}
