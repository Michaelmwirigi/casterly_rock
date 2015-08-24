<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
 public function __construct()
 {
  parent::__construct();
 }

function login($email,$password)
{
  $this->db->where("emailAddress",$email);
  $this->db->where("password",$password);

  $query=$this->db->get("customer");
  if($query->num_rows()>0)
  {
   foreach($query->result() as $rows)
   {
    //add all data to session
    $newdata = array(
      'user_id'  => $rows->Custid,
      'logged_in'  => TRUE
    );
   }
   $this->session->set_userdata($newdata);
   return true;
  }
  return false;
}

 public function add_user()
 {
  $data=array(
    'CName'=>$this->input->post('name'),
    'emailAddress'=>$this->input->post('email'),
    'TelNo'=>$this->input->post('tel'),

    'Password'=>md5($this->input->post('password'))
  );
  return $this->db->insert('customer', $data);
 }
public function add_product_to_cart()
 {
  $data2=array(
    //'productid'=>$this->input->post('name'),
    'Customerid'=>$this->session->userdata('user_id'),
    'delivery_location'=>$this->input->post('location'),
    'quantity'=>$this->input->post('quantity'),
    'productid'=>$this->input->post('product'),
    
  );
  return $this->db->insert('cart', $data2);
 }

 public function edit_product_in_cart($cart_id)
 {
  $data3=array(
    //'productid'=>$this->input->post('product'),
    //'Customerid'=>$this->session->userdata('user_id'),
    'delivery_location'=>$this->input->post('location'),
    'quantity'=>$this->input->post('quantity'),
    'productid'=>$this->input->post('product'),
    //'cartid'=>$this->input->post('cartid'),
    
  );//echo $cart_id; die;
  $this->db->where('cartid', $cart_id);
  return $this->db->update('cart', $data3);
 }


  public function show_from_cart($user_id)
  {
    $sql = "SELECT `pd`.`ProdName`, `ct`.`quantity`, `ct`.`Customerid`, `ct`.`cartid` FROM `cart` `ct` JOIN `product` `pd` ON `ct`.`productid` = `pd`.`Productid` WHERE `ct`.`Customerid` = '$user_id'";
    // echo $sql;
    $query2=$this->db->query($sql);
    
    $result = $query2->result_array();
    // echo "<pre>";print_r($result);
    return $result;
    
  }


  function delete_cart_entry($cartid,$customerid)
  {
    $this->db->where("Customerid",$customerid);
    $this->db->where("cartid",$cartid);
    $this->db->delete('cart');

    
  }

  // function delete_cart_entry($cartid)
  // {
  //   $this->db->where('student_id', $id);
  //   $this->db->delete('students');
  // }


}
?>