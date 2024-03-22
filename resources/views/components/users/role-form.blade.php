@props([])

<div class="form-row" wire:key="user-modal">

 <x-base.form-group label="Name" class="col-md-12">
  <x-base.input wire:model.defer='name' id="name" name="name" type="text" />
 </x-base.form-group>

</div>