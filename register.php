<?php 

$curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "ipinfo.io/".$_SERVER["REMOTE_ADDR"]."?token=88cbd7319a994c",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $response = json_decode($response,1);

    if(isset($response["city"])) {
        $city = $response["city"];
    } else {
        $city = "your area!";
    }

    if(isset($response["region"])) {
        $region = $response["region"];
    } else {
        $region = "your area!";
    }

    if(isset($response["postal"])) {
        $postal = $response["postal"];
    } else {
        $postal = "your area!";
    }

    // START THE SESSION FOR THE TOKEN PASSING
    session_start();

?>

<!doctype html>
<html lang="en">

<head>

    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KGN22K8');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Meta Tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta property="og:image" content="insuranceIMG5.png" />

    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChkMjhyjfKMu-KA8L81AxAkSnB0xO6UjQ&libraries=places&callback=initMap">
    </script>


    <!-- CSS Sheets -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.typekit.net/nbt6qrv.css">

    <!-- Scripts -->
    <script defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initMap">
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js">
    </script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.js">
    </script>
    <script type="text/javascript" src="jquery.formatCurrency-1.4.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js">
    </script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/web-animations/2.2.2/web-animations.min.js"></script>
    <script type="text/javascript" src="https://apis.google.com/js/platform.js" async defer></script>


    <title>Sign up today! | EssentialHealthInfo</title>

    <!-- Style -->

    <style>
        html {
            scroll-behavior: smooth;
        }

        ::selection {
            background: #45AFC6;
            color: white;
        }

        body {
            overflow-x: hidden;
        }

        ::selection {
            background: #45AFC6;
            color: white;
        }

        .user-select-none {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }

        @font-face {
            font-family: "Proxima Nova Bold";
            src: url("ProximaNovaBold.otf");
        }

        @font-face {
            font-family: "Samble Tracie";
            src: url("SambleTracieBold.ttf")
        }

        h1 {
            font-family: 'proxima-nova', sans-serif;
            font-weight: 700;
        }

        h2,
        h3,
        h4,
        h5,
        h6,
        button,
        input {
            font-family: 'proxima-nova', sans-serif;
            font-weight: 600;
        }

        a,
        p {
            font-family: 'proxima-nova';
            font-weight: 500;
            font-style: normal;
        }

        .zip-error,
        .dob-error,
        .tobacco-error,
        .name-error,
        .phone-error,
        .email-error,
        .city-error,
        .street-error,
        .error {
            color: #ff3030;
            margin: 0;
            font-size: 14px;
            font-family: 'proxima-nova', sans-serif;
            font-weight: 500;
        }

        .text-essentialBlue {
            color: #3EB1B1;
        }

        #callRep {
            position: fixed;
            right: 10px;
        }

        .background-img-testimonials {
            background-image: url('https://reserve-tech-assets.s3-us-west-2.amazonaws.com/essential-health-info-insurance-u65/testimonialBackground.png');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .btn-seePlans {
            border-radius: 50px;
            background-color: #3EB1B1;
            width: 150px;
            height: auto;
            color: white;
            font-size: 20px;
            font-weight: 700;
        }

        .line-height-body {
            line-height: 2;
        }

        hr.solid {
            border-top: 2px solid #999;
        }

        .call-button {
            background-color: #45AFC6;
            outline: none;
            border-radius: 50px;
            border: solid white;
            font-size: 30px;
        }

        .form1 {
            width: 50%;
        }

        .header-logo {
            width: 450px;
            height: auto
        }

        .whyMark {
            width: 20px;
            height: auto;
            margin: 0 0 5px 0;
        }

        span:hover .why1 {
            display: none;
        }

        .whyMark__img {
            width: 20px;
            height: auto;
            margin-bottom: 10px;
        }

        .img__wrap {
            position: relative;
            height: auto;
            width: 20px;
        }

        .img__description {
            position: relative;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            color: #fff;
            font-weight: 400;
            font-size: 16px;
            display: none;
            opacity: 0;
            transition-property: color;
            transition-duration: 5s;
            transition-timing-function: ease-in-out;
            transition-delay: 3s;
        }

        .img__wrap:hover .img__description {
            display: block;
            opacity: 1;
            color: #000;
        }

        input[type="radio"] {
            display: none;
        }

        .labelDropdown {
            padding: 10px 20px;
            border: 3px solid #CFCFCF;
            border-radius: 50px;
            width: 200px;
            margin: 5px;
            display: inline-block;
            color: black;
            font-family: 'Proxima Nova';
            font-weight: 700;
            font-size: 16px;
            text-align: center;
            appearance: none;
        }

        select:checked+label {
            background-color: #45AFC6;
            cursor: default;
            color: #fff;
        }

        select:hover+label {
            background-color: #45AFC6;
            opacity: 0.5;
            cursor: default;
            color: #fff;
        }


        label.labelButtons {
            padding: 10px 20px;
            border: 3px solid #CFCFCF;
            border-radius: 50px;
            background-color: #fff;
            width: 100px;
            margin: 5px;
            display: inline-block;
            color: black;
            font-family: 'Proxima Nova';
            font-weight: 500;
            font-size: 16px;
            text-align: center;
            user-select: none;
        }

        input[type="radio"]:checked+label {
            background-color: #45AFC6;
            cursor: default;
            color: #fff;
        }

        input[type="radio"]:hover+label {
            background-color: #45AFC6;
            opacity: 0.5;
            cursor: default;
            color: #fff;
        }

        .callRep {
            width: 500px;
        }

        hr.solid {
            border-top: 2px solid #999;
        }

        .next {
            justify-content: end;
        }

        .previous {
            justify-content: end;
        }

        .registerEmailForm {
            display: none;
        }

        #previousFinishButton {
            display: none;
        }

        #submitFinishButton {
            display: none;
        }

        .monthSelect,
        .daySelect,
        .yearSelect,
        .incomeSelect {
            padding: 10px 30px 10px 20px;
            border: 3px solid #cfcfcf;
            border-radius: 50px;
            margin: 5px;
            box-sizing: border-box;
            font-family: 'Proxima Nova';
            color: #000;
            background-color: #fff;
            font-size: 16px;
            user-select: none;

            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            background-color: #fff;
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E');
            background-repeat: no-repeat, repeat;
            background-position: right .7em top 50%, 0 0;
            background-size: .65em auto, 100%;
        }

        .monthSelect:focus,
        .daySelect:focus,
        .yearSelect:focus,
        .incomeSelect:focus {
            border: 3px solid #45AFC6;
        }

        .stateSelect {
            padding: 10px 20px;
            border: 3px solid #cfcfcf;
            border-radius: 50px;
            margin: 5px;
            width: 100%;
            box-sizing: border-box;
            font-family: 'Proxima Nova';
            color: #000;
            background-color: #fff;
            font-size: 16px;
            user-select: none;

            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            background-color: #fff;
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E');
            background-repeat: no-repeat, repeat;
            background-position: right .7em top 50%, 0 0;
            background-size: .65em auto, 100%;
        }

        .stateSelect:focus {
            border: 3px solid #45AFC6;
        }

        .callRep {
            margin: -1.1rem 0 0 -5rem;
            width:
        }

        .informationSecure {
            padding: 0 20rem 0 20rem;
        }

        .inputMarginLeft {
            margin-left: 0.5rem;
        }

        .pr-md-3 {
            margin-right: 0.5rem;
        }

        .inputMarginSides {
            margin-right: 0.5rem;
            margin-left: 0.5rem;
        }

        .clickHere {
            width: 300px;
        }

        .btn-seePlans {
            border-radius: 50px;
            background-color: #3EB1B1;
            width: 250px;
            height: 60px;
            color: white;
            font-size: 25px;
            font-weight: 700;
        }

        .btn-seePlans:hover {
            opacity: 0.5;
            color: white;
        }

        #video-background {
            background-size: cover;
            width: 100%;
            height: 500px;
        }

        .dot {
            height: 25px;
            width: 25px;
            background-color: #0BDA51;
            border-radius: 50%;
            display: inline-block;
            animation: blink 2s infinite;
        }

        .dotNav {
            height: 17px;
            width: 17px;
            background-color: #0BDA51;
            border-radius: 50%;
            display: inline-block;
            animation: blink 2s infinite;
        }

        .realPeopleBG {
            background-image: url("realAnswerRealPeopleBG.png");
            background-position: center;
            background-size: cover;
        }

        .formContainerBackground {
            background-image: url("insuranceFormIMG4.png");
            background-position: center;
            background-size: cover;
        }

        .formContainerBackgroundMobile {
            display: none;
            margin-top: -2px;
            background-image: url("insuranceFormIMG5.png");
            background-position: center bottom;
            background-size: cover;
            width: 100%;
            height: 200px;
            ;
        }

        #registerEmailForm label {
            display: block;
        }

        .formCards {
            flex-direction: row;
        }

        #formShow {
            display: none;
        }

        @keyframes blink {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        @media screen and (max-width: 768px) {

            .qualifyHeaderText {
                font-size: 2rem;
            }


            .formCards {
                flex-direction: column;
            }

            .inputMarginLeft {
                margin-left: 0;
            }

            .pr-md-3 {
                margin-right: 0;
            }

            .inputMarginSides {
                margin-right: 0;
                margin-left: 0;
            }

            .header-logo {
                width: 300px;
            }

            .call-button {
                width: 250px;
                height: 50px;
                font-size: 20px;
            }

            .clickHere {
                width: 200px;
            }

            .callRep {
                width: 300px;
                padding: 0;
            }

            h1 {
                text-align: center;
            }

            h2 {

                text-align: center;
            }

            h3 {
                text-align: center;
            }

            h5 {
                text-align: center;
            }

            .form-card>.flex-row {
                text-align: center;
            }

            .form-card>.column {
                text-align: center;
            }

            footer.container li {
                text-align: center;
            }

            h3 {
                font-size: 2rem;
            }

            h5 {
                font-size: 1.5rem;
            }




        }

        @media screen and (max-width: 1200px) {
            .form1 {
                width: 100%;
            }

            .informationSecure {
                padding: 0 2rem 0 2rem;
            }

            .callRep {
                display: none;
            }

            .formContainerBackground {
                background-image: none;
            }

            .formContainerBackgroundMobile {
                display: block;
            }

        }
    </style>

    <!-- Form Styling -->

    <style>
        ::placeholder {
            color: lightgray;
            opacity: 1;
        }

        #heading {
            text-transform: uppercase;
            color: #45AFC6;
            font-weight: normal;
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px;
        }

        .form1 {
            background-image: url('formBackground.png');
            background-position: center;
            background-repeat: repeat-y;
        }

        #msform fieldset {
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        .form-card {
            text-align: center;
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform input,
        #msform textarea {
            padding: 10px 20px;
            border: 3px solid #cfcfcf;
            border-radius: 50px;
            margin: 5px;
            width: 100%;
            box-sizing: border-box;
            font-family: 'Proxima Nova';
            color: #000;
            background-color: #fff;
            font-size: 16px;
            user-select: none;
        }

        #msform input:focus,
        #msform textarea:focus {
            border: 3px solid #45AFC6;
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0;
        }



        #msform .action-button {
            width: 250px;
            background: #2d607e;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 50px;
            cursor: pointer;
            padding: 10px 5px;
        }

        #msform .action-button:focus {
            border: none;
        }


        #msform .yes-button:checked {
            background-color: #000000;
        }

        #msform .no-button:checked {
            background-color: #000000;
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            background-color: rgba(45, 96, 126, 0.5);
        }

        #msform .action-button-previous {
            width: 100px;
            background: #45AFC6;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 50px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px 10px 0px;
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            background-color: rgba(45, 96, 126, 0.5);
        }

        #msform h5 {
            margin-bottom: 0;
        }

        .card {
            z-index: 0;
            border: none;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #45AFC6;
            margin-bottom: 15px;
            font-weight: normal;
            text-align: left
        }

        .purple-text {
            color: #45AFC6;
            font-weight: normal;
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
            color: #45AFC6
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
            font-family: 'Proxima Nova';
            content: "\f13e"
        }

        #progressbar #personal:before {
            font-family: 'Proxima Nova';
            content: "\f007"
        }

        #progressbar #payment:before {
            font-family: 'Proxima Nova';
            content: "\f030"
        }

        #progressbar #confirm:before {
            font-family: 'Proxima Nova';
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
            background: #45AFC6
        }

        .progress {
            height: 20px;
            border-radius: 50px;
        }

        .progress-bar {
            background-color: #45AFC6
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }

        #submitFinishButton {
            margin: 10px 10px 50px 10px
        }

        @media screen and (max-width: 768px) {

            #msform input,
            #msform textarea,
            label.labelButtons,
            .monthSelect {
                font-size: 18px;
            }

            label.labelButtons {
                font-size: 18px;
            }
        }
    </style>

    <!-- Video Background Styles-->

    <style>
        .videobg {
            min-height: 450px;
            height: 50vh;
            overflow: hidden;
            position: relative;
            background: linear-gradient(0deg, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0.9) 100%);
        }

        video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            object-fit: cover;
        }
    </style>

</head>

<body onload="document.form1.email.focus()">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KGN22K8" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <!-- Navigation -->


    <div class="d-flex flex-column flex-md-row align-items-center p-3 " style="background-color: #45AFC6;">
        <div class="container">
            <div class="d-flex flex-row flex-wrap justify-content-center">
                <div class="mr-lg-auto d-flex flex-wrap justify-content-center">
                    <a href="index.php" class="p-0 m-0"><img class="pr-sm-2" style="width: 100px; height:auto;"
                            src="headerLogo2WhiteSVG.svg" alt="headerLogo"></a>
                    <a href="index.php" class="d-flex justify-content-center"><img style="width: 300px; height:auto;"
                            src="headerLogo3WhiteSVG.svg" alt="headerLogo"></a>
                </div>
                <div class="d-flex flex-row justify-content-center align-items-center flex-nowrap mt-xs-3 p-3">
                    <a href="tel:844-402-3909" style="color: white;">
                        <div class="d-flex flex-row flex-nowrap" style="text-align: left;">
                            <h3 style="padding-top: 2px; margin: 0;"><i class="fa fa-phone fa-3" aria-hidden="true"
                                    style="color: #fff;">
                                </i></h3>
                            <h3 style="color: #fff; margin: 0;">&nbsp;844-402-3909
                            </h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="formContainerBackgroundMobile ">
        <h1 class="d-flex flex-row justify-content-center align-content-center p-5 qualifyHeaderText"
            style="color: white;">Qualify for new
            Health Insurance in <?php echo $region; ?></h1>
    </div>
    <div class="d-flex flex-wrap justify-content-center formContainerBackground">

        <!-- Form -->

        <div class="flex-column form1 p-5">
            <form id="msform" name="registration" action="formSubmit.php" method="POST">

                <!-- Progress Bar -->

                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <br>

                <!-- FIELDSETS -->
                <!-- Fieldset Zip Code -->

                <fieldset name="zipCode" id="fieldset1">
                    <div class="form-card">
                        <div class="d-flex flex-column mb-2 justify-content-center align-content-center">
                            <h3 class="mb-2 text-align-center">Zip Code</h3>
                            <div class="text-align-center">
                                <input type="text" id="zip" name="zipCode" name="zipcode" class="text-center autoTab"
                                    style="width: 160px;" autofocus>
                                <div class="zip-error" style="display: none;">Please enter your Zip Code</div>
                            </div>
                        </div>
                    </div>
                    <input type="button" name="next" class="next action-button nextZip" value="Continue" />
                </fieldset>

                <!-- Fieldset Date of Birth -->

                <fieldset id="fieldset2">
                    <div class="form-card">
                        <div class="flex-row mb-2">
                            <h3 class="mb-2">Date of Birth</h3>
                            <div class="flex-row">
                                <select name="dob-month" class="monthSelect autoTab text-center" id="monthSelect"
                                    style="width: 140px;">
                                    <option value="00">Month</option>
                                    <option value="00" disabled>-----</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <select name="dob-day" class="daySelect autoTab text-center" id="daySelect"
                                    style="width: 140px;">
                                    <option value="00">Day</option>
                                    <option value="00" disabled>---</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                <select name="dob-year" class="yearSelect autoTab text-center" id="yearSelect"
                                    style="width: 140px;">
                                    <option value="00">Year</option>
                                    <option value="00" disabled>----</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965">1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                    <option value="1939">1939</option>
                                    <option value="1938">1938</option>
                                    <option value="1937">1937</option>
                                    <option value="1936">1936</option>
                                    <option value="1935">1935</option>
                                    <option value="1934">1934</option>
                                    <option value="1933">1933</option>
                                    <option value="1932">1932</option>
                                    <option value="1931">1931</option>
                                    <option value="1930">1930</option>
                                    <option value="1929">1929</option>
                                    <option value="1928">1928</option>
                                    <option value="1927">1927</option>
                                    <option value="1926">1926</option>
                                    <option value="1925">1925</option>
                                    <option value="1924">1924</option>
                                    <option value="1923">1923</option>
                                    <option value="1922">1922</option>
                                    <option value="1921">1921</option>
                                    <option value="1920">1920</option>
                                    <option value="1919">1919</option>
                                    <option value="1918">1918</option>
                                    <option value="1917">1917</option>
                                    <option value="1916">1916</option>
                                    <option value="1915">1915</option>
                                    <option value="1914">1914</option>
                                    <option value="1913">1913</option>
                                    <option value="1912">1912</option>
                                    <option value="1911">1911</option>
                                    <option value="1910">1910</option>
                                    <option value="1909">1909</option>
                                    <option value="1908">1908</option>
                                    <option value="1907">1907</option>
                                    <option value="1906">1906</option>
                                    <option value="1905">1905</option>
                                    <option value="1904">1904</option>
                                    <option value="1903">1903</option>
                                    <option value="1901">1901</option>
                                    <option value="1900">1900</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="dob-error" style="display: none;">Please enter your Date of Birth</div>
                    <!--<input type="button" name="previous" class="previous action-button-previous"
                        value="Previous" />-->
                    <input type="button" name="next" class="next action-button nextDOB" value="Continue" />

                </fieldset>

                <!-- Fieldset Third Step -->

                <fieldset id="fieldset3">
                    <div class="form-card">
                        <div class="column">
                            <div class="flex-row mb-2">
                                <h3 class="mb-2">Have you used tobacco products within the last 12 months?</h3>
                                <div class="flex-row">
                                    <input id="toggle-on-tobacco" name="tobacco" type="radio">
                                    <label class="labelButtons" for="toggle-on-tobacco">Yes</label>
                                    <input id="toggle-off-tobacco" name="tobacco" type="radio">
                                    <label class="labelButtons" for="toggle-off-tobacco">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-2 justify-content-center align-content-center">
                            <h3 class="mb-2 text-align-center">Estimated <script>
                                    document.write(new Date().getFullYear());
                                </script> household
                                income? (before taxes)</h3>
                            <div class="text-align-center">
                                <select name="income" class="incomeSelect autoTab text-center" id="incomeSelect"
                                    style="width: 220px;">
                                    <option value="">Monthly Income</option>
                                    <option value="" disabled>-----</option>
                                    <option value="01">Less than $20,000</option>
                                    <option value="02">$20,000 - $44,999</option>
                                    <option value="03">$45,000 - $139,999</option>
                                    <option value="04">$140,000 - $149,999</option>
                                    <option value="05">$150,000 - $199,999</option>
                                    <option value="06">$200,000+</option>
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="tobacco-error" style="display: none;">Please finish all questions</div>
                    <!--<input type="button" name="previous" class="previous action-button-previous" value="Previous" />-->
                    <input type="button" name="next" class="next action-button nextTobacco" value="Continue" />

                </fieldset>

                <!-- Fieldset Loading Screen -->

                <fieldset class="formBackground fieldsetLoading">
                    <div class="form-card m-5" id="loadingScreen">
                        <div class="column my-5">
                            <div class="flex-row my-5 user-select-none">
                                <div class="loader loader--style2" title="1">
                                    <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px"
                                        height="100px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
                                        xml:space="preserve">
                                        <path fill="#212529"
                                            d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                                            <animateTransform attributeType="xml" attributeName="transform"
                                                type="rotate" from="0 25 25" to="360 25 25" dur="0.6s"
                                                repeatCount="indefinite" />
                                        </path>
                                    </svg>
                                </div>
                                <h2 class="mb-2">Finding Quotes...</h2>
                                <h3 class="p-md-5">Thank you for answering! Currently finding the best health plans
                                    in <?php echo $region; ?>....</h3>
                            </div>
                        </div>
                    </div>
                    <!--<script>
                        function makeInvisible() {
                            function loadingScreen() {
                                document.getElementById("loadingScreen").style.display = "none";
                            }
                            window.setTimeout(loadingScreen, 3000)
                        }
                    </script>-->
                </fieldset>

                <!-- Fieldset First Name & Last Name -->

                <fieldset id="fieldset4">
                    <div class="form-card">
                        <div class="d-flex flex-column">
                            <h3 class="text-essentialBlue text-center" style="font-weight: 700;">There are <span
                                    id="randomNumber"></span> health plans available for you in
                                <?php echo $region; ?>!
                            </h3>
                            <h4 class="text-center mb-3">Confirm policy holder information below.</h4>
                            <div class="d-flex flex-row flex-wrap">
                                <div class="flex-column pr-md-3" style="flex-grow: 1;">
                                    <h5 class="flex-row mt-2">First Name</h5>
                                    <div class="flex-row">
                                        <input type="text" class="text-center name" name="first_name" placeholder="John"
                                            id="firstName" autocomplete="first name" required>
                                    </div>
                                </div>
                                <div class="flex-column inputMarginLeft" style="flex-grow: 1;">
                                    <h5 class="flex-row mt-2">Last Name</h5>
                                    <div class="flex-row">
                                        <input type="text" class="text-center name" name="last_name" placeholder="Smith"
                                            id="lastName" autocomplete="last name">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="name-error" style="display: none;">Please enter your Name</div>
                    <input type="button" name="next" class="next action-button mt-3 nextName" value="Continue" />
                    <!--<script>
                        function makeVisible() {
                            function contactForm() {
                                document.getElementById("formShow").style.display = "block";
                            }
                            window.setTimeout(contactForm, 3000)
                        }
                    </script>-->
                </fieldset>

                <!-- Fieldset Phone Number -->

                <fieldset id="fieldset5">
                    <div class="form-card">
                        <div class="d-flex flex-column">

                            <img src="thankYouIMG.png" class="img-fluid" style="border-radius: 10px;">
                            <h4 class="text-center my-3">Confirm policy holder information below.</h4>
                            <div class="d-flex flex-row flex-wrap">
                                <div class="flex-column text-center" style="flex-grow: 1;">
                                    <h5 class="flex-row mt-2">Phone Number</h5>
                                    <div class="flex-row">
                                        <input type="text" class="text-center" data-mask="000-000-0000"
                                            name="phone_number" id="phone_number" autocomplete="home tel"
                                            style="max-width: 300px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="phone-error" style="display: none;">Please enter your Phone Number</div>
                    <input type="button" name="next" class="next action-button mt-3 nextPhone" value="Continue" />
                </fieldset>

                <!-- Fieldset Email Address -->

                <fieldset id="fieldset6">
                    <div class="form-card">
                        <div class="column">

                            <img src="thankYouIMG.png" class="img-fluid" style="border-radius: 10px;">
                            <h4 class="text-center my-3">Confirm policy holder information below.</h4>
                            <div class="d-flex flex-row flex-wrap">
                                <div class="flex-column" style="flex-grow: 1;">
                                    <h5 class="flex-row mt-2">Email Address</h5>
                                    <div class="flex-row">
                                        <input type="text" class="text-center" name="email_address" id="email_address"
                                            placeholder="essential@healthinfo.com" autocomplete="home email"
                                            style="max-width: 300px;" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="email-error" style="display: none;">Please enter your Email Address</div>
                    <input type="button" name="next" class="next action-button mt-3 nextEmail" value="Continue" />
                </fieldset>

                <!-- Fieldset City -->

                <fieldset id="fieldset7">
                    <div class="form-card">
                        <div class="column">

                            <img src="thankYouIMG.png" class="img-fluid" style="border-radius: 10px;">
                            <h4 class="text-center my-3">Confirm policy holder information below.</h4>
                            <div class="d-flex flex-row flex-wrap">
                                <div class="flex-column" style="flex-grow: 1;">
                                    <h5 class="flex-row mt-2">City</h5>
                                    <div class="flex-row">
                                        <input type="text" class="text-center" name="city" id="city"
                                            placeholder="Newport Beach" autocomplete="city" style="max-width: 300px;"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="city-error" style="display: none;">Please enter your City</div>
                    <input type="button" name="next" class="next action-button mt-3 nextCity" value="Continue" />
                </fieldset>

                <!-- Fieldset Street Address -->

                <fieldset id="fieldset8">
                    <div class="form-card">
                        <div class="column">

                            <img src="thankYouIMG.png" class="img-fluid" style="border-radius: 10px;">
                            <h4 class="text-center my-3">Confirm policy holder information below.</h4>
                            <div class="d-flex flex-row flex-wrap">
                                <div class="flex-column" style="flex-grow: 1;">
                                    <h5 class="flex-row mt-2">Street Address</h5>
                                    <div class="flex-row">
                                        <input type="text" class="text-center" id="steet_address autocomplete" name="address"
                                            placeholder="244 Archbishop Flores Street"
                                            autocomplete="shipping street-address" style="max-width: 300px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="street-error" style="display: none;">Please enter your Street Address</div>
                    <input type="submit" name="Validate" id="submitFinishButton" class="submit action-button my-4"
                        value="Submit" formtarget="_self" style="display: inline-block;" />

                    <input id="ext_query" name="ext_query" type="hidden" value="" />
                    <p>
                        <small id="leadid_tcpa_disclosure">
                            By submitting this request, I provide my electronic consent to receive marketing &
                            telemarketing contact via automatic telephone dialing system, artificial/pre-recorded
                            messages, email, and text message from EssentialHealthInfo and <a target="_blank"
                                href="https://www.reservetechinc.com/marketingpartners.php"
                                class="text-essentialBlue">partners</a> at the
                            telephone number and email address I provide. I understand that my consent to receive
                            communications in this way is not required as a condition of purchasing goods or
                            services. Consent is not required to use this service.
                        </small>
                        <input id="leadid_token" name="universal_leadid" type="hidden" value="" />
                    </p>

                    <h5 class="text-center m-0">or</h5>
                    <h3 class="text-essentialBlue mt-3 pr-md-5 pl-md-5" style="font-weight: 700;">Call Today and
                        speak to a live
                        agent who can help you get the best plan now </h3>

                    <div class="d-flex flex-row justify-content-center align-items-center flex-wrap mt-1"
                        style="background-color: white; border-radius: 15px;">
                        <div class="d-flex flex-column">
                            <img class="d-flex mt-2 mb-2" style="margin: 0 auto; width: 200px;"
                                src="https://reserve-tech-assets.s3-us-west-2.amazonaws.com/essential-health-info-insurance-u65/callRep3IMG.png"
                                alt="Call Rep Image">
                        </div>
                        <div class="d-flex flex-column ml-md-5 ml-sm-3" style="text-align: left;">
                            <h2 style="color: #45AFC6; ">Alicia D.<span class="dot ml-3"></span></h2>
                            <h3 style="color: #aaaaaa; font-size: 1.5rem;">Available Right Now</h3>
                            <h3 style="color: #aaaaaa;">Licensed Agent in <?php echo $region; ?>
                            </h3>
                            <h3 style="color: #575757;"><a href="tel:844-402-3909" class="text-body"><i
                                        class="fa fa-phone"> </i> 844-402-3909</h3></a>
                        </div>
                    </div>
                </fieldset>

            </form>

        </div>
    </div>

    <h1 class="text-center mt-5 mb-2 mx-2 text-essentialBlue">Get Health Plans Quotes from Leading Carriers such as</h1>
    <img class="img-fluid d-block p-2" style="margin-left: auto; margin-right: auto;" src="healthProviders.png"
        alt="Health Providers">

    <div class="background-img-testimonials p-5 d-flex flex-wrap flex-row justify-content-center">
        <div class="flex-column d-flex p-2" style="width: 600px;">
            <h1 class="text-center mt-5 text-white">Is my information safe and secure?</h1>
            <h3 class="text-center mt-1 mb-5 text-white ">Yes! We pride ourselves in security. We understand
                that entering
                personal health information online can seem risky. That is why we utilize some of the most advanced
                techniques to ensure that your information does not fall into the wrong hands.</h3>
        </div>
        <div class="flex-column d-flex p-2" style="width: 600px;">
            <h1 class="text-center mt-5 text-white">We are commited to finding you the right health insurance</h1>
            <h3 class="text-center mt-5 mb-5 text-white">With our proprietary tools, articles, and agents we're here
                to
                help
                you
                find a
                plan.</h3>
        </div>
    </div>

    <!-- Real People -->

    <div class="videobg">
        <video autoplay loop muted>
            <source src="realPeopleBGVideo.mp4" type="video/mp4">
        </video>
        <div class="d-flex flex-wrap justify-content-center" style="height: 474px;">
            <div class="flex-column justify-content-center align-content-center p-xs-2" style="align-self: center;">
                <h1 class="px-3" style="color: #575757;"><span
                        style="font-family: 'Samble Tracie'; color: #7DBA63;">Real</span>
                    &nbsp;answers
                    from <span style="font-family:'Samble Tracie'; color: #7DBA63;">Real</span>
                    &nbsp;people.
                </h1>
                <h5 class="px-2" style="color: #575757; text-align: center;">Speak with a licensed insurance agent</h5>
                <a href="tel:+18444023909" style="color: #7DBA63;">
                    <h1 style="color: #7DBA63; text-align: center;">+1-844-402-3909</h1>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <footer class="container pt-5 footerContainer">
        <div class="row mb-4">

            <!-- Column 1 -->

            <div class="col-6 col-md">
                <h5>Company</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-body" href="https://www.reservetechinc.com/#our-sites" target="_blank">About
                            Us</a>
                    </li>
                    <li><a class="text-body" href="https://www.reservetechinc.com/#footer" target="_blank">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- Column 2 -->

            <div class="col-6 col-md">
                <h5>Legal</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-body" href="https://www.reservetechinc.com/privacypolicy.php"
                            target="_blank">Privacy Policy</a></li>
                    <li><a class="text-body" href="https://www.reservetechinc.com/ccpa-do-not-sell-my-information.php"
                            target="_blank">Do Not Sell My Information</a></li>
                    <li><a class="text-body" href="https://www.reservetechinc.com/termsandconditions.php"
                            target="_blank">Terms & Conditons</a></li>
                </ul>
            </div>

            <!-- Column 3 -->

            <div class="col-6 col-md">
                <h5>Questions?</h5>
                <ul class="list-unstyled text-small">
                    <li class="text-body">Speak with an expert</li>
                    <li><a href="tel:+1-844-402-3909" class="text-body">Call +1-844-402-3909</a></li>
                </ul>
            </div>
        </div>

        <!-- Footer Row -->

        <p class="text-center">At EssentialHealthInfo, we are strongly committed to protecting your
            privacy. As explained in our Truste-certified <a href="https://www.reservetechinc.com/privacypolicy.php"
                class="text-body">Privacy Policy</a> and our <a
                href="https://www.reservetechinc.com/termsandconditions.php" class="text-body">Terms &
                Conditions</a>, we do not sell,
            trade, or give away your personal information without your permissions, and we respect your choices
            about whether and how to receive marketing mesages from us.
            <br>
            <br>

            <!-- Copyright -->

            © Copyright <script>
                document.write(new Date().getFullYear());
            </script> EssentialHealthInfo, All rights reserved.
        </p>

        <!-- Trust Buttons -->

        <hr class="solid mt-5">
        <div class="row mt-5 mb-3 text-center" style="align-items: center;">
            <div class="col-4 themed-grid-col">
                <a href="https://www.trustpilot.com/search?query=Essential+Health+Info" target="_blank"><img
                        class="img-fluid"
                        src="https://reserve-tech-assets.s3-us-west-2.amazonaws.com/essential-health-info-insurance-u65/trustPilot.png"
                        alt="Trust Pilot">
                </a>
            </div>
            <div class="col-4 themed-grid-col">
                <a href="https://us.norton.com/small-business" target="_blank"><img class="img-fluid"
                        src="https://reserve-tech-assets.s3-us-west-2.amazonaws.com/essential-health-info-insurance-u65/norton.png"
                        alt="Norton">
                </a>
            </div>
            <div class="col-4 themed-grid-col">
                <a href="https://trustarc.com/truste-certifications/enterprise-privacy-certification/"
                    target="_blank"><img class="img-fluid"
                        src="https://reserve-tech-assets.s3-us-west-2.amazonaws.com/essential-health-info-insurance-u65/truste.png"
                        alt="Trust E">
                </a>
            </div>
        </div>

    </footer>
</body>

<script type="application/javascript">
    $(document).ready(() => {
        $("#ext_query").val(location.search);
    });
</script>

<!-- Form Script -->

<script>
    // Zip Code
    $('.nextZip').click(e => {
        e.preventDefault();
        checkValidation() ? e.default() : $('.zip-error').show()
    })

    var current = 1;
    var steps = $("fieldset").length;

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

    function checkValidation() {
        if ($('#zip').val().length == 5) {

            $('#fieldset1').hide().fadeOut(200);
            $('#fieldset2').show().fadeIn(200);

            setProgressBar(++current);

        } else {
            $('#fieldset2').hide().fadeOut(300);
        }


    }
</script>

<script>
    // Date of Birth

    $('.nextDOB').click(e => {
        e.preventDefault();
        checkValidationDOB() ? e.default() : $('.dob-error').show()
    })

    var current = 1;
    var steps = $("fieldset").length;
    /**var dobSelect = $('.monthSelect, .daySelect, .yearSelect');
    var monthSelect = $('.monthSelect');
    var daySelect = $('.daySelect');
    var yearSelect = $('.yearSelect');*/

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

    function checkValidationDOB() {
        if ($('select#monthSelect, select#daySelect, select#yearSelect').val() !== '00') {

            $('#fieldset2').hide();
            $('#fieldset3').show();

            setProgressBar(++current);

        } else {
            $('#fieldset3').hide();

        }
    }
</script>

<script>
    // Tobacco

    $('.nextTobacco').click(e => {
        e.preventDefault();
        checkValidationTobacco() ? e.default() : $('.tobacco-error').show()
    })

    var current = 1;
    var steps = $("fieldset").length;

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

    function checkValidationTobacco() {
        if ($('#incomeSelect').val() !== '') {

            $('#fieldset3').hide();
            $('.fieldsetLoading').show();

            setProgressBar(++current);
            setTimeout(function () {
                $('#fieldset4').show();
                $('.fieldsetLoading').hide();
            }, 3000);

        } else {
            $('.fieldsetLoading').hide();
        }
    }
</script>

<script>
    // First and Last Name

    $('.nextName').click(e => {
        e.preventDefault();
        checkValidationName() ? e.default() : $('.name-error').show()
    })

    var current = 1;
    var steps = $("fieldset").length;

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

    function checkValidationName() {
        if ($('#firstName, #lastName').val() !== '') {

            $('#fieldset4').hide();
            $('#fieldset5').show();

            setProgressBar(++current);

        } else {
            $('#fieldset5').hide();
        }

        if ($('.name').val() !== '') {

            $('#fieldset4').hide();
            $('#fieldset5').show();

            setProgressBar(++current);

        } else {
            $('#fieldset5').hide();
        }
    }
</script>

<script>
    // Phone Number

    $('.nextPhone').click(e => {
        e.preventDefault();
        checkValidationPhone() ? e.default() : $('.phone-error').show()
    })

    var current = 1;
    var steps = $("fieldset").length;

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

    function checkValidationPhone() {
        if ($('#phone_number').val().length > 11) {

            $('#fieldset5').hide();
            $('#fieldset6').show();

            setProgressBar(++current);

        } else {
            $('#fieldset6').hide();
        }
    }
</script>

<script>
    // Email Address

    $('.nextEmail').click(e => {
        e.preventDefault();
        checkValidationEmail() ? e.default() : $('.email-error').show()
    })

    var current = 1;
    var steps = $("fieldset").length;
    var email = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

    function checkValidationEmail() {
        if ($('#email_address').val().length > 5) {

            $('#fieldset6').hide();
            $('#fieldset7').show();

            setProgressBar(++current);

        } else {
            $('#fieldset7').hide();
        }
    }
</script>

<script>
    // City

    $('.nextCity').click(e => {
        e.preventDefault();
        checkValidationCity() ? e.default() : $('.city-error').show()
    })

    var current = 1;
    var steps = $("fieldset").length;

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

    function checkValidationCity() {
        if ($('#city').val().length > 3) {

            $('#fieldset7').hide();
            $('#fieldset8').show();

            setProgressBar(++current);

        } else {
            $('#fieldset8').hide();
        }
    }
</script>

<script>
    // Street Address

    $('#submitFinishButton').click(e => {
        e.preventDefault();
        checkValidationStreet() ? e.default() : $('.street-error').show()
    })

    var current = 1;
    var steps = $("fieldset").length;

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

    function checkValidationSteet() {
        if ($('#street_address').val().length > 5) {
            function (form) {
                submit.form();
            }

        } else {
            $('#fieldset8').show();
            $('.street-error').show();
        }
    }
</script>

<!-- Validation Script 1 -->
<!--
<script type="text/javascript">
    $(".submit").click(function () {
        $("form[name='registration']").validate({
            rules: {
                address: "required";
                
            },
            messages: {
                address: "Please enter your Street Address";
            },
            submitHandler: function (form) {
                submit.form();
            }
        });

    });
</script>-->

<!-- Prevent Submission of form prior to complete Script 
& Allows Enter to pressed once input field are inputted into to continue on to the next screen-->

<script type="text/javascript">
    $('form input').keydown(function (e) {
        if (e.keyCode == 13) {
            var inputs = $(this).parents("form").eq(0).find(":input");
            if (inputs[inputs.index(this) + 1] != null) {
                inputs[inputs.index(this) + 1].click();
            }
            e.preventDefault();
            return false;
        }
    });
</script>

<!-- Validation Mask for Zip, Phone Number, Birth Date, and Household IncomeScript -->

<script type="text/javascript">
    $(document).ready(() => {
        // define the selections + definitions + placeholders
        const selections = ['#zip', '#phone_number', '#birthmonth', '#birthday', '#birthyear',
            '#householdIncome'
        ];
        const definitions = ['00000', '000-000-0000', '00', '00', '0000', '0000000000'];
        const placeholders = ['00000', '880-880-8800', 'MM', 'DD', 'YYYY', '$ Amount in Dollars'];

        // go through the selections
        for (let i = 0; i < selections.length; i++) {
            $(selections[i]).mask(definitions[i], {
                placeholder: placeholders[i]
            });
        }
    });
</script>


<!-- Validation Mask Script for First Name, Last Name, and City -->

<script type="text/javascript">
    $('#firstName').mask('Z', {
        translation: {
            'Z': {
                pattern: /[a-zA-Z ]/,
                recursive: true
            }
        }
    });
    $('#lastName').mask('Z', {
        translation: {
            'Z': {
                pattern: /[a-zA-Z ]/,
                recursive: true
            }
        }
    });
    $('#cty').mask('Z', {
        translation: {
            'Z': {
                pattern: /[a-zA-Z ]/,
                recursive: true
            }
        }
    });
</script>

<script type="text/javascript">
    document.getElementById("randomNumber").textContent = Math.floor(Math.random() * 19) + 7;
</script>



<script type="text/javascript">
    (function () {
        var field = 'xxTrustedFormCertUrl';
        var provideReferrer = false;
        var tf = document.createElement('script');
        tf.type = 'text/javascript';
        tf.async = true;
        tf.src = 'http' + ('https:' == document.location.protocol ? 's' : '') +
            '://api.trustedform.com/trustedform.js?provide_referrer=' + escape(provideReferrer) + '&field=' +
            escape(field) + '&l=' + new Date().getTime() + Math.random();
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(tf, s);
    })();
</script>
<noscript>
    <img src="http://api.trustedform.com/ns.gif" />
</noscript>
<script id="LeadiDscript" type="text/javascript">
    // <!--
    (function () {
        var s = document.createElement('script');
        s.id = 'LeadiDscript_campaign';
        s.type = 'text/javascript';
        s.async = true;
        s.src = '//create.lidstatic.com/campaign/0bb0b35a-f2a4-e1fa-0393-a6ecd47edbb6.js?snippet_version=2';
        var LeadiDscript = document.getElementById('LeadiDscript');
        LeadiDscript.parentNode.insertBefore(s, LeadiDscript);
    })();
    // -->
</script>

<script>
let placeSearch;
let autocomplete;
const componentForm = {
  street_number: "short_name",
  route: "long_name",
  locality: "long_name",
  administrative_area_level_1: "short_name",
  country: "long_name",
  postal_code: "short_name",
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
    document.getElementById("autocomplete"),
    { types: ["geocode"] }
  );
  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(["address_component"]);
  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener("place_changed", fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  const place = autocomplete.getPlace();

  for (const component in componentForm) {
    document.getElementById(component).value = "";
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (const component of place.address_components) {
    const addressType = component.types[0];

    if (componentForm[addressType]) {
      const val = component[componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition((position) => {
      const geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude,
      };
      const circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy,
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
</script>

<noscript><img
        src='//create.leadid.com/noscript.gif?lac=01b5e64b-4416-eef2-b800-b8bb1bea31dc&lck=0bb0b35a-f2a4-e1fa-0393-a6ecd47edbb6&snippet_version=2' /></noscript>

</html>