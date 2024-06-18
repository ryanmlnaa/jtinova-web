@extends('layouts.welcome.app')
@section('content')
<!-- Hero Section -->
@include('welcome.section.hero-section')
<!-- /Hero Section -->

<!-- Clients Section -->
@include('welcome.section.client-section')
<!-- /Clients Section -->

<!-- About Section -->
@include('welcome.section.about-section')
<!-- /About Section -->

<!-- Services Section -->
@include('welcome.section.services-section')
<!-- /Services Section -->

<!-- Portfolio Section -->
@include('welcome.section.portfolio-section')
<!-- /Portfolio Section -->

<!-- Tabs Section -->
@include('welcome.section.tabs-section')
<!-- /Tabs Section -->


{{-- <!-- Pricing Section -->
@include('welcome.section.pricing-section')
<!-- /Pricing Section --> --}}

<!-- Team Section -->
@include('welcome.section.team-section')
<!-- /Team Section -->

<!-- Contact Section -->
@include('welcome.section.contact-section')
<!-- /Contact Section -->
@endsection