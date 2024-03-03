@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="w-25 mt-5 rounded p-4 shadow-lg">
            <h1 class="text-center mb-5">Register</h1>
            <form action="{{route ('register.process')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is_invalid @enderror"
                    id="name" name="name" placeholder="example">

                    @error('nama')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nis " class="form-label">NIS</label>
                    <input type="number" class="form-control @error('nis') is_invalid @enderror"
                    id="nis" name="nis" placeholder="12345678">

                    @error('nis')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is_invalid @enderror"
                    id="Email" name="email" placeholder="example@email.com">

                    @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is_invalid @enderror"
                    id="password" name="password" placeholder="Password">

                    @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-3 mt-3">Register</button>

            </form>
        </div>
    </div>
@endsection
