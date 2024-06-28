@extends('layouts.admin.app')
@section('title', 'Tambah Role')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Role</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('role.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="name" class="col-form-label">Nama Role<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="permission">Permissions</label>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                    <div class="col-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="permission-{{ $permission->id }}"
                                                name="permissions[]" value="{{ $permission->name }}" @if (is_array(old('permissions')) && in_array($permission->id, old('permissions'))) checked @endif>
                                            <label class="custom-control-label" for="permission-{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('role.index') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                        <div class="clone invisible" style="display: none;">
                            <div class="input-group mb-3">
                                <input type="file" name="foto[]" class="form-control">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-danger btn-remove"><i class="fas fa-minus-square"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    
<script>
    $(document).ready(function() {
        $(".btn-add").click(function(){ 
            var html = $(".clone").html();
            $(".increment").after(html);
        });
        $("body").on("click",".btn-remove",function(){ 
            $(this).parents(".input-group").remove();
        });
    });
</script>
@endpush
