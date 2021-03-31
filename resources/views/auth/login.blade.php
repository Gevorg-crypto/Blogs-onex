@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <form action="{{ url('/login') }}" method="POST">
                                @csrf
                                <h1>Admin Login </h1>
                                <p class="text-muted">Sign In to your account</p>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="icon-user"></i>
                                    </span>
                                        </div>
                                        <input class="form-control  @error('email') is-invalid @enderror" name="email" type="text"
                                               value="{{ old('email') }}" placeholder="Email" required autofocus>
                                    </div>
                                    @error('email') <span class="error">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                 <span class="input-group-text">
                                     <i class="icon-lock"></i>
                                 </span>
                                        </div>
                                        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password"
                                               required placeholder="Password">
                                    </div>
                                    @error('password') <span class="error">{{$message}}</span> @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-success px-4">Login</button>
                                    </div>
                                    <div class="col-12 text-right">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
