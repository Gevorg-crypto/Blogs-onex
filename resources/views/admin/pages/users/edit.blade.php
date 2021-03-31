@extends('layouts.admin.app')
@section('title','User Edit')
@section('content')

    <div class="col-lg-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
            @if ($message = Session::get('errors'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message->first() }}</strong>
                </div>
            @endif
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Edit User</div>
            <div class="card-body">
                <form action="{{ route('users.update',$user->id) }}" id="user-edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}"  class="form-control" placeholder="Name"  autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" value="{{ $user->email }}"  class="form-control" placeholder="Email" >
                    </div>

                    <div class="form-group">
                        <label for="number">Number</label>
                        <input type="text" class="form-control"  name="number" maxlength='20' onkeypress="return isNumberKey(event)"  placeholder="Number" value="{{ $user->number }}" >
                    </div>

                    <div class="m-2 float-right">
                        <a href="{{ route('users.index') }}" class="btn btn-danger"> Cancel </a>
                        <button class="btn btn-primary"> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
