<aside class="side-nav">
    <div class="logo">
        <img src="{{ asset('img/logo.svg') }}" alt="">
        Admin
    </div>

    <ul>
        <li>
            <a href="{{route('adminpanel')}}">Dashboard</a>
        </li>
        <li>

        </li>
        <li>
            <a href="{{route('adminpanel.products')}}">Products</a>
        </li>
        <li>
            <a href="{{route('adminpanel.categories')}}">Category</a>

        </li>
        <li>
            <a href="{{route('adminpanel.colors')}}">Colors</a>

        </li>
    </ul>
    <div class="logout">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">
                Logout
            </button>
        </form>
    </div>
</aside>
