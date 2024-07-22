@extends('layouts.guest.app')
@section('content')
    <div class="section-header">
        <h1>Selamat Datang {{ Auth::user()->name }}</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Upload Bukti Pembayaran</h4>
            </div>
            <div class="card-body">
                <div class="alert alert-light">
                    <p>Silakan transfer ke rekening berikut:</p>
                    <p><strong>Bank Mandiri</strong></p>
                    <p><strong>No. Rekening: 1430029775978</strong></p>
                    <p><strong>Atas Nama: JTI Polije</strong></p>
                    <br>
                    <p>Perlu Bantuan? Hubungi Kami: </p>
                    <a href="https://wa.me/6285183002639"><strong>Admin: +62 851-8300-2639</strong></a>
                </div>
                <form action="{{ route('transaction.bayar.update', Request::segment(3)) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="bukti_pembayaran">Upload Bukti Pembayaran:</label>
                        <input type="file" class="form-control-file" name="bukti_pembayaran" id="foto_profile"
                            onchange="previewImage(this);" required>
                        <img id="gambar-preview" src="#" alt="Gambar Pratinjau"
                            style="max-width: 50%; margin-top:10px; display: none;">
                    </div>

                    <!-- Button Simpan -->
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImage(input) {
            var preview = document.getElementById('gambar-preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }
    </script>
@endpush
