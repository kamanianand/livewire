<?php

namespace App\Livewire\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

#[Title('Edit User Details')]
class EditUser extends Component
{
    public $userId, $name, $email, $mobile_no, $profile_picture;

    use WithFileUploads;

    // Validation rules
    protected $rules = [
        'userId' => 'required',
        'name' => 'required|string|max:255',
        // 'email' => 'required|email|unique:users,email|max:255',
        'mobile_no' => 'required|string|min:3',
        'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
    ];


    public function mount($userId = null)
    {
        if ($userId) {
            $user = User::find($userId);
            $this->userId = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->mobile_no = $user->mobile_no;
        }

        if ($this->userId) {
            $this->rules['email'] = 'required|email|unique:users,email,' . $this->userId;
        }

    }

    public function update()
    {
        $this->validate();

        $user = User::find($this->userId);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->mobile_no = $this->mobile_no;
        
        // if ($this->password) {
        //     $user->password = Hash::make($this->password);
        // }

        if (!empty($this->profile_picture)) {
            $file_name = Str::random(40) . '.' . $this->profile_picture->extension();
            $this->profile_picture->storeAs('users', $file_name, 'public');
            $user->profile_image = $file_name;
        }

        $user->save();

        session()->flash('success', 'User updated successfully!');
        return redirect()->route('admin.users');
    }

    public function render()
    {
        return view('livewire.admin.users.edit');
    }
}
