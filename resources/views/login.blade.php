<!doctype html>
<html lang="en">

<head>
    <title>LABSIMPOLTEKBANG || Login</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/img/plane-icon.jpg">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assetslogin/css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(assetslogin/images/bg-poltekbang.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login Administrator</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{$item}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="/proseslogin" method="POST" class="signin-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="nomorinduk" class="form-control" placeholder="Nomor Induk">
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" name="password" class="form-control" placeholder="Password">
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="assetslogin/js/jquery.min.js"></script>
    <script src="assetslogin/js/popper.js"></script>
    <script src="assetslogin/js/bootstrap.min.js"></script>
    <script src="assetslogin/js/main.js"></script>
    

</body>

</html>