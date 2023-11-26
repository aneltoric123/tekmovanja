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
                <a href="/logout">
                    <img src="/images/logout-svgrepo-com.svg" alt="Home Icon">
                    Logout
                </a>
        </nav>
    </header>

    <main>
        <section class="categories">
            <h2>Categories <button id="show_form" onclick="showform()">Create Category</button></h2>

            <ul>
                <li><a href="#">Category 1</a></li>
                <li><a href="#">Category 2</a></li>

            </ul>
        </section>
        <script src="/javascript/popup.js">

        </script>
        <section class="create-category-form" id="create_category_form" class="form-visible" style="display: none">

            <h2>Create Category</h2>
            <span class="close" onclick="closePopup()">&times;</span>
            <form method="post" action="/category_create" >
                @csrf
                <input type="text" name="ime_kategorije" placeholder="Ime kategorije">
                <button type="submit">Ustvari kategorijo</button>
            </form>

        </section>

        <section class="active-competitions">
            <h2>Active Competitions</h2>

            <div class="competition">
                <h3>Competition 1</h3>
                <p>Description: Lorem ipsum dolor sit amet...</p>
                <p>Creator: John Doe</p>
                <a href="#">Details</a>
            </div>

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
