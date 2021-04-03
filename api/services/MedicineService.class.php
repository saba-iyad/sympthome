<?php
require_once dirname(__FILE__)."/BaseService.class.php";
require_once dirname(__FILE__)."/../dao/MedicinesDao.class.php";

class MedicineService extends BaseService{
  public function __construct(){
    $this->dao = new MedicinesDao();
  }

  public function get_medicines_by_name($search,$offset=0,$limit=10,$order="-id"){
    return $this->dao->get_entity_by_search($search,$offset,$limit,$order);
  }

  public function add_medicine($data){
    //DATA VALIDATION (WHITELISTED WHAT WE NEED)
    $medicine = [
      "name"=>$data["name"],
      "instruction"=>$data["instruction"],
      "warning"=>$data["warning"],
      "side_effects"=>$data["side_effects"],
      "requires_prescription"=>$data["requires_prescription"],
      "date_added"=>date(Config::DATE_FORMAT)
    ];
    return $this->dao->add($medicine);
  }
}


 ?>
