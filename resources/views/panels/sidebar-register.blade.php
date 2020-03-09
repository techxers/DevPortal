
<section id="data-list-view" class="data-list-view-header">
    {{-- add new sidebar starts --}}
    <div class="add-new-data-sidebar">
        <div class="overlay-bg"></div>
        <div class="add-new-data p-2" style="overflow-y: scroll">
            <form method="POST" action="{{route('create-organisations')}}"
                  class="" id="registerForm" name="registerForm">
                @csrf

                <br>
                <h3 class="cs-text-shadow-white text-primary text-capitalize text-center">Register new
                    organisation</h3>
                <hr>
                <br>
                <fieldset class="">
                    <div class="form-row">

                        <div class="col form-group">
                            <label for="title">{{ __('Title') }} <span
                                        class="brand-blue">&ast;</span>
                            </label>
                            <input id="title" type="text"
                                   class="border text-capitalize form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                   name="title" value="{{ old('title') }}" autocomplete="title"
                                   autofocus
                                   placeholder="Company/Event/organisation" required>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                            @endif
                        </div> <!-- form-group end.// -->

                        <div class="col form-group">
                            <label for="tel">{{ __('Telephone') }} <span
                                        class="brand-blue">&ast;</span></label>
                            <input id="tel" type="tel"
                                   class="border form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}"
                                   name="tel" value="{{ old('tel') }}" autocomplete="tel"
                                   placeholder="Company phone number" required>
                            @if ($errors->has('tel'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tel') }}</strong>
                                </span>
                            @endif
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->

                    <div class="form-group">
                        <label for="company_email">Email address <span
                                    class="brand-blue">&ast;</span></label>
                        <input id="company_email" type="email"
                               class="text-lowercase border form-control{{ $errors->has('company_email') ? ' is-invalid' : '' }}"
                               name="company_email" value="{{ old('company_email') }}"
                               autocomplete="company_email" placeholder="Company email address"
                               required>

                        <small class="form-text text-muted pl-3"
                               style="text-transform: lowercase!important;color: rgba(0,0,0,0.7)!important;">
                           This should be the company's email address
                        </small>

                        @if ($errors->has('company_email'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company_email') }}</strong>
                                </span>
                        @endif
                    </div> <!-- form-group end.// -->

                    <div>
                        <h5 class="brand-red pb-2">Company Type</h5>
                        <div class="form-row">

                            <div class="col form-group">
                                <label for="industry">{{ __('Industry') }} <span
                                            class="brand-blue">&ast;</span></label>
                                <select id="industry" class="form-control border" name="industry"
                                        required>
                                    <option class="" value="">Select Industry</option>
                                    @foreach(\App\IndustryType::all() as $type)
                                        <option value="{{$type->type}}">{{$type->type}}</option>
                                    @endforeach
                                </select>

                            </div> <!-- form-group end.// -->

                            <div class="col form-group">
                                <label for="type">{{ __('Type') }} </label>
                                <select id="type" class="form-control border" name="type">
                                    <option value="Public" selected="">Public</option>
                                    <option value="Self-Employed">Self-Employed</option>
                                    <option value="Non-Profit">Non-Profit</option>
                                    <option value="Sole-Proprietorship">Sole Proprietorship
                                    </option>
                                    <option value="Private">Private</option>
                                    <option value="PrivatePartnership">Partnership</option>
                                </select>

                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->

                        <div class="form-group">
                            <label for="website">Website</label>
                            <div class="input-group">
                                <div class="input-group-prepend"
                                     style="border-radius: 0%!important;">
                                                            <span class="input-group-text"
                                                                  id="basic-addon1">http://</span>
                                </div>
                                <input id="website" type="text"
                                       class="border form-control{{ $errors->has('website') ? ' is-invalid' : '' }}"
                                       name="website" value="{{ old('website') }}"
                                       autocomplete="website"
                                       autofocus
                                       placeholder="Begin with www. or plain text">
                                @if ($errors->has('website'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('website') }}</strong>
                                        </span>
                                @endif
                            </div>


                        </div> <!-- form-group end.// -->

                    </div>

                    <div>
                        <h5 class="brand-red pb-2">Physical Address</h5>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="city">{{ __('City') }} <span
                                            class="brand-blue">&ast;</span></label>
                                <input id="city" type="text"
                                       class="border text-capitalize form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                       name="city" value="{{ old('city') }}" autocomplete="city"
                                       placeholder="" required>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                @endif
                            </div> <!-- form-group end.// -->

                            <div class="form-group col-md-6">
                                <label for="country">{{ __('Country') }} <span
                                            class="brand-blue">&ast;</span></label>
                                <select id="country" class=" border form-control" name="country"
                                        required>
                                    <option> Choose...</option>
                                    <option value="Kenya" selected="selected">Kenya</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Rwanda">Rwanda</option>
                                </select>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->

                        <div class="form-group">
                            <label for="postcode">{{ __('Postal Address') }}
                            </label>
                            <input id="postcode" type="text"
                                   class="border form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}"
                                   name="postcode" value="{{ old('postcode') }}"
                                   autocomplete="postcode"
                                   placeholder="P.O BOX 123...">
                            @if ($errors->has('postcode'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('postcode') }}</strong>
                                        </span>
                            @endif

                        </div> <!-- form-group end.// -->
                    </div>
                </fieldset>


                <hr>
                <fieldset>

                    <legend class="brand-blue pb-2">
                        <h5 style="font-size: 24px">Subscribe to a service</h5></legend>

                    <div class="form-group">
                        <div class="cs-hidden">
                            <input type="number" value="{{\App\Product::all()->count()}}" name="productCount">
                        </div>
                        @php
                            $pkgIndex=-1;
                        @endphp
                        @php
                            $indexTrack1=-1;
                        @endphp
                        <div class="row pt-1 ">
                            <div class="col-md-5 p-0">
                                <div class="pl-1">
                                    <h5 class="small">Select Products</h5>
                                    <table class="table table-responsive table-borderless">
                                        <tbody class="pkgs">
                                        @foreach(\App\Product::all() as $product)
                                            @php
                                                $indexTrack1++;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="productSelect"
                                                           name="product{{$indexTrack1}}" id="{{$product->id}}"
                                                           value="{{$product->id}}">
                                                </td>
                                                <td class="pl-2">{{$product->title}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-7 p-0">
                                @php
                                    $indexTrack1=-1;
                                @endphp

                                @foreach(\App\Product::all() as $product)
                                    @php
                                        $indexTrack1++;
                                    @endphp
                                    <div class="productPlans">
                                        <h6 class="text-md-center"><u>{{$product->title}} Plans</u></h6>
                                        <table class="table w-100 table-borderless">
                                            <thead>
                                            <tr>
                                                <td></td>
                                                <th>Plan</th>
                                                <th>Price</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($product->plans as $plan)
                                                <tr>
                                                    <td>
                                                        <input type="radio" name="plan_product{{$indexTrack1}}"
                                                               value="{{$plan->id."=".$plan->pricing}}"
                                                               @if(($plan->title)==='Basic')  checked
                                                               @endif class="plan_select">
                                                    </td>
                                                    <td class="">{{$plan->title}}</td>
                                                    <td class="text-capitalize">{{$plan->pricing}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <br>
                                    </div>
                                @endforeach
                                <div class="cs-hidden">
                                    <input type="text" name="regProducts" id="regProducts"  required>
                                    <input type="text" name="regPlans" id="regPlans"  required>
                                    <input type="number" name="regTotalPayee" id="regTotalPayee" value="0">
                                </div>

                                <div class="">
                                    <h6 class="text-md-center"><u>Total Payment</u></h6>
                                    <table class="table table-borderless">

                                        <tbody>
                                        <tr>
                                            <td class="text-right">Kshs.</td>
                                            <td class=""><b id="totalPayment">00.00</b></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                </div>

                            </div>
                        </div>
                    </div>
                </fieldset>


                <!-- Step 3 -->
                <hr>
                <fieldset>
                    <legend class="brand-blue pb-2"><h5 style="font-size: 24px">User Information</h5></legend>

                    <div class="form-group brand-red">
                        <p style="text-shadow: 1px 1px 0 #e5e5e5;color: #dd5047">
                            The below data are for the person who will be representing the organisation/its admin.
                        </p>

                        <div class="">
                            <h5 class="brand-red pb-2 pt-1 text-underline"><u>Please Fill your
                                    personal
                                    details</u></h5>
                            <div class="form-row">

                                <div class="col form-group">
                                    <label for="name">{{ __('Fullname') }}</label>
                                    <input type="text" name="name" id="name"
                                           class="border form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           value="{{ old('name') }}" autocomplete="name"
                                           placeholder="First & Second Name" required max="30"
                                           pattern="[A-Z][A-Za-z+0-9+']*[ ][A-Z][A-Za-z+0-9+']*"
                                           title="Two names start with capital letter"
                                    >
                                </div> <!-- form-group end.// -->
                                <div class="col form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input id="email" type="email" placeholder="Email will be used for login"
                                           class="border form-control{{ $errors->has('email') ? ' is-invalid' : '' }} text-lowercase"
                                           name="email" value="{{ old('email') }}"
                                           autocomplete="email"
                                           required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                    @endif
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" placeholder="Enter password"
                                       class="border form-control @error('password') is-invalid @enderror"
                                       name="password" autocomplete="new-password"
                                       required data-validation-required-message="This field is required"
                                       pattern="[A-Za-z][A-Za-z+0-9]{6}[A-Za-z+0-9]*[0-9][A-Za-z+0-9]*"
                                       title="Should cointain letters(Both upper &amp; lower case) numbers and no special characters and atleast more than 6 characters">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password"
                                       class="border form-control" placeholder="Confirm password"
                                       name="password_confirmation" autocomplete="new-password"
                                       required data-validation-match-match="password"
                                       data-validation-required-message="Repeat password must match"
                                       pattern="[A-Za-z][A-Za-z+0-9]{6}[A-Za-z+0-9]*[0-9][A-Za-z+0-9]*"
                                       title="Should cointain letters(Both upper &amp; lower case) numbers and no special characters and atleast more than 6 characters">

                            </div><!-- form-group end.// -->

                        </div>
                    </div>
                </fieldset>

                <br>
                <div class="register-buttons">
                    <button type="submit" class="btn btn-primary btn-block btn-lg" id="btn-signup">Complete
                        Registration
                    </button>
                </div>

            </form>
        </div>
    </div>
    {{-- add new sidebar ends --}}
</section>