<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appiontment;
use App\Models\Prescription;
use DB;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors  = User::role('doctor')->count();
        $staff    = User::role('staff')->count();
        $patient  = User::role('patient')->count();
        $appiont  = Appiontment::count();
        $prescpt  = Prescription::count();
        $total    = ($appiont + $prescpt);
        $count    = Appiontment::select(
                        DB::raw("(COUNT(*)) as count"),
                        DB::raw("MONTHNAME(created_at) as month_name")
                    )
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month_name')
                    ->get();
        $prescp   = Prescription::select(
                        DB::raw("(COUNT(*)) as count"),
                        DB::raw("MONTHNAME(created_at) as month_name")
                    )
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month_name')
                    ->get();

        return view('home')->with(compact('doctors','staff','patient','appiont','count','prescp','total'));
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
        //
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
