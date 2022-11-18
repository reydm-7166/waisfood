<div id="recipe_container" class="h-100 container-fluid mt-3">

    <div id="recipe_name" class="w-100 p-3 mb-2 mt-2 text-center d-block">
        <h1 class="font fw-bolder font-and-color">{{$result[0]->dish_name}}</h1>
    </div>

    <div id="recipe_details_container" class=" p-2 mb-3">
        <img src="{{asset('img/adobo.jpg')}}" alt="">

        <div id="recipe_details">
            <p id="posted_by" class="d-inline-block p-1 border border-0 mt-2 rounded font text-muted">Posted by: Admin</p>
            <p id="comment_count" class="d-inline-block text-secondary fst-italic fw-bold p-1">5 Reviews</p><br>
            
            <h2 class="d-inline-block mt-2 fs-3 fw-bolder font-and-color text-dark">{{$result[0]->dish_name}}</h2>
            <h2 id="rating" class="d-inline-block mt-2 float-end pt-2 fs-6 font">Ratings: (4.9) star</h2>
            
            <p class="d- mt-3">Ingredients:</p>
            <p>yoyo</p>

            <p class="d-block mt-3">Directions</p>

            <p id="directions_details" class="mt-2"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus consequatur necessitatibus labore laudantium nostrum, atque quos blanditiis a placeat sit non nam suscipit hic nisi quidem impedit ea ipsum repellendus?Saepe amet quaerat unde quam eveniet laborum voluptate vitae ipsa eum impedit sed suscipit, explicabo labore itaque ipsam error beatae sit perferendis nemo praesentium ratione. Debitis asperiores ipsam sit optio.</p>
           
            <p id="tags" class="mt-2">Tags: Hapunan, Bobo ka</p>
        </div>

    </div>

    <div id="add_recipe" class="float-end mt-2">
        <p>NO</p>
        <p>MORE</p>
        <p>FOOD</p>
        <p>WASTE</p>

        <div id="add_recipe_bottom" class="">
            <p class="">You have your own recipe you want to share with our community?</p>
            <button class="btn btn-transparent text-light border border-light rounded-2 m-3 ms-5 font">Submit Recipe</button>
        </div>
    </div>

    <div id="reviews_container" class=" w-100">
        <h2 class=" mt-2">5 Reviews</h2>

        <div id="review_details" class="mt-2">
            <img src="" alt="" class="border rounded-circle border-primary d-inline-block">
            <div id="review_content" class="d-inline-block  align-top">
                <p id="review_name" class="d-inline-block align-top">Kevin</p>
                <p id="review_comment" class="mt-2 mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa praesentium at unde doloremque et illo obcaecati labore, ipsum voluptatum. Quia dicta voluptate rem tempora. Dolorem laudantium quidem a placeat autem.Quisquam consectetur sequi molestias impedit velit. Officia, praesentium soluta ea quibusdam est delectus animi, quia corrupti mollitia quod et? Blanditiis aspernatur quas nobis perferendis vel at aliquid officia voluptatum error.</p>
            </div>
        </div>
        <div id="review_details" class="mt-2">
            <img src="" alt="" class="border rounded-circle border-primary d-inline-block">
            <div id="review_content" class="d-inline-block  align-top">
                <p id="review_name" class="d-inline-block align-top">Kevin</p>
                <p id="review_comment" class="mt-2 mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa praesentium at unde doloremque et illo obcaecati labore, ipsum voluptatum. Quia dicta voluptate rem tempora. Dolorem laudantium quidem a placeat autem.Quisquam consectetur sequi molestias impedit velit. Officia, praesentium soluta ea quibusdam est delectus animi, quia corrupti mollitia quod et? Blanditiis aspernatur quas nobis perferendis vel at aliquid officia voluptatum error.</p>
            </div>
        </div>
    </div>
</div>