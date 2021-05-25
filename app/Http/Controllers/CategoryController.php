<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\FeedbackModel;
use App\Models\customer;
use App\Models\OrderModel;
use session;
use Carbon\Carbon;
use App\Models\login;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorydata = CategoryModel::all();
        $brand = BrandModel::all();
        return view ('Aproduct',compact('categorydata','brand'));
    }

    public function viewitem()
    {
        $item=ProductModel::all();

        return view('Aview',compact('item'));
    }


    public function edititem($id)
    {
        $item=ProductModel::find($id);
        return view('Aedit',compact('item'));

    }


    public function updateitem(Request $request, $id)
    {
        // $cid=request('select');
        // $bid=request('brand1');
        $pname=request('prname');
        $pdes=request('pdes');
        $pqty=request('qty');
        $cpri=request('copri');
        $spri=request('sepri');        
        $image=$request->file('image');
        $name=$image->getClientOriginalName();
        $image->move(public_path('assets/img/gallery'),$name);
        // $this->validate($request,[
        //     'cname'=>'required',
        //     'cades'=>'required'
        // ]);

        $c=ProductModel::find($id);

        // $c->cid=$cid;
        // $c->bid=$bid;
        $c->name=$pname;
        $c->des=$pdes;
        $c->qty=$pqty;
        $c->cost=$cpri;
        $c->sell=$spri;
        $c->image=$name;

        $c->save();
        echo "<script>alert('Successfully Added Product');window.location='/Acategory';</script>";
        // echo "success";
    }


    public function deleteview($id)
    {
        $item=ProductModel::find($id);
        return view('Adelete',compact('item'));

    }

    public function destroyitem($id)
    {
        $item=ProductModel::find($id);

        $item->delete();

        return redirect('/Aview');
    }


    public function viewcat()
    {
        $c=CategoryModel::all();

        return view('Aviewcat',compact('c'));
    }

    public function editcat($id)
    {
        $item=CategoryModel::find($id);
        return view('Aeditcat',compact('item'));

    }

    public function updatecat(Request $request, $id)
    {
        $cname=request('name');
        $desc=request('desc');

        $this->validate($request,[
            'name'=>'required',
            'desc'=>'required'
        ]);

        $c = CategoryModel::find($id);

        $c->cname=$cname;
        $c->cades=$desc;

        $c->save();
        echo "<script>alert('Successfully Updated Category');window.location='/Aviewcat';</script>";
        // echo "success";

    }


    public function viewbrand()
    {
        $item=BrandModel::all();

        return view('Aviewbrand',compact('item'));
    }

    public function editbrand($id)
    {
        $item=BrandModel::find($id);
        return view('Aeditbrand',compact('item'));
    }

    public function updatebrand(Request $request, $id)
    {
        $bname=request('name');
        $desc=request('desc');

        $this->validate($request,[
            'name'=>'required',
            'desc'=>'required'
        ]);

        $c =BrandModel::find($id);

        $c->bname=$bname;
        $c->bdes=$desc;

        $c->save();
        echo "<script>alert('Successfully Updated Brand');window.location='/Aviewbrand';</script>";
        // echo "success";

    }

    public function viewcust()
    {
        $item=customer::all();

        return view('Aviewcust',compact('item'));
    }

    public function viewfeed()
    {
        $item=FeedbackModel::all();

        return view('Aviewfeedback',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('/Acategory');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $caname=request('cname');
        $desc=request('cades');

        $this->validate($request,[
            'cname'=>'required',
            'cades'=>'required'
        ]);

        $c = new CategoryModel();

        $c->cname=$caname;
        $c->cades=$desc;

        $c->save();
        echo "<script>alert('Successfully Added Category');window.location='/Acategory';</script>";
        // echo "success";
        

    }

    public function storebrand(Request $request)
    {
        
        $baname=request('bname');
        $bdesc=request('bdes');

        $this->validate($request,[
            'bname'=>'required',
            'bdes'=>'required'
        ]);

        $c = new BrandModel();

        $c->bname=$baname;
        $c->bdes=$bdesc;

        $c->save();
        echo "<script>alert('Successfully Added Brand');window.location='/Abrand';</script>";
        // echo "success";
        

    }

    public function storeproduct(Request $request)
    {
    
        $cid=request('select');
        $bid=request('brand1');
        $pname=request('prname');
        $pdes=request('pdes');
        $pqty=request('qty');
        $cpri=request('copri');
        $spri=request('sepri');        
        $image=$request->file('image');
        $name=$image->getClientOriginalName();
        $image->move(public_path('assets/img/gallery'),$name);
        // $this->validate($request,[
        //     'cname'=>'required',
        //     'cades'=>'required'
        // ]);

        $c = new ProductModel();

        $c->cid=$cid;
        $c->bid=$bid;
        $c->name=$pname;
        $c->des=$pdes;
        $c->qty=$pqty;
        $c->cost=$cpri;
        $c->sell=$spri;
        $c->image=$name;

        $c->save();
        echo "<script>alert('Successfully Added Product');window.location='/Acategory';</script>";
        // echo "success";
        

    }

    public function vieworder()
    {
        $item=OrderModel::all();

        return view('Aviewreport',compact('item'));
    }

    public function getreport()
    {
        $getdate1=request('date1');
        $getdate2=request('date2');
          
        $item=OrderModel::select('*')
        ->whereBetween('odate', [$getdate1, $getdate2])->get();
        
        return view('Aviewreport',compact('item'));
    }

    public function profile(Request $req)
    {
        $data =$req->session()->get('sname') ['id'];
        $var = ['var'=>customer::where('id','=',$data)->first()];
    
        return view ('Myprofile')->with($var);
    }

    public function editprofile($id)
    {
        $cview=customer::find($id);

        return view('editprofile',compact('cview'));
    }

    public function updateprofile(Request $request, $id)
    {
        $l = customer::find($id);
        $uname = request('name');
        $uaddress = request('address');
        $upin = request('pincode');

        

        $l->name=$uname;
        $l->address=$uaddress;
        $l->pincode=$upin;
        $l->save();

        return redirect('/Myprofile');
    }

    // public function viewproduct()
    // {
    //     $item=ProductModel::all();

    //     return view('productlist',['$shops'=>$item]);
        
    // }

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
    public function home()
    {
        return view('Ahome');
    }

    public function category()
    {
        return view('Acategory');
    }

    public function brand()
    {
        return view('Abrand');
    }
}
