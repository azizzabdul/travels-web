@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
        <a href="{{ route('gallery.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-center-50"></i> Tambah Gallery Travel
        </a>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" widht="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>ID</td>
                            <td>Travel</td>
                            <td>Gambar</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                       @forelse ($items as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->travel_package->title }}</td>
                                <td>
                                    <img src="{{ Storage::url($item->image) }}" alt="" style="width:150px" class="img-thumbnail"/>
                                </td>
                                <td>
                                    <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{ route('gallery.destroy', $item->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                       @empty
                           <tr>
                               <td colspan="7" class="text-center">
                                   Data kosong
                               </td>
                           </tr>
                       @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection