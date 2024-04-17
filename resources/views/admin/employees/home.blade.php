<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">{{ __('Add Employees') }}</h1>
                        <a href="{{ route('admin/employees/create')}}" class="btn btn-primary">Add Employee</a>
                    </div>
                    <hr />
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="" alert>
                        {{Session::get('success')}}
                    </div>
                    @endif

                    
                    <div class="mb-3">
                        <input id="search" type="text" class="form-control" placeholder="Search by employee details or address">
                    </div>

                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $employee->name }}</td>
                                <td class="align-middle">{{ $employee->email }}</td>
                                <td class="align-middle">{{ $employee->phone }}</td>
                                <td class="align-middle employee-details" style="display: none;">
                                    {{ $employee->name }} {{ $employee->email }} {{ $employee->phone }} 
                                    {{ $employee->addresses->implode('address1', ' ') }} 
                                    {{ $employee->addresses->implode('address2', ' ') }} 
                                    {{ $employee->addresses->implode('address3', ' ') }}
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin/employees/show', ['id'=>$employee->id]) }}" type="button" class="btn btn-primary">Show</a>
                                        <a href="{{ route('admin/employees/edit', ['id'=>$employee->id]) }}" type="button" class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('admin/employees/delete', ['id'=>$employee->id]) }}" type="button" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        const searchInput = document.getElementById('search');

        searchInput.addEventListener('keyup', function () {
            const searchTerm = this.value.toLowerCase().trim(); 

        
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(function (row) {
               
                let employeeDetails = row.querySelector('.employee-details').innerText.toLowerCase();
                let hasMatch = employeeDetails.includes(searchTerm);

                
                row.style.display = hasMatch ? '' : 'none';
            });
        });
    </script>
</x-app-layout>
