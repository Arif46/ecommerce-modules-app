@extends('Web::layouts.master')
@section('body')
    <div id="cover-spin"></div>
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Seller Account</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Account Area Start -->


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <div id="registerFormTitle">
                        <h2 id="heading">Register Your Shop</h2>
                        <p>Fill all form field to go to next step</p>
                    </div>
                    <div>

                    </div>
                    <u id="errors"></u>
                    <form method="post" id="signupform" action="{{route('merchant.signupStore')}}"
                          enctype="multipart/form-data">
                    @csrf
                    <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Shop Info</strong></li>
                            <li id="personal"><strong>Documents</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br> <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Shop Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 1 - 3</h2>
                                    </div>
                                </div>
                                <label class="fieldlabels">Shop Name: <span style="color: red">*</span></label> <input
                                        type="text" name="shop_name"
                                        placeholder="Shop Name"/>

                                <label class="fieldlabels">Username: <span style="color: red">*</span></label>
                                <input type="text" name="username" placeholder="Username"/>

                                <label class="fieldlabels">Owner NID: <span style="color: red">*</span></label>
                                <input type="text" name="nid_number" placeholder="NID Number"/>

                                <label class="fieldlabels">TIN No: <span style="color: red">*</span></label>
                                <input type="text" name="tin_no" placeholder="TIN No"/>

                                <label class="fieldlabels">Shop Address: <span style="color: red">*</span></label>
                                <input type="text" name="shop_address" placeholder="Shop Address"/>

                                <label class="fieldlabels">Mobile Number: <span style="color: red">*</span></label>
                                <input type="text"
                                       name="mobile_number"
                                       placeholder="Mobile Number"/>

                                <label class="fieldlabels">Email:</label>
                                <input type="email"
                                       name="email_address"
                                       placeholder="Email Address"/>
                                <label class="fieldlabels">Password: <span style="color: red">* (Password format must contain at leas one lowercase,one uppercase and one digit)</span></label>
                                <input type="password"
                                       name="password"
                                       placeholder="Password"/>
                                <label class="fieldlabels">Confirm Password: <span style="color: red">*</span></label>
                                <input type="password"
                                       name="password_confirmation"
                                       placeholder="Confirm Password"/>
                            </div>
                            <input type="button" name="next" style="padding-top: 6px" class="next action-button"
                                   value="Next"/>
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Required Documents:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 2 - 3</h2>
                                    </div>
                                </div>
                                @foreach($documents as $document)
                                    <label class="fieldlabels" for="{{$document['id']}}">
                                        {{$document['label']}}
                                        <span style="color: red">
                                           {{($document['required'] == 'required')?'*':''}}
                                       </span>
                                    </label>
                                    <input type="file" id="{{$document['id']}}"
                                           attr_document_type="{{$document['document_type']}}"
                                           attr_document_size="{{$document['size_in_kb']}}"
                                           name="{{$document['name']}}">
                                @endforeach
                            </div>
                            <!--                            check box-->
                            <label>I will upload all required files later:
                                <input type="checkbox" name="upload_later"/>
                            </label>

                            <div class="next" id="dynamicNextClick"></div>
                            <input type="submit" name="next" class="action-button" value="Submit"/> <input
                                    type="button" name="previous" class="previous action-button-previous"
                                    value="Previous"/>
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Finish:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 3 - 3</h2>
                                    </div>
                                </div>
                                <br><br>
                                <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                <div class="row justify-content-center">
                                    <div class="col-3"><img src="{{asset('ok.png')}}" class="fit-image">
                                    </div>
                                </div>
                                <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">Your request has been accepted. We will send
                                            you email upon Approval</h5>
                                        <a href="{{route('merchant.signup')}}">Click Here to Login</a>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        * {
            margin: 0;
            padding: 0
        }

        html {
            height: 100%
        }

        p {
            color: grey
        }

        #heading {
            text-transform: uppercase;
            color: #673AB7;
            font-weight: normal
        }

        #signupform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #signupform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        .form-card {
            text-align: left
        }

        #signupform fieldset:not(:first-of-type) {
            display: none
        }

        #signupform input,
        #signupform textarea {
            padding: 8px 15px 8px 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            background-color: #ECEFF1;
            font-size: 16px;
            letter-spacing: 1px
        }

        #signupform input:focus,
        #signupform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #673AB7;
            outline-width: 0
        }

        #signupform .action-button {
            width: 100px;
            background: #FF6600;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            padding-top: 6px !important;
            margin: 10px 0px 10px 5px;
            float: right
        }

        #signupform .action-button:hover,
        #signupform .action-button:focus {
            background-color: #311B92
        }

        #signupform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px 10px 0px;
            float: right
        }

        #signupform .action-button-previous:hover,
        #signupform .action-button-previous:focus {
            background-color: #000000
        }

        .card {
            z-index: 0;
            border: none;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #673AB7;
            margin-bottom: 15px;
            font-weight: normal;
            text-align: left
        }

        .purple-text {
            color: #673AB7;
            font-weight: normal
        }

        .steps {
            font-size: 25px;
            color: gray;
            margin-bottom: 10px;
            font-weight: normal;
            text-align: right
        }

        .fieldlabels {
            color: gray;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #FF6600
        }

        #progressbar li {
            list-style-type: none;
            font-size: 15px;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f015"
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f15b"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f030"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #FF6600
        }

        .progress {
            height: 20px
        }

        .progress-bar {
            background-color: #FF6600
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }
    </style>
@endsection
@section('pageScript')
    <script>
        $(document).ready(function () {
            function scrollToHash(hashID){
                var aTag = $(hashID);
                $('html,body').animate({scrollTop: aTag.offset().top},'slow');
            }

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

            function goToNext(activeThis){
                current_fs = $(activeThis).parent();
                next_fs = $(activeThis).parent().next();

//Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
                next_fs.show();
//hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now) {
// for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                    },
                    duration: 500
                });
                setProgressBar(++current);
            }

            function goToPrevious(activeThis){
                current_fs = $(activeThis).parent();
                previous_fs = $(activeThis).parent().prev();

//Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
                previous_fs.show();

//hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now) {
// for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({'opacity': opacity});
                    },
                    duration: 500
                });
                setProgressBar(--current);
            }

            $(".next").click(function () {
                //alert(current)
                if (current == 1){
                    scrollToHash('#registerFormTitle')
                }
                goToNext(this)
            });

            $(".previous").click(function () {
                goToPrevious(this)
            });

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            // submit form in ajax
            $("#signupform").submit(function (e) {

                e.preventDefault(); // avoid to execute the actual submit of the form.

                var form = $(this);
                var postData = new FormData($(this)[0]);
                var actionUrl = form.attr('action');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: actionUrl,
                    processData: false,
                    contentType: false,
                    data: postData,
                    beforeSend: function () {
                        $('#cover-spin').show(0)
                    },
                    success: function (data) {
                        $('#registerFormTitle').hide();
                        $('#dynamicNextClick').click()
                        //goToNext(form)
                        //alert(data); // show response from the php script.
                    },
                    complete: function () {
                        $('#cover-spin').hide(0)
                    },
                    error: function (jqXhr, json, errorThrown) {
                        $('#cover-spin').hide(0)
                        var errorsHtml = '';
                        if (jqXhr.status == 422){
                            $.each(jqXhr.responseJSON.errors, function (index, value) {
                                errorsHtml += '<li class="list-group-item alert alert-danger">' + value + '<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="cursor:pointer;"><span aria-hidden="true">×</span></li></button>';
                            });
                            $('#errors').html(errorsHtml);
                            scrollToHash('#errors')
                        }
                    }
                });

            });

        });
    </script>
@endsection