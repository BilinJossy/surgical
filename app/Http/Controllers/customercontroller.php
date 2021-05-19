<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\login;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\ProductModel;

class customercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $cname=request('name');
        $cmail=request('email');
        $cpass=request('password');
        $copass=request('confirmpassword');

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:5|max:15',
            'confirmpassword'=>'required|min:5|max:15'
        ]);

        if($cpass == $copass){
        
        
        
        $c=new customer();

        $l=new login();

        $c->name=$cname;
        $c->email=$cmail;
        $c->password=$cpass;

        $l->name=$cname;
        $l->email=$cmail;
        $l->password=$cpass;
        $l->usertype="customer";


        $c->save();
        $l->save();
        //echo "added";
        
        if($c && $l)
             {
               
                $i=customer::select('name')->where('email','like',"$cmail")->first();
                $request->session()->put('sname',$i);

                echo "<script>alert('Success.. Customer Added.....');window.location='/';</script>"; 
             }
             else{
                echo "<script>alert('Something went Wrong.......');window.location='/register';</script>"; 
             }

       


        //return view('index');


        }
        else{
            echo "<script>alert('Password is not correct......');window.location='/register';</script>"; 
        }
        
    }

    public function check(Request $request)
    {
        $getmail=request('email');
        $getpass=request('password');
        //$name=$request->input();
        // $request->session()->put('sname',$getmail);
        // echo session('sname');
        $u=login::select('email')->where('email','like',"$getmail")->first();
        
        if(!$u)
        {
            echo "invalid user";
           //return redirect('/');
        }
        else
        {
        //echo $u->mailid;
        $p=login::select('password')->where('email','like',"$u->email")->first();
        //echo $p->password;
        
        
            if($p->password == $getpass)
            {
                $ut=login::select('usertype')->where('email','like',"$u->email")->first();
                //echo $ut->usertype;
                if($ut->usertype == 'customer')
                {
                    $i=customer::select('name','id')->where('email','like',"$getmail")->first();
                    $request->session()->put('sname',$i);
                    // echo session('sname');
                    // echo "customer";
                    return redirect ('/productlist');
                }
                else if($ut->usertype=='admin')
                {
                    echo "admin";
                    // $i=faculty::select('id')->where('mailid','like',"$getmail")->first();
                    // echo $i;
                    return view('Ahome');
                
                }
                
            }
            else
            {
                echo "invlaid user";
            //    return redirect('/');
            }
        }
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
