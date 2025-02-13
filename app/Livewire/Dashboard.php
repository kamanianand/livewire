<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public function mount()
    {
        // if(empty(auth()->user())){ 
        //     return redirect()->route('admin.logout');
        // }
    }

    public function render()
    {   
        // dd(auth()->user());
        // echo "<pre>"; print_r(auth()->user()); die();
        $total_users = User::count();
        return view('livewire.admin.dashboard',[
            'total_users' => $total_users
        ]);
    }
}
