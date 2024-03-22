@extends('layouts.admin')
@section('content')
<div class="row">
 <div class="col-12">
  @livewire('admin.role.index', ['roles' => $roles], key($roles->id))
  {{--
  <livewire:admin.role.index :roles="$roles" /> --}}
 </div>
</div>
@endsection