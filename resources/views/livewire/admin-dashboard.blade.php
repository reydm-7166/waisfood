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

        <ul class="nav nav-pills float-end me-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link btn btn-outline-orange border mx-1 px-3 py-1 active" id="pills-recipe-tab" data-bs-toggle="pill" data-bs-target="#pills-recipe" type="button" role="tab" aria-controls="pills-recipe" aria-selected="true">Last 30 Days</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link btn btn-outline-orange border mx-1 px-3 py-1" id="pills-post-tab" data-bs-toggle="pill" data-bs-target="#pills-post" type="button" role="tab" aria-controls="pills-post" aria-selected="false">Last 6 months</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link btn btn-outline-orange border mx-1 px-3 py-1" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="false">One Year</button>
            </li>
        </ul>
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
        var userData = <?php echo json_encode($newKeys)?>;

        var chartType = $('#chartType').val();
        var duration = '{{ $duration }}';

        console.log(chartType);
        console.log(duration);
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
                    text: 'Number of New Users'
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
    });
    </script>

</div>
