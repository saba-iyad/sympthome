<?php
require_once dirname(__FILE__)."/BaseService.class.php";
require_once dirname(__FILE__)."/../dao/SymptomsDao.class.php";

class SymptomService extends BaseService{
  public function __construct(){
    parent::__construct(new SymptomsDao());
  }

  public function get_symptoms_by_name($name,$offset = 0, $limit = 25, $order="-id"){

    return $this->dao->get_entity_by_search($name,$offset,$limit,$order);
    /*$query = "SELECT * FROM symptoms
              WHERE LOWER(name) LIKE LOWER(CONCAT('%',:name,'%'))";
    return $this->query($query,["name"=>$name]);*/
  }

  public function add_symptom($data){
    $symptom = [
      "name" => $data["name"],
      "date_added" =>date(Config::DATE_FORMAT)
    ];
    return $this->dao->add($symptom);
  }
}



 ?>
