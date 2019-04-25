<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class DocinfochangeController extends Controller
{
    public function updatedates(Request $request,$id){
    	$data=Doctor::find($id);

    	$request->validate([
    			'fee'=>'required',
    			'date'=>'required',

    	]);    	

    		$data->dates()->sync($request->date);
    		$data->fee=$request->fee;

    	Toastr::success('Doctor Days information Updated',"updated");
    		return redirect()->back();
    	

    	
    	
    	


    }

    public function updateinfo(Request $request,$id){

    	$data=Doctor::find($id);
    	
    	
    	$request->validate([
                'name'=>'required',
                'degree'=>'required',
                'speciality'=>'required',
                'experience'=>'required',
                'RegNumber'=>'required',               
                'mobile'=>'required',
                'gender'=>'required',             


           ]);


    	 if($request->file('certificate') && $request->file('photo')){

           

                $request->validate([

                    'certificate'=>'required|mimes:jpeg,png,jpg',
                     'photo'=>'required|mimes:jpeg,png,jpg',


                ]);


                    $proImage=$request->file('photo');
                    $certImage=$request->file('certificate');

                    if(Storage::disk('public')->exists('profileImage/'.$data->user->image)){
                        Storage::disk('public')->delete('profileImage/'.$data->user->image);
                    }

                    $imageExtension=$proImage->getClientOriginalExtension();                  

                    $imagename=uniqid()."_".mt_rand()."_".date('Y').".".$imageExtension;

                    $newproImage=Image::make($request->photo)->resize(595,395)->save(90);

                   // $newproImage=Image::make($proImage)->resize(220,220)->save(90);

                    Storage::disk('public')->put('profileImage/'.$imagename,$newproImage);


                      if(Storage::disk('public')->exists('certificateImage/'.$data->certificate)){
                        Storage::disk('public')->delete('certificateImage/'.$data->certificate);
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



             
              	$user=User::where('id',$data->user_id)->first();

              	$user->image=$imagename;
              	$user->save();


            $data->degree=$request->degree;
           
           $data->speciality=$request->speciality;
           $data->experience=$request->experience;
           $data->regnumber=$request->RegNumber;
           $data->mobile=$request->mobile;
           $data->gender=$request->gender;        
           $data->certificate=$certimagename;
           $data->save();


           Toastr::success('Doctor Successfully Added',"update");

           return redirect()->back();
      





    }

    public function destroy($id){
    	$data=Doctor::find($id);  



    	if(Storage::disk('public')->exists('profileImage/'.$data->user->image)){
         Storage::disk('public')->delete('profileImage/'.$data->user->image);
           }

           if(Storage::disk('public')->exists('certificateImage/'.$data->certificate)){
          Storage::disk('public')->delete('certificateImage/'.$data->certificate);


    }

    $data->dates()->detach($id);
     $users=User::where('id',$data->user_id)->delete();
    $data->delete();

    Toastr::success('Doctor Successfully Delete',"Delete");

     return redirect()->back();

    


}
}
