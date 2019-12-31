<nav class="navbar navbar-expand-md navbar-light bg-light">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="headerNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <!-- Level one dropdown -->
            <li class="nav-item dropdown">
                <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    class="nav-link dropdown-toggle">CATEGORIES</a>
                <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">

                    @foreach ($parentCategories as $item)
                        @dd($item->subcategory);
                    <li class="dropdown-submenu">
                        <a id="dropdownMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" class="dropdown-item dropdown-toggle">{{$item['name']}}</a>
                        <ul aria-labelledby="dropdownMenu2" class="dropdown-menu border-0 shadow">
                            <li>
                                <a tabindex="-1" href="#" class="dropdown-item">{{$item->subcategory}}</a>
                            </li>
                            {{-- <li><a href="#" class="dropdown-item">CF2</a></li>
                            <li><a href="#" class="dropdown-item">CF3</a></li> --}}
                        </ul>
                    </li>
                    @endforeach
    </div>
</nav>
<!-- End Navbar -->