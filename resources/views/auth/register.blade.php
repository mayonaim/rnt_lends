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
                <form action="{{ route('user.store') }}" method="POST">
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
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username"
                                autocomplete="off" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password" required="">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                        <a href="{{ route('home') }}" class="btn btn-link">Kembali</a>
                    </div>
                </form>
            </div>
        </div>

        <style>
            body {
                background-color: #008b91;
            }
        </style>

    @endpush
