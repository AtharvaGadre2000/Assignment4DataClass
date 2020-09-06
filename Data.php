<?php

class Restaurant {
    
    private $menuList;

    function __construct(array $menuList) {
        if (sizeof($menuList)>0) {
            $this->menuList = $menuList;
        } else {
            throw new Exception("No Student record available");
        }
    }

    public function getITEMName() {
        $selectOrder = [];

        foreach($this->menuList as $menu_items) {
            $selectOrder[] = array(
                "id"=>$menu_items['id'],
                "name"=>$menu_items['short_name'] . " " . $menu_items['name']
            );
        }

        return json_encode($selectOrder);
    }

    public function getITEMid($menuid) {
        $response = ["In-Valid ORDER"];
        if($menuid) {
            foreach($this->menuList as $menu_items) {
                if ($menuid == $menu_items['id']) {
                    $response = $menu_items;
                    break;
                }
            }
        }
        return json_encode($response);
    }


}
?>