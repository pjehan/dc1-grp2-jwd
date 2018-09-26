<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?php echo $siteadmin; ?>">Administration</a>
    <ul class="navbar-nav"></ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item dropdown text-nowrap">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                pierre.jehan@gmail.com
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">
                    <i class="fa fa-user"></i>
                    Mon profile
                </a>
                <a class="dropdown-item" href="<?php echo $siteadmin; ?>logout.php">
                    <i class="fa fa-sign-out"></i>
                    Déconnexion
                </a>
            </div>
        </li>
    </ul>
</nav>