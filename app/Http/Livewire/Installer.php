<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use DB;
class Installer extends Component
{
    use WithPagination;
    public $name;
    public $order;
    public function ascending(){
        $this->order = 'asc';
    }
    public function descending(){
        $this->order = 'desc';
    }
    public function render()
    {
        if($this->name=="" && empty($this->order)){
            return view('livewire.installer',
            ['installers' => User::where('type','=','installer')->inRandomOrder()->paginate(2)]);
        }
        else{
            if($this->order){
                return view('livewire.installer',
                ['installers' => $installers  = DB::table('users')
                ->join('install_infos', 'install_infos.installer_id', '=', 'users.id')
                ->select('users.*')
                ->where('users.name','like', '%'.$this->name.'%')->orWhere('users.postcode','like', '%'.$this->name.'%')->where('type','=','installer')->orWhere('users.postcode','like', '%'.$this->name.'%')
                ->orderBy('install_infos.recharge', $this->order)->paginate(1)]);
            }
            else{
                return view('livewire.installer',
                ['installers' => $installers  = DB::table('users')
                ->join('install_infos', 'install_infos.installer_id', '=', 'users.id')
                ->select('users.*')
                ->where('users.name','like', '%'.$this->name.'%')->orWhere('users.postcode','like', '%'.$this->name.'%')->where('type','=','installer')
                ->paginate(1)]);
            }
        }
    }
}
