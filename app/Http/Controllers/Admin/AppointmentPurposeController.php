<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AppointmentPurpose;
use Brian2694\Toastr\Facades\Toastr;

class AppointmentPurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.appointment-purpose.index', [
            'purposes' => AppointmentPurpose::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointment-purpose.create');
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
            'purpose' => 'required',
            'description' => 'required'
        ]);

        AppointmentPurpose::create($request->all());

        Toastr::success('Appointment purpose successfully Created', 'Added');
        return redirect()->route('admin.appointment-purpose.index');
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
        return view('admin.appointment-purpose.edit', [
            'purpose' => AppointmentPurpose::find($id)
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
            'purpose' => 'required',
            'description' => 'required'
        ]);

        $purpose = AppointmentPurpose::find($id);
        $purpose->update($request->all());

        Toastr::success('Appointment purpose successfully Updated', 'Update');
        return redirect()->route('admin.appointment-purpose.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AppointmentPurpose::find($id)->delete();

        Toastr::warning('Appointment purpose Successfully Deleted', 'Deleted');
        return redirect()->back();
    }
}
