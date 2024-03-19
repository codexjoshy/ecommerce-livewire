<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public  $email, $authority, $userId, $name, $password;
    // protected $listeners = ['updateUser'];
    public function rules()
    {
        return [
            "name" => "required| string",
            "email" => "required| email",
            "authority" => "required|string|in:admin,customer",
            "password" => "sometimes|min:6",
        ];
    }

    public function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->authority = null;
        $this->password = null;
    }

    public function closeModal()
    {
        $this->reset(["name", "email", "authority", "password"]);
    }

    public function updateUser()
    {
        $validated = $this->validate();
        User::find($this->userId)->update($validated);
        session()->flash('success', 'User has been updated successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent("close-modal");
    }
    public function createUser()
    {
        $validated = $this->validate();
        if (User::where('email', $validated['email'])->exists()) {
            session()->flash('error', 'User already exists');
            return;
        }
        User::create($validated);
        session()->flash('success', 'User has been created successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent("close-modal");
    }

    public function deleteUser(int $userId)
    {
        try {
            $user = User::findOrFail($userId);
            $user->delete();
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
        }
        session()->flash('deleted', 'User has been deleted successfully');
        $this->resetInput();
    }

    public function editUser(int $userId)
    {
        $this->resetInput();
        $user = User::findOrFail($userId);
        if (!$user) {
            session()->flash('error', 'Post not found');
        }
        // $this->set('name', 'josh');
        $this->userId = $userId;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->authority = $user->authority;
    }
    public function render()
    {
        $users = User::latest()->get();
        return view('livewire.admin.user.index', compact('users'))
            ->extends("layouts.admin")
            ->section("content");
    }
}
