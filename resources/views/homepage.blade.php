<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/css/homepage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>
    <script>
        $(document).ready(function() {
    $('a').click(function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        history.pushState(null, null, url);

        $.get(url, function(data) {
            $('#content').html(data);
        });
    });
});
</script>
    <script>
        setTimeout(function() {
            document.querySelector('.notification').classList.add('fade-out');
        }, 3000);
    </script>


    <div id="content">
    <header>
        @if(Session::has('success'))
        <div class="notification">
        <div class="success">
        {{ Session::get('success') }}
        </div>
        </div>
        @endif
        <nav>
                <a href="/homepage">
               <img src="/images/home-icon-silhouette.svg" alt="Home Icon">
               Home
                </a>
                <a href="/profile">
                    <img src="/images/profile-svgrepo-com.svg" alt="Profile Icon">
                    Profile

            </a>
                <a href="{{ route('logout') }}">
                    <img src="/images/logout-svgrepo-com.svg" alt=" Logout Icon">
                    Logout
                </a>
        </nav>
    </header>

    <main>
        <section class="categories">
            <h2>Categories
                @if(auth()->check() && auth()->user()->isAdmin())
                <button id="show_form" onclick="showform()">Create Category</button>
                @endif
            </h2>

<script src="/javascript/deleting_category.js"></script>
            @if(isset($categories) && count($categories) > 0)
            <ul>
                <li>
                @foreach($categories as $category)
                @if(auth()->check() && auth()->user()->isAdmin())
                <form method="POST" action="{{ route('category.update', ['id' => $category->id]) }}">
                    @csrf
                    <input type="text" name="category_name" value="{{ $category->ime_kategorije }}" />
                    <button type="submit">Save</button>
                </form>
                    <form method="POST" action="{{ route('category.delete', ['id' => $category->id]) }}" class="delete_category_form">
                    @csrf
                    <button type="submit" class="delete-button" value="{{ $category->id }}">
                        <img src="/images/delete_icon.png" alt="Delete">

                    </button>
                    </form>
                    @endif
                </li>
                @endforeach
            </ul>
        @else
            <p>No categories found.</p>
        @endif
        </section>
        <script src="/javascript/popup.js">

        </script>
        <section class="create-form" id="create-form" class="form-visible" style="display: none">
<script src="/javascript/form_reloading.js"></script>
            <h2>Create Category</h2>
            <span class="close" onclick="closePopup()">&times;</span>
            <form method="post" action="/category_create" id="createCategoryForm">
                @csrf
                <input type="text" name="ime_kategorije" placeholder="Ime kategorije">
                <button type="submit" id="createCategoryBtn">Ustvari kategorijo</button>
            </form>

        </section>

        <section class="active-competitions">
            <h2>Active Competitions
                <button id="show_form" onclick="showform2()">Create Competetion</button>
            </h2>
            @foreach ($competitions as $competition)
            <div class="competition">

                <h3>Ime: {{ $competition->ime_tekmovanja }}</h3>
                <p>Opis: {{ $competition->opis_tekmovanja }}</p>
                <p>Ustvarjalec: {{ $competition->user->vzdevek }}</p>
                <a href="/competetion/">Details</a>

            </div>
            @endforeach
        </section>

<section class="create-form" id="create-form2" class="form-visible" style="display: none">
<span class="close" onclick="closePopup2()">&times;</span>
 <form method="post" action="/competetion_create" id="createCompetetionForm">
                @csrf
                <input type="text" name="ime_tekmovanja" placeholder="Ime Tekmovanja">
                <input type="text" name="opis_tekmovanja" placeholder="Kratek opis">
                <label>Kategorija:</label>
                <select name="kategorija_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id}}">{{ $category->ime_kategorije}}</option>
                    @endforeach
                </select>

                <button type="submit" id="createComptetionBtn">Ustvari Tekmovanje</button>
            </form>
            </section>
        <section class="user-posts">
            <h2>User Posts Awaiting Review</h2>

            <div class="post">
                <h3>Post Title 1</h3>
                <p>Competition: Competition 1</p>
                <p>Description: Lorem ipsum dolor sit amet...</p>
                <a href="#">View Details</a>
            </div>

        </section>
    </main>

    <footer>

        <p>&copy; 2023 Your Website Name. All Rights Reserved.</p>
    </footer>
</div>
</body>
</html>
