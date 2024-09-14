<?php
    namespace Darmasaktitravel\Carrent\Controller;

    use Darmasaktitravel\Carrent\App\View;
    use Darmasaktitravel\Carrent\Models\UserModel;

    class LoginController {
        function index() {

            $model = [
                'title' => 'Login | Darma Sakti Tavel Bandung',
            ];
            
            View::render('dashboard/login', $model);
        }

        public function login() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $identifier = $_POST['identifier'];
                $password = $_POST['password'];
                $userModel = new UserModel();
                $user = $userModel->getUserByIdentifier($identifier);
    
                if ($user && password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    //$_SESSION['role'] = $user['role_user'];
                    header('Location: ' . BASE_URL . '/dashboard');
                    exit();
                } else {
                    header('Location: ' . BASE_URL . '/login?status-login=failed');
                    exit();
                }
            }
        }

        public function logout() {
            session_start();
            session_unset();
            session_destroy();
            header('Location: ' . BASE_URL . '/login');
            exit();
        }
    }