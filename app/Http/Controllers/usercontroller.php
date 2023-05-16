<?php

namespace App\Http\Controllers;
use App\Models\userdetails;
use App\Models\product;
use App\Models\contact;
use App\Models\about;
use App\Models\cart;
use App\Models\order;
use App\Models\gallery;
use App\Models\payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
   public function userindex(){
    $data['result']=product::get();
    return view('userindex',$data);
   }
   
   public function managerreg(){
      return view('managerreg');
     }
     public function userreg(){
      return view('userreg');
     }
     public function userlogin(){
      return view('userlogin');
     }
     public function userregaction(request $req){
      $name=$req->input('name');
      $password=$req->input('password');
      $email=$req->input('email');
      $phone=$req->input('phone');
      $place=$req->input('place');
      $gender=$req->input('gender');
      $data=[
          'name'=>$name,
          'password'=>$password,
          'email'=>$email,
          'phone'=>$phone,
          'place'=>$place,
          'gender'=>$gender
      ];
      userdetails::insert($data);
      return redirect('/userlogin');
          }
  public function userloginaction(Request $req){
            $email=$req->input('email');
            $pwd=$req->input('password');
            
            $data=userdetails::where('email',$email)->where('password',$pwd)->first();
            
            if(isset($data))
            {
              
                $req->session()->put(array('sessid'=>$data->id));
               
                    return redirect('/userpage');
            }
            else
            {
                return redirect('/userlogin')->with('error','Invalid Emal or password');
            }
         }


         public function userpage(){
            $data['result']=product::get();
            return view('user.userpage',$data);
           }
           public function tgallery(){
            $data['result']=gallery::get();
            return view('tgallery',$data);
           }
           public function query(){
          
            return view('user.query');
           }
           public function cart(){
            $id=session('sessid');
            $data['result'] = DB::table('carts')
            ->join('userdetails', 'userdetails.id', '=', 'carts.userid')
            ->join('products', 'products.id', '=', 'carts.productid')
            ->select('userdetails.name','products.productname','products.image','products.brand','products.price','carts.id','carts.total','carts.quantity')
            ->where('carts.status','added to cart')
            ->where('userdetails.id',$id)
            ->get();

            return view('user.cart',$data);
           }

           public function profile(){
            $id=session('sessid');
            $data['result']=userdetails::where('id',$id)->get();
            return view('user.profile',$data);
           }
           public function editprofile(request $req,$id){
            $name=$req->input('name');
            $password=$req->input('password');
            $email=$req->input('email');
            $phone=$req->input('phone');
      
            $data=[
                'name'=>$name,
                'password'=>$password,
                'email'=>$email,
                'phone'=>$phone,
             
            ];
            userdetails::where('id',$id)->update($data);
            return redirect('/profile');
                }
                public function logout(Request $req)
                {
                    $req->session()->forget('sessid');
                    return redirect('/userlogin');
                }

                public function about(){
                    $data['result']=about::get();
                    return view('about',$data);
                }
                public function contact(){
                   
                    return view('contact');
                }
                public function addcontact(request $req){
                   $name=$req->input('name');
                   $email=$req->input('email');
                   $sub=$req->input('sub');
                   $msg=$req->input('message');
                   $data=[
                    'name'=>$name,
                    'email'=>$email,
                    'subject'=>$sub,
                    'message'=>$msg

                   ];
contact::insert($data);
                    return redirect('contact');
                }

        public function singleproduct($id){
            $data['result']=product::where('id',$id)->get();
            return view('user.singleproduct',$data);
        }
       
        public function addtocart(request $req,$id){
            $uid=session('sessid');
            $total=$req->input('total');
            $qt=$req->input('qt');
            $data=[
             'productid'=>$id,
             'userid'=>$uid,
             'total'=>$total,
             'quantity'=>$qt

            ];
cart::insert($data);
             return redirect('cart');
            }

 public function deletecart($id){
cart::where('id',$id)->delete();
return redirect('cart');

         }    
         

         public function buynow(){
            $id=session('sessid');
            $data['result'] = DB::table('carts')
            ->join('userdetails', 'userdetails.id', '=', 'carts.userid')
            ->join('products', 'products.id', '=', 'carts.productid')
            ->select('userdetails.name','products.productname','products.image','products.brand','products.price','carts.id','carts.total','carts.quantity')
            ->where('carts.status','added to cart')
            ->where('userdetails.id',$id)
            ->get();
            $data['result3']= DB::table('userdetails')
            ->select('credit')
            ->where('id',$id)
            ->get();

         $data['result2'] =cart::select(DB::raw("SUM(total) as total"))->where('userid',$id)->where('carts.status','added to cart')->get();

return view('user.buynow',$data);
           }
    
           public function prize(request $req){
            $id=$req->input('id');
            $qt=$req->input('qnty');
            $total=$req->input('total');
              $data=[
                'quantity'=>$qt,
                'total'=>$total,
      
            ];
           cart::where('id',$id)->update($data);
            //return redirect('/buynow');
               
        }
        public function order(request $req){
            $uid=session('sessid');
            $total=$req->input('sum');

              $data=[
                'status'=>'order',
     
            ];
           cart::where('userid',$uid)->update($data);
           $data=[
            'userid'=>$uid,
            
            'gtotal'=>$total,
            'payment'=>'card pay',
 
        ];
    order::insert($data);
    return redirect('/vieworder')    ;      
    }
public function vieworder(){
    $id=session('sessid');
    $data['result'] = DB::table('carts')
    ->join('userdetails', 'userdetails.id', '=', 'carts.userid')
    ->join('products', 'products.id', '=', 'carts.productid')
    ->select('userdetails.name','products.productname','products.image','products.brand','products.price','carts.id','carts.total','carts.quantity')
    ->where('carts.status','order')
    ->where('userdetails.id',$id)
    ->get();
    $data['result3']= DB::table('userdetails')
    ->select('credit')
    ->where('id',$id)
    ->get();

 $data['result2'] =cart::select(DB::raw("SUM(total) as total"))->where('userid',$id)->where('carts.status','order')->get();
$dat['res']=order::where('userid',$id)->get();
    return view('user.uservieworder',$data,$dat);
}
    public function bookcard(Request $req,$total){
        $uid=session('sessid');
                   $data=[
                'status'=>'order',
     
            ];
           cart::where('userid',$uid)->update($data);
           $data=[
            'userid'=>$uid,
            
            'gtotal'=>$total,
            'payment'=>'card pay',
 
        ];
    order::insert($data);
   
        $uid=session('sessid');
       $dat=$total;
$data['result'] =cart::where('userid',$uid)->get();
$data['result'] =order::where('userid',$uid)
->where('gtotal',$total)
->get();
        return view('user.bookcard',$data);
  
  
    }
    public function paymentaction(request $req,$gtotal){
        $uid=session('sessid');
        $name=$req->input('name');
        $cvv=$req->input('cvv');
        $cno=$req->input('cno');
        $total=$gtotal;
        $date=$req->input('date');
       
        $data=[
            'uid'=>$uid,
            'name'=>$name,
            'cardnumber'=>$cno,
            'cvv'=>$cvv,
            'amount'=>$total,
            'exdate'=>$date,
            
        ];
       $res= payment::insert($data);
       $credit=userdetails::where('id',$uid)->value('credit');
       
       if($total>=50000){
        $da=['credit' => $credit + 5000];
       }
       elseif($total>=40000){
        $da=['credit' => $credit + 4000];
       }
       elseif($total>=30000){
        $da=['credit' => $credit + 3000];
       }
       elseif($total>=20000){
        $da=['credit' => $credit + 2000];
       }
       elseif($total>=10000){
        $da=['credit' => $credit + 1000];
       }
       elseif($total>=1000){
        $da=['credit' => $credit + 100];
       }
       elseif($total<=1000){
        $da=['credit' => $credit + 0];
       }
       userdetails::where('id',$uid)->update($da);
        return redirect('user.paymentsful');
            }

         public function bookcredit(request $req,$total){
            $uid=session('sessid');
            $credit=userdetails::where('id',$uid)->value('credit');
            $da=['credit' => $credit - $total];
            userdetails::where('id',$uid)->update($da);
                  $data=[
         'status'=>'order',
     ];
    cart::where('userid',$uid)->update($data);

            cart::where('userid',$uid)->update($data);
           $data=[
            'userid'=>$uid,
            
            'gtotal'=>$total,
            'payment'=>'credit pay',
 
        ];
    order::insert($data);
    return redirect('user.paymentsful');




}
public function paymentsful(){
return view('user.paymentsful');
        }
    }



    

