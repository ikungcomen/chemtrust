<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class law_abiding_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata("loginuser") < 1) {
            redirect("login");
        }
        $this->load->model('DBhelper');
        $this->load->model('tb_chem_ministry_industry_url');
    }

    public function main() {
        $result['url'] = $this->DBhelper->get_chem_url();//add by kung 240359
        $result['model'][] = array('method' => 'main', "message_flag" => '-', "message" => '-');//edit by kung   จาก    $result['model'][] = array('method' => 'main');
        //print_r($chem_classify);
        $this->load->view('include/header');
        $this->load->view('law_abiding/law_abiding', $result);
        $this->load->view('include/footer');
    }

    public function law_abiding() {
        $chem_no = $chem_no = $this->input->post('chem_no');
        $this->search($chem_no);
    }

    public function edit_forword($chem_no) {
        // $chem_no = $this->input->post('chem_no');               
        if ($this->DBhelper->check_chem_classify($chem_no) > 0) {
            $data['chem_classify'] = $this->DBhelper->get_chem_classify($chem_no);
            $result['model'][] = array('method' => 'haveRow', "message_flag" => '-', "message" => '-', 'data' => $data);
        } else {
            $result['model'][] = array('method' => 'noRow', "message_flag" => 'W', "message" => 'ไม่พบข้อมูล');
        }

        //print_r($result);
        $this->load->view('include/header');
        $this->load->view('classify_cemee/classify_cemee_edit', $result);
        $this->load->view('include/footer');
    }

    public function add_forword() {

        $result['model'][] = array('method' => 'main');
        $this->load->view('include/header');
        $this->load->view('classify_cemee/classify_cemee_add', $result);
        $this->load->view('include/footer');
    }

    public function search($chem_no) {
        //$chem_no = $this->input->post('chem_no'); 
        $result['url'] = $this->DBhelper->get_chem_url();//add by kung 240359
        if ($this->DBhelper->check_chem_classify($chem_no) > 0) {
            $data['chem_classify'] = $this->DBhelper->get_chem_classify($chem_no);
            $result['model'][] = array('method' => 'haveRow', "message_flag" => '-', "message" => '-', 'data' => $data);
        } else {
           $result['model'][] = array('method' => 'noRow', "message_flag" => 'W', "message" => 'ไม่พบข้อมูล');
        }

        //print_r($result);
        $this->load->view('include/header');
        $this->load->view('law_abiding/law_abiding', $result);
        $this->load->view('include/footer');
    }
    
    public function update_so_file($chem_no){
        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d');
        $base_part = './file_web';
        $config['upload_path'] = $base_part;
        $config['allowed_types'] = 'xls|xlsx|pdf';
        $config['max_size'] = '10000';
        $config['max_width'] = '300000';
        $config['max_height'] = '300000';
        //------------------------------------------------------------------
        $config['file_name'] = $_SERVER['REQUEST_TIME'] . rand();
        $this->load->library('upload', $config);
        //------------------------------------------------------------------
        $filename = "";
        if (!$this->upload->do_upload('so_file')) {           
            $error = array('error' => $this->upload->display_errors());
            
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            $filename = $upload_data['file_name'];
        }
        $result_update_so_file = $this->DBhelper->update_so_file($chem_no, $filename, $user_id, $date);
        if($result_update_so_file > 0){
            //$this->main();
            $result['model'][] = array('method' => 'main', "message_flag" => 'S', "message" => 'บันทึกข้อมูลเรียบร้อย');
            $this->load->view('include/header');
            $this->load->view('law_abiding/law_abiding', $result);
            $this->load->view('include/footer');
        }else{
            
        }
    }

    public function forword_edit_url($chem_no, $mi_url_no) {
        //$chem_no = $this->input->post('chem_no'); 
        if ($this->tb_chem_ministry_industry_url->check_tb_chem_ministry_industry_url($mi_url_no) > 0) {
            $data['data'] = $this->tb_chem_ministry_industry_url->get_tb_chem_ministry_industry_url($mi_url_no);
            $result['model'][] = array('method' => 'edit', 'chem_no' => $chem_no, "message_flag" => '-', "message" => '-', 'data' => $data);
        } else {
            $mi_url_name =  $mi_url_no;
            $mi_url = "";
            $chem_ind_type_1 = "N";
            $chem_ind_type_2 = "N";
            $chem_ind_type_3 = "N";
            $chem_ind_type_4 = "N";
            $chem_ind_type_0 = "N";
            $user_id = $this->session->userdata('user_id');
            $date = date('y-m-d');
            $this->tb_chem_ministry_industry_url->insert($mi_url_no, $mi_url_name, $mi_url, $chem_ind_type_1, $chem_ind_type_2, $chem_ind_type_3, $chem_ind_type_4, $chem_ind_type_0, $user_id, $date);
            $data['data'] = $this->tb_chem_ministry_industry_url->get_tb_chem_ministry_industry_url($mi_url_no);
            $result['model'][] = array('method' => 'edit', 'chem_no' => $chem_no, "message_flag" => '-', "message" => '-');
        }

        //print_r($result);
        $this->load->view('include/header');
        $this->load->view('law_abiding/mi_url_edit', $result);
        $this->load->view('include/footer');
    }

    public function update_mi_url() {
        $chem_no = $this->input->post('chem_no');
        $cmd = $this->input->post('cmd');
        $mi_url_no = $this->input->post('mi_url_no');
        $mi_url = $this->input->post('mi_url');
        $mi_url_name = $this->input->post('mi_url_name');
        $chem_ind_type_1 = $this->input->post('chem_ind_type_1');
        $chem_ind_type_2 = $this->input->post('chem_ind_type_2');
        $chem_ind_type_3 = $this->input->post('chem_ind_type_3');
        $chem_ind_type_4 = $this->input->post('chem_ind_type_4');
        $chem_ind_type_0 = $this->input->post('chem_ind_type_0');
        if ($chem_ind_type_1 == "")
            $chem_ind_type_1 = "N";
        if ($chem_ind_type_2 == "")
            $chem_ind_type_2 = "N";
        if ($chem_ind_type_3 == "")
            $chem_ind_type_3 = "N";
        if ($chem_ind_type_4 == "")
            $chem_ind_type_4 = "N";
        if ($chem_ind_type_0 == "")
            $chem_ind_type_0 = "N";
        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d');
        if ($cmd == "edit") {
            if ($this->tb_chem_ministry_industry_url->check_tb_chem_ministry_industry_url($mi_url_no) > 0) {

                $this->tb_chem_ministry_industry_url->update($mi_url_no, $mi_url_name, $mi_url, $chem_ind_type_1, $chem_ind_type_2, $chem_ind_type_3, $chem_ind_type_4, $chem_ind_type_0, $user_id, $date);
                $data['data'] = $this->tb_chem_ministry_industry_url->get_tb_chem_ministry_industry_url($mi_url_no);
                $result['model'][] = array('method' => 'edit', 'chem_no' => $chem_no, "message_flag" => 'I', "message" => 'ปรับปรุงข้อมูลเรียบร้อย', 'data' => $data);
            } else {

                $this->tb_chem_ministry_industry_url->insert($mi_url_no, $mi_url_name, $mi_url, $chem_ind_type_1, $chem_ind_type_2, $chem_ind_type_3, $chem_ind_type_4, $chem_ind_type_0, $user_id, $date);
                $data['data'] = $this->tb_chem_ministry_industry_url->get_tb_chem_ministry_industry_url($mi_url_no);
                $result['model'][] = array('method' => 'edit', 'chem_no' => $chem_no, "message_flag" => 'I', "message" => 'ปรับปรุงข้อมูลเรียบร้อย');
            }
            //print_r($result);
            $this->load->view('include/header');
            $this->load->view('law_abiding/mi_url_edit', $result);
            $this->load->view('include/footer');
        } else {
            $this->forword_edit_url($chem_no,$mi_url_no);
        }
    }

    public function add() {

        $chem_no = $this->input->post('chem_no');
        $haz = array(
            $this->input->post('haz_1'),
            $this->input->post('haz_2'),
            $this->input->post('haz_3'),
            $this->input->post('haz_4'),
            $this->input->post('haz_5'),
            $this->input->post('haz_6'),
            $this->input->post('haz_7'),
            $this->input->post('haz_8'),
            $this->input->post('haz_9'));


        $chem_ghs_label = "";
        $firstStep = 0;
        foreach ($haz as $value) {
            if ($value != "") {
                if ($firstStep == 0) {
                    $firstStep = 1;
                    $chem_ghs_label = $chem_ghs_label . $value;
                } else {
                    $chem_ghs_label = $chem_ghs_label . "," . $value;
                }
            }
        }

        $chem_ghs_haz_level = $this->input->post('chem_ghs_haz_level');
        $chem_ghs_des = $this->input->post('chem_ghs_desc');
        $chem_list_acc_no_mil = $this->input->post('mi_acc_no');
        $chem_seq_mil = $this->input->post('mi_seq');
        $chem_seq_lbl = $this->input->post('ml_seq');

        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d');

        if ($this->DBhelper->check_chem_classify($chem_no) < 1) {
            $resultInsert = $this->DBhelper->insert_chem_ghs_list($chem_no, $chem_ghs_label, $chem_ghs_haz_level, $chem_ghs_des, $chem_list_acc_no_mil, $chem_seq_mil, $chem_seq_lbl, $user_id, $date);
            if ($resultInsert > 0) {
                //$data['chem_classify'] = $this->DBhelper->get_chem_classify($chem_no);
                $result['model'][] = array('method' => 'noRow', "message_flag" => 'I', "message" => 'เพิ่มข้อมูล ' . $chem_no . ' เรียบร้อย');
            } else {
                $result['model'][] = array('method' => 'noRow', "message_flag" => 'E', "message" => 'ไม่สามารถเพิ่มข้อมูลได้');
            }
        } else {
            $result['model'][] = array('method' => 'noRow', "message_flag" => 'E', "message" => 'ไม่สามารถเพิ่มข้อมูล ' . $chem_no . ' เนื่องจากมีข้อมูลแล้ว');
        }

        $this->load->view('include/header');
        $this->load->view('classify_cemee/classify_cemee_add', $result);
        $this->load->view('include/footer');
    }

    public function update() {

        $chem_no = $this->input->post('chem_no');
        $haz = array(
            $this->input->post('haz_1'),
            $this->input->post('haz_2'),
            $this->input->post('haz_3'),
            $this->input->post('haz_4'),
            $this->input->post('haz_5'),
            $this->input->post('haz_6'),
            $this->input->post('haz_7'),
            $this->input->post('haz_8'),
            $this->input->post('haz_9'));

        $chem_ghs_label = "";
        $firstStep = 0;
        foreach ($haz as $value) {
            if ($value != "") {
                if ($firstStep == 0) {
                    $firstStep = 1;
                    $chem_ghs_label = $chem_ghs_label . $value;
                } else {
                    $chem_ghs_label = $chem_ghs_label . "," . $value;
                }
            }
        }
        $chem_ghs_haz_level = $this->input->post('chem_ghs_haz_level');
        $chem_ghs_des = $this->input->post('chem_ghs_desc');
        $chem_list_acc_no_mil = $this->input->post('mi_acc_no');
        $chem_seq_mil = $this->input->post('mi_seq');
        $chem_seq_lbl = $this->input->post('ml_seq');
        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d');

        if ($this->DBhelper->check_chem_classify($chem_no) > 0) {
            $resultUpdate = $this->DBhelper->update_chem_ghs_list($chem_no, $chem_ghs_label, $chem_ghs_haz_level, $chem_ghs_des, $chem_list_acc_no_mil, $chem_seq_mil, $chem_seq_lbl, $user_id, $date);
            if ($resultUpdate > 0) {
                $data['chem_classify'] = $this->DBhelper->get_chem_classify($chem_no);
                $result['model'][] = array('method' => 'haveRow', "message_flag" => 'I', "message" => 'แก้ไขข้อมูลเรียบร้อย', 'data' => $data);
            } else {
                $data['chem_classify'] = $this->DBhelper->get_chem_classify($chem_no);
                $result['model'][] = array('method' => 'haveRow', "message_flag" => 'E', "message" => 'ไม่สามารถแก้ไขข้อมูลได้', 'data' => $data);
            }
        } else {

            $result['model'][] = array('method' => 'noRow', "message_flag" => 'E', "message" => 'ไม่พบข้อมูลได้สำหรับแก้ไข');
        }

        $this->load->view('include/header');
        $this->load->view('classify_cemee/classify_cemee_edit', $result);
        $this->load->view('include/footer');
    }

}

?>