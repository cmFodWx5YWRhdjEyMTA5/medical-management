<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AppointmentPurpose;
use App\Doctor;
use Illuminate\Support\Facades\DB;

class OutdoorAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.outdoor-appointment.create', [
            'purposes' => AppointmentPurpose::all(),
            'doctors' => Doctor::all()
        ]);
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

    public function doctorFee(Request $request)
    {
        if ($request->ajax()) {

           return Doctor::select('fee')
                        ->where('user_id', $request->doctor_id)
                        ->first()->fee;
        }
    }

    public function doctorAvailableDay(Request $request)
    {
        if ($request->ajax()) {

            if (empty( $request->doctor_id)) {
                return '<span class="text-danger">Doctor not selected</span>';
            }

            $dates = DB::table('date_doctor')
                        ->select('*')
                        ->where('doctor_id', $request->doctor_id)
                        ->get();

            $available_dates = [];
            foreach ($dates as $date) {
                $date = DB::table('dates')->select('*')->where('id', $date->date_id)->first();
                $available_dates[] = $date->date;
            }

            if (in_array(date('l', strtotime($request->date)), $available_dates)) {
                return '<span class="text-success">' . date('l', strtotime($request->date)) . ' available</span>';
            } else {
                return '<span class="text-danger">' . date('l', strtotime($request->date)). ' not available</span>';
            }
        }
    }
}
