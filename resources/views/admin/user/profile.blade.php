@extends('admin.layouts.app')
@section('konten')
    <style>
        .img-account-profile {
            width: 200px;
            height: 200px;
            border: 2px solid #ddd;
            border-radius: 50%;
            margin: 0 auto;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e6f7ff;
        }

        .container-xl {
            max-width: 1000px;
            padding: 10px;
            margin: 0 auto;
        }

        .card {
            background-color: #f5f5f5;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            margin-bottom: 10px;
        }


        .card-header {
            padding: 10px 15px;
            background-color: #99ccff;
            color: #333;
            font-weight: bold;
        }



        .card-body {
            padding: 15px;
        }


        .img-account-profile {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 50%;
            margin: 0 auto 10px;
        }


        .mb-3 {
            margin-bottom: 15px;
        }

        /* Label */
        .small,
        label {
            font-size: 0.875em;
            color: #333;
            margin-bottom: 5px;
        }

        /* Button */
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 15px;
        }
    </style>
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Foto Profil</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2 img-fluid"
                            src="{{ asset('admin/fotos/' . $user->foto) }}" alt="">
                        <!-- Profile picture upload button-->
                        <div class="mb-3">
                            <h4>{{ $user->name }}</h4>
                            <p class="text-secondary mb-1">{{ $user->role }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Detail Akun</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('profile/' . $user->id) }}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Nama Lengkap</label>
                                <input class="form-control  @error('name') is-invalid @enderror" name="name"
                                    id="inputUsername" type="text" placeholder="Masukan Nama Lengkap"
                                    value="{{ $user->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" name="email"
                                    id="inputEmailAddress" type="email" placeholder="Masukan Alamat Email"
                                    value="{{ $user->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="old_password">Password Lama</label>
                                <input class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                                    id="old_password" type="password" placeholder="Masukan Password Lama">
                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="password">Password Baru</label>
                                <input class="form-control @error('password') is-invalid @enderror" name="password"
                                    id="password" type="password" placeholder="Masukan Password Baru">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="password">Ulangi Password Baru</label>
                                <input class="form-control" id="password" type="password"
                                    placeholder="Ulangi Masukan Password Baru" name="password_confirmation">
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="password">Foto</label>
                                <input type="file" class="form-control" name="foto" accept=".png, .jpg, .jpeg, .svg" value="{{ $user->foto }}">
                            </div>


                            <div class="mb-3">
                                {{-- <label class="small mb-1" for="password">Role</label> --}}
                                <input class="form-control" name="role" id="role" type="hidden"
                                    placeholder="Masukan Role" value="{{ $user->role }}">
                            </div>


                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Perbarui Profil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
