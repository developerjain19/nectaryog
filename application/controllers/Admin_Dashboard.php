<?php
defined('BASEPATH') or exit('no direct access allowed');

class Admin_Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (sessionId('admin_id') == "") {
            redirect(base_url('admin'));
        }
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index()
    {
        $data['title'] = "Home";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        // $data['category'] = $this->CommonModal->getNumRow('category');
        // $data['products'] = $this->CommonModal->getNumRow('product');
        // // $data['user_registration'] = $this->CommonModal->getNumRow('user_registration');
        // $data['contact_query'] = $this->CommonModal->getNumRow('contact_query');
        // $data['new'] = $this->CommonModal->getNumRows('checkout', array('status' => '0'));
        // $data['working'] = $this->CommonModal->getNumRows('checkout', array('status' => '1'));
        // $data['cancelled'] = $this->CommonModal->getNumRows('checkout', array('status' => '2'));
        // $data['completed'] = $this->CommonModal->getNumRows('checkout', array('status' => '3'));
        // $data['checkout'] = $this->CommonModal->getRowById('checkout', 'create_date_only', setDateOnly());
        $this->load->view('admin/dashboard', $data);
    }


    public function gallery()
    {

        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Gallery";
        $data['gallery'] = $this->CommonModal->getAllRows('gallery');
        $config['upload_path'] = base_url('uploads/gallery');

        if (count($_FILES) > 0) {

            $post = $this->input->post();
            $no = rand();

            $countImg = count($_FILES['image_file']);
            for ($i = 0; $i <= $countImg; $i++) {
                $no = rand();
                if (!empty($_FILES["image_file"]["name"][$i])) {
                    $folder = "uploads/gallery/";
                    move_uploaded_file($_FILES["image_file"]["tmp_name"][$i], "$folder" . $no . $_FILES["image_file"]["name"][$i]);
                    $file_name1 = $no . $_FILES["image_file"]["name"][$i];
                    $savedata =   $this->CommonModal->insertRowReturnId('tbl_gallery', array('image_file' => $file_name1));
                }
            }
            if ($savedata) {
                $this->session->set_flashdata('msg', 'gallery added Sucessfully');
                $this->session->set_flashdata('msg_class', 'alert-success');;
            } else {
                $this->session->set_userdata('msg', 'Something went Wrong. please try again later  ');
            }
            redirect(base_url('admin_Dashboard/gallery'));
        } else {
            $this->load->view('admin/gallery', $data);
        }
    }

    public function disable()
    {
        $id = $this->uri->segment(3);
        $table = $this->uri->segment(4);
        $status = $this->uri->segment(5);

        $data['favicon'] = base_url() . 'assets/images/favicon.png';

        if ($table == 'category') {
            $this->CommonModal->updateRowById('category', 'id', $id, array('is_visible' => $status));
            redirect(base_url('admin_Dashboard/product_category'));
        }
        if ($table == 'sub_category') {
            $this->CommonModal->updateRowById('category', 'id', $id, array('is_visible' => $status));
            redirect(base_url('admin_Dashboard/product_subcategory'));
        }
        if ($table == 'promocode') {
            $this->CommonModal->updateRowById($table, 'pid', $id, array('status' => $status));
            redirect(base_url('admin_Dashboard/promocode'));
        }
        if ($table == 'products') {
            $this->CommonModal->updateRowById($table, 'product_id', $id, array('status' => $status));
            redirect(base_url('admin_Dashboard/view_products'));
        }
    }
    public function contact_query()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Contact Query";
        $table = "contact_query";
        $BdID = $this->input->get('BdID');
        if (decryptId($BdID) != '') {
            $delete = $this->CommonModal->deleteRowById('contact_query', array('cid' => decryptId($BdID)));

            redirect('Admin_Dashboard/contact_query');
            exit;
        }
        $data['contact'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/contact', $data);
    }

    public function contactdetails()
    {
        $data['title'] = "Contact Details";
        $table = "contactdetails";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['contactdetails'] = $this->CommonModal->getRowById($table, 'cid', '1');
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $update = $this->CommonModal->updateRowByMoreId($table, array('cid' => '1'), $post);
            if ($update) {

                $this->session->set_flashdata('msg', 'Category Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Soemthing went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }

            redirect(base_url() . 'admin_Dashboard/contactdetails');
        } else {
            $this->load->view('admin/contactdetails', $data);
        }
    }

    public function faq()
    {
        $table = "faq";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "FAQ";
        $data['faq'] = $this->CommonModal->getAllRows($table);

        $BdID = $this->input->get('BdID');
        if (decryptId($BdID) != '') {
            $delete = $this->CommonModal->deleteRowById('faq', array('fid' => decryptId($BdID)));

            redirect('Admin_Dashboard/faq');
            exit;
        }
        $this->load->view('admin/faq', $data);
    }
    public function add_faq()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Add FAQ";
        if (count($_POST) > 0) {
            $data = $this->input->post();
            $done = $this->CommonModal->insertRow('faq', $data);
            if ($done) {

                $this->session->set_flashdata('msg', 'FAQ Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Soemthing went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('admin_Dashboard/faq'));
        } else {


            $this->load->view('admin/add_faq', $data);
        }
    }

    public function policy()
    {
        $data['title'] = "Policy";

        $data['policy'] = $this->CommonModal->getAllRowsInOrder('policy', 'id', 'desc');
        $this->load->view('admin/policy', $data);
    }

    public function policy_edit()
    {
        $key = $this->uri->segment(3);
        $data['title'] = "Policy Edit";
        $id = decryptId($key);

        $data['policy'] = $this->CommonModal->getRowById('policy', 'id', $id);

        // print_r($data['policy']);
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $savedata = $this->CommonModal->updateRowById('policy', 'id', $id, $post);
            if ($savedata) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Policy Update Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Policy Update Successfully</div>');
            }
            redirect(base_url('admin_Dashboard/policy'));
        } else {
            $this->load->view('admin/policy-edit', $data);
        }
    }


   
    public function deletegallery($id)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $table = "tbl_gallery"; 

        $data = $this->CommonModal->getRowById('tbl_gallery', 'id', $id);
        if (file_exists("uploads/gallery/" . $data[0]['image_file'])) {
            unlink('uploads/gallery/' . $data[0]['image_file']);
        }

        if ($this->CommonModal->deleteRowById($table, array('id' => $id))) {
            $this->session->set_flashdata('msg', 'gallery Delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'gallery not Delete Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }


        redirect('admin_Dashboard/gallery');
    }



    public function products()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';

        $data['title'] = "Products";
        $data['products'] = $this->CommonModal->getAllRows('product');
        $this->load->view('admin/products', $data);
    }

    public function add_product()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Add Product";
        $data['category'] = $this->CommonModal->runQuery("SELECT * FROM `bc_category` WHERE `parent_id` = '0' order by `id` DESC");

        if (count($_POST) > 0) {

            $table = "product";
            $productId = $this->CommonModal->insertRowReturnIdWithClean($table, $data);

            if ($productId) {
                $this->session->set_flashdata('msg', 'Product  Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url() . 'admin_Dashboard/view_products');
        } else {
            $this->load->view('admin/add_products', $data);
        }
    }

    public function filterData()
    {
        $category = $this->input->post('category');
        $data['city'] = $this->CommonModal->getRowByIdInOrder('category', array('parent_id' => $category), 'name', 'asc');
        $this->load->view('get_subcate', $data);
    }
}
