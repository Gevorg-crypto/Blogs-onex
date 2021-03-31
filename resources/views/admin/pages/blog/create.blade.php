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
                    <form action="{{ route('blogs.store') }}" enctype="multipart/form-data" class="bottle-edit" id="bottle-create" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" id="text-input" name="name" class="form-control"
                                   value="{{ old('name') }}"
                                   placeholder="title" required autofocus>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="description" id="" placeholder="Description" class="form-control" cols="30" rows="5"></textarea>
                            @error('description') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <div class="custom-file-container" data-upload-id="myUniqueUploadId2">
                                <label>Upload File <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image" >&times;</a></label>
                                <label class="custom-file-container__custom-file" >
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" name="file"  accept="*" aria-label="Choose File">
                                </label>
                                <div class="custom-file-container__image-preview" ></div>
                                @error('file') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="js-example-basic-multiple form-control" title="select Categories" name="category[]" multiple="multiple">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="m-2 float-right">
                            <a href="{{ route('blogs.index') }}" class="btn btn-danger"> Cancel </a>
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
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@stop
