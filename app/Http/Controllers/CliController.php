<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\Cli;
use App\Models\Receptionist;
use App\Models\Appoiment;
use  App\Models\Patient;
use App\Models\Precraption;
use App\Models\Doctor;
use App\Http\Controllers\FuncCon;
use App\Models\Prevd;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
class CliController extends Controller
{
    public function index(){
        return view("clilogin");
    }
    public function reg(Request $request){
      //  return floatval($request->lan);
      //return floatval($request->lan);
        $validator = Validator::make($request->all(), [
            
            'name' => 'required|string|max:255|unique:cli',
            
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255|unique:cli',
            'password' => 'required|string|min:6|regex:/[A-Za-z]/',
        ]);

        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()->withErrors($validator)->withInput();

        }else{
            $weekdays = [
                'Sunday' => 0,
                'Monday' => 1,
                'Tuesday'=>2,
                'Wednesday'=>3,
                'Thursday'=>4,
                'Friday'=>5,
                'Saturday'=>6
            ];
            if($request->timef >= $request->timet){
                return redirect()->back()->withErrors("the time_from is largert tahn time_to")->withInput();
            }
            if( $weekdays[$request->dayf] >  $weekdays[$request->dayt]){
                return redirect()->back()->withErrors("the day_from is largert tahn day_to")->withInput();
            }
          
            $day = $request->dayf . " to " . $request->dayt;
            $timef = $request->timef . ":00" ;
            $timet = $request->timet . ":00" ;
           
            
            $password =Hash::make( $request->password);
            $Cli = new Cli;
           
            $Cli->name = $request->name;
            $Cli->email = $request->email;
            $Cli->password = $password;
           if($request->lan != "c"){
            $lan = floatval($request->lan);
            $Cli->lan = $lan;
           }

           if($request->lan != "c"){
            $lon = floatval($request->lon);
            $Cli->lon = $lon;
           }
           
            $Cli->phone = $request->phone;
            $Cli->street = $request->add1;
            $Cli->city = $request->add2;
            $Cli->b_no = $request->add3;
            $Cli->desc2 = $request->desc;
            $Cli->numofvisits = $request->visit;
            $Cli->price = $request->price;
            $Cli->price2 = $request->price2;
            $Cli->work_days = $day;
            $Cli->works_from = $timef;
            $Cli->works_to = $timet;
            $Cli->save();
            return redirect()->back()->with('success', 'Action was successful.');
            
        }
        //return $request->all();
    }
    public function login(Request $request){
        
        $username = $request->email;
        $pass = $request->password;
       
        $val = DB::select('SELECT * FROM `cli` WHERE name = ?', [$username]);
       
        
       if(count($val)){
         $password = $val[0]->password;
         $id = $val[0]->id;
         if (Hash::check($pass, $password)) {
         session()->put('cliid', $id);
         session()->put('cliname', $val[0]->name);
         
        // echo session()->get("id");
       return redirect()->intended('/clinichome');
        //return 22;

         } else {
             
             return redirect()->back()->withErrors("wrong password or username ")->withInput();
         }
       }else{
         return redirect()->back()->withErrors("wrong password or username")->withInput();
       }
    }
    public function home(){
        $cli = Cli::find(session('cliid'));
        if($cli->status){
            return view("choose");
        }else{
            return view("clipost");
        }
    }

public function homepre(Request $request){
    $validator = Validator::make($request->all(), [
        'creditcardnumber' => 'required|numeric|digits:16|unique:doctors',
        'username' => 'required|string|max:255|unique:doctors',
        'cvc' => 'required|numeric|digits_between:3,4',
        
        'password' => 'required|string|min:6|regex:/[A-Za-z]/',
        'username2' => 'required|string|max:255|unique:receptionist',
        
        
        'password2' => 'required|string|min:6|regex:/[A-Za-z]/',
        
        
    ]);
    if ($validator->fails()) {
        // Validation failed
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $clinic_id = session('cliid');
    $password =Hash::make( $request->password);
    $password2 =Hash::make( $request->password2);
   
    //change status of clinic
    $cli = Cli::find($clinic_id);
    $cli->status = 1;
    $cli->save();

    //add t doc database
    $patient = new Doctor;
    $patient->username = $request->username;
    $patient->clinic_id = $clinic_id;
    $patient->creditcardnumber = $request->creditcardnumber;
    $patient->ccv = $request->cvc;
    $patient->password = $password;
    
    $patient->cardtype = $request->creditCardType;
    $patient->save();
    session()->put('docname', $request->username);
    //add to rec database
    $patient2 = new Receptionist;
    $patient2->username2 = $request->username2;
    
    $patient2->clinic_id = $clinic_id;
    $patient2->password = $password2;
    
    
    $patient2->save();

    session()->put('resname', $request->username2);
    
    return redirect('/clinichome');;
}
public function doclogin(){
    return view("doclogin");
}
public function doclogin2(Request $request){
    $docs =  Doctor::where("clinic_id",session('cliid'))->get();
    $usernames = [];
//get all usernames
foreach ($docs as $key => $value) {
   
    $usernames[] = $value->username;
}

  //  return in_array($request->username,$usernames);
    if(!in_array($request->username,$usernames)){
        return  redirect()->back()->withErrors("wrong username")->withInput();
    }
    $val = DB::select('SELECT * FROM `doctors` WHERE username = ?', [$request->username]);
    if(count($val)){
        $password = $val[0]->password;
        $id = $val[0]->id;
       
        if (Hash::check($request->password, $password)) {
        session()->put('docid', $id);
      
       return redirect()->intended('/dochome');

        } else {
            
            return redirect()->back()->withErrors("password is wrong")->withInput();
        }
    }
    
}


public function setcookie1(Request $request){
  

/*
    $inputValue = $request->input('inputValue');

    // Get the type and ID from the input value
    $type = "doc";
    $id = $inputValue;
    $cookieValue = "type={$type};id={$id}";

    // Set the cookie with server-side control
    return response()->cookie('doc2-' . $id, $cookieValue, 254854400); // Expires in 2029

*/
$nameofcook ='docmis'. session('docid');
Cookie::queue(Cookie::make($nameofcook, session('docid'), 600000000000));

return ;
} 


public function viewinfo($id){
    $disease = DB::select("SELECT * FROM `prevdisease` where patient_id = ?",[$id]);
    $disease2 = DB::select("SELECT * FROM `prevdiseasenotes` where patient_id = ?",[$id]);
    
   
    $prec =  DB::select("SELECT * FROM `precraption` where patient_id = ? AND doctor_id = ? ORDER BY created_at DESC",[$id,session('docid')]);
    
    return view('cli.viewinfo',compact('disease','prec','disease2'));
    return $id;
}


public function viewinfo2($id){
    $disease = DB::select("SELECT * FROM `prevdisease` where patient_id = ?",[$id]);
    $disease2 = DB::select("SELECT * FROM `prevdiseasenotes` where patient_id = ?",[$id]);
    
   
    $prec =  DB::select("SELECT * FROM `precraption` where patient_id = ? AND clinic_id = ? ORDER BY created_at DESC",[$id,session('cliid')]);
    
    return view('res.viewinfo',compact('disease','prec','disease2'));
    return $id;
}






public function profits(){
  $today = DB::select(' SELECT * FROM `profits` WHERE DATE(created_at) = CURDATE() AND doctor_id = ?',[session('docid')]  ) ;
 $todayprice = 0;
 foreach ($today as $key => $value) {
   $todayprice += $value->amount;
 }

 $lastweek = DB::select(' SELECT * FROM profits WHERE created_at >= CURDATE() - INTERVAL 7 DAY AND created_at < CURDATE() AND doctor_id = ?',[session('docid')] ) ;
 $lastweekprice = 0;
 foreach ($lastweek as $key => $value) {
   $lastweekprice += $value->amount;
 }

 $lastyear = DB::select(' SELECT * FROM profits WHERE DATE_FORMAT(created_at,"%Y") = YEAR(now()) - 1 AND doctor_id = ?',[session('docid')] ) ;
 $lastyearprice = 0;
 foreach ($lastyear as $key => $value) {
   $lastyearprice += $value->amount;
 }

 $beg = DB::select(' SELECT * FROM `doctors` WHERE  id = ?',[session('docid')] ) ;
 $begprice = $beg[0]->profits;
 
    return view('cli.profits',compact('todayprice','lastweekprice','lastyearprice','begprice'))   ;
}




public function docupdate(Request $request){
    $validator = Validator::make($request->all(), [
        'creditcardnumber' => 'numeric|digits:16',
        'username' => 'required|string|max:255',
        'cvc' => 'required|numeric|digits_between:3,4',
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        
        'phone' => 'nullable|string',
        
    ]);
    if(! (DB::table('doctors')
            ->where('creditcardnumber', $request->creditcardnumber)
            ->where('id', '!=', session('docid'))
            ->count() === 0)){
                Session::flash('error','creditcard number registerd before.');
                return redirect()->back();
            }

    //check username uis unique
if(! (DB::table('doctors')
->where('username', $request->username)
->where('id', '!=', session('docid'))
->count() === 0)){
    Session::flash('error','username taken.');
    return redirect()->back();
}
    if ($validator->fails()) {
        // Validation failed
        return redirect()->back()->withErrors($validator)->withInput();


}else{
  


    //updating
     ///updating
     $id=  $request->hidden;
     $patient = Doctor::find($id);
     if ($patient) {
         if($request->password){
             $password =Hash::make( $request->password);
             $patient->password = $password;
         }
         if(isset($request->file)){
             $image = $request->file('file');
             $imageName = time().'.'.$image->extension();
                 if(!in_array( $image->extension(),['jpeg','png','jpg'])){
                    Session::flash('error','iamge type wrong');
                     return redirect()->back();
                 }
                 
                 $imagePath = public_path('images/');  // Adjust path as needed
         
                 $image->move($imagePath, $imageName);  // Move the file
                 session()->put('docimg', $imageName);
                 $patient->image = $imageName;
                // session()->put('image', $imageName);
            
         }
         $patient->username = $request->username;
         $patient->name = $request->name;
         $patient->email = $request->email;
         $patient->qualification = $request->quli;
         $patient->creditcardnumber = $request->creditcardnumber;
         $patient->ccv = $request->cvc;
      
         $patient->phone = $request->phone;
         $patient->street = $request->street;
         $patient->city = $request->city;
         $patient->b_no = $request->b_no;
         
         $patient->cardtype = $request->creditCardType;
         $patient->save();
         Session::flash('success44','Action was successful.');
         return redirect()->back();
     } else {
        Session::flash('error44','something went wrong.');
         return redirect()->back();
     }

}
}





public function cliupdate(Request $request){
    $weekdays = [
        'Sunday' => 0,
        'Monday' => 1,
        'Tuesday'=>2,
        'Wednesday'=>3,
        'Thursday'=>4,
        'Friday'=>5,
        'Saturday'=>6
    ];
    $validator = Validator::make($request->all(), [
            
        'name' => 'required|string|max:255',
        
        'phone' => 'required|numeric',
        'email' => 'required|email|max:255',
        'password' => 'nullable|string|min:6|regex:/[A-Za-z]/',
    ]);

    if ($validator->fails()) {
        // Validation failed
        return redirect()->back()->withErrors($validator)->withInput();

    }else{
        if($request->timef >= $request->timet){
            Session::flash('error','the time_from is largert tahn time_to');
            return redirect()->back();
        }
        if( $weekdays[$request->dayf] >  $weekdays[$request->dayt]){
            Session::flash('error','the day_from is largert tahn day_to');
            return redirect()->back();
        }

$id=  $request->hidden;
$patient = Cli::find($id);
if ($patient) {
    if($request->password){
        $password =Hash::make( $request->password);
        $patient->password = $password;
    }
   
    
    $patient->name = $request->name;
    $patient->email = $request->email;
    $patient->numofvisits = $request->visit;
    $patient->price = $request->price;
    $patient->price2 = $request->price2;
    $patient->desc2 = $request->desc2;
    $patient->works_from = $request->timef;
    $patient->works_to = $request->timet;
    if($request->lan != "c" && $request->lon != "c"){
        $patient->lan = $request->lan;
        $patient->lon = $request->lon;
    }
    $patient->phone = $request->phone;
    $patient->street = $request->street;
    $patient->city = $request->city;
    $patient->b_no = $request->b_no;
    
    $patient->work_days = $request->dayf . " to " . $request->dayt;
    $patient->save();
    Session::flash('success','Action was successful.');
    return redirect()->back();
    
} else {
    Session::flash('error','something went wrong.');
    return redirect()->back();
}


    }
}

public function setcookie2(Request $request){
  

    /*
        $inputValue = $request->input('inputValue');
    
        // Get the type and ID from the input value
        $type = "doc";
        $id = $inputValue;
        $cookieValue = "type={$type};id={$id}";
    
        // Set the cookie with server-side control
        return response()->cookie('doc2-' . $id, $cookieValue, 254854400); // Expires in 2029
    
    */
    $nameofcook ='resmis'. session('resid');
    Cookie::queue(Cookie::make($nameofcook, session('resid'), 600000000000));
    
    return ;
    } 







    public function resupdate(Request $request){
     //   return $request->all();
        $validator = Validator::make($request->all(), [
           
            'username' => 'required|string|max:255',
            
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            
            'phone' => 'nullable|string',
            
        ]);
       


        if(! (DB::table('receptionist')
        ->where('username2', $request->username)
        ->where('clinic_id', '!=', session('cliid'))
        ->count() === 0)){
            return redirect()->back()->withErrors("username taken")->withInput();
        }
            if ($validator->fails()) {
                // Validation failed
                return redirect()->back()->withErrors($validator)->withInput();
        
        
        }else{
            
    //updating
     ///updating
     $id=  $request->hidden;
     $patient = Receptionist::find($id);
     if ($patient) {
         if($request->password){
             $password =Hash::make( $request->password);
             $patient->password = $password;
         }
         
         $patient->username2 = $request->username;
         $patient->name = $request->name;
         $patient->email = $request->email;
         
      
         $patient->phone = $request->phone;
        
         $patient->save();
         Session::flash('success','Action was successful.');
         return redirect()->back();
         
     } else {
        Session::flash('error','somethinge went wrong');
         return redirect()->back();
     }

           // echo 22222222;
        }





    
    }
    
    








public function resappupd(Request $request){
    $this->validate($request, [
        'date' => 'required|date|after_or_equal:today', // Allows today or after
    ],
     [
        'date.after' => 'The date must be after today or today itself.' // Custom error message
    ]
    );
    $doctor = Appoiment::with('cli')->where("id",$request->hidden)->take(1)->get();
    $userid = $doctor[0]->patient_id;
    
    $strday =  $doctor[0]->cli->work_days;
    $words = explode(' to ', strtolower($strday));
    $capitalizedWords = array_map('ucfirst', $words);
    $firstword =  $capitalizedWords[0];
    $secword =  $capitalizedWords[1];
    $weekdays = [
    'Sunday' => 0,
    'Monday' => 1,
    'Tuesday'=>2,
    'Wednesday'=>3,
    'Thursday'=>4,
    'Friday'=>5,
    'Saturday'=>6
    ];
    $date = Carbon::parse($request->date);
    $dayName = $date->format('l');
    if (($weekdays[$dayName] >= $weekdays[$firstword] && $weekdays[$dayName] <= $weekdays[$secword] )|| ($weekdays[$dayName] >= $weekdays[$secword] && $weekdays[$dayName] <= $weekdays[$firstword]) ) {
        $dateofuser = $request->date;
   
        $appointments = Appoiment::where('patient_id', $userid)
         ->where('date', $dateofuser)
         ->where("clinic_id",$doctor[0]->cli->id)
         ->get();
         if( count($appointments)){
             $error = 'you can not make more than one appoiment in the same day for the same clinic';
             return view("redirect2",compact('error'));
         }
    
    
        //check if queue is  full
    
    $dateofuser = $request->date;
    $appointments = Appoiment::where('date', $dateofuser)
    ->where("clinic_id",$doctor[0]->cli->id)
    ->get();
    $count = count($appointments);
    if(count($appointments) >= $doctor[0]->cli->numofvisits){
        $error = "this day is full choose another day";
        
        return view("redirect2",compact('error'));
    }
    $updated = Appoiment::where('id', $request->hidden)->update(['date' => $dateofuser,'queue_num'=>$count + 1]);

 
    $clinicname = Cli::find(session('cliid'))->name;
    $message = "your appoimnet has been moved to the another day($dateofuser) by  " . $clinicname . " for some reason" . "try to make other preservation";
    DB::insert('INSERT INTO notifications ( seen, type, message, color, patient_id, clinic_id) VALUES ( ?,?, ?, ?, ?, ?)', [0, 'pat',$message,"green",$userid,session('cliid')]);
   
  


    $success = 'Action was successful';
    return view("redirect2",compact('success'));
    } else {
        $error = "not open this day!!";
        
        return view("redirect2",compact('error'));
    }
    // return $doctor[0];
    // return $request->all();
}










}
