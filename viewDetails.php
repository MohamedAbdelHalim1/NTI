<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\student;

class viewDetails extends Controller
{


    public function index(){
        $data=student::get();

        return view('index' , ["data"=>$data]);
    }


    public function edit($id){
        $data = student::find($id);
        return view('edit' , ["data"=>$data]);


    }

    public function update(Request $request){

        $data =$this->validate($request , [
            "id"      => "required",
            "name"     => "required|string",
            "email"    => "required|email", 
            // "password" => "required|min:6",
            "linkedIn" => "required|url",
            "address" =>"required",
            // "gender" => "required|in:male,female",
            // "image" => "required|image|mimes:jpeg,jpg,png,gif"
     
            ] );
            $op = student::where("id",$request->id)->update($data);
            return redirect(url('/student'));

    }




    public function delete($id){   //this id that i sent with href in index
        $op = student::where('id',$id)->delete();
        if ($op) {
            $msg = "deleted";
        }else {
            $msg = "Error";
        }
        return redirect('/student/');
    }








        public function create(){

            return view('reg');

        }


        public function store(request $request){
           //here we will receive data from form , which viewed by function create() above.
                $data =$this->validate($request , [
         
                    "name"     => "required|string",
                    "email"    => "required|email", 
                    "password" => "required|min:6",
                    "linkedIn" => "required|url",
                    "address" =>"required",
                    "gender" => "required|in:male,female",
                    "image" => "required|image|mimes:jpeg,jpg,png,gif"
             
                    ] );
                    $image = $request->image;
                    $new_name = rand().time().'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('images'), $new_name);
                    // return back()
                    // ->with('success','Your Data Sent Successfully.')
                    // ->with('image',$new_name); 
                    $op = student::create($data);
                    if ($op) {
                        return redirect('/student/');
                    }

                    
                
            
        }


}

