@include('flash-message')
<div>
    <div class="form-group row ">
        <div class="col-md-6">
            <label for="provinsi">Provinsi</label>
            <select wire:model="selectedProvinsi" class="form-control">
                <option value="" selected>Pilih Provinsi</option>
                @foreach ($provinsi as $provinsis)
                    <option value="{{ $provinsis->id }}">{{ $provinsis->nama_provinsi }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="positif">Positif</label>
            <input type="text" value="@if (isset($kasus1)) {{ $kasus1->positif }} @endif"
                class="form-control @error('positif') is-invalid @enderror" name="positif" id="positif"
                placeholder="Masukkan Positif ..." value="{{ old('positif') }}">
            @error('positif') <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row ">
        <div class="col-md-6">

            <label for="Kota">Kota</label>
            <select wire:model="selectedKota" class="form-control">
                <option value="" selected>Pilih Kota</option>
                @foreach ($kota as $kotas)
                    <option value="{{ $kotas->id }}">{{ $kotas->nama_kota }}</option>
                @endforeach
            </select>

        </div>
        <div class="col-md-6">
            <label for="sembuh">Sembuh</label>
            <input type="text" value="@if (isset($kasus1)) {{ $kasus1->sembuh }} @endif" class="form-control @error('sembuh') is-invalid @enderror" name="sembuh" id="sembuh"
                placeholder="Masukkan Sembuh ..." value="{{ old('sembuh') }}">
            @error('sembuh') <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group row ">
        <div class="col-md-6">

            <label for="kecamatan">Kecamatan</label>
            <select wire:model="selectedKecamatan" class="form-control">
                <option value="" selected>Pilih Kecamatan</option>
                @foreach ($kecamatan as $kecamatans)
                    <option value="{{ $kecamatans->id }}">{{ $kecamatans->nama_kecamatan }}</option>
                @endforeach
            </select>

        </div>
        <div class="col-md-6">
            <label for="meninggal">Meninggal</label>
            <input type="text" value="@if (isset($kasus1)) {{ $kasus1->meninggal }} @endif"
                class="form-control @error('meninggal') is-invalid @enderror" name="meninggal" id="meninggal"
                placeholder="Masukkan Meninggal ..." value="{{ old('meninggal') }}">
            @error('meninggal') <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group row ">
        <div class="col-md-6">

            <label for="Desa">Kelurahan</label>
            <select wire:model="selectedDesa" class="form-control">
                <option value="" selected>Pilih Kelurahan</option>
                @foreach ($desa as $desas)
                    <option value="{{ $desas->id }}">{{ $desas->nama_desa }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" value="@if (isset($kasus1)) {{ $kasus1->tanggal }} @endif" name="tanggal" required>
        </div>
    </div>
    <div class="form-group row ">
        <div class="col-md-6">

            <label for="rw">Rw</label>
            <select wire:model="selectedRw" class="form-control" name="id_rw">
                <option value="" selected>Pilih Rw</option>
                @foreach ($rw as $rws)
                    <option value="{{ $rws->id }}">{{ $rws->nama_rw }}</option>
                @endforeach
            </select>
        </div>

    </div>
</div>
