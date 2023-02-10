<h1>Editing {{$user->name}}</h1>
<span>Redagavimo forma</span>
<form action="{{route('users.update', $user->id)}}" method="post">
    @method('PUT')
    @csrf

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
    <input type="text" name="email" placeholder="Email" value=""><br>
    <input type="password" name="password" placeholder="Password" value=""><br>

    <hr>
    <input type="submit" class="waves-effect waves-light btn" value="Atnaujinti">
    labas
</form>