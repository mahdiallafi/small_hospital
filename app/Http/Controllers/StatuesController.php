<?php

namespace App\Http\Controllers;

use App\Models\Statues;
use Illuminate\Http\Request;

class StatuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statues=Statues::paginate(5);
     
        return response()->json($statues, 200, [], JSON_PRETTY_PRINT);
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
            'Code_number'=>'required',
            'Description_statues'=>'required',
            'medcine'=>'required',
            'user_id'=>'required',
           
              ]);
        
              return  Statues::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statues  $statues
     * @return \Illuminate\Http\Response
     */
    public function show( $statues)
    {
        $statues = Statues::findOrFail($statues);
        return $statues ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statues  $statues
     * @return \Illuminate\Http\Response
     */
    public function edit(Statues $statues)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statues  $statues
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $statues)
    {
        $statues= Statues::find($statues);
        $statues->update($request->all());
        return  $statues;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statues  $statues
     * @return \Illuminate\Http\Response
     */
    public function destroy( $statues)
    {
        $statues=Statues::destroy($statues);
         return response()->json($statues, 204);
    }
}
