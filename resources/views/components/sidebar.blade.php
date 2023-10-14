<div class=" bg-img-gr d-flex flex-column flex-shrink-0 p-3 rounded-start rounded-5 shadow sidebar-fixed"
    id="sidebar-wrapper" style="width: 260px;">

    <ul class="nav nav-pills gap-2 flex-column mb-auto overflow-x-scroll">
        <li class="nav-item text-center text-dark">
            <img class="mb-2 img-filter" src="{{ asset('storage/images/aclc.png') }}" alt width="70">
            <h4>@include('components.systemTitle')</h4>
            <hr>
        </li>

        {{-- options users --}}
        <li class="nav-item">
            <a class="btn btn-dark w-100 text-start" href="{{ route('employee.index') }}" role="button">
                <i class="bi bi-list"></i>
                Employee
            </a>
            <div class="ps-2 mt-2">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a href="{{ route('employee.create') }}" class="nav-link text-dark scroll-target hover-effect">
                            <i class="bi bi-person-add"></i>
                            Add Employee
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{ route('employee.show', 0) }}" class="nav-link text-dark scroll-target hover-effect">
                            <i class="bi bi-person-circle"></i>
                            Employee Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee.edit', 0) }}" class="nav-link text-dark scroll-target hover-effect">
                            <i class="bi bi-person-gear"></i>
                            Employee Edit
                        </a>
                    </li> --}}

                    <hr class="m-2">
                </ul>
            </div>
        </li>
    </ul>

    <hr>
    <div>
        @include('components.copyright')
    </div>
</div>
