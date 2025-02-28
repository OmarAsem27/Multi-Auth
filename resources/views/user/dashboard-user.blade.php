<x-layout>

    <div class="container">

        <h1>Welcome page User </h1>
        <h2>Hello {{ Auth::user()->name }} </h2>

        <form action="{{ route('user.logout') }}" method="post">
            @csrf

            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign
                Out</button>
        </form>

    </div>
</x-layout>
