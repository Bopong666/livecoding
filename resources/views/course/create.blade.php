@extends('layout.app')

@section('title')
Tambah Course
@endsection

@push('script-atas')
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= asset('template/assets/css/select2.min.css') ?>">
@endpush

@section('content')

<div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-body">
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content collapse show" style="min-height: 100vh">
                            <div class="card-body card-dashboard">
                                <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="tipe" value="course">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Title<small
                                                style="color: red;">*</small></label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                name="title" placeholder="contoh = 'Pengembangan hafalan ****"
                                                value=" {{ old('title') }} ">
                                            @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="" class="form-label">Thumbnail</label>
                                            <div class="mb-3">
                                                <input type="file" class="form-control dropify" name="header" id=""
                                                    placeholder="" aria-describedby="fileHelpId" />
                                                <div id="fileHelpId" class="form-text">Tipe file yang diterima : jpg,
                                                    jpeg, png, webp</div>
                                                @error('header')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col-12">
                                                <label for="" class="form-label">Status course</label>
                                                <div class="mb-3">
                                                    <select class="form-control form-control-lg" name="status" id=""
                                                        style="max-width: 19rem;">
                                                        <option value="draft" selected>Draft</option>
                                                        <option value="published">Publish</option>
                                                    </select>
                                                    @error('status')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="category" class="form-label">Pilih Kategori<small
                                                        style="color: red;">*</small></label>
                                                <div class="mb-3">
                                                    <select multiple class="form-control" name="category_id[]"
                                                        id="category">
                                                        @foreach ($category as $item)
                                                        <option value="{{ $item->id }}" {{ in_array($item->id,
                                                            old('category_id', [])) ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="inputName" class="col-sm-4 col-form-label">Konten<small
                                            style="color: red;">*</small></label>
                                    <style type="text/css">
                                        .ck-editor__editable_inline {
                                            height: 1000px;
                                        }
                                    </style>
                                    <div class="mb-3">
                                        <textarea id="editor"
                                            class="form-control @error('description') is-invalid @enderror"
                                            name="description" style="height: 100px">{{ old('description') }}</textarea>
                                        @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ url('panel-admin/course') }}"
                                            class="btn btn-secondary me-2">Batal</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


@endsection

@push('script')
<script src="{{ asset('template/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('template/assets/js/ckeditor5/build/ckeditor.js') }}"></script>
<script src="<?= asset('template/assets/js/select/select2.full.min.js') ?>" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script src="<?= asset('template/assets/js/form-select2.js') ?>" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        
        $('#category').select2({
            tags: true
        });
        $('.dropify').dropify();        
    });
   
    ClassicEditor
        .create( document.querySelector( '#editor' ) ,
        {                   
        ckfinder:
        {
        uploadUrl: "{{ route('course.upload', ['_token' => csrf_token()]) }}",
        },   
        })
        .then(editor => {
            editor.model.document.on('change:data', () => {
                const imageElements = editor.model.document.getRoot().getChild(0).getChildren();

                for (const imageElement of imageElements) {
                    if (imageElement.is('imageBlock') || imageElement.is('imageInline')) {
                        editor.model.change(writer => {
                            writer.setAttribute('class', 'img-fluid', imageElement);
                        });
                    }
                }
            });
        })
        .catch( error => {
            console.error( error );
    } );

    let formModified = false;

    // Detect input changes in the form
    document.querySelectorAll('input, textarea, select').forEach(input => {
        input.addEventListener('change', () => {
            formModified = true;
        });
    });

     // Handle internal link clicks
     document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function (e) {
            if (formModified) {
                const confirmLeave = confirm("Data saat ini tidak tersimpan, apakah anda yakin ingin meninggalkan halaman ini?");
                if (!confirmLeave) {
                    e.preventDefault(); // Cancel the navigation
                }
            }
        });
    });

    // Reset formModified when form is submitted
    document.querySelector('form').addEventListener('submit', function () {
        formModified = false; // Prevent showing the warning on successful form submission
    });
</script>
@endpush