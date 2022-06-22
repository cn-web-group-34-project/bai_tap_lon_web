<?php
class CategoryController extends Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function list_categories(){
        $this->load->view('header');
        $product_model = $this->load->model('CategoryModel');
        $productdetail_model = $this->load->model('CategoryModel');

        $data = $category_model->getAll();
        $this->load->view('categories', $data);
        $this->load->view('footer');
    }
    
    public function insert_category(){
        $this->load->view('header');
        $category_model = $this->load->model('CategoryModel');
        if (isset($_POST['CategoryName']) && isset($_POST['Image'])){
            $data = array(
                'CategoryName'=>$_POST['CategoryName'],
                'Image'=>$_POST['Image']
            );
        }
        $result = $category_model->insert($data);
        $this->load->view('footer');
    }

    public function update_category(){
        $this->load->view('header');
        $category_model = $this->load->model('CategoryModel');
        $data = array(
            'CategoryName'=>'Skirasdt',
            'Image'=>'aswerd'
        );
        $cond = 'CategoryID = 1';
        $result = $category_model->update($data, $cond);
        $this->load->view('footer');
    }

    public function delete_category(){
        $this->load->view('header');
        $category_model = $this->load->model('CategoryModel');
        $data = array(
            'CategoryName'=>'Skirasdt',
            'Image'=>'aswerd'
        );
        $id = 1;
        $result = $category_model->delete($id);
        $this->load->view('footer');
    }

    public function add_category(){
        $this->load->view('header');
        $this->load->view('addcategory');
        $this->load->view('footer');
    }

}   

?>