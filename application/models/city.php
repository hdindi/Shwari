<?php
// Edit City
public function edit_city($city_id, $city_name) {
    $data = array(
        'city_name' => $city_name
    );
    $this->db->where('city_id', $city_id);
    $this->db->update('cities', $data);
}
?>