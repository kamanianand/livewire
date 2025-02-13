<?php

namespace App\Livewire\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

#[Title('Users')]
class Users extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        if (!empty($this->search)) {
            $search = $this->search;
            $users = User::select('*');
            $users->where(function ($query) use ($search) {
                $query->Where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
            $users = $users->orderBy('id','desc')->paginate(10);
        } else {
            $users = User::orderBy('id','desc')->paginate(10);
        }
        return view('livewire.admin.users.index',['users' => $users]);
    }

    public function delete($userId)
    {   
        $user = User::find($userId);
        if ($user) {
            $user->delete();
            session()->flash('success', 'User deleted successfully!');
        }
        return redirect()->route('admin.users');
    }
}
