@extends('layouts/contentLayoutMaster')
@section('title','Accounts Logs')

@section('vendor-style')
    {{-- Page css files --}}
    <link href="{{asset('custom/argon/css/argon-dashboard.css?v=1.1.1')}}" rel="stylesheet"/>

@endsection
@section('mystyle')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">
@endsection

@section('content')

    <div class="alert alert-warning mt-2">
        <i class="feather icon-info mr-1"></i>
        <i>Your subscription is bound to expire in 3 days time, click <a href="#" target="_blank"></a>here</i> to renew
        your subscription.
    </div>
    <!-- Content types section start -->
    <section id="content-types" class="mb-5">
        <div class="row match-height bg-blue p-3">
           <div class="col-xl-12 col-md-12 col-sm-12  pb-3">
               <h1 class="text-white cs-text-shadow" style="color: #4285f4;font-size: 36px">Logs</h1>
           </div>
            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card collapse-icon accordion-icon-rotate">
                    <div class="card-content">
                        <div class="card-body">
                            <h1 class="cs-text-shadow-white text-center mb-2 card-title" style="color: #4285f4;font-size: 32px">Active
                                Subscriptions</h1>
                            <p class="card-text">
                                You are currently subscribed to Neutron Corporate
                            </p>

                            <div class="accordion" id="accordionExample" data-toggle-hover="true">
                                <div class="collapse-margin">
                                    <div class="card-header" id="headingOne" data-toggle="collapse" role="button"
                                         data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <span class="lead collapse-title collapsed">
                    Accordion Item 1
                  </span>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly
                                            beans gummi bears sweet roll
                                            bonbon muffin liquorice. Wafer lollipop sesame snaps.
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse-margin">
                                    <div class="card-header" id="headingTwo" data-toggle="collapse" role="button"
                                         data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <span class="lead collapse-title collapsed">
                    Accordion Item 2
                  </span>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            Sweet pie candy jelly. Sesame snaps biscuit sugar plum. Sweet roll topping
                                            fruitcake. Caramels
                                            liquorice biscuit ice cream fruitcake cotton candy tart.
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse-margin">
                                    <div class="card-header" id="headingThree" data-toggle="collapse" role="button"
                                         data-target="#collapseThree"
                                         aria-expanded="false" aria-controls="collapseThree">
                  <span class="lead collapse-title">
                    Accordion Item 3
                  </span>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            Tart gummies dragée lollipop fruitcake pastry oat cake. Cookie jelly jelly
                                            macaroon icing jelly beans
                                            soufflé cake sweet. Macaroon sesame snaps cheesecake tart cake sugar plum.
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse-margin">
                                    <div class="card-header" id="headingFour" data-toggle="collapse" role="button"
                                         data-target="#collapseFour"
                                         aria-expanded="true" aria-controls="collapseFour">
                  <span class="lead collapse-title">
                    Accordion Item 4
                  </span>
                                    </div>
                                    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            Cheesecake muffin cupcake dragée lemon drops tiramisu cake gummies chocolate
                                            cake. Marshmallow tart
                                            croissant. Tart dessert tiramisu marzipan lollipop lemon drops.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h3 class="cs-text-shadow-white text-center mb-2 card-title" style="color: #4285f4;font-size: 28px">Account Activity</h3>
                            <p class="card-text">
                                Here you can view total users activities pertaining to the organisation
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-primary float-right">4</span>
                                Cras justo odio
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-info float-right">2</span>
                                Dapibus ac facilisis in
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-warning float-right">1</span>
                                Morbi leo risus
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-success float-right">3</span>
                                Porta ac consectetur ac
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-danger float-right">8</span>
                                Vestibulum at eros
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-success float-right">4</span>
                                Lorem ipsum dolor sit amet.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
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
    </script>

    <script src="{{ asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
@endsection
@section('myscript')
    <!-- Page js files -->
    <script src="{{ asset('js/scripts/forms/wizard-steps.js') }}"></script>
    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>
@endsection






















