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
.button {
    color: white;
    background-color: blue;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 4px;
    }

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
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
            {{ __('All Permissions') }}
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
        <!-- Table content as before -->

        <a href="javascript:void(0)" onclick="openModal()" class="button">Add New</a>

        <!-- Include the modal view -->
        @include('permissions.add_permission_modal')
    </div>
</div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                          @if($permissions->isEmpty())
             <td> <center>No records found.</p></center></td>
        @else
                            <tr>
                                <th class="px-6 py-2"># </th>
                                <th class="px-6 py-2">Permission Name</th>
                                <th class="px-6 py-2">Added Date</th>
                                <th class="px-6 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                             
                            @foreach($permissions as $permission)
                            
                                <tr>
                                    
                                    <td class="border px-6 py-2">{{ $loop->iteration }}</td>
                                    <td class="border px-6 py-2">{{ $permission->name }}</td>
                            
                                    <td class="border px-6 py-2">{{ $permission->created_at->format('F d, Y') }}</td>

                                    <td class="border px-6 py-2">
                   
                  <a href="{{ route('permissions.edit', $permission->id) }}" class="text-blue-500 hover:text-blue-700 mr-2" style="color: blue;">Edit</a>

                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="inline">
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
                     {{ $permissions->links() }}
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
<script>
    function openModal() {
        document.querySelector('.modal-container').classList.add('visible');
    }

    function closeModal() {
        document.querySelector('.modal-container').classList.remove('visible');
    }
</script>

