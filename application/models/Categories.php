<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //customer List
    public function category_list($pr_status = null)
    {
        $this->db->select('*');
        $this->db->from('product_category');
        $this->db->where('status', 1);

        if ($pr_status) {
            $this->db->where('finished_raw', $pr_status);
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function cates()
    {
        $this->db->select('name,name_bn,id');
        $this->db->from('cats');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function cates_by_id($id)
    {
        $this->db->select('name,id');
        $this->db->from('cats');
        $this->db->where('id', $id);

        return $this->db->get()->row();
    }

    public function sub_sub_cat_by_id($id)
    {
    }

    //customer List
    public function category_list_product()
    {
        $this->db->select('*');
        $this->db->from('product_category');
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //customer List
    public function category_list_count()
    {
        $this->db->select('*');
        $this->db->from('product_category');
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    //Category Search Item
    public function category_search_item($category_id)
    {
        $this->db->select('*');
        $this->db->from('cats');
        $this->db->where('id', $category_id);
        $this->db->limit('500');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Count customer
    public function category_entry($data)
    {

        $this->db->insert('cats', $data);
        return TRUE;
    }

    //Retrieve customer Edit Data
    public function retrieve_category_editdata($category_id)
    {
        $this->db->select('*');
        $this->db->from('cats');
        $this->db->where('id', $category_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Update Categories
    public function update_category($data, $category_id)
    {
        $this->db->where('id', $category_id);
        $this->db->update('cats', $data);
        return true;
    }

    // Delete customer Item
    public function delete_category($category_id)
    {
        $this->db->where('id', $category_id);
        $this->db->delete('cats');
        return true;
    }
}
