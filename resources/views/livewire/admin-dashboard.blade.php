<div id="main-livewire" class="rounded">
    {{-- <div wire:loading>
        <div>
            <div style="color: #ef9f64; z-index: 9999; left: 0; top: 0; opacity: 0.75" class="la-ball-pulse-sync la-3x d-flex justify-content-center align-items-center bg bg-dark position-fixed w-100 h-100" >
                <div></div>
                <div></div>
                <div></div>
                <div>Loading... </div>
            </div>
        </div>
    </div> --}}

    <div class="w-100 border mt-2 rounded shadow d-flex align-items-center justify-content-between" id="top-container">
        <div class="ms-3">
            <p class="d-inline-block">Choose Chart Type: </p>
            <div class="d-inline-block">
                <select class="form-select btn-orange-border" wire:model="chartType" id="chartType" aria-label="Default select example">
                    <option value="line">Line</option>
                    <option value="bar">Bar</option>
                    <option value="pie">Pie</option>
                </select>
            </div>

        </div>

        <div class="me-3">
            <p class="d-inline-block">Choose Date Between: </p>
            <div class="d-inline-block">
                <select class="form-select btn-orange-border" wire:model="duration" id="duration" aria-label="Default select example">

                    <option value="-30 days">Last 30 Days</option>
                    <option value="-180 days">Last 6 Months</option>
                    <option value="-365 days">One Year</option>
                </select>
            </div>
            <div wire:model="newKeys" id="newKeys"></div>

        </div>


    </div>
    {{--  --}}

    <div class="border rounded shadow mt-3 w-100" id="recipe-added">


    </div>

    <div class="mt-1 w-100 d-flex justify-content-around p-2 px-4" id="gen-details">
        <div class="me-4 gen-details-elements shadow border w-25 rounded">

        </div>
        <div class="me-4 gen-details-elements shadow border w-25 rounded">

        </div>
        <div class="me-4 gen-details-elements shadow border  w-25 rounded">

        </div>
        <div class="me-4 gen-details-elements shadow border w-25 rounded">

        </div>
    </div>

    <div class="mt-1 w-100 d-flex justify-content-between p-2 px-5" id="total-container">
        <div class="gen-details-elements border shadow  rounded custom-w">

        </div>
        <div class="gen-details-elements border shadow  rounded custom-w">

        </div>
        <div class="gen-details-elements border shadow  rounded custom-w">

        </div>
    </div>


        <script type="text/javascript">

            window.addEventListener('contentChanged', () => {

                let userData = $('#newKeys').val();

                console.log(userData);
                var chartType = $('#chartType').val();
                var duration = $('#duration').val();
                createChart(userData, chartType);
            });


        function createChart(userData, chartType) {
            Highcharts.chart('recipe-added', {
                chart: {
                    type: chartType
                },
                title: {
                    text: 'Recipes Posted'
                },
                subtitle: {
                    text: 'at WaisFood Community'
                },
                xAxis: {
                    categories: Object.keys(userData),
                },
                yAxis: {
                    title: {
                        text: 'Number of New Recipe Post'
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true
                    }
                },
                series: [{
                    name: 'Recipes Posted',
                    data: Object.values(userData)
                }],
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
            });
        }


        </script>


</div>
