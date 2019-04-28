<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;
use App\Patient;
use Illuminate\Support\Facades\Auth;
use App\OutdoorTest;
use App\Account;
use Brian2694\Toastr\Facades\Toastr;

class OutdoorTestController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return view('admin.outdoortest.index', [
            'patients' => Patient::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {

        $tests = Test::all();

        $max_serial_no = OutdoorTest::select('serial_no')->max('serial_no');
        $serial_no = (isset($max_serial_no)) ? $max_serial_no + 1 : $serial_no = 101;
        
        return view('admin.outdoortest.create',  compact('tests', 'serial_no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $this->validateTestData($request);

        $formData = $request->all();
        $formData['user_id'] = Auth::id();

        $patient = Patient::create($formData);

        if (is_array($request->test_id) && !empty( $request->test_id)) {
            foreach ($request->test_id as $key => $value) {
                OutdoorTest::create([
                    'user_id'    => Auth::id(),
                    'test_id'    => $value,
                    'patient_id' => $patient->id,
                    'department' => $request->department[$key],
                    'serial_no'  => $request->serial_no
                ]);
            }
        }

        Account::create([
            'patient_id'   => $patient->id,
            'total_price'  => $request->total_price,
            'customer_pay' => $request->customer_pay
        ]);

        Toastr::success('Test information successfully Created', 'Added');
        return redirect()->route('admin.outdoortest.index');
    }

    private function validateTestData($request)
    {
        $request->validate([
            'name'                => 'required',
            'age'                 => 'required|numeric',
            'sex'                 => 'required',
            'refer_by_outdoor_dr' => 'required',
            'phone'               => 'required',
            'address'             => 'required',
            'serial_no'           => 'required|unique:outdoor_test',
            'test_id'             => 'required',
            'total_price'         => 'required',
            'customer_pay'        => 'required'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        return view('admin.outdoortest.details', [
            'patient'   => Patient::find($id),
            'serial_no' => OutdoorTest::where('patient_id', $id)->distinct()->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $patient = Patient::find($id);

        return view('admin.outdoortest.edit', [
            'patient'  => $patient,
            'tests'    => Test::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        //$this->validateTestData($request);

        $formData = $request->all();

        $patient = Patient::find($id);
        $patient->update($formData);

        $i = 0;

        if (is_array($request->test_id) && !empty($request->test_id)) {
            foreach ($request->test_id as $key => $value) {
                $ifExist = OutdoorTest::where('patient_id', $id)->where('test_id', $value)->first();
                if (!$ifExist) {
                    OutdoorTest::create([
                        'user_id'    => Auth::id(),
                        'test_id'    => $value,
                        'department' => $request->department[$i],
                        'patient_id' => $patient->id
                    ]);

                    $i++;
                }
            }
        }

        $account = Account::where('patient_id', $id)->first();
        $account->update([
            'total_price'  => $request->total_price,
            'customer_pay' => $request->customer_pay
        ]);

        Toastr::success( 'Test information updated successfully', 'Updated');
        return redirect()->route('admin.outdoortest.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        Account::where('patient_id', $id)->delete();
        OutdoorTest::where('patient_id', $id)->delete();
        Patient::find($id)->delete();

        Toastr::success('Test information deleted successfully', 'Deleted');
        return redirect()->route('admin.outdoortest.index');
    }

    // Test Information
    public function getTestInfo(Request $request)
    {
        if ($request->ajax()) {

            $test = Test::find($request->test_id);

            $output  = '<tr id="test_row_'.$request->test_id.'">';
            $output .= '<input type="hidden" name="test_id[]" value="'.$request->test_id.'" />';
            $output .= '<td>'.$test->name.'</td>';
            $output .= '<td class="test-price">'.$test->price.'</td>';
            $output .= '<td>'.$request->department.'<input type="hidden" name="department[]" value="'.$request->department.'" /></td>';
            $output .= '<td width="10%">
                        <button type="button" class="btn-remove btn btn-sm btn-danger" data-testid="'.$request->test_id.'">
                            Delete
                        </button>
                        </td>';
            $output .= '</tr>';

            echo json_encode($output);
        }
    }

    public function deleteTestFromOutdoorTest(Request $request)
    {
        OutdoorTest::where('patient_id', $request->patient_id)
                    ->where('test_id', $request->test_id)
                    ->delete();
    }

}
