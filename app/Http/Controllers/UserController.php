<?php

namespace App\Http\Controllers;
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
use App\Models\Prevd;
use App\Models\Image;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(){
        return view("userlogin");
    }
    public function prereg(Request $request){
        
        
        $validator = Validator::make($request->all(), [
            'creditcardnumber' => 'nullable|numeric|digits:16|unique:patient',
            'username' => 'required|string|max:255|unique:patient',
            'cvc' => 'nullable|numeric|digits_between:3,4',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:patient',
            'password' => 'required|string|min:6|regex:/[A-Za-z]/',
            'phone' => 'required|string',
            'add1' => 'nullable|string',
            'add2' => 'nullable|string',
            'add3' => 'nullable|string',
            
            
        ]);
        $image = $request->file('image');
        //return $image->extension();
        $imageName = time().'.'.$image->extension();
        if(!in_array( $image->extension(),['jpeg','png','jpg'])){
            return redirect()->back()->withErrors("iamge type wrong")->withInput();
        }
        
        $imagePath = public_path('images/');  // Adjust path as needed

        $image->move($imagePath, $imageName);  // Move the file
        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()->withErrors($validator)->withInput();
            }else{
                $password =Hash::make( $request->password);
                $patient = new Patient;
                $patient->username = $request->username;
                $patient->name = $request->name;
                $patient->email = $request->email;
                $patient->creditcardnumber = $request->creditcardnumber;
                $patient->ccv = $request->cvc;
                $patient->password = $password;
                $patient->phone = $request->phone;
                $patient->street = $request->add1;
                $patient->city = $request->add2;
                $patient->b_no = $request->add3;
                $patient->image = $imageName;
                $patient->cardtype = $request->creditCardType;
                $patient->save();
                return redirect()->back()->with('success', 'Action was successful.');
            }
        
        
    }
function prelog(Request $request){
    

    
           $username = $request->email;
           $pass = $request->password;
          
           $val = DB::select('SELECT * FROM `patient` WHERE username = ?', [$username]);
           
          if(count($val)){
            $password = $val[0]->password;
            $id = $val[0]->id;
            if (Hash::check($pass, $password)) {
            session()->put('userid', $id);
            session()->put('username', $val[0]->username);
            session()->put('image', $val[0]->image);
           // echo session()->get("id");
           return redirect()->intended('/userhome');

            } else {
                
                return redirect()->back()->withErrors("wrong password or username")->withInput();
            }
          }else{
            return redirect()->back()->withErrors("wrong password or username")->withInput();
          }
        
    
    
}
public function search(Request $request){
      // $doctors =  Doctor::paginate(3);
      
      if($request->value == ''){
        $num = (int) $request->pageNumber;
        $offset = ($num * 3 - 3); // Start from row 11 (0-indexed)
        $limit = 3;    // Retrieve 3 doctors
        if($request->selectedValue == "rating"){
            $doctors = Doctor::with('cli')
   
            ->selectRaw('doctors.*, rating / GREATEST(numofrating, 1) * LEAST(numofrating, 4) AS adjusted_rating')
            ->offset($offset)
            ->limit($limit)
            ->orderBy('adjusted_rating', 'DESC')
            ->get();
            /*
            $doctors = Doctor::with('cli')
   
            ->select('*')
            ->offset($offset)
            ->limit($limit)
            ->orderBy("rating",'DESC')
            ->get();
            */
            return response()->json(['success'=>"heello amssh shsajh",'result'=>$doctors]); 
        }elseif( strpos($request->value, "distance") === 0){
            $doctors =Doctor::with('cli')->get();
            return response()->json(['success'=>"heello amssh shsajh",'result'=>$doctors]); 
        }
        else{
    $doctors = Doctor::with('cli')
   
    ->select('*')
    ->offset($offset)
    ->limit($limit)
    ->orderBy("id",$request->selectedValue)
    ->get();
    return response()->json(['success'=>"heello amssh shsajh",'result'=>$doctors]); 
        }
    }
    $doctors = Doctor::with('cli')
    ->where(function ($query) use ($request) {
        $query->where('username', 'like', "%$request->value%")
              ->orWhereHas('cli', function ($query) use ($request) {
                  $query->where('name', 'like', "%$request->value%");
              })
              ->orWhereHas('cli', function ($query) use ($request) {
                $query->where('city', 'like', "%$request->value%");
            })
            ->orWhereHas('cli', function ($query) use ($request) {
                $query->where('b_no', 'like', "%$request->value%");
            });
    })
    ->get();




  $searchTerm = $request->value;
  if (!count($doctors)){
    $results = Doctor::with('cli')
      
    ->get()
    ->filter(function ($item) use ($searchTerm) {
        return levenshtein($item->cli->city, $searchTerm) <= 2;
      });
       
    
     
    if(!count($results)){
        $results = Doctor::with('cli')
        ->get()
        ->filter(function ($item) use ($searchTerm) {
            return levenshtein($item->cli->name, $searchTerm) <= 3;
        });
    } 
    if(!count($results)){
      $results = Doctor::with('cli')
      
      ->get()
      ->filter(function ($item) use ($searchTerm) {
          return levenshtein($item->username, $searchTerm) <= 2;
        });
    }
    if(!count($results)){
        $results = Doctor::with('cli')
      
        ->get()
        ->filter(function ($item) use ($searchTerm) {
            return levenshtein($item->cli->b_no, $searchTerm) <= 2;
          });
     
    }

    $newarr = [];
  foreach($results as $result){
    $newarr[] = $result;
  }
$doctors = $newarr;
  return response()->json(['success'=>"heello amssh shsajh",'result'=>$doctors,"page"=> $request->pageNumber]); 
}
   //foreach($doctors as $doctor){
  //  return $doctor->cli->id;
  // }
    
    return response()->json(['success'=>"heello amssh shsajh",'result'=>$doctors,"page"=> $request->pageNumber]); 
   //return view("users.main",compact("doctors"));
}
//////////////////////////////////////////
public function appoiments($id){
    $patient = Patient::find(session('userid'));
    return view("users.appoi",compact("id",'patient'));
}



public function appoimentspre(Request $request){
   $doctor= Doctor::with('cli')->where("id",$request->hidden)->take(1)->get();
   $this->validate($request, [
    'date' => 'required|date|after_or_equal:today', // Allows today or after
],
 [
    'date.after' => 'The date must be after today or today itself.' // Custom error message
]
);
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

if (($weekdays[$dayName] >= $weekdays[$firstword] && $weekdays[$dayName] <= $weekdays[$secword] )|| ($weekdays[$dayName] >= $weekdays[$secword] && $weekdays[$dayName] <= $weekdays[$firstword]) ||($weekdays[$secword] == $weekdays[$firstword]) ) {
   //check if user made appoiment this date
   $userid=  session("userid");
   $dateofuser = $request->date;
   
   $appointments = Appoiment::where('patient_id', $userid)
    ->where('date', $dateofuser)
    ->where("clinic_id",$doctor[0]->cli->id)
    ->get();
    if( count($appointments)){
        $error = 'you can not make more than one appoiment in the same day for the same clinic';
        return view("redirect",compact('error'));
    }
    //check if queue is  full
    $appointments = Appoiment::where('date', $dateofuser)
    ->where("clinic_id",$doctor[0]->cli->id)
    ->get();
    $count = count($appointments);
    if(count($appointments) >= $doctor[0]->cli->numofvisits){
        $error = 'this day is full choose another day';
        return view("redirect",compact('error'));
    }
    //add appoiment to database
    $queeuenum = $count + 1;
    
    $patient = new Appoiment;
    $patient->clinic_id = $doctor[0]->cli->id;
    $patient->date = $request->date;
    $patient->queue_num = $queeuenum;
    $patient->patient_id = $userid;
    $patient->payment_status = $request->radio;
    
    $patient->save();
    $clinicname = Patient::find(session('userid'))->name;
    $message = "user make appoiment with you  his name is " . $clinicname . "  his appoument  is in ". $request->date ;
    DB::insert('INSERT INTO notifications ( seen, type, message, color, patient_id, clinic_id) VALUES ( ?,?, ?, ?, ?, ?)', [0, 'cli',$message,"red",session('userid'),$doctor[0]->cli->id]);
    $success = 'Action was successful';
    return view("redirect",compact('success'));

} else {
    $error = 'not open this day!!!';
    return view("redirect",compact('error'));
}
   
//return $request->all();
}



public function appoimentstable(){
    $appoiment = Appoiment::with('cli')->where("patient_id",session('userid'))->OrderBy('date','asc')->paginate(2);
   // return $appoiment;
    return view("users.appoiments",compact("appoiment"));
}

public function appupdate(Request $request){
    $this->validate($request, [
        'date' => 'required|date|after_or_equal:today', // Allows today or after
    ],
     [
        'date.after' => 'The date must be after today or today itself.' // Custom error message
    ]
    );
    $doctor = Appoiment::with('cli')->where("id",$request->hidden)->take(1)->get();
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
    //check if queue is  full
    $dateofuser = $request->date;
    $appointments = Appoiment::where('date', $dateofuser)
    ->where("clinic_id",$doctor[0]->cli->id)
    ->get();
    $count = count($appointments);
    if(count($appointments) >= $doctor[0]->cli->numofvisits){
        $error = "this day is full choose another day";
        
        return view("redirect",compact('error'));
    }
    $updated = Appoiment::where('id', $request->hidden)->update(['date' => $dateofuser,"payment_status" =>$request->radio]);

    $clinicname = Patient::find(session('userid'))->name;
    $message = "user updated his appoiment with you  his name is " . $clinicname . "  his appoument  is in ". $date ;
    DB::insert('INSERT INTO notifications ( seen, type, message, color, patient_id, clinic_id) VALUES ( ?,?, ?, ?, ?, ?)', [0, 'cli',$message,"red",session('userid'),$doctor[0]->cli->id]);
    $success = 'Action was successful';
    return view("redirect",compact('success'));

} else {
    $error = "not open this day!!";
        
    return view("redirect",compact('error'));
}
   // return $doctor[0];
   // return $request->all();
}

public function rate(Request $request){
$rating = $request->hidden;
$doc_id = $request->hidden2;
$user_id = $request->hidden3;
//check if it is insert or edit
$record = DB::select('SELECT * FROM `rating` WHERE doctor_id = ? AND patient_id =?', [$doc_id,$user_id]);
$doc2 = Doctor::find($doc_id);
$clinic_id2 = $doc2->clinic_id;
$prec = Precraption::where('patient_id',session('userid'))->where('clinic_id',$clinic_id2)->where('doctor_id',$doc_id)->first();
if($prec == null){
    $error = 'you have to be examined by the doctor before giving him rating';
    return view("redirect",compact('error'));
   
}
if( !count($record)){
//insert
$doc = Doctor::find($doc_id);
$clinic_id = $doc->clinic_id;

$clinicname = Patient::find(session('userid'))->name;
$message = "user give you rating $rating/5 his name is " . $clinicname  ;
DB::insert('INSERT INTO notifications ( seen, type, message, color, patient_id, clinic_id) VALUES ( ?,?, ?, ?, ?, ?)', [0, 'cli',$message,"red",session('userid'),$clinic_id]);

$newnumofrating = $doc->numofrating + 1;
$newrating = $doc->rating + $rating ;
//return $newnumofrating . "--- - " .$newrating;
$record2 = DB::insert('insert into rating (doctor_id, patient_id,rating) values (?, ?,?)', [$doc_id, $user_id,$rating]);
$record3 = DB::update('update doctors set numofrating = ? ,rating = ? where id = ?', [$newnumofrating,$newrating,$doc_id]); 
$success= 'Action was successful.';
return view("redirect",compact('success'));
}else{
//edit
$doc = Doctor::find($doc_id);
$clinic_id = $doc->clinic_id;




$substractedrating =  $record[0]->rating;

$clinicname = Patient::find(session('userid'))->name;
$message = "user updated his rating to you to  $rating/5 after it was $substractedrating/5 his name is " . $clinicname  ;
DB::insert('INSERT INTO notifications ( seen, type, message, color, patient_id, clinic_id) VALUES ( ?,?, ?, ?, ?, ?)', [0, 'cli',$message,"red",session('userid'),$clinic_id]);

$newrating = ($doc->rating - $substractedrating) + $rating ;
$id = $record[0]->id;
$record2 = DB::update('update rating set rating =? where id = ?', [$rating,$id]);
$record3 = DB::update('update doctors set rating = ? where id = ?', [$newrating,$doc_id]); 
$success = 'Action(updating) was successful.';
return view("redirect",compact('success'));

}

}

public function userupdate(Request $request){
    $validator = Validator::make($request->all(), [
        'creditcardnumber' => 'nullable|numeric|digits:16',
        'username' => 'required|string|max:255',
        'cvc' => 'nullable|numeric|digits_between:3,4',
        'name' => 'required|string|max:255',
        'email' => 'email|max:255',
        
        'phone' => 'required|string',
        
    ]);
    //return $request->all();
    //check credit card si unique
    if(! (DB::table('patient')
            ->where('creditcardnumber', $request->creditcardnumber)
            ->where('creditcardnumber','!=',null)
            ->where('id', '!=', session('userid'))
            ->count() === 0)){
                Session::flash('error',' creditcard taken');
                return redirect()->back();
            }
//check username uis unique
if(! (DB::table('patient')
->where('username', $request->username)
->where('id', '!=', session('userid'))
->count() === 0)){
    $error = 'username taken.';
    return view("redirect",compact('error'));
   
}
 if ($validator->fails()) {
            // Validation failed
            return redirect()->back()->withErrors($validator)->withInput();


 }else{
   

    ///updating
    $id=  $request->hidden;
    $patient = Patient::find($id);
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
                $patient->image = $imageName;
                session()->put('image', $imageName);
           
        }
        $patient->username = $request->username;
        $patient->name = $request->name;
        if($request->email){
        $patient->email = $request->email;
        }
        $patient->creditcardnumber = $request->creditcardnumber;
        $patient->ccv = $request->cvc;
     
        $patient->phone = $request->phone;
        $patient->street = $request->street;
        $patient->city = $request->city;
        $patient->b_no = $request->b_no;
        
        $patient->cardtype = $request->creditCardType;
        $patient->save();
        $success= 'Action was successful.';
        return view("redirect",compact('success'));
        
    } else {
        $error = 'somethinge went wrong.';
    return view("redirect",compact('error'));
   
    }
 }




    /*
    if(isset($request->file)){
        return 222;
    }else{
        return 1111111111;
    }
    $image = $request->file('file');
    $imageName = time().'.'.$image->extension();
        if(!in_array( $image->extension(),['jpeg','png','jpg'])){
            return redirect()->back()->withErrors("iamge type wrong")->withInput();
        }
        
        $imagePath = public_path('images/');  // Adjust path as needed

        $image->move($imagePath, $imageName);  // Move the file
    return $imageName;
    return $request->all();
    */
}
public function googlepage(){
    return Socialite::driver('google')->redirect();
}

public function googlecallback(){
    try {
      
        $user = Socialite::driver('google')->user();

        $finduser =Patient::where('google_id', $user->id)->first();
   
        if($finduser)

        {
   
            session()->put('userid', $finduser->id);
            session()->put('username', $finduser->username);
            session()->put('image', $finduser->image);
            session()->put('imagenet', true);
  
         
            return redirect('/userhome');
        }

        else

        {
          
            $newUser = Patient::create([
                'username' => $user->name,
                'email' => $user->email,
                'google_id'=> $user->id,
                'password' => $user->id,
                'image' => $user->avatar
                
            ]);
  
            //return redirect('/userlogin')->back();
            return redirect('/userlogin')->with('success', 'you register with your google account click on continue with google button to login');
          
        }
  
    } catch (Exception $e) {
        dd($e->getMessage());
    }
}


public function appt(){
    $date1 = Carbon::parse('now')->addHours(3);
    // Set the timezone to Egypt (Africa/Cairo)
$date1 = $date1->setTimezone('utc')->toDateTime();
 //Egypt observes Eastern European Summer Time (EEST), which is UTC+3 ( Coordinated Universal Time plus 3 hours). This means that Egyptian time is 3 hours ahead of Coordinated Universal Time (UTC).
 
$today = Carbon::today()->toDateString('Y-m-d');
    $app =Appoiment::with("cli")->where("patient_id",session("userid"))->whereDate('date', '=', $today)
    ->orderBy('queue_num','asc')
    ->get();
   
    $arr = [];
    $arr2 = [];
    foreach($app as $item){
        $date2 =Carbon::parse( $item->cli->works_from)->toDateTime();
        $date3 = Carbon::parse($item->cli->works_to)->toDateTime();
    // return [$date1,$date2,$date3];
 
        if ($date1 >= $date2 && $date1 < $date3) {
          // Do something if date1 is more than X minutes before date2
          array_push($arr2,true);
        } else {
          // Do something if date1 is less than X minutes before date2 (meaning date2 is in the future)
          array_push($arr2,false);
        } 
        $app2 =Appoiment::where("clinic_id",$item->clinic_id)->whereDate('date', '=', $today)
        ->where('queue_num',"<",$item->queue_num)
        ->get();
        
        array_push($arr,count($app2));
        
    }
   

    return view("users.appt",compact('app','arr','arr2'));
}


}
