<?php

namespace App\Http\Controllers;

use App\Models\Sercode;
use App\Models\User;
use App\Models\service;
use Illuminate\Http\Request;

class SercodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ser=Sercode::all();
        return $ser;
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
    public function user_Service(){

        $collection = User::get();
        $collection1 = service::get();
  
        $modified = $collection->map(function($item, $key) {
     return [
    'name' => $item->name,
       ];
                               
     });
     $modified1 = $collection1->map(function($item, $key) {
       return [
      'service_name' => $item->service_name,
     ];
     });                      
     ///   dd($modified);
        dd($modified1,$modified);
     }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sercode  $sercode
     * @return \Illuminate\Http\Response
     */
    public function show(Sercode $sercode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sercode  $sercode
     * @return \Illuminate\Http\Response
     */
    public function edit(Sercode $sercode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sercode  $sercode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sercode $sercode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sercode  $sercode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sercode $sercode)
    {
        //
    }
}
