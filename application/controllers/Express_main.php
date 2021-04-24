<?php

class Express_main extends CI_Controller
{

    // constructor
    function __construct()
    {
        parent::__construct();
        $this->load->model('Express_main_model');
    }

    
    /**
     * index
     * The purpose of this index function is just to load the homepage of the Express app
     *
     * @return void
     * @author Avinash Kumar <p4avinashkumar@gmail.com> on 24th April 2021
     */
    public function index()
    {
        $this->load->view('express_main');
    }

    
    /**
     * load_register
     * The purpose of this function is to laod the register view, validate and save the provided user data to the database
     *
     * @return void
     * @author Avinash Kumar <p4avinashkumar@gmail.com> on 24th April 2021
     */
    public function load_register()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            //getting the form details regarding the registering user
            $fname = $_POST['first_name'];
            $lname = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];

            //forming the array of user details to further save it to the database
            $user_details['first_name'] = $fname;
            $user_details['last_name'] = $lname;
            $user_details['email'] = $email;
            $user_details['password'] = $password;
            $user_details['gender'] = $gender;
            $user_details['is_active'] = 0;
            $user_details['is_verified'] = 0;
            $user_details['updated_at'] = date('Y-m-d H:i:s');
            $user_details['created_at'] = date('Y-m-d H:i:s');

            //code to save the user details to the database
            $this->Express_main_model->save_user($user_details);
            //code to load the dashboard view
            $this->load->view('dashboard');
        }
    }
    
    /**
     * load_login
     * THe purpose of this funciton is to show the login view, validate and if the user is valid then redirect to user's dashboard
     *
     * @return void
     * @author Avinash Kumar <p4avinashkumar@gmail.com> on 24th April 2021
     */
    public function load_login()
    {
        //code to validate the input fields of login form
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if($this->form_validation->run() == FALSE){
            $this->load->view('login');
        } else{
            //code to authenticate the user and redirect to the dashboard
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user_details = $this->Express_main_model->is_user_authenticated($email);
            
            if($user_details['password'] == $password){
                $this->load->view('dashboard');
            } else{
                $this->load->view('login');
                echo "<script>alert('wrong username or password')</script>";
            }

        }
    }
    
}
