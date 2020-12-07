<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
		// Oturum Kontrolü
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('adminlogin')&&$this->uri->segment(2)&&$this->uri->segment(2)!='login') 
		{
			redirect('admin');
		}
	}
	public function index()
	{
		if ($this->session->userdata('adminlogin')) {redirect('admin/panel');}
		$this->load->view('admin/login');
	}
	public function delete()
	{
		if ($this->session->userdata('delete')) 
		{
			$this->session->unset_userdata('delete');

		}else
		{
			$this->session->set_userdata('delete',true);
		}
		back();
	}
	public function sil($table,$id)
	{
		if (!$this->session->userdata('delete')) 
		{
			back();

		}
		switch ($table) {
			case 'product':
				$product=Product::find($id);
				if ($product) 
				{
					Stocktype::delete(['product'=>$id]);
					Stock::delete(['product'=>$id]);
					$images=Images::select(['product'=>$id]);
					foreach ($images as $image) 
					{
						unlink($image->path);
						Images::delete($image->id);
					}
					unlink($product->qrcode);
					Product::delete($id);
					
				}
			break;
			case 'stock':
				Stock::delete($id);
			break;
			case 'category':
				Category::delete($id);
			break;
			case 'options':
				$option=Options::find($id);
				AltSecenekler::delete(['option_id'=>$option->id]);
				Options::delete($id);
			break;
			case 'suboptions':
				$altsecenek=Altsecenekler::find($id);
				Stock::delete(['suboption'=>$altsecenek->id]);
				Stock::delete(['suboption2'=>$altsecenek->id]);
				Altsecenekler::delete($id);
			break;
		}
		flash('success','check','Silme İşlemi Başarıyla Gerçekleşti.');
		back();
	}
	public function login()
	{
		
		$exist=Yonetim::find(['mail'=>$this->input->post('email'),'sifre'=>$this->input->post('sifre')]);
		if ($exist) {
			//login olunmuş
			$this->session->set_userdata('adminlogin',true);
			$this->session->set_userdata('admininfo',$exist);
			redirect('admin/panel');
		}else {
			//hata mesajı
			$hata="Email adresi veya Şifre hatalı.";
			$this->session->set_flashdata('error',$hata);
			redirect('admin');
		}	
	}
	// Oturum Kontrolü Son
	// Site Ayarları
	public function panelpost()
	{
		$config=Yonetim::find(postvalue('id'));
		 $data=[
		 	'name'=>postvalue('name'),
		 	'mail'=>postvalue('mail'),
		 	'sifre'=>postvalue('sifre')
		 	];
		
		if ($_FILES['image']['size']>0 )
		{
			$data['image']=imageupload('image','admin','jpg|gif|png|jpeg|JPG|PNG');
			unlink($config->image);
		}
		
		
		Yonetim::update(postvalue('id'),$data);
		flash('success','check','Ayarlar Güncellendi');
		back();
	}
	public function panel()
	{
		$data['head']="Panel";
		$data['config']=Yonetim::find(1);
		$this->load->view('admin/panel',$data);
	}
	public function product()
	{
		$data['head']="Ürünler";
		$data['products']=Product::select();
		$this->load->view('admin/product/products',$data);
	}
	public function addproduct()
	{
		$data['head']="Ürün Ekle";
		$data['subcategory']=Kategori::select();
		$this->load->view('admin/product/addproduct',$data);
	}
	public function	productedit($id)
	{
		if(isPost())
		{
			if (postvalue('step1'))
			{
				$data=
				[
			   'category'=>postvalue('category'),
			   'subcategory'=>postvalue('subcategory'),
			   'title'=>postvalue('product'),
				'description'=>postvalue('desc'),
				'price'=>postvalue('price'),
				'discount'=>postvalue('discount'),
				'tag'=>postvalue('tag'),
				];
				   Product::update($id,$data);
				   flash('success','check','Ürün bilgileri güncellendi.');
				   back();
			}
		}
		$urun=Product::find($id);
		if(!$urun){
			flash('danger','remove','Böyle bir ürün yoktur.');
			back();
		}
		$stocktype=Stocktype::find(['product'=>$urun->id]);
		$secenek1=Altsecenekler::select(['option_id'=>$stocktype->options]);
		$secenek2=null;
		if($stocktype->options2!=null)
		{
			$secenek2=Altsecenekler::select(['option_id'=>$stocktype->options2]);
			
		}
		
		
		
		
		if(!$urun){flash('warning','hata','Böyle Bir Ürün Bulunamadı.'); back();}
		$data['head']="Ürün Düzenle";
		$data['product']=$urun;
		$data['images']=Images::select(['product'=>$id]);
		$data['type']=$stocktype;
		$data['stocks']=Stock::select(['product'=>$id]);
		$data['subcategory']=Kategori::select();
		$data['option1']=$secenek1;
		$data['option2']=$secenek2;
		$this->load->view('admin/product/editproduct',$data);
	}
	public function delproductimg($id)
	{
		$resim=Images::find($id);
		if($resim->master==1){flash('warning','ban','Kapak Fotoğrafı Silinemez.'); back();}
		unlink($resim->path);
		Images::delete($id);
		flash('success','check','Resim Başarıyla Silindi.');
		back();
	}
	public function masterproductimg($id)
	{
		$resim=Images::find($id);
		Images::update(['product'=>$resim->product],['master'=>0]);
		$data=['master'=>1]; 
		Images::update($id,$data);
		flash('success','check','kapak Resmi Seçildi.');
		back();
	}
	public function addimgproduct($id)
	{
		if(isPost())
		{
			$product=Product::find($id);
			$config['upload_path']='assets/upload/products/';
			$config['allowed_types']='jpg|png|jpeg|JPG|PNG';
			$config['file_name']=$product->seo.$product->id;
			$this->upload->initialize($config);
			if ($this->upload->do_upload('file')) 
			{
				$image=$this->upload->data();
				$path=$config['upload_path'].$image['file_name'];
				$data=['product'=>$id,'path'=>$path];
				Images::insert($data);
			}
		}
		$data['head']="Ürün resim Ekle";
		$data['subcategory']=Kategori::select();
		$this->load->view('admin/product/addproductimg',$data);
	}
	public function urunstoktipiekle($id)
	{
		
		if(isPost())
		{
			if (postvalue('subcategory')==postvalue('subcategory2')) {
				flash('danger','remove','Ürün seçenekleri birbirinden farklı olmalıdır.');
				back();
			}
			if (Stocktype::count(['product'=>$id])==1) {
				flash('danger','remove','Bu Ürün için  stok tipi belirlenmiş.');
				back();
			}
			
				$data=['product'=>$id,'options'=>postvalue('subcategory')];
				if(postvalue('subcategory2')!=0){$data['options2']=postvalue('subcategory2');}
				Stocktype::insert($data);
				flash('success','check','Stok Tipi Başarıyla Girildi.');
				redirect('admin/urunstokekle/'.$id);
		}
		$data['head']="Ürün stok Ekle";
		$data['options']=Options::select();
		$this->load->view('admin/product/addproductstocktype',$data);
	}
	public function urunstokekle($id)
	{
		if(isPost())
		{
			if(Stock::find(['product'=>$id,'suboption'=>postvalue('subcategory'),'suboption2'=>postvalue('subcategory2')]))
			{
				flash('danger','remove','Bu Değerlere Ait Stok Bilgisi Zaten Mevcut');
				back();
			}
			$data=[
			'product'=>$id,
			'suboption'=>postvalue('subcategory'),
			'suboption2'=>postvalue('subcategory2'),
			'stock'=>postvalue('stock')
			];
			Stock::insert($data);
			flash('success','check','Stok Başarıyla Eklendi.');
			back();
		}
		$product=Product::find($id);
		if(!$product){
			flash('danger','remove','Böyle bir ürün yoktur.');
			back();
		}
		$stocktype=Stocktype::find(['product'=>$product->id]);
		$secenek1=Altsecenekler::select(['option_id'=>$stocktype->options]);
		$secenek2=null;
		if($stocktype->options2!=null)
		{
			$secenek2=Altsecenekler::select(['option_id'=>$stocktype->options2]);
			
		}
		$data['option1']=$secenek1;
		$data['option2']=$secenek2;
		$data['type']=$stocktype;
		$data['stocks']=Stock::select(['product'=>$id]);
		$data['head']="Ürün stoklarını giriniz";
		
		$this->load->view('admin/product/addproductstock',$data);
	}
	public function editproductstock($id)
	{
		
		if (isPost()) 
		{
			$stock=Stock::find($id);
			$data=[
				'product'=>$stock->product,
				'suboption'=>postvalue('subcategory'),
				'suboption2'=>postvalue('subcategory2'),
				'stock'=>postvalue('stock')
				];
				Stock::update($id,$data);
				flash('success','check','Stok Başarıyla Güncellendi.');
				back();
		}
		
		$stocktype=Stocktype::find(['product'=>$id]);
		$secenek1=Altsecenekler::select(['option_id'=>$stocktype->options]);
		$secenek2=null;
		if($stocktype->options2!=null)
		{
			$secenek2=Altsecenekler::select(['option_id'=>$stocktype->options2]);
			
		}
		$data['option1']=$secenek1;
		$data['option2']=$secenek2;
		$data['type']=$stocktype;
		$data['stocks']=Stock::select(['product'=>$id]);
		$data['head']="Ürün stoklarını düzenle";
		$this->load->view('admin/product/editproductstock',$data);
	}
	public function productcontrol($id=null)
	{
		if (isPost()) 
		{
		 if (postvalue('step1')) {
			 	$data=[
				'category'=>postvalue('category'),
				'subcategory'=>postvalue('subcategory'),
				'title'=>postvalue('product'),
			 	'description'=>postvalue('desc'),
			 	'price'=>postvalue('price'),
			 	'discount'=>postvalue('discount'),
			 	'tag'=>postvalue('tag'),
			 ];
			Product::insert($data);
			$insert_id=$this->db->insert_id();
			 $qrpath='assets/upload/qrcode/urun'.$insert_id.'.png';
			 $params['data'] = 'urunid='.$insert_id;
			 $params['level'] = 'H';
			 $params['size'] = 5;
			 $params['savename'] = FCPATH.$qrpath;
			 $this->ciqrcode->generate($params);
			
			 Product::update($insert_id,['qrcode'=>$qrpath]);
			redirect('admin/addimgproduct/'.$insert_id);
			}	
			
		}
		
		$urun=Product::find($id);
		if($urun!=null)
		{
			
			Product::update($id,['complete'=>1]);
			flash('success','check','Ürün Başarıyla Eklendi.');
			redirect('admin/product/products');
		}
	}
	public function ayarlarpost()
	{
		$config=Ayarlar::find(postvalue('id'));
		 $data=[
		 	'title'=>postvalue('title'),
			'info'=>postvalue('info'),
		 	'mail'=>postvalue('mail'),
		 	'telefon'=>postvalue('tel'),
		 	'facebook'=>postvalue('face'),
		 	'instagram'=>postvalue('instagram'),
		 	'twitter'=>postvalue('twitter'),
		 	'youtube'=>postvalue('youtube')
		 	];
		if ($_FILES['logo']['size']>0 ){
			
			$data['logo']=imageupload('logo','config','png|PNG');
			unlink($config->logo);
		}
		if ($_FILES['icon']['size']>0 ){
			
			$data['icon']=imageupload('icon','config','jpg|gif|png|jpeg|JPG|PNG');
			unlink($config->icon);
		}
		
		
		Ayarlar::update(postvalue('id'),$data);
		flash('success','check','Ayarlar Güncellendi');
		back();
	}
	public function config()
	{
		$data['head']="Site Ayarları";
		$data['config']=Ayarlar::find(8);
		$this->load->view('admin/config',$data);
	}
	// Site Ayarları Son
	// Ürün Kategorileri
	public function kategoriler()
	{
		$data['head']="Ürün Kategorileri";
		$data['categories']=Kategori::select();
		$this->load->view('admin/category/categories',$data);
	}
	public function categoryedit($id)
	{	
		if (isPost()) {
			$data=['topcategory'=>postvalue('topcategory'),'name'=>postvalue('category'),'slug'=>slugify(postvalue('category'))];
			Kategori::update($id,$data);
			flash('success','check','Kategori Güncellendi.');
			back();
		}
		$isExist=Kategori::find($id);
		if ($isExist) {
		$data['head']="Kategori Düzenle";
		$data['category']=$isExist;
		$this->load->view('admin/category/editcategory',$data);
		}
		
	}
	public function categoryadd()
	{
		if (isPost()) 
		{
			$data=['topcategory'=>postvalue('topcategory'),'name'=>postvalue('category'),'slug'=>slugify(postvalue('category'))];
			Kategori::insert($data);
			flash('success','check','Kategori Eklendi.');
			back();
		}
		$data['head']="Kategori Ekle";
		$this->load->view('admin/category/addcategory',$data);
		
		
	}
	// Ürün Kategorileri Son

	// Ürün Seçenekleri

	public function productchoose()
	{
		$data['head']="Ürün Seçenekleri";
		$data['options']=Options::select();
		$this->load->view('admin/options/options',$data);
	}
	public function productchooseadd()
	{
		if (isPost()) 
		{
			$data=['name'=>postvalue('name'),'slug'=>slugify(postvalue('name'))];
			Options::insert($data);
			flash('success','check','Ürün Seçeneği Eklendi.');
			back();
		}
		$data['head']="Ürün Seçenekleri Ekle";
		$this->load->view('admin/options/addoptions',$data);
	}
	public function productchooseedit($id)
	{	
		if (isPost()) {
			$data=['name'=>postvalue('name'),'slug'=>slugify(postvalue('name'))];
			Options::update($id,$data);
			flash('success','check','Ürün Seçeneği Güncellendi.');
			back();
		}
		$isExist=Options::find($id);
		if ($isExist) {
		$data['head']="Ürün Seçeneğini Düzenle";
		$data['options']=$isExist;
		$this->load->view('admin/options/editoption',$data);
		}
		
	}
	public function altsecenekler($id)
	{

		$data['head']="Alt Ürün Seçenekleri";

		
		$data['id']=Altsecenekler::select();
		$data['suboptions']=Altsecenekler::select(['option_id'=>$id]);
		
		$this->load->view('admin/options/suboptions',$data);
	}
	public function altsecenekekle()
	{
		if (isPost()) 
		{
			$data=['name'=>postvalue('suboption'),'option_id'=>postvalue('option'),'slug'=>slugify(postvalue('suboption'))];
			Altsecenekler::insert($data);
			flash('success','check','Alt Seçenek Eklendi.');
			back();
		}
		$data['options']=Options::select();
		$data['head']="Alt Seçenekleri Ekle";
		$this->load->view('admin/options/addsuboption',$data);
	}
	public function altsecenekduzenle($id)
	{	
		if (isPost()) 
		{
			$data=['name'=>postvalue('name'),'option_id'=>postvalue('optionid')];
			Altsecenekler::update($id,$data);
			flash('success','check','Alt Seçenek Güncellendi');
			back();
		}
		$data['options']=Options::select();
		$data['suboptions']=Altsecenekler::find($id);
		$data['head']="Alt Seçenekleri Düzenle";
		$this->load->view('admin/options/editsuboption',$data);
		
	}
	

	public function cikis()
	{
		$this->session->sess_destroy();
		redirect('admin');
		
	}
}
