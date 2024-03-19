<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Create extends Component
{
    public $name, $email, $authority, $password;

    protected function resetInput()
    {
        $this->reset(['name', 'email', 'authority', 'password']);
    }

    public function rules()
    {
        return [
            "name" => "required|string",
            "email" => "required|email|unique:users,email",
            "authority" => "required|string|in:admin,customer",
            "password" => "required|min:6"
        ];
    }

    public function createUser()
    {
        try {
            $valid = $this->validate();
            User::create($valid);
            $this->resetInput();
            session()->flash('success', 'User created successfully');
        } catch (QueryException $th) {
            session()->flash('error', "Oops! Something went wrong in creating the user");
        }
    }
    public function render()
    {
        return view('livewire.admin.user.create');
    }
}
