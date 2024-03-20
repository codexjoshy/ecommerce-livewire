@props(['categories', 'title', 'btnTitle'])

<div class="form-row" wire:key="user-modal">

 <x-base.form-group label="Product Name" class="col-md-6">
  <x-base.input wire:model.defer='name' id="name" name="name" type="text" />
 </x-base.form-group>
 <x-base.form-group label="Category" class="col-md-3">
  <x-base.select wire:model.defer='category_id' placeholder="---" id="status" name="status">
   @foreach ($categories as $category)
   <option wire:key="cat-{{ $category->id }}" value="{{ $category->id }}">{{ ucwords($category->title) }}</option>
   @endforeach
  </x-base.select>
 </x-base.form-group>
 <x-base.form-group label="Price" class="col-md-3">
  <x-base.input wire:model.defer='price' id="price" name="price" type="number" />
 </x-base.form-group>

 <x-base.form-group label="Description" class="col-md-8">
  <x-base.textarea wire:model.defer='description' id="description" name="description" type="text"></x-base.textarea>
 </x-base.form-group>
 <x-base.form-group label="Image" class="col-md-4">
  <x-base.input :value="old('image')" id="image" name="image" type="file" wire:model="image" />
 </x-base.form-group>


</div>