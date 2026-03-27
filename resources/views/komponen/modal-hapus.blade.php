<!-- Modal Hapus-->
<div wire:ignore.self class="modal fade" id="deleteId" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>
                    Apakah anda yakin ingin menghapus data ini?
                </h4>
                <div style="float: right;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" wire:click="hapus({{ $idHapus }})">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    const deleteId = $('#deleteId');    
    window.addEventListener('hapus-konfirmasi', () => {
        deleteId.modal('show');
    });
    window.addEventListener('hapus', () => {
        deleteId.modal('hide');
        showCentang();
    });
</script>
@endpush