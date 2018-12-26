<?php
/*
    Create Account Page
*/
?>
<html>
    <head>
        <title>Create Account</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/site.css">
    </head>
    <body>
        <div id="container" class="container text-center" style="width: 50%;">
            <br/>
            <h1>Create Account:</h1><br/>
            <form action="controller.php" method="POST">
                <input class="form-control" type="text" name="username" placeholder="Username" required/>
                <br/>
                <input class="form-control" type="password" name="password" placeholder="Password" required/>
                <br/>
                <input class="form-control" type="email" name="email" placeholder="Email" required/>
                <br/>
                <input class="form-control" type="text" name="mobile" placeholder="Mobile" required/>
                <br/>
                <input class="btn btn-primary" type="submit" name="user-signup" value="Create Account" style="width: 50%"/>
                <br/>
            </form>
            <br/>
        </div>
    </body>
</html>
