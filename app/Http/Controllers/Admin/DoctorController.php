<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use  Brian2694\Toastr\Facades\Toastr;
use  Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Date;
use App\Doctor;
use App\User;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas =Doctor::latest()->get();
       
 
        
        return view('admin.doctor.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dates=Date::all();
        return view('admin.doctor.create',compact('dates'));
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
                'degree'=>'required',
                'speciality'=>'required',
                'experience'=>'required',
                'RegNumber'=>'required',
                'email'=>'required',
                'mobile'=>'required',
                'gender'=>'required',
                'date'=>'required',
                'fee'=>'required',
                'username'=>'required',
                'Newpassword'=>'required|confirmed',


           ]);
  

      
   
  

           if($request->file('certificate') && $request->file('photo')){

           

                $request->validate([

                    'certificate'=>'required|mimes:jpeg,png,jpg',
                     'photo'=>'required|mimes:jpeg,png,jpg',


                ]);


                    $proImage=$request->file('photo');
                    $certImage=$request->file('certificate');

                    if(!Storage::disk('public')->exists('profileImage')){
                        Storage::disk('public')->makeDirectory('profileImage');
                    }

                    $imageExtension=$proImage->getClientOriginalExtension();                  

                    $imagename=uniqid()."_".mt_rand()."_".date('Y').".".$imageExtension;

                    $newproImage=Image::make($request->photo)->resize(595,395)->save(90);

                   // $newproImage=Image::make($proImage)->resize(220,220)->save(90);

                    Storage::disk('public')->put('profileImage/'.$imagename,$newproImage);


                      if(!Storage::disk('public')->exists('certificateImage')){
                        Storage::disk('public')->makeDirectory('certificateImage');
                    }

                    $imageExtension=$certImage->getClientOriginalExtension();

                    $certimagename=uniqid()."_".mt_rand()."_".date('Y').".".$imageExtension;

                    $newcertImage=Image::make($certImage)->resize(550,550)->save(90);

                    Storage::disk('public')->put('certificateImage/'.$certimagename,$newcertImage);
             }

             else{
                $imagename='default.png';
                $certimagename='default.png';


             }

           $user=new User;

           $user->name=$request->name;
           $user->username=$request->username;
           $user->email=$request->email;
           $user->role_id=2;
           $user->password=Hash::make($request->Newpassword);
           $user->image=$imagename;
           $user->save();

           $doctor=new Doctor;

           $doctor->degree=$request->degree;
           $doctor->user_id=$user->id;
           $doctor->speciality=$request->speciality;
           $doctor->experience=$request->experience;
           $doctor->regnumber=$request->RegNumber;
           $doctor->mobile=$request->mobile;
           $doctor->gender=$request->gender;
           $doctor->fee=$request->fee;
           $doctor->certificate=$certimagename;
           $doctor->save();

           $doctor->dates()->attach($request->date);
           Toastr::success('Doctor Successfully Added');

           return redirect()->back();
      


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Doctor::find($id);
         $dates=Date::all();
        return view('admin.doctor.details',compact('data','dates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Doctor::find($id);
         $dates=Date::all();
        return view('admin.doctor.edit',compact('data','dates'));
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
