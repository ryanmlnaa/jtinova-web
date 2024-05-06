@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="section-body">
                    <h2 class="section-title">Hallo, {{ $user->name }}</h2>
                    <p class="section-lead">
                        Semoga harimu menyenangkan!
                    </p>

                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-5">
                            <div class="card profile-widget">
                                <div class="profile-widget-description">
                                    <div class="profile-widget-name">{{ $user->name }} <div
                                            class="text-muted d-inline font-weight-normal">
                                            <div class="slash"></div> {{ $user->keahlian }}
                                        </div>
                                    </div>
                                    {{ $user->bio }}
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-7">
                            <div class="card">
                                @if (session('success'))
                                    <div style="color: green;">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form method="post" action="{{ route('user.profile.update') }}">
                                    <div class="card-header">
                                        <h4>Edit Profile</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" value="{{ $user->name }}"
                                                required="">
                                            <div class="invalid-feedback">
                                                Please fill in the name
                                            </div>
                                            @error('name')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{ $user->email }}"
                                                required="">
                                            <div class="invalid-feedback">
                                                Please fill in the email
                                            </div>
                                            @error('email')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Keahlian</label>
                                            <input type="text" class="form-control" value="{{ $user->keahlian }}"
                                                required="">
                                            <div class="invalid-feedback">
                                                Please fill in the Keahlian
                                            </div>
                                            @error('email')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label>Bio</label>
                                                <textarea class="form-control summernote-simple"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            </div>
        </div>
    </div>
    </div>


@endsection
