<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\EmployeeAddress;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::with('addresses')->get();
        return view('admin.employees.home', compact('employees'));
    }


    public function create(){
        return view('admin/employees/create');
    }

 

    public function save(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address1' => 'required',
            
        ]);
    
        $employee = Employee::create([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'phone' => $validation['phone'],
        ]);
    
       
        $employeeAddress = EmployeeAddress::create([
            'address1' => $validation['address1'],
            'address2' => $request->input('address2'), 
            'address3' => $request->input('address3'),
            'employee_id' => $employee->id, 
        ]);
    
        if ($employee && $employeeAddress) {
            session()->flash('success', 'Employee Added Successfully');
            return redirect(route('admin/employees'));
        } else {
            session()->flash('error', 'Some Error Occurred');
            return redirect(route('admin/employees/create'));
        }
    }


    public function edit($id){
        $employees = Employee::with('addresses')->findOrFail($id);
        return view('admin.employees.update', compact('employees'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        
        
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
    
       
        $employee->save();
    
     
        $address = $employee->addresses()->firstOrNew([]);
        $address->address1 = $request->address1[0];
        $address->address2 = $request->address2[0];
        $address->address3 = $request->address3[0];
        $address->save();
    
     
        if ($employee && $address) {
            session()->flash('success', 'Employee and Addresses Updated Successfully');
        } else {
            session()->flash('error', 'Some problem occurred');
        }
    
        return redirect()->route('admin/employees');
    }
    

    public function delete($id)
    {
        $employees = employee::findOrFail($id)->delete();
        if ($employees) {
            session()->flash('success', 'employees Deleted Successfully');
            return redirect(route('admin/employees'));
        } else {
            session()->flash('error', 'employees Not Delete successfully');
            return redirect(route('admin/employees'));
        }
    }

    public function show($id){
        $employees = Employee::with('addresses')->findOrFail($id);
        return view('admin.employees.show', compact('employees'));
    }

 
    



    
}
