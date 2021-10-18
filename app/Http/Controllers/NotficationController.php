<?php

namespace App\Http\Controllers;

use App\Models\Notfication;
use App\Models\User;
use Illuminate\Http\Request;

class NotficationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notfications=Notfication::paginate(5);
       
        return response()->json($notfications, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'body'=>'required',
            'user_id'=>'required',
              ]);
        
              return  Notfication::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notfication  $notfication
     * @return \Illuminate\Http\Response
     */
    public function show( $notfication)
    {
        $notfications=Notfication::findorFail($notfication);
        return $notfications;
    }

   public function show_List($id){
    $users = User::where('id', $id)->firstOrFail();

    $user_notifcation = $users->notifications;
 
    return response()->json($user_notifcation, 200, [], JSON_PRETTY_PRINT);
   }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notfication  $notfication
     * @return \Illuminate\Http\Response
     */
    public function edit( $notfication)
    {
        $notfications=Notfication::findorFail($notfication);
        return $notfications;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notfication  $notfication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $notfication)
    {
        $notfications= Notfication::find($notfication);
        $notfications->update($request->all());
        return  $notfications;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notfication  $notfication
     * @return \Illuminate\Http\Response
     */
    public function destroy( $notfication)
    {
        $notfications=Notfication::destroy($notfication);
        return response()->json($notfications, 204);

    }
}
