<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Project extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Projects_model');
    }

    public function index()
    {
        $this->session->sess_destroy();
        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('template/header', $temp);
        $this->load->view('project');
        $this->load->view('template/footer');
    }

    public function getProject()
    {
        $UserEmail = $this->input->post('UserEmail');
        $ReferenceNo = $this->input->post('ReferenceNo');    

        $Project = $this->Projects_model->getProject($UserEmail, $ReferenceNo);

        if ($Project) {
            $ProjectID = $Project->ProjectID;
            $CompType = $Project->CompType;
            
            $Tasks = $this->Projects_model->getTasks($ProjectID, $CompType);            
            
            if ($Tasks) {
                $data['Tasks'] = $Tasks;

                $i = 1;
                if ($CompType == 'CPM') {
                    foreach ($Tasks->result() as $row) {
                        $data[$i]['RecordID'] = $row->RecordID;

                        $data[$i]['taskid'] = $row->taskid;
                        $data[$i]['ProjectID'] = $row->ProjectID;
                        $data[$i]['name'] = $row->name;
                        $data[$i]['desc'] = $row->desc;
                        $data[$i]['time'] = $row->time;
                        $data[$i]['unit'] = $row->unit;
                        $data[$i]['prereq'] = $row->prereq;
                        $data[$i]['es'] = $row->es;
                        $data[$i]['ef'] = $row->ef;
                        $data[$i]['ls'] = $row->ls;
                        $data[$i]['lf'] = $row->lf;
                        $data[$i]['slack'] = $row->slack;
                        $data[$i]['isCritical'] = $row->isCritical;
                        $data[$i]['priorityLvl'] = $row->priorityLvl;
                        $data[$i]['type'] = $row->type;
                        $data[$i]['pqty'] = $row->pqty;

                        $i++;
                    }

                    $qty = $data[1]['pqty'];
                    for ($j = 1; $j <= $qty; $j++) {
                        $project[] = $data[$j];
                        if ($data[$j]['isCritical'] == true)
                        {
                            $cp[] = $data[$j];
                        }
                    }

                    $ProjectID = $data[1]['ProjectID'];
                    $projinfo = $this->Projects_model->getProjInfo($ProjectID);
                    
                    $arr = array(
                        'project' => $project,
                        'cp' => $cp,
                        'finish_time' => max(array_column($data, 'ef')),
                        'unit' => $data[1]['unit'],
                        'new' => false,
                        'ReferenceNo' => $ReferenceNo,
                        'ProjectName' => $projinfo->ProjectName,
                        'ProjectDesc' => $projinfo->ProjectDesc,
                        'CompType' => $projinfo->CompType
                    );
                    $this->session->set_userdata($arr);
                    redirect('cpm/results');
                }
                else if($CompType == 'PERT') {
                    foreach ($Tasks->result() as $row) {
                        $data[$i]['RecordID'] = $row->RecordID;

                        $data[$i]['taskid'] = $row->taskid;
                        $data[$i]['ProjectID'] = $row->ProjectID;
                        $data[$i]['name'] = $row->name;
                        $data[$i]['desc'] = $row->desc;
                        $data[$i]['opt'] = $row->opt;
                        $data[$i]['ml'] = $row->ml;
                        $data[$i]['pes'] = $row->pes;
                        $data[$i]['time'] = $row->time;
                        $data[$i]['unit'] = $row->unit;
                        $data[$i]['prereq'] = $row->prereq;
                        $data[$i]['sd'] = $row->sd;
                        $data[$i]['v'] = $row->v; 
                        $data[$i]['es'] = $row->es;
                        $data[$i]['ef'] = $row->ef;
                        $data[$i]['ls'] = $row->ls;
                        $data[$i]['lf'] = $row->lf;
                        $data[$i]['slack'] = $row->slack;
                        $data[$i]['isCritical'] = $row->isCritical;
                        $data[$i]['priorityLvl'] = $row->priorityLvl;
                        $data[$i]['type'] = $row->type;
                        $data[$i]['pqty'] = $row->pqty;

                        $i++;
                    }

                    $proj_var = 0;
                    $qty = $data[1]['pqty'];
                    for ($j = 1; $j <= $qty; $j++) {
                        $project[] = $data[$j];
                        if ($data[$j]['isCritical'] == true)
                        {
                            $cp[] = $data[$j];
                            $proj_var += $data[$j]['v'];
                        }
                    }
                    $arr = array(
                        'project' => $project,
                        'cp' => $cp,
                        'finish_time' => max(array_column($data, 'ef')),
                        'proj_variance' => $proj_var,
                        'proj_sd' => sqrt($proj_var), 
                        'unit' => $data[1]['unit'],
                        'new' => false,
                        'ReferenceNo' => $ReferenceNo
                    );
                    $this->session->set_userdata($arr);                
                    redirect('pert/results');
                }
                else if($CompType == 'NORMAL') {
                    foreach ($Tasks->result() as $row) {
                        $data[$i]['RecordID'] = $row->RecordID;

                        $data[$i]['taskid'] = $row->taskid;
                        $data[$i]['ProjectID'] = $row->ProjectID;
                        $data[$i]['name'] = $row->name;
                        $data[$i]['desc'] = $row->desc;
                        $data[$i]['opt'] = $row->opt;
                        $data[$i]['ml'] = $row->ml;
                        $data[$i]['pes'] = $row->pes;
                        $data[$i]['time'] = $row->time;
                        $data[$i]['unit'] = $row->unit;
                        $data[$i]['prereq'] = $row->prereq;
                        $data[$i]['mean'] = $row->mean;
                        $data[$i]['sd'] = $row->sd;
                        $data[$i]['v'] = $row->v; 
                        $data[$i]['es'] = $row->es;
                        $data[$i]['ef'] = $row->ef;
                        $data[$i]['ls'] = $row->ls;
                        $data[$i]['lf'] = $row->lf;
                        $data[$i]['slack'] = $row->slack;
                        $data[$i]['isCritical'] = $row->isCritical;
                        $data[$i]['priorityLvl'] = $row->priorityLvl;
                        $data[$i]['type'] = $row->type;
                        $data[$i]['N'] = $row->N;
                        $data[$i]['pqty'] = $row->pqty;

                        $i++;
                    }
                    $qty = $data[1]['pqty'];
                    for ($j = 1; $j <= $qty; $j++) {
                        $project[] = $data[$j];
                        if ($data[$j]['isCritical'] == true)
                        {
                            $cp[] = $data[$j];
                        }
                    }
                    $arr = array(
                        'project' => $project,
                        'cp' => $cp,
                        'finish_time' => max(array_column($data, 'ef')),
                        'unit' => $data[1]['unit'],
                        'new' => false,
                        'ReferenceNo' => $ReferenceNo
                    );
                    $this->session->set_userdata($arr);
                    redirect('normal/results');
                }
                else if($CompType == 'TRIANGULAR') {
                    foreach ($Tasks->result() as $row) {
                        $data[$i]['RecordID'] = $row->RecordID;

                        $data[$i]['taskid'] = $row->taskid;
                        $data[$i]['ProjectID'] = $row->ProjectID;
                        $data[$i]['name'] = $row->name;
                        $data[$i]['desc'] = $row->desc;
                        $data[$i]['opt'] = $row->opt;
                        $data[$i]['ml'] = $row->ml;
                        $data[$i]['pes'] = $row->pes;
                        $data[$i]['time'] = $row->time;
                        $data[$i]['unit'] = $row->unit;
                        $data[$i]['prereq'] = $row->prereq;
                        $data[$i]['es'] = $row->es;
                        $data[$i]['ef'] = $row->ef;
                        $data[$i]['ls'] = $row->ls;
                        $data[$i]['lf'] = $row->lf;
                        $data[$i]['slack'] = $row->slack;
                        $data[$i]['isCritical'] = $row->isCritical;
                        $data[$i]['priorityLvl'] = $row->priorityLvl;
                        $data[$i]['type'] = $row->type;
                        $data[$i]['N'] = $row->N;
                        $data[$i]['pqty'] = $row->pqty;

                        $i++;
                    }
                    $qty = $data[1]['pqty'];
                    for ($j = 1; $j <= $qty; $j++) {
                        $project[] = $data[$j];
                        if ($data[$j]['isCritical'] == true)
                        {
                            $cp[] = $data[$j];
                        }
                    }
                    $arr = array(
                        'project' => $project,
                        'cp' => $cp,
                        'finish_time' => max(array_column($data, 'ef')),
                        'unit' => $data[1]['unit'],
                        'new' => false,
                        'ReferenceNo' => $ReferenceNo
                    );
                    $this->session->set_userdata($arr);
                    redirect('triangular/results');
                }
                else if($CompType == 'BETAPERT') {
                    foreach ($Tasks->result() as $row) {
                        $data[$i]['RecordID'] = $row->RecordID;

                        $data[$i]['taskid'] = $row->taskid;
                        $data[$i]['ProjectID'] = $row->ProjectID;
                        $data[$i]['name'] = $row->name;
                        $data[$i]['desc'] = $row->desc;
                        $data[$i]['opt'] = $row->opt;
                        $data[$i]['ml'] = $row->ml;
                        $data[$i]['pes'] = $row->pes;
                        $data[$i]['time'] = $row->time;
                        $data[$i]['unit'] = $row->unit;
                        $data[$i]['prereq'] = $row->prereq;
                        $data[$i]['alpha'] = $row->alpha;
                        $data[$i]['beta'] = $row->beta;
                        $data[$i]['mean'] = $row->mean;
                        $data[$i]['sd'] = $row->sd;
                        $data[$i]['es'] = $row->es;
                        $data[$i]['ef'] = $row->ef;
                        $data[$i]['ls'] = $row->ls;
                        $data[$i]['lf'] = $row->lf;
                        $data[$i]['slack'] = $row->slack;
                        $data[$i]['isCritical'] = $row->isCritical;
                        $data[$i]['priorityLvl'] = $row->priorityLvl;
                        $data[$i]['type'] = $row->type;
                        $data[$i]['N'] = $row->N;
                        $data[$i]['pqty'] = $row->pqty;

                        $i++;
                    }
                    $qty = $data[1]['pqty'];
                    for ($j = 1; $j <= $qty; $j++) {
                        $project[] = $data[$j];
                        if ($data[$j]['isCritical'] == true)
                        {
                            $cp[] = $data[$j];
                        }
                    }
                    $arr = array(
                        'project' => $project,
                        'cp' => $cp,
                        'finish_time' => max(array_column($data, 'ef')),
                        'unit' => $data[1]['unit'],
                        'new' => false,
                        'ReferenceNo' => $ReferenceNo
                    );
                    $this->session->set_userdata($arr);
                    redirect('betapert/results');
                }
                else {
                    $this->session->set_flashdata('message', 'This project does not exist.'); 
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('message', 'This project does not exist.'); 
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('message', 'This project does not exist.'); 
            redirect('home');
        }
    }

    public function viewproject()
    {
        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('template/header', $temp);
        $this->load->view('viewproject');
        $this->load->view('template/footer');
    }
}
