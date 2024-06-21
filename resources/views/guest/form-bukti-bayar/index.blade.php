<div class="card">
    <div class="card-header">
        <h4>Upload Bukti Pembayaran</h4>
    </div>
    <div class="card-body">

        <!-- Start Form Bukti Pembayaran -->
        @role('user-pendampingan') 
        @php $url = 'transaction.pendampingan'; @endphp
        @endrole    
        @role('user-pelatihan') 
            @php $url = 'transaction.pelatihan'; @endphp
        @endrole
        <!-- Nomor Rekening (Statis) -->
        <div class="alert alert-light">
            <p>Silakan transfer ke rekening berikut:</p>
            <p><strong>Bank BNI</strong></p>
            <p><strong>No. Rekening: 1234567890</strong></p>
            <p><strong>Atas Nama: PT. Pendidikan Teknologi Informasi</strong></p>
        </div>
        <form action="{{ route($url, auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="bukti_pembayaran">Upload Bukti Pembayaran:</label>
                <input type="file" class="form-control-file" name="bukti_pembayaran" id="foto_profile"
                    onchange="previewImage(this);" readonly>
                <img id="gambar-preview" src="#" alt="Gambar Pratinjau"
                    style="max-width: 50%; margin-top:10px; display: none;">
            </div>

            <!-- Button Simpan -->
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
    </div>
</div>
<!-- End Form Bukti Pembayaran -->


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
