<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book List</title>
</head>
<body>
    <h1>Book List</h1>

    <form action="{{route('book.seach')}}" method="get">
        <input type="text" placeholder="Search" name="search">
        <input type="submit" value = "Search">
    </form>
    @if (session()->has('success'))
        <div>
            <p>
                {{session('success')}}
            </p>
        </div>
    @endif
    <div>
        <a href="{{route('book.create')}}">Create Route</a>
    </div>
    <div>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Author</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->name}}</td>
                    <td>{{ $book->author}}</td>
                    <td>{{ $book->quantity}}</td>
                    <td>{{ $book->price}}</td>
                    <td><a href="{{ route('book.edit', $book)}}">Edit</a></td>
                    <td>
                        <form action="{{route('book.delete', $book)}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>