<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\Newmatchold;
use App\Models\RequestHiring;
Use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendCode;
use App\Models\BlogComment;
use Mail;
use Session;
use App\Models\BlogLikes;
use App\Models\BLog;
class CustomerController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        
    }
    public function editprofile(){
        
        return view('customer/editprofile');
    }
    public function updateavatar(){
        
        return view('customer/updateavatar');
    }
    public function changeavatar(Request $request){
        
        $id = Auth::user()->id;
        $validatedData = $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:5048',
    
           ]);
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $imgname = uniqid() . $filename;
        $destinationPath = public_path('/customer-image/profile');
        $file->move($destinationPath, $imgname);
        $data = array(
           'avatar' =>$imgname
        );
        User::where('id',$id)
           ->update($data);
        return redirect('customer/profile/edit')->with('status', 'Image Has been uploaded');
    
    
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
    public function changeprofile(){
        return view('customer/changeprofile');
    }
    public function profilechange(Request $request){
        $user = Auth::user();
        $id = $user->id;
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_no' => 'required',
            'address' => 'required'
           ]);
        $data = array(
            'first_name'=> $request->input('first_name'),
            'last_name'=> $request->input('last_name'),
            'contact_no'=> $request->input('contact_no'),
            'address'=> $request->input('address'),
            'name'=>$request->input('first_name').$request->input('last_name')
        );
        User::where('id',$id)->update($data);
        
        return redirect('customer/profile/edit')->with('info','The profile is updated');
    }
    public function changepass(){
        return view('customer/changepass');
    }
    public function passwrdchange(Request $request){
        $validatedData = $request->validate([
            'oldpwd' => ['required',new Newmatchold],
            'newpwd' => 'required',
            'conf_password' =>'required'
        ]);
    $user = Auth::user();
        $id = $user->id;
        $data = array(
            'password'=> Hash::make($request->input('newpwd'))
            );
        User::where('id',$id)
      ->update($data);
      

      
      return redirect('customer/profile/edit')->with('info', "THe password is changed successfull");
    
    }
    public function installerlist(){
        $installer = User::where('type','=','installer')->get();
        return view('customer/installer/installerlist' ,['installers'=>$installer]);
    }
    public function installerdetails($id){
        $installer = User::find($id);
        return view('customer/installer/installerdetails',['installer'=>$installer]);
    }
    public function hireinstaller(Request $request){
        $validatedData = $request->validate([
            'estimated_time' => 'required',
            'amount' =>'required',
            'working_details'=>'required'
        ]);
        
       
        $requesthire = new RequestHiring;
        $requesthire->estimated_time = $request->input('estimated_time');
        $requesthire->amount = $request->input('amount');
        $requesthire->installer_id = $request->input('installer_id');
        $requesthire->working_details = $request->input('working_details');
        $requesthire->customer_id = Auth::user()->id;
        $requesthire->created_by = Auth::user()->id;
        $requesthire->save();
        return redirect('customer/installer')->with('info', "The request is created Soon You will recieve mail");
    }
    public function orders(){
        $id = Auth::id();
        $orders = Order::where('customer_id','=',$id)->orderBy('created_by', 'desc')->get();
        return view('customer/orderlist' ,['orders'=>$orders]);

    }    
    public function orderdetails($id)
    {   
        abort_if(!$order_details = Order::find($id),403);
      
        return view('customer/order_dtails',['order' =>$order_details]);
      
    }
    public function requests(){
        $customer_id = Auth::id();
        $requests = RequestHiring::where('customer_id','=',$customer_id)->get();
        return view('customer/requests',['requests'=>$requests]);
    }
    public function requestsdetails($id){
        $request = RequestHiring::find($id);
        return view('customer/requestdetails',['requesthire'=>$request]);
    }
    public function changeaccount(){
        return view('customer/changeaccount');
    }

    public function changeemail(Request $request){
        $request->validate([
            'email'=>'required|email'
        ]);
        $email = $request->input('email');
        global $details;
        $details = rand(100000,999999);
        $request->session()->put('code', $details);
        $request->session()->put('email', $email);
        //     Mail::to($email)->send(new SendCode($details));
       
        return redirect('customer/verify');
    }
    public function verify(){
       
        return view('customer/verify');
    }
    public function checkcode(Request $request){
        $validatedData = $request->validate([
            'newcode' => 'required'
        ]);
        $code =  Session::get('code');
        $email =  Session::get('email');
        
        $newcode = $request->input('newcode');
        if($code == $newcode){
            $id = Auth::user()->id;
            $data = array(
                'email'=>$email
            );
            User::where('id',$id)->update($data);
            return redirect('customer/profile/edit')->with('info','Your Account Email has been changed');
        }
        else{
            return redirect('customer/verify')->with('status','The code is not correct');
        }
    }
    public function blogpost(){
        $blogs = Blog::where('publish','public')->get();
        return view('customer/blogpost',['blogs'=>$blogs]);
    }
    public function blogdetails($id)
    {
        $blogs = Blog::where('slug','=',$id)->get();
        foreach ($blogs as  $blog) {
            # code...
        }
        return view('customer/blogdetails',['blog'=>$blog]);
    }
    public function checklike(Request $request)
    {   
        $data =array();
        $user_id = $request->input('user_id');
        $blog = $request->input('blog');
        $type = $request->input('type');
        if ($type=="like") {
            $bloglike = BlogLikes::where('user_id','=',$user_id)->where('blog_id','=',$blog)->get();
            if (count($bloglike)>0) {
                foreach($bloglike as $blogs){}
               if ($blogs->liketype=="dislike" || $blogs->liketype==null) {
                   $likearray = array(
                       'liketype'=>'like'
                   );
                   BlogLikes::where('id',$blogs->id)->update($likearray);
               }
               else {
                $likarray = array(
                    'liketype'=>null
                );
                BlogLikes::where('id',$blogs->id)->update($likarray);
               }
            }
            else{
                $newlike = new BlogLikes;
                $newlike->blog_id = $blog;
                $newlike->user_id = $user_id;
                $newlike->liketype = "like";
                $newlike->save();
            }
        }
        else{
            $bloglike = BlogLikes::where('user_id','=',$user_id)->where('blog_id','=',$blog)->get();
            if (count($bloglike)>0) {
                foreach($bloglike as $blogs){}
               if ($blogs->liketype=="like" || $blogs->liketype==null) {
                   $likearray = array(
                       'liketype'=>'dislike'
                   );
                   BlogLikes::where('id',$blogs->id)->update($likearray);
               }
               else{
                $likearray = array(
                    'liketype'=>null
                );
                BlogLikes::where('id',$blogs->id)->update($likearray);
               }
            }
            else{
                $newlike = new BlogLikes;
                $newlike->blog_id = $blog;
                $newlike->user_id = $user_id;
                $newlike->liketype = "dislike";
                $newlike->save();
            }
        }
        $countlike = $countdislike = 0;
        $blogsresult =Bloglikes::where('blog_id','=',$blog)->get();
        foreach ($blogsresult as $key => $value) {
            if ($value->liketype=="like") {
                $countlike++;
            }
            if ($value->liketype=="dislike") {
                $countdislike++;
            }
        }
        array_push($data,$countlike);
        array_push($data,$countdislike);
        $checks = BlogLikes::where('user_id','=',$user_id)->where('blog_id','=',$blog)->get();
        if (count($checks)>0) {
            foreach($checks as $check){}
           if ($check->liketype=="like" ) {
            array_push($data,'like'); 
           }
           if ($check->liketype=="dislike" ) {
            array_push($data,'dislike'); 
           }
           if ($check->liketype==null) {
            array_push($data,null); 
           }
        }
        else{
            $checks = BlogLikes::where('user_id','=',$newlike->id)->where('blog_id','=',$blog)->get();
            if (count($check)>0) {
                foreach($checks as $check){}
               if ($check->liketype=="like" ) {
                array_push($data,'like'); 
               }
               if ($check->liketype=="dislike" ) {
                array_push($data,'dislike'); 
               }
               if ($check->liketype==null) {
                array_push($data,null); 
               }
            }
        }
        echo json_encode($data); 
    }
    public function comment(Request $request)
    {
        
        $newcomment = new BlogComment;
        $newcomment->blog_id = $request->input('blog_id');
        $newcomment->user_id = Auth::id();
        $newcomment->comment = $request->input('comment');
        $newcomment->status = 'unapprove';
        $newcomment->save();
        return redirect('customer/blog/posts')->with('info','Comment post successfully');
    }

}
