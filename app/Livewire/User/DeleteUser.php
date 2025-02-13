<?php

namespace App\Livewire\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;

#[Title('Delete User')]
class DeleteUser extends Component
{
    public $userId;
    public $confirmDelete = false;
    public $user;

    protected $listeners = ['deleteUser'];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->userId = $user->id;
    }

    public function deleteUser($userId)
    {
        $this->userId = $userId;
        $this->confirmDelete = true;

        $this->emit('confirmDelete');
    }

    public function cancelDeletion()
    {
        $this->confirmDelete = false;
    }

    public function delete($userId)
    {   
        dd($userId);
        $user = User::find($this->userId);
        if ($user) {
            $user->delete();
            session()->flash('success', 'User deleted successfully!');
        }
        
        $this->userId = null; 
        return redirect()->route('admin.users');
    }

    public function render()
    {
        return view('livewire.admin.users.delete');
    }
}
