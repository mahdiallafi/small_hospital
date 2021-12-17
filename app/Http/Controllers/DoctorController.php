<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use DB;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors=Doctor::paginate(5);
 
        return response()->json($doctors, 200, [], JSON_PRETTY_PRINT);
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
            'clinic_name'=>'required',
            'clinic_location'=>'required',
            'Free_days'=>'required',
            'service_id'=>'required',
            'user_id'=>'required',
              ]);
             
              return  Doctor::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show( $doctor)
    {
        $doctors = Doctor::findOrFail($doctor);
        return $doctors ;
    }
    public function item( $id)
    {
     $user=Doctor::with(['servicenames'])->where('user_id', $id)->latest()->get();  

       // $user = Doctor::where('user_id', $id)->latest()->get();
        return $user;
    }

    public function items( $id)
    {
        $user=Appointment::with(['username'])->where('doctor_id', $id)->latest()->get();  
      ///  $user = Appointment::where('doctor_id', $id)->latest()->get();
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $doctor)
    {
        $doctors= Doctor::find($doctor);
        $doctors->update($request->all());
        return  $doctors;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy( $doctor)
    {
        $doctors=Doctor::destroy($doctor);
            return response()->json($doctors, 204);
    }
}
