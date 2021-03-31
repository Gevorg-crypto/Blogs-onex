@extends('layouts.admin.app')
@section('title','Subcategory Create ')
@section('css')
    <link href="{{ asset('pack/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>
@stop
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Create New Subcategory
            </div>
            <div class="card-body">
                <div class="nav-tabs-boxed">
                    <form action="{{ route('subcategories.store') }}" class="bottle-edit" id="bottle-create" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Parent Subcategory </label>
                            <select class="js-example-basic-single form-control" title="Select Subcategory"
                                    name="parent_id">
                                <option value="" selected>Select Subcategory</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="text-input">Title </label>
                            <input type="text" id="text-input" name="title" class="form-control"
                                                                   value="{{ old('title') }}"
                                                                   placeholder="title" required autofocus>
                            @error('title') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="m-2 float-right">
                            <a href="{{ route('subcategories.index') }}" class="btn btn-danger"> Cancel </a>
                            <button class="btn btn-primary"> Create</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('pack/select2/dist/js/select2.full.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@stop
