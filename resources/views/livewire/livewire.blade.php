<div>
    <div class="form-group row ">
        <div class="col-md-6">
        <label for="provinsi">Provinsi</label>
            <select wire:model="selectedProvinsi" class="form-control">
                <option value="" selected>Pilih Provinsi</option>
                @foreach($provinsi as $provinsis)
                    <option value="{{ $provinsis->id }}">{{ $provinsis->nama_provinsi }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
             <label for="reaktif">Reaktif</label>
            <input type="text" value="@if(isset($kasus1)){{$kasus1->reaktif}}@endif" class="form-control" name="reaktif" required>
        </div>
        </div> 

        <div class="form-group row ">
            <div class="col-md-6">
    
            <label for="Kota">Kota</label>
                <select wire:model="selectedKota" class="form-control">
                    <option value="" selected>Pilih Kota</option>
                    @foreach($kota as $kotas)
                        <option value="{{ $kotas->id }}">{{ $kotas->nama_kota }}</option>
                    @endforeach
                </select>
   
            </div>
            <div class="col-md-6">
                <label for="Positif">Positif</label>
                <input type="text" class="form-control" value="@if(isset($kasus1)){{$kasus1->positif}}@endif"  name="positif" required>
            </div>
        </div>
        <div class="form-group row ">
            <div class="col-md-6">
    
            <label for="kecamatan">Kecamatan</label>
                <select wire:model="selectedKecamatan" class="form-control">
                    <option value="" selected>Pilih Kecamatan</option>
                    @foreach($kecamatan as $kecamatans)
                        <option value="{{ $kecamatans->id }}">{{ $kecamatans->nama_kecamatan }}</option>
                    @endforeach
                </select>
   
            </div>
            <div class="col-md-6">
                <label for="sembuh">Sembuh</label>
                <input type="text" class="form-control" value="@if(isset($kasus1)){{$kasus1->sembuh}}@endif" name="sembuh" required>
            </div>
        </div>
        <div class="form-group row ">
            <div class="col-md-6">
    
            <label for="Desa" >Kelurahan</label>
                <select wire:model="selectedDesa" class="form-control">
                    <option value="" selected>Pilih Kelurahan</option>
                    @foreach($desa as $desas)
                        <option value="{{ $desas->id }}">{{ $desas->nama_desa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="meninggal">Meninggal</label>
                <input type="text" class="form-control" value="@if(isset($kasus1)){{$kasus1->meninggal}}@endif" name="meninggal" required>
            </div>
        </div>
        <div class="form-group row ">
            <div class="col-md-6">
    
            <label for="rw" >Rw</label>
                <select wire:model="selectedRw" class="form-control" name="id_rw">
                    <option value="" selected>Pilih Rw</option>
                    @foreach($rw as $rws)
                        <option value="{{ $rws->id }}">{{ $rws->nama_rw }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" value="@if(isset($kasus1)){{$kasus1->tanggal}}@endif"
                 name="tanggal" required>
            </div>
        </div>
</div>