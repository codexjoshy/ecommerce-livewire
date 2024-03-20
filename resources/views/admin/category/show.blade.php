@extends('layouts.admin')

@section('content')
<div class="row">
   <div class="col-12">
      <x-base.card title="{{ $category->title }} Category">
         <x-slot name='action'>
            <a wire:navigate href="{{ route('category.index') }}"
               class="btn btn-xs btn-facebook d-inline-block gap-10"><span class="fa fa-chevron-left"></span>
               Back</a>
         </x-slot>

         @livewire('category.show', ['category' => $category], key($category->id))

      </x-base.card>
   </div>
</div>
</div>
@endsection