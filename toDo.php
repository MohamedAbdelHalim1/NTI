<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\task;

use App\Models\person;

class toDo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $data = person::join('tasks','person.id','=','tasks.user_id')
                       -> select('person.*','tasks.title','tasks.description','tasks.start','tasks.end')
                       ->get();
          if ($data) {
            $_SESSION['user']=$data["id"];
          }             
                       

       return view('toDo_index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('toDo_reg');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $data = $this->validate($request, [
            'name'       => 'required|min:5',
            'email'      => 'required|email',
            'password'   => 'required|min:5',
            'gender'     => "required|in:m,f",
            'title'      => 'required|max:15',
            'descript'   => 'required|max:100',
            'start'      => 'required',
            'deadline'   => "required",
            'image'      => "required"

     ]);
                    
       $data =  $request->except(['title','descript','start','deadline']); 
       $image = $request->image;
       $new_name = rand().time().'.'.$image->getClientOriginalExtension();
       $image->move(public_path('images'), $new_name);
       $data["image"]=$new_name;
       $data['password'] = bcrypt($data['password']);

        $Raw = person::create($data);
        $op = task::create(['user_id' => $Raw->id ,
                            'title' => $request->title , 
                            'description' => $request->descript ,
                            'start' => $request->start,
                            'end' => $request->deadline,
                        
                        ]);
        


        return redirect(url('/myToDo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $op = person::where('id', $id)->delete();


        return redirect(url('/myToDo'));
    }

    public function login()
    {
        return view('toDo_login');
    }

    public function doLogin(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

 
        if (auth()->guard('person')->attempt($data)) {
            return redirect(url('/myToDo'));
        } else {
            return redirect(url('/toDo_login'));
        }
    }

    public function logOut()
    {
        auth()->guard('myToDo')->logout();
        return redirect(url('/toDo_login'));
    }



}
