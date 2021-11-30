<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewDetails extends Controller
{

        public function create(){

            return view('reg');

        }


        public function store(request $request){
           //here we will receive data from form , which viewed by function create() above.
                $data =$this->validate($request , [
         
                    "name"     => "required|string",
                    "email"    => "required|email", 
                    "password" => "required|min:6",
                    "url" => "required|url",
                    "address" =>"required|size:10",
                    "gender" => "required|in:male,female",
                    "image" => "required|image|mimes:jpeg,jpg,png,gif"
             
                    ] );
                    $name = $request->name;
                    $email = $request->email;
                    $linkedin = $request->url;
                    $address = $request->address;
                    $gender= $request->gender;
                    $image = $request->image;
                    $new_name = rand().time().'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('images'), $new_name);
                    return back()
                    ->with('success','Your Data Sent Successfully.')
                    ->with('image',$new_name); 
                                

                    
                
            
        }


}

