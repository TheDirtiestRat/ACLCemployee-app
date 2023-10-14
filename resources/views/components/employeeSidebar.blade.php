<div class=" bg-img-gr d-flex flex-column flex-shrink-0 p-3 rounded-start rounded-5 shadow sidebar-fixed"
    id="sidebar-wrapper" style="width: 260px;">

    <ul class="nav nav-pills gap-2 flex-column mb-auto overflow-x-scroll">
        <li class="nav-item text-center">
            <img class="mb-2 img-filter" src="{{ asset('storage/images/aclc.png') }}" alt width="70">
            <h2>@include('components.systemTitle')</h2>
            <hr>
        </li>

        {{-- options candidate --}}
        <li class="nav-item">
            <a class="btn btn-dark w-100 text-start" href="{{ route('details') }}" role="button">
                <i class="bi bi-list"></i>
                Details
            </a>
            <div class="ps-2 mt-2">
                <ul class="nav nav-pills flex-column">
                    {{-- option list --}}
                    <li class="nav-item">
                        <a href="{{ route('details') }}"
                            class="nav-link text-dark scroll-target hover-effect">
                            <i class="bi bi-bookmark-fill"></i>
                            Data Sheet
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('update') }}"
                            class="nav-link text-dark scroll-target hover-effect">
                            <i class="bi bi-bookmark-fill"></i>
                            Update Details
                        </a>
                    </li>


                    {{-- <hr class="m-2">

                    <li class="nav-item">
                        <a href="{{ route('scoreByCategory', $Category->id) }}"
                            class="nav-link text-dark scroll-target hover-effect">
                            <i class="bi bi-person-add"></i>
                            Contacts
                        </a>
                    </li> --}}
                </ul>
            </div>
        </li>
    </ul>

    <hr>
    <div>
        @include('components.copyright')
    </div>
</div>
