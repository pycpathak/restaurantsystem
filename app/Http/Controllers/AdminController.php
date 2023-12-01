<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Foodchef;
use App\Models\Order;

class AdminController extends Controller
{
    public function user(){
        $data = user::all();
         return view('admin.users', compact('data'));
    }

    public function deleteuser($id){
        $data = user::find($id);

        if(!is_null($data)){
            $data->delete();
            return redirect('/users')->withError(" User Data deleted!!! ");
        } else{
            return redirect('/users')->withError(' There is error in deleting!!! ');
        }
        


    }


    public function deletemenu($id){
        $data = food::find($id);
        
        if(!is_null($data) ){
            $imagepath = public_path('foodimage/'. $data->image);

            if(file_exists($imagepath)){
                unlink($imagepath);
            }
            $data->delete();
            return redirect('/foodmenu')->withError(' Food Menu Item is deleted!!! ');
        } else{
            return redirect('/foodmenu')->withError(' There is error in deleting!!! ');
        }
      
        
    }

    public function foodmenu(){
        $data = food::all();
        return view('admin.foodmenu', compact('data'));
    }

    public function uploadfood(Request $req){
        $req->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        $imagename = time().'.'.$req->image->getClientOriginalExtension() ;
        $req->image->move('foodimage', $imagename);

        $data = new food;

        $data->title = $req->title;
        $data->description = $req->description;
        $data->filter = $req->filter;
        $data->price = $req->price;        
        $data->image = $imagename;

        $data->save();
        return redirect()->back()->withSuccess('New Food Menu Item is added');
    }

    public function updateview($id){
        $data = food::find($id);
        return view('admin.updateview', compact('data'));
    }

    public function updatefood(Request $req, $id){
        $data = food::find($id);

        $req->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        if(!is_null($req->image) ){
        $imagepath1 = public_path('foodimage/'. $data->image);
        if(file_exists($imagepath1)){
            unlink($imagepath1);
        }

        $imagename2 = time().'.'.$req->image->getClientOriginalExtension() ;
        $req->image->move('foodimage', $imagename2);
        $data->image = $imagename2;
        } 

        $data->title = $req->title;
        $data->description = $req->description;
        $data->filter = $req->filter;
        $data->price = $req->price;        
        

        $data->save();
        return redirect('/foodmenu')->withSuccess('Food Menu Item is updated');

    }



    public function viewreservation(){
        $data = reservation::all();
        return view('admin.adminreservation', compact('data'));
    }

    public function viewchef(){
        $data = foodchef::all();
        return view('admin.adminchef', compact('data'));
    }

    public function uploadchef(Request $req){
        

        $req->validate([
            'name' => 'required',
            'speciality' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        $imagename = time().'.'.$req->image->getClientOriginalExtension() ;
        $req->image->move('chefimage', $imagename);

        $data = new foodchef;

        $data->name = $req->name;
        $data->speciality = $req->speciality;
        $data->image = $imagename;

        $data->save();
        return redirect()->back()->withSuccess('New Chef data is added');



    }

    public function updatechef($id){
        $data = foodchef::find($id);
        return view('admin.updatechef', compact('data'));

    }

    public function updatefoodchef(Request $req, $id){
        $data = foodchef::find($id);

        $req->validate([
            'name' => 'required',
            'speciality' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        if(!is_null($req->image) ){
        $imagepath1 = public_path('chefimage/'. $data->image);
        if(file_exists($imagepath1)){
            unlink($imagepath1);
        }

        $imagename2 = time().'.'.$req->image->getClientOriginalExtension() ;
        $req->image->move('chefimage', $imagename2);
        $data->image = $imagename2;
        } 

        $data->name = $req->name;
        $data->speciality = $req->speciality;
               
        $data->save();
        return redirect('/viewchef')->withSuccess('Chef data is updated');

    }

    public function deletechef($id){
        $data = foodchef::find($id);
    
        if(!is_null($data)){
        $imagepath = public_path('chefimage/'. $data->image);

        if(file_exists($imagepath)){
            unlink($imagepath);
        }
        
        $data->delete();   
        return redirect('/viewchef')->withError(' Chef data is deleted!!! ');

        } else{
        return redirect('/viewchef')->withError(' There is error in deleting!!! ');
    }

    }

    public function orders(Request $req){

        $search = $req->search ?? "";
        if($search != ""){
            // where clause we use below
            $data = order::where('name','LIKE', "%$search%")->orWhere('phone','LIKE', "%$search%")->orWhere('foodname','LIKE', "%$search%")->get();
        } else{
            $data = order::all();
        }
             
        return view('admin.orders', compact('data', 'search'));
    }



}
