<?php
/*
    Main Homepage
*/
session_start();

require_once './db-connection.php';
require_once './classes/item.php';

$item = new Item();
$items = $item->getAllUserItem($_SESSION['login-user'], $DBConn);

?>

<html>
    <head>
        <title>My Post</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/site.css">
    </head>
    <body>
        <div id="container" class="container text-center" style="width: 50%;margin-top: 0px; padding-top: 8px;">
            <nav class="navbar navbar-expand-xlg bg-dark navbar-dark rounded-top">
                <a class="navbar-brand text-secondary" href="index.php">Masroka</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="navbar-nav text-left">
                    <br/>
                    <li class="nav-item">
                        <form class="form-inline" action="search.php" method="GET">
                            <input class="form-control mr-sm-2" name="q" type="text" placeholder="Search">
                            <button class="btn btn-success" name="search" type="submit"><span class="fas fa-search"></span></button>
                      </form>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="post-item.php"><span class="fas fa-plus-square"></span> Post Item</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="my-post.php"><span class="fas fa-poll-h"></span> My Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><span class="fas fa-user"></span> <?php echo $_SESSION['login-user'];?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="controller.php/?f=logut"><span class="fas fa-sign-out-alt"></span> Logout</a>
                    </li>
                  </ul>
                </div>  
            </nav>
            
            <div class="card">
                <div class="card-header"><h3 class="text-dark"><span class="fab fa-flipboard"></span> My Post:<h6 style="display: inline;">( <?= $items->num_rows;?> Post )</h6></h3></div>
                <div class="card-body rounded-bottom">
                    <?php while($i = $items->fetch_assoc()): ?>
                    <div class="card border-dark">
                        <div class="card-header border-dark"><h5 class="text-dark"><span class="fab fa-flipboard"></span> <?= $i['itemName'] ?></h5></div>
                        <div class="card-body rounded-bottom">
                            <a href="view.php/?i=<?= $i['itemID'];?>">
                                <img class="img-fluid" src="<?= $i['itemPhoto'];?>" class="rounded">
                            </a>
                            <br/><br/>
                            <h6 class="text-left"><span class="fas fa-info-circle"></span> Description:</h6>
                            <p class="text-left"><?= $i['itemDesc'];?></p>
                        </div> 
                    </div>
                    <br/>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
    </body>
</html>

