<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Services\FileService;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeController extends Controller
{
    private $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index()
    {
        return view('employee.index', [
            'employees' => Employee::latest()->paginate(10)
        ]);
    }

    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        try {
            Employee::create($this->toEmployeeArray($request->validated()));
            return redirect()->route('employees.index')->with('success', 'Employee created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create employee');
        }
    }

    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        try {
            $employee->update($this->toEmployeeArray($request->validated()));
            return redirect()->back()->with('success', 'Employee updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update employee');
        }
    }

    public function delete(Employee $employee)
    {
        try {
            $employee->delete();
            return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete employee');
        }
    }

    public function deleteImage(Employee $employee) {
        $employee->update(['image' => null]);
        return redirect()->back()->with('success', 'Image deleted successfully');
    }

    public function toEmployeeArray(array $data)
    {
        $image = isset($data['image']) ? $this->fileService->saveImage($data['image'], 'employees') : null;
        return [
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'type' => $data['type'],
            'image' => $image
        ];
    }
}
