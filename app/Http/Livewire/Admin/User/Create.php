<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Create extends Component
{
    public $name, $email, $role_id,  $password, $roles;


    protected function resetInput()
    {
        $this->reset(['name', 'email', 'role_id', 'password']);
    }

    public function rules()
    {
        return [
            "name" => "required|string",
            "email" => "required|email|unique:users,email",
            "role_id" => "required|string|exists:roles,id",
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
        $this->roles =  Role::latest()->get();
        return view('livewire.admin.user.create', ["roles" => $this->roles]);
    }
}
