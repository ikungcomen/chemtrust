<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of msds_controller
 *
 * @author anurartkae
 */
class msds_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('tb_chem_info');
        $this->load->library('mpdf-development/mpdf');
        
        
        if ($this->session->userdata('loginuser') < 1) {
            redirect('login', 'refresh');
        }
    }

    public function index() {
        $this->load->view('include/header');
        $this->load->view('report_view/MSDS');
        $this->load->view('include/footer');
    }

    public function chem_report() {

        //$count = 0;
        $result = $this->tb_chem_info->chem_report();
        //print_r($result[0]['chem_name_th']);

        
        
          $html="<table border='0' width='100%'>";
          $html.="<tr><td colspan='4' align=\"center\"><h2>รายชื่อพนักงานจ่ายเงิน</h2></td></tr>";
          $html.="<tr>";
          $html.="<th>ลำดับที่</th>";
          $html.="<th>ชื่อ-นามสกุล</th>";
          $html.="<th>เบอร์โทรศัพท์</th>";
          $html.="<th>อีเมล์</th>";
          $html.="</tr>";
          foreach ($result as $row){
          $count++;
          $html.="<tr>";
          $html.="<td align=\"center\">$count</td>";
          $html.="<td>ทดสอบๆ Chatchai Somsook</td>";
          $html.="<td align=\"center\">08745xxxxx</td>";
          $html.="<td>".$result[0]['chem_name_th']."</td>";
          $html.="</tr>";
          }
          $html.="</table>";
          $this->mpdf= new mPDF('th','A4','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ
          $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
          $this->mpdf->Output(); // จากนั้นส่งชื่อไฟล์ออกมาครับผม 
    }

}
