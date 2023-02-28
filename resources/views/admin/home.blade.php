@extends('layouts.app')

@section('title')

    | dashboard

@endsection

@section('content')

@dump($dataMm)
@dump($labelsMm)

{{-- @dump($record) --}}

{{-- @foreach($stat_rating as $rating)

    {{$rating->created_at->format('M')}}

@endforeach --}}


<div>
    <canvas id="doc_rating_m" width="240px" height="240px"></canvas>
</div>
<div>
    <canvas id="doc_rating_y" width="240px" height="240px"></canvas>
</div>
<div>
    <canvas id="doc_message_m" width="240px" height="240px"></canvas>
</div>

<script>
    $(function () {

            //VOTI PER MESE
            var ctx = document.getElementById("doc_rating_m").getContext('2d');

            const dataRmJs = <?php echo json_encode($dataRm); ?>;
            const labelsRmJs = <?php echo json_encode($labelsRm); ?>;

            var data = {
                labels: labelsRmJs,
                datasets: [
                    {
                        label: 'data 1',
                        data: dataRmJs,
                        backgroundColor: [
                            '#3c8dbc',
                            '#f56954',
                            '#f39c12',
                        ],
                    }
                ],
            };
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

            //VOTI PER ANNO
            var ctx_2 = document.getElementById("doc_rating_y").getContext('2d');

            const dataRyJs = <?php echo json_encode($dataRy); ?>;
            const labelsRyJs = <?php echo json_encode($labelsRy); ?>;

            var data_2 = {
                datasets: [{
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

            //MESSAGGI PER MESE
            var ctx_3 = document.getElementById("doc_message_m").getContext('2d');

            const dataMmJs = <?php echo json_encode($dataMm); ?>;
            const labelsMmJs = <?php echo json_encode($labelsMm); ?>;

            var data_3 = {
                datasets: [{
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
        });
  </script>
@endsection
