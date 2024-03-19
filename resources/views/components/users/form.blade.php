@props(['user'=>null, 'title', 'btnTitle'])

<div class="form-row" wire:key="user-modal">

 <x-base.form-group label="Full Name" class="col-md-6">
  <x-base.input wire:model.defer='name' id="name" name="name" type="text" />
 </x-base.form-group>

 <x-base.form-group label="Email" class="col-md-6">
  <x-base.input wire:model.defer='email' id="email" name="email" type="text" />
 </x-base.form-group>
 <x-base.form-group label="Password" class="col-md-6">
  <x-base.input wire:model.defer='password' id="password" name="password" type="password" />
 </x-base.form-group>
 <x-base.form-group label="Role" class="col-md-3">
  <x-base.select wire:model.defer='authority' placeholder="---" id="status" name="status">
   @foreach (['admin', 'customer'] as $status)
   <option wire:key="status-{{ $status }}" value="{{ $status }}">{{ ucwords($status) }}</option>
   @endforeach
  </x-base.select>
 </x-base.form-group>
</div>