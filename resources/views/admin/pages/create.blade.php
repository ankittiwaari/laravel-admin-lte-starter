<x-admin-layout>
    <x-slot name="header">
        Add page
    </x-slot>
    <section class="content">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/admin/page" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" maxlength="255" class="form-control"
                               value="{{old('title')}}"/>
                    </div>
                    <div class="form-group">
                        <label for="summernote">Content</label>
                        <textarea id="summernote" name="page_content"
                                  value="{{old('page_content')}}">{{old('page_content')}}</textarea>
                    </div>

                    <button class="btn btn-sm btn-success">Save</button>
                </form>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#summernote').summernote({
                    height: '70vh'
                })
            });
        </script>
    @endpush
</x-admin-layout>
