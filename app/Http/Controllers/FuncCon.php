<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\Cli;
use App\Models\Receptionist;
use App\Models\Appoiment;
use  App\Models\Patient;
use App\Models\Precraption;
use App\Models\Doctor;
use App\Models\Prevd;

use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
class FuncCon extends Controller
{
    //function to remove appoiments taht is out dated
   public function removedated(){
    return Appoiment::where('date', '<', today()->format('Y-m-d'))->delete();
   }
   public function removedated2(){
      return DB::delete('DELETE FROM notifications where seen = ?', [1]);
     }
     public function removedated3(){
      return DB::delete('DELETE FROM chat where created_at < ?', [today()->format('Y-m-d')]);
     }
   //show message if the doc or res did nt show all data
   public function docmissing(){
    $doc = Doctor::find(session('docid'));
   
    if($doc->name == null || $doc->b_no == null || $doc->street == null || $doc->city == null || $doc->phone == null||$doc->qualification == null){

       return 1;
    }else{
        return 0;
    }
   }
      //show message if the doc or res did nt show all data
      public function docmissing2(){
        $doc = Receptionist::find(session('resid'));
       
        if($doc->name == null ||  $doc->phone == null||$doc->email == null){
    
           return 1;
        }else{
            return 0;
        }
       }
///profits optimazition
         //change over all profits of the doc to the profits sum
         
      public function profits1(){
        $doc = Doctor::find(session('docid'));
       $val = DB::select('SELECT SUM(amount) AS sum FROM `profits` WHERE doctor_id = ? AND  seen = 0', [session('docid')]);
       $val2 = DB::update('UPDATE `profits` SET seen = 1 WHERE doctor_id = ?', [session('docid')]);
       $doc->profits += $val[0]->sum;
       $doc->save();
        
       }


       public function profits2(){
     
        DB::delete('DELETE FROM profits WHERE YEAR(now()) - 2 >= DATE_FORMAT(created_at,"%Y") AND doctor_id = ?', [session('docid')]);
      
      
        
       }
       



public function clidelay(){
  $apppoimentsToday = Appoiment::where('date',today())->where('clinic_id',session('cliid'))->where('status',0)->get();
  $ids = [];
  $cli = Cli::find(session('cliid'));
  $maxqueue = $cli->numofvisits;
  $startDate = Carbon::tomorrow();
  /////////////////////////
  $strday =  $cli->work_days;
  
$words = explode(' to ', strtolower($strday));

$capitalizedWords = array_map('ucfirst', $words);
$firstword =  $capitalizedWords[0];
$secword =  $capitalizedWords[1];



  /////////////////

  $userids = [];
  foreach ($apppoimentsToday  as $key => $value) {
   $ids[$key] = $value->id;
   $userids[$key ] = $value->patient_id;
  }
 
  foreach ($ids as  $key => $id) {

  $date = $this->clidelay2($id,$startDate,$maxqueue,$firstword,$secword) ;
  
$startDate = $date;
$message = "clinic it is name is " . $cli->name . " the doctor will not come today and your appoiment ahs been delayed for another date  ". $startDate ;
  DB::insert('INSERT INTO notifications ( seen, type, message, color, patient_id, clinic_id) VALUES ( ?,?, ?, ?, ?, ?)', [0, 'pat',$message,"red",$userids[$key],session('cliid')]);

  }
  
  return true;
}
public function clidelay2($id,$startDate,$maxqueue,$firstword,$secword){
 ////////////////////////
 $weekdays = [
   'Sunday' => 0,
   'Monday' => 1,
   'Tuesday'=>2,
   'Wednesday'=>3,
   'Thursday'=>4,
   'Friday'=>5,
   'Saturday'=>6
];


 /////////////////////////////
   for ($i = 0; $i < 1000; $i++) {
     $currentDate = $startDate->copy();  // Create a copy to avoid modifying original date
     $formattedDate = $currentDate->format('Y-m-d');
     $date = Carbon::parse($formattedDate);
$dayName = $date->format('l');
if (($weekdays[$dayName] >= $weekdays[$firstword] && $weekdays[$dayName] <= $weekdays[$secword] )|| ($weekdays[$dayName] >= $weekdays[$secword] && $weekdays[$dayName] <= $weekdays[$firstword]) ) {
   //check if queue is  full
 // echo $formattedDate;
 $apppoimentsToday = Appoiment::where('date',$formattedDate)->where('clinic_id',session('cliid'))->get();
 $count =  count($apppoimentsToday);
 print_r([$count,$maxqueue,session('cliid'),$formattedDate]);
 if($count >= $maxqueue){
    $startDate->addDay();

    continue;
 }else{
    
    $appoiment = Appoiment::find($id);
    $appoiment->date = $formattedDate;
    $appoiment->queue_num = $maxqueue - ($maxqueue - $count) + 1;
    $appoiment->save();
    break;
 }

}else{
   $startDate->addDay();
   continue;
}
   
  
//  echo $appoiment->id;
   
  

   
    
   }
   return $startDate;
}
}
