<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\Commands\Utilities\Publish;

class ProductController extends BaseController
{
    private $products;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->products= new ProductModel();
    }

    public function index()
    {
       $data['items']= $this->products->findAll();
       $data['title'] = "Display All Products";
// print_r($data['products']);
     return view('products/index',$data);
    }
    
    public function create(){
        return view("products/create");
    }
    public function store(){
       $data =[
        'product' => $this->request->getVar("name"),
        'category' => $this->request->getVar("category"),
        'price' => $this->request->getVar("price"),
        'sku' => $this->request->getVar("cat"),
        'model' => $this->request->getVar("model"),
        'photo' => $this->request->getFile('photo')->getName('photo'),
        
       ];
    //    print_r($data);

       $rules = [
        'name' => 'required|max_length[30]|min_length[3]',
        // 'password' => 'required|max_length[255]|min_length[10]',
        // 'passconf' => 'required|max_length[255]|matches[password]',
        // 'email'    => 'required|max_length[254]|valid_email',
        'photo' => 'uploaded[photo]|max_size[photo,1024]|ext_in[photo,jpg,jpeg]'
    ];
    
            if (! $this->validate($rules)) {
                return view('products/create');
            }
            else{
                $img = $this->request->getFile('photo');
                $img->move(WRITEPATH.'uploads');
                $this->products->insert($data);
                $session = session();
                $session->setFlashdata('msg','Inserted and uploaded  Successfully');
                $this->response->redirect('/products');
            }
        
   
    }
    public function edit($id){
        $data = $this->products->find($id);
        // print_r($data);
        return view('products/edit',$data);
    } 
    //update//
    public function update($id){
        $data =[
            'product' => $this->request->getVar("name"),
            'category' => $this->request->getVar("category"),
            'price' => $this->request->getVar("price"),
            'sku' => $this->request->getVar("cat"),
            'model' => $this->request->getVar("model")
            
        ];
        $this->products->update($id,$data);
        $session=session();
    $session->setFlashdata('msg','updated Successfully');
    $this->response->redirect('/products');
    }
  
       
   
        public function delete($id){
        $this->products->where('product_id',$id);
        $this->products->delete();
        $this->response->redirect('/products');
       
    }
}
