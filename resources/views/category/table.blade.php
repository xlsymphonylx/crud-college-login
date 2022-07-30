@extends('templates.main')

@section('content')
    <div class="m-5">
        <h4 class="text-center">Category Entries</h4>
        <div class="text-end my-1">
            <a href="{{ route('categoryRegister') }}" class="btn btn-primary">Add more</a>
        </div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->description }}</td>
                        <td class="d-flex justify-content-start">

                            <form method="POST" action="{{ route('categoryDelete', $category->id) }}"
                                class="text-center">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger me-2">Delete</button>
                            </form>

                            <a href="{{ route('categoryEdit', $category->id) }}" class="btn btn-warning">Edit</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
