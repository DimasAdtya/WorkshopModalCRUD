@extends('layout.master')
@section('content')
@include('sweetalert::alert')
<div class="px-3 py-2 border-bottom mb-3">
  <div class="container d-flex flex-wrap justify-content-center">
    <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search" method="get" action="/">
      <input type="text" name="cari" class="form-control w-75 d-inline" id="search" placeholder="Masukkan NIS Siswa">
      <button type="submit" class="btn btn-success">Cari</button>
    </form>
  </div>
</div>
<div class="container">
    <h3 class="mt-4">Data Siswa 
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSiswa">Tambah</button>
        {{-- modal target=tambahSiswa --}}
    </h3>
    <div class="table-responsive">
        <table class="table table-hover table-borderless">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Olah Data</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;?>
                @foreach ($data as $dt)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$dt->nis}}</td>
                    <td>{{$dt->nama}}</td>
                    <td>{{$dt->kelas}}</td>
                    <td>{{$dt->jenis_kelamin}}</td>
                    <td>{{$dt->telp}}</td>
                    <td>{{$dt->alamat_domisili}}</td>
                    <td><img src="{{asset('foto/'.$dt->foto)}}" width="29%" ></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubah{{$dt->id}}">Ubah</button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus{{$dt->id}}">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Modal Tambah Data-->
<div class="modal fade" id="tambahSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="tambahSiswa">Tambah Data Siswa</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">    
            <form id="create-depot-form" action="/" method="post" enctype='multipart/form-data'>
                @csrf
                <div class="row g-1">
                  <div class="col-md">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="nis" placeholder="Masukan NIS">
                      <label for="inputNis" class="form-label">NIS</label>
                    </div>
                  </div>
                </div><br>
                <div class="row g-1">
                    <div class="col-md">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="nm" placeholder="Masukan Nama">
                        <label for="inputNama">Nama</label>
                      </div>
                    </div>
                </div><br>
                <div class="row g-1">
                  <div class="col-md">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="kls" placeholder="Kelas Anda">
                      <label for="inputKelas" class="form-label">Kelas</label>
                    </div>
                  </div>
                </div><br>
                <div class="row g-1">
                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" name="jkl">
                            <option selected>Pilih Jenis Kelamin Anda</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                          </select>
                          <label for="Select-optionJenis-kelamin" class="form-label">Jenis Kelamin</label>
                      </div>
                    </div>
                </div><br>
                <div class="row g-1">
                    <div class="col-md">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="tlp" placeholder="No. Telp/HP">
                        <label for="inputTelp" class="form-label">No Telp/HP</label>
                      </div>
                    </div>
                </div><br>
                <div class="row g-1">
                    <div class="col-md">
                      <div class="form-floating">
                        <input type="textarea" class="form-control" name="alamat" placeholder="Alamat Domisili Anda">
                        <label for="inputAlamat" class="form-label">Alamat Domisili</label>
                      </div>
                    </div>
                </div><br>
                <div class="row g-1">
                  <div class="md-3">
                      <label for="inputFoto">Foto Siswa:</label>
                      <img id="preview-image-before-upload" alt="preview foto" style="max-height: 200px">
                      <br>
                      <input type="file" class="form-control" id="image" name="foto">
                  </div>
              </div><br>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
      </div>
    </div>
  </div>
<!-- Modal Hapus Data -->
@foreach($data as $ds)
<div class="modal fade" id="hapus{{$ds->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Siswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 class="text-center">Apakah anda yakin menghapus data siswa
          <span>
            <font color="blue">{{$ds->nama}}</font>
          </span>
        </h4>
      </div>
      <div class="modal-footer">
        <form action="/{{$dt->id}}" method="POST">
        @csrf
        @method('delete')
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak Jadi</button>
        <button type="submit" class="btn btn-danger">Hapus!</button>
      </form>
    </div>
  </div>
</div>
</div>
@endforeach
<!-- Modal Ubah Data-->
<div class="modal fade" id="ubah{{$dt->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="tambahSiswa">Ubah Data Siswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">    
          <form id="create-depot-form" action="/{{$dt->id}}" method="post" enctype='multipart/form-data'>
              @csrf
              @method('PUT')
              <div class="row g-1">
                <div class="col-md">
                  <div class="form-floating">
                    <input type="text" class="form-control" value="{{$dt->nis}}" name="nis" placeholder="Masukan NIS">
                    <label for="inputNis" class="form-label">NIS</label>
                  </div>
                </div>
              </div><br>
              <div class="row g-1">
                  <div class="col-md">
                    <div class="form-floating">
                      <input type="text" class="form-control" value="{{$dt->nama}}" name="nm" placeholder="Masukan Nama">
                      <label for="inputNama">Nama</label>
                    </div>
                  </div>
              </div><br>
              <div class="row g-1">
                <div class="col-md">
                  <div class="form-floating">
                    <input type="text" class="form-control" value="{{$dt->kelas}}" name="kls" placeholder="Kelas Anda">
                    <label for="inputKelas" class="form-label">Kelas</label>
                  </div>
                </div>
              </div><br>
              <div class="row g-1">
                  <div class="col-md">
                    <div class="form-floating">
                      <select class="form-select" name="jkl">
                          <option value="{{$dt->jenis_kelamin}}" >Pilih Jenis Kelamin Anda</option>
                          <option value="laki-laki">Laki-Laki</option>
                          <option value="perempuan">Perempuan</option>
                        </select>
                        <label for="Select-optionJenis-kelamin" class="form-label">Jenis Kelamin</label>
                    </div>
                  </div>
              </div><br>
              <div class="row g-1">
                  <div class="col-md">
                    <div class="form-floating">
                      <input type="text" class="form-control" value="{{$dt->telp}}" name="tlp" placeholder="No. Telp/HP">
                      <label for="inputTelp" class="form-label">No Telp/HP</label>
                    </div>
                  </div>
              </div><br>
              <div class="row g-1">
                  <div class="col-md">
                    <div class="form-floating">
                      <textarea class="form-control" name="alamat" placeholder="Alamat Domisili Anda">{{$dt->alamat_domisili}}
                      </textarea>
                      <label for="inputAlamat" class="form-label">Alamat Domisili</label>
                    </div>
                  </div>
              </div><br>
              <div class="row g-1">
                <div class="col-md">
                    <label for="inputFoto">Foto Siswa:</label>
                      <img id="preview-gambar-ubah" alt="preview foto" style="max-height: 200px">
                    <br>
                    <input class="form-control" type="file" id="gambarUbah" name="foto">
                </div>
            </div><br>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

          </form>
      </div>
    </div>
  </div>
</div>

{{-- Script Untuk Preview Image Sebelum Tambah/Update Data  --}}

{{-- preview image bagian tambah data --}}
<script type="text/javascript">
  $(document).ready(function (e) {
      $('#image').change(function () {
          let reader = new FileReader();
          reader.onload = (e) => {
              $('#preview-image-before-upload').attr('src', e.target.result);
          };
          reader.readAsDataURL(this.files[0]);
      });
  });
</script>
{{-- preview image bagian update data --}}
<script type="text/javascript">
  $(document).ready(function (e) {
      $('#gambarUbah').change(function () {
          let reader = new FileReader();
          reader.onload = (e) => {
              $('#preview-gambar-ubah').attr('src', e.target.result);
          };
          reader.readAsDataURL(this.files[0]);
      });
  });
</script>

@endsection