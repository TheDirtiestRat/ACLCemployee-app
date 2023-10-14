@extends('layouts.app')

@section('content')
    <h1 class="text-center">Add new Employee</h1>

    {{-- alert --}}
    @include('components.alert')

    <form action="{{ route('employee.store') }}" method="post" class="needs-validations" enctype="multipart/form-data" novalidate>
        {{-- for validation --}}
        @csrf

        <div class="row g-2 m-2">
            <div class="col-12">
                <h3>Employee Name</h3>
            </div>
            <div class="col">
                <label for="surname" class="form-label">Sur Name</label>
                <input type="text" class="form-control" placeholder="Sur Name" name="surname" id="surname"
                    value="" required>
            </div>
            <div class="col-md col-12">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname"
                    value="" required>
            </div>
            <div class="col">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" class="form-control" placeholder="Middle Name" name="middlename" id="middlename"
                    value="">
            </div>
        </div>

        <div class="row g-2 m-2">
            <div class="col-md-4 col-12">
                <label for="maiden_name" class="form-label">If Married Write Maiden Name</label>
                <input type="text" class="form-control" placeholder="N/A" name="maiden_name" id="maiden_name"
                    value="">
            </div>
            <div class="col-md col-12">
                <label for="birth_place" class="form-label">Place of Birth</label>
                <input type="text" class="form-control" placeholder="BRGY. MACALIPAY PASTRANA LEYTE" name="birth_place"
                    id="birth_place" value="" required>
            </div>
            <div class="col">
                <label for="religion" class="form-label">Religion</label>
                <input type="text" class="form-control" placeholder="Religion" name="religion" id="religion"
                    value="" required>
            </div>
        </div>

        <div class="row g-2 m-2">
            <div class="col-md-4 col-12">
                <label for="birth_date" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="birth_date" id="birth_date" required>
            </div>
            <div class="col-md col-12">
                <label for="blood_type" class="form-label">Blood Type</label>
                <input type="text" class="form-control" placeholder="O+" name="blood_type" id="blood_type" value="">
            </div>
            <div class="col">
                <label for="civil_status" class="form-label">Civil Status</label>
                <input type="text" class="form-control" placeholder="Single" name="civil_status" id="civil_status"
                    value="">
            </div>
        </div>

        <div class="row g-2 m-2">
            <div class="col-md col-12">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" name="gender" id="gender" required>
                    <option selected disabled value>Select Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class="col">
                <label for="citizenship" class="form-label">Citizenship</label>
                <input type="text" class="form-control" placeholder="FILIPINO" name="citizenship" id="citizenship"
                    value="">
            </div>
        </div>

        <div class="row g-2 m-2">
            <div class="col-12">
                <h3>Security Numbers</h3>
            </div>
            <div class="col-md-4 col-12">
                <label for="tin_no" class="form-label">TIN NO.</label>
                <input type="number" class="form-control" name="tin_no" id="tin_no">
            </div>
            <div class="col-md col-12">
                <label for="sss_no" class="form-label">SSS NO.</label>
                <input type="number" class="form-control" name="sss_no" id="sss_no" value="">
            </div>
            <div class="col">
                <label for="ibig_no" class="form-label">PAG-IBIG NO.</label>
                <input type="number" class="form-control" name="pag-ibig_no" id="ibig_no" value="">
            </div>
        </div>

        <div class="row g-2 m-2">
            <div class="col">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" placeholder="BRGY. MACALIPAY PASTRANA LEYTE" name="address"
                    id="address" required>
            </div>
        </div>

        <div class="row g-2 m-2">
            <div class="col-12">
                <h3>Contacts</h3>
            </div>
            <div class="col-md-4 col-12">
                <label for="tel_no" class="form-label">TEL NO.</label>
                <input type="number" class="form-control" placeholder="0909090909" name="tel_no" id="tel_no">
            </div>
            <div class="col-md col-12">
                <label for="cell_no" class="form-label">CELLPHONE NOL</label>
                <input type="number" class="form-control" placeholder="098888888" name="cell_no" id="cell_no"
                    value="">
            </div>
            <div class="col">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="johndoe@email.com" name="email"
                    id="email" value="">
            </div>
        </div>

        <hr class="m-3">

        <div class="row g-2">
            <div class="col">
                <button class="btn btn-lg btn-dark rounded-3 float-end" type="submit">
                    Add Employee
                </button>
            </div>
        </div>
    </form>
@endsection
