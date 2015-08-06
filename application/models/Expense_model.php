<?php
class Expense_model extends TP_Model {

    public function get_expense($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('expense');
            return $query->result_array();
        }

        $query = $this->db->get_where('expense', array('Slug' => $slug));
        return $query->row_array();
    }

    public function insert_expense()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('Name'), 'dash', TRUE);

        $data = array(
            'Name' => $this->input->post('Name'),
            'Slug' => $slug,
            'Description' => $this->input->post('Description')
        );

        return $this->db->insert('expense', $data);
    }
}
