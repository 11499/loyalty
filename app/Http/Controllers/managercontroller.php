<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\managerdetails;
use App\Models\userdetails;
use App\Models\cart;
use App\Models\shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class managercontroller extends Controller
{
    public function managerindex(){
        return view('manager.managerindex');
       }
       public function sampleindex(){
        return view('manager.sampleindex');
       }
       public function addproduct(){
        return view('manager.addproduct');
       }
       public function viewproduct(){
        $id=session('sessid');
        $sid = DB::table('managerdetails')->select('shopid')->where('id',$id)->value('shopid');

        $data['result']=product::where('shopid',$sid)->get();
        return view('manager.viewproduct',$data);
             }
    public function viewuser(){
        $data['result']=userdetails::get();
        return view('manager.viewuser',$data);
                     }
     public function vieworder(){
        $id=session('sessid');
        $sid = DB::table('managerdetails')->select('shopid')->where('id',$id)->value('shopid');

        $data['result'] = DB::table('carts')
        ->join('userdetails', 'userdetails.id', '=', 'carts.userid')
        ->join('products', 'products.id', '=', 'carts.productid')
        ->select('userdetails.name','userdetails.phone','products.productname','carts.total','carts.quantity','carts.status')
        ->where('products.shopid',$sid)
        ->where('carts.status','order')
        ->get();
//$data['result']=cart::where('status','order')->get();



        return view('manager.vieworder',$data);
                             }
  public function productaction(request $req)
{
    $id=session('sessid');
    $sid = DB::table('managerdetails')->select('shopid')->where('id',$id)->value('shopid');

    $pname=$req->input('pname'); 
    $price=$req->input('price');   
    $brand=$req->input('brand'); 
    $des=$req->input('des');  
    $image=$req->file('img');
    $filename=$image->getClientOriginalName();
    $image->move(public_path().'/gallery/',$filename);
    
    $data=[
    'productname'=>$pname,
    'price'=>$price,
    'brand'=>$brand,
    'description'=>$des,
       'image'=>$filename,
       'shopid'=>$sid,
    
];
    $res=product::insert($data);
return redirect('/viewproduct');
}
public function deleteproduct($id){
    product::where('id',$id)->delete();
    return redirect('viewproduct');
}  
public function editproduct($id){

  $data['result']= product::where('id',$id)->get();
    return view('manager.editproduct',$data);
}  
public function editproductaction(request $req,$id)
{
    $pname=$req->input('pname'); 
    $price=$req->input('price');   
    $brand=$req->input('brand'); 
    $des=$req->input('des');
    $image=$req->file('img');
  
if($image=="") {
$data=[
    'productname'=>$pname,
    'price'=>$price,
    'brand'=>$brand,
    'description'=>$des,
     
   ];

 }       
else{

$filename=$image->getClientOriginalName();
$image->move(public_path().'/gallery/',$filename);
$data=[
    'productname'=>$pname,
    'price'=>$price,
    'brand'=>$brand,
    'description'=>$des,
       'image'=>$filename,
];

}
product::where('id',$id)->update($data);
return redirect('viewproduct');
}
public function managerregaction(request $req){
    $name=$req->input('name');
    $password=$req->input('password');
    $email=$req->input('email');
    $phone=$req->input('phone');
    $place=$req->input('place');
    $gender=$req->input('gender');
    $qlf=$req->input('qlf');
    $age=$req->input('age');
    $data=[
        'name'=>$name,
        'password'=>$password,
        'email'=>$email,
        'phone'=>$phone,
        'place'=>$place,
        'gender'=>$gender,
        'age'=>$age,
        'qualification'=>$qlf
    ];
    managerdetails::insert($data);
    return redirect('/login');
        }
public function managerlogin(){
    return view('managerlogin');
}
     
public function managerloginaction(Request $req){
            $email=$req->input('email');
            $pwd=$req->input('password');
            
            $data=managerdetails::where('email',$email)->where('password',$pwd)->first();
            
            if(isset($data))
            {
              
                $req->session()->put(array('sessid'=>$data->id));
               
                    return redirect('/managerindex');
            }
            else
            {
                return redirect('/managerlogin')->with('error','Invalid Emal or password');
            }
         }
public function viewshop(){
            $id=session('sessid');
            $data['result'] = DB::table('managerdetails')
            ->join('shops', 'shops.id', '=', 'managerdetails.shopid')
        
            ->select('managerdetails.name','shops.shopname')
            ->where('managerdetails.id',$id)
            ->get();
          return view('manager.viewshop',$data);
        }
        public function mprofile(){
            $id=session('sessid');
            $data['result']=managerdetails::where('id',$id)->get();
            return view('manager.mprofile',$data);
           }
           public function meditprofile(request $req,$id){
            $name=$req->input('name');
            $password=$req->input('password');
            $email=$req->input('email');
            $phone=$req->input('phone');
              
            $qlf=$req->input('qlf');
            $age=$req->input('age');
            $data=[
                'name'=>$name,
                'password'=>$password,
                'email'=>$email,
                'phone'=>$phone,
                'age'=>$age,
                'qualification'=>$qlf
            ];
            managerdetails::where('id',$id)->update($data);
            return redirect('/mprofile');
                }
                public function logout(Request $req)
                {
                    $req->session()->forget('sessid');
                    return redirect('/managerlogin');
                }
}
