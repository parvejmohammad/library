<?php

namespace App\Http\Controllers;

use App\Models\fee;
use App\Models\seat;
use App\Models\shift;
use App\Models\Staff;
use App\Models\student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginMatch(Request $req){
        $credentials=$req->validate(
            [
                'email'=>'required|email',
                'password'=>'required',
            ]);
            if(Auth::attempt($credentials)){
                /* Total fees  */
                $total=0;
                $amount=student::select('Student_fees')->get();
                foreach($amount as $k=>$v){
                    $total=$total+$v->Student_fees;
                }
                /* This Month Collection  */
                $current_month_from_system=date('m');
                $received_payment=0;
                $current_month_from_database=fee::get();
                foreach($current_month_from_database as $key=>$value){
                        if($value->Status==="success"){
                            $from_month=date("m",strtotime($value->From_month));//convert string into date
                            $to_month=date("m",strtotime($value->To_month));
                            if($current_month_from_system===$from_month || $current_month_from_system===$to_month){
                                $received_payment+=$value->Amount;
                            }
                        }
                }
                $pending_fees= $total- $received_payment;
                $active_navbar_Home="active_navbar_link active";
                return view('welcome',compact(['total','pending_fees','active_navbar_Home']));
            }
            else{
                return redirect()->route('login');
            }
    }
    public function logout(){
        Auth::logout();
        return view('login');
    }
    public function singleStudent(){
        if(Auth::check()){
            do{
                    $random_digit=mt_rand(1000,9999);
                    $enroll_id="TSPL".$random_digit;
                    $id=student::where('Enrollment_id',$enroll_id)->exists();
                    
            }while($id);
            $shift_data=shift::all();
            $staff_data=Staff::all();

            $seats=seat::all();
            $seat_array=[];

            foreach($seats as $skey=>$svalue){
                if(!student::where('Assign_seat',$svalue->Seat_no)->exists()){
                    $seat_array[]=['id'=>$svalue->id,"Seat_no"=>$svalue->Seat_no];
                }              
           }
         //  dd(student::where('Assign_seat',$svalue->Seat_no)->exists());
            return view('singleStudent',compact(['shift_data','staff_data',"enroll_id","seat_array"]));
                    
        }
        else{
            return redirect()->route('login');
        }
    }
    public function student(){
        if(Auth::check()){
            $student_info=student::get();
            $active_1="active";
            $show_1="show";
            return view('student',compact(['student_info','active_1',"show_1"]));
        }
        else{
            return redirect()->route('login');
        }
    }
  
    public function saveData(Request $req){
        $student=$req->validate([
            'Enrollment_id'=>'required|unique:students,Enrollment_id',
            'Name'=>"required",
            'Email'=>'required|email|unique:students,Email',
            'Contact'=>'required|unique:students,Contact',
            'Father_name'=>'required',
            'Address'=>'required',
            "Gender"=>'required',
            'Assign_seat'=>'required|unique:students,Assign_seat',
            'Shift_code'=>'required',
            'Date_of_joining'=>'required',
            'Staff'=>'required',
        ]);
        $Profile_image="student.jpg";
        if($req->Profile_image!="" && $req->Profile_image!=null){
            $req->validate([
                'Profile_image'=>'mimes:jpg,png,gif,tiff,bmp,avif',
            ]);
            $img=$req->Profile_image;
            $ext=$img->getClientOriginalExtension();
            $Profile_image=$req->Name."_".time().'.'.$ext;
            //$img->storeAs("/student_DP/",$Profile_image,'public');
            $img->move(public_path().'/Student_DP/',$Profile_image);
        }
      
       $fees=shift::where('Shift_code',$req->Shift_code)->get('Fees');
       //dd($fees[0]->Fees); important mujhe aise nhi ata tha value access krna
       $result=student::create([
            'Enrollment_id'=>$req->Enrollment_id,
            'Name'=>$req->Name,
            'Email'=>$req->Email,
            'Contact'=>$req->Contact,
            'Father_name'=>$req->Father_name,
            'Address'=>$req->Address,
            'Gender'=>$req->Gender,
            'Profile_image'=>$Profile_image,
            'Assign_seat'=>$req->Assign_seat,
            'Shift_code'=>$req->Shift_code,
            'Date_of_joining'=>$req->Date_of_joining,
            'Staff'=>$req->Staff,
            'Student_fees'=>$fees[0]->Fees,
       ]);
       if($result){
          return redirect()->route('student');
       }
                   

    }
    public function admin(){
        if(Auth::check()){
            $seats=seat::max('id');
            $staffs=Staff::get();
            $shifts=shift::get();
            return view('admin',compact(['seats','staffs','shifts']));
        }
        else{
            return redirect()->route('login');
        }
    }
    public function welcome(){
     
         if(Auth::check()){
            /* Total fees  */
                $total=0;
                $amount=student::select('Student_fees')->get();
                foreach($amount as $k=>$v){
                    $total=$total+$v->Student_fees;
                }
                /* This Month Collection  */
                $current_month_from_system=date('m');
                $received_payment=0;
                $current_month_from_database=fee::get();
                foreach($current_month_from_database as $key=>$value){
                        if($value->Status==="success"){
                            $from_month=date("m",strtotime($value->From_month));//convert string into date
                            $to_month=date("m",strtotime($value->To_month));
                            if($current_month_from_system===$from_month || $current_month_from_system===$to_month){
                                $received_payment+=$value->Amount;
                            }
                        }
                }
                $pending_fees= $total- $received_payment;
                $active_navbar_Home="active_navbar_link active";
                return view('welcome',compact(['total','pending_fees','active_navbar_Home']));
        }
        else{
            return redirect()->route('login');
        }
    }
    public function Addseat(Request $req){
        $seat=$req->validate([
            'Seat_no'=>'required|numeric',
        ]);
        seat::truncate();
        $seat_name="TSPL-";
       // $seats=new seat;
        for($i=1;$i<=$req->Seat_no;$i++){
            $seat_number=$seat_name.$i;
            seat::create([
                'id'=>$i,
                'Seat_no'=>$seat_number,
            ]);
            
        }
        return redirect()->route('admin');
    }
    public function Addstaff(Request $req){
        $staff=$req->validate([
            'Name'=>'required',
            'Designation'=>'required',
        ]);
        $data=Staff::create($staff);
        if($data){
            return redirect()->route('admin');
        }  
    }
    public function Addtiming(Request $req){
        $shift=$req->validate([
           'Shift_code'=>'required',
           'Shift_name'=>'required',
           'Entering_time'=>'required',
           'Entering_zone'=>'required',
           'Leaving_time'=>'required',
           'Leaving_zone'=>'required',
           'Fees'=>'required',
        ]);
        $student_shift=shift::where("Shift_code",$req->Shift_code)->get('id');
        
        if(count($student_shift)==0){
           $data=shift::create($shift);
           if($data){
            return redirect()->route('admin');
           }  
        }
        else
            return "<p style='font-size:20px;color:red'>This shift code already exist.<a href='admin'>Back</a></p>";
        
    }
    public function deletestaff(int $id){
        if(Auth::check()){
            $data=Staff::destroy($id);
            return redirect()->route('admin');
        }
    }
    public function deleteshift(int $id){
        if(Auth::check()){
            $data=shift::destroy($id);
            return redirect()->route('admin');
        }
    }


// student.blade.php
public function searchStudent(Request $req){
    $search=$req->validate([
        'search_student'=>'required',
    ]);
    $student_info=student::get();
    $students=student::where('Name',"LIKE","%".$req->search_student."%")->get();
    $active_2="active";
    $show_2="show";
    return view('student',compact(['student_info','students',"active_2","show_2"]));
    
}
//ajax view,delele ,update
public function view_Modal_Data(string $id){
    $data=student::find($id);
    if($data)
        return $data;
    else
        return "not Found";
}
//ajax update
public function update_Modal_Data(string $id){
    $data=student::find($id);
    $shift=shift::all();
    $seat=seat::all();
    $data['shift']=$shift;
    $data['seat']=$seat;
    if($data)
        return $data;
    else
        return "not Found";
}
  
   public function update_student_data(Request $req){
    $data=$req->validate([
        'Name'=>'required',
        'Contact'=>'required',
        'Email'=>'required|email',
        'Father_name'=>'required',
        'Gender'=>'required',
        'Address'=>'required',
        'Seat_no'=>'required',
        'Shift_code'=>'required',
    ]);
    //($request->has('image') {
    // Do your validation check
     //}
 
    $shift_info=shift::find($req->Shift_code);

    $Profile_image="student.jpg";
    if($req->Profile_image!="" && $req->Profile_image!=null){
        $req->validate([
            'Profile_name'=>'mimes:jpg,jpeg,png,bmp,tiff,gif'
        ]);
        $img=$req->file('Profile_image');
        $ext=$img->getClientOriginalExtension();
        $Profile_image=$req->Name."_".time().'.'.$ext;
        $img->move(public_path().'/Student_DP/',$Profile_image);
    }

    $result= student::find($req->update_id)->update([
        'Name'=>$req->Name,
        'Contact'=>$req->Contact,
        'Email'=>$req->Email,
        'Father_name'=>$req->Father_name,
        'Gender'=>$req->Gender,
        'Address'=>$req->Address,
        'Assign_seat'=>$req->Seat_no,
        'Shift_code'=>$shift_info->Shift_code,
        'Student_fees'=>$shift_info->Fees,
        'Profile_image'=>$Profile_image,
    ]);
       

    if($result){
        return redirect()->route('student');
    }
    else
         return "some error check your updating";
  
   }
   
   public function delete_student(string $id){

     $data=student::select('Profile_image')->where('id',$id)->get();
     $filepath=public_path().'/Student_DP/'.$data[0]['Profile_image'];
     if (File::exists($filepath) && $data[0]['Profile_image']!="student.jpg"){
          unlink($filepath);
    }
     $student=student::where('id',$id)->delete();
     $fees=fee::where('Stu_id',$id)->get();
     if(count($fees)!=0)
        fee::where('Stu_id',$id)->delete();

    return redirect()->route('student');
   }

   public function payFees_Modal(string $id){
    $data=student::find($id);
    $staff_info=staff::get();
    $data['staff_info']=$staff_info;
    if($data)
        return $data;
    else
        return "not Found";
   }









}
