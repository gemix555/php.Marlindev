<?php
namespace App {

    class Auth
    {

        public $db;

        /**
         * Auth constructor.
         * @param QueryBuilder $db
         */
        public function __construct(QueryBuilder $db)
        {
            $this->db = $db;
        }

        public function register($name, $email, $password, $status, $image)
        {
            $this->db->store('users', [

                'name' => $name,
                'email' => $email,
                'password' => md5($password),
                'status' => $status,
                'avatar' => $image

            ]);
        }

        public function login($email,$password)
        {
            $user = $this->db->selectUser($email,$password);

            if($user)
            {
                $_SESSION['user'] = $user;

                return true;
            }

            return false;
        }

        public function logout()
        {
            unset($_SESSION['user']);
        }


        public function check()
        {
            if(isset($_SESSION['user']))
            {
                return true;
            }
            return false;
        }

        public function currentUser()
        {
            if($this->check())
            {
                return $_SESSION['user'];
            }
            return false;
        }

        public function fullName()
        {
            $user = $this->currentUser();

            return $user['email'] . "<=>" . $user['password'];
        }

        public function banUser()
        {

        }

        public function unban()
        {

        }

        public function getUserStatus()
        {

        }

        public function isBanned()
        {

        }

        public function isNormal()
        {

        }

        public function destroyUser($id)
        {
            $this->db->delete('users',$id);
            $this->db->deleteImage($id);
        }

        public function uploadAvatar()
        {
            $this->db->uploadImage();
        }
    }
}