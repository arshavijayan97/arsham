<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Permission') }}
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

   <form id="myForm" method="POST" action="{{ route('permissions.update', $permission->id) }}" class="mt-6 space-y-6">
        @csrf
 @if(session('success'))
    <div class="a-success">
        {{ session('success') }}
    </div>
@endif
        
        <div>
        <label for="name"> Name</label>
        <input type="text" name="name" id="name"  required class="mt-1 block w-full" value="{{ $permission->name}}">
        <span id="nameError" class="error-message"></span>
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
    <!-- Script for handling input changes -->

@if(session('success'))
    <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 1200); 
        
    </script>
@endif
</x-app-layout>















