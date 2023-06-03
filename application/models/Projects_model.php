<?php
class Projects_model extends CI_model{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertProject($proj)
    {
        //insert
        //get id
        //return id
        $this->db->insert('projects', $proj);
        return $this->db->insert_id();
    }

    public function updateProject($proj)
    {
        //update
        //get id
        //return id
        extract($proj);
        $this->db->where('ProjectID', $ProjectID);
        $this->db->update('projects', $proj);
        return $this->db->insert_id();
    }

    //CPM
    public function insertCPM($data)
    {
        foreach($data as $d)
        {
            $this->db->insert('cpm', $d);
        }
        $lastID = $this->db->insert_id();
        //get last insert id
        //get liID row
        //get proj id
        //get rows where proj id = proj id
        $this->db->where('RecordID', $lastID);
        $this->db->select('ProjectID');
        $query = $this->db->get('cpm');
        foreach ($query->result() as $row)
        {
            $ProjectID = $row->ProjectID;
        }

        return $ProjectID;
    }

    public function getcpmResults($ProjectID)
    {
        $this->db->where('ProjectID', $ProjectID);
        $query = $this->db->get('cpm');
        return $query->result();
    }
}