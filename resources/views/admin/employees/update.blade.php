<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <hr />
                    <form action="{{ route('admin/employees/update', $employees->id) }}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Employee Name</label>
                                <input type="text" name="name" class="form-control" placeholder="name" value="{{$employees->name}}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{$employees->email}}">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Phone number" value="{{$employees->phone}}">
                                @error('phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            @foreach($employees->addresses as $address)
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Address 1</label>
            <input type="text" name="address1[]" class="form-control" placeholder="Address 1" value="{{ $address->address1 ?? '' }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Address 2</label>
            <input type="text" name="address2[]" class="form-control" placeholder="Address 2" value="{{ $address->address2 ?? '' }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Address 3</label>
            <input type="text" name="address3[]" class="form-control" placeholder="Address 3" value="{{ $address->address3 ?? '' }}">
        </div>
    </div>
@endforeach

@if (count($employees->addresses) === 0)
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Address 1</label>
            <input type="text" name="address1[]" class="form-control" placeholder="Address 1">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Address 2</label>
            <input type="text" name="address2[]" class="form-control" placeholder="Address 2">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Address 3</label>
            <input type="text" name="address3[]" class="form-control" placeholder="Address 3">
        </div>
    </div>
@endif

                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-warning">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>