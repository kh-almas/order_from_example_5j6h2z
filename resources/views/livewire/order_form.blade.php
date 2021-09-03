<section class="bg-white px-4 py-4 mt-5" style="border-radius: 20px;">
    <div class="row">
        <div class="col-lg-7">
            <div class="row overflow-hidden text-center mb-4" style="border-radius: 8px; ">
                <div class="col p-1 text-white bg-primary" style="border-right: 1px solid white;">
                    <span class="me-2"><i class="far fa-check-circle"></i></span><small>Packges</small>
                </div>
                <div class="col p-1 text-white bg-primary" style="border-right: 1px solid white;">
                    <span class="me-2"><i class="far fa-check-circle"></i></span><small>Information</small>
                </div>
                <div class="col p-1 {{ $pay_option == 1 ? 'text-white bg-primary' : ''}}">
                    <span class="me-2"><i class="far fa-check-circle"></i></span><small>Payment</small>
                </div>
            </div>

            @if($pay_option === 0)
                <div>
                    <form action="{{ route('check') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Your Name :</label>
                            <div class="row g-2">
                                <div class="col">
                                    <input name="fname" wire:model="fname" type="text" class="form-control" id="name" placeholder="First Name">
                                    @error('fname') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col">
                                    <input name="lname" wire:model="lname" type="text" class="form-control" id="name" placeholder="Last Name">
                                    @error('lname') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email Address :</label>
                            <input name="email" wire:model="email" type="email" class="form-control" id="email">
                            @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="col-form-label">Mobile Number :</label>
                            <input name="phone" wire:model="phone" type="number" class="form-control" id="phone">
                            @error('phone') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="addressone" class="col-form-label">Address 1 Line</label>
                            <div>
                                <input name="addressone" wire:model="addressone" type="text" class="form-control" id="addressone">
                                @error('addressone') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="addresstwo" class="col-form-label">Address 2 Line</label>
                            <input  name="addresstwo" wire:model="addresstwo" type="text" class="form-control" id="addresstwo">
                            @error('addresstwo') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="state" class="col-form-label">State</label>
                            <input name="state" wire:model="state" type="text" class="form-control" id="addressthree">
                            @error('state') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="city" class="col-form-label">City</label>
                                    <input name="city" wire:model="city" type="text" class="form-control" id="city">
                                    @error('city') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col">
                                    <label for="zipcode" class="col-form-label">Zipcode</label>
                                    <input name="zipcode" wire:model="zipcode" type="text" class="form-control" id="zipcode">
                                    @error('zipcode') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="info" class="col-form-label">Additional Information</label>
                            <textarea name="info" wire:model="info" class="form-control" id="info" rows="3"></textarea>
                            @error('info') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <label for="inputPassword3" class="col-form-label">Do you have an existing CV?</label>
                                <!--<input name="existingcv" id="toggle-one" checked type="checkbox">-->
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn {{$check_cv_field === 1 ? 'btn-success' : ''}}" wire:click="show_cv_field">Yes</button>
                                    <button type="button" class="btn {{ $check_cv_field === 0 ? 'btn-danger' : ''}}" wire:click="hide_cv_field">No</button>
                                </div>
                            </div>
                            @if($check_cv_field == 1)
                            <div class="mt-3" id="cvsubmition">
                                <input class="form-control" name="cv" wire:model="cv" type="file" id="formFileMultiple">
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
                <div>
                    <h4>Delivery time</h4>
                    <div class="ms-auto me-lg-5" style="max-width: 600px;">
                        @foreach($delivery_time as $delivery_time)
                            <div class="row mb-3">
                                <div class="col-sm-1">
                                    <span class="pointer" wire:click="additem({{ $delivery_time->id }})"><i class="fas fa-plus-circle"></i></span>
                                </div>
                                <div class="col-sm-11 d-flex justify-content-between">
                                    <div>
                                        <h5>{{ $delivery_time->title }}</h5>
                                        <p>{{ $delivery_time->subtitle }}</p>
                                    </div>
                                    <div>
                                        <p class="fw-bold">${{ $delivery_time->prize }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <h4>Addons</h4>
                    <div class="ms-auto me-lg-5" style="max-width: 600px;">
                        @foreach($addon as $addon)
                            <div class="row mb-3">
                                <div class="col-sm-1">
                                    <span class="pointer" wire:click="additem({{ $addon->id }})"><i class="fas fa-plus-circle"></i></span>
                                </div>
                                <div class="col-sm-11 d-flex justify-content-between">
                                    <div>
                                        <h5>{{ $addon->title }}</h5>
                                        <p>{{ $addon->subtitle }}</p>
                                    </div>
                                    <div>
                                        <p class="fw-bold">${{ $addon->prize }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if($pay_option === 1)
                <div class="d-flex justify-content-end">
                    <button class="btn btn-info text-white btn-sm" wire:click="edit">Edit</button>
                </div>
                <div>
                    @if($fname && $lname)<p class="my-3"><span class="fw-bold">Name : </span>{{ $fname }} {{ $lname }}</p>@endif
                    @if($email)<p class="my-3"><span class="fw-bold">Email : </span>{{ $email }}</p>@endif
                    @if($phone)<p class="my-3"><span class="fw-bold">Mobile Number : </span>{{ $phone }}</p>@endif
                    @if($addressone)<p class="my-3"><span class="fw-bold">Address : </span>{{ $addressone }} {{ $addresstwo }}</p>@endif
                    @if($state)<p class="my-3"><span class="fw-bold">State : </span>{{ $state }}</p>@endif
                    @if($city)<p class="my-3"><span class="fw-bold">City : </span>{{ $city }}</p>@endif
                    @if($zipcode)<p class="my-3"><span class="fw-bold">Zipcode : </span>{{ $zipcode }}</p>@endif
                    @if($info)<p class="my-3"><span class="fw-bold">Information : </span>{{ $info }}</p>@endif
                    @if($cv)<p class="my-3"><span class="fw-bold">CV : </span>{{ $cv }}</p>@endif
                </div>
            @endif
        </div>
        <div class="col-lg-5">
            <div class=" sticky-top">
                <div class="card overflow-hidden" style="border-radius: 20px;">
                    <div class="card-header text-white bg-dark">
                        <h4 class="pt-2 pb-1">Professional Growth</h4>
                    </div>
                    @if (session('already_added_error'))
                        <div class="alert alert-denger bg-gray-400">
                            {{ session('already_added_error') }}
                        </div>
                    @endif
                    <div class="card-body p-0">
                        <div class="p-3" style="background-color: #F2F2F2;">
                            <div class="d-flex justify-content-between">
                                <p>Professional Growth</p>
                                <p>$165.00</p>
                            </div>
                        </div>
                        @foreach($selected_addon as $key => $addons)
                            <div class="p-3" style="background-color: #F2F2F2;">
                                <div class="d-flex justify-content-between">
                                    <p>{{ $addons['title'] }}</p>
                                    <div class="d-flex">
                                        <p class="me-2">${{ $addons['prize'] }}</p>
                                        <p><span class="pointer" wire:click="remove_addons({{ $key }})"><i class="fas fa-times-circle"></i></span></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if(count($submitTime) >0)
                            @foreach($submitTime as $key => $submitTime)
                                <div class="p-3" style="background-color: #F2F2F2;">
                                    <div class="d-flex justify-content-between">
                                        <p>{{ $submitTime['title'] }}</p>
                                        <div class="d-flex">
                                            <p class="me-2">${{ $submitTime['prize'] }}</p>
                                            <p><span class="pointer" wire:click="remove_submit_time({{ $key }})"><i class="fas fa-times-circle"></i></span></p>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        @endif
                        <div class="d-flex justify-content-between px-3 py-4">
                            <h5>Total Amount</h5>
                            <p>${{$total_prize}}</p>
                        </div>
                    </div>
                    @if($pay_option === 1)
                        <div class="" style="">
                            <div class="accordion accordion-flush mx-3" id="accordionFlushExample">
                                <div class="accordion-item border-top">
                                    <div class="accordion-header pointer" id="flush-headingTwo">
                                        <a class="text-decoration-none" type="" data-bs-toggle="collapse" data-bs-target="#Stripe" aria-expanded="false" aria-controls="Stripe">
                                            <div class="d-flex justify-content-between py-4">
                                                <p> Credit Card (Stripe) </p>
                                                <div>
                                                    <img src="{{asset('img/stripe-cards.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div id="Stripe" class="accordion-collapse collapse" aria-labelledby="Stripe" data-bs-parent="#accordionFlushExample">
                                        <div class="my-5"></div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header pointer" id="flush-headingTwo">
                                        <a class="text-decoration-none" type="" data-bs-toggle="collapse" data-bs-target="#paypal" aria-expanded="false" aria-controls="paypal">
                                            <div class="d-flex justify-content-between py-4">
                                                <p>  Paypal Smart Buttons  </p>
                                                <div>
                                                    <img src="{{asset('img/paypal-logo.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div id="paypal" class="accordion-collapse collapse" aria-labelledby="paypal" data-bs-parent="#accordionFlushExample">
                                        <div class="my-5"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($pay_option === 0)
                        <button wire:click="proceed" type="submit" class="btn btn-primary text-center">
                            <p style="font-size: 20px;">Click Next to Proceed</p>
                        </button>
                    @endif
                </div>
                @if($pay_option === 1)
                    <div class="mt-3" style="border: 1px dotted #000000; padding: 20px 15px;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                By placing this order I agree to the terms and conditions and accept the privacy policy.
                            </label>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
