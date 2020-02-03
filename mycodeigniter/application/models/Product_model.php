<?php 
class Product_model extends CI_Model {

	var $API ="";
	function __construct() {
		parent::__construct();
		$this->API="http://localhost/codeigniterapi/index.php";
	}
	function list_product(){
		return json_decode($this->restclient->get());
	}
	function product($id){
		$params = array('id'=>  $id);
		return json_decode($this->restclient->get($params),true);
	}
	function ticket($params)
	{
		$this->db->insert('tickets',$params);
		return $code = 200;
	}
	function lead($params)
	{
		$this->db->insert('leads',$params);
		return $code = 200;
	}
	function createcamp($params)
	{
	    $this->db->insert('campaign_master',$params);
		return $code = 200;
	}
	function createserv($params)
	{
	    $this->db->insert('service_master',$params);
		return $code = 200;
	}
	function save($array)
	{
		$test = $this->restclient->post($array);
	    print_r($test);
	}
	function update($array)
	{
		$this->restclient->put($array);
	}
	function delete($id)
	{
		$this->restclient->delete($id);
	}
	public function getService()
{
	$this->db->select('*');
	$this->db->from('service_master');
	return $this->db->get()->result();
}
}
?>