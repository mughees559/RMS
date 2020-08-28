<?php

namespace App\Http\Controllers;
use App\student;
use Mail;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\support\facades\Storage;
class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        return view('loginStudent');
    } 

    public function signup()
    {
        return view('SignupStudentPage');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'roll_no' => 'required',
            'email' => 'required',
            'password' => 'required',
            're_password' => 'required',
            'phone_no' => 'required',
            'agree-term' => 'required',
        ]);

        $name = $request->name;
        $roll_no = $request->roll_no;
        $email = $request->email;
        $password = $request->password;
        $phone_no = $request->phone_no;
        $re_password = $request->re_password;
        $userEmail = "";
        $obj = new student;

        if ($email != "")
        {
            $useremail = $obj::where('email', $email)->get();
            foreach($useremail as $row)
            {
               $userEmail=$row->email;
            }
            if ($userEmail == $email) 
            {
                return redirect('/signup')->with('message', $email.' is already exist!');
            }
            else
            {
                $obj->name = $name;
                $obj->roll_no = $roll_no;
                $obj->email = $email;
                $obj->password = $password;
                $obj->phone_no = $phone_no;
                $obj->re_password = $re_password;
                $obj->save();

                return redirect('/login')->with('message', $name.'! You are Registered Successfully!');
            }
        }
        else
        {
            $error=true;
            return redirect('/signup')->with('message','404');
        }
    } 

    public function validatelogin(Request $request)
    {
        $request -> validate([
            'email' => 'required',
            'pass' => 'required',
        ]);
        $userName="";
        $email= $request->email;
        $pass= $request->pass;

        $obj = new student;
        $user=$obj::where('email', $email)
        ->where('password',$pass)->get();
        foreach($user as $row)
       {
           $userEmail=$row->email;
           $userName=$row->name;
           $id=$row->id;
       }
        if($userName!="")
        { 
            // if ($userName == 'Mughees' || $userName == 'Faryal') 
            // {
               session(['user'=>'student','id'=> $id,'email'=>$userEmail,'name'=>$userName]);
                 return redirect('/panelStudent')->with('message', $userName.'! You are Logged in Successfully!'); 
        
                 
        }
        else
        {
            $error=true;
            return redirect('/login')->with('message','404');
        }
    } 

    public function panel()
    {
        return view('panelStudent');
    } 

    public function synopsis_submit_page(){
        return view('synopsis_submit_page');
    }

    public function store_synopsis(request $request){
       echo "Synopsis subitted successful! path:\n\n";
        // $request->file('docx');
        // return $request->docx->store('public'); 
                            // if($request->hasFile('docx'))
                            // {
                            // $request->file('docx');
                            //  $request->docx->store('public');
                            // return $request->docx->storeAs('public','test.docx');
                            // } 

                            // else{
                            //      echo"No File Selected";
                            //     }
                         $document = new Document();
                           $document->synopsis_holder = $request->input('synopsis_holder');
                          $document->synopsis_supervisor = $request->input('synopsis_supervisor');
                          if($request->hasfile('synopsis_docx')){
                        

                            $file= $request->file('synopsis_docx');
                            $extension = $file->getclientoriginalExtension();
                            $filename = time().'.'.$extension;
                            $file->move('upload/synopsisfolder/',$filename);
                            $document->synopsis_docx = $filename;
                          } 
                          else{

                          }
                          $document->save();
// return redirect('/showdocx');
return redirect('/emailsend');
    }

    public function emailing(){
        $to_name = 'Mughees khan';
        $to_email ="maazrehan@ciitwah.edu.pk";
        $data = array('name'=>'Mughees','body'=>"your proposal is submitted successful!\n");
        Mail::send('mail',$data,function($message) use($to_name,$to_email){

            $message->to($to_email)->subject('Web testing mail');
        });
echo"email has sent to the person";
    }






public function showdocx(){

    
    $documents = Document::all();
    return view('show_document_form')->with('documents',$documents);
}

    public function logout()
    {
        session()->flush();
        return redirect('/')->with('message','You Are Logged Out.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
