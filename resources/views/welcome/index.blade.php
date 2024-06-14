@extends('layouts.welcome.app')
@section('content')
<!-- Hero Section -->
@include('welcome.hero-section')
<!-- /Hero Section -->

<!-- Clients Section -->
@include('welcome.client-section')
<!-- /Clients Section -->

<!-- About Section -->
@include('welcome.about-section')
<!-- /About Section -->

<!-- Services Section -->
@include('welcome.services-section')
<!-- /Services Section -->

<!-- Portfolio Section -->
@include('welcome.portfolio-section')
<!-- /Portfolio Section -->

<!-- Tabs Section -->
@include('welcome.tabs-section')
<!-- /Tabs Section -->


{{-- <!-- Pricing Section -->
@include('welcome.pricing-section')
<!-- /Pricing Section --> --}}

<!-- Team Section -->
@include('welcome.team-section')
<!-- /Team Section -->

<!-- Contact Section -->
@include('welcome.contact-section')
<!-- /Contact Section -->
@endsection