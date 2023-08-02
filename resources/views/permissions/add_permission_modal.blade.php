<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
.modal-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
}


.modal {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    max-width: 400px;
    width: 90%;
}

.visible {
    display: block;
}

    </style>
</head>
<body>
<div class="modal-container lg">
    <!-- Modal content -->
    <div class="modal">
        <h2 class="text-xl font-bold mb-4">Add New Permission</h2>
        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <label for="name">Permission Name:</label>
            <input type="text" class="form-control l-100" name="name" id="name" required>
            <!-- Add other fields if needed -->
            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Save</button>
                <button type="button" class="px-4 py-2 bg-red-500 text-white rounded-lg" onclick="closeModal()">Back</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
