<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- font-awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    @livewireStyles
    <title>Hello, world!</title>
    <style>
        .f-25{
            font-size: 18px;
            letter-spacing: .3px;
        }

         p{
            margin-bottom: 0;
        }
        .form-control:focus{
            border-color:#CCC;
            outline:0;
            -webkit-box-shadow:none;
            box-shadow:none;
        }
        .pointer{
            cursor: pointer;
        }
    </style>
</head>
<body class="my-5 container" style="background-color: #F8F8F8;">
    <section>
        <h2>2 minutest to place your Order</h2>
        <p class="f-25 text-muted">We accept payment through credit card, debit card or PayPal. You will be sent access to your customer panel upon receiving your order.</p>
    </section>
    
    <livewire:order_form />

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('backend/js/bootstrap-checkbox.js') }}"></script>
    @livewireScripts
</body>
</html>
