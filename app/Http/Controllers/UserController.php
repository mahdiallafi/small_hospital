<?php

namespace App\Http\Controllers;

use App\Models\User;


use App\Models\Report;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::paginate(5);
       
        return response()->json($users, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'Role'=>'required',
            'email'=>'required',
            'password'=>'required',
            
              ]);
        
              return  User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $user_appointment = $user->appointments;
     
        return response()->json($user_appointment, 200, [], JSON_PRETTY_PRINT);
      
    }
    

    public function show_reports($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $user_report = $user->Reports;
     
        return response()->json($user_report, 200, [], JSON_PRETTY_PRINT);
   


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $user)
    {
        $users= User::find($user);
        $users->update($request->all());
        return  $users;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $user)
    {
       $users=User::destroy($user);
         return response()->json($users, 204);
    }


    public function destroyAll(){
       return response()->json("this action not allowed",405);
     }
}
