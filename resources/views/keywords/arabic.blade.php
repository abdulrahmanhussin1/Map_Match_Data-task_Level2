@extends('layouts.app')
@section('title')
    Keywords Arabic Data Page
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Keywords Arabic Data Page </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Data</li>
                    <li class="breadcrumb-item active">Keywords Arabic Data Page</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @include('layouts.alerts')

        <section class="section">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Keywords Arabic Data Table</h5>
                        <!-- Basic Modal -->

                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">
                            Add Arabic Keywords
                        </button>

                        <div class="modal fade" id="basicModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Arabic Keywods</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('storeArKeywords') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="keyword_ar" placeholder="Add your Main Data" style="height: 100px" required>{{ old('keyword_ar') }}</textarea>
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
                                    <th scope="col">Keyword Id</th>
                                    <th scope="col">Arabic Keywod</th>
                                    <th scope="col">Mapped Data </th>
                                    <th scope="col">Map</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keywordsAr as $keyword)
                                    <form action="{{ route('mapKeywordAr') }}" method="Post">
                                        @csrf
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $keyword->id }}</td>
                                            <td>{{ $keyword->keyword_ar }}</td>
                                            <td>
                                                <input type="text" name="id" value="{{ $keyword->id }}" hidden>
                                                <div class="row mb-3">
                                                    <div class="col-sm-10">
                                                        <select class="form-select mapping-select" name="mappingData_id"
                                                                aria-label="Default select example" data-row-id="{{ $keyword->id }}">
                                                            <option value="{{ null }}">Open this select menu</option>
                                                            @foreach ($mappedData as $mapData)
                                                                <option value="{{ $mapData->id }}">{{ $mapData->description }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><button type="submit" class="btn btn-primary" >Map Keyword</button></td>
                                        </form>
                                        </tr>

                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                        {{ $keywordsAr->links() }}
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Matched Data Table</h5>
                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Keyword Id</th>
                                    <th scope="col">Arabic Keywod</th>
                                    <th scope="col">Mapped Data </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keywordsArMapped as $keywordMpd)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $keywordMpd->id }}</td>
                                        <td>{{ $keywordMpd->keyword_ar }}</td>
                                        <td>{{ $keywordMpd->mappingData->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                        {{ $keywordsArMapped->links() }}
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
@section('js')
{{-- <script>
    $(document).ready(function() {
        $('.mapping-select').on('change', function() {
            var selectedId = $(this).val();
            var rowId = $(this).data('row-id'); // Get the unique row identifier

            if (selectedId !== '') {
                $.ajax({
                    url: "{{ route('getMainData', '') }}/" + selectedId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        // Update the mainData cell of the corresponding row
                        var mainDataCell = $('.mainData[data-row-id="' + rowId + '"]');
                        if (data) {
                            mainDataCell.html(data.description);
                        } else {
                            mainDataCell.html("Not Mapped Yet");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                $('.mainData[data-row-id="' + rowId + '"]').html(''); // Clear the mainData cell if no option is selected
            }
        });
    });
</script> --}}



@endsection
