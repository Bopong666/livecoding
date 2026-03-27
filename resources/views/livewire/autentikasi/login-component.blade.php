<div class="card my-5">

    <div class="card-body">
        <h4 class="mb-3 f-w-400">Login</h4>

        @if (session()->has('error'))
        <span class="text-danger ">
            {{ session('error') }}
        </span>
        @endif

        <form wire:submit.prevent="login">
            <div class="mb-3 text-start">
                <div class="input-group mb-1">
                    <span wire:ignore class="input-group-text"><i data-feather="user"></i></span>
                    <input type="email" class="form-control" placeholder="Email" wire:model="email" />
                </div>
                @error('email')
                <small class="text-danger ">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 text-start">
                <div class="input-group mb-1">
                    <span wire:ignore class="input-group-text"><i data-feather="lock"></i></span>
                    <input type="password" class="form-control" placeholder="Password" wire:model="password" />
                </div>
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-4">
                Login
            </button>
        </form>

        <p class="mb-2">
            Tidak punya akun?
            <a href="{{ url('/registrasi') }}" class="f-w-400">Register</a>
        </p>
    </div>

</div>