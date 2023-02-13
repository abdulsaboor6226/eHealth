<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\User;
use App\Models\Appiontment;
use PDF;
use Auth;
class AppointmentController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('doctor')){
            $prescription = Prescription::with('doctor','patient')->where('doctor_id',auth()->user()->id)->get();
        }else{
            $prescription = Prescription::with('doctor','patient')->where('patient_id',auth()->user()->id)->get();
        }
        

        return view('prescription.index')->with(compact('prescription'));
    }
    
    public function appiontments(){

        if(Auth::user()->hasRole('doctor')){
            $appiontments = Appiontment::with('doctor','patient')->where('doctor_id',auth()->user()->id)->get();
        }else{
            $appiontments = Appiontment::with('doctor','patient')->where('patient_id',auth()->user()->id)->get();
        }
        

        return view('appiontment.index')->with(compact('appiontments'));
    }

    public function appiontmentAdd(Request $request){

        if ($request->isMethod('post')) {
            // return $request;
            $appiontment   =  new Appiontment;
            $appiontment->doctor_id  = $request->doctor_id;
            $appiontment->patient_id = auth()->user()->id;
            $appiontment->date       = $request->appiontment_time; 
            $appiontment->message    = $request->message;
            $appiontment->save();
            toastr()->success('Appointment Booked');
            return redirect( route('appiontments') );
        }

        $doctors = User::role('doctor')->get();

        return view('appiontment.add')->with(compact('doctors'));
    }

    public function appiontmentEdit($id,Request $request){
        if ($request->isMethod('post')) {
            $appiontment                =  Appiontment::find($id);
            $appiontment->doctor_id  = $request->doctor_id;
            $appiontment->patient_id = auth()->user()->id;
            $appiontment->date       = $request->appiontment_time; 
            $appiontment->message    = $request->message;
            $appiontment->save();
            toastr()->success('Appiontment updated');
            return redirect( route('appiontments') );
        }

        $doctors = User::role('doctor')->get();
        $appiontment = Appiontment::where('id',$id)->first();
        return view('appiontment.edit')->with(compact('doctors','appiontment','id'));

    }

    public function appiontmentDel($id){
        $appiontment = Appiontment::where('id',$id)->first();
        if ($appiontment) {
            $appiontment->delete();
            toastr()->success('Appiontment deleted');
            return redirect( route('appiontments') );
        }        
    }

    public function add(Request $request){
        if ($request->isMethod('post')) {
            // return $request;
            $prescription                =  new Prescription;
            $prescription->doctor_id     =  auth()->user()->id; 
            $prescription->patient_id    =  $request->patient_id;
            $prescription->prescription  =  $request->body;
            $prescription->save();
            toastr()->success('Prescription added');
            return redirect( route('prescription') );
        }
        $patients = User::role('patient')->get();

        return view('prescription.add')->with(compact('patients'));
    }

    public function edit($id,Request $request){
        if ($request->isMethod('post')) {
            $prescription                =  Prescription::find($id);
            $prescription->doctor_id     =  auth()->user()->id; 
            $prescription->patient_id    =  $request->patient_id;
            $prescription->prescription  =  $request->body;
            $prescription->save();
            toastr()->success('Prescription updated');
            return redirect( route('prescription') );
        }

        $patients = User::role('patient')->get();
        $prescription = Prescription::where('id',$id)->first();
        return view('prescription.edit')->with(compact('patients','prescription','id'));

    }

    public function del($id){
        $prescription = Prescription::where('id',$id)->first();
        if ($prescription) {
            $prescription->delete();
            toastr()->success('Prescription deleted');
            return redirect( route('prescription') );
        }        
    }

    public function generatePDF($id)
    {
        $prescription = Prescription::with('patient')->where('id',$id)->first();
        $data = [
            'title' => 'Prescription Report',
            'date' =>  $prescription->updated_at->format('D, d M y, h:i A'),
            'data' => $prescription->prescription
        ];
          
        $pdf = PDF::loadView('appointment', $data);
        toastr()->success('Prescription downloaded');
        return $pdf->download($prescription->patient->name.'.pdf');
        return redirect( route('prescription') );
    }
}
