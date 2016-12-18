<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class assessment_risk_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata("loginuser") < 1) {
            redirect("login");
        }
        $this->load->model('tb_chem_assessment_risk');
        $this->load->model('tb_chem_con_lvl');
        $this->load->model('tb_chem_seq_lvl');
        $this->load->model('tb_chem_haz_eff_hea');
        $this->load->library('excel');
    }

    public function main() {
        $result['model'][] = array('method' => 'main');
        //print_r($chem_classify);
        $this->load->view('include/header');
        $this->load->view('assessment_risk/assessment_risk', $result);
        $this->load->view('include/footer');
    }

    public function search_frm() {
        $chem_no = $this->input->post('chem_no');
        $this->search($chem_no);
    }

    public function edit_forword($chem_no) {
        // $chem_no = $this->input->post('chem_no');               
        if ($this->tb_chem_assessment_risk->check_tb_chem_assessment_risk($chem_no) > 0) {
            $data['chem_classify'] = $this->tb_chem_assessment_risk->get_tb_chem_assessment_risk($chem_no);
            $cl['cl'] = $this->tb_chem_con_lvl->get_tb_chem_con_lvl_list();
            $heh['heh'] = $this->tb_chem_haz_eff_hea->get_tb_chem_haz_eff_hea_list();
            $sl['sl'] = $this->tb_chem_seq_lvl->get_tb_chem_seq_lvl_list();
            $result['model'][] = array('method' => 'haveRow', "message_flag" => '-', "message" => '-',
                'data' => $data, 'cl' => $cl, 'heh' => $heh, 'sl' => $sl);
        } else {
            $result['model'][] = array('method' => 'noRow', "message_flag" => 'W', "message" => 'ไม่พบข้อมูล');
        }

        //print_r($result);
        $this->load->view('include/header');
        $this->load->view('assessment_risk/assessment_risk_edit', $result);
        $this->load->view('include/footer');
    }

    public function add_forword() {
        $cl['cl'] = $this->tb_chem_con_lvl->get_tb_chem_con_lvl_list();
        $heh['heh'] = $this->tb_chem_haz_eff_hea->get_tb_chem_haz_eff_hea_list();
        $sl['sl'] = $this->tb_chem_seq_lvl->get_tb_chem_seq_lvl_list();
        $result['model'][] = array('method' => 'main', 'cl' => $cl, 'heh' => $heh, 'sl' => $sl);
        $this->load->view('include/header');
        $this->load->view('assessment_risk/assessment_risk_add', $result);
        $this->load->view('include/footer');
    }

    public function search($chem_no) {
        //$chem_no = $this->input->post('chem_no'); 
        if ($this->tb_chem_assessment_risk->check_tb_chem_assessment_risk($chem_no) > 0) {
            $data['chem_classify'] = $this->tb_chem_assessment_risk->get_tb_chem_assessment_risk($chem_no);
            $result['model'][] = array('method' => 'haveRow', "message_flag" => '-', "message" => '-', 'data' => $data);
        } else {
            $result['model'][] = array('method' => 'noRow', "message_flag" => 'W', "message" => 'ไม่พบข้อมูล');
        }

        //print_r($result);
        $this->load->view('include/header');
        $this->load->view('assessment_risk/assessment_risk', $result);
        $this->load->view('include/footer');
    }

    public function add() {

        $chem_no = $this->input->post('chem_no');
        $chem_con_lvl_no = $this->input->post('chem_con_lvl_no');
        $chem_seq_lvl_no = $this->input->post('chem_seq_lvl_no');
        $chem_haz_eff_hea_no = $this->input->post('chem_haz_eff_hea_no');
        $chem_measure_ole_twa_value_cur = $this->input->post('chem_measure_ole_twa_value_cur');
        $chem_std_ole_twa_value = $this->input->post('chem_std_ole_twa_value');

        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d');

        if ($this->tb_chem_assessment_risk->check_tb_chem_assessment_risk($chem_no) < 1) {
            $resultInsert = $this->tb_chem_assessment_risk->insert_tb_chem_assessment_risk($chem_no, $chem_con_lvl_no, $chem_seq_lvl_no, $chem_haz_eff_hea_no, $chem_measure_ole_twa_value_cur, $chem_std_ole_twa_value, $user_id, $date);
            if ($resultInsert > 0) {
                //$data['chem_classify'] = $this->DBhelper->get_chem_classify($chem_no);
                $cl['cl'] = $this->tb_chem_con_lvl->get_tb_chem_con_lvl_list();
                $heh['heh'] = $this->tb_chem_haz_eff_hea->get_tb_chem_haz_eff_hea_list();
                $sl['sl'] = $this->tb_chem_seq_lvl->get_tb_chem_seq_lvl_list();
                $result['model'][] = array('method' => 'noRow', "message_flag" => 'I', "message" => 'เพิ่มข้อมูล ' . $chem_no . ' เรียบร้อย', 'cl' => $cl, 'heh' => $heh, 'sl' => $sl);
            } else {
                $result['model'][] = array('method' => 'noRow', "message_flag" => 'E', "message" => 'ไม่สามารถเพิ่มข้อมูลได้');
            }
        } else {
            $result['model'][] = array('method' => 'noRow', "message_flag" => 'E', "message" => 'ไม่สามารถเพิ่มข้อมูล ' . $chem_no . ' เนื่องจากมีข้อมูลแล้ว');
        }

        $this->load->view('include/header');
        $this->load->view('assessment_risk/assessment_risk_add', $result);
        $this->load->view('include/footer');
    }

    public function update() {

        $chem_no = $this->input->post('chem_no');
        $chem_con_lvl_no = $this->input->post('chem_con_lvl_no');
        $chem_seq_lvl_no = $this->input->post('chem_seq_lvl_no');
        $chem_haz_eff_hea_no = $this->input->post('chem_haz_eff_hea_no');
        $chem_measure_ole_twa_value_cur = $this->input->post('chem_measure_ole_twa_value_cur');
        $chem_std_ole_twa_value = $this->input->post('chem_std_ole_twa_value');

        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d');

        if ($this->tb_chem_assessment_risk->check_tb_chem_assessment_risk($chem_no) > 0) {
            $resultUpdate = $this->tb_chem_assessment_risk->update_tb_chem_assessment_risk($chem_no, $chem_con_lvl_no, $chem_seq_lvl_no, $chem_haz_eff_hea_no, $chem_measure_ole_twa_value_cur, $chem_std_ole_twa_value, $user_id, $date);
            if ($resultUpdate > 0) {
                $data['chem_classify'] = $this->tb_chem_assessment_risk->get_tb_chem_assessment_risk($chem_no);
                $cl['cl'] = $this->tb_chem_con_lvl->get_tb_chem_con_lvl_list();
                $heh['heh'] = $this->tb_chem_haz_eff_hea->get_tb_chem_haz_eff_hea_list();
                $sl['sl'] = $this->tb_chem_seq_lvl->get_tb_chem_seq_lvl_list();
                $result['model'][] = array('method' => 'haveRow', "message_flag" => 'I', "message" => 'แก้ไขข้อมูลเรียบร้อย',
                    'data' => $data, 'cl' => $cl, 'heh' => $heh, 'sl' => $sl);
            } else {
                $data['chem_classify'] = $this->tb_chem_assessment_risk->get_tb_chem_assessment_risk($chem_no);
                $result['model'][] = array('method' => 'haveRow', "message_flag" => 'E', "message" => 'ไม่สามารถแก้ไขข้อมูลได้', 'data' => $data);
            }
        } else {

            $result['model'][] = array('method' => 'noRow', "message_flag" => 'E', "message" => 'ไม่พบข้อมูลได้สำหรับแก้ไข');
        }

        $this->load->view('include/header');
        $this->load->view('assessment_risk/assessment_risk_edit', $result);
        $this->load->view('include/footer');
    }

    public function export() {
        /* header('Content-type: text/csv');
          header('Content-disposition: attachment;filename=fromci.csv');
          echo "order,id,Name,Address,Quantity,Price,Total".PHP_EOL;
          echo "1,1,XXXX,YYYYYYY,10,700,7000".PHP_EOL; */
        //load our new PHPExcel library
// Create new PHPExcel object
        //echo "start";
        //load our new PHPExcel library
        $this->load->library('excel');
//activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(17);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(17);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(17);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(17);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(17);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(17);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
//name the worksheet
        $this->excel->getActiveSheet()->setTitle('sheet1');
//set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'รายานผลการประเมินความเสี่ยงผลกระทบต่อสุขภาพของพนักงานที่ปฏิบัติงานกับสารเคมี');
//change the font size
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(10);
//make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
//merge cell A1 until D1
        $this->excel->getActiveSheet()->mergeCells('A1:I1');
//set aligment to center for that merged cell (A1 to D1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //name the worksheet
        //$this->excel->getActiveSheet()->setTitle('test worksheet');
//set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A2', 'บริษัท..........................................................................................................');
//change the font size
        $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(10);
//make the font become bold
        // $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
//merge cell A1 until D1
        $this->excel->getActiveSheet()->mergeCells('A2:I2');
//set aligment to center for that merged cell (A1 to D1)
        $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //header
        $heading = array('รหัสสารเคมี', 'ชื่อสารเคมี', 'ผลตรวจวัดล่าสุด', 'ค่ามาตรฐาน OEL-TWA', 'ระดับความเข้มข้น', 'ความถี่ในการสัมผัส', 'ระดับการรับสัมผัส', 'ระดับความรุนแรง', 'ระดับความเสี่ยง', 'มาตรการควบคุมความเสี่ยง');
        // รหัสสารเคมี	ชื่อสารเคมี	ผลตรวจวัดล่าสุด	ค่ามาตรฐาน OEL-TWA	ระดับความเข้มข้น	ความถี่ในการสัมผัส	ระดับการรับสัมผัส	ระดับความรุนแรง	ระดับความเสี่ยง	มาตรการควบคุมความเสี่ยง
        //$this->load->library('PHPExcel');
        //Create a new Object
        //$objPHPExcel = new PHPExcel();
        //$objPHPExcel->getActiveSheet()->setTitle($nama_sesi);
        //Loop Heading
        $rowNumberH = 4;
        $colH = 'A';
        foreach ($heading as $h) {
            $this->excel->getActiveSheet()->setCellValue($colH . $rowNumberH, $h);
            $this->excel->getActiveSheet()->getStyle($colH . $rowNumberH)->getFont()->setSize(10);
            $this->excel->getActiveSheet()->getStyle($colH . $rowNumberH)->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle($colH . $rowNumberH)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $colH++;
        }


        // Set outline levels

        /* $this->excel->getActiveSheet()->getColumnDimension('E')->setOutlineLevel(1)
          ->setVisible(false)
          ->setCollapsed(true); */
// Freeze panes
        $this->excel->getActiveSheet()->freezePane('A5');
// Rows to repeat at top
        // $this->excel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);
        //begin data
        $result = $this->tb_chem_assessment_risk->get_tb_chem_assessment_risk_all();
        $i = 4;
        foreach ($result->result_array() as $row) {
            $i++;
            $this->excel->getActiveSheet()->setCellValue('A' . $i, $row['chem_no']);
            $this->excel->getActiveSheet()->setCellValue('B' . $i, $row['chem_name_th']);
            $this->excel->getActiveSheet()->setCellValue('C' . $i, $row['chem_measure_ole_twa_value_cur']);
            $this->excel->getActiveSheet()->setCellValue('D' . $i, $row['chem_std_ole_twa_value']);
            $this->excel->getActiveSheet()->setCellValue('E' . $i, $row['chem_con_lvl_no']."=".$row['chem_con_lvl_name']);
            $this->excel->getActiveSheet()->setCellValue('F' . $i, $row['chem_seq_lvl_no']."=".$row['chem_seq_lvl_name']);
            $this->excel->getActiveSheet()->setCellValue('G' . $i, $row['chem_touch_lvl_no']."=".$row['chem_touch_lvl_name']);
            $this->excel->getActiveSheet()->setCellValue('H' . $i, $row['chem_haz_eff_hea_no']."=".$row['chem_haz_eff_hea_name']);
            $this->excel->getActiveSheet()->setCellValue('I' . $i, $row['risk_lvl']."=".$row['chem_risk_lvl_name']);            
        }
        //end dta
        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        $this->excel->getActiveSheet()->getStyle('A4:J'.$i)->applyFromArray($styleArray);
        $this->excel->getActiveSheet()->getStyle('A4:J'.$i)->getAlignment()->setWrapText(true); 
        $this->excel->getActiveSheet()->getStyle('A4:J'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); 
        $filename = 'สรุปรายงานความเสี่ยง.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
//force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

}

?>