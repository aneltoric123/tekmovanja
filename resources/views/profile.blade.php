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
        <!-- Add more competitions -->
    </section>

    <!-- User Activity Section -->
    <section class="user-activity">
        <h2>User Activity</h2>
        <div class="activity-info">
            <p>Overall Ranking: 5th</p>
            <p>Photography Category Ranking: 2nd</p>
            <!-- Display more activity and rankings -->
        </div>
    </section>
</div>
</body>
</html>
