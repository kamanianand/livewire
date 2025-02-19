<?php

namespace App\Livewire\Admin\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

#[Title('Create New User')]
class CreateUser extends Component
{
    public $name, $email, $mobile_no, $profile_picture;

    use WithFileUploads; 

    // Validation rules
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email|max:255',
        'mobile_no' => 'required|string|min:3',
        'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
    ];

    // Store the new user
    public function store()
    {
        $this->validate();

        $file_name = NULL;
        if (!empty($this->profile_picture)) {
            $file_name = Str::random(40) . '.' . $this->profile_picture->extension();
            $this->profile_picture->storeAs('users', $file_name, 'public');
        }

        try {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'mobile_no' => $this->mobile_no,
                'password' => Hash::make('123456'),
                'profile_image' => $file_name,
            ]);

            session()->flash('success', 'User created successfully!');
            // $this->resetFields();
            $this->reset();
            return redirect()->route('admin.users');
        } catch (\Exception $e) {
            session()->flash('error', 'Error creating user. Please try again.');
            return redirect()->route('admin.users.create');
        }
    }

    // Reset form fields
    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->mobile_no = '';
        $this->profile_picture = '';
    }

    public function render()
    {
        return view('livewire.admin.users.create');
    }
}
