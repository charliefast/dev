<?php
$config = array(
                 'signup' => array(
                                    array(
                                            'field' => 'username',
                                            'label' => 'Användarnamn',
                                            'rules' => 'required|trim|xss_clean|max_length[255]|min_length[6]|callback_user_not_exist' 
                                          ),
                                     array(
                                            'field' => 'firstname',
                                            'label' => 'Förnamn',
                                            'rules' => 'required|trim|xss_clean|max_length[255]'
                                         ),
                                    array(
                                            'field' => 'lastname',
                                            'label' => 'Efternamn',
                                            'rules' => 'required|trim|xss_clean|max_length[255]'

                                         ),
                                    array(
                                            'field' => 'city',
                                            'label' => 'Stad',
                                            'rules' => 'trim|xss_clean|max_length[255]'
                                         ),
                                    array(
                                            'field' => 'country',
                                            'label' => 'Land',
                                            'rules' => 'trim|xss_clean|max_length[255]'
                                         ),
                                    array(
                                            'field' => 'zip',
                                            'label' => 'Postnr',
                                            'rules' => 'trim|xss_clean|max_length[10]|is_numeric'
                                         ),
                                    array(
                                            'field' => 'phone',
                                            'label' => 'Telefon',
                                            'rules' => 'trim|xss_clean|max_length[80]|is_numeric'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email',
                                            'rules' => 'required|trim|xss_clean|max_length[255]|valid_email|callback_email_not_exist'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email',
                                         ),
                                    array(
                                            'field' => 'emailconf',
                                            'label' => 'Upprepa email',
                                            'rules' => 'required|trim|xss_clean|max_length[255]|matches[email]'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'Lösenord',
                                            'rules' => 'required|trim|xss_clean|max_length[255]|min_length[8]'
                                         ),
                                    array(
                                            'field' => 'passconf',
                                            'label' => 'Upprepa lösenord',
                                            'rules' => 'required|trim|xss_clean|max_length[255]|matches[password]'
                                         ),
                                    ),
                                    
                 'login' => array(
                                    array(
                                            'field' => 'username',
                                            'label' => 'Användarnamn',
                                            'rules' => 'required|trim|xss_clean'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'Lösenord',
                                            'rules' => 'required|trim|xss_clean|callback_check_database'
                                         ),
                                    )                      
               );