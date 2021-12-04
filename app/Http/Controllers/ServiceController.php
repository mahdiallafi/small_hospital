<?php

namespace App\Http\Controllers;

use App\Models\service;   
use App\Models\Sercode;   
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $services=service::paginate(5);
   
    
      return response()->json($services, 200, [], JSON_PRETTY_PRINT);
       

        
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
            'service_name'=>'required',
           /*  'clinic_name'=>'required',
            'clinic_location'=>'required', */
           /// 'Category_name'=>'required',


            
              ]);
        
              return  service::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show( $service)
    {
        $services=service::findOrFail($service);
        return $services;
    }


public function show_List($id){
    $services = service::where('id', $id)->firstOrFail();

    $services_doctor = $services->doctors;
 
    return response()->json($services_doctor, 200, [], JSON_PRETTY_PRINT);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit( $service)
    {
        $services=service::findOrFail($service);
         return $services;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $service)
    {
     $services= service::find($service);
     $services->update($request->all());
     return  $services;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy( $service)
    {
        service::destroy($service);
        return Response(null, 204);
    }

 
    /**
     * Search function
     * 
     */

    public function search($name){
       $services=service::where('service_name','like','%'.$name.'%')->get();

       
   if($services){
    return response()->json($services, 200);
   }
   else{ 
   return notFoundMessage1();
    
   }
 
   return response()->json($services, 200);

}


  }
