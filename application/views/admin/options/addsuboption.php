<?php 
$this->load->view('admin/include/header');
$this->load->view('admin/include/leftmenu');
?>
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-9">

            <form method="POST" action="<?php echo base_url('admin/altsecenekekle')?>">
            <div class="form-group">
                <label>alt seçenek adı</label>
                <input type="text" name="suboption" placeholder="Alt Seçenek Adını Giriniz." required class="form-control">
            </div>
            <div class="form-group">
                <label>Üst Seçenek Id</label>
                <input type="text" name="option" placeholder="Alt Seçenek Adını Giriniz." required class="form-control">
            </div>
            
            <div class="form-group">
                <button class="btn btn-block btn-flat btn-success">Ekle</button>
            </div>
            </form>
</div>

</div>
</div>
</div>






<?php $this->load->view('admin/include/footer');  ?>