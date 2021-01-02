<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function numberToWorld ($number)
{
 $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
 $replace_array= array("One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Zero");
 $wordN = str_replace($search_array, $replace_array, $number);

 return $wordN;
}



function alert_check()
{
    $mx =& get_instance();
    
    if ( $success = $mx->session->flashdata('success')) {
        ?>
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4> <?= $success; ?></h4>
        </div>
    <?php } ?>
    
    <?php
    if ( $error = $mx->session->flashdata('error')) {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> <?= $error; ?>
        </div>
    <?php } 
    
}

function pegination_genarate($links)
{
    ?>
    <div style="padding: 60px;">  
        <nav aria-label="Page navigation">
          <div class="pagination" >
              <ul class="pagination">
                  <?php foreach ($links as $link) {
                    echo "<li>". $link."</li>";
                } ?>
            </div>
        </nav>
    </div>
    
    
    <?php
    
}

function timeformater($getTime)
{
 return date("Y-m-d", strtotime($getTime));

}

function shorten_string($string, $wordsreturned)
{
    $retval = $string;  
    $array = explode(" ", $string);
    if (count($array)<=$wordsreturned)
    {
        $retval = $string;
    }
    else
    {
        array_splice($array, $wordsreturned);
        $retval = implode(" ", $array)." ";
    }
    return $retval;
}

function active_nav($nav, $check_nav)
{

    if ($nav==$check_nav)
    {
        return "active";
    }
    
} 

function bn_date($str)
{
    $en = array(1,2,3,4,5,6,7,8,9,0);
    $bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
    $str = str_replace($en, $bn, $str);
    $en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
    $en_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
    $bn = array( 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর' );
    $str = str_replace( $en, $bn, $str );
    $str = str_replace( $en_short, $bn, $str );
    $en = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
    $en_short = array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
    $bn_short = array('শনি', 'রবি','সোম','মঙ্গল','বুধ','বৃহঃ','শুক্র');
    $bn = array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
    $str = str_replace( $en, $bn, $str );
    $str = str_replace( $en_short, $bn_short, $str );
    $en = array( 'am', 'pm' );
    $bn = array( 'পূর্বাহ্ন', 'অপরাহ্ন' );
    $str = str_replace( $en, $bn, $str );
    return $str;
}

function date_tine_formater($get_date){
    $dt = new DateTime($get_date, new DateTimezone('Asia/Dhaka'));
    return $dt->format('l, d M Y, h:i a');
}  

//---------------------------------------//

function identify_color($type,$card){
    $casino =& get_instance();
    $query = array(
        'board_type' => $type,
        'board_status'=> 0
    );
    $board_data=$casino->Boardend->get_board_data("board",$query);
    if($board_data==FALSE){
        return "try";
    }
    else{
        $board_id=$board_data->board_id;
        $query = array(
                    'class_name' => $card, 
                    'board_id'=>$board_id
                );
        $card_check=$casino->Common->get_data_multi_conditional("board_details",$query);
        if ($card_check==FALSE) {
                return "try";
        }
        else{
            return "not_open";
        }
    }



    $mx->db->where($index, $data);
    $query = $mx->db->get($table);
    if($query){
        if(0<$query->num_rows())
            return "checked";
    }
}


function winner($i){
    if($i<=10){
        return "f_o";
    }
    elseif($i<=20){
       return "s_o";

    }
    elseif($i<=30){
         return "t_o";
     }
    elseif($i<=36){
         return "ff_o";
    }
    else{
         return "l_o";
    }


    

}

function mainProductData($id){
    $cracker =& get_instance();
    $mainProductData=$cracker->Common->get_single_row_information('poducts', 'p_id', $id);
    echo $mainProductData->p_brand;
    echo "<br>";
    echo $mainProductData->p_model;
    echo "<br>";
    echo $mainProductData->p_type;
    echo "<br>";
}

function suplierSumary($id){
    $cracker =& get_instance();
    $suplier_information=$cracker->Common->get_single_row_information('categories', 'c_id', $id);
    $invoice_sum = $cracker->Boardend->get_supliers_invoice_sum($id);

    echo "<strong>Total Order: ".$suplier_information->total_order."</strong><br>";
    echo "Total Paid: ".$invoice_sum."<br>";
                    
    if(0>=$suplier_information->due_amount){
                            
        echo "Advance:  ".($suplier_information->due_amount*-1).""; 
    }
    else{
        echo "Due: ".$suplier_information->due_amount."<br>";
    }
                    
}