<div id="main-livewire" class="rounded">
    <div class="w-100 border mt-2 rounded shadow" id="top-container">
        <ul class="nav nav-pills my-3 float-end me-4" id="pills-tab" role="tablist">
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

    <div class="border rounded shadow mt-3 w-100" id="recipe-added">
        {!! $mainChart->container() !!}

    </div>

    <div class="border rounded shadow mt-1 w-100 d-flex justify-content-around p-2 px-4" id="gen-details">
        <div class="me-4 gen-details-elements border  w-25 rounded">

        </div>
        <div class="me-4 gen-details-elements border w-25 rounded">

        </div>
        <div class="me-4 gen-details-elements border  w-25 rounded">

        </div>
        <div class="me-4 gen-details-elements border w-25 rounded">

        </div>
    </div>

    <div class="border rounded shadow mt-1 w-100 d-flex justify-content-between p-2 px-5" id="total-container">
        <div class="gen-details-elements border shadow  rounded custom-w">

        </div>
        <div class="gen-details-elements border shadow  rounded custom-w">

        </div>
        <div class="gen-details-elements border shadow  rounded custom-w">

        </div>
    </div>
    {!! $mainChart->script() !!}
</div>
