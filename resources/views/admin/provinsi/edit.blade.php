@extends('layouts.master')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action=" {{ route('provinsi.update', $provinsi->id) }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <input type="hidden" name="" id="">
                            <div class="form-group">
                                <label for="">Masukkan Kode Provinsi</label>
                                <input type="number" class="form-control" name="kode_provinsi" value="{{ $provinsi->kode_provinsi }}" required>
                                @if ($errors->has('kode_provinsi'))
                                <span class="text-danger">{{ $errors->first('kode_provinsi') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Masukkan Nama Provinsi</label>
                                <input type="text" class="form-control" name="nama_provinsi" value="{{ $provinsi->nama_provinsi }}" required>
                                @if ($errors->has('nama_provinsi'))
                                <span class="text-danger">{{ $errors->first('nama_provinsi') }}</span>
                                @endif
                            </div>
                        <div class="form-group">
                            <button class="btn btn-primary"  type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection