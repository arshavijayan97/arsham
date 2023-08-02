</!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}
.button {
    color: white;
    background-color: blue;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 4px;
    }

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border-radius: 2px;
}

.pagination a:hover:not(.active) {
  background-color: blue;
  border-radius: 5px;
}
</style>


</head>
<body>

</body>
</html>
<x-app-layout>

    <!-- Optional theme -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             @if(session('success'))
    <div class="alert alert-success" style="align-content: center;">
        {{ session('success') }}
    </div>
@endif
 
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <a href="{{ route('products.create')}}" class="button">Add New</a>

    </div>
   
</div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                      @if($products->isEmpty())
             <td> <center>No records found.</p></center></td>
        @else
                        <thead>
                            <tr>
                                <th class="px-6 py-2"># </th>
                                <th class="px-6 py-2">Product Name</th>
                                <th class="px-6 py-2">Amount</th>
                                <th class="px-6 py-2">Added Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach($products as $product)
                            
                                <tr>
                                    
                                    <td class="border px-6 py-2">{{ $products->firstItem() + $loop->index }}</td>
                                    <td class="border px-6 py-2">{{ $product->name }}</td>
                                    <td class="border px-6 py-2">${{ $product->price }}</td>
                                    <td class="border px-6 py-2">{{ $product->created_at->format('F d, Y') }}</td>

                                    <td class="border px-6 py-2">
                   
                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700 mr-2" style="color: blue;">Edit</a>

                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700" style="color: red;">Delete</button>
                    </form>
                    </td>

                 </tr>
                                      @php
                                        $counter++;
                                        @endphp
                                 
                            @endforeach
                        </tbody>
                    </table>
                     {{ $products->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
@if(session('success'))
    <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 1400); 
        
    </script>
@endif
