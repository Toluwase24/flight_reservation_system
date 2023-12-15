<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Trips</title>
    <link rel="stylesheet" href="/CSS_Files/normalize.css" />
    <link rel="stylesheet" href="/CSS_Files/styles.css" />
    <link rel="stylesheet" href="/CSS_Files/My_Trips_Style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#search-button").bind("click", function(e) {
            e.preventDefault();
            $("#My-trip-display").load("../component_php_files/My_Trips_Table.PHP");
        });
    });
    </script>
</head>

<body>
    <header>
        <div class="navbar">
            <h2>Caman</h2>
            <a href="../HTML_Files/main.html">Home</a>
            <!-- <a href="../HTML_Files/booking-form.html">Booking</a> -->
            <a class="active" href="../HTML_Files/My_Trips.php">My Trips</a>
            <a href="../HTML_Files/signup.html">Sign Up</a>
            <a href="../HTML_Files/login.html">Login</a>
        </div>
        <div class="main">
            <form action="../component_php_files/My_Trips_Table.PHP" method="post" class="Trip-Search">
                <div class="form-row">
                    <div class="btn-group" role="group">
                        <button type="submit" value="Submit" id="search-button" class="btn">Search</button>
                    </div>
                    <h5>Start Date</h5>
                    <input type="date" id="start" name="start_date" placeholder="YYYY-MM-DD" />
                    <h5>End Date</h5>
                    <input type="date" id="end" name="end_date" placeholder="YYYY-MM-DD" />
                </div>
        </div>
        </div>
    </header>
    <main>
        <div id="table-host">
            <table id="My-trip-display">
            </table>
        </div>
    </main>
    <aside></aside>
    <footer></footer>
</body>

</html>