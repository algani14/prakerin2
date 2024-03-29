@extends('layouts.master')
@section('konten')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    @include('flash-message')
                    <div class="card-header py-3">
                        <h10 class="m-0 font-weight-bold text-primary">
                            Data Provinsi
                            <a href=" {{ route('provinsi.create') }} " class="btn btn-primary"
                                style="float: right;">Tambah
                                Data</a>
                            <form class="navbar-search mt-3 cari-none" action="{{ URL::current() }}" method="GET">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Cari ...." type="text" name="cari"
                                            value="{{ request('cari') }}">
                                    </div>
                                </div>
                            </form>
                        </h10>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama provinsi</th>
                                        <th>Kode provinsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($provinsi as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td> {{ $item->nama_provinsi }} </td>
                                            <td> {{ $item->kode_provinsi }} </td>
                                            <td>
                                                <center>
                                                    <form action="{{ route('provinsi.destroy', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('Delete')
                                                        <a class="btn btn-outline-info btn-sm"
                                                            href=" {{ route('provinsi.edit', $item->id) }} "><i
                                                                class="fa fa-edit"></a></i>

                                                        </a>
                                                        <a class="btn btn-outline-success btn-sm"
                                                            href=" {{ route('provinsi.show', $item->id) }} "><i
                                                                class="fa fa-eye"></a></i>

                                                        </a>
                                                        <button type="submit" class="btn btn-outline-danger btn-sm"><i
                                                                class="fa fa-trash-alt"></a></i></button>
                                                    </form>
                                                </center>
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
@endsection
