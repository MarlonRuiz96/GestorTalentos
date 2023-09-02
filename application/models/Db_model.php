<?php
class Db_model extends CI_Model {
    public function test_connection() {
        return $this->db->initialize();
    }
}
?>
