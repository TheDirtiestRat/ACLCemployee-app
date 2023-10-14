<div class="col-auto p-0">
    {{-- card --}}
    <div class="bg-white shadow m-2 p-3 rounded-3 text-center">
        <img src="{{ asset('storage/images/aclc.png') }}" class="img-fit rounded-4 mb-1" alt="" width="170"
            height="170">
        <p class="m-0">{{ $employee->firstname }} {{ $employee->surname }}</p>
        <a href="{{ route('employee.show', $employee->employee_id) }}" class="text-decoration-none">
            <button class="btn btn-dark shadow d-block w-100 mb-2">{{ $employee->employee_id }}</button>
        </a>
    </div>
</div>
