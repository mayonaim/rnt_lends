@extends('layouts.app')
@push('body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card mx-auto" style="max-width: 400px; margin-top: 100px;">
        <div class="card-head">
            <div class="d-flex justify-content-center align-items-center">
                <img src="{{ asset('/img/logo.jpg') }}" width="200px">
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center align-items-center">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <select name="role" id="role" class="form-control" required>
                            <option value="borrower">Peminjam</option>
                            <option value="supervisor">Penanggung Jawab</option>
                            <option value="pic">PIC Lab</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" value="{{ old('username', isset($_COOKIE['username']) ? $_COOKIE['username'] : '') }}" name="username" id="username" placeholder="Username" autocomplete="off" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>

                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" required="">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <input class="form-check-input me-2" type="checkbox" value="remember_me" id="remember_me" name="remember_me">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Ingatkan saya
                            </label>
                        <button type="submit" class="btn btn-primary btn-block">Masuk Akun
                        </button>
                        <a href="{{ route('register') }}" class="btn btn-link">Buat Akun Baru</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #008b91;
        }
    </style>

@endpush
