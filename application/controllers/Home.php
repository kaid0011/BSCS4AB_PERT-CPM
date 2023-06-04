<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    { ?>
        <link rel="manifest" href="<?= base_url() ?>/manifest.json" />
  <script>navigator.serviceWorker.register("<?= base_url() ?>/service-worker.js")</script> 
  <?php
        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('template/header', $temp);
        $this->load->view('home/homepage');
        $this->load->view('template/footer');
    }
}
?>