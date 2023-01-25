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

    <div class="w-100 mt-2 rounded shadow d-flex align-items-center justify-content-between" id="top-container">
        <div class="ms-3">
            <p class="d-inline-block">Choose Chart Type: </p>
            <div class="d-inline-block">
                <select class="form-select btn-orange-border" wire:model="chartType" id="chartType" aria-label="Default select example">
                    <option value="bar">Bar</option>
                    <option value="line">Line</option>
                    <option value="area">Area</option>
                </select>
            </div>

        </div>

        <div class="me-3">
            <p class="d-inline-block">Choose Date Between: </p>
            <div class="d-inline-block">
                <select class="form-select btn-orange-border" wire:model="duration" id="duration" aria-label="Default select example">

                    <option value="-30 days">Last 30 Days</option>
                    <option value="-180 days">Last 6 Months</option>
                    <option value="-365 days">Last Year</option>
                </select>
            </div>

            {{-- <div class="d-block w-100 h-50 border border-primary">

            </div> --}}

            {{--  --}}

        </div>


    </div>



    {{-- this is the chart --}}

    <div class="rounded shadow mt-3" id="recipe-added">
        <div wire:model="recipePosted" id="recipePosted"></div>
    </div>
    <div class="rounded shadow mt-3 float-end" id="recipe-added-approved">
        <div wire:model="recipeApproved" id="recipeApproved"></div>
    </div>

        {{-- this is the data (written data) --}}
    <div class="mt-1 w-100 d-flex justify-content-between py-2" id="gen-details">
        <div class="gen-details-elements shadow border w-25 rounded p-3">
            <div id="top" class="w-100 h-75 d-flex justify-content-between">
                <div class="w-50 text-start">
                    <p class="ms-4 mt-4"><i class="fa-solid fa-users icon-size-color"></i></p>
                </div>
                <div class="w-50 text-end pt-3">
                    <p class="me-3 fs-5">Users</p>
                    <p class="me-3 fs-3" wire:model="userCount">{{ $userCount }}</p>
                </div>
            </div>
            <div id="bottom" class="mt-1 w-100 h-25 border-top border-dark pt-2">
                <p class="d-inline-block ms-4 fs-5"><i class="fa-solid fa-user-plus"></i></p>
                <small class="d-inline-block fst-italic align-top mt-1 ms-1 small-details">Users registered in the last
                    @if ($duration == '-30 days')
                        30 days
                    @elseif($duration == '-180 days')
                        180 days
                    @else
                        365 days
                    @endif
                </small>
            </div>
        </div>

        <div class="mx-1 gen-details-elements shadow border w-25 rounded p-3">
            <div id="top" class="w-100 h-75 d-flex justify-content-between">
                <div class="w-50 text-start">
                    <p class="ms-4 mt-4"><i class="fa-solid fa-magnifying-glass icon-size-color"></i></p>
                </div>
                <div class="w-50 text-end pt-3">
                    <p class="me-3 fs-5">Post Reviewed</p>
                    <p class="me-3 fs-3" wire:model="postReviewedCount">{{ $postReviewedCount }}</p>
                </div>
            </div>
            <div id="bottom" class="mt-1 w-100 h-25 border-top border-dark pt-2">
                <p class="d-inline-block ms-4 fs-5"><i class="fa-solid fa-user-plus"></i></p>
                <small class="d-inline-block fst-italic align-top mt-1 ms-1 small-details" >Post Reviewed in the last
                    @if ($duration == '-30 days')
                        30 days
                    @elseif($duration == '-180 days')
                        180 days
                    @else
                        365 days
                    @endif
                </small>
            </div>
        </div>

        <div class="mx-1 gen-details-elements shadow border w-25 rounded p-3">
            <div id="top" class="w-100 h-75 d-flex justify-content-between">
                <div class="w-50 text-start">
                    <p class="ms-4 mt-4"><i class="fa-solid fa-paper-plane icon-size-color"></i></p>
                </div>
                <div class="w-50 text-end pt-3">
                    <p class="me-3 fs-5">Email Sent</p>
                    <p class="me-3 fs-3" wire:model="postEmailedCount">{{ $postEmailedCount }}</p>
                </div>
            </div>
            <div id="bottom" class="mt-1 w-100 h-25 border-top border-dark pt-2">
                <p class="d-inline-block ms-4 fs-5"><i class="fa-solid fa-user-plus"></i></p>
                <small class="d-inline-block fst-italic align-top mt-1 ms-1 small-details" >Emails sent in the last
                    @if ($duration == '-30 days')
                        30 days
                    @elseif($duration == '-180 days')
                        180 days
                    @else
                        365 days
                    @endif
                </small>
            </div>
        </div>

        <div class="gen-details-elements shadow border w-25 rounded p-3">
            <div id="top" class="w-100 h-75 d-flex justify-content-between">
                <div class="w-50 text-start">
                    <p class="ms-4 mt-4"><i class="fa-solid fa-trash-can icon-size-color text-danger"></i></p>
                </div>
                <div class="w-50 text-end pt-3">
                    <p class="me-3 fs-5">Post Deleted</p>
                    <p class="me-3 fs-3" wire:model="postJunkedCount">{{ $postJunkedCount }}</p>
                </div>
            </div>
            <div id="bottom" class="mt-1 w-100 h-25 border-top border-dark pt-2">
                <p class="d-inline-block ms-4 fs-5"><i class="fa-solid fa-user-plus"></i></p>
                <small class="d-inline-block fst-italic align-top mt-1 ms-1 small-details" >Post trashed in the last
                    @if ($duration == '-30 days')
                        30 days
                    @elseif($duration == '-180 days')
                        180 days
                    @else
                        365 days
                    @endif
                </small>
            </div>
        </div>
    </div>

        {{-- this is the chart below --}}
    <div class="mt-1 w-100 d-flex justify-content-between p-2 px-5" id="total-container">
        <div class="gen-details-elements border shadow rounded custom-w">
            <div wire:model="commentCount" id="commentCount"></div>
        </div>
        <div class="gen-details-elements border shadow rounded custom-w">
            <div wire:model="reviewCount" id="reviewCount"></div>
        </div>
        <div class="gen-details-elements border shadow rounded custom-w">
            <div wire:model="voteCount" id="voteCount"></div>
        </div>
    </div>


        <script type="text/javascript">

                setTimeout(() => {
                    window.livewire.emit('init')
                }, 100);

            window.addEventListener('contentChanged', () => {
                //save the data
                let recipePostedData = $('#recipePosted').val();
                let recipeApprovedData = $('#recipeApproved').val();
                let commentData = $('#commentCount').val();
                let reviewData = $('#reviewCount').val();

                var chartType = $('#chartType').val();
                var duration = $('#duration').val();

                //calls the chart to create it
                recipePosted(recipePostedData, chartType);
                recipeApproved(recipeApprovedData, chartType);
                comments(commentData, chartType);
                reviews(reviewData, chartType);
                votes(recipeApprovedData, chartType);
            });


            function recipePosted(recipePostedData, chartType) {
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
                        categories: Object.keys(recipePostedData),
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
                        data: Object.values(recipePostedData)
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
            function recipeApproved(recipeApprovedData, chartType) {
                Highcharts.chart('recipe-added-approved', {
                    chart: {
                        type: chartType
                    },
                    title: {
                        text: 'Recipes Added'
                    },
                    subtitle: {
                        text: 'at WaisFood'
                    },
                    xAxis: {
                        categories: Object.keys(recipeApprovedData),
                    },
                    yAxis: {
                        title: {
                            text: 'Number of New Recipes Added'
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
                        name: 'Recipes Added',
                        data: Object.values(recipeApprovedData)
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

            function comments(commentData, chartType) {
                Highcharts.chart('commentCount', {
                    chart: {
                        type: chartType
                    },
                    title: {
                        text: 'Comments'
                    },
                    subtitle: {
                        text: 'at WaisFood Community'
                    },
                    xAxis: {
                        categories: Object.keys(commentData),
                    },
                    yAxis: {
                        title: {
                            text: 'Number of Comments Added'
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
                        name: 'Comments Added',
                        data: Object.values(commentData)
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
            function reviews(reviewData, chartType) {
                Highcharts.chart('reviewCount', {
                    chart: {
                        type: chartType
                    },
                    title: {
                        text: 'Reviews'
                    },
                    subtitle: {
                        text: 'at WaisFood Recipes'
                    },
                    xAxis: {
                        categories: Object.keys(reviewData),
                    },
                    yAxis: {
                        title: {
                            text: 'Number of New Recipes Published'
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
                        name: 'Reviews Published',
                        data: Object.values(reviewData)
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
            function votes(voteData, chartType) {
                Highcharts.chart('voteCount', {
                    chart: {
                        type: chartType
                    },
                    title: {
                        text: 'Votes'
                    },
                    subtitle: {
                        text: 'at WaisFood Community'
                    },
                    xAxis: {
                        categories: Object.keys(voteData),
                    },
                    yAxis: {
                        title: {
                            text: 'Number of New Votes Accumulated'
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
                        name: 'Votes Accumulated',
                        data: Object.values(voteData)
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
