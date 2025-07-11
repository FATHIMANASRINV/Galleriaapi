<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Network_model extends Base_model {
    public $tree_member ="";
    public $TREE_LEVEL = 3;  
    public $CONFIG = 3;  

    function __construct() {
        parent::__construct();

    }    
    public function generateTree($user_id, $tree_type, $level = 0) {
        $select_arr = 'mlm_plan,package_status,width_ceiling';
        $this->CONFIG = $this->Base_model->getConfig($select_arr);
        $member_arr = [];
        if ($level < $this->TREE_LEVEL) {

            $member_arr = $this->getTreeUserDetails($user_id);
            $child_nodes = $this->getUserChildNodes($user_id, $tree_type);
            $child_count = count($child_nodes);
           

            $this->tree_member .= '<div class="ne-item">';
            $this->setUplineButton( $member_arr['user_id'], $member_arr['sponsor_id'], $tree_type, $level );
            $this->tree_member .= '<div class="ne-item-parent popover_wrapper">';
            $this->tree_member .= $this->createTreeNode($member_arr, $tree_type);
            $this->getTooltipData( $member_arr );  
            $this->tree_member .= '</div>';

            if ( $child_count ) {
                $new_level = $level + 1;

                if ($new_level < $this->TREE_LEVEL ) {
                    $this->tree_member .= '
                    <div class="ne-item-children">';
                    foreach ($child_nodes as $child_id) {

                        $this->tree_member .= '
                        <div class="ne-item-child">'; 

                        $this->generateTree($child_id, $tree_type, $new_level );

                        $this->tree_member .= '
                        </div>';

                    }

                    if($tree_type == 'plan_tree'){ 
                        $this->tree_member .= $this->createNullNode($member_arr, 'ne-item-child');
                    }

                    $this->tree_member .= '
                    </div>';
                }

            }


            if( !$child_count && $tree_type == 'plan_tree'){ 
                $this->tree_member .= $this->createNullNode($member_arr, 'ne-item-children');
            }



            $this->tree_member .= '
            </div>';

        }

        return $this->tree_member;
    }

    public function getTreeUserDetails($user_id) { 
        $select_arr = ['user_photo', 'email', 'first_name', 'second_name', 'user_name', 'user_type', 'status', 'position', 'father_id', 'sponsor_id', 'package_id', 'date_of_joining', 'rank_id', 'referral_count', 'left_sponsor', 'right_sponsor', 'left_father', 'right_father'];

        if ( $this->CONFIG['mlm_plan'] == "Binary") {
            array_push($select_arr, 'left_carry');
            array_push($select_arr, 'left_total');
            array_push($select_arr, 'right_carry');
            array_push($select_arr, 'right_total');
        }

        $member_arr = $this->Base_model->getSignUserDetails($user_id, $select_arr);
        $member_arr["user_id"] = $user_id; 

        $member_arr["user_rank"] = $member_arr['rank_id'] ? $this->Base_model->rankIdToRankName( $member_arr['rank_id'] ) : 'NA';
        $member_arr["package_name"] = ($this->CONFIG['package_status'] == "yes" && $member_arr['package_id']) ?  $this->Base_model->getPackageNamebyId( $member_arr["package_id"] ) : '';

        // $member_arr["user_photo"] = "no-user.png";

        return $member_arr;
    }

    public function getUserChildNodes($user_id, $type = "plan_tree") {
        $child_nodes = array();
        if ($user_id) {
            if ($type == "sponsor_tree") {
                $this->db->where("sponsor_id", $user_id);
            } else {
                $this->db->where("father_id", $user_id);
            }

            $this->db->select('user_id')
            ->order_by("position", "ASC");
            $query = $this->db->get("user_info");
            foreach ($query->result_array() AS $rows) {
                $child_nodes[] = $rows['user_id'];
            }
        }
        return $child_nodes;
    }

    public function setUplineButton( $user_id, $father_id, $tree_type, $level ){



        if ($level < 1) {
            $father_id =  $this->Base_model->encrypt_decrypt('encrypt',$father_id);

            $button = '<a href="javascript:generateTree('."'". $father_id ."'".', '."'". log_user_type() ."'". ', '. "'".$tree_type ."'".')" class="btn go-upline">'.lang("text_go_to_upline") .' <i class="fa  fa-arrow-circle-o-up"></i></a>';


            if (log_user_type() != 'employee') { 
                //root user
                if ($user_id != log_user_id()) {
                    $this->tree_member .= $button;
                }
            } else {
                //root user
                if ($user_id != $this->Base_model->getAdminId()) {
                    $this->tree_member .= $button;
                }
            }
        } 
    }
    public function createNullNode( $member_arr, $child_class ){

        $user_link = base_url().'referral/'. $member_arr['user_name']."/".$member_arr['user_name'] ;

        $this->tree_member .= '
        <div class="'.$child_class.'">
        <div class="ne-item-child">
        <div class="ne-item">                    
        <a href="'. $user_link. '">
        <div class="person">
        <img src="'.assets_url().'images/tree/plus.png" alt="'. lang('text_add_member') .' title="'. lang('text_add_member') .'">
        </div>
        </a>
        </div>
        </div>
        </div>'; 
    }

    public function createTreeNode( $member_arr, $tree_type, $child_count=0 ){
      $member_arr['user_id'] =  $this->Base_model->encrypt_decrypt('encrypt',$member_arr['user_id']);
        $user_link = 'onClick="generateTree('."'". $member_arr['user_id'] ."'".', '. "'". log_user_type()."'".', '. "'". $tree_type ."'".')"' ;
        $this->tree_member .= '
        <a href="javascript:void()" '. $user_link. '>
        <div class="person">
        <img src="'.assets_url().'images/profile/'. $member_arr['user_photo'] .'" alt="'. $member_arr['user_name'] .'">
        <p class="name">
        '. $member_arr['user_name'] .'
        </p>
        </div>
        </a>'; 
    }

    public function getTooltipData( $member_arr ){

        $this->tree_member .= '
        <div class="popover_content">
        <p class="popover_message">'. $member_arr['first_name'] . ' '.  $member_arr['second_name'] .'</p> 
        <table class="table">
        ' ;

        $this->tree_member .= '
        <tr>
        <th>'.lang('parent').'</th>
        <td>'. $member_arr['parent_name'] .'</td>
        </tr>
        ' ;
        $this->tree_member .= '
        <tr>
        <th>'.lang('sponsor').'</th>
        <td>'. $member_arr['sponsor_name'] .'</td>
        </tr>
        ' ; 

        if($member_arr['package_name']){
            $this->tree_member .= '
            <tr>
            <th>'.lang('package').'</th>
            <td>'. $member_arr['package_name'] .'</td>
            </tr>
            ' ;
        }
        

        $this->tree_member .= '
        <tr>
        <th>'.lang('referral_downline').'</th>
        <td>'. $member_arr['referral_count'] .'</td>
        </tr>
        ' ; 

        $this->tree_member .= '
        <tr>
        <th>'.lang('join_date').'</th>
        <td>'. $member_arr['date_of_joining'] .'</td>
        </tr>
        ' ; 

        $this->tree_member .= '
        </table>  
        </div>
        ' ;

    }

    public function getUserLeftAndRight($user_id, $type) {
        $this->db->select("left_$type, right_$type");
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('user_info');
        $result = $result->result_array();
        return $result[0];
    }
    public function getAllTreeUsers($user_id, $tree_type = "plan_tree") {   
        $this->TREE_LEVEL = value_by_key("tree_level"); 
        $this->generateTree($user_id, $tree_type);

    }
    public function getRefferedUsers($user_id) {
        $package_color = array(
            1 => "#dff0d8",
            2 => "#dae3f4",
            3 => "#c7feb1",
            4 => "#dfc6e9",
            5 => "#dfc6e9",
            6 => "#faf2cc",
            7 => "#f2dede",
            8 => "#f2dede",
            9 => "#f2dede"
        );
        $result = array();
        $this->db->select("user_name, user_id, package_id, father_id, user_level, user_photo profile_pic, CONCAT(first_name, ' ', second_name) AS full_name");
        $this->db->where('sponsor_id', $user_id);
        $query = $this->db->get('user_info');

        foreach ($query->result_array() as $row) {
            $row["father_name"] = $this->Base_model->getUserName($row["father_id"]);
            $row["encoded_user_id"] = $this->Base_model->encrypt_decrypt('encrypt', $row["user_id"]);

            if(array_key_exists($row['package_id'], $package_color)){
                $row["background_color"] = $package_color[$row["package_id"]];
            }else
            {
                $row["background_color"] = "#f3f9f0";               
            }

            $result[] = $row;
        }
        return $result;
    }

    public function TotalDownlineUsers($user_id, $father_level,$level=5) {

        // $data = [];
        // $data = $this->getDownlineUsers($user_id, $user_level, $level,$limit);

        $details = array();
        $user_info = $this->Base_model->getUserInfoArray( 'left_father,right_father, user_level', $user_id);
        $user_level = max($user_info['user_level'], $level) - min($user_info['user_level'], $level);

        $this->db->select('user_id,user_name, first_name name, mobile, user_photo profile_pic, CONCAT(first_name, " ", second_name) AS full_name, user_level-'.$father_level.'+1 as user_level,father_id', FALSE)
        ->where('status', 'active')
        ->where('left_father >=', $user_info['left_father'])
        ->where('right_father <=', $user_info['right_father'])
        ->where('user_level <=',  $level)
        ->from('user_info');

        $query = $this->db->get();
        // echo $this->db->last_query();
        // print_r($query->result_array());
        // die();
        $i=1;
        foreach($query->result_array() as $row){
            $row['counter'] = $i;
            $details[] = $row;
            $i = $i + 1;
        }
        return $details;


        return $data;
    }

    function getDownlineUsers($user_id, $user_level, $level,$limit='',$join_date='',$end_date='') {

        $details = array();
        $user_left_right = $this->getUserLeftAndRight($user_id, 'father');
        $this->db->select('user_id,user_name, first_name name, mobile, user_photo profile_pic, CONCAT(first_name, " ", second_name) AS full_name');
        $this->db->where('status', 'active');
        $this->db->where('left_father >=', $user_left_right['left_father']);
        $this->db->where('right_father >=', $user_left_right['right_father']);
        $this->db->where('user_level', ($user_level + $level));
        if($limit){
            $this->db->limit($limit);
        }
        $this->db->from('user_info');
        $query = $this->db->get();
        // echo $this->db->last_query();die();
        $i=1;
        foreach($query->result_array() as $row){
            $row['counter'] = $i;
            $details[] = $row;
            $i = $i + 1;
        }
        return $details;


    }
    public function getReferralBonus()
    {
        $details = array();
        $this->db->select('*');
        $this->db->from('settings');
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {
            $details[] = $row;
        }
        return $details;
    }
    public function TotalDownlineCount($user_id, $user_level,$level,$limit='') {

        $data = [];
        $data = $this->TotalDownlineUsers($user_id, $user_level, $level,$limit);
        return $data;
    }
    public function getUserChildNodesData($user_id, $type = "plan_tree") {
        $child_nodes = array();
        if ($user_id) {
            if ($type == "sponsor_tree") {
                $this->db->where("sponsor_id", $user_id);
            } else {
                $this->db->where("father_id", $user_id);
            }

            $this->db->select('user_id,user_name')
            ->order_by("position", "ASC");
            $query = $this->db->get("user_info");
            // echo $this->db->last_query();die();
            foreach ($query->result_array() AS $rows) {
                $child_nodes[] = $rows['user_id'];
            }
        }
        return $child_nodes;
    }



    function getUserDownline_ajax($user_id)
    { 
        if ($this->input->is_ajax_request()) {
            $post = $this->input->post();
            // $user_id=log_user_id();
            $details = array();
            $user_info = $this->Base_model->getUserInfoArray( 'left_father,right_father, user_level', $user_id);

            $this->db->select('user_id as id,user_name as text,father_id,user_photo')
            ->where('status', 'active')
            ->where('father_id',$user_id)
            ->from('user_info');

            $query = $this->db->get();
        // echo $this->db->last_query();
        // print_r($query->result_array());
        // die();
            $i=1;
            foreach($query->result_array() as $row){

                // $row1['id']=$row['id'];
                $row1['id']=$this->Base_model->encrypt_decrypt('encrypt',$row['id']);

                $row1['text']=$row['text'];
                $child_nodes=$this->getChildUsers($row['id']);
                // print_r($child_nodes);die();
                if($child_nodes)
                    $row1['children']=true;
                else
                    $row1['children']=false;
                $row1['icon']=assets_url()."images/profile/". $row["user_photo"];
                $details[] = $row1;
                $i = $i + 1;
            }
            return $details;
            // print_r($details);die();
            echo json_encode($result);
        }
    }
    public function getAllUsersData()
    { 
        $details = array();
        $this->db->select('user_id as id');
        $this->db->from('user_info');
        $this->db->order_by('user_id','ASC');
        $query =$this->db->get();

        foreach ($query->result_array() as $row) {
            $details[]=$row;
        }

        return $details;

    }

    public function getAllUsersTree()
    { 
        $details = array();
        $this->db->select('user_id as id,user_name as text,user_photo');
        $this->db->from('user_info');
        $this->db->order_by('user_id','ASC');
        $query =$this->db->get();


        // $query = $this->db->select("user_id id,user_name text")
        // ->from("user_info")

        // ->order_by("user_id",'ASC')
        // ->get();

        foreach ($query->result_array() as $row) {
            $details[]=$row;
        }

        return $details;

    }
    public function getUsersDowline(){
        $result=[];
        $users=$this->Network_model->getAllUsersTree();
        // print_r($users);die();
        foreach($users as $key){


            $data=$this->Network_model->getUserDownline_ajax($key['id']);
            // print_r($data);
            $children=array();
            foreach($data as $row){
               // $child_nodes = $this->getUserChildNodes($row['id'],'plan_tree');
                if($key['id']==$row['father_id']){
                    // print_r($child_nodes);
                // print_r($key['id']);
                 $result['id']=$key['id'];
                 $result['text']=$key['text'];
                 $result['children'][] = $row;


             }


                // $data=a($data, $children);
         }

         return json_encode($result);
     }
 }




 public function getUsersDowlinesnew($id){
        // print_r($id);die();
    $result=array();
    $data=$this->Network_model->getUserDownline_ajax($id);
    $user_name=$this->Base_model->getUserName($id);
    $user_photo=$this->Base_model->getUserInfoField('user_photo',$id);
    $user_photo1=assets_url()."images/profile/". $user_photo;
    $enc_id=$this->Base_model->encrypt_decrypt('encrypt',$id);
            // print_r($data);
        // $children=array();
        // foreach($data as $row){
               // $child_nodes = $this->getUserChildNodes($row['id'],'plan_tree');

                    // print_r($child_nodes);
                // print_r($key['id']);
    $result['id']=$enc_id;
    $result['text']=$user_name;
    $result['icon'] = $user_photo1;
    $result['children'] = $data;



         // print_r($result);die();

    return json_encode($result);
     // }
}


public function getChildUsers($user_id){
        // print_r($id);die();
    $result=false;
    $this->db->select('user_id');
    $this->db->from('user_info');
    $this->db->where('father_id',$user_id);
    $count = $this->db->count_all_results();

    return $count;

}


}
