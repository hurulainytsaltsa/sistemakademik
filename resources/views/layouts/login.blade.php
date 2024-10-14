@extends('layouts.main')
@section('content')

    <div class="row justify-content-center">
        <div class="col-4">
            <main class="form-signin w-100 m-auto">
                <form method="POST" action="/login">
                    {{-- //csrf untuk validasi form. kalau tidak pakai csrf form tidak bsa di proses --}}
                    @csrf
                  <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
                  <div class="form-floating mb-2">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
                    <label for="floatingInput">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                  </div>

                  <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Remember me
                    </label>
                  </div>
                  <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
                  <p class="mt-5 mb-3 text-body-secondary text-center">&copy; <?= date('Y') ?></p>
                </form>
              </main>
        </div>
    </div>

@endsection
