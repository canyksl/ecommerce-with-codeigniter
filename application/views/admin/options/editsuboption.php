<?php 
$this->load->view('admin/include/header');
$this->load->view('admin/include/leftmenu');
?>
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-9">

            <form method="POST" action="<?php echo base_url('admin/altsecenekduzenle/'.$suboptions->option_id);?>">
            <div class="form-group">
                <label>Alt Seçenek</label>
                <input type="text" name="name" value="<?= $suboptions->name;?>" required class="form-control">
            </div>
            <div class="form-group">
                <label>Üst Seçenek ID</label>
                <input type="number" name="optionid" value="<?= $suboptions->option_id;?>" required class="form-control">
            </div>
          
            <div class="form-group">
                <button class="btn btn-block btn-flat btn-success">Güncelle</button>
            </div>
            </form>
</div>

</div>
</div>
</div>






<?php $this->load->view('admin/include/footer');  ?>