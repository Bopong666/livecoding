@section('title')
Data Course
@endsection

<div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-body">
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content collapse show" style="min-height: 100vh">
                            <div class="card-body card-dashboard">
                                <a href="{{ url('course/create') }}" class="btn btn-primary">

                                    Tambah Course</a>


                                <div class="m-2">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" wire:model.live.debounce.500ms="search"
                                            placeholder="Cari title" name="page-header-search-input2">
                                    </div>
                                </div>
                                <div class="mx-2" style="white-space: nowrap; overflow-x: auto;">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($list as $key => $item)
                                            <tr>
                                                <td class="text-center">
                                                    {{ ($list->currentpage()-1)*$list->perpage() + $loop->index + 1}}
                                                </td>
                                                <td class="fw-semibold fs-sm">
                                                    {{ $item->title }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-warning"
                                                            wire:click.prevent="edit({{ $item->id }})">
                                                            Edit
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            wire:confirm="Are you sure you want to delete this post?"
                                                            wire:click="hapus({{ $item->id }})">
                                                            Hapus
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada data</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $list->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('komponen.modal-hapus')
</div>

@push('script')
<script src="{{ asset('template/js/core/libraries/jquery.min.js') }}"></script>

<script>
    window.addEventListener('showCentang', function () {
        showCentang();
    });

    function showCentang(){
        // Tampilkan notifikasi
        const successMessage = document.getElementById('success-message');
        successMessage.style.display = 'block';

        // Hilangkan setelah 3 detik
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 2000);
    }
</script>
@endpush