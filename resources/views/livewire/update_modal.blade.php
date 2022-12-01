
  <!-- Modal -->
  <div class="modal fade" wire:ignore.self id="updateReviewModal" tabindex="-1" aria-labelledby="updateReviewModal"
    aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-2">
                <div class="modal-header">
                    <h5 class="modal-title font fw-bold" id="updateReviewModal">Edit Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close" wire:click="reset_edit_form" id="close_modal"></button>
                </div>

                <div class="modal-body">
                    <form wire:submit.prevent="edit_submit" method="post">
                        <div class="rating-css">
                            <div class="star-icon">
                                <input type="radio" wire:model="edited_rate" value="1" name="product_rating" id="edited_rating1">
                                <label for="edited_rating1" class="fa fa-star"></label>
                                <input type="radio" wire:model="edited_rate" value="2" name="product_rating" id="edited_rating2">
                                <label for="edited_rating2" class="fa fa-star"></label>
                                <input type="radio" wire:model="edited_rate" value="3" name="product_rating" id="edited_rating3">
                                <label for="edited_rating3" class="fa fa-star"></label>
                                <input type="radio" wire:model="edited_rate" value="4" name="product_rating" id="edited_rating4">
                                <label for="edited_rating4" class="fa fa-star"></label>
                                <input type="radio" wire:model="edited_rate" value="5" name="product_rating" checked id="edited_rating5">
                                <label for="edited_rating5" class="fa fa-star"></label>

                                <p class="font text-dark d-inline-block ms-2" id="rating_title">{{$edited_rate}}/5 Rating</p>
                            </div>
                            </div>
                            {{-- THIS IF FOR THE REVIEW MESSAGE --}}
                            <div id="review_message" class="">
                                <label for="floatingTextarea" id="message_label" class="font fw-bold" id="title">Review</label>
                                <textarea class="form-control font" placeholder="Leave a comment here" id="floatingTextarea" wire:model="edited_message" id="title" oninput="this.style.height = ''; this.style.height = this.scrollHeight +'px'"></textarea>
                                @error('edited_message')<small class="text d-block text-danger font">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" wire:click="reset_edit_form" id="submit" data-bs-dismiss="modal">Close</button>
                            
                            <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" id="submit" data-bs-dismiss="modal" value="Submit Changes"></input>
                        </div>
                    </form>
        </div>
    </div>
</div>
  