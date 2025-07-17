<?php

namespace App\Http\Controllers;

use App\Models\fee;
use App\Models\shift;
use App\Models\student;
use App\mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{
    public function send_Mail(Request $req){
        if($req->mail_id==='786'){
            $message="Hellow! You are running late. Your Library fees is pending.";
            $subject="The Success Point Library Pending Fees";
           
            $all_student_list=student::get();
            $current_month_from_database=fee::get();

            $unpaid_student=array();
            $current_month_from_system=date('m');
            $list_student=array();
            foreach($all_student_list as $list_key=>$list_value){
                $unpaid_student=fee::where('Stu_id',$list_value->id)->get();
                foreach($unpaid_student as $unpaidkey=>$unpaidvalue){
                            if($unpaidvalue->Status==="success"){
                                $from_month=date("m",strtotime($unpaidvalue->From_month));//convert string into date
                                $to_month=date("m",strtotime($unpaidvalue->To_month));
                                if($current_month_from_system!==$from_month || $current_month_from_system!==$to_month){
                                    $timing=shift::where('Shift_code',$list_value->Shift_code)->get();
                                    $details=[
                                        "Enrollment_id"=>$list_value->Enrollment_id,
                                        'Name'=>$list_value->Name,
                                        'Father_name'=>$list_value->Father_name,
                                        'Shift'=>$timing[0]->Shift_name." - ".$timing[0]->Entering_time.$timing[0]->Entering_zone." - ".$timing[0]->Leaving_time.$timing[0]->Leaving_zone,
                                        'Seat'=>$list_value->Assign_seat,
                                        'Fees'=>$list_value->Student_fees,
                                        'Payed_till'=>$list_value->Payed_till,
                                    ];
                                
                                    $mail=Mail::to($list_value->Email)->send(new welcomeemail($message,$subject,$details));
                                }
                            }
                    }
            }
            
                
               
            return redirect()->route('welcome');
            
        }
        elseif($req->mail_id){
            $student=student::find($req->mail_id);
            $toEmail=$student->Email;
            $message="Hellow! You are running late. Your Library fees is pending.";
            $subject="The Success Point Library Pending Fees";
            $timing=shift::where('Shift_code',$student->Shift_code)->get();
            $details=[
                "Enrollment_id"=>$student->Enrollment_id,
                'Name'=>$student->Name,
                'Father_name'=>$student->Father_name,
                'Shift'=>$timing[0]->Shift_name." - ".$timing[0]->Entering_time.$timing[0]->Entering_zone." - ".$timing[0]->Leaving_time.$timing[0]->Leaving_zone,
                'Seat'=>$student->Assign_seat,
                'Fees'=>$student->Student_fees,
                'Payed_till'=>$student->Payed_till,
            ];
            $mail=Mail::to($toEmail)->send(new welcomeemail($message,$subject,$details));
            // $mail_status="success";
            return redirect()->route('welcome');
        }
        else{
            return "No Student Selected.<a href='welcome'>Back</a>" ;
        }
   }
}
