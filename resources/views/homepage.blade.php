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

        // Make an AJAX request to the URL
        $.get(url, function(data) {
            $('#content').html(data);
        });
    });
});
    </script>
    <div id="content">
    <header>

        <nav>
            <ul>
                <li><a href="/homepage">Home</a></li>
                <li><a href="/profile">Profile</a></li>

            </ul>
        </nav>
    </header>

    <main>
        <section class="categories">
            <h2>Categories</h2>

            <ul>
                <li><a href="#">Category 1</a></li>
                <li><a href="#">Category 2</a></li>

            </ul>
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
