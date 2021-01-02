<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Backend extends CI_Controller
{
    public function __construct() {
            $xcaliver =& get_instance();
    }

	public function set_confirmation_msg($data,$true_msg,$false_msg){
        $confirm=0;
        $xcaliver =& get_instance();
        if ($data==FALSE) {
            $xcaliver->session->set_flashdata('error',$false_msg);


        }
        else
        {
            $xcaliver->session->set_flashdata('success',$true_msg);
            $confirm=1;
        }
        return $confirm;
    }

    public function image_upload($file_name,$file_path){
        $xcaliver = & get_instance();
        $config['upload_path'] = $file_path;
        $config['allowed_types'] = 'gif|jpg|png|JPG|JEPG';

        $xcaliver->load->library('upload', $config);
        if (!$xcaliver->upload->do_upload($file_name)) {
            $error = array('error' => $xcaliver->upload->display_errors());
            print_r($error);
            echo $file_path;
            echo "<br>";
            echo "<script>alert('image does not supported ')</script>";
            echo $path;
            //return "demoproduct-500x500.jpg";
            exit();
        } else {
            return $xcaliver->upload->data('file_name');
        }


    }

    public function image_upload_mod($file_name,$file_path,$extra){
        $xcaliver =& get_instance();
        $config['upload_path'] = $file_path;
        $config['allowed_types'] = 'gif|jpg|png';

        $xcaliver->load->library('upload', $config);
        if (!$xcaliver->upload->do_upload($file_name)) {
            /*$error = array('error' => $xcaliver->upload->display_errors());
            echo "<script>alert('image does not supported ')</script>";*/


        } else {

            return $xcaliver->upload->data('file_name');
        }

    }


    public function sent_sms($customer_mobile,$msg){
        $xcaliver =& get_instance();

        $user_Number=$customer_mobile;
        $user_sms=$msg;
        $url = 'https://api.infobip.com/sms/1/text/query?'.http_build_query(
            [
                'username' =>  'shuvrohosainbd',
                'password' => 'iamP1n@k',
                'to' => $user_Number,
                'text' => $user_sms,
            ]
        );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $data['ss_number']=$customer_mobile;
        $data['ss_msg']=$user_sms;
        $data['ss_dated']=date("Y-m-d", strtotime(date("Y/m/d")));
        $xcaliver->Common->set_data('sms_system',$data);
       return 'yes';
    }

    public function create_pdf($print_design,$data){
        $xcaliver = & get_instance();
        $html_content = $xcaliver->load->view($print_design,$data,true);
		$xcaliver->load->library('pdf');
		$xcaliver->pdf->loadHtml($html_content);
		$xcaliver->pdf->render();
		$output = $xcaliver->pdf->output();
        file_put_contents('Brochure.pdf', $output);
    }

    public function x_debug($data){
        print_r($data);
        echo "<br>";
        exit();
    }
}
