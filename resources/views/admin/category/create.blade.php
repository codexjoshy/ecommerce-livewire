@extends('layouts.admin')

@section('content')
@php
    $route = $category ? route("category.update", $category->id) : route("category.store");
@endphp
<div class="row">
    <div class="col-12">
        <x-base.card title="Create Category">
            <x-base.form :action="$route" autocomplete="on" enctype="multipart/form-data">
                @method($category? 'PATCH': 'post')
                <div class="form-row">
                    <x-base.form-group label="Title" class="col-md-6">
                        <x-base.input  :value="old('title')?? optional($category)->title" id="title"
                            name="title" type="text" />
                    </x-base.form-group>
                    <x-base.form-group label="Slug" class="col-md-6">
                        <x-base.input :value="old('slug')?? optional($category)->slug" id="slug"
                            name="slug" type="text" />
                    </x-base.form-group>
                    <x-base.form-group label="Description" class="col-md-12">
                        <x-base.textarea  :value="old('description')" id="description"
                            name="description">{{ optional($category)->description }}</x-base.textarea>
                    </x-base.form-group>
                    <x-base.form-group label="Status" class="col-md-3">
                        <x-base.select placeholder="---" id="status" name="status">
                            @foreach (['active', 'suspended'] as $status)
                            @php
                                $selected = optional($category)->category_status == $status ? 'selected': '';
                            @endphp
                            <option {{ $selected }} value="{{ $status }}">{{ ucwords($status) }}</option>
                            @endforeach
                        </x-base.select>
                    </x-base.form-group>
                    <x-base.form-group label="Image" class="col-md-6">
                        <x-base.input :value="old('image')" id="image"
                            name="image" type="file" />
                    </x-base.form-group>
                </div>
                <x-base.form-group class="text-center">
                    <x-base.button class="btn-primary">
                        Submit
                    </x-base.button>
                </x-base.form-group>
            </x-base.form>
        </x-base.card>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(function(){
        $('#title').keyup(function() {
            let title = $(this).val();
            const slugify = title => title
            .toLowerCase()
            .trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');

            $('#slug').val(slugify(title));
        })
    })

</script>
@endpush
