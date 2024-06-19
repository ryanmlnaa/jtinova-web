<div class="card col-6 mx-auto">
    <div class="card-header">
        <h4>Silakan Lengkapi Administrasi Pembayaran</h4>
    </div>
    <div class="card-body">

        <!-- Start Form Bukti Pembayaran -->
        @role('user-pendampingan') 
        @php $url = 'transaction.pendampingan'; @endphp
    @endrole    
        @role('user-pelatihan') 
            @php $url = 'transaction.pelatihan'; @endphp
    @endrole
        <form action="{{ route($url, auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Nomor Rekening (Statis) -->
            <div class="row">
                <div class="form-group col-12">
                    <label for="nomor_rekening">Nomor Rekening:</label>
                    <input type="text" class="form-control" value="1234567890">
                </div>
            </div>
            <div class="row">
                <!-- Upload Bukti Pembayaran -->
                <div class="form-group col-12">
                    <label for="bukti_pembayaran">Upload Bukti Pembayaran:</label>
                    <input type="file" class="form-control-file" name="bukti_pembayaran" id="foto_profile"
                        onchange="previewImage(this);" readonly>
                    <img id="gambar-preview" src="#" alt="Gambar Pratinjau"
                        style="max-width: 50%; margin-top:10px; display: none;">
                </div>
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
