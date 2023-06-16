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

    public function updateProject($proj, $ProjectID)
    {
        $this->db->where('ProjectID', $ProjectID);
        $this->db->update('projects', $proj);
        return $this->db->insert_id();
    }

    public function addEmail($UserEmail, $ReferenceNo)
    {
        $arr = array('UserEmail' => $UserEmail);
        $this->db->where('ReferenceNo', $ReferenceNo);
        $this->db->update('projects', $arr);
        return $this->db->insert_id();
    }

    public function insertCPM($project, $ProjectID)
    {
        $this->db->where('ProjectID', $ProjectID);
        $this->db->select('ProjectID');
        $query = $this->db->get('cpm');

        if($query->num_rows() > 0)
        {
            $this->db->update_batch('cpm', $project, 'RecordID');
            return true;
        }
        else
        {
            foreach($project as $d)
            {
                $this->db->insert('cpm', $d);
            }
            return true;
        }  
    }

    public function insertPERT($project, $ProjectID)
    {
        $this->db->where('ProjectID', $ProjectID);
        $this->db->select('ProjectID');
        $query = $this->db->get('pert');

        if($query->num_rows() > 0)
        {
            $this->db->update_batch('pert', $project, 'RecordID');
            return true;
        }
        else
        {
            foreach($project as $d)
            {
                $this->db->insert('pert', $d);
            }
            return true;
        } 
    }

    public function insertNORMAL($project, $ProjectID)
    {
        $this->db->where('ProjectID', $ProjectID);
        $this->db->select('ProjectID');
        $query = $this->db->get('normal');

        if($query->num_rows() > 0)
        {
            $this->db->update_batch('normal', $project, 'RecordID');
            return true;
        }
        else
        {
            foreach($project as $d)
            {
                $this->db->insert('normal', $d);
            }
            return true;
        } 
    }

    public function insertTRI($project, $ProjectID)
    {
        $this->db->where('ProjectID', $ProjectID);
        $this->db->select('ProjectID');
        $query = $this->db->get('triangular');

        if($query->num_rows() > 0)
        {
            $this->db->update_batch('triangular', $project, 'RecordID');
            return true;
        }
        else
        {
            foreach($project as $d)
            {
                $this->db->insert('triangular', $d);
            }
            return true;
        } 
    }

    public function insertBETA($project, $ProjectID)
    {
        $this->db->where('ProjectID', $ProjectID);
        $this->db->select('ProjectID');
        $query = $this->db->get('betapert');

        if($query->num_rows() > 0)
        {
            $this->db->update_batch('betapert', $project, 'RecordID');
            return true;
        }
        else
        {
            foreach($project as $d)
            {
                $this->db->insert('betapert', $d);
            }
            return true;
        } 
    }

    public function getProject($UserEmail, $ReferenceNo)
    {
        $this->db->where('UserEmail', $UserEmail);
        $this->db->where('ReferenceNo', $ReferenceNo);
        $this->db->select('ProjectID, CompType');
        $query = $this->db->get('projects');

        if($query->num_rows() == 1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }

    public function getTasks($ProjectID, $CompType)
    {
        $Comp = strtolower($CompType);
        $this->db->where('ProjectID', $ProjectID);
        $query = $this->db->get($Comp);
        if($query->num_rows() > 1)
        {
            return $query;
            //return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function getProjInfo($ProjectID)
    {
        $this->db->where('ProjectID', $ProjectID);
        $query = $this->db->get('projects');

        return $query->row();
    }

    //////////////////////////////////////////////////////////

    public function getcpmResults($ProjectID)
    {
        $this->db->where('ProjectID', $ProjectID);
        $query = $this->db->get('cpm');
        return $query->result();
    }

    public function getpertResults($ProjectID)
    {
        $this->db->where('ProjectID', $ProjectID);
        $query = $this->db->get('pert');
        return $query->result();
    }
}