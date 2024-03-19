@extends('layouts.admin')
@section('content')
<div class="row">
 <div class="col-12">
  <x-base.card title="Create User">
   <livewire:admin.user.create />
  </x-base.card>
 </div>
</div>
@endsection