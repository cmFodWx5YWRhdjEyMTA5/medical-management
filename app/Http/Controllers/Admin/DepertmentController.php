<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use Brian2694\Toastr\Facades\Toastr;
class DepertmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Department::latest()->get();
        return view('admin.depertment.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.depertment.create');
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
                    'name'=>'required',
                    'location'=>'required',
                    'dept_head'=>'required',
                    'details'=>'required',
                    'stuf'=>'required',
                    'date'=>'required',
                    'status'=>'required'


            ]);

            $data=[];

            $data['name']=$request->name;
            $data['location']=$request->location;
            $data['dept_head']=$request->dept_head;
            $data['details']=$request->details;
            $data['stuf']=$request->stuf;
            $data['date']=$request->date;
            $data['status']=$request->status;

            Department::Create($data);
            Toastr::success('Department successfully Created','Added');
            return redirect()->back();


                // 'name','location','dept_head','dept_head','details','stuf','date'
        // name','location','dept_head','dept_head','department','stuf','date


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
        $data=Department::find($id);

        

        return view('admin.depertment.edit',compact('data'));
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
         $data=Department::find($id);
          $request->validate([
                    'name'=>'required',
                    'location'=>'required',
                    'dept_head'=>'required',
                    'details'=>'required',
                    'stuf'=>'required',
                    'date'=>'required',
                    'status'=>'required'


            ]);
          $data->name=$request->name;
          $data->location=$request->location;
          $data->dept_head=$request->dept_head;
          $data->details=$request->details;
          $data->stuf=$request->stuf;
          $data->date=$request->date;
          $data->status=$request->status;
          $data->save();

          Toastr::success('Department successfully Updated','update');
            return redirect()->route('admin.department.index');
        



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Department::find($id)->delete();

        Toastr::warning('Department Successfully Deleted','Deleted');
        return redirect()->back();
    }
}
