<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments=Appointment::paginate(5);
      
        return response()->json($appointments, 200, [], JSON_PRETTY_PRINT);
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
            'app_date'=>'required',
            'app_time'=>'required',
            'Fre_places'=>'required',
            'user_id'=>'required',
            'doctor_id'=>'required',
              ]);
        
              return  Appointment::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show( $appointment)
    {
        ///$user=Appointment::with(['username'])->where('doctor_id', $id)->latest()->get();  
        $appointments = Appointment::with(['doctorname'])->where('user_id', $appointment)->latest()->get();
        return $appointments;
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit( $appointment)
    {
        $appointments = Appointment::findOrFail($appointment);
        return $appointments ;
    }
    
    public function send(){
               $data = request()->validate([
                'app_date'     =>  'required',
                'app_time'  =>  'required|email',
                'Fre_places' =>  'required'
            ]);
    
            Mail::to('clinic@gmail.com')->send(new SendMail($data));
    
            return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $appointment)
    {
      
           if(Auth::user()==check_token()){
        $appointments= Appointment::find($appointment);
        $appointments->update($request->all());
        return  $appointments;
           }
           else
           {
                return "you have no right to update";

           }

   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy( $appointment)
    {
        $appointments=Appointment::destroy($appointment);
       
      return response()->json($appointments, 204);
    }
}
