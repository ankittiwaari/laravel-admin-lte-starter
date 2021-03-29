<x-admin-layout>
    <x-slot name="header">
        View all pages
    </x-slot>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                       placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Created by</th>
                                <th>Content</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pages as $page)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$page->title}}</td>
                                    <td>{{$page->user->name}}</td>
                                    <td>{{\Illuminate\Support\Str::words(strip_tags($page->content), 15)}}</td>
                                    <td class="action-links"><a href="/admin/page/{{$page->id}}/edit">Edit</a>
                                        <a href="{{url($page->slug)}}">View</a>
                                        <form method="post" class="d-inline-block"
                                              action="/admin/page/{{$page->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm d-inline-block btn-outline-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    @if($pages->hasPages())
                        <div class="card-footer">
                            {{$pages->links()}}
                        </div>
                    @endif
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</x-admin-layout>
