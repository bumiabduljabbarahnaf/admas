@extends('layouts.app')
@section('content')
    <!-- Header -->
    @include('masterPages.headers.header')
    <!-- Section 1 -->
    @include('pages.homePage.section1')
    <!-- Section 2 -->
    @include('pages.homePage.section2')
    <!-- Section 3 -->
    @include('pages.homePage.section3')
    <!-- Section 4 -->
    @include('pages.homePage.section4')
     <!-- Section 5 -->
     @include('pages.homePage.section5')
    <!-- Footer -->
    @include('masterPages.footer')
@endsection