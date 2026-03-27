<div class="card my-5">

    <div class="card-body">
        <h4 class="mb-3 f-w-400">Registrasi</h4>

        @if (session()->has('error'))
        <span class="text-danger ">
            {{ session('error') }}
        </span>
        @endif

        <form wire:submit.prevent="registrasi">
            <div class="mb-3 text-start">
                <div class="input-group mb-1">
                    <span wire:ignore class="input-group-text"><i data-feather="user"></i></span>
                    <input type="text" class="form-control" placeholder="Nama" wire:model="name" />
                </div>
                @error('name')
                <small class="text-danger ">{{ $message }}</small>
                @enderror
            </div>
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
                Registrasi
            </button>
        </form>

        <p class="mb-2">
            Sudah memiliki akun?
            <a href="{{ url('/login') }}" class="f-w-400">Login</a>
        </p>
    </div>

</div>