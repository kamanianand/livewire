<?php

namespace App\Livewire\Frontend\Users;

use Livewire\Component;
use App\Models\User as UserModel;

class User extends Component
{
    public $users = [];

    public function mount()
    {
        $this->users = UserModel::all();
    }

    public function render()
    {
        return view('livewire.frontend.users.user');
    }
}
