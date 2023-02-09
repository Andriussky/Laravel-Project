<h1>New </h1>
<span>Kurimo forma</span>
<form action="{{route('products.store')}}" method="post">

    @csrf

    <h1>Create Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <input type="text" name="name" placeholder="Name" value=""><br>
    <input type="text" name="slug" placeholder="Slug" value=""><br>
    <input type="text" name="description" placeholder="Description" value=""><br>
    <input type="text" name="image" placeholder="Image" value=""><br>
    <input type="text" name="category_id" placeholder="Category ID" value=""><br>
    <input type="text" name="color" placeholder="Color" value=""><br>
    <input type="text" name="size" placeholder="Size" value=""><br>
    <input type="text" name="price" placeholder="Price" value=""><br>
    <input type="text" name="status_id" placeholder="Status ID" value=""><br>
    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="Atnaujinti">
</form>
