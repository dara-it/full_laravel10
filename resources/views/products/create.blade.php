<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Products</title>
</head>
<style>
body {
    background-color: #000;
    color: #fff;
}

.form-control,
.form-select {
    background-color: #1c1c1c;
    color: #fff;
    border: 1px solid #444;
}

.form-control::placeholder {
    color: #aaa;
}

.form-label {
    color: #ccc;
}

.btn-primary {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

.btn-primary:hover {
    background-color: #0b5ed7;
    border-color: #0a58ca;
}
</style>

<body>
    <div class="bg-dark py-3 text-center">
        <h4 class="text-white">Create-Product</h4>
    </div>

    <div class="container mt-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="productName" class="form-label">Name</label>
                <input value="{{ old('name') }}" type="text" class="form-control" id="productName" name="name"
                    placeholder="Enter product name" required>
            </div>

            <div class="mb-3">
                <label for="productName" class="form-label">Sku</label>
                <input value="{{ old('sku') }}" type="text" class="form-control" id="productSku" name="sku"
                    placeholder="sku" required>
            </div>

            <div class="mb-3">
                <label for="productPrice" class="form-label">Price ($)</label>
                <input value="{{ old('price') }}" type="number" class="form-control" id="productPrice" name="price"
                    placeholder="Enter price" required>
            </div>

            <div class="mb-3">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" id="productDescription" name="description" rows="3"
                    placeholder="Enter product description">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="productImage" class="form-label">Image</label>
                <input class="form-control" type="file" id="productImage" name="image" required>
            </div>

            <button type=" submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
</script>

</html>