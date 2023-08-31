@extends('layouts.app')
@section('title')
Home Page
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Home Page </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Home</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

    </main><!-- End #main -->
@endsection
