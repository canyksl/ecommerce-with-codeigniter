<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/back/');?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Yönetim Paneli</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/back/');?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">Admin Panel</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
            
              <li class="nav-item">
                <a href="<?php echo base_url('admin/panel');?>" class="nav-link <?php active('panel'); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anasayfa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/product');?>" class="nav-link <?php active('product'); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürünler</p>
                </a>
             
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/kategoriler');?>" class="nav-link <?php active('kategoriler'); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürün Kategorileri</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/productchoose');?>" class="nav-link <?php active('productchoose'); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürün Seçenekleri</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/config');?>" class="nav-link <?php active('config'); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ayarlar</p>
                </a>
                
              <li class="nav-item">
                <a href="<?php echo base_url('admin/cikis');?>" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Oturumu Kapat</p>
                </a>
                <li class="header">
                <a class="nav-link">
                 
                  <p>Silme İşlemi</p>
                </a>
              </li>
              <?php if ($this->session->userdata('delete')) { ?>
                  <li class="nav-item">
                  <a href="<?php echo base_url('admin/delete');?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Silme İşlemi Açık</p>
                  </a>
               <?php } else { ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/delete');?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Silme İşlemi Kapalı</p>
                  </a>
               <?php } ?>
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php if(isset($head)){ echo $head;} ?></h1>
            <?php flashread(); ?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Yönetim Paneli</a></li>
              <li class="breadcrumb-item active"><?php if(isset($head)){ echo $head;} ?></li>


            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->