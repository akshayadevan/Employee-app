<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeSUpdateRequest;
use App\Mail\EmployeeCreated;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use DB;


class EmployeeController extends Controller
{
    public function create()
    {
        $designations = Designation::get();
        return view('employee.create', compact('designations'));
    }

    public function store(EmployeeStoreRequest $request)
    {
        $employee = Employee::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'designation_id' => $request->designation_id,
            ]
        );
        if($request->hasFile('photo')) {
            $employee->update([
                    'photo' => $request->photo->store('employee', 'public'),
                ]
            );
        }
        $employee->save();

        //sent mail to employee
//        Mail::to($request->email)->send(new EmployeeCreated($employee->name));

        return redirect()->route('employee.index');
    }

    public function index()
    {
        $employees = DB::table(Employee::getTableName().' as e')
            ->join(Designation::getTableName().' as d', 'd.id', 'e.designation_id')
            ->select('e.id', 'e.name', 'e.email', 'd.designation')
            ->get();

        return view('employee.index', compact('employees'));
    }
    public function edit(Employee $employee)
    {
        $designations = Designation::pluck('designation', 'id')->toArray();
        return view('employee.edit', compact('employee', 'designations'));
    }

    public function update(EmployeeSUpdateRequest $request, Employee $employee)
    {
        Employee::where('id', $employee->id)
            ->Update([
                'name' => $request->name,
                'email' => $request->email,
                'designation_id' => $request->designation_id,
            ]);

        if($request->hasFile('photo')) {
            $employee->update([
                    'photo' => $request->photo->store('employee', 'public'),
                ]
            );
        }
        $employee->save();
        return redirect()->route('employee.index');

    }

    public function destroy(Employee $employee)
    {
        Employee::where('id', $employee->id)->firstOrFail();
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
