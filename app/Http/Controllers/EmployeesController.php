<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee ;
use App\Country ;
use DB;
use App\Http\Resources\Employee as EmployeeResource;

class EmployeesController extends Controller
{
    public function test(){
        $c = new Country;
        $countries= $c->all();
        return $countries;
    }

    public function index()
    {
        $emps = Employee::
        join('country','employees.Country','=','country.id')
        ->select('employees.Id','employees.LastName','employees.FirstName','employees.Age','employees.BirthDate','country.country_name','employees.created_at','employees.updated_at')
        ->get();
        return EmployeeResource::collection($emps);
        //return $emps;
    }

    public function store(Request $request)
    { 
        $this->validate($request, [
            'lastname'=>'required',
            'firstname'=>'required'
        ]);
        $employee= new Employee;
        $employee->LastName= $request->input('lastname');
        $employee->FirstName= $request->input('firstname');
        $employee->Age= $request->input('age');
        $employee->BirthDate= $request->input('birthdate');
        $employee->Country= $request->input('country');
        $employee->save();
        //return redirect('employee')->with('success','Employee Created');
        return "saved";
    }

    public function show($id)
    {
        $emp = Employee::
        join('country','employees.Country','=','country.id')
        ->select('employees.Id','employees.LastName','employees.FirstName','employees.Age','employees.BirthDate','country.country_name','employees.created_at','employees.updated_at')
        ->where('employees.Id','=',$id)
        ->get();
        return $emp;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'lastname'=>'required',
            'firstname'=>'required'
        ]);

        $employee= Employee::find($id);
        $employee->LastName= $request->input('lastname');
        $employee->FirstName= $request->input('firstname');
        $employee->Age= $request->input('age');
        $employee->BirthDate= $request->input('birthdate');
        $employee->Country= $request->input('country');
        $employee->save();
        return redirect('employee')->with('success','Employee Updated');
    }

    public function destroy($id)
    {
        $emp=Employee::find($id);
        $emp->delete();
        return redirect('employee')->with('success','Employee Deleted');  ;
    }

}
