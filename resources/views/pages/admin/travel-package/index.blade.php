@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>
        <a href="{{ route('travel-package.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-center-50"></i> Tambah Paket Travel
        </a>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" widht="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>NO</td>
                            <td>ID</td>
                            <td>Title</td>
                            <td>Location</td>
                            <td>Type</td>
                            <td>Departure Date</td>
                            <td>Type</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                       @php $no = 1; @endphp
                       @forelse ($items as $item)
                        
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->departure_date }}</td>
                                <td>{{ $item->type }}</td>
                                <td>
                                    <a href="{{ route('travel-package.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{ route('travel-package.destroy', $item->id) }}" class="d-inline" method="POST">
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