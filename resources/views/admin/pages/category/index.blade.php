@extends('layouts.admin.app')
@section('title','Category Table')
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
                <i class="fa fa-align-justify"></i> Category Table
                <div class="float-right">
                    <a href="{{ route('categories.create') }}">
                        <button class="btn btn-outline-success ">Add New Category</button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Parent Category</th>
                        <th>title</th>
                        <th>SubCategories</th>
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
                                {{ $category->parent->first() ? $category->parent->first()->title : '-' }}
                            </td>
                            <td>
                                {{ $category->title }}
                            </td>
                            <td>
                                @foreach($category->child()->take(3)->get() as $subcategory)
                                    <span>{{ $subcategory->title }},</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="float-right mr-5">
{{--                                    <a href="{{ route('categories.show', (int) $category->id) }}"><i class="icon-eye"></i></a>--}}
                                    <a href="{{ route('categories.edit', (int) $category->id) }}">edit</a>
                                    <a href="#" onclick="$(this).next('form').submit()">delete</a>
                                    <form action="{{ route('categories.destroy', (int) $category->id) }}" method="post">
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

