@extends('layouts.master')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action=" {{ route('rw.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="">Masukkan Nama rw</label>
                                <input type="text" class="form-control" name="nama_rw" required>
                            </div>
                            <div class="form-group">
                                <label for="">desa</label>
                                <select class="form-control"  name="id_desa" id="">
                                    @foreach ($desa as $item)
                                        <option value=" {{$item->id}} "> {{$item->nama_desa}} </option>
                                    @endforeach
                                </select>
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