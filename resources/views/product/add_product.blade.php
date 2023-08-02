<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
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

    <form id="myForm" method="post" action="{{ route('products.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
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
        <label for="name">Product Name</label>
        <input type="text" name="name" id="name"  required class="mt-1 block w-full">
        <span id="nameError" class="error-message"></span>
    </div>
    <div>
            <x-input-label for="price" :value="__('Price')" />
            <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" autocomplete="amount" required   pattern="[0-9]+" title="Please enter a valid number" max="1000000"/>
            <span id="amountError" class="error-message"></span>

              @error('price')
        <span class="text-danger">{{ $message }}</span>
           @enderror
        </div>
        <div>
            <x-input-label for="category" :value="__('Category')" />
            <x-text-input id="category" name="category" type="text" class="mt-1 block w-full" autocomplete="amount" required/>
            <span id="amountError" class="error-message"></span>

              @error('price')
        <span class="text-danger">{{ $message }}</span>
           @enderror
        </div>
        <div>
        <label for="file_upload">File Upload (Max 3 MB, JPG, PNG)</label>
        <input type="file" name="file_upload" id="fileupload" required class="mt-1 block w-full">
        <span id="fileuploadError" class="error-message"></span>
          @error('fileupload')
        <span class="text-danger">{{ $message }}</span>
           @enderror
    </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

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















