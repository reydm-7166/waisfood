<div class="overflow-x-auto pt-5">
    <ul class="nav nav-pills mb-3 flex justify-content-between float-end" id="pills-tab" role="tablist">

        <div class="dropdown">
            <a class="dropdown-toggle me-3 btn btn-outline-orange border" href="#" id="pills-tab" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-filter"></i> Filter
            </a>

            <ul class="dropdown-menu me-3">
                <li>
                    <a class="dropdown-item pe-auto cursor-pointer" wire:click="show_admins">
                        Admin
                    </a>
                </li>
                <li>
                    <a class="dropdown-item pe-auto cursor-pointer" wire:click="show_users">
                        Users
                    </a>
                </li>

            </ul>
            </div>
    </ul>
    @if ($users)
        <table class="table my-2 border-0 w-100 position-relative mt-5">
            <thead>
                <tr class="card-body my-2 py-2 shadow-sm fw-bold">
                    <th class="text-orange border-0" colspan="8">Users</th>
                </tr>

                <tr class="card-body my-2 py-2 shadow-sm text-center">
                    <th class="border-0">ID</th>
                    <th class="border-0">Full Name</th>
                    <th class="border-0">Recipes Posted</th>
                    <th class="border-0">Recipes Approved</th>
                    <th class="border-0">Wais Badge</th>
                    <th class="border-0">Actions</th>
                    <th class="border-0"></th>
                </tr>
            </thead>

            <tbody class="draggable">

                @forelse ($all_users as $user)
                <tr class="card-body my-2 py-2 shadow-sm text-center">
                    <td class="border-0 align-middle">{{$user->id}}</td>
                    <td class="border-0 align-middle">{{$user->first_name . " " . $user->last_name}}</td>
                    <td class="border-0 align-middle">{{$user->recipes_posted}}</td>
                    <td class="border-0 align-middle">{{$user->recipes_approved}}</td>
                    <td class="border-0 align-middle">
                        <div class="form-check form-switch d-flex px-0">
                            <input class="form-check-input mx-auto bg-orange border-orange" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        </div>
                    </td>

                    <td class="border-0 align-middle">
                        <a href="javascript:console.log('Under development...');" class="btn btn-sm bg-light-orange text-orange px-3">Edit</a>
                    </td>

                    <td class="border-0 align-middle handle">
                        <i class="fas fa-ellipsis-vertical cursor-grab"></i>
                    </td>
                </tr>
                @empty
                <tr class="card-body my-2 py-2 shadow-sm">
                    <td class="text-center border-0" colspan="8">Nothing to show~</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    @else
    <table class="table my-2 border-0 w-50 position-relative mt-5">
        <thead>
            <tr class="card-body my-2 py-2 shadow-sm fw-bold">
                <th class="text-orange border-0" colspan="8">Admin Requests</th>
            </tr>

            <tr class="card-body my-2 py-2 shadow-sm text-center">
                <th class="border-0">ID</th>
                <th class="border-0">Full Name</th>
                <th class="border-0">Email </th>
                <th class="border-0">Actions</th>
            </tr>
        </thead>
        <tbody class="draggable">

            @forelse ($all_users as $user)
                <tr class="card-body my-2 py-2 shadow-sm text-center">
                    <td class="border-0 align-middle">{{$user->id}}</td>
                    <td class="border-0 align-middle">{{$user->first_name . " " . $user->last_name}}</td>
                    <td class="border-0 align-middle">{{$user->email_address}}</td>
                    <td class="border-0 align-middle">
                        <a wire:click="approve_admin({{ $user->id }})" class="btn btn-sm bg-light-orange text-orange px-3">Approve</a>

                        <a href="javascript:console.log('Under development...');" class="btn btn-sm bg bg-danger text-white px-3">Remove</a>
                    </td>

                </tr>
                @empty
                <tr class="card-body my-2 py-2 shadow-sm">
                    <td class="text-center border-0" colspan="8">Nothing to show~</td>
                </tr>
            @endforelse
        </tbody>


    @endif

    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="updateStudent">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Student Name</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Student Email</label>
                            <input type="text" wire:model="email" class="form-control">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Student Course</label>
                            <input type="text" wire:model="course" class="form-control">
                            @error('course') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
