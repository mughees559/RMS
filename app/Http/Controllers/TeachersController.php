<?php

namespace App\Http\Controllers;
use App\teacher;

use Illuminate\Http\Request;
//use App\Teacher;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         return view('teachers.loginteacher');

        
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'field' => 'required',
            'email' => 'required',
            'password' => 'required',
            're_password' => 'required',
            'phone_no' => 'required',
            'agree-term' => 'required',
        ]);

        $name = $request->name;
         $field = $request->field;
        $email = $request->email;
        $password = $request->password;
        $phone_no = $request->phone_no;
        $re_password = $request->re_password;
        $userEmail = "";//waja btayga bad ma
        $obj = new teacher;

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
                $obj->field = $field;
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
    public function logout()
    {
        session()->flush();
        return redirect('/')->with('message','You Are Logged Out.');
    }

    public function login()
    {
        return view('login');
    }
    public function signup()
    {
        return view('SignupPage');
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

        $obj = new teacher;
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
               session(['user'=>'teacher','id'=> $id,'email'=>$userEmail,'name'=>$userName]);
                 return redirect('/panel')->with('message', $userName.'! You are Logged in Successfully!'); 
           
                 
        }
        else
        {
            $error=true;
            return redirect('/login')->with('message','404');
        }
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
    public function panelteacher()
    {
        return view('teachers.panelteacher');
    }


    public function teacherpic(){
        return view('teachers.teacherpic');
    }

    public function uploadteacherpic(Request $request){
         
        echo $request->file('img')->store('upload');
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
