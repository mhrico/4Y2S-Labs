<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit a Book</title>
</head>
<body>
    <h1>Edit a Book</h1>

    @if ($errors->any())
        <div>
            <p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </p>
        </div>
    @endif
    <div>
        <form action="{{ route('book.update', $book)}}" method="POST">
            @csrf
            @method('put')

            <input type="text" name="name" placeholder="Name" value="{{$book->name}}">
            <input type="text" name="author" placeholder="Author" value="{{$book->author}}">
            <input type="text" name="price" placeholder="Price" value="{{$book->price}}">
            <input type="text" name="quantity" placeholder="Quantity" value="{{$book->quantity}}">
            <input type="submit" value="Edit">
        </form>
    </div>
</body>
</html>