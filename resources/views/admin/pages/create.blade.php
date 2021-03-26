<x-admin-layout>
    <x-slot name="header">
        Add page
    </x-slot>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <form action="/admin/page" method="POST">
                    @csrf
                    <textarea id="summernote" name="content">Page content</textarea>
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
