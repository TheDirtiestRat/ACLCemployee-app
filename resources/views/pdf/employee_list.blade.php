@extends('pdf.layout')

@section('content')
    <table class="table table-light align-middle">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Blood Type</th>
                <th>Birth Date</th>
            </tr>
            <tr>
                <th colspan="5"  class="table-dark text-center">
                    Employee's
                </th>
            </tr>
        </thead>
        <tbody>
            {{-- employee data row --}}
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->employee_id }}</td>
                    <td class="text-start">{{ $employee->firstname }} {{ $employee->middlename }}. {{ $employee->surname }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->bloodtype }}</td>
                    <td>{{ $employee->birth_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
