<?php

function settings(){
    if (isset($_SESSION['id'])) { 
        echo '<li class="nav-item">
        <a href="settings.php"><span class="fa fa-cog" aria-hidden="true"></span></a>
        </li>';
    }
}

function search(){
    $return = '
    <div class="search_input" id="search_input_box">
    <div class="container">
        <form class="d-flex justify-content-between" action="./category.php" method="post">
            <input type="text" class="form-control" name="search_input" placeholder="Search Here" value="">
            <button type="submit" class="btn"></button>
            <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
        </form>
    </div>
    </div>
    ';

    echo $return;

}

function timeout(){
    $timeout = 600; // Number of seconds until it times out. (600 seconds = 10 minutes)
     
    // Check if the timeout field exists.
    if(isset($_SESSION['timeout'])) {
        // See if the number of seconds since the last
        // visit is larger than the timeout period.
        $duration = time() - (int)$_SESSION['timeout'];
        if($duration > $timeout) {
            // Destroy the session and restart it.
            session_start();
            session_unset();
            session_destroy();
        }
    }
     
    // Update the timout field with the current time.
    $_SESSION['timeout'] = time();
}

?>