<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>JtiNova</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="{{ asset('jti/assets/images/logopolije.png') }}" />
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <!-- Main Style -->
    <link href="{{ asset('jti/style.css') }}" rel="stylesheet">
    <style>
        #mu-form-pendaftaran {
            padding-top: 50px;
            padding-bottom: 50px;
            margin-top: 20px;
        }

        .mu-form-area {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .mu-heading-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group .nama-label {
            width: 150px; /* Lebar label */
            display: inline-block; /* Mengatur label dan input agar berada dalam satu baris */
            text-align: left;
            margin-right: 520px;
        }

        .form-group .nim-label {
            width: 80px; /* Lebar label */
            display: inline-block; /* Mengatur label dan input agar berada dalam satu baris */
            text-align: left;
            margin-right: 580px;
        }

        .form-group .alamat-label {
            width: 100px; /* Lebar label */
            display: inline-block; /* Mengatur label dan input agar berada dalam satu baris */
            text-align: left;
            margin-right: 580px;
        }

        .btn-daftar {
            width: 100%;
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-daftar:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <!-- Start Header -->
    <header id="mu-hero">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light mu-navbar">
                <!-- Text based logo -->
                <a class="navbar-brand mu-logo" href="index.html"><img src="{{ asset('jti/assets/images/logo.png') }}"
                        alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mu-navbar-nav">
                        <li class="nav-item active">
                            <a href="index.html">News</a>
                        </li>
                        <li class="nav-item"><a href="#mu-portfolio">Portfolio</a></li>
                        <li class="nav-item"><a href="#mu-training">Training</a></li>
                        <li class="nav-item"><a href="#mu-training">Pendampingan TA</a></li>
                        <li class="nav-item"><a href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- Start Form Pendaftaran Pelatihan -->
    <section id="mu-form-pendaftaran">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="mu-form-area">
                        <h2 class="mu-heading-title">Form Pendaftaran Pelatihan</h2>
                        <form class="mu-contact-form">
                            <div class="form-group">
                                <label for="nama" class="nama-label">Nama Lengkap:</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="nim" class="nim-label">NIM:</label>
                                <input type="text" class="form-control" id="nim" name="nim" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="alamat-label">Alamat:</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-daftar">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Form Pendaftaran Pelatihan -->

    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
</body>

</html>
