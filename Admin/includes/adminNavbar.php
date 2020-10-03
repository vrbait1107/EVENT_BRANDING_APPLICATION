<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

    <a class="navbar-brand" href="<?php echo $index; ?>">Administrator</a>
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
                <a class="dropdown-item" id="adminLogout" href="#">Logout</a>
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

                    <a class="nav-link" href="<?php echo $index; ?>">
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

                    <!-- Charts-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#charts"
                        aria-expanded="false" aria-controls="charts">
                        Charts
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse" id="charts">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo $charts; ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                View Event Statistics
                            </a>
                        </nav>
                    </div>



                    <!-- Participants-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#participants"
                        aria-expanded="false" aria-controls="participants">
                        Participants
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse" id="participants">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo $participants; ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                View/Manage Participants
                            </a>
                        </nav>
                    </div>

                    <!-- Admin-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin"
                        aria-expanded="false" aria-controls="participants">
                        Admins
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse" id="admin">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo $admins ?>">
                                <div class="sb-nav-link-icon">
                                    <img src="https://img.icons8.com/wired/20/000000/admin-settings-male.png" alt="admin-settings"/>
                                </div>
                                Add/Manage Admin
                            </a>
                        </nav>
                    </div>


                    <!-- Emails-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#emails"
                        aria-expanded="false" aria-controls="emails">
                        Emails
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse" id="emails">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo $emails; ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                Send Emails to Users
                            </a>
                        </nav>
                    </div>


                    <!-- Sponsor-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sponsors"
                        aria-expanded="false" aria-controls="emails">
                        Sponsor
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse" id="sponsors">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo $sponsors; ?>">
                                <div class="sb-nav-link-icon">
                                    <img src="https://img.icons8.com/dotty/20/000000/crowdfunding.png" />
                                </div>
                                Add/Manage Sponsors
                            </a>
                        </nav>
                    </div>



                    <!-- News/Notification-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#news"
                        aria-expanded="false" aria-controls="emails">
                        News/Notification
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse" id="news">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo $news; ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-bell"></i>
                                </div>
                                Add/Manage News/Notification
                            </a>
                        </nav>
                    </div>


                    <!-- Events-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#events"
                        aria-expanded="false" aria-controls="events">
                        Events
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse" id="events">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo $events; ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                Add/Manage Events
                            </a>
                        </nav>
                    </div>


                    <!--Gallery Images-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#galleryImage"
                        aria-expanded="false" aria-controls="galleryImage">
                        Gallery Images
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>


                    <div class="collapse" id="galleryImage">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo $galleryImages; ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-images"></i>
                                </div>
                                Add/Manage Gallery Images
                            </a>
                        </nav>
                    </div>


                    <!-- Newsletter Emails-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#newsletter"
                        aria-expanded="false" aria-controls="newsletter">
                        Newsletter
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse" id="newsletter">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo $newsletter; ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                Send Newsletter
                            </a>
                        </nav>
                    </div>


                    <!-- Feedback-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#feedback"
                        aria-expanded="false" aria-controls="feedback">
                        Feedback
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse" id="feedback">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo $feedback; ?>">
                                <div class="sb-nav-link-icon">
                                    <img src="https://img.icons8.com/wired/20/000000/feedback.png" />
                                </div>
                                Manage Feedbacks
                            </a>
                        </nav>
                    </div>

                </div>

                <div class="sb-sidenav-footer font-Staatliches">
                    <div class="small">Logged in as:</div>
                    <?php echo $_SESSION['adminType']; ?>
                </div>

        </nav>
    </div>


