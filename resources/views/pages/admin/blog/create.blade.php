<x-layouts.admin title="Tambah Blog">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Blog</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Blog</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        @if ($errors->any())
            <div class="col-md-12 grid-margin">
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Tambah Blog</h4>
                </x-slot>
                <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-forms.input label="Title" name="title" id="title" />
                    <x-forms.input label="Thumbnail" name="thumbnail" id="thumbnail" type="file" />

                    <x-forms.mde label="Content" />

                    <x-forms.input label="Slug" name="slug" id="slug" />

                    <div class="mb-3">
                        <label for="categories" class="form-label">Kategori</label>
                        <select class="js-example-basic-multiple form-control" name="categories[]" multiple="multiple">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tagar</label>
                        <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <x-ui.base-button color="primary" type="submit">Simpan</x-ui.base-button>
                    <x-ui.base-button color="danger" href="{{ route('admin.blog.index') }}">
                        Kembali
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>

    @push('custom-scripts')
        <script>
            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');

            title.addEventListener('keyup', function() {
                const titleValue = title.value;
                slug.value = titleValue.toLowerCase().split(' ').join('-');
            });
        </script>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
    @endpush

</x-layouts.admin>
