<header class="page-header">
    <nav class="navbar mega-menu" role="navigation">
        <div class="container-fluid">
            <div class="clearfix navbar-fixed-top">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="toggle-icon">
                        <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </span>
                </button>
                <a id="index" class="page-logo site-title" href="/">
                    <img src="/img/logo.png" alt="Logo">
                    <span>University of Mindanao LIC</span>
                </a>
                <div class="topbar-actions">
                    <div class="btn-group-red btn-group">
                        <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="fa fa-plus"></i>
                        </button>
                        <ul class="dropdown-menu-v2" role="menu">
                            <li>
                                <a data-toggle="modal" data-target="#newCollegeModal" href="#">New college</a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#newCourseModal" href="#">New course</a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#newResourceModal" href="#">New resource</a>
                            </li>
                        </ul>
                    </div>
                    <div class="btn-group-img btn-group">
                        <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img src="/img/default-photo.png" alt="">
                        </button>
                        <ul class="dropdown-menu-v2" role="menu">
                            <li class="active">
                                <a href="#">{{ auth()->user()->name }}</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="/logout">Sign Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav text-uppercase">
                    <li class="dropdown dropdown-fw open selected">
                        <a href="/">
                            <i class="fa fa-home" style="font-size: 30px;"></i>
                        </a>
                        <ul id="dash-nav" class="dropdown-menu dropdown-menu-fw">
                            <li><a href="/">Members</a></li>
                            <li><a href="/colleges">Colleges</a></li>
                            <li><a href="/courses">Courses</a></li>
                            <li><a href="/resource-listings">Resources</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<style type="text/css">
    .site-title {
        font-size: 30px;
        font-weight: bold;
        color: white;
    }

    .site-title:hover {
        text-decoration: none;
        color: white;
    }
</style>
