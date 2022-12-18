        <!-- sign up -->
        @if(Session::has('success'))
            <div id="success" class="alert alert-success p-3 border rounded">
                <p class="font fs-4 text-success d-inline-block">{{  Session::get('success') }}</p>
                <img src="img/success.png" width="30px" height="30px" alt="">
            </div>
        @endif
    

        <div class="w-[100%] h-[100vh] flex justify-center items-center">
           
            <form class="p-[20px] flex flex-col justify-center items-center" action="{{ route('register.store') }}" method="POST">
                <div class="s-logo">
                    <img class="w-[200px] ml-[-15px]" src="\assets\Yellow and Green Banana Fruit Food Logo (1).png" alt="Wais logo">
                </div>
                <div class="s-title font-bold text-[38px] mt-[-15px]">Create new Account</div>
                <div class="s-sub mt-[18px] mb-[15px]">Already Registered? <a href="/">Login</a></div>
                    @csrf

                    <div id="first_name" class="w-75">
                        <label for="" class="font">First Name</label>
                        <input type="text" name="first_name" required value="{{ old('first_name') }}" class="w-100 mt-2 form-control p-2 ps-3 shadow font{{($errors->first('first_name') ? " form-error" : "")}}" placeholder="ex. John">
                        @if($errors->first('first_name'))
                            <small class="form-text d-block text-danger fw-bold">{{ $errors->first('first_name') }}</small>
                        @endif
                    </div>

                    <div id="last_name" class="w-75">
                        <label for="" class="font">Last Name</label>
                        <input type="text" name="last_name" required value="{{ old('last_name') }}"class="w-100 mt-2 form-control p-2 ps-3 shadow font{{($errors->first('last_name') ? " form-error" : "")}}" placeholder="ex. Doe">
                        @if($errors->first('last_name'))
                            <small class="form-text d-block text-danger fw-bold">{{ $errors->first('last_name') }}</small>
                        @endif
                    </div>

                    <div id="email" class="w-75">
                        <label for="" class="font">Email Address</label>
                        <input type="email" name="email_address" required value="{{ old('email_address') }}"class="w-100 mt-2 form-control p-2 ps-3 shadow font{{($errors->first('email_address') ? " form-error" : "")}}" placeholder="ex. you@example.com">
                        @if($errors->first('email_address'))
                            <small class="form-text d-block text-danger fw-bold">{{ $errors->first('email_address') }}</small>
                        @endif
                    </div>
                    
                    <div id="password" class="w-75">
                        <label for="" class="font">Password</label>
                        <input type="password" name="password" required class="w-100 mt-2 form-control p-2 ps-3 shadow font{{($errors->first('password') ? " form-error" : "")}}" placeholder="Must be 8 characters or long">
                        @if($errors->first('password'))
                            <small class="form-text d-block text-danger fw-bold">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                 
                    <input type="submit" value="Create your account" class="bg-blue-500 mt-5 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">

                {{-- <button type="submit" class="signup-btn text-[white] font-bold bg-[black] p-[10px] w-[170px] text-center mt-[10px]">Sign Up</button> --}}
            </form>
        </div>