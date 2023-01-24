<?php

namespace App\Http\Controllers;

use App\Models\User as Patient;
use App\Models\Dictionary;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $patients = Patient::query()->latest();
        if ($request->name) {
            $patients = $patients->like('name',$request->name);
        }

        if ($request->email) {
            $patients = $patients->like('email',$request->email);
        }

        if ($request->phone) {
            $patients = $patients->like('phone',$request->phone);
        }
        $patients = $patients->role('patient');
        $totalPatients= $patients->role('patient')->count();
        $patients = $patients->with('status')->paginate(20);
        return view('patient.index',compact('patients','totalPatients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Dictionary::userStatus()->pluck('value','id');
        return view('patient.create',compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'nullable|email|unique:users,email',
            'phone' => ['required','regex:'.config('general_setting.phone_number'),'unique:users,phone'],
            'password'=>'required',
            'profile_image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasFile('profile_image')){
            $request['profile_image_url']=  $request->profile_image->store('public/image');
        }
        if($request->password){
            $request['password']=Hash::make($request->password);
        }
        $createPatient = Patient::create($request->all());
        $createPatient->assignRole('patient');
        if(!$createPatient){
            Session::flash('message', 'OOP! something went wrong');
            Session::flash('alert-class', 'alert-danger');
        }
        else{
            Session::flash('message', 'Patient has been successfully created');
            Session::flash('alert-class', 'alert-success');
        }
        return redirect()->route('patient.index');

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Patient $patient)
    {
        $status = Dictionary::userStatus()->pluck('value','id');
        return view('patient.edit',compact('patient','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Patient $patient)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'nullable|email|unique:users,email,'.$patient->id,
            'phone' => ['required','regex:'.config('general_setting.phone_number'),'unique:users,phone,'.$patient->id],
            'password'=>'nullable',
            'status_id'=>'required',
            'profile_image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasFile('profile_image')){
           $request['profile_image_url']=  $request->profile_image->store('public/image');
        }
        if($request->password){
            $request['password']=Hash::make($request->password);
        }else{
            unset($request['password']);
        }
        $updatePatient = Patient::whereId($patient->id)->update($request->except('_token','_method','profile_image','role'));
        if(!$updatePatient){
            Session::flash('message', 'OOP! something went wrong');
            Session::flash('alert-class', 'alert-danger');
        } else{
            Session::flash('message', 'Patient info has been successfully Updated');
            Session::flash('alert-class', 'alert-success');
        }
        return redirect()->route('doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Patient $patient)
    {
        $deletePatient = $patient->delete();
        if(!$deletePatient){
            Session::flash('message', 'OOP! something went wrong');
            Session::flash('alert-class', 'alert-danger');
        }
        else{
            Session::flash('message', 'Patient has been successfully deleted');
            Session::flash('alert-class', 'alert-success');
        }
        return redirect()->back();
    }
}
