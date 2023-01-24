<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use App\Models\User as Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $doctors = Doctor::query()->latest();
        if ($request->name) {
            $doctors = $doctors->like('name',$request->name);
        }

        if ($request->email) {
            $doctors = $doctors->like('email',$request->email);
        }

        if ($request->phone) {
            $doctors = $doctors->like('phone',$request->phone);
        }
        $doctors = $doctors->role('doctor');
        $totalDoctors= $doctors->role('doctor')->count();
        $doctors = $doctors->with('status')->paginate(20);
        return view('doctor.index',compact('doctors','totalDoctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Dictionary::userStatus()->pluck('value','id');
        return view('doctor.create',compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
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
        $createDoctor = Doctor::create($request->all());
        $createDoctor->assignRole('doctor');
        if(!$createDoctor){
            Session::flash('message', 'OOP! something went wrong');
            Session::flash('alert-class', 'alert-danger');
        }
        else{
            Session::flash('message', 'Doctor has been successfully created');
            Session::flash('alert-class', 'alert-success');
        }
        return redirect()->route('doctor.index');

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
    public function edit(Doctor $doctor)
    {
        $status = Dictionary::userStatus()->pluck('value','id');
        return view('doctor.edit',compact('doctor','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Doctor $doctor)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'nullable|email|unique:users,email,'.$doctor->id,
            'phone' => ['required','regex:'.config('general_setting.phone_number'),'unique:users,phone,'.$doctor->id],
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
        $updateDoctor = Doctor::whereId($doctor->id)->update($request->except('_token','_method','profile_image'));
        if(!$updateDoctor){
            Session::flash('message', 'OOP! something went wrong');
            Session::flash('alert-class', 'alert-danger');
        } else{
            Session::flash('message', 'Doctor info has been successfully Updated');
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
    public function destroy(Doctor $doctor)
    {
        $deleteDoctor = $doctor->delete();
        if(!$deleteDoctor){
            Session::flash('message', 'OOP! something went wrong');
            Session::flash('alert-class', 'alert-danger');
        }
        else{
            Session::flash('message', 'Doctor has been successfully deleted');
            Session::flash('alert-class', 'alert-success');
        }
        return redirect()->back();
    }
}
