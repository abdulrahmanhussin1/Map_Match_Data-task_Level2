@extends('layouts.app')
@section('title')
Main Data Page
@endsection
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Main Data Page </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Data</li>
                    <li class="breadcrumb-item active">Main Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @include('layouts.alerts')

        <section class="section">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Import Main Data Table</h5>
                        <form action="{{ route('importData') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-5">
                                        <input class="form-control" name="excel_file" type="file" id="formFile"
                                            required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-15">
                                        <button type="submit" class="btn btn-success">Import</button>
                                    </div>
                                </div>
                            </form>

                        <!-- Basic Modal -->

                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">
                            Add Main Data
                        </button>

                        <div class="modal fade" id="basicModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Main Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('storeMainData') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="description" placeholder="Add your Main Data" style="height: 100px" required>{{ old('description') }}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Confirm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Basic Modal-->

                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mainData as $data)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $data->description }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#DeleteMainData{{ $data->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Delete User.modal -->
                                    <div class="modal fade" id="DeleteMainData{{ $data->id }}">">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        Delete Main Data
                                                    </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="{{ route('deleteMainData') }}">
                                                    @csrf @method('delete')
                                                    <div class="modal-body">
                                                        <input type="text" name="id" value="{{ $data->id }}"
                                                            hidden>
                                                        <p>Are you Sure that you will delete this Main Data
                                                            ?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Delete
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /.modal-content -->
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                        {{ $mainData->links() }}
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
