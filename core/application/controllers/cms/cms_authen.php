<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cms_authen extends CI_Controller {

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(!$this->setSessionLogin($_POST['username'], $_POST['password'])) {
                $this->data['fail'] = true;
                $this->data['username'] = $_POST['username'];
                $this->load->view('cms/authen/_index', $this->data);
            } else
                redirect('cms/cms_dashboard');
        } else {
            $this->load->view('cms/authen/_index');
        }
    }

    public function logout() {
        $this->session->unset_userdata('authen');
        redirect('cms/cms_dashboard');
    }

    protected function setSessionLogin($username, $password) {
        $this->load->model('cms/user_model');
        $user = $this->user_model->authen($username);
        if (isset($user) and $user) {
            foreach ($user as $user_data) {
                if ($user_data['username'] == $username and $this->encrypt->decode($user_data['encry_password']) == $password) {
                    $this->session->set_userdata('authen', array(
                        'user_id' => $user_data['user_id'],
                        'username' => $user_data['username'],
                        'email' => $user_data['email'],
                        'permission' => $user_data['permission'],
                    ));
                    return true;
                }
            }
            return false;
        } else
            return false;
    }
        
}