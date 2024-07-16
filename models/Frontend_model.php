<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Frontend_model extends App_Model
{
    public function __construct()
    {
       // parent::__construct();
    }
    
    public function get($invoiceData,$itemMeta,$lagoArray)
    {
        $this->load->database();
        $this->db->insert( db_prefix() . 'invoices', $invoiceData);
        // Get the last inserted ID
        $last_insert_id = $this->db->insert_id();
        // Fetch the Get  Data From Invoice Table
        $this->db->select('id');
        $this->db->where('id', $last_insert_id);
        $getId = $this->db->get(db_prefix() . 'invoices')->row();
        // Here Update the Invoice Table Invoice Number
        if ($getId) {
            $this->db->where('id', $getId->id);
            $this->db->update(db_prefix() . 'invoices', [
                'number' => $getId->id,
            ]);
        }
        // Data Inser To Item meta
        $itemMeta['rel_id'] = $last_insert_id ;
        $this->db->insert( db_prefix() . 'itemable', $itemMeta);
        // Insert Lago Data
        $this->insertLagoData($lagoArray,$last_insert_id);
        
        // Check for Success
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    // Lago Data Store
    public function insertLagoData($lagoArray,$last_insert_id){
        
        $lagoArray['invoice_id'] = $last_insert_id;
        $lagoArray['invoice_number'] = $last_insert_id;
        
        $this->load->database();
        $this->db->insert( db_prefix() . 'lago_invoice', $lagoArray);
        
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
        
    }
    
    public function isLagoInvoiceCheck($lagoId){
        
        $this->load->database();
        $this->db->select('id');
        $this->db->where('lago_id',$lagoId);
        $isCheck = $this->db->get(db_prefix() . 'lago_invoice')->row();
    
        if($isCheck == null){
          return true;  
        }else{
            return false;
        }
    }
    

}
