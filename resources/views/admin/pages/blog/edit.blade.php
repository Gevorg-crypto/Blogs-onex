@extends('layouts.admin.app')
@section('title','Make Update ')
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Update New Make
            </div>
            <div class="card-body">
                <div class="nav-tabs-boxed">
                    <form action="{{ route('makes.update',$make->id) }}" class="bottle-edit" id="bottle-create" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                        <input type="text" id="text-input" name="title" class="form-control" value="{{ $make->title }}"
                               placeholder="title" required autofocus>
                        @error('title') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" id="text-input" name="code" class="form-control"
                                   value="{{ $make->code }}"
                                   placeholder="code"  autofocus>
                            @error('code') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="m-2 float-right">
                            <a href="{{ route('makes.index') }}" class="btn btn-danger"> Cancel </a>
                            <button class="btn btn-primary"> Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
