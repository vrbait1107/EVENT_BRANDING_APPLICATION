<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

    <a class="navbar-brand" href="<?php echo $adminFileName; ?>">Administrator</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>


    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#">Activity Log</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="adminLogout.php">Logout</a>
            </div>

        </li>
    </ul>
</nav>



<!-- Side Navbar-->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>

                    <a class="nav-link" href="<?php echo $adminFileName; ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                        data-parent="#sidenavAccordion">

                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                                data-target="#pagesCollapseAuth" aria-expanded="false"
                                aria-controls="pagesCollapseAuth">
                                Authentication
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>

                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="adminLogin.php">Login</a>
                                    <a class="nav-link" href="password.php">Change Password</a>
                                </nav>
                            </div>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">Addons</div>

                    <a class="nav-link" href="<?php echo $adminFileData; ?>">

                        <div class="sb-nav-link-icon">
                            <i class="fas fa-table"></i>
                        </div>
                        Tables
                    </a>

                    <a class="nav-link" href="<?php echo $adminManage ?>">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-table"></i>
                        </div>
                        Add/Manage Admin
                    </a>

                    <a class="nav-link" href="sendMails.php">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        Send Emails to Users
                    </a>

                      <a class="nav-link" href="addSponsor.php">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                       Add/Manage Sponsors
                    </a>


                </div>
            </div>


            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $_SESSION['adminType']; ?>
            </div>

        </nav>
    </div>