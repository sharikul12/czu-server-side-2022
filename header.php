<?php
    session_start();
?>
    <nav id="mainNav" class="navbar navbar-expand-md navbar-light sticky-top" style="background-color: #e1ecf7;">
        <div class="container-fluid fs-5 fw-bold">
            <a class="navbar-brand" href="./index.html"> <img src="./src/img/logo.png" width="135" height="45" alt=""
                    class="d-line-block">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navLinks">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navLinks">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="./index.php" class="nav-link" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="./about.php" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="./participants.php" class="nav-link">Participant</a>
                    </li>
                    <li class="nav-item">
                        <a href="./blogs.php" class="nav-link">Blog</a>
                    </li>
                    <?php 
                        if(isset($_SESSION['user'])) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenu" role="button"
                            data-bs-toggle="dropdown">
                            <?=$_SESSION['user']['name'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="./logout.php">LogOut</a></li>
                            <li><a class="dropdown-item" href="./contact.php">Contact</a></li>
                            
                        </ul>
                    </li>
                    <?php 
                        } 
                        else 
                        { 
                    ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenu" role="button"
                            data-bs-toggle="dropdown">
                            SignIn
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="./login.php">SignIn</a></li>
                            <li><a class="dropdown-item" href="./signup.php">SignUp</a></li>
                            <li><a class="dropdown-item" href="./contact.php">Contact</a></li>
                            
                        </ul>
                        </li>
                      <?php } ?>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
