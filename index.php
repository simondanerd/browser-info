<!DOCTYPE html>
<html lang="en">

<head>
    <!--Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Inspect your browser's information in relation to the outside world.">
    <meta name="author" content="Lucas Burlingham">
    <title>Browser Inspector</title>

    <link rel="icon" href="/favicon.ico">
    <link rel="canonical" href="https://github.com/simondanerd/browserinspector">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!--tips: to change the nav placement use .fixed-top,.fixed-bottom,.sticky-top-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#idCollapse"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="idCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Browser Inspection <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item nav-link">
                    In PHP by Lucas Burlingham
                </li>
            </ul>
        </div>
    </nav>
    <main role="main" class="container">
        <br>
        <div class="jumbotron">
            <h1 class="display-4">Browser Info</h1>
            <hr class="my-4">
            <p>We do not collect this information in any way.</p>
            <?php
                if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                } else {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
                $external_agent = $_SERVER['HTTP_USER_AGENT'];
                echo "<b>Your external IP address is:</b> <button id=\"p2\" onclick=\"copyToClipboard('#p2')\">$ip</button>";
                echo "<br>";
                echo "<b>Your user agent is:</b> <code>$external_agent</code>";
            ?>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }
    </script>

</html>