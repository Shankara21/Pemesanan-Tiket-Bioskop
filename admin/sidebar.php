 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-ticket-alt"></i>
         </div>
         <div class="sidebar-brand-text mx-3">GOMOVIE</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link" href="index.php">
             <i class="fas fa-fw fa-home"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">



     <!-- Heading -->
     <div class="sidebar-heading">
         Manajemen
     </div>

     <!-- Manajemen Obat -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manajemen" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-folder"></i>
             <span>Manajemen</span>
         </a>
         <div id="manajemen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Manajemen:</h6>
                 <a class="collapse-item" href="manajemen-film.php">Film</a>
                 <a class="collapse-item" href="manajemen-kategori.php">Kategori</a>
                 <a class="collapse-item" href="manajemen-user.php">User</a>
                 <a class="collapse-item" href="manajemen-studio.php">Studio</a>
                 <a class="collapse-item" href="manajemen-kursi.php">Kursi</a>
                 <a class="collapse-item" href="manajemen-jadwal.php">Jadwal</a>
             </div>
         </div>
     </li>

     <!-- Laporan -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-folder"></i>
             <span>Laporan</span>
         </a>
         <div id="laporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Laporan:</h6>
                 <a class="collapse-item" href="histori-penjualan.php">Histori Penjualan</a>
             </div>
         </div>
     </li>





     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>


 </ul>
 <!-- End of Sidebar -->