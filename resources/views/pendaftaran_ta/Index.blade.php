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
        /* Custom CSS untuk form pendaftaran */
        #form-pendaftaran {
            margin-top: 100px; /* Jarak antara header navbar dan form */
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            max-width: 800px; /* Menentukan lebar maksimum form */
            margin-left: auto; /* Mengatur posisi form ke tengah */
            margin-right: auto; /* Mengatur posisi form ke tengah */
            font-family: Arial, sans-serif; /* Mengubah font menjadi Arial atau font sans-serif lainnya */
        }

        #form-pendaftaran .form-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }


        #form-pendaftaran .form-group label {
            font-weight: bold;
            width: 200px; /* Menentukan lebar label */
            flex-shrink: 0; /* Tetapkan lebar label agar tidak menyusut */
        }

        #form-pendaftaran .form-control {
            flex-grow: 1; /* Menyesuaikan input untuk mengisi sisa ruang */
            max-width: calc(100% - 50px); /* Menyesuaikan lebar maksimum input */
        }

        /* Tambahkan jarak antara form dan footer */
        #mu-footer {
            margin-top: 50px;
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

    <!-- Start Form Pendaftaran -->
    <section id="form-pendaftaran">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="text-center mb-4">Biodata Pendampingan TA</h2>
                    <form action="{{ route('bukti_bayar') }}" method="GET">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="ttl">Tempat Tanggal Lahir:</label>
                            <input type="text" class="form-control" id="ttl" name="ttl" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="telepon">No. Telepon:</label>
                            <input type="tel" class="form-control" id="telepon" name="telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama:</label>
                            <input type="text" class="form-control" id="agama" name="agama" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Terakhir:</label>
                            <input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan:</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                        </div>
                        <div class="form-group">
                            <label for="ktp">Upload KTP (opsional):</label>
                            <input type="file" class="form-control-file" id="ktp" name="ktp">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Form Pendaftaran -->

    <!-- Start footer -->
    <footer id="mu-footer">
        <div class="mu-footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="mu-single-footer">
                            <img class="mu-footer-logo" src="{{ asset('jti/assets/images/logo.png') }}"
                                alt="logo">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus. </p>
                            <div class="mu-social-media">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a class="mu-twitter" href="#"><i class="fa fa-twitter"></i></a>
                                <a class="mu-pinterest" href="#"><i class="fa fa-pinterest-p"></i></a>
                                <a class="mu-google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                                <a class="mu-youtube" href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mu-single-footer">
                            <h3>Twitter feed</h3>
                            <ul class="list-unstyled">
                                <li class="media">
                                    <span class="fa fa-twitter"></span>
                                    <div class="media-body">
                                        <p><strong>@b_jtinova</strong> Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing
                                            elit.</p>
                                        <a href="#">2 hours ago</a>
                                    </div>
                                </li>
                                <li class="media">
                                    <span class="fa fa-twitter"></span>
                                    <div class="media-body">
                                        <p><strong>@_jtinov</strong> Lorem ipsum dolor sit amet, consectetuer adipiscing
                                            elit.</p>
                                        <a href="#">2 hours ago</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mu-single-footer">
                            <h3>Company</h3>
                            <ul class="mu-useful-links">
                                <li><a href="#">News</a></li>
                                <li><a href="#">Training</a></li>
                                <li><a href="#">Portfolio</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mu-single-footer">
                            <h3>Contact Information</h3>
                            <ul class="list-unstyled">
                                <li class="media">
                                    <span class="fa fa-home"></span>
                                    <div class="media-body">
                                        <p>Jln. Mastrip, Jember State Polytechnic</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <span class="fa fa-phone"></span>
                                    <div class="media-body">
                                        <p>+62 8123 6753 8976</p>
                                        <p>+62 8213 4562 9876</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <span class="fa fa-envelope"></span>
                                    <div class="media-body">
                                        <p>jtinova@gmail.com</p>
                                        <p>jtinoa@polije.ac.id</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mu-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mu-footer-bottom-area">
                            <p class="mu-copy-right">&copy; Copyright <a rel="nofollow" href="http://markups.io">jti
                                    nova</a>. All right reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer -->

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