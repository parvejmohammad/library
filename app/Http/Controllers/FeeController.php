<?php

namespace App\Http\Controllers;

use App\Models\fee;
use App\Models\shift;
use App\Models\student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\pdf;
use Illuminate\Support\Facades\DB;

class FeeController extends Controller
{
    public function Student_payment(Request $req){
        $pay_data=$req->validate([
            'pay_id'=>'required',
            'Staff_name'=>'required',
            'Amount'=>'required',
            'Payment_mode'=>'required',
            'From_month'=>'required',
            'To_month'=>'required',
        ]);
        $delete_old=DB::table('fees')->where('Stu_id',$req->pay_id)->delete();
        $fee_pay=fee::create([
            'Payment_mode'=>$req->Payment_mode,
            'From_month'=>$req->From_month,
            'To_month'=>$req->To_month,
            'Amount'=>$req->Amount,
            'Staff_name'=>$req->Staff_name,
            'Status'=>"success",
            'Stu_id'=>$req->pay_id,
        ]);
        student::find($req->pay_id)->update([
            'Payed_till'=>$req->To_month,
        ]);
        $active_3="active";
        $show_3="show";
        $student_reciept=student::find($req->pay_id);
        $fees_download=fee::where('Stu_id',$req->pay_id)->get();
        if($student_reciept)
            return view('student',compact(['student_reciept','fees_download','active_3','show_3']));
        else
            return "Some Error: Payment can't make.";
    }
    public function Old_reciept(string $id){
        $active_3="active";
        $show_3="show";
        $student_reciept=student::find($id);
        $students=$student_reciept;
        $fees_download=fee::where('Stu_id',$id)->get();
        if($student_reciept)
            return view('student',compact(['students','student_reciept','fees_download','active_3','show_3']));
        else
            return "Some Error: Payment can't make.";
    }
    public function donwloadPDF(string $id){
        $fee=fee::find($id);
        $student=student::find($fee->Stu_id);
        $data=[
            'title'=>'The Success Point Library',
            'date'=>date('d/m/Y'),
            'student'=>$student,
            'fee'=>$fee,
        ];
        $pdf=Pdf::loadView('download_reciept',$data);
        return $pdf->download('TSPL_receipt.pdf');
    }
    public function mixContent(string $id){
        $shift_=shift::get();
        if($id==1){
            $active_navbar_Fees="active_navbar_link active";
            return view('mix',compact(['id','shift_','active_navbar_Fees']));
        }
        elseif($id==2){
            $active_navbar_Income="active_navbar_link active";
            return view('mix',compact(['id','shift_','active_navbar_Income']));
        }
        elseif($id==3){
            $active_navbar_Gallery="active_navbar_link active";
            return view('mix',compact(['id','shift_','active_navbar_Gallery']));
        }
        elseif($id==4){
            $active_navbar_About="active_navbar_link active";
            return view('mix',compact(['id','shift_','active_navbar_About']));
        } 
    }

    public function sendReminder(){
        $all_student_list=student::get();
        $current_month_from_database=fee::get();

        $unpaid_student=array();
        $dates=array();
        $current_month_from_system=date('m');
        $list_student=array();
        foreach($all_student_list as $list_key=>$list_value){
            $unpaid_student=fee::where('Stu_id',$list_value->id)->get();
            foreach($unpaid_student as $unpaidkey=>$unpaidvalue){
                        if($unpaidvalue->Status==="success"){
                            $from_month=date("m",strtotime($unpaidvalue->From_month));//convert string into date
                            $to_month=date("m",strtotime($unpaidvalue->To_month));
                            if($current_month_from_system!==$from_month && $current_month_from_system!==$to_month){
                               if($from_month<$current_month_from_system && $to_month<$current_month_from_system ){
                                 $list_student[]=$list_value;
                               }
                            }
                        }
                }
        }
        
        return $list_student;
    }

    
}
 























