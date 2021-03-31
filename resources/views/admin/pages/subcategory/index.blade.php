@extends('layouts.admin.app')
@section('title','Subcategory Table')
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
                <i class="fa fa-align-justify"></i> Subcategory Table
                <div class="float-right">
                    <a href="{{ route('subcategories.create') }}">
                        <button class="btn btn-outline-success ">Add New Subcategory</button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Parent Subcategory</th>
                        <th>title</th>
                        <th>
                            <div class="float-right mr-5">
                                Action
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{ $category->id }}
                            </td>
                            <td>
                                {{ $category->parent_id ?? '-' }}
                            </td>
                            <td>
                                {{ $category->title }}
                            </td>
                            <td>
                                <div class="float-right mr-5">
{{--                                    <a href="{{ route('subcategories.show', (int) $category->id) }}"><i class="icon-eye"></i></a>--}}
                                    <a href="{{ route('subcategories.edit', (int) $category->id) }}">edit</a>
                                    <a href="#" onclick="$(this).next('form').submit()">delete</a>
                                    <form action="{{ route('subcategories.destroy', (int) $category->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>

@endsection

