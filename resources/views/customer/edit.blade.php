@extends('templates.main')

@section('content')
    <div class="m-5">
        <h3 class="text-center">Customer Form</h3>
        <form class="mx-5" method="POST" action="{{ route('customerUpdate', $customer->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group my-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}"
                    placeholder="Customer name">
            </div>
            <div class="form-group my-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}"
                    placeholder="Customer Address">
            </div>
            <div class="form-group my-3">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" value="{{ $customer->phone_number }}"
                    name="phone_number" placeholder="Customer Phone Number">
            </div>
            <div class="form-group my-3">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" placeholder="Customer Category">
                    <option selected disabled>Choose an option</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $customer->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('customerIndex') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
@endsection
