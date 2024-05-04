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
        /* Custom CSS untuk form bukti pembayaran */
        #form-bukti-pembayaran {
            margin-top: 100px; /* Jarak antara header navbar dan form */
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            max-width: 800px; /* Menentukan lebar maksimum form */
            margin-left: auto; /* Mengatur posisi form ke tengah */
            margin-right: auto; /* Mengatur posisi form ke tengah */
            font-family: Arial, sans-serif; /* Mengubah font menjadi Arial atau font sans-serif lainnya */
        }

        #form-bukti-pembayaran .form-group {
            margin-bottom: 20px;
        }

        #form-bukti-pembayaran label {
            font-weight: bold;
        }

        #form-bukti-pembayaran p.form-control-static {
            padding-top: 7px;
            padding-bottom: 7px;
            margin-top: 7px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            background-color: #e9ecef;
        }

        #form-bukti-pembayaran input[type="file"] {
            border: 1px solid #ced4da;
            border-radius: 4px;
            background-color: #ffffff;
            padding: 10px;
        }

        #form-bukti-pembayaran button[type="submit"] {
            padding: 10px 20px;
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
    <!-- End Header -->

    <!-- Start Form Bukti Pembayaran -->
    <section id="form-bukti-pembayaran">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="text-center mb-4">Form Bukti Pembayaran</h2>
                    <form>
                        <!-- Nomor Rekening (Statis) -->
                        <div class="form-group">
                            <label for="nomor_rekening">Nomor Rekening:</label>
                            <p class="form-control-static">1234567890</p>
                        </div>
                        <!-- Upload Bukti Pembayaran -->
                        <div class="form-group">
                            <label for="bukti_pembayaran">Upload Bukti Pembayaran:</label>
                            <input type="file" class="form-control-file" id="bukti_pembayaran" name="bukti_pembayaran" required>
                        </div>
                        <!-- Button Simpan -->
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Form Bukti Pembayaran -->

    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function(){
            $('form').submit(function(){
                window.location.href = "{{ route('bukti_bayar') }}";
            });
        });
    </script>
    
</body>

</html>