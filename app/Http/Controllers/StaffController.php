<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use App\Models\User as Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $staffs = Staff::query()->latest();
        if ($request->name) {
            $staffs = $staffs->like('name',$request->name);
        }

        if ($request->email) {
            $staffs = $staffs->like('email',$request->email);
        }

        if ($request->phone) {
            $staffs = $staffs->like('phone',$request->phone);
        }
        $staffs = $staffs->role('staff');
        $totalStaffs= $staffs->role('staff')->count();
        $staffs = $staffs->with('status')->paginate(20);
        return view('staff.index',compact('staffs','totalStaffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Dictionary::userStatus()->pluck('value','id');
        return view('staff.create',compact('status'));
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
        $createStaff = Staff::create($request->all());
        $createStaff->assignRole('staff');
        if(!$createStaff){
            Session::flash('message', 'OOP! something went wrong');
            Session::flash('alert-class', 'alert-danger');
        }
        else{
            Session::flash('message', 'Staff has been successfully created');
            Session::flash('alert-class', 'alert-success');
        }
        return redirect()->route('staff.index');

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
    public function edit(Staff $staff)
    {
        $status = Dictionary::userStatus()->pluck('value','id');
        return view('staff.edit',compact('staff','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Staff $staff)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'nullable|email|unique:users,email,'.$staff->id,
            'phone' => ['required','regex:'.config('general_setting.phone_number'),'unique:users,phone,'.$staff->id],
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
        $updateStaff = Staff::whereId($staff->id)->update($request->except('_token','_method','profile_image'));
        if(!$updateStaff){
            Session::flash('message', 'OOP! something went wrong');
            Session::flash('alert-class', 'alert-danger');
        } else{
            Session::flash('message', 'Staff info has been successfully Updated');
            Session::flash('alert-class', 'alert-success');
        }
        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Staff $staff)
    {
        $deleteStaff = $staff->delete();
        if(!$deleteStaff){
            Session::flash('message', 'OOP! something went wrong');
            Session::flash('alert-class', 'alert-danger');
        }
        else{
            Session::flash('message', 'Staff has been successfully deleted');
            Session::flash('alert-class', 'alert-success');
        }
        return redirect()->back();
    }
}
