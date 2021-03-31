@extends('layouts.admin.app')
@section('title','Blog Create ')
@section('css')
    <link href="{{ asset('pack/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>
@stop
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Create New Blog
            </div>
            <div class="card-body">
                <div class="nav-tabs-boxed">
                    <form action="{{ route('categories.store') }}" class="bottle-edit" id="bottle-create" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Parent Category </label>
                            <select class="js-example-basic-single form-control" title="Select Category"
                                    name="parent_category">
                                <option value="">Select Category</option>
                                @foreach($categories as $category1)
                                    <option value="{{ $category1->id }}"
                                        {{ in_array($category1->id , $category->parent->count() > 0 ? $category->parent->pluck('id')->toArray():[0]) ? 'selected' : ''  }}>{{ $category1->title }}</option>
                                @endforeach
                            </select>
                            @error('parent_category') <span class="error">{{ $message }}</span> @enderror

                        </div>
                        <div class="form-group">
                            <label for="text-input">Title </label>
                            <input type="text" id="text-input" name="title" class="form-control"
                                                                   value="{{ $category->title }}"
                                                                   placeholder="title" required autofocus>
                            @error('title') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>SubCategory </label>
                            <select class="js-example-basic-multiple form-control" title="select Categories"
                                    name="sub_category[]" multiple="multiple">
                                @foreach($categories as $category2)
                                    <option value="{{ $category2->id }}" {{ in_array($category2->id , $category->child->count() > 0 ? $category->child->pluck('id')->toArray():[0])? 'selected':'' }}>{{ $category2->title }}</option>
                                @endforeach
                            </select>
                            @error('sub_category') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="m-2 float-right">
                            <a href="{{ route('categories.index') }}" class="btn btn-danger"> Cancel </a>
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
