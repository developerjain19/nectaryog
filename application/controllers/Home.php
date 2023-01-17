<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
   
    public function index()
    {

        $data['title'] = 'Welcome To Nectar Yog - Discover the divine within you';
        $this->load->view('index', $data);
    }


    public function about()
    {
        $data['title'] = 'About Us | Nectar Yog - Discover the divine within you';
        $this->load->view('about', $data);
    }
    
    

    public function ashram_stay()
    {

        $data['title'] =  'Ashram Stay | Nectar Yog - Discover the divine within you';
        $this->load->view('ashram-stay', $data);
    }

    public function shri_vidya()
    {

        $data['title'] =  'shri Vidya Swatwik Sadhana  | Nectar Yog - Discover the divine within you';
        $this->load->view('shri-vidya', $data);
    }
    
    public function yoga_teacher_training_course()
    {

        $data['title'] =  'Yoga Teacher Training Course | Nectar Yog - Discover the divine within you';
        $this->load->view('yoga-teacher-training-course', $data);
    }

    public function divine_blessing_therapy()
    {

        $data['title'] =  'divine Blessing Therapy  | Nectar Yog - Discover the divine within you';
        $this->load->view('divine-blessing-therapy', $data);
    }

    public function gallery()
    {
        $data['title'] =  'Gallery | Nectar Yog - Discover the divine within you';
        $data['gallery'] = $this->CommonModal->getAllRows('gallery');
        $this->load->view('gallery', $data);
    }
    
     
    public function selectgallery()
    {
        $data['getgallery'] = $this->CommonModal->getAllRows('gallery');
        $this->load->view('select-gallery', $data);
    }

    

    public function contact()
    {

        $data['title'] =  'Contact Us | Nectar Yog - Discover the divine within you';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $insert = $this->CommonModal->insertRowReturnId('contact_query', $post);
            if ($insert) {
                $this->session->set_userdata('msg', 'Your query is successfully submit. We will contact you as soon as possible.');
            } else {
                $this->session->set_userdata('msg', 'We are facing technical error ,please try again later or get in touch with Email ID provided in contact section.');
            }
        } else {
        }

        $this->load->view('contact', $data);
    }
}
