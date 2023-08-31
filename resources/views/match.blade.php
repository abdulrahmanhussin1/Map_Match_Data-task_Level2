@extends('layouts.app')
@section('title')
    Match Data Page
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Matched {{ ucfirst($selectedColumn) }} Page </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Data</li>
                    <li class="breadcrumb-item active">Matched {{ ucfirst($selectedColumn) }} Page</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @include('layouts.alerts')

        <section class="section">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Matching Data Table</h5>
                        <!-- Basic Modal -->

                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">
                            Add Keywords
                        </button>

                        <div class="modal fade" id="basicModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Keywods</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('storeKeywords') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="{{ $selectedColumn }}" placeholder="Add your Main Data" style="height: 100px"
                                                        required>{{ old('description') }}</textarea>
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
                        @if (isset($selectedColumn) && isset($matchingData))
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>Matching Data ID</th>
                                        <th>{{ ucfirst($selectedColumn) }} Description</th>
                                        <th scope="col">Mapped Data </th>
                                        <th scope="col">Condition </th>
                                        <th scope="col">MainData</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matchingData as $matcheData)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $matcheData->id }}</td>
                                            @if ($selectedColumn == 'desc_ar')
                                                <td>{{ $matcheData->desc_ar }}</td>
                                                @if ($matcheData->mapping_data_ar_id == null)
                                                    <form method="POST" action="{{ route('matchData_ar') }}">
                                                        @csrf
                                                        <input type="text" name="id" value="{{ $matcheData->id }}"
                                                            hidden>
                                                        <td>
                                                            <select class="form-select mapping-select" name="mappingData_id"
                                                                aria-label="Default select example"
                                                                data-row-id="{{ $matcheData->id }}">
                                                                <option value="{{ null }}">Open this select menu
                                                                </option>
                                                                @foreach ($mappedData as $mapData)
                                                                    <option value="{{ $mapData->id }}">
                                                                        {{ $mapData->description }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>{{ optional($matcheData->mappingDataArabic)->condition }}</td>
                                                        <td>{{ optional(optional($matcheData->mappingDataArabic)->mainData)->description }}
                                                        </td>
                                                        <td><button type="submit" class="btn btn-primary">Map Data</button>
                                                        </td>
                                                        <td></td>
                                                    </form>
                                                @else
                                                    <td>{{ optional($matcheData->mappingDataArabic)->description }}</td>
                                                    <td>{{ optional($matcheData->mappingDataArabic)->condition }}</td>
                                                    <td>{{ optional(optional($matcheData->mappingDataArabic)->mainData)->description }}
                                                    </td>
                                                    <td></td>
                                                @endif
                                                <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">
                                                    Update Keywords
                                                </button></td>
                                                </td>
                                            @elseif ($selectedColumn == 'desc_en')
                                                <td>{{ $matcheData->desc_en }}</td>
                                                @if ($matcheData->mapping_data_en_id == null)
                                                    <form method="POST" action="{{ route('matchData_en') }}">
                                                        @csrf

                                                        <input type="text" name="id" value="{{ $matcheData->id }}"
                                                            hidden>
                                                        <td>
                                                            <select class="form-select mapping-select" name="mappingData_id"
                                                                aria-label="Default select example"
                                                                data-row-id="{{ $matcheData->id }}">
                                                                <option value="{{ null }}">Open this select menu
                                                                </option>
                                                                @foreach ($mappedData as $mapData)
                                                                    <option value="{{ $mapData->id }}">
                                                                        {{ $mapData->description }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>{{ optional($matcheData->mappingDataEnglish)->condition }}</td>
                                                        <td>{{ optional(optional($matcheData->mappingDataEnglish)->mainData)->description }}
                                                        </td>
                                                        <td><button type="submit" class="btn btn-primary">Map Data</button>
                                                        </td>
                                                    </form>
                                                @else
                                                    <td>{{ optional($matcheData->mappingDataArabic)->description }}</td>
                                                    <td>{{ optional($matcheData->mappingDataEnglish)->condition }}</td>
                                                    <td>{{ optional(optional($matcheData->mappingDataEnglish)->mainData)->description }}
                                                    </td>
                                                    <td></td>
                                                @endif
                                                <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">
                                                    Update Keywords
                                                </button></td>
                                            @else
                                                <td>{{ $matcheData->desc_lat }}</td>
                                                @if ($matcheData->mapping_data_lat_id == null)
                                                    <form method="POST" action="{{ route('matchData_lat') }}">
                                                        @csrf

                                                        <input type="text" name="id" value="{{ $matcheData->id }}"
                                                            hidden>
                                                        <td>
                                                            <select class="form-select mapping-select" name="mappingData_id"
                                                                aria-label="Default select example"
                                                                data-row-id="{{ $matcheData->id }}">
                                                                <option value="{{ null }}">Open this select menu
                                                                </option>
                                                                @foreach ($mappedData as $mapData)
                                                                    <option value="{{ $mapData->id }}">
                                                                        {{ $mapData->description }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>{{ optional($matcheData->mappingDataLatin)->condition }}</td>
                                                        <td>{{ optional(optional($matcheData->mappingDataLatin)->mainData)->description }}
                                                        </td>
                                                        <td><button type="submit" class="btn btn-primary">Map Data</button>
                                                        </td>
                                                    </form>
                                                @else
                                                    <td>{{ optional($matcheData->mappingDataArabic)->description }}</td>
                                                    <td>{{ optional($matcheData->mappingDataLatin)->condition }}</td>
                                                    <td>{{ optional(optional($matcheData->mappingDataLatin)->mainData)->description }}
                                                    </td>
                                                    <td></td>

                                                @endif
                                                <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">
                                                    Update Keywords
                                                </button></td>
                                            @endif
                                            

                                            <div class="modal fade" id="basicModal" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update Keywods</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('updateKeywords') }}" method="POST">
                                                            @csrf @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control" name="{{ $selectedColumn }}" placeholder="Add your Main Data" style="height: 100px" required>{{ old('description') }}</textarea>
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        <!-- End Table with stripped rows -->
                        {{-- {{ $matchingData->links() }} --}}
                    </div>
                </div>

                {{-- <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Matched Data Table</h5>
                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">MainData Id</th>
                                <th scope="col">Arabic</th>
                                <th scope="col">MappingData Id</th>
                                <th scope="col">MappingData Condition</th>
                                <th scope="col">MainData Id</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matchingData as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->desc_ar }}</td>
                                    <td>{{ $data->desc_ar }}</td>
                                    <td>{{ $data->desc_ar }}</td>
                                    <td>{{ $data->desc_ar }}</td>
                                    <td>{{ $data->desc_ar }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                    {{ $matchingData->links() }}
                </div>
            </div> --}}
            </div>
        </section>
    </main>
@endsection
