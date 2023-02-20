<aside>
    <div class="logo-mobile">
        <a href="{{ url('/') }}"><img src="/logo-doc-transp.png" alt="logo"></a>
    </div>

    <ul class="p-0">
        <li class="nav-item">
            <a class="{{Route::currentRouteName()==='admin.dashboard' ? 'active' : ''}}" href="{{ url('admin') }}"><i class="fa-solid fa-table-columns"></i> {{__('Dashboard')}}</a>
        </li>
        <li>
            <a class="{{Route::currentRouteName()==='admin.doctors.index' ? 'active' : ''}}" href="{{ route('admin.doctors.index') }}"><i class="fa-solid fa-user-doctor"></i><span class="ms-1"> Profilo</span></a>
        </li>

        @if(Auth::user()->is_admin)
        <li>
            <a class="{{Route::currentRouteName()==='admin.specializations.index' ? 'active' : ''}}" href="{{ route('admin.specializations.index') }}"><i class="fa-solid fa-stethoscope"></i> <span> Specializzazioni</span></a>
        </li>
        @endif

        @if(Auth::user()->is_admin)
        <li>
            <a class="{{Route::currentRouteName()==='admin.offers.index' ? 'active' : ''}}" href="{{ route('admin.offers.index') }}"><i class="fa-solid fa-money-check-dollar"></i> <span> Sponsorizzazioni</span></a>
        </li>
        @endif

        <li>
            <a class="{{Route::currentRouteName()==='admin.messages.index' ? 'active' : ''}}" href="{{ route('admin.messages.index') }}"><i class="fa-solid fa-message"></i> <span> Messaggi</span></a>
        </li>
        <li>
            <a class="{{Route::currentRouteName()==='admin.ratings.index' ? 'active' : ''}}" href="{{ route('admin.ratings.index') }}"><i class="fa-solid fa-star"></i><span> Valutazioni</span></a>
        </li>
        <li>
            <a class="{{Route::currentRouteName()==='admin.reviews.index' ? 'active' : ''}}" href="{{ route('admin.reviews.index') }}"><i class="fa-solid fa-pen-to-square"></i><span> Recensioni</span></a>
        </li>

    </ul>
</aside>
