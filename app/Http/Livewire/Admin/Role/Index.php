<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Role;
use Livewire\Component;

class Index extends Component
{
    public $name, $roles;


    public function rules()
    {
        return [
            "name" => 'required|string|unique:roles,name',
        ];
    }

    public function createRole()
    {
        $validated = $this->validate();
        try {
            Role::create($validated);
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return;
        }
        $this->reset(['name']);
        session()->flash('success', 'Role created successfully');
        $this->dispatchBrowserEvent("close-modal");
    }
    public function render()
    {
        $this->roles = Role::latest()->get();
        return view('livewire.admin.role.index', ["roles" => $this->roles]);
    }

    public function closeModal()
    {
        $this->reset(['name']);
    }
}
