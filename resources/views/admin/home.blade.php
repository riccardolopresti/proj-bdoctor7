@extends('layouts.app')

@section('title')

    | Dashboard

@endsection

@section('content')

<div class="main-wrapper-doctors row d-flex justify-content-center" style="margin-bottom:40px">
    <div class="d-flex justify-content-between">
        <h1 class="dark-blue">Le tue statistiche</h1>
        <div class="">
            <label class="switch-wrap position-relative">
                <div class="legenda position-absolute w-100 d-flex justify-content-between">
                    <span>MESE</span>
                    <span>ANNO</span>
                </div>
                <input type="checkbox" id="toggle"/>
                <div class="switch"></div>
            </label>
        </div>
    </div>

    <div class="container-fluid" style="padding-bottom: 200px">

        <div class="mt-3 my-ratings">
            @if(!empty($rating))
            <p class="grey">{{$rating}}</p>
            @else

            <div class="d-flex justify-content-evenly">
                <h3 class="w-100 dark-blue">Valutazioni</h3>

            </div>

            <div class="d-flex">
                <div class="monthly chart-container position-relative w-100 p-1 me-2">
                    <canvas id="doc_rating_m" class="ratings-canvas"></canvas>
                </div>
                <div class="yearly d-none chart-container position-relative w-100 p-1 me-2" >
                    <canvas id="doc_rating_y" class="ratings-canvas"></canvas>
                </div>
            </div>

            @endif
        </div>

        <div class="mt-3 my-msgs">
            @if(!empty($message))
                <p class="grey">{{$message}}</p>
            @else
            <h3 class="w-100 dark-blue">Messaggi</h3>
            <div class="d-flex">

                <div class="monthly chart-container position-relative w-100 p-1">
                    <canvas id="doc_message_m" class="msgs-canvas"></canvas>
                </div>
                <div class="yearly d-none chart-container position-relative w-100 p-1">
                    <canvas id="doc_message_y" class="msgs-canvas"></canvas>
                </div>
            </div>

            @endif
        </div>

        <div class="mt-2 my-reviews">

            @if(!empty($review))
                <p class="grey">{{$review}}</p>
            @else
            <h3 class="w-100 dark-blue">Recensioni</h3>
            <div class="d-flex">

                <div class="monthly chart-container position-relative w-100 p-1 ">
                    <canvas id="doc_review_m" class="reviews-canvas"></canvas>
                </div>
                <div class="yearly d-none chart-container position-relative w-100 p-1">
                    <canvas id="doc_review_y" class="reviews-canvas"></canvas>
                </div>
            </div>

            @endif
        </div>





    </div>
</div>
<style>

    .main-wrapper-doctors{
        overflow-x:auto;
    }

    .dark-blue{
        color:#061761;
    }

    .switch-wrap {
    cursor: pointer;
        background: #061761;
        padding: 5px;
        width: 100px;
            height: calc(100px /2 + 5px);
            border-radius: calc((100px /2 + 5px) / 2);
            }

            input {
                position: absolute;
                opacity: 0;
                width: 0;
                height: 0;
            }

            .switch {
            height: 100%;
            display: grid;
            grid-template-columns: 0fr 1fr 1fr;
            transition: .2s;
            }
            .switch::after {
                content: '';
                border-radius: 50%;
                background: #ccc;
                grid-column: 2;
            }

            input:checked + .switch {
                grid-template-columns: 1fr 1fr 0fr;}
             input:checked + .switch::after {
                background-color: #dd5f24;

            }

            .legenda{
                color:#061761;
                padding:0 8px;
                font-size:0.7rem;
                bottom:-25px;
            }




</style>


<script>
        const checkbox = document.getElementById('toggle');
        const monthlyData=document.querySelectorAll('.monthly');
        const yearlyData=document.querySelectorAll('.yearly');
        let monthStat=false;

        checkbox.addEventListener('change', ()=>{
            monthStat = !monthStat

            if(monthStat){
                monthlyData.forEach(element => {
                    element.classList.add('d-none');
                });
                yearlyData.forEach(element => {
                    element.classList.remove('d-none');
                    element.classList.add('d-block');
                });

            }else{
                yearlyData.forEach(element => {
                    element.classList.add('d-none');
                });
                monthlyData.forEach(element => {
                    element.classList.remove('d-none');
                    element.classList.add('d-block');
                });
            }
        })

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



                function checkMonthData(labels, data){
                    for(let i=1;i<=12;i++){
                        if(!labels.includes(i)){
                            labels.splice(i-1,0, i);
                            data.splice(i-1,0, 0);

                        }
                    }
                    return data
                }

                //VOTI PER MESE

                const dataRmJs = <?php echo json_encode($dataRm); ?>;
                const labelsRmJs = <?php echo json_encode($labelsRm); ?>;

                if(labelsRmJs.length>0 || dataRmJs.length>0){
                    var ctx = document.getElementById("doc_rating_m").getContext('2d');
                    var data = {
                    labels: MONTHS,
                    datasets: [
                        {
                            label: 'Valutazioni / Mese',
                            data: checkMonthData(labelsRmJs,dataRmJs),
                            backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(255, 99, 132)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                        }
                    ],
                    }
                    var ratingMonth = new Chart(ctx, {
                    type: 'bar',
                    data: data,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        resizeDelay: 0,
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
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(255, 99, 132)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                        }],
                        labels: labelsRyJs,
                    };
                    var ratingYear = new Chart(ctx_2, {
                        type: 'bar',
                        data: data_2,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            resizeDelay: 0,
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
                            data: checkMonthData(labelsMmJs,dataMmJs),
                            backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(255, 99, 132)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                        }],
                        labels: MONTHS,
                    };
                    var messageMonth = new Chart(ctx_3, {
                        type: 'line',
                        data: data_3,
                        options: {
                            responsive: true,
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
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(255, 99, 132)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                        }],
                        labels: labelsMyJs,
                    };
                    var messageYear = new Chart(ctx_4, {
                        type: 'line',
                        data: data_4,
                        options: {
                            responsive: true,
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
                            data: checkMonthData(labelsRwMJs,dataRwMJs),
                            backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(255, 99, 132)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                        }],
                        labels: MONTHS,
                    };
                    var reviewMonth = new Chart(ctx_5, {
                        type: 'line',
                        data: data_5,
                        options: {
                            responsive: true,
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
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(255, 99, 132)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                        }],
                        labels: labelsRwYJs,
                    };
                    var reviewYear = new Chart(ctx_6, {
                        type: 'line',
                        data: data_6,
                        options: {
                            responsive: true,
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
