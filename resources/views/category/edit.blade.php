@extends('templates.main')

@section('content')
    <div class="m-5">
        <h3 class="text-center">Category Edit Form</h3>
        <form class="mx-5" method="POST" action="{{ route('categoryUpdate', $category->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" value="{{ $category->description }}" id="description"
                    name="description" placeholder="Category Description">
            </div>
            <div class="p-3 text-center">
                <input type="submit" class="btn btn-primary" placeholder="Submit"></input>
                <a href="{{ route('categoryIndex') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
@endsection
