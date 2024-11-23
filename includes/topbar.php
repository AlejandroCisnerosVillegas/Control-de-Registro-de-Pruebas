<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <?php if ($_SESSION['aid']): ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Buscar registro..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <?php $query = mysqli_query($con, "select * from project_08_testrecord where ReportStatus is null");
            $count = mysqli_num_rows($query);
            ?>
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <span class="badge badge-danger badge-counter"><?php echo $count; ?></span>
                </a>
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                    Centro de notificaciones
                    </h6>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_array($query)) {
                    ?>
                            <a class="dropdown-item d-flex align-items-center" href="test-details.php?tid=<?php echo $row['id']; ?>&&oid=<?php echo $row['OrderNumber']; ?>">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500"><?php echo $row['RegistrationDate']; ?></div>
                                    <span class="font-weight-bold">Nuevo expediente #<?php echo $row['OrderNumber']; ?></span>
                                </div>
                            </a>
                        <?php }
                    } else { ?>
                        <p style="color:red">No hay notificaciones</p>
                    <?php } ?>
                    <a class="dropdown-item text-center small text-gray-500" href="new-test.php">Todas las notificaciones</a>
                </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                    $adid = $_SESSION['aid'];
                    $ret1 = mysqli_query($con, "select AdminName from project_08_admin where ID='$adid'");
                    while ($row1 = mysqli_fetch_array($ret1)) {
                    ?>
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row1['AdminName']; ?></span>
                    <?php } ?>
                    <img class="img-profile rounded-circle"
                        src="img/profile.png">
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="profile.php">
                        <i class="fas fa-user-tie fa-sm fa-fw mr-2 text-gray-400"></i>
                        Perfil
                    </a>
                    <a class="dropdown-item" href="change-password.php">
                        <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                        Cambiar contraseña
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Cerrar sesión
                    </a>
                </div>
            </li>
        </ul>
    <?php endif; ?>
</nav>