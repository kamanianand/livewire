<?php

namespace App\Livewire\Admin;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Auth;

#[Title('Login')]
class Login extends Component
{
    public $email, $password;

    // Validation rules
    protected $rules = [
        'email' => 'required|email|exists:admins,email|max:255',
        'password' => 'required',
    ];

    public function mount()
    {
        if(!empty(auth()->user())){ 
            return redirect()->route('admin.dashboard');
        }
    }

    // login
    public function login()
    {
        $this->validate();
        

        $user_data = Admin::where('email', $this->email)->first();
        if (!empty($user_data)){
            if (!Hash::check($this->password, $user_data->password)) {
                session()->flash('error', 'Password not match');
                return redirect()->route('admin.login');
            }
            else
            {
                if ($user_data->status == 1) {
                    // echo "<pre>"; print_r($user_data->toArray()); die();
                    Auth::login($user_data);

                    // echo "<pre>"; print_r(auth()->user()); die();
                    return redirect()->route('admin.dashboard');
                }
                else
                {
                    session()->flash('error', 'Your Account was disable. please Contact Admin for support.');
                    return redirect()->route('admin.login');
                }
            }
        }
        else
        {   
            session()->flash('error', 'Please enter valid login details.!');
            return redirect()->route('admin.login');
        }
    }

    public function render()
    {
        return view('livewire.admin.login');
    }
}
