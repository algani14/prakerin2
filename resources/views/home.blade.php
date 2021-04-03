@extends('layouts.master')

@section('konten')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">

                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-sm-6 mb-3">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Positif</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $positif }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="ml-auto"> <img src="../img2/emoji-LWx.png" width="50" height="50"
                                                alt="Positif">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6 mb-3">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Sembuh</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $sembuh }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="ml-auto"> <img src="../img2/happy-ipM.png" width="50" height="50"
                                                alt="Sembuh">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6 mb-3">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Meninggal</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $meninggal }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="ml-auto"> <img src="../img2/sad-u6e.png" width="50" height="50"
                                                alt="Meninggal">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6 mb-3">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Positif Dunia</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo
                                            $posglobal['value']; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="ml-auto"> <img src="../img2/dunia.png" width="50" height="50"
                                                alt="Meninggal">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cards">
        <div class="container">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-14">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            DATA CORONAVIRUS BERSKALA GLOBAL
                        </h3>
                    </div>
                    <div class="card-body">
                        <div style="height:600px; overflow:auto; margin:15px;">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Negara</th>
                                                <th>Positif</th>
                                                <th>Sembuh</th>
                                                <th>Meninggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($dunia as $data)
                                                <tr>
                                                    <td> <?php echo $no++; ?></td>
                                                    <td>
                                                        <?php echo $data['attributes']['Country_Region']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo
                                                        number_format($data['attributes']['Confirmed']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo
                                                        number_format($data['attributes']['Recovered']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo
                                                        number_format($data['attributes']['Deaths']); ?>
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

    <!-- Page content -->

@endsection
