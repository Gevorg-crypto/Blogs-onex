@extends('layouts.admin.app')
@section('title','Users Table')
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
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Users Table
                <div class="float-right">
                </div>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Created At</th>
                        <th>
                            <div class="float-right mr-5">
                                Action
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                @if(file_exists('storage/'.$user->picture_path))
                                <img src="{{ asset('storage/'.$user->picture_path) }}" style="object-fit: cover" alt="" width="50" height="40" srcset="">
                                @else
                                <img src="{{ asset('site/img/avatars/default-avatar.jpg') }}" style="object-fit: cover" alt="" width="50" height="40" srcset="">
                                @endif
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->surname }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->phone }}
                            </td>
                            <td>
                                {{ $user->created_at->diffForHumans() }}
                            </td>
                            <td>
                                <div class="float-right mr-5">
                                    <a href="{{ route('users.show', (int) $user->id) }}"><i class="icon-eye"></i></a>
                                    <a href="#" onclick="$(this).next('form').submit()"><i class="icon-close"></i></a>
                                    <form action="{{ route('users.destroy', (int) $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>

@endsection

