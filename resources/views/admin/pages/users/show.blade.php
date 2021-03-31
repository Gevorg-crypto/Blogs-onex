@extends('layouts.admin.app')
@section('title','User')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('errors'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <img class=" profile-image" src="{{ asset('storage/'.$user->picture_path )}}"  alt="Second slide">
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item"><i class="nav-icon cui-user"></i> {{ $user->name.' '.$user->surname }}</li>
                            <li class="list-group-item"><i class="nav-icon cui-user"></i> {{ $user->nickname }}</li>
                            <li class="list-group-item"><i class="nav-icon cui-speech"></i> {{ $user->email }}</li>
                            <li class="list-group-item"><i class="nav-icon cui-phone"></i> {{ $user->phone }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Favorite List</h5>
                <div class="float-right">
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered ">
                            <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Vin_code</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->favorites as $car)
                                <tr>
                                    <td>
                                        @if(file_exists('storage/'.$car->getImage()->first()->picture_path))
                                            <img src="{{ asset('storage/'.$car->getImage()->first()->picture_path) }}" style="object-fit: cover" alt="" width="50" height="40" srcset="">
                                        @else
                                            <img src="{{ asset('site/img/avatars/default-avatar.jpg') }}" style="object-fit: cover" alt="" width="50" height="40" srcset="">
                                        @endif
                                    </td>
                                    <td>{{ $car->makes->title }}</td>
                                    <td>{{ $car->makes_models->title }}</td>
                                    <td>{{ $car->year }}</td>
                                    <td>{{ $car->vin_code }}</td>
                                    <td>
                                        <a href="{{ route('cars.show', (int) $car->id) }}"><i class="icon-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

