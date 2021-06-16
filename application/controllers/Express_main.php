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
        if($this->session->userdata('is_loggedin') == 0){
            $this->load->view('express_main');
        } else{
            redirect(base_url('Express_main/login'));
        }
    }


    /**
     * load_register
     * The purpose of this function is to laod the register view, validate and save the provided user data to the database
     *
     * @return void
     * @author Avinash Kumar <p4avinashkumar@gmail.com> on 24th April 2021
     */
    public function register()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name',);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
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
            $user_details['password'] = password_hash($password, PASSWORD_DEFAULT);
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
    public function login()
    {
        $checked_valid_login = 0;
        //code to validate the input fields of login form
        $this->form_validation->set_rules('login-email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            //code to authenticate the user and redirect to the dashboard
            $email = $_POST['login-email'];
            $password = $_POST['password'];

            $user_details = $this->Express_main_model->is_user_authenticated($email);
            $decoded_pass = password_verify($password, $user_details['password']);

            if (!empty($decoded_pass)) {
                $checked_valid_login = 1;
            }

            /* #region  BOC for login */
            if ($this->session->userdata('is_loggedin') == false) {
                if (!empty($user_details)) {
                    /* #region BOC for storing data into session for session login */
                    if ($checked_valid_login == 1) {
                        $this->session->set_userdata(array('id' => $user_details['user_id'], 'is_loggedin' => true, 'is_admin' => $user_details['is_admin']));
                    }
                    /* #endregion EOC for storing data into session for session login */

                    if ($checked_valid_login == 1 && $user_details['is_admin'] == 1) {
                        redirect(base_url('Express_main/dashboard/1'));
                    } else if ($checked_valid_login == 1 && $user_details['is_admin'] == 0) {
                        redirect(base_url('Express_main/dashboard/0'));
                    } else {
                        echo "<script>alert('wrong username or password')</script>";
                        $this->load->view('login');
                    }
                } else {
                    $this->load->view('login');
                    echo "<script>alert('user not found!')</script>";
                }
            } else {
                /* #region  BOC for login with the session data */
                if ($user_details['user_id'] == $this->session->userdata('id')) {
                    if ($checked_valid_login == 1 && $user_details['is_admin'] == 1) {
                        redirect(base_url('Express_main/dashboard/1'));
                    } else if ($checked_valid_login == 1 && $user_details['is_admin'] == 0) {
                        redirect(base_url('Express_main/dashboard/0'));
                    }
                }
                /* #endregion EOC for login with the session data */
            }
            /* #endregion EOC for login */
        }
    }


    /**
     * dashboard
     * The purpose of this funciton is launch the dashboard accordingly for superadmin or normal user
     * If type = 1 then it's a superadmin
     * If type = 0 then it's a normal user
     *
     * @param  mixed $type
     * @return void
     * @author Avinash Kumar <p4avinashkumar@gmail.com> on 25th April 2021
     */
    public function dashboard($type)
    {
        if ($type == 1) {
            $this->load->view('admin_dashboard');
        } else {
            $this->load->view('dashboard');
        }
    }
}
