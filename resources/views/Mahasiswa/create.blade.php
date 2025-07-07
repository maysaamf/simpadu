@extends('template.main')
@section('content')
  <main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Mahasiswa</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Data Mahasiswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Main-->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Data Prodi</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ url('mahasiswa') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" name="NIM" id="nim" class="form-control @error('NIM') is-invalid @enderror">
                                @error('NIM')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>                                    
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>                                    
                                @enderror 
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Mahasiswa</label>
                            <input type="text" name="Nama" id="nama" class="form-control @error('Nama') is-invalid @enderror">
                                @error('Nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>                                    
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggalLahir" class="form-label">Tanggal Lahir Mahasiswa</label>
                            <input type="date" name="Tanggal_Lahir" id="tanggalLahir" class="form-control @error('Tanggal_Lahir') is-invalid @enderror">
                                @error('Tanggal_Lahir')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>                                    
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="telp" class="form-label">Telp</label>
                            <input type="text" name="No_hp" id="No_hp" class="form-control @error('No_hp') is-invalid @enderror">
                                @error('No_hp')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>                                    
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>                                    
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="id" class="form-label">Prodi</label>
                            <select class="form-select" name="id" id="id">
                               @foreach ($prodi as $p) 
                               <option value="{{ $p->id }}">{{ $p->Nama  }}</option>
                                   
                               @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto" class="form-label">Upload Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                                @error('foto')
                        <div class="invalid-feedback">
                            {($message)}
                        </div>                                    
                                @enderror 
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url("/mahasiswa") }}" class="btn btn-warning">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
    </div>
</main>  
@endsection