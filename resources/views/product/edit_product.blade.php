<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
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
            {{ __('Update Details') }}
        </h2>

    </header>

   <form id="myForm" method="POST" action="{{ route('product.update', $product->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
 @if(session('success'))
    <div class="a-success">
        {{ session('success') }}
    </div>
@endif
        
        <div>
        <label for="name">Product Name</label>
        <input type="text" name="name" id="name"  required class="mt-1 block w-full" value="{{ $product->name}}">
        <span id="nameError" class="error-message"></span>
    </div>
     <div>
            <x-input-label for="price" :value="__('Price')" />
            <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" autocomplete="amount" required    value="{{$product->price}}" max="1000000"/>
            <span id="amountError" class="error-message"></span>

              @error('price')
        <span class="text-danger">{{ $message }}</span>
           @enderror
        </div>
        <div>
            <x-input-label for="category" :value="__('Category')" />
            <x-text-input id="category" name="category" type="text" class="mt-1 block w-full" autocomplete="amount" value="{{$product->category}}" required/>
            <span id="amountError" class="error-message"></span>

              @error('category')
        <span class="text-danger">{{ $message }}</span>
           @enderror
        </div>
        <div>
        <input type="hidden" name="filess" value="{{ $product->image }}">
        <label for="file_upload">File Upload (Max 3 MB, JPG, PNG, PDF)</label>
        <br>
         @if ($product->image)
        <a  style="color: blue; " href="{{ asset('uploads/' .$product->image) }}" target="_blank">Click here,for current Attached File</a>
    @else
        <p>No file attached.</p>
    @endif
        <input type="file" name="file_upload" id="fileupload" accept=".jpg, .png, .pdf"  class="mt-1 block w-full">
        <span id="fileuploadError" class="error-message"></span>
    </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

        </div>
    </form>
</section>
                </div>
            </div>
        </div>
    </div>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 @vite(['resources/js/validation.js'])
    <!-- Script for handling input changes -->

@if(session('success'))
    <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 1200); 
        
    </script>
@endif
</x-app-layout>















