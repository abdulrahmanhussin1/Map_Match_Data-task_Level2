@extends('layouts.app')
@section('title')
    Matching Data Page
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Matching Data Page </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Data</li>
                    <li class="breadcrumb-item active">Matching Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @include('layouts.alerts')
        @if (!empty($message))
            <div class="alert alert-warning alert-dismissible fade show text-center container" role="alert">
                <strong>{{ $message }} {{ '. ' }}<a href="{{ route('mappingData') }}"> MapData</a></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        @endif
        @if (!empty($keywordsMessages))
            <div class="alert alert-warning alert-dismissible fade show text-center container" role="alert">
                <strong>
                    {{ $keywordsMessages }}{{ '. ' }}
                    <a href="{{ route('keywordAr') }}">Map Arabic Keywords</a>{{ ', ' }}
                    <a href="{{ route('keywordEn') }}">Map English Keywords</a> {{ ', ' }}
                    <a href="{{ route('keywordLat') }}">Map Latin Keywords</a>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Matching Data Table</h5>
                                <!-- Basic Modal -->
                                <!-- Example single danger button -->
                                <!-- Basic Modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#matchData">
                                    Match Data
                                </button>

                                <div class="modal fade" id="matchData" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Match Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('matchData') }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="">Arabic Keyword</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-select mapping-select " name="keyword_ar_id"
                                                                aria-label="Default select example">
                                                                <option value="{{ null }}">Open this select menu
                                                                </option>
                                                                @foreach ($keywordsAr as $keyword)
                                                                    <option value="{{ $keyword->id }}">
                                                                        {{ $keyword->keyword_ar }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="">English Keyword</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-select mapping-select " name="keyword_en_id"
                                                                aria-label="Default select example">
                                                                <option value="{{ null }}">Open this select menu
                                                                </option>
                                                                @foreach ($keywordsEn as $keyword)
                                                                    <option value="{{ $keyword->id }}">
                                                                        {{ $keyword->keyword_en }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="">Latin Keyword</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-select mapping-select "
                                                                name="keyword_lat_id" aria-label="Default select example">
                                                                <option value="{{ null }}">Open this select menu
                                                                </option>
                                                                @foreach ($keywordsLat as $keyword)
                                                                    <option value="{{ $keyword->id }}">
                                                                        {{ $keyword->keyword_lat }}
                                                                    </option>
                                                                @endforeach
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
                                <!-- Table with stripped rows -->
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">MatchingData Id</th>
                                            <th scope="col">English</th>
                                            <th scope="col">MappingData </th>
                                            <th scope="col">MappingData Condition</th>
                                            <th scope="col">MainData </th>
                                            <th scope="col">Arabic</th>
                                            <th scope="col">MappingData </th>
                                            <th scope="col">MappingData Condition</th>
                                            <th scope="col">MainData </th>
                                            <th scope="col">Latin</th>
                                            <th scope="col">MappingData </th>
                                            <th scope="col">MappingData Condition</th>
                                            <th scope="col">MainData </th>
                                            <th scope="col">MAtching Results</th>
                                            <th scope="col">Update Match</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($matchingData as $data)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $data->id }}</td>
                                                <td>{{ optional($data->keyword_en)->keyword_en }}</td>
                                                <td>{{ optional(optional($data->keyword_en)->mappingData)->description }}
                                                </td>
                                                <td>{{ optional(optional($data->keyword_en)->mappingData)->condition }}
                                                </td>
                                                <td>{{ optional(optional(optional($data->keyword_en)->mappingData)->mainData)->description }}
                                                </td>
                                                <td>{{ optional($data->keyword_ar)->keyword_ar }}</td>
                                                <td>{{ optional(optional($data->keyword_ar)->mappingData)->description }}
                                                </td>
                                                <td>{{ optional(optional($data->keyword_ar)->mappingData)->condition }}
                                                </td>
                                                <td>{{ optional(optional(optional($data->keyword_ar)->mappingData)->mainData)->description }}
                                                </td>
                                                <td>{{ optional($data->keyword_lat)->keyword_lat }}</td>
                                                <td>{{ optional(optional($data->keyword_lat)->mappingData)->description }}
                                                </td>
                                                <td>{{ optional(optional($data->keyword_lat)->mappingData)->condition }}
                                                </td>
                                                <td>{{ optional(optional(optional($data->keyword_lat)->mappingData)->mainData)->description }}
                                                </td>
                                                <td>
                                                    @php
                                                        $matchingColumns = [optional($data->keyword_en)->keyword_en, optional($data->keyword_ar)->keyword_ar, optional($data->keyword_lat)->keyword_lat];
                                                        $matchCount = calculateMatchingCount($matchingColumns);
                                                    @endphp
                                                    @if ($matchCount === 3)
                                                        Full match (3 out of 3)
                                                    @elseif ($matchCount === 2)
                                                        2 out of 3 match
                                                    @else
                                                        No matching at all
                                                    @endif
                                                </td>
                                                <td>

                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#UpdateMatchingData{{ $data->id }}">Edit</button>


                                                    <div class="modal fade" id="UpdateMatchingData{{ $data->id }}"
                                                        tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Update Match Data</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('updateMatchData') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row mb-3">
                                                                            <input type="text"
                                                                                name="{{ 'id' }}"
                                                                                value="{{ $data->id }}" hidden>
                                                                            <label for="">Arabic Keyword</label>
                                                                            <div class="col-sm-10">
                                                                                <select class="form-select mapping-select "
                                                                                    name="keyword_ar_id"
                                                                                    aria-label="Default select example">
                                                                                    <option
                                                                                        value="{{ optional($data->keyword_ar)->id }}">
                                                                                        {{ optional($data->keyword_ar)->keyword_ar }}
                                                                                    </option>
                                                                                    <option value="{{ null }}">
                                                                                        Unmatch</option>
                                                                                    @foreach ($keywordsAr as $keyword)
                                                                                        <option
                                                                                            value="{{ $keyword->id }}">
                                                                                            {{ $keyword->keyword_ar }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label for="">English Keyword</label>
                                                                            <div class="col-sm-10">
                                                                                <select class="form-select mapping-select "
                                                                                    name="keyword_en_id"
                                                                                    aria-label="Default select example">
                                                                                    <option
                                                                                        value="{{ optional($data->keyword_en)->id }}">
                                                                                        {{ optional($data->keyword_en)->keyword_en }}
                                                                                    </option>
                                                                                    <option value="{{ null }}">
                                                                                        Unmatch</option>
                                                                                    @foreach ($keywordsEn as $keyword)
                                                                                        <option
                                                                                            value="{{ $keyword->id }}">
                                                                                            {{ $keyword->keyword_en }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label for="">Latin Keyword</label>
                                                                            <div class="col-sm-10">
                                                                                <select class="form-select mapping-select "
                                                                                    name="keyword_lat_id"
                                                                                    aria-label="Default select example">
                                                                                    <option
                                                                                        value="{{ optional($data->keyword_lat)->id }}">
                                                                                        {{ optional($data->keyword_lat)->keyword_lat }}
                                                                                    </option>
                                                                                    <option value="{{ null }}">
                                                                                        Unmatch</option>
                                                                                    @foreach ($keywordsLat as $keyword)
                                                                                        <option
                                                                                            value="{{ $keyword->id }}">
                                                                                            {{ $keyword->keyword_lat }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success">Confirm</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- /.modal-content -->
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                                {{-- {{ $matchingData->links() }} --}}

                                {{-- @if (isset($selectedColumn) && isset($suggestedMappings))
                            <table>
                                <thead>
                                    <tr>
                                        <th>Matching Data ID</th>
                                        <th>{{ ucfirst($selectedColumn) }} Description</th>
                                        <th>Suggested Mapping</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suggestedMappings as $suggestion)
                                        <tr>
                                            <td>{{ $suggestion->matching_data_id }}</td>
                                            <td>{{ $suggestion->$selectedColumn }}</td>
                                            <td>{{ $suggestion->suggested_mapping }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif --}}
                            </div>
                        </div>
                    </div>
                    </section>
    </main><!-- End #main -->
@endsection
