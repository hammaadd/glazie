<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\UserNewMatchOld;
use App\Mail\SendCode;
use Mail;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $users= User::all();

        return view('admin/user/index',['users'=>$users]);
    }
    public function add(){
        return view('admin/user/create');
    }
    public function create(Request $request){
        $validateData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_no' =>'required',
            'email' => 'required',
            'password' => 'required',
            'confpass'=>'required',
            'address' =>'required',
            'image'=>'mimes:jpg,png,jpeg,gif,svg|max:5048',
            
        ]);
        
        $new_user = new User;
        $new_user->first_name =$request->input('first_name');
        $new_user->last_name = $request->input('last_name');
        $new_user->email = $request->input('email');
        $new_user->password = Hash::make($request->input('password'));
        $new_user->address = $request->input('address');
        $new_user->contact_no = $request->input('contact_no');
    
        $new_user->name = $request->input('first_name')."".$request->input('last_name');
        $file = $request->file('image');
        
        if($file){
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('/user-images/');
            $file->move($destinationPath, $imgname);
            $new_user->avatar = $imgname;
        }
        else{
            $new_user->avatar = "defaultimage.jpg";
        }
        $new_user->save();
        return redirect('admin/user')->with('info','The User  is created Successfully');


    }
    public function delete($id){
       
            User::where('id',$id)->delete();
        
        
        return redirect('admin/user')->with('info','The User is Deleted Successfully');
    
    }
    public function profile($id){
        abort_if($user = User::find($id), 403);
        return view('admin/user/profile',['user'=>$user]);
    }
    public function editprofile($id){
        abort($user = User::find($id), 403);
        return view('admin/user/editprofile',['user'=>$user]);
    }
    public function changeprofile($id,Request $request){
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
            'name'=>$request->input('first_name')."".$request->input('last_name')
        );
        User::where('id',$id)
        ->update($data);
        
        return redirect('admin/user/profile/'.$id)->with('info','The profile is updated');
        
    }
    public function editpassword($id){
        return view('admin/user/changepassword',['id'=>$id]);
    }
    public function changepassword($id,Request $request){
        
        $validatedData = $request->validate([
            'oldpwd' => ['required',new UserNewmatchold($id)],
            'newpwd' => 'required',
            'conf_password' =>'required'
        ]);
       
        $data = array(
            'password'=> Hash::make($request->input('newpwd'))
            );
        User::where('id',$id)
      ->update($data);
      

      
      return redirect('/admin/user/profile'.$id)->with('info', "THe password is changed successfull");
    
    }
    public function avatarupdate($id){
        abort_if(!$user = User::find($id), 403);
        
        return view('admin/user/avatar_update',['user'=>$user]);
    }
    public function update_user_avatar($id,Request $request){
        
        $validatedData = $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:5048',
    
           ]);
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $imgname = uniqid() . $filename;
        echo $imgname;
      
        $destinationPath = public_path('/user-images');
        $file->move($destinationPath, $imgname);
        $data = array(
           'avatar' =>$imgname
        );
        User::where('id',$id)
           ->update($data);
           
        return redirect('/admin/user/updateavat/'.$id)->with('status', 'Image Has been uploaded');
    
    
    }
    public function changeaccount(){
        return view('admin/changeaccount');
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
           //  Mail::to($email)->send(new SendCode($details));
       
        return redirect('admin/verify');
    }
    public function verify(){
       
        return view('admin/verify');
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
            Admin::where('id',$id)->update($data);
            return redirect('admin/profile/edit')->with('info','Your Account Email has been changed');
        }
        else{
            return redirect('admin/verify')->with('status','The code is not correct');
        }
    }
}
