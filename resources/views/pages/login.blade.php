@extends("layouts.master")
@section('title', 'Login')
@section('content')
<section class="login-page">
    <div class="login-form-box">
        <div class="login-title">
            Login aways
        </div>
        <div class="login-form">

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="email">email</label>
                    <input type="email" id="email" name="email" 
                    class="@error('email')
                    has-error @enderror"
                    placeholder="admin@gmail.com">
                    @error('email')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="password"> Password</label>
                    <input type="password" id="password" name="password" 
                    placeholder="*******">
                </div>
                
                <div class="field">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection




