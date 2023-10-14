@extends('layouts.app')

@section('content')
    <h1 class="mb-4 display-3">List of Employee</h1>

    {{-- search bar --}}
    <div class="row mb-4 p-2">
        <div class="col">
            <input type="search" class="form-control" id="searchbar" name="searchbar" placeholder="Search Employee...">
        </div>
        <div class="col-auto">
            <button class="btn btn-dark shadow">Search</button>
        </div>
        <div class="col-auto">
            <a href="{{ route('employeeList') }}" class="text-decoration-none"
                target="_blank">
                <button class="btn btn-dark shadow">Print list as a PDF</button>
            </a>
        </div>
    </div>

    <hr>

    {{-- alert --}}
    @include('components.alert')

    {{-- employee list cards --}}
    <div class="row justify-content-center" id="listOfEmployee">
        @foreach ($employees as $employee)
            @include('components.card')
        @endforeach

        {{-- paging --}}
        <div class="mt-4 ps-3 pe-3">
            {{ $employees->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>

    {{-- search script --}}
    <script type="module">
        $('#searchbar').on('keyup', function() {
            var $value = $(this).val();
            $.ajax({
                url: "{{ url('search') }}",
                type: "GET",
                data: {
                    'key': $value
                },
                success: function(data) {
                    $('#listOfEmployee').html(data);
                }
            })
        });
    </script>
@endsection
