<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="container">
        <h1>Products</h1>

        <form action="/categories" method="POST" class="product-form">
            @csrf
            <div class="form-group">
                <label>Category Name:</label>
                <input type="text" name="category_name" required>
            </div>
            <button type="submit">Save Category</button>
        </form>

        <form action="/products123" method="POST" class="product-form">
            @csrf
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name123" required>
            </div>

            <div class="form-group">
                <label>Price:</label>
                <input type="text" name="price123" required>
            </div>

            <div class="form-group">
                <label>Category:</label>
                <select name="catID" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Save Product</button>
        </form>

        <hr>

        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->category->category_name ?? 'None' }}</td>
                        <td>
                            <a href="/products/{{ $item->id }}/edit">Edit</a>
                            <form action="/products/{{ $item->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>