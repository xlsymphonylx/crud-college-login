@extends('templates.main')

@section('content')
    <div class="m-5">
        <h4 class="text-center">Customer Entries</h4>
        <div class="text-end my-1">
            <a href="{{ route('customerRegister') }}" class="btn btn-primary">Add more</a>
        </div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Category</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <th scope="row">{{ $customer->id }}</th>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone_number }}</td>
                        <td>{{ $customer->category->description }}</td>
                        <td class="d-flex justify-content-start">
                            <form method="POST" action="{{ route('customerDelete', $customer->id) }}" class="text-center">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger me-2">Delete</button>
                            </form>
                            <a href="{{ route('customerEdit', $customer->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
