<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .button {
    color: white;
    background-color: red;
    padding: 7px 12px;
    text-decoration: none;
    border-radius: 4px;
}
    </style>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!-- resources/views/invoice_form.blade.php -->
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Enter The Details') }}
        </h2>

    </header>

    <form id="myForm" method="post" action="{{ route('roles.store') }}" class="mt-6 space-y-6">
        @csrf
 @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

        
        <div>
        <label for="name">Role Name</label>
        <input type="text" name="name" id="name"  required class="mt-1 block w-full">
        <span id="nameError" class="error-message"></span>
    </div>
    <div>
            <x-input-label for="Permissions" :value="__('Assign Permissions')" />
             <div>
        @foreach ($permissions as $permission)
            <label>
                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">&nbsp;
                {{ $permission->name }}
            </label>
            <br>
        @endforeach
    </div>
           
              @error('Permissions')
        <span class="text-danger">{{ $message }}</span>
           @enderror
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            <a href="{{route('roles.index')}}" class="button" style="color: white;">Back</a>

        </div>
    </form>
</section>
                </div>
            </div>
        </div>
    </div>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Script for handling input changes -->

@if(session('success'))
    <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 1800); 
        
    </script>
@endif
</x-app-layout>
</body>
</html>















