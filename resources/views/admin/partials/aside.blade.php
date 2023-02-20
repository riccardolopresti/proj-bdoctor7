<aside>
    <ul class="p-0">
        <li class="nav-item">
            <a href="{{ url('admin') }}"><i class="fa-solid fa-table-columns"></i> {{__('Dashboard')}}</a>
        </li>
        <li>
            <a href="{{ route('admin.doctors.index') }}"><i class="fa-solid fa-user-doctor"></i><span class="ms-1"> Profilo</span></a>
        </li>

        @if(Auth::user()->is_admin)
        <li>
            <a href="{{ route('admin.specializations.index') }}"><i class="fa-solid fa-stethoscope"></i> <span> Specializzazioni</span></a>
        </li>
        @endif

        @if(Auth::user()->is_admin)
        <li>
            <a href="{{ route('admin.offers.index') }}"><i class="fa-solid fa-money-check-dollar"></i> <span> Sponsorizzazioni</span></a>
        </li>
        @endif

        <li>
            <a href="{{ route('admin.messages.index') }}"><i class="fa-solid fa-message"></i> <span> Messaggi</span></a>
        </li>
        <li>
            <a href="{{ route('admin.ratings.index') }}"><i class="fa-solid fa-star"></i><span> Valutazioni</span></a>
        </li>
        <li>
            <a href="{{ route('admin.reviews.index') }}"><i class="fa-solid fa-pen-to-square"></i><span> Recensioni</span></a>
        </li>

    </ul>
</aside>
