@extends('layouts.admin.app')
@section('title','Blog Table')
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
                <i class="fa fa-align-justify"></i> Blog Table
                <div class="float-right">
                    <a href="{{ route('blogs.create') }}">
                        <button class="btn btn-outline-success ">Add New Blog</button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>title</th>
                        <th>Description</th>
                        <th>categories</th>
                        <th>
                            <div class="float-right mr-5">
                                Action
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <td>
                                {{ $blog->id }}
                            </td>
                            <td>
                                {{ $blog->name }}
                            </td>
                            <td>
                                {{ $blog->description ?: "-" }}
                            </td>
                            <td>
                                {!! $blog->categories->pluck('title') !!}
                            </td>
                            <td>
                                <div class="float-right mr-5">
{{--                                    <a href="{{ route('blogs.show', (int) $blog->id) }}"><i class="icon-eye"></i></a>--}}
                                    <a href="{{ route('blogs.edit', (int) $blog->id) }}"><i class="icon-note"></i></a>
                                    <a href="#" onclick="$(this).next('form').submit()"><i class="icon-close"></i></a>
                                    <form action="{{ route('blogs.destroy', (int) $blog->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $blogs->links() }}
            </div>
        </div>
    </div>

@endsection

