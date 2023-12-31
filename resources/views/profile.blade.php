<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/profile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Homepage</title>
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
    <div id="content">
    <header>

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
    <section class="user-profile">
        <h2>User Profile</h2>
        <div class="profile-info">
            <p>Nickname: User123</p>
            <p>Full Name: Jane Doe</p>
            <p>Date of Birth: January 10, 1995</p>
            <!-- Display profile picture -->
            <p>Email: ***@example.com (Protected)</p>
        </div>
    </section>

    <!-- User Created Competitions Section -->
    <section class="user-created-competitions">
        <h2>User Created Competitions</h2>
        <div class="competition">
            <h3>Art Contest</h3>
            <p>Description: Show your artistic skills.</p>
            <p>Edit <a href="#">Details</a></p>
        </div>

    </section>


    <section class="user-activity">
        <h2>User Activity</h2>
        <div class="activity-info">
            <p>Overall Ranking: 5th</p>
            <p>Photography Category Ranking: 2nd</p>

        </div>
    </section>
    <footer>

        <p>&copy; 2023 Your Website Name. All Rights Reserved.</p>
    </footer>
</div>

</body>
</html>
