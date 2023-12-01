<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Reservation;
use App\Models\Cart;
use App\Models\Order;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
        $data = food::all();
        $data2 = foodchef::all();

        if(Session::has('user')){
        $user_id = Session::get('user')->id;
        $count = cart::where('user_id',$user_id)->count();
        } else{
            $count = "";
        }



        return view('home',compact('data','data2','count'));
    }

    public function login(Request $req){

        $req->validate([
            'email' => 'required',
            'pwd' => 'required'
        ]);

        $user = User::where(['email' =>$req->email])->first();

        if(!$user || !Hash::check($req->pwd, $user->password)){
            return redirect('/login')->withError(" Email or password did'nt match ");
        } else {
            $req->session()->put('user', $user);
            if($user->usertype == "1"){
                return redirect('/adminpage');
            }else{
                return redirect('/');
            }
            
        }
    }


    public function register(Request $req){
        //dd ($req->toArray());
        $req->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'pwd' => 'required|same:cpwd',
            // password $ password_confirmation then use above method, if password_confimation name is not used then use 'required|same:password'
            'cpwd' => 'required'
        ]);

                
        $user = new User;
        $user->name = $req['name'];
        $user->email = $req['email'];
        $user->password = Hash::make($req['pwd']);
        //$user->password = $req['pwd'];

        $user->save();

        /* if(Auth::attempt($req->only('email','password'))){
            return redirect('/');
        }
        return redirect('/register')->withError("There has been an error while registration"); */

        return redirect('/login');

    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }

    public function admin(){
        return view('admin.adminhome');
    }

    public function reservation(Request $req){

        $req->validate([
            'name' => 'required',
            'phone' => 'phone:IN',
            'date' => 'required',
            'people' => 'required'
        ]);

        $data = new reservation;

        $data->name = $req->name;
        $data->email = $req->email;
        $data->phone = $req->phone;
        $data->date = $req->date;        
        $data->time = $req->time;
        $data->people = $req->people;
        $data->message = $req->message;

        $data->save();
        //  return redirect('./');
         return redirect('/')->withSuccess(' Your Reservation has booked');
        // return redirect()->back();
    }

    // $req->session()->put('user', $user);
    // Session::has('user')
    // Session::get('user')->id or ->name or ->email
    
    public function addcart($id, Request $req){
        if(Session::has('user')) {
            

            $foodid = $id;
            $quantity = $req->cartnum;

            $cart = new cart;

            $cart->user_id = Session::get('user')->id;
            $cart->food_id = $foodid;
            $cart->quantity = $quantity;

            $cart->save();
            return redirect()->back()->withSuccess(' Food item added in cart');
        } else{
            return redirect('/login');
        }

    }

    public function showcart(Request $req, $id){

        $count = cart::where('user_id',$id)->count();
        $data2 = cart::select('*')->where('user_id', '=', $id)->get();

        $data = cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();

        return view('showcart', compact('count', 'data', 'data2'));
    }

    public function remove($id){
        $data = cart::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function orderconfirm(Request $req){

        $req->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        foreach($req->foodname as $key=>$foodname)
        {
            $data = new order;

            $data->foodname = $foodname;
            // for each specific foodname it will give us specific price as $key = each foodname

            $data->image = $req->image[$key];
            $data->price = $req->price[$key];
            $data->quantity = $req->quantity[$key];

            $data->name = $req->name;
            $data->phone = $req->phone;
            $data->address = $req->address;

            $data->save();

        }

        foreach($req->id as $key=>$id){

            $data = cart::find($id);
            $data->delete();
            
        }

        return  redirect('/')->withSuccess(' Your Order is placed ');


    }

}
