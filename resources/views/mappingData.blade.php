@extends('layouts.app')
@section('title')
    Mapping Data Page
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Mapping Data Data Page </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Data</li>
                    <li class="breadcrumb-item active">Mapping Data Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @include('layouts.alerts')

        <section class="section">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mapping Data Table
                        </h5>

                        <form action="{{ route('importMappingData') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-5">
                                    <input class="form-control" name="excel_file" type="file" id="formFile" required>
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
                                    <form action="{{ route('storeMappingData') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="description" placeholder="Add your Main Data" style="height: 100px" required>{{ old('description') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="">Main Data :</label>
                                                <div class="col-sm-10">
                                                <select class="form-select mapping-select " name="mainData_id"
                                                                aria-label="Default select example" >
                                                            <option value="{{ null }}">Open this select menu</option>
                                                            @foreach ($mainData as $data)
                                                                <option value="{{ $data->id }}">{{ $data->description }}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="">Condition :</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select mapping-select " name="condition"
                                                                aria-label="Default select example" >
                                                            <option value="{{ null }}">Open this select menu</option> 
                                                                <option value="{{ 'A' }}">A</option>
                                                                <option value="{{ 'B' }}">B</option>
                                                                <option value="{{ 'C' }}">C</option>                                            
                                                        </select>
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

                        <div class="btn-group">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Add Keywords
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('keywordAr') }}">Arabic</a></li>
                                    <li><a class="dropdown-item" href="{{ route('keywordEn') }}">English</a></li>
                                    <li><a class="dropdown-item" href="{{ route('keywordLat') }}">Latin</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">MainData</th>
                                    <th scope="col">Condition</th>
                                    <th>Action</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mappingData as $mpData)
                                    <tr>
                                        <form action="{{ route('mapData') }}" method="POST">
                                            @csrf

                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $mpData->description }}</td>
                                            <td>
                                                <input type="text" name="id" value="{{ $mpData->id }}" hidden>
                                                <div class="row mb-3">
                                                    <div class="col-sm-10">
                                                        <select class="form-select" name="mainData_id"
                                                            aria-label="Default select example" required>
                                                            <option value="{{ null }}">Open this select menu
                                                            </option>
                                                            @foreach ($mainData as $data)
                                                                <option value="{{ $data->id }}">
                                                                    {{ $data->description }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="row mb-3">

                                                    <div class="col-sm-10">
                                                        <select class="form-select" name="condition"
                                                            aria-label="Default select example" required>
                                                            <option value="{{ null }}">Open this select menu</option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="C">C</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary">Map Data</button>
                                            </td>
                                        </form>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteMappingData{{ $mpData->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Delete User.modal -->
                                    <div class="modal fade" id="deleteMappingData{{ $mpData->id }}">">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        Delete Mapping Data
                                                    </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="{{ route('deleteMappingData') }}">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="modal-body">
                                                        <input type="text" name="id" value="{{ $mpData->id }}"
                                                            hidden>
                                                        <p>Are you Sure that you will delete this Mapping Data
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
                        {{ $mappingData->links() }}
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mapped Data Table
                        </h5>

                        <form action="{{ route('importMappingData') }}" method="POST" enctype="multipart/form-data">
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
                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">MainData</th>
                                    <th scope="col">Condition</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mappedData as $mpdData)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $mpdData->description }}</td>
                                        <td>{{ $mpdData->mainData->description }}</td>
                                        <td>{{ $mpdData->condition }}</td>
                                        
                                        <td>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteMappingData2{{ $mpdData->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Delete User.modal -->
                                    <div class="modal fade" id="deleteMappingData2{{ $mpdData->id }}">">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        Delete Mapping Data
                                                    </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="{{ route('deleteMappingData') }}">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="modal-body">
                                                        <input type="text" name="id" value="{{ $mpdData->id }}"
                                                            hidden>
                                                        <p>Are you Sure that you will delete this Mapping Data
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
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                        {{ $mappingData->links() }}
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
