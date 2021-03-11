<?php

namespace App\Http\Controllers;
use App\Models\InstallerCompany;
use App\Models\User;
use App\Models\InstallInfo;
use App\Models\Countries;
use App\Models\States;
use App\Models\Cities;
use App\Models\Testmonial;
use Session;
use App\Rules\NewMatchOldUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class InstallerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $installers =  User::where('type','=','installer')->get();
        return view('admin/installer/index',['installers'=>$installers]);
    }
    public function add()
    {
        $countries = Countries::all();
        return view('admin/installer/addinstaller',['countries'=>$countries]);
    }
    public function create(Request $request){
        
        $validatedData = $request->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required',
            'password' => 'required',
            'contact_no' => 'required',
            
           
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        $installer = new User;
        
        $installer->first_name = $request->input('first_name');
        $installer->last_name = $request->input('last_name');
        $installer->email = $request->input('email');
        $installer->password = Hash::make($request->input('password'));
        $installer->contact_no = $request->input('contact_no');
        $installer->address = $request->input('address');
        $installer->postcode = $request->input('postcode');
        $installer->type = 'installer';
        
        $installer->name = $request->input('first_name')."".$request->input('last_name');
        if ($request->input('company_info')==1) {
            $installer->company_info = "1";
        }
        else{
            $installer->company_info = "0";
        }
            if($request->file('image')){
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                
                $destinationPath = public_path('/installerprofile');
                $imgname = uniqid() . $filename;
                $file->move($destinationPath, $imgname);
                $installer->avatar= $imgname;
            }
            $installer->save();
            $installerinfo = new InstallInfo;
            $installerinfo->installer_id =  $installer->id;
            $installerinfo->experience=$request->input('experience');
            $installerinfo->recharge = $request->input('recharge');
            $installerinfo->skills = $request->input('skills');
            $types = $request->input('installation_type');
            $installerinfo->installation_type =  implode(",",$types);
            $installerinfo->save();
            if ($request->input('company_info')==1) {
                $counntry_id = $request->input('country_id');
                $shipstatess =States::where('name','=',$request->input('state_id'))->where('country_id','=',$counntry_id)->first();
            if (!empty($shipstatess)) {
                if ($shipstatess->id) {
                    $shipstate_id = $shipstatess->id;
                }
            }
            else{
                    $shipstate = new States;
                    $shipstate->name = $request->input('state_id');
                    $shipstate->country_id = $counntry_id;
                    $shipstate->save();
                    $shipstate_id = $shipstate->id;
            }
            $cities =Cities::where('name','=',$request->input('city_id'))->where('state_id','=',$shipstate_id)->first();
          if (!empty($cities)) {
                if ($cities->id) {
                    $city_id = $cities->id;
                }
            }
            else{
        $city = new Cities;
        $city->name = $request->input('city_id');
        $city->state_id = $shipstate_id;
        $city->save();
        $city_id = $city->id;
        }
       
            $installer_company = new InstallerCompany;
            $installer_company->company_name = $request->input('company_name');
            $installer_company->installer_id = $installer->id;
            $installer_company->country_id = $counntry_id;
            $installer_company->state_id = $shipstate_id ;
            $installer_company->city_id = $city_id;
            $installer_company->postcode = $request->input('installerpostcode');
            $installer_company->email  =$request->input('company_email');
            $installer_company->contact_no = $request->input('company_contactno');
            $installer_company->address = $request->input('address');
            $installer_company->company_description = $request->input('companydesc');
            if($request->file('cover')){
                $file = $request->file('cover');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $destinationPath = public_path('/companies');
                $imgname = uniqid() . $filename;
                $file->move($destinationPath, $imgname);
                $installer_company->cover= $imgname;
            }
            if($request->file('logo')){
                $file1 = $request->file('logo');
                $filename1 = $file1->getClientOriginalName();
                $extension1 = $file1->getClientOriginalExtension();
                $destinationPath1 = public_path('/companies');
                $imgname1 = uniqid() . $filename1;
                $file1->move($destinationPath1, $imgname1);
                $installer_company->logo= $imgname1;
            }
            
            $installer_company->save();
            }

            return redirect('admin/installer')->with('info','The Installer is created');
    }
    public function edit($id)
    {
        abort_if(!$user = User::find($id),403);
        $countries = Countries::all();
        
        if ($user->company_info=="1") {
            $company_data = $user->companies;
            $state = States::find($company_data->state_id);
            $city = Cities::find($company_data->city_id);
        
        
        return view('admin/installer/edit',['countries'=>$countries,'user'=>$user,'city'=>$city ,'state'=>$state]);
        }
        
        return view('admin/installer/edit',['user'=>$user,'countries'=>$countries]);

    }
    public function update($id, Request $request){
      
        if ($request->input('company_info')==1) {
            $company_info = "1";
        }
        else{
            $company_info = "0";
        }
        $user_array =array(
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'postcode' => $request->input('installerpostcode'),
            'contact_no' => $request->input('contact_no'),
            'address' => $request->input('address'),
            'type' => 'installer',
            'name' => $request->input('first_name')."".$request->input('last_name'),
            'company_info' =>$company_info
        );
        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            
            $destinationPath = public_path('/installerprofile');
            $imgname = uniqid() . $filename;
            $file->move($destinationPath, $imgname);
            
            $userimage =array(
                
                'avatar' =>$imgname
            );
            User::where('id',$id)->update($userimage);
        }
            User::where('id',$id)->update($user_array);
            
            $installerinfoid = $request->input('installinfoid');
            $types = $request->input('installation_type');
            $installation_type =  implode(",",$types);
            $installerinfo = array(
            'experience'=>$request->input('experience'),
            'recharge' => $request->input('recharge'),
            'skills' => $request->input('skills'),
            'installation_type'=>$installation_type
            );
            InstallInfo::where('id',$installerinfoid)->update($installerinfo);
            if ($request->input('company_info')==1) {
                $counntry_id = $request->input('country_id');
                $shipstatess =States::where('name','=',$request->input('state_id'))->where('country_id','=',$counntry_id)->first();
            if (!empty($shipstatess)) {
                if ($shipstatess->id) {
                    $shipstate_id = $shipstatess->id;
                }
            }
            else{
                    $shipstate = new States;
                    $shipstate->name = $request->input('state_id');
                    $shipstate->country_id = $counntry_id;
                    $shipstate->save();
                    $shipstate_id = $shipstate->id;
            }
            $cities =Cities::where('name','=',$request->input('city_id'))->where('state_id','=',$shipstate_id)->first();
          if (!empty($cities)) {
                if ($cities->id) {
                    $city_id = $cities->id;
                }
            }
            else{
        $city = new Cities;
        $city->name = $request->input('city_id');
        $city->state_id = $shipstate_id;
        $city->save();
        $city_id = $city->id;
        }
            $company_id = $request->input('company_id');
            $company_data = array(
                'company_name' => $request->input('company_name'),
                
                'country_id' => $counntry_id,
                'state_id' => $shipstate_id ,
                'city_id' => $city_id,
                'postcode' => $request->input('postcode'),
                'email'  =>$request->input('company_email'),
                'contact_no' => $request->input('company_contactno'),
                'address' => $request->input('address'),
                'company_description' => $request->input('companydesc')
            );
            InstallerCompany::where('id',$company_id)->update($company_data);
             
            if($request->file('cover')){
                $file = $request->file('cover');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $destinationPath = public_path('/companies');
                $imgname = uniqid() . $filename;
                $file->move($destinationPath, $imgname);
                $installer_company->cover= $imgname;
                $company_cover = array(
                    'cover'=> $imgname
                );
                InstallerCompany::where('id',$company_id)->update($company_cover);
            }
            if($request->file('logo')){
                $file1 = $request->file('logo');
                $filename1 = $file1->getClientOriginalName();
                $extension1 = $file1->getClientOriginalExtension();
                $destinationPath1 = public_path('/companies');
                $imgname1 = uniqid() . $filename1;
                $file1->move($destinationPath1, $imgname1);
            
                $company_logo = array(
                    'logo'=> $imgname1
                );
                InstallerCompany::where('id',$company_id)->update($company_logo);
            }
    
            
           
        }
        return redirect('admin/installer')->with('info','The Installer is updated');
        
    }
    public function details($id){
        abort_if(!$user = User::find($id), 403);
        $countries = Countries::all();
        
        if ($user->company_info=="1") {
            $company_data = $user->companies;
            $state = States::find($company_data->state_id);
            $city = Cities::find($company_data->city_id);
        
            return view('admin/installer/details',['countries'=>$countries,'user'=>$user,'city'=>$city ,'state'=>$state]);
        }
        
        return view('admin/installer/details',['user'=>$user,'countries'=>$countries]);

    }
    public function delete($id)
    {
        
        User::where('id',$id)->delete();
        return redirect('admin/installer')->with('info','The Installer is deleted');
    }
    public function updloadprofile(Request $request,$id){
        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            
            $destinationPath = public_path('/installerprofile');
            $imgname = uniqid() . $filename;
            $file->move($destinationPath, $imgname);
            $userimage =array(
                'avatar' =>$imgname
            );
            User::where('id',$id)->update($userimage);
            return redirect('admin/installerdetails/'.$id)->with('info','The profile is updated');
        }

    }
    public function update_instllerinfo($id, Request $request){
        $user_array =array(
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'contact_no' => $request->input('contact_no'),
            'address' => $request->input('address'),
            'name' => $request->input('first_name')."".$request->input('last_name'),
            
        );
        User::where('id',$id)->update($user_array);
        $installinfoid = $request->input('installinfoid');
            if ($request->input('installation_type')) {
                $types = $request->input('installation_type');
            $installation_type =  implode(",",$types);
            }
            $installerinfo = array(
            'experience'=>$request->input('experience'),
            'recharge' => $request->input('recharge'),
            
            'installation_type'=>$installation_type
            );
            InstallInfo::where('id',$installinfoid)->update($installerinfo);   
            return redirect('admin/installerdetails/'.$id)->with('info','The profile is updated');
    }
    public function update_company_logo($id ,Request $request)
    {
        $user_id = $request->input('user_id');
        $validatedData = $request->validate([
            'logo' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        if($request->file('logo')){
            $file1 = $request->file('logo');
            $filename1 = $file1->getClientOriginalName();
            $extension1 = $file1->getClientOriginalExtension();
            $destinationPath1 = public_path('/companies');
            $imgname1 = uniqid() . $filename1;
            $file1->move($destinationPath1, $imgname1);
            
        }
        $comapny_logo = array(
            'logo'=> $imgname1
        );
        InstallerCompany::where('id',$id)->update($comapny_logo);
        return redirect('admin/installerdetails/'.$user_id)->with('info','The Company Logo is updated');
    }
    public function update_company_cover($id, Request $request)
    {
        $user_id = $request->input('user_id');
        $validatedData = $request->validate([
            'cover' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        if($request->file('cover')){
            $file = $request->file('cover');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $destinationPath = public_path('/companies');
            $imgname = uniqid() . $filename;
            $file->move($destinationPath, $imgname);
            
        
        $comapny_cover = array(
            'cover'=> $imgname
        );

        InstallerCompany::where('id',$id)->update($comapny_cover);
    }
        return redirect('admin/installerdetails/'.$user_id)->with('info','The Company Logo is updated');
    }
    public function update_company_data($id,Request $request)
    {
        $user_id = $request->input('installinfoid');
        $counntry_id = $request->input('country_id');
                $shipstatess =States::where('name','=',$request->input('state_id'))->where('country_id','=',$counntry_id)->first();
            if (!empty($shipstatess)) {
                if ($shipstatess->id) {
                    $shipstate_id = $shipstatess->id;
                }
            }
            else{
                    $shipstate = new States;
                    $shipstate->name = $request->input('state_id');
                    $shipstate->country_id = $counntry_id;
                    $shipstate->save();
                    $shipstate_id = $shipstate->id;
            }
            $cities =Cities::where('name','=',$request->input('city_id'))->where('state_id','=',$shipstate_id)->first();
          if (!empty($cities)) {
                if ($cities->id) {
                    $city_id = $cities->id;
                }
            }
            else{
        $city = new Cities;
        $city->name = $request->input('city_id');
        $city->state_id = $shipstate_id;
        $city->save();
        $city_id = $city->id;
        }
        $company_data = array(
            'company_name' => $request->input('company_name'),
            
            'country_id' => $counntry_id,
            'state_id' => $shipstate_id ,
            'city_id' => $city_id,
            'postcode' => $request->input('postcode'),
            'email'  =>$request->input('company_email'),
            'contact_no' => $request->input('company_contactno'),
            'address' => $request->input('address'),
            'company_description' => $request->input('companydesc')
        );
        InstallerCompany::where('id',$id)->update($company_data); 
        return redirect('admin/installerdetails/'.$user_id)->with('info','The Company information is updated');
    }
    public function installerpassword($id){
        return view('admin/installer/changepassword' ,['id'=>$id]);
    }
    public function changepassword($id,Request $request)
    {
        $request->session()->put('id', $id);
        
        $validatedData = $request->validate([
            'oldpassword' => ['required',new NewMatchOldUser],
            'password' => 'required',
            'conf_pass' =>'required'
        ]);
        $changepasswored = array(
            'password'=>Hash::make($request->input('password'))
        );
        User::where('id',$id)->update($changepasswored);
        $request->session()->put('id',null);
        return redirect('admin/installerdetails/'.$id)->with('info','Password Change successfully');

     
    }
    public function addtestmonial($id)
    {
        return view('admin/installer/addtestmonial',['id'=>$id]);
    }
    public function storetestmonial(Request $request)
    {
        $validatedData = $request->validate([
            'rating' => 'required',
           
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        $testmonial = new Testmonial;
        $testmonial->installer_id = $request->input('installer_id');
        $testmonial->rating = $request->input('rating');
        $testmonial->description = $request->input('description');
        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('/admin-assets/testmonial');
            $file->move($destinationPath, $imgname);
            $testmonial->image= $imgname;
            }
        $testmonial->save();
        return redirect('admin/installerdetails/'.$request->input('installer_id'))->with('info','Testmonial created Successfully');
    }
    public function edittestmonial($id)
    {
        $testmonial = Testmonial::find($id);
        return view('admin/installer/edittestmonial',['testmonial'=>$testmonial]);
    }
    public function updatetestmonial($id,Request $request)
    {
        $validatedData = $request->validate([
            'rating' => 'required',
           
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        $updatetest = array( 
        'installer_id' => $request->input('installer_id'),
        'rating' => $request->input('rating'),
        'description' => $request->input('description'),
        );
        Testmonial::where('id',$id)->update($updatetest);
        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('/admin-assets/testmonial');
            $file->move($destinationPath, $imgname);
            
            $testimage = array( 
                'image'=> $imgname
                
                );
                Testmonial::where('id',$id)->update($testimage);
            }
        
        return redirect('admin/installerdetails/'.$request->input('installer_id'))->with('info','Testmonial created Successfully');
    }
    public function deletetestmonial($id)
    {
        $installer_id  =  Testmonial::find($id)->installer_id;
        Testmonial::where('id',$id)->delete();
    

        return redirect('admin/installerdetails/'.$installer_id)->with('info','Testmonial created Successfully');

    }

}
