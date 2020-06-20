<?php

/**
 * 
 */
class Bill_print_model extends CI_Model
{
    public function get_all_billing_info()
    {
        $all_bill = $this->db->query("
        SELECT
        u.unit_name,
        u.status,
        rs.*
        FROM tbl_resident as rs
        INNER JOIN tbl_unit as u on rs.unit_id = u.id
        WHERE u.status = 'a'
        and rs.status = 'a'
        and rs.branch_id = $this->branch_id
        ")->result();

     
        if(empty($all_bill)){
            $all_bil = $this->db->query("
            SELECT sr.*,
            u.unit_name,
            u.status,
            rs.resident_name,
            rs.generate_date
            FROM tbl_service_transaction as sr
            INNER JOIN tbl_unit as u on sr.unit_id = u.id
            INNER JOIN tbl_resident as rs on u.id = rs.unit_id
            WHERE u.status = 'a'
            and rs.status = 'a'
            and rs.branch_id = $this->branch_id
            AND sr.service_month_id In (SELECT MAX(service_month_id) FROM tbl_service_transaction)
            ")->result();
            echo json_encode($all_bil);
        }else{
            $all_bills = $this->db->query("
            SELECT sr.*,
            u.unit_name,
            u.status
            FROM tbl_service_transaction as sr
            INNER JOIN tbl_unit as u on sr.unit_id = u.id
            WHERE u.status = 'a' 
            and sr.branch_id = $this->branch_id
            AND sr.service_month_id In (SELECT MAX(service_month_id) FROM tbl_service_transaction)
            ")->result();
            echo json_encode($all_bills);
           
        }
    }
    public function get_all_rent_info()
    {
        $query = $this->db->query("
    	SELECT
    	tbl_rent_transaction.*,
    	tbl_unit.*,
    	tbl_floor.floor_name,
        tbl_month_entry.month_name,
    	tbl_resident.*
    FROM tbl_rent_transaction
    LEFT JOIN tbl_unit ON tbl_rent_transaction.unit_id = tbl_unit.id
    LEFT JOIN tbl_floor ON tbl_unit.floor_id = tbl_floor.id
    left JOIN tbl_resident ON tbl_unit.id = tbl_resident.unit_id
    LEFT JOIN tbl_month_entry on tbl_rent_transaction.service_month_id = tbl_month_entry.id
     WHERE 
     tbl_rent_transaction.fld_status = 'a' and
       tbl_rent_transaction.service_month_id In (SELECT MAX(service_month_id) FROM tbl_rent_transaction)
       
  ");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_all_service_info()
    {
        $query = $this->db->query("
    	SELECT
    	tbl_service_transaction .*,
    	tbl_unit.*,
    	tbl_floor.floor_name,
        tbl_month_entry.month_name,
    	tbl_resident.*
    FROM tbl_service_transaction
    LEFT JOIN tbl_unit ON tbl_service_transaction .unit_id = tbl_unit.id
    LEFT JOIN tbl_floor ON tbl_unit.floor_id = tbl_floor.id
    left JOIN tbl_resident ON tbl_unit.id = tbl_resident.unit_id
    LEFT JOIN tbl_month_entry on tbl_service_transaction .service_month_id = tbl_month_entry.id
     WHERE 
     tbl_service_transaction.fld_status='a' and
       tbl_service_transaction.service_month_id In (SELECT MAX(service_month_id) FROM tbl_service_transaction )
       
  ");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


//     public function get_all_billing_info()
//     {
//         $query = $this->db->query("
//       SELECT
//       tbl_service_transaction.*,
//       tbl_unit.unit_name,
//       tbl_floor.floor_name,
//       tbl_resident.resident_name,
//       tbl_month_entry.month_name
//   FROM tbl_service_transaction
//   left JOIN tbl_unit ON tbl_service_transaction.unit_id = tbl_unit.id
//   LEFT JOIN tbl_month_entry on tbl_service_transaction.service_month_id = tbl_month_entry.id
//   left JOIN tbl_floor ON tbl_unit.floor_id = tbl_floor.id
//   left JOIN tbl_resident ON tbl_unit.id = tbl_resident.unit_id
//    where tbl_service_transaction.fld_status = 'p'	
     
//   ");
//         if ($query->num_rows() > 0) {
//             return $query->result();
//         } else {
//             return false;
//         }
//     }
    public function get_building_info()
    {
        $query = $this->db->query("
		SELECT * FROM tbl_building_inf
		");
        return $query->row();
    }
    public function print_service_bill()
    {
        $query = $this->db->query("
            SELECT sr.*,
            u.unit_name,
            rs.resident_name,
            rs.generate_date
            FROM tbl_service_transaction  as sr
            INNER JOIN tbl_unit as u on sr.unit_id = u.id
            INNER JOIN tbl_resident as rs on u.id = rs.unit_id
            WHERE 
            sr.service_month_id In (SELECT MAX(service_month_id) FROM tbl_service_transaction )");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function print_rent_bill()
    {
        $query = $this->db->query("
            SELECT sr.*,
            u.unit_name,
            rs.resident_name,
            rs.generate_date
            FROM tbl_rent_transaction as sr
            INNER JOIN tbl_unit as u on sr.unit_id = u.id
            INNER JOIN tbl_resident as rs on u.id = rs.unit_id
            WHERE 
            sr.service_month_id In (SELECT MAX(service_month_id) FROM tbl_rent_transaction)");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
