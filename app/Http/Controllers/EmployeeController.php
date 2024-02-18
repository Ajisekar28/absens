<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Schedule;
use App\Http\Requests\EmployeeRec;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $schedules = Schedule::all();

        return view('admin.employee', compact('employees', 'schedules'));
    }

    public function store(EmployeeRec $request)
    {
        $validatedData = $request->validated();

        $employee = new Employee;
        $employee->name = $request->name;
        $employee->rfid = $request->rfid;
        $employee->class = $request->class;
        $employee->major = $request->major;
        $employee->gender = $request->gender;
        $employee->save();

        if ($request->schedule) {
            $schedule = Schedule::where('slug', $request->schedule)->first();
            if ($schedule) {
                $employee->schedules()->attach($schedule->id);
            }
        }

        flash()->success('Success', 'Employee Record has been created successfully!');
        return redirect()->route('employees.index');
    }

    public function update(EmployeeRec $request, Employee $employee)
    {
        $validatedData = $request->validated();

        $employee->name = $request->name;
        $employee->rfid = $request->rfid;
        $employee->class = $request->class;
        $employee->major = $request->major;
        $employee->gender = $request->gender;
        $employee->save();

        if ($request->schedule) {
            $employee->schedules()->detach();

            $schedule = Schedule::where('slug', $request->schedule)->first();
            if ($schedule) {
                $employee->schedules()->attach($schedule->id);
            }
        }

        flash()->success('Success', 'Employee Record has been updated successfully!');
        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        flash()->success('Success', 'Employee Record has been deleted successfully!');
        return redirect()->route('employees.index');
    }
}


