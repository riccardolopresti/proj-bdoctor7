@extends('layouts.app')

@section('title')

    | dashboard

@endsection

@section('content')

@dump($data)
@dump($labels)
@dump($month)
@dump($record)

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
            
            const dataJs = <?php echo json_encode($data); ?>;
            const labelsJs = <?php echo json_encode($labels); ?>;
            const montJs = <?php echo json_encode($month); ?>;

            console.log(dataJs);
            var data = {
                labels: labelsJs,
                datasets: [
                    {
                        label: 'data 1',
                        data: dataJs,
                        backgroundColor: [
                            '#3c8dbc',
                            '#f56954',
                            '#f39c12',
                        ],
                        xAxisID: 'x',

                    },
                    {
                        label: 'data 2',
                        data: montJs,
                        backgroundColor: [
                            '#3c3dbc',
                            '#f86954',
                            '#f30c12',
                        ],
                        xAxisID: 'x1',
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
            var data_2 = {
                datasets: [{
                    data: [10, 20, 30],
                    backgroundColor: [
                        '#3c8dbc',
                        '#f56954',
                        '#f39c12',
                    ],
                }],
                labels: [
                    'Request',
                    'Layanan',
                    'Problem'
                ]
            };
            var myDoughnutChart_2 = new Chart(ctx_2, {
                type: 'pie',
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
