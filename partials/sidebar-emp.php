 <!-- Sidebar -->
  
 <div class="sidebar sidebar-style-2" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
          <a href="dashboard.php" class="logo" style="display: flex; align-items: center;">
            <img
                src="../public/assets/wdLogo.jpg"
                alt="navbar brand"
                class="navbar-brand"
                height="40"
                style="margin-right: 5px;"
            />
            <span style="color: white; font-size:13px;">Water District Buenavista</span>
        </a>

            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <ul class="nav nav-secondary">
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Dashboard</h4>
            </li>
            <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>">
              <a href="dashboard.php">
                <i class="fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Menu</h4>
            </li>
            <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'application.php') ? 'active' : ''; ?>">
              <a href="application.php">
                <i class="fas fa-file-alt"></i>
                <p>Application</p>
              </a>
            </li>
            <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'schedules.php') ? 'active' : ''; ?>">
              <a href="schedules.php">
                <i class="fas fa-calendar-alt"></i>
                <p>Schedules</p>
              </a>
            </li>
            <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'candidates.php') ? 'active' : ''; ?>">
              <a href="candidates.php">
                <i class="fas fa-users"></i>
                <p>Candidates</p>
              </a>
            </li>
            <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'reports.php') ? 'active' : ''; ?>">
              <a href="reports.php">
                <i class="fas fa-chart-bar"></i>
                <p>Reports</p>
              </a>
            </li>
            <?php if ($_SESSION['role'] !== "Staff"): ?>
              <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'accounts.php') ? 'active' : ''; ?>">
                <a href="accounts.php">
                  <i class="fas fa-user-cog"></i>
                  <p>Accounts</p>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
      </div>
      <!-- End Sidebar -->
      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid">
              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                  <div class="avatar-sm">
                    <i class="fas fa-user-circle avatar-img rounded-circle" style="font-size: 2.5rem; color:rgb(43, 43, 43);"></i>
                  </div>
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold"><?php echo $fullname ?></span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div >
                            <h6 ><?php echo $fullname ?></h6>
                            <span>(<?php echo $_SESSION['role'] ?>)</span>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="http://localhost/smarthr/logout.php">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>