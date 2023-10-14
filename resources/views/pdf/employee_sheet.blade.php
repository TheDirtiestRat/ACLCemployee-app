@extends('pdf.layout')

@section('content')
    <table class="table table-light align-middle">
        <thead class="text-center">
            <tr>
                <th colspan="2" class="table-dark">
                    <h3 class="text-start m-0">Personal Employee Data Sheet</h3>
                </th>
                <th colspan="2" class="table-dark">
                    <h5 class="text-end m-0">ID: {{ $employe_identification['employee_id'] }}</h5>
                </th>
            </tr>
            <tr>
                <th colspan="4">Emloyee Id</th>
            </tr>
            <tr>
                <td colspan="4">{{ $employe_identification['employee_id'] }}</td>
            </tr>
            <tr>
                <th colspan="3">Name</th>
                <th class="">Date Employed</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $employe_identification['firstname'] }}</td>
                <td>{{ $employe_identification['middlename'] }}</td>
                <td>{{ $employe_identification['surname'] }}</td>
                <td>{{ $employe_identification['created_at'] }}</td>
            </tr>

            <tr>
                <th colspan="4" class="table-dark">
                    Personal Information
                </th>
            </tr>
            <tr>
                <th>Maiden Name if Married</th>
                <th colspan="2">Place of Birth</th>
                <th>Religion</th>
            </tr>
            <tr>
                <td>{{ $employe_data['maiden_name'] }}</td>
                <td colspan="2">{{ $employe_identification['birth_place'] }}</td>
                <td>{{ $employe_data['religion'] }}</td>
            </tr>
            <tr>
                <th colspan="2">Date of Birth</th>
                <th>Blood Type</th>
                <th>Gender</th>
            </tr>
            <tr>
                <td colspan="2">{{ $employe_identification['birth_date'] }}</td>
                <td>{{ $employe_identification['bloodtype'] }}</td>
                <td>{{ $employe_identification['gender'] }}</td>
            </tr>
            <tr>
                <th colspan="2">Citizenship</th>
                <th colspan="2">Civil Status</th>
            </tr>
            <tr>
                <td colspan="2">{{ $employe_data['citizenship'] }}</td>
                <td colspan="2">{{ $employe_data['civilstatus'] }}</td>
            </tr>
            <tr>
                <th colspan="4" class="table-dark">Security Number</th>
            </tr>
            <tr>
                <th>TIN no.</th>
                <th colspan="2">SSS no.</th>
                <th>PAG-IBIG no.</th>
            </tr>
            <tr>
                <td>{{ $employe_data['tin_no'] }}</td>
                <td colspan="2">{{ $employe_data['sss_no'] }}</td>
                <td>{{ $employe_data['pagibig_no'] }}</td>
            </tr>
            <tr>
                <th class="text-center" colspan="4">Address</th>
            </tr>
            <tr>
                <td colspan="4">{{ $employe_data['address'] }}</td>
            </tr>

            <tr>
                <th colspan="4" class="table-dark text-center">Contact Information</th>
            </tr>
            <tr>
                <th>Telephone no.</th>
                <th>Cellphone no.</th>
                <th colspan="2">Email</th>
            </tr>
            <tr>
                <td>{{ $employe_contacts['tel_no'] }}</td>
                <td>{{ $employe_contacts['cell_no'] }}</td>
                <td colspan="2">{{ $employe_contacts['email'] }}</td>
            </tr>
        </tbody>
    </table>
@endsection
