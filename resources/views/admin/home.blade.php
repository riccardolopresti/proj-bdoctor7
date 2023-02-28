@extends('layouts.app')

@section('title')

    | dashboard

@endsection

@section('content')

<div class="main-wrapper-doctors row d-flex justify-content-center ">
    <div class="container" style="padding-bottom: 200px">

        <div class="mt-3">
            @if(!empty($rating))
            <p class="grey">{{$rating}}</p>
            @else

            <h2 class="blue w-100">Le tue valutazioni</h2>
            <div class="d-flex">
                <div class="me-4">
                    <canvas id="doc_rating_m" width="240px" height="240px"></canvas>
                </div>
                <div>
                    <canvas id="doc_rating_y" width="240px" height="240px"></canvas>
                </div>
            </div>

        @endif
        </div>

        <div class="mt-3">
            @if(!empty($message))
                <p class="grey">{{$message}}</p>
            @else
            <h2 class="blue">I tuoi messaggi</h2>
            <div class="d-flex">

                <div class="me-4">
                    <canvas id="doc_message_m" width="240px" height="240px"></canvas>
                </div>
                <div>
                    <canvas id="doc_message_y" width="240px" height="240px"></canvas>
                </div>
            </div>

            @endif
        </div>

        <div class="mt-3">

            @if(!empty($review))
                <p class="grey">{{$review}}</p>
            @else
            <h2 class="blue">Le tue recensioni</h2>
            <div class="d-flex">

                <div class="me-4">
                    <canvas id="doc_review_m" width="240px" height="240px"></canvas>
                </div>
                <div>
                    <canvas id="doc_review_y" width="240px" height="240px"></canvas>
                </div>
            </div>

            @endif
        </div>

    </div>
</div>


<script>
    $(function () {

            const MONTHS = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ];

            //VOTI PER MESE

            const dataRmJs = <?php echo json_encode($dataRm); ?>;
            const labelsRmJs = <?php echo json_encode($labelsRm); ?>;
            console.log(dataRmJs, labelsRmJs);

            if(labelsRmJs.length>0 || dataRmJs.length>0){
                var ctx = document.getElementById("doc_rating_m").getContext('2d');
                var data = {
                labels: labelsRmJs,
                datasets: [
                    {
                        label: 'Valutazioni / Mese',
                        data: dataRmJs,
                        backgroundColor: [
                            '#3c8dbc',
                            '#f56954',
                            '#f39c12',
                        ],
                    }
                ],
                }
                var ratingMonth = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12
                        }
                    }

                }
                });

            }

            //VOTI PER ANNO

            const dataRyJs = <?php echo json_encode($dataRy); ?>;
            const labelsRyJs = <?php echo json_encode($labelsRy); ?>;

            if(dataRyJs.length>0 ||  labelsRyJs.length>0){
                var ctx_2 = document.getElementById("doc_rating_y").getContext('2d');
                var data_2 = {
                    datasets: [{
                        label: 'Valutazioni / Anno',
                        data: dataRyJs,
                        backgroundColor: [
                            '#3c8dbc',
                            '#f56954',
                            '#f39c12',
                        ],
                    }],
                    labels: labelsRyJs,
                };
                var ratingYear = new Chart(ctx_2, {
                    type: 'bar',
                    data: data_2,
                    options: {
                        responsive: false,
                        maintainAspectRatio: false,
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12
                            }
                        }
                    }
                });
            }

            //MESSAGGI PER MESE

            const dataMmJs = <?php echo json_encode($dataMm); ?>;
            const labelsMmJs = <?php echo json_encode($labelsMm); ?>;


            if(dataMmJs.length>0 ||  labelsMmJs.length>0){
                var ctx_3 = document.getElementById("doc_message_m").getContext('2d');
                var data_3 = {
                    datasets: [{
                        label: 'Messaggi / Mese',
                        data: dataMmJs,
                        backgroundColor: [
                            '#3c8dbc',
                            '#f56954',
                            '#f39c12',
                        ],
                    }],
                    labels: labelsMmJs,
                };
                var messageMonth = new Chart(ctx_3, {
                    type: 'line',
                    data: data_3,
                    options: {
                        responsive: false,
                        maintainAspectRatio: false,
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12
                            }
                        }
                    }
                });
            }


            //MESSAGGI PER ANNO

            const dataMyJs = <?php echo json_encode($dataMy); ?>;
            const labelsMyJs = <?php echo json_encode($labelsMy); ?>;

            if(dataMyJs.length>0 ||  labelsMyJs.length>0){
                var ctx_4 = document.getElementById("doc_message_y").getContext('2d');
                var data_4 = {
                    datasets: [{
                        label: 'Messaggi / Anno',
                        data: dataMyJs,
                        backgroundColor: [
                            '#3c8dbc',
                            '#f56954',
                            '#f39c12',
                        ],
                    }],
                    labels: labelsMyJs,
                };
                var messageYear = new Chart(ctx_4, {
                    type: 'line',
                    data: data_4,
                    options: {
                        responsive: false,
                        maintainAspectRatio: false,
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12
                            }
                        }
                    }
                });
            }

            //RECENSIONI PER MESE

            const dataRwMJs = <?php echo json_encode($dataRwM); ?>;
            const labelsRwMJs = <?php echo json_encode($labelsRwM); ?>;

            if(dataRwMJs.length>0 ||  labelsRwMJs.length>0){

                var ctx_5 = document.getElementById("doc_review_m").getContext('2d');
                var data_5 = {
                    datasets: [{
                        label: 'Recensioni / Mese',
                        data: dataRwMJs,
                        backgroundColor: [
                            '#3c8dbc',
                            '#f56954',
                            '#f39c12',
                        ],
                    }],
                    labels: labelsRwMJs,
                };
                var reviewMonth = new Chart(ctx_5, {
                    type: 'line',
                    data: data_5,
                    options: {
                        responsive: false,
                        maintainAspectRatio: false,
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12
                            }
                        }
                    }
                });
            }

            //RECENSIONI PER ANNO

            const dataRwYJs = <?php echo json_encode($dataRwY); ?>;
            const labelsRwYJs = <?php echo json_encode($labelsRwY); ?>;

            if(dataRwMJs.length>0 ||  labelsRwMJs.length>0){
                var ctx_6 = document.getElementById("doc_review_y").getContext('2d');
                var data_6 = {
                    datasets: [{
                        label: 'Recensioni / Anno',
                        data: dataRwYJs,
                        backgroundColor: [
                            '#3c8dbc',
                            '#f56954',
                            '#f39c12',
                        ],
                    }],
                    labels: labelsRwYJs,
                };
                var reviewYear = new Chart(ctx_6, {
                    type: 'line',
                    data: data_6,
                    options: {
                        responsive: false,
                        maintainAspectRatio: false,
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12
                            }
                        }
                    }
                });
            }
    });

  </script>
@endsection
