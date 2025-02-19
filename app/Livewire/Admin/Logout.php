<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Auth;

class Logout extends Component
{

    public function mount($userId = null)
    {
        Auth::logout();
        session()->flash('success', 'Logout successfully');
        return redirect()->route('admin.login');
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
