<?php

    function check_alerdy_login()
    {
        $ci =& get_instance();
        $user_session = $ci->session->userdata('id_user'); // admin
        if($user_session){
            redirect('welcome');
        }
    }
    
    function check_not_login()
    {
        $ci =& get_instance();
        $user_session = $ci->session->userdata('id_user'); // admin
        if(!$user_session){
            redirect('auth');
        }
    }
?>