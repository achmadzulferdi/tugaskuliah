<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="form-group">
                                <label class="font-weight-bold">KEGIATAN</label>
                                <input type="text" class="form-control @error('kegiatan') is-invalid @enderror" name="kegiatan" value="{{ old('kegiatan', $post->kegiatan) }}" placeholder="Nama Kegiatan">
                            
                                <!-- error message untuk title -->
                                @error('kegiatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal', $post->tanggal) }}" placeholder="Tanggal Kegiatan">
                            
                                <!-- error message untuk title -->
                                @error('tanggal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Pukul</label>
                                <input type="time" class="form-control @error('jam') is-invalid @enderror" name="jam" value="{{ old('jam', $post->jam) }}" placeholder="Waktu Kegiatan">
                            
                                <!-- error message untuk title -->
                                @error('jam')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Tempat Kegiatan</label>
                                <input type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat" value="{{ old('tempat', $post->tempat) }}" placeholder="Tempat Kegiatan">
                            
                                <!-- error message untuk title -->
                                @error('keterangan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Pelaksana</label>
                                <input type="text" class="form-control @error('pelaksana') is-invalid @enderror" name="pelaksana" value="{{ old('pelaksana', $post->pelaksana) }}" placeholder="Pelaksana / Yang ditugaskan">
                            
                                <!-- error message untuk title -->
                                @error('keterangan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                                                    
                            <div class="form-group">
                                <label class="font-weight-bold">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="5" placeholder="Keterangan Catatan Kegiatan">{{ old('keterangan', $post->keterangan) }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('keterangan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>