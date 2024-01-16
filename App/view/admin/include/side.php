
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-GLhlTQ8iGq73d6Ll6TISbA4I+0bR5b9sC6dH/8F+O2KAq0p2EGgeG1fF5th/kUAb" crossorigin="anonymous">

        <ul class="col navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-globe"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">Wiki</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?=APP_URL?>index">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

             <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="<?=APP_URL?>statistics"  >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Statistics</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=APP_URL?>article"  >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Articles</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=APP_URL?>categorie">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Categories</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?=APP_URL?>tag">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Tags</span>
                </a>
            </li>
        
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="width:90%">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                  
                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                       
                        <div class="topbar-divider d-none d-sm-block"></div>

                        
                    </ul>

                </nav>
    <!-- </div> -->