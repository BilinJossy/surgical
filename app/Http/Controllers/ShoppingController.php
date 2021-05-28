<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\customer;
use App\Models\login;
use App\Models\OrderModel;
use App\Models\FeedbackModel;
// use Illuminate\support\Facades\DB;
use Session;
use Carbon\Carbon;
use DB;

class ShoppingController extends Controller
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

    public function viewproduct()
    {
        $item=ProductModel::all();
        return view('productlist',compact('item'));
        
    }

    public function viewproduct1()
    {
        $item=ProductModel::all();
        return view('Cproductlist',compact('item'));
        
    }


    public function prdetails($id)
    {
        $det = ProductModel::find($id);
        return view ('singleproduct',compact('det'));
    }

    public function prdetails1($id)
    {
        $det = ProductModel::find($id);
        return view ('Csingleproduct',compact('det'));
    }


    public function addcart(Request $req)
    {
      
       if($req->session()->has('sname'))
       {   
            $qty=$req->qty;
        // echo "$qty";
           $c = new CartModel;
          
           $c->pid=$req->item;
           $c->uid=$req->session()->get('sname') ['id'];
           $c->qty=$qty;
           $data=ProductModel::select('sell')->where ('id','=',$req->item)->first();
    
           $price=$data->sell*$qty;

           $c->qtyprice=$price;

        //    echo "$c";
           $c->save();
           echo "<script>alert('product added Successfully to the cart');window.location='/productlist';</script>";
       }
       else
       {
           return redirect('/Login');
       }
    }





    public function cartlist(Request $req)
    {
        $userid=$req->session()->get('sname') ['id'];
        // session::get('sname')['id'];
        // $item2=DB::table('cart_models')
        // ->join('product_models','cart_models.pid','=','product_models.id')
        // ->where('cart_models.uid',$userid)
        // ->select('product_models.*','cart_models.id as cart_id')
        // ->get();

        // $total=$products=DB::table('cart_models')
        // ->join('product_models','cart_models.pid','=','product_models.id')
        // ->where('cart_models.uid',$userid)
        // ->sum('cart_models.qtyprice');

         $item = CartModel::with('cart')
        ->join('product_models','cart_models.pid','=','product_models.id')
        ->where('cart_models.uid',$userid)
         ->select('cart_models.*')
         ->get();
        // echo $total;

        // return view('cart',['item'=>$item,'total'=>$total]);
        return view('cart',['item'=>$item]);
    }
    static public function totalprice()
    {
        $userid= session::get('sname')['id'];
        $customerId=$userid->id;
        $cart=DB::table('cart_models')
        ->where('uid','=',$customerId)
        ->get();
        $total=0;
        foreach($cart as $cart)
        {
            $products=DB::table('product_models')
            ->where('id','=',$cart->pid)
            ->get();
            foreach($products as $product)
            {
                $total=$total+($cart->qty)*($product->sell);
            }
        }

        return $total;
        

    }

    // static public function totalprice(){
    //     $custid= session::get('sname')['id'];
    //     $customerId=$custid->id;
    //     $carts=DB::table('carts')
    //     ->where('userid','=', $customerId)->get();

    //     $total=0;
    //     foreach($carts as $cart)
    //     {
    //         $products=DB::table('items')
    //         ->where('id','=',$cart->productid)->get();
    //         foreach($products as $product)
    //         {
    //             $total=$total+($cart->qtyprice);
    //         }
    //     }
    // return $total;
    // }

    public function destroy($id)
    {
        CartModel::destroy($id);
    echo "<script>alert('Item removed Successfully from the cart');window.location='/cart';</script>";
    }


    public function order(Request $req)
    {
        $userId=$req->session()->get('sname') ['id'];
        $carts=DB::table('cart_models')
        ->where('uid','=',$userId)->get();
        
        $cdate = Carbon::now();
        $odate=$cdate->toDateString();
        foreach($carts as $cart)
        {
            $products=DB::table('product_models')
            ->where('id','=',$cart->pid)->get();
            foreach($products as $product)
            {
                $order=new OrderModel();
                $order->cid=$userId;
                $order->proid=$cart->pid;
                $order->oqty=$cart->qty;
                $order->oprice=$product->sell;
                $order->ototal=($cart->qty)*($product->sell);
                $order->odate=$cdate;
                $order->save(); 
                
                DB::table('product_models')
                ->where('id', $cart->pid)
                ->update(['qty' => ($product->qty-$cart->qty)]);

                DB::table('cart_models')->delete($cart->id);
            }
        }
        return redirect('/productlist');
    }


    public function payment(Request $req)
    {
    $userid=$req->session()->get('sname') ['id'];
    $total=$products=DB::table('cart_models')
    ->join('product_models','cart_models.pid','=','product_models.id')
        ->where('cart_models.uid',$userid)
    ->sum('cart_models.qtyprice');
    // echo "$total";
    
    return view('payment',['total'=>$total]);
    
    }

    public function vieworder(Request $req)
    {
    $userid=$req->session()->get('sname') ['id'];
    $c=OrderModel::where('cid','=',$userid)-> with('customer','order')->get();
    return view('/Myorders',compact('c'));
    }

    public function Cfeedback($id)
    {
        $item=OrderModel::find($id);
        return view('feedback',compact('item'));
    }

    public function SCfeedback($id , Request $request)
    {
        $getcom=request('comment');

        $f=new FeedbackModel();

        $f->cname=session('sname')->name;
        $f->orid=$id;
        $f->comment=$getcom;

        $f->save();
        return redirect('/Myorders');
    }

    public function searchproduct(Request $request)
    {
    $getitem=request('item');
    $itemid=ProductModel::where('name','=',$getitem)->first();
    if(!$itemid)
    {
        echo "<script>alert('Item not found');window.location='/productlist';</script>";  
    }
    else
    {
        $item=ProductModel::query()
    ->where('name', 'LIKE' , "%{$itemid->name}%")
    ->get();
    }
    
    return view('productlist',compact('item'));
    }
    
    public function searchproduct1(Request $request)
    {
    $getitem=request('item');
    $itemid=ProductModel::where('name','=',$getitem)->first();
    if(!$itemid)
    {
        echo "<script>alert('Item not found');window.location='/productlist1';</script>";  
    }
    else
    {
        $item=ProductModel::query()
    ->where('name', 'LIKE' , "%{$itemid->name}%")
    ->get();
    }
    
    return view('Cproductlist',compact('item'));
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
    
}
