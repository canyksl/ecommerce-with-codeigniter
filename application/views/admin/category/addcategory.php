<?php 
$this->load->view('admin/include/header');
$this->load->view('admin/include/leftmenu');
?>
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-9">

            <form method="POST" action="<?php echo base_url('admin/categoryadd')?>">
            <div class="form-group">
                <label>Kategori Adı</label>
                <input type="text" name="category" placeholder="Kategori Adını Giriniz." required class="form-control">
            </div>
            <div class="form-group">
                <label>Üst Kategori</label>
                <select  name="topcategory" class="form-control">
                    <option value="1">Erkek</option>
                    <option value="2">Kadın</option>
                    <option value="3">Çocuk</option>
                </select>
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