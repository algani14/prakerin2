<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kawal Corona</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo.jpeg') }}" rel="icon">
    <link href="{{ asset('assets/img/logo-icon.jpeg') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: BizLand - v1.2.1
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


    <!-- ======= Header ======= -->
    <header id="header" class="top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="index.html">Kawal Corona</a></h1>

            <nav class="nav-menu d-none d-lg-block navbar-fixed-top">
                <ul>
                    <li class="active"><a href="http://127.0.0.1:8000/">Halaman Utama</a></li>
                    <li class="drop-down"><a href="">Kasus Data</a>
                        <ul>
                            <li><a href="#provinsi">Kasus Data Lokal</a></li>
                            <li><a href="#global">Kasus Data Global</a></li>
                        </ul>
                    </li>
                    <li><a href="#faq">About</a></li>
                    <li><a href="#contact">Kontak</a></li>

                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Kawal Corona
            </h1>
            <h2>Coronavirus Global & Indonesia Live Data</h2>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <div class="ml-auto"> <img src="../img2/emoji-LWx.png" width="50" height="50" alt="Positif">
                            </div> <br>
                            <h5>
                                <p>Jumlah Positif Indonesia</p>
                            </h5>
                            <span data-toggle="counter-up">{{ $positif }}</span>
                            <p>Orang</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <div class="ml-auto"> <img src="../img2/happy-ipM.png" width="50" height="50" alt="Sembuh">
                            </div> <br>
                            <h5>
                                <p>Jumlah Sembuh Indonesia</p>
                            </h5>
                            <span data-toggle="counter-up">{{ $sembuh }}</span>
                            <p>Orang</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <div class="ml-auto"> <img src="../img2/sad-u6e.png" width="50" height="50" alt="Meninggal">
                            </div> <br>
                            <h5>
                                <p>Jumlah Meninggal Indonesia</p>
                            </h5>
                            <span data-toggle="counter-up">{{ $meninggal }}</span>
                            <p>Orang</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <div class="ml-auto"> <img src="../img2/dunia.png" width="50" height="50" alt="Meninggal">
                            </div>
                            <br>
                            <h5>
                                <p>Jumlah Total Positif di Dunia</p>
                            </h5>
                            {{-- <span data-toggle="counter-up"><?php echo $posglobal['value']; ?></span> --}}
                            <p>Orang</p>
                        </div>
                    </div>

                </div><br><br>

                <div class="col text-center">
                    <h6>
                        <p>Update terakhir : {{ $tanggal }}</p>
                    </h6>
                </div>
            </div>
        </section><!-- End Counts Section -->

        <!-- ======== Table Section ======== -->
        <section id="provinsi" class="provinsi">
            <div class="container">
                <div class="row row-cards">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-14">
                        <div class="card">
                            <div class="card-header ">
                                <h3 class="card-title">Data Kasus Coronavirus di Indonesia Berdasarkan Provinsi</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar col-lg-12">
                                        <table class="table table-bordered table-hover mb-0 text-nowrap css-serial">
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                        <center>No</center>
                                                    </th>
                                                    <th scope="col">
                                                        <center>Provinsi</center>
                                                    </th>
                                                    <th scope="col">
                                                        <center>Jumlah Positif</center>
                                                    </th>
                                                    <th scope="col">
                                                        <center>Jumlah Sembuh</center>
                                                    </th>
                                                    <th scope="col">
                                                        <center>Jumlah Meninggal</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp

                                                @foreach ($tampil as $tmp)
                                                    <tr>
                                                        <th scope="row">
                                                            <center>{{ $no++ }}</center>
                                                        </th>
                                                        <td>
                                                            <center>{{ $tmp->nama_provinsi }}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{ number_format($tmp->Positif) }}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{ number_format($tmp->Sembuh) }}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{ number_format($tmp->Meninggal) }}</center>
                                                        </td>
                                                    </tr>

                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======== End Table Section ======== -->

        <!-- ======== Table Section Global ======= -->
        {{-- <section id="global" class="global">
            <div class="container">
                <div class="row row-cards">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-14">
                        <div class="card">
                            <div class="card-header ">
                                <center>
                                    <h3 class="card-title">Kasus Coronavirus Global</h3>
                                </center>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar col-lg-12">
                                        <table class="table table-bordered table-hover mb-0 text-nowrap css-serial">
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                        <center>No</center>
                                                    </th>
                                                    <th scope="col">
                                                        <center>Negara</center>
                                                    </th>
                                                    <th scope="col">
                                                        <center>Jumlah Positif</center>
                                                    </th>
                                                    <th scope="col">
                                                        <center>Jumlah Sembuh</center>
                                                    </th>
                                                    <th scope="col">
                                                        <center>Jumlah Meninggal</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($dunia as $data)
                                                    <tr>
                                                        <td> <?php echo $no++; ?></td>
                                                        <td> <?php echo $data['attributes']['Country_Region']; ?>
                                                        </td>
                                                        <td> <?php echo number_format($data['attributes']['Confirmed']); ?>
                                                        </td>
                                                        <td><?php echo number_format($data['attributes']['Recovered']); ?>
                                                        </td>
                                                        <td><?php echo number_format($data['attributes']['Deaths']); ?>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- ======== End Table Section Global ======= -->


        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Tentang</h2>
                    <h3>Keterangan Tentang Virus Korona <span>
                </div>

                <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">

                    <li>
                        <a data-toggle="collapse" class="" href="#faq1">Apa itu Coronavirus? <i
                                class="icofont-simple-up"></i></a>
                        <div id="faq1" class="collapse" data-parent=".faq-list">
                            <p>
                                COVID-19 (coronavirus disease 2019) adalah penyakit yang disebabkan oleh jenis
                                coronavirus baru yaitu Sars-CoV-2,
                                yang dilaporkan pertama kali di Wuhan Tiongkok pada tanggal 31 Desember 2019.
                                COVID-19 ini dapat menimbulkan gejala gangguan pernafasan akut seperti demam
                                diatas
                                38°C,
                                batuk dan sesak nafas bagi manusia.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq2" class="collapsed">Bagaimana Coronavirus menular? <i
                                class="icofont-simple-up"></i></a>
                        <div id="faq2" class="collapse" data-parent=".faq-list">
                            <p>
                                Penularan terjadi melalui droplet (butir-butir tetesan cairan) dari hidung atau
                                mulut
                                yang menyebar saat pembawa virus COVID-19 batuk, bersin atau meler.
                                Tetesan cairan tersebut akan menempel pada benda atau permukaan di sekitarnya.
                                Dan
                                kemudian masuk ke mulut, hidung atau mata.
                                Atau menyentuh permukaan bekas terkena butir cairannya dengan tangan lalu tangan
                                mengusap mulut, hidung atau mata.
                                Inilah alasan pentingnya sering-sering cuci tangan dan jangan menyentuh muka
                                dengan
                                tangan. <br>

                                Orang sehat dapat tertular saat tangan mereka menyentuh permukaan yang terkena
                                tetesan
                                tersebut dan kemudian tanpa sadar menyentuh mata,
                                mulut, ataupun hidung (selaput lendir). Virus juga bisa masuk saat orang sehat
                                secara
                                tidak sengaja menghirup tetesan cairan saat si pembawa virus batuk atau bersin.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq3" class="collapsed">Kita harus bagaimana? <i
                                class="icofont-simple-up"></i></a>
                        <div id="faq3" class="collapse" data-parent=".faq-list">
                            <p>
                                1. Ketika keluar rumah, pakailah masker. <br>
                                2. Jika bersin, tutup mulut dan hidung dengan tisu dan buang tisunya sesegera
                                mungkin.
                                <br>
                                3. Rajinlah mencuci tangan dengan sabun atau pembersih tangan berbasis alkohol
                                min.
                                60%
                                <br>
                                4. Jaga jarak dengan orang yang tampak sakit sepanjang kurang lebih 1 meter <br>
                                5. Jika sakit, pastikan untuk tidak menyebarkan virus ke orang lain dengan
                                mengurangi
                                bepergian.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq4" class="collapsed">Jika seseorang terinfeksi virus
                            ini,
                            berapa lama sampai muncul gejala? <i class="icofont-simple-up"></i></a>
                        <div id="faq4" class="collapse" data-parent=".faq-list">
                            <p>
                                Masa inkubasi (dari masuknya virus ke dalam tubuh sampai munculnya gejala awal)
                                adalah 1
                                – 14 hari, dengan rata-rata timbulnya gejala selama 5 hari.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq5" class="collapsed">Seberapa banyak pasien yang
                            akan
                            mengalami gejala serius? <i class="icofont-simple-up"></i></a>
                        <div id="faq5" class="collapse" data-parent=".faq-list">
                            <p>
                                Dari data yang tersedia saat ini, kita belum bisa menyimpulkan secara persis
                                seberapa
                                parah wabah COVID-19 ini.
                                Tingkat keparahan dan mortalitas suatu wabah juga akan sangat tergantung pada
                                kapasitas
                                sistem kesehatan publik setempat dalam menangani kasus yang ada.
                                Namun, temuan awal mengindikasikan bahwa tingkat keparahan COVID-19 lebih rendah
                                dibandingkan SARS.
                                Berdasarkan data dari 44 ribu pasien yang dirilis oleh Centre of Disease Control
                                di
                                Tiongkok,
                                proporsi pasien dengan gejala ringan/serius/kritis dan tingkat kematiannya
                                adalah
                                sebagai berikut: <br><br>
                                -Gejala ringan seperti flu biasa: 81% (tingkat kematian: 0) <br>
                                -Gejala lebih serius seperti sesak napas dan pneumonia (radang paru-paru): 14%
                                (tingkat
                                kematian: 0) <br>
                                -Perlu masuk ICU dengan kondisi kritis karena gagal pernapasan, syok septik, dan
                                gagal
                                multi-organ: 5% (tingkat kematian: 50%)
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq6" class="collapsed">Apa yang harus saya sampaikan
                            kepada
                            tenaga medis jika saya batuk pilek demam dan sulit bernafas? <i
                                class="icofont-simple-up"></i></a>
                        <div id="faq6" class="collapse" data-parent=".faq-list">
                            <p>
                                1. Riwayat perjalanan (jika ada, ke Tiongkok atau negara-negara yang sudah
                                terjangkit
                                COVID-19, seperti Singapura, Jepang, Korea Selatan, dan Italia) <br>
                                2. Kapan gejala mulai timbul <br>
                                3. Adakah kontak selama 14 hari terakhir dengan seseorang yang memiliki gejala
                                pernapasan dan baru datang dari salah satu daerah yang ditemukan memiliki kasus
                                COVID-19
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Kontak</h2>
                    <h3><span>Kontak Kami</span></h3>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bx bx-map"></i>
                            <h3>Alamat Kami</h3>
                            <p>Jl. Situ Tarate</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Kami</h3>
                            <p>info@smkassalaambandung.sch.id</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Nomor Kami</h3>
                            <p>022 5420-220</p>
                        </div>
                    </div>

                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-6 ">
                        <iframe class="mb-4 mb-lg-0" src="https://goo.gl/maps/o1csNgqLTSCNomgi8" frameborder="0"
                            style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                    </div>

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="form-row">
                                <div class="col form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" data-rule="minlen:4"
                                        data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" data-rule="email"
                                        data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" data-rule="minlen:4"
                                    data-msg="Please enter at least 8 chars of subject" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required"
                                    data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-8 footer-contact">
                        <h3>Kawal Corona</h3>
                        <p>
                            Jl. Situ Tarate, Cibaduyut Raya <br>
                            Kec. Dayeuhkolot<br>
                            Kabupaten Bandung <br><br>
                            <strong>Telefon:</strong> 022 5420-220<br>
                            <strong>Email:</strong> info@smkassalaambandung.sch.id<br>
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-8 footer-links">
                        <h4>Link yang Berguna</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#provinsi">Data Kasus Indonesia</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Data Kasus Global</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#faq">Tentang</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#contact">Kontak</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-8 footer-links">
                        <h4>Media Sosial Kami</h4>
                        <p>Ini dianatara nya media sosial kami</p>
                        <div class="social-links mt-6">
                            <a href="https://www.facebook.com/smkassalaam/" class="facebook"><i
                                    class="bx bxl-facebook"></i></a>
                            <a href="https://www.instagram.com/smkassalaam/" class="instagram"><i
                                    class="bx bxl-instagram"></i></a>
                            <a href="https://twitter.com/smkassalaam/" class="twitter"><i
                                    class="bx bxl-twitter"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Kawal Corona</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
                Designed by <a href="https://smkassalaambandung.sch.id/">SMK ASSALAAM BANDUNG</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
