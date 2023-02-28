@extends('layouts.app')

@section('title')

    | dashboard

@endsection

@section('content')

@dump($dataRy)
@dump($labelsRy)

{{-- @dump($record) --}}

{{-- @foreach($stat_rating as $rating)

    {{$rating->created_at->format('M')}}

@endforeach --}}


<div>
    <canvas id="doc_rating" width="240px" height="240px"></canvas>
 </div>
 <div>
    <canvas id="layanan_subbagian" width="240px" height="240px"></canvas>
 </div>

<script>
    $(function () {
            var ctx = document.getElementById("doc_rating").getContext('2d');

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
            var myDoughnutChart = new Chart(ctx, {
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

            var ctx_2 = document.getElementById("layanan_subbagian").getContext('2d');

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
            var myDoughnutChart_2 = new Chart(ctx_2, {
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
        });
  </script>
@endsection
