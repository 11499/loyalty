<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\about;
use App\Models\gallery;
use App\Models\shop;
use App\Models\contact;
use App\Models\admindetails;
use App\Models\userdetails;
use App\Models\managerdetails;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function adminindex(){
        return view('admin.adminindex');
    }
    public function addabout(){
        return view('admin.addabout');
    }
    public function viewabout(){
        $data['result']=about::get();
        return view('admin.viewabout',$data);
    }
    public function addgallery(){
        
        return view('admin.addgallery');
    }
    public function viewgallery(){
        $data['result']=gallery::get();
        return view('admin.viewgallery',$data);
    }
    public function shop(){
        return view('admin.shop');
    }
   
    public function viewuser(){
        $data['result']=userdetails::get();
        return view('admin.adminviewuser',$data);
    }
    public function viewmanager(){
        $data['result']=managerdetails::get();
        return view('admin.viewmanager',$data);
    }
    public function aboutaction(request $req){
$title=$req->input('title');
$des=$req->input('des');
$data=[
    'title'=>$title,
    'description'=>$des
];
about::insert($data);
return redirect('/viewabout');
    }
    public function editaboutaction(request $req,$id){
        $title=$req->input('title');
        $des=$req->input('des');
        $data=[
            'title'=>$title,
            'description'=>$des
        ];
        about::where('id',$id)->update($data);
        return redirect('/viewabout');
            }
public function editabout($id){
$data['result']=about::get();
return view('admin.editabout',$data);
}
public function deleteabout($id){
    about::where('id',$id)->delete();
    return redirect('/viewabout');
}
public function galleryaction(request $req)
{
    $title=$req->input('title');    
    $image=$req->file('img');
    $filename=$image->getClientOriginalName();
    $image->move(public_path().'/gallery/',$filename);
    
    $data=[
    'title'=>$title,
   
    'image'=>$filename,
    
];
    $res=gallery::insert($data);
return redirect('/viewgallery');
}  
public function deletegallery($id){
    gallery::where('id',$id)->delete();
    return redirect('/viewgallery');
}
public function editgallery($id){
    $data['result']=gallery::where('id',$id)->get();
    return view('admin.editgallery',$data);
    }
   
   
    public function editgalleryaction(request $req,$id)
{
    $title=$req->input('title');
    $image=$req->file('img');
  
if($image=="") {
$data=[
    'title'=>$title,
   ];

 }       
else{

$filename=$image->getClientOriginalName();
$image->move(public_path().'/gallery/',$filename);
$data=[
    'title'=>$title,
    'image'=>$filename,
];

}
gallery::where('id',$id)->update($data);
return redirect('viewgallery');
}
public function shopaction(request $req){
    $sname=$req->input('sname');
   
    $data=[
        'shopname'=>$sname
        
    ];
    shop::insert($data);
    return redirect('/viewshops');
        }
      public function viewshops(){
$data['result']=shop::get();
return view('admin.viewshops',$data);
      }
 public function viewshopdetails(){
            
    $data['result'] = DB::table('managerdetails')
    ->join('shops', 'shops.id', '=', 'managerdetails.shopid')

    ->select('managerdetails.name','shops.shopname','shops.id')
    ->get();
            
            return view('admin.viewshopdetails',$data);
        }
              
 public function deleteshop($id){
            
    shop::where('id',$id)->delete();
    return view('admin.viewshops');
}
public function adminlogin(){
    return view('adminlogin');
}

public function adminloginaction(Request $req){
    $email=$req->input('email');
    $pwd=$req->input('password');
    
    $data=admindetails::where('email',$email)->where('password',$pwd)->first();
    
    if(isset($data))
    {
      
        $req->session()->put(array('sessid'=>$data->id));
       
            return redirect('/adminindex');
    }
    else
    {
        return redirect('/adminlogin')->with('error','Invalid Emal or password');
    }
 }

 public function assignshop($id){
   
    $data['result']=managerdetails::where('id',$id)->get();
    $dat['result2']=shop::get();
    return view('admin.assignshop',$data,$dat);
 
   
 }
public function shopassignaction(request $req,$id){
    $shopid=$req->input('shop');

    $data=[
        'shopid'=>$shopid
    ];

    managerdetails::where('id',$id)->update($data);
    return redirect('viewshopdetails');
}

public function viewmessage(){
    $data['result']=contact::get();
    return view('admin.viewmessage',$data);
}
public function adminvieworder(){
    $data['result'] = DB::table('carts')
        ->join('userdetails', 'userdetails.id', '=', 'carts.userid')
        ->join('products', 'products.id', '=', 'carts.productid')
        ->select('userdetails.name','userdetails.phone','products.productname','carts.total','carts.quantity','carts.status')
        ->where('carts.status','order')
        ->get();
//$data['result']=cart::where('status','order')->get();



        return view('admin.adminvieworder',$data);
        
}
}