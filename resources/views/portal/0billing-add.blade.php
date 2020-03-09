@extends('layouts/contentLayoutMaster')

@section('title', 'Register Visitor')

@section('vendor-style')
    <!-- vednor css files -->
    <link rel="stylesheet" href="{{ asset('vendors/css/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">
@endsection

@section('mystyle')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset('css/plugins/forms/wizard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/forms/validation/form-validation.css') }}">


@endsection
@section('content')

    <section class="card pb-2">
        <div class="card-header">
            <h2>Update Billing information</h2>
        </div>
        <div class="row justify-content-between">
            <div class="col-md-4 ">
                <form class="form form-vertical p-2 pb-9" method="post" action="{{route('billing-post')}}">
                    @csrf
                    <h5>Enter Info here</h5>
                    <div class="form-body pt-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title-icon">Title</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" id="title-icon" class="form-control"
                                               name="title" placeholder="Name of service">
                                        <div class="form-control-position">
                                            <i class="feather icon-paperclip"></i>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="cs-hidden" type="number" name="isUpdate" value="0">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="price-id-icon">Price(/monthly)</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="number" id="price-id-icon" class="form-control"
                                               name="pricing" placeholder="price">
                                        <div class="form-control-position">
                                            <i class="feather icon-dollar-sign"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="details-icon">Details (<b>separate with semicolon ; </b>)</label>

                                    <div class="position-relative has-icon-left">
                                        <textarea type="text" id="details-icon" class="form-control"
                                                  name="details" placeholder="Details">

                                        </textarea>
                                        <div class="form-control-position">
                                            <i class="feather icon-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mr-1 mb-1">Post</button>
                                <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-8 row">
                @foreach(\App\Service::all() as $service)
                    <div class="col-md-6 pb-2">
                        <div class="border-warning p-1 rounded border-gradient-light">
                            <div class="">
                                <div class="text-center">
                                    <h3 class="card-title ">{{$service->title}}</h3>
                                    <p class="card-text p-2"><span style="font-size: 30px">{{$service->pricing}}</span>/month</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    @foreach(explode(';',$service->details) as $det)
                                    <li class="list-group-item">
                                        {{$det}}
                                    </li>
                                   @endforeach
                                </ul>
                                <form class="p-1 d-flex justify-content-between" action="{{route('billing-delete')}}" method="post">
                                    @csrf
                                    <input type="text" value="{{$service->id}}" name="id" class="cs-hidden">
                                    <a href="#" class="card-link" style="visibility: hidden">Edit</a>
                                    <button class="card-link" type="submit">Delete</button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    <!-- vednor files -->
    <script src="{{ asset('vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/validation/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>

    <script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('vendors/js/extensions/polyfill.min.js') }}"></script>
@endsection
@section('myscript')
    <!-- Page js files -->
    <script src="{{ asset('js/scripts/forms/wizard-steps.js') }}"></script>
    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>

    <script src="{{ asset('js/scripts/forms/validation/form-validation.js') }}"></script>

    <script src="{{ asset('js/scripts/extensions/sweet-alerts.js') }}"></script>

    <script>
        $('.timeInputs').css('display', 'none');
        var checkDisabled = true;
        $('.placecheckbox').append("<input type='checkbox' id='appointCheck' name='appointCheck' >").change(function () {
            checkDisabled = !checkDisabled;
            if (!checkDisabled) {
                $('.timeInputs').css('display', 'block');
            } else {
                $('.timeInputs').css('display', 'none');
            }
        });
    </script>



@endsection
