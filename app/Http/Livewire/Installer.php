<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use DB;
class Installer extends Component
{
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
            ['installers' => User::inRandomOrder()->limit(4)->get()]);
        }
        else{
            if($this->order){
                return view('livewire.installer',
                ['installers' => $installers  = DB::table('users')
                ->join('install_infos', 'install_infos.installer_id', '=', 'users.id')
                ->select('users.*')
                ->where('users.name','like', '%'.$this->name.'%')->where('type','=','installer')
                ->orderBy('install_infos.recharge', $this->order)->get()]);
            }
            else{
                return view('livewire.installer',
                ['installers' => $installers  = DB::table('users')
                ->join('install_infos', 'install_infos.installer_id', '=', 'users.id')
                ->select('users.*')
                ->where('users.name','like', '%'.$this->name.'%')->where('type','=','installer')
                ->get()]);
            }
        }
    }
}
