<?php
class LoginController extends controller
{
    public function index()
    {
        $data = array();
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $pass = addslashes($_POST['password']);
            $user = new Users();
            if ($user->doLogin($email, $pass)) {
                header("Location:" . BASE_URL);
            }
        } else {
            $data['error'] = 'Email ou senha estão incorretos';
        }
        $this->loadview('login', $data);
    }
}
