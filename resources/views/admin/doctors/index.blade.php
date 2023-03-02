@extends('layouts.app')

@section('title')
 | Profilo
@endsection

@section('content')

    <div class="container-fluid">
        @if (session('message'))
        <div class="alert alert-success w-50 text-center" role="alert">
            {{ session('message') }}
        </div>
    @endif

        <div class="main-wrapper-doctors row d-flex justify-content-center ">

            <div class="col-12 d-flex justify-content-between buttons mb-3">
                <h1 class="dark-blue">Il tuo profilo</h1>
                <div class="d-flex">
                    <a href="{{ route('admin.doctors.edit', $doctor) }}" class="bn632-hover bn26 me-2 edit-profile"><i
                    class="fa-solid fa-pen-to-square"></i>&nbsp;Modifica profilo</a>
            <a href="{{ route('admin.messages.index') }}" class="bn632-hover bn26 me-2 d-none d-md-flex"><i
                    class="fa-solid fa-envelope"></i>&nbsp;Messaggi</a>
            <a href="{{ route('admin.offers.index') }}" class="bn632-hover bn26 me-2 d-none d-md-flex"><i
                    class="fa-solid fa-award"></i>&nbsp;Promo</a>
        </div>


            </div>

            <div class="col-lg-7 col-12 left row">

                <div class="col-sm-5 col-12 profile-photo p-0">
                    @if (str_contains($doctor->image, 'http'))
                        <img src="{{ $doctor->image }}" class="card-img-top" alt="{{ $doctor->slug }}"
                            title="Anteprima dottore">
                    @else
                        <img src="{{ asset('storage/' . $doctor->image) }}" class="card-img-top"
                            alt="{{ $doctor->image_original_name }}" title="Anteprima dottore">
                    @endif
                </div>
                <div class="col-sm-7 details col-12">
                    <h4 class="text blue mt-2">{{ $user->name }} {{ $doctor->surname }}</h4>
                    <h6 class="profile-section mt-3">
                        Specializzazioni: </h6>
                    <ul class="list-unstyled list-inline mb-3">
                        @foreach ($doctor->specs as $spec)
                            <li class="my-2 d-inline me-2 mt-4"><span class="badge spec-badge">{{ $spec->type }}</span>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <div class="contacts col-12">
                    <p class="mx-0 mt-3">
                        <i class="fa-solid blue fa-location-dot"></i></i>&nbsp; {{ $doctor->address }}
                    </p>

                    <p class="mt-2"><i class="fa-solid blue fa-phone"></i>&nbsp;
                        @if ($doctor->phone)
                            {{ $doctor->phone }}
                        @else
                            <span class="grey">Nessun telefono inserito</span>
                        @endif
                    </p>

                </div>
                <div class="col-12 doctor-services d-flex align-items-end mt-3">
                    <div class="bordered-container w-100">

                        <h6 class="light-blue"><i class="fa-solid fa-notes-medical"></i> Prestazioni Erogate:</h6>

                        @if ($doctor->health_care)
                            {!! $doctor->health_care !!}
                        @else
                            <span class="grey">Nessun servizio inserito</span>
                        @endif
                    </div>

                </div>
            </div>

            <div class="col-lg-5 col-12 right d-flex flex-column justify-content-end align-items-end row">
                <div class="sections-blue mt-4 col-12">
                    <div class="section-blue ratings-section">
                        <a href="{{ route('admin.ratings.index') }}" class="text-decoration-none text-white">
                            <h6>Valutazioni</h6>

                            <div class="bg-container">
                                @if ($doc_ratings)
                                    <span class="ratings-container"></span>
                                @else
                                    <span class="grey">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>&nbsp; <br>
                                        Non hai ancora ricevuto valutazioni</span>
                                @endif
                            </div>
                        </a>
                    </div>
                    <div class="section-blue mt-3">

                        <h6>Recensioni</h6>
                        <div class="bg-container mt-3 position-relative">

                            <div class="text-container">
                                <span class="doc_reviews">
                                    @if (count($doc_reviews) == 0)
                                        <span class="grey">Non hai ancora ricevuto recensioni</span>
                                    @else
                                        <section class="slider-wrapper">
                                            <button class="slide-arrow d-flex align-items-center" id="slide-arrow-prev">
                                                <i class="fa-solid blue fa-chevron-left"></i>
                                            </button>

                                            <button class="slide-arrow d-flex align-items-center" id="slide-arrow-next">
                                                <i class="fa-solid blue fa-chevron-right"></i>
                                            </button>

                                            <ul class="slides-container" id="slides-container">
                                                @foreach ($doc_reviews as $doc_review)
                                                    <li class="slide">
                                                        <div
                                                            class="name-and-time d-flex justify-content-between mb-3 flex-wrap">
                                                            <h6>{{ $doc_review->name }}</h6>
                                                            <div class="time"></div>
                                                        </div>
                                                        <p class="review-content">{{ $doc_review->text }}</p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </section>
                                    @endif
                                </span>
                            </div>

                        </div>
                    </div>
                </div>


            </div>


        </div>


@endsection
@push('body-scripts')
    @once
        <script>
            function starsRating(number) {
                let newRating = (Math.ceil(number * 2) / 2);
                let stars = [];
                const diff = 5 - newRating;
                console.log(newRating, diff);
                for (let i = newRating; i >= 1; i--) {
                    stars.push(`<i class="fa-solid fa-star" style="color:gold;"></i>`);

                };
                if (diff % 1) {
                    stars.push(`<i class="fa-solid fa-star-half-stroke" style="color:gold;"></i>`);
                }
                for (let j = (5 - newRating); j >= 1; j--) {
                    stars.push(`<i class="fa-regular fa-star" style="color:gold"></i>`);
                }
                return stars.join('');

            }

            const data = "<?php echo $doc_ratings; ?>";
            const reviewContainer = document.querySelector('.ratings-container')
            $(document).ready(function() {
                reviewContainer.innerHTML = starsRating(data);
            });

            const slidesContainer = document.getElementById("slides-container");
            const slide = document.querySelector(".slide");
            const prevButton = document.getElementById("slide-arrow-prev");
            const nextButton = document.getElementById("slide-arrow-next");
            nextButton.addEventListener("click", () => {
                const slideWidth = slide.clientWidth;
                slidesContainer.scrollLeft += slideWidth;
            });
            prevButton.addEventListener("click", () => {
                const slideWidth = slide.clientWidth;
                slidesContainer.scrollLeft -= slideWidth;
            });

            function changeDateFormat(date) {
                let new_date = date.substring(0, 10).split("-").reverse().slice().join("/");
                return new_date
            }

            const docReviews = <?php echo json_encode($doc_reviews); ?>

            for (let i = 0; i < docReviews.length; i++) {
                let putDates = document.querySelectorAll('.time')
                putDates[i].innerHTML = changeDateFormat(docReviews[i]['created_at'])
            }
        </script>
    @endonce
@endpush
