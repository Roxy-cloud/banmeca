<<<<<<< HEAD
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
=======
@extends('layouts.app')

@section('content')
<div class="main-wrapper">

    <!-- Sidebar dinámico -->
    @if(auth()->user()->hasRole('admin'))
        @include('admin.includes.sidebar')
    @elseif(auth()->user()->hasRole('responsable'))
        @include('responsable.includes.sidebar')
    @elseif(auth()->user()->hasRole('benefactor'))
        @include('benefactor.includes.sidebar')
    @else
        @include('guest.includes.sidebar') 
    @endif

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    @stack('page-header')
                </div>
            </div>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <x-alerts.danger :error="$error" />
                @endforeach
            @endif

            @yield('content')
        </div>
    </div>
</div>
@endsection
>>>>>>> e2a8b4e (Primer commit)
