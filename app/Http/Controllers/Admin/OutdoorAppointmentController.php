<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AppointmentPurpose;
use App\Doctor;
use Illuminate\Support\Facades\DB;
use App\OutdoorAppointment;
use Brian2694\Toastr\Facades\Toastr;

class OutdoorAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.outdoor-appointment.index', [
            'appointments' => OutdoorAppointment::all()
        ]);
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
        $request->validate([
            'patient_name' => 'required', 
            'age' => 'required', 
            'gender' => 'required', 
            'phone' => 'required', 
            'address' => 'required', 
            'purpose_id' => 'required',
            'doctor_id' => 'required',
            'appointment_date' => 'required'
        ]);

        OutdoorAppointment::create($request->all());

        Toastr::success('Appointment successfully Created', 'Added');
        return redirect()->route('admin.outdoor-appointment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.outdoor-appointment.details', [
            'appointment' => OutdoorAppointment::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.outdoor-appointment.edit', [
            'appointment' => OutdoorAppointment::find($id),
            'purposes' => AppointmentPurpose::all(),
            'doctors' => Doctor::all()
        ]);
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
        $request->validate([
            'patient_name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'purpose_id' => 'required',
            'doctor_id' => 'required',
            'appointment_date' => 'required'
        ]);

        $appointment = OutdoorAppointment::find($id);
        $appointment->update($request->all());

        Toastr::success('Appointment successfully Updated', 'Updated');
        return redirect()->route('admin.outdoor-appointment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OutdoorAppointment::find($id)->delete();

        Toastr::warning('Appointment successfully Deleted', 'Deleted');
        return redirect()->route('admin.outdoor-appointment.index');
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

            $check_date = date('l', strtotime($request->date));

            if (empty( $request->doctor_id)) {
                return '<span class="text-danger">Doctor not selected</span>';
            }

            $dates = DB::table('date_doctor')->select('*')->where('doctor_id', $request->doctor_id)->get();

            $available_dates = [];
            foreach ($dates as $date) {
                $date = DB::table('dates')->select('*')->where('id', $date->date_id)->first();
                $available_dates[] = $date->date;
            }

            if (in_array($check_date, $available_dates)) {
                return '<h4 class="text-center text-success">'.$check_date.' available</h4>';
            } else {
                return '<h4 class="text-center text-danger">'.$check_date.' not available</h4>';
            }

        }
    }
}
