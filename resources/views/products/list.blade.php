<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="product_list text-center">
        <h4>Product-List</h4>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="products_container mb-6">
        <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Sku</th>
                <th scope="col">Price</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @if($products->isNotEmpty())
            @foreach($products as $key => $product)
            <tr>
                <td>{{ $product->id }}</td>

                <td>
                    @if (!empty($product->image) && file_exists(public_path($product->image)))
                        <img width="50" src="{{ asset($product->image) }}" alt="">
                    @else
                        <span>No image</span>
                    @endif
                </td>

                <td>{{ $product->name }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M, Y') }}</td>
                <td>
                    <a href="" class="btn btn-dark">Edit</a>
                    <a href="" class="btn btn-dark">Delete</a>
                </td>
            </tr>
            @endforeach

            @endif
            </tbody>
        </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</html>
