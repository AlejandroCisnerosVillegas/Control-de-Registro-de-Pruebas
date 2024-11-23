<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-virus"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Registro</div>
    </a>
    <hr class="sidebar-divider my-0">
    <?php if ($_SESSION['aid']): ?>
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-home"></i>
                <span>Inicio</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-fw fa-user-nurse"></i>
                <span>Flebotomista</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="add-phlebotomist.php">Nuevo registro</a>
                    <a class="collapse-item" href="manage-phlebotomist.php">Administrar</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-file-medical-alt"></i>
                <span>Reporte de Seguimiento</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="new-test.php">Nuevo registro</a>
                    <a class="collapse-item" href="assigned-test.php">Asignación</a>
                    <a class="collapse-item" href="ontheway-samplecollection-test.php">En proceso</a>
                    <a class="collapse-item" href="sample-collected-test.php">Toma de muestras</a>
                    <a class="collapse-item" href="samplesent-lab-test.php">En laboratorio</a>
                    <a class="collapse-item" href="reportdelivered-test.php">Informe final</a>
                    <a class="collapse-item" href="all-test.php">Lista de reportes</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                aria-expanded="true" aria-controls="collapseThree">
                <i class="fas fa-fw fa-clipboard-check"></i>
                <span>Reportes</span>
            </a>
            <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="bwdates-report-ds.php">Búsqueda por fecha</a>
                    <a class="collapse-item" href="search-report.php">Búsqueda general</a>
                </div>
            </div>
        </li>

    <?php else:    ?>
        <li class="nav-item">
            <a class="nav-link" href="live-test-updates.php">
                <i class="fas fa-fw fa-chart-line"></i>
                <span>Estadísticas</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Control de Registro
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-user-edit"></i>
                <span>Registro</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="new-user-testing.php">Nuevo registro</a>
                    <a class="collapse-item" href="registered-user-testing.php">Reinsertar registro</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="patient-search-report.php">
                <i class="fas fa-fw fa-file-medical-alt"></i>
                <span>Reporte de Seguimiento</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="login.php">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Iniciar Sesión</span></a>
        </li>
    <?php endif;    ?>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>