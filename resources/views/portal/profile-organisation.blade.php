@extends('layouts/contentLayoutMaster')

@section('title','Organisation Profile')
@section('vendor-style')
    {{-- Page css files --}}
    <link href="{{asset('custom/argon/css/argon-dashboard.css?v=1.1.1')}}" rel="stylesheet"/>

@endsection
@section('mystyle')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">
@endsection

@section('content')
    <!-- Header -->
   {{--

    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
         style="min-height: 500px; background-image: url({{asset('img/theme/company-cover.png')}}); background-size: cover; background-position: center top;">

        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <img src="{{asset(config('app.file_path').($organisation->image??'organisation/logo/org_default.svg'))}}"
                         class="w-100" style="max-width: 128px">
                    <h1 class="display-2 text-black cs-text-shadow-white">{{$organisation->name}}</h1>
                    <p class="text-black mt-0 mb-5">This is your profile page. You can see the details about you that
                        are currently in the system. Feel free to change your password for the system
                    </p>
                    <a href="#edit-profile" class="btn btn-primary">Edit profile</a>
                </div>
            </div>
        </div>
    </div>
   --}}




    <!-- Page content -->
    <div class="container-fluid mt-2 mb-5">
        <div class="row justify-content-center">
            <div class="col-xl-11 order-xl-1" id="edit-profile">
                <form action="{{route('org-profile-update')}}"
                      enctype="multipart/form-data"
                      method="post"  class="form-horizontal">
                    @csrf
                    @method("PATCH")

                   <div class="card shadow mt-2">

                       <div class="rounded card-body">
                           <div class="" style="position:  absolute; left: 45%; right: 0; margin-top: -80px ">
                               <input type="file" id="file1" name="image" accept="image/*" capture style="display:none" />
                               <img src="{{asset(config('app.file_path').($organisation->image??'organisation/logo/org_default.svg'))}}"

                                    width="150px" height="150px"
                                    id="upfile1" style="background-image: linear-gradient(to top, #48c6ef 0%, #6f86d6 100%);cursor:pointer; max-width: 150px; border:5px solid dodgerblue"
                                    class="rounded-circle w-100 "/>
                           </div>
                           <h3 class="text-muted mb-4 cs-text-shadow-white">Basic Details</h3>
                           <div class="pl-lg-4">
                               <div class="row">
                                   <div class="col-lg-6">
                                       <div class="form-group">
                                           <label class="form-control-label cs-text-shadow-white text-black"
                                                  for="name">Name</label>
                                           <input type="text" id="name" name="name"
                                                  class="form-control form-control-alternative"
                                                  placeholder="Name of the Organiz..."
                                                  value="{{$organisation->name}}"
                                                  required>
                                           @if ($errors->has('name'))
                                               <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                           @endif
                                       </div>
                                   </div>
                                   <div class="col-lg-6">
                                       <div class="form-group">
                                           <label class="form-control-label cs-text-shadow-white text-black"
                                                  for="email">Email-address</label>
                                           <input type="email" id="email" name="email"
                                                  class="form-control form-control-alternative"
                                                  placeholder="company@example.com"
                                                  value="{{$organisation->email}}">
                                           @if ($errors->has('email'))
                                               <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                           @endif
                                       </div>
                                   </div>
                               </div>

                               <div class="row">
                                   <div class="col-lg-6">
                                       <div class="form-group">
                                           <label class="form-control-label text-black cs-text-shadow-white text-black cs-text-shadow-white"
                                                  for="phone">Phone</label>
                                           <input type="text" id="phone" name="phone"
                                                  class="form-control form-control-alternative "
                                                  placeholder="Phone number"
                                                  value="{{$organisation->phone}}">
                                       </div>
                                   </div>
                                   <div class="col-lg-6">
                                       <div class="form-group">
                                           <label class="form-control-label text-black cs-text-shadow-white"
                                                  for="website">Website</label>
                                           <input type="text" id="website" name="website"
                                                  class="form-control form-control-alternative"
                                                  placeholder="Website" value="{{$organisation->website}}">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

                   <div class="card mt-1 pb-4 pt-2">

                       <div class="rounded card-body">
                           <h3 class="text-muted mb-4 cs-text-shadow-white">Address Details</h3>
                           <div class="pl-lg-4">
                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label class="form-control-label cs-text-shadow-white text-black" for="postcode">Postal
                                               Address</label>
                                           <input id="postcode" name="postcode"
                                                  class="form-control form-control-alternative"
                                                  placeholder="Postal address"
                                                  value="{{$organisation->postcode}}" type="text">
                                       </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-lg-4">
                                       <div class="form-group">
                                           <label class="form-control-label cs-text-shadow-white text-black"
                                                  for="city">City</label>
                                           <input type="text" id="city" name="city"
                                                  class="form-control form-control-alternative"
                                                  placeholder="City" value="{{$organisation->city}}">
                                       </div>
                                   </div>
                                   <div class="col-lg-4">
                                       <div class="form-group">
                                           <label class="form-control-label cs-text-shadow-white text-black" for="country">Country</label>
                                           <input type="text" id="country" name="country"
                                                  class="form-control form-control-alternative"
                                                  placeholder="Country" value="{{$organisation->country}}">
                                       </div>
                                   </div>
                                   <div class="col-lg-4">
                                       <div class="form-group">
                                           <label class="form-control-label cs-text-shadow-white text-black"
                                                  for="industry">Industry</label>
                                           <input type="text" id="industry" name="industry"
                                                  class="form-control form-control-alternative"
                                                  placeholder="Industry dealings"
                                                  value="{{$organisation->city}}">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                    <div class="text-md-center mt-2 mb-2 pl-4 pr-4">
                        <button  type="submit"
                                 class="w-100  pl-4 pr-4 btn-round btn btn-primary smsall">Update company profile
                        </button>
                    </div>
                   </div>

               </form>

            </div>
        </div>
    </div>

    <!-- Content types section end -->

@endsection

@section('vendor-script')
    <!-- vednor files -->
    <script src="{{ asset('vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/validation/jquery.validate.min.js') }}"></script>

    <script src="{{asset('custom/argon/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!--   Optional JS   -->
    <!--   Argon JS   -->

    <script src="{{asset('custom/argon/js/argon-dashboard.js?v=1.1.1')}}"></script>

    <script>

        var input = document.querySelector('input[type=file]'); // see Example 4

        input.onchange = function () {
            var file = input.files[0];

            displayAsImage(file); // see Example 7
        };


        function displayAsImage(file) {

            var imgURL = URL.createObjectURL(file);
            document.getElementById("upfile1").src = imgURL;
        }

        $("#upfile1").click(function () {
            $("#file1").trigger('click');
        });
        $("#upfile2").click(function () {
            $("#file2").trigger('click');
        });
        $("#upfile3").click(function () {
            $("#file3").trigger('click');
        });

        @if($user->role_id>2)
        $(':input').prop('disabled', true);
        $(':input').css({
            "background-colorc": "transparent",
            'colorx': 'whitesmoke',
            'font-weight': '800'
        });
        $('label').css('font-size','20px');

        $('button').css('display','none');


        @else
        $(':input').prop('disabled', false);
        //$(':input').removeAttr('readonly')


        @endif


    </script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>

@endsection
@section('myscript')
    <!-- Page js files -->
    <script src="{{ asset('js/scripts/forms/wizard-steps.js') }}"></script>
    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>
@endsection























