<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_set extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('users/Users_model', 'holiday/Holiday_model'));
        $this->load->model(array('student/Student_model', 'kredit/Kredit_model', 'debit/Debit_model', 'bulan/Bulan_model', 'setting/Setting_model', 'information/Information_model', 'bebas/Bebas_model', 'bebas/Bebas_pay_model'));
        $this->load->library('user_agent');
    }

    public function index() {
        $id = $this->session->userdata('uid');
        $data['user'] = count($this->Users_model->get());
        $data['student'] = count($this->Student_model->get(array('status'=>1)));

        // get Kredit_model
        $data['kredit_day'] = $this->Kredit_model->get(array('date'=> date('Y-m-d')));
        $data['kredit_month'] = $this->Kredit_model->get(array('month'=> date('m'),'year'=>date('Y')));
        $data['kredit_year'] = $this->Kredit_model->get(array('year' => date('Y')));
        $data['kredit_all'] = $this->Kredit_model->get(array('id'));

        // get Information
        $data['information'] = $this->Information_model->get(array('information_publish'=>1));

        // get Debit_model
        $data['debit'] = $this->Debit_model->get(array('date'=> date('Y-m-d')));
        $data['debit_month'] = $this->Debit_model->get(array('month'=> date('m'),'year'=>date('Y')));
        $data['debit_year'] = $this->Debit_model->get(array('year'=> date('Y')));
        $data['debit_all'] = $this->Debit_model->get(array('id'));

        // get Bulan_model
        $data['one_day'] = $this->Bulan_model->get_total(array('status'=>1, 'date'=> date('Y-m-d')));
        $data['one_month'] = $this->Bulan_model->get_total(array('status'=>1, 'month'=>date('m'),'year'=>date('Y')));
        $data['one_year'] = $this->Bulan_model->get_total(array('status'=>1, 'year'=>date('Y')));
        $data['all_day'] = $this->Bulan_model->get_total(array('status' => 1));

        // get Bebas_pay_model
        $data['bebas_day'] = $this->Bebas_pay_model->get(array('date'=> date('Y-m-d')));
        $data['bebas_month'] = $this->Bebas_pay_model->get(array('month'=> date('m'),'year'=>date('Y')));
        $data['bebas_year'] = $this->Bebas_pay_model->get(array('year'=> date('Y')));
        $data['bebas_all'] = $this->Bebas_pay_model->get(array('id'));

        //------------------------------------------------ setting start get Kredit_model    
        $data['total_kredit_day'] = 0;
        foreach ($data['kredit_day'] as $row) {
            $data['total_kredit_day'] += $row['kredit_value'];
        }

        $data['total_kredit_month'] = 0;
        foreach ($data['kredit_month'] as $row) {
            $data['total_kredit_month'] += $row['kredit_value'];
        }

        $data['total_kredit_year'] = 0;
        foreach ($data['kredit_year'] as $row) {
            $data['total_kredit_year'] += $row['kredit_value'];
        }

        $data['total_kredit_all'] = 0;
        foreach ($data['kredit_all'] as $row) {
            $data['total_kredit_all'] += $row['kredit_value'];
        }
        //------------------------------------------------ setting end get Kredit_model

        //------------------------------------------------ setting start get Debit_model
        $data['total_day_debit'] = 0;
        foreach ($data['debit'] as $row) {
            $data['total_day_debit'] += $row['debit_value'];
        }

        $data['total_month_debit'] = 0;
        foreach ($data['debit_month'] as $row) {
            $data['total_month_debit'] += $row['debit_value'];
        }

        $data['total_year_debit'] = 0;
        foreach ($data['debit_year'] as $row) {
            $data['total_year_debit'] += $row['debit_value'];
        }

        $data['total_all_debit'] = 0;
        foreach ($data['debit_all'] as $row) {
            $data['total_all_debit'] += $row['debit_value'];
        }
        //------------------------------------------------ setting end get Debit_model

        //------------------------------------------------ setting start get Bulan_model
        $data['total_day_bulan'] = 0;
        foreach ($data['one_day'] as $row) {
            $data['total_day_bulan'] += $row['bulan_bill'];
        }

        $data['total_month_bulan'] = 0;
        foreach ($data['one_month'] as $row) {
            $data['total_month_bulan'] += $row['bulan_bill'];
        }

        $data['total_year_bulan'] = 0;
        foreach ($data['one_year'] as $row) {
            $data['total_year_bulan'] += $row['bulan_bill'];
        }

        $data['total_uang_bulan'] = 0;
        foreach ($data['all_day'] as $row) {
            $data['total_uang_bulan'] += $row['bulan_bill'];
        }
        //------------------------------------------------ setting end get Bulan_model

        //------------------------------------------------ setting start get Bebas_pay_model
        $data['total_bebas_day'] = 0;
        foreach ($data['bebas_day'] as $row) {
            $data['total_bebas_day'] += $row['bebas_pay_bill'];
        }

        $data['total_bebas_month'] = 0;
        foreach ($data['bebas_month'] as $row) {
            $data['total_bebas_month'] += $row['bebas_pay_bill'];
        }

        $data['total_bebas_year'] = 0;
        foreach ($data['bebas_year'] as $row) {
            $data['total_bebas_year'] += $row['bebas_pay_bill'];
        }

        $data['total_bebas_all'] = 0;
        foreach ($data['bebas_all'] as $row) {
            $data['total_bebas_all'] += $row['bebas_pay_bill'];
        }
        //------------------------------------------------ setting end get Bebas_pay_model

        

        $this->load->library('form_validation');
        if ($this->input->post('add', TRUE)) {
            $this->form_validation->set_rules('date', 'Tanggal', 'required');
            $this->form_validation->set_rules('info', 'Info', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if ($_POST AND $this->form_validation->run() == TRUE) {
                list($tahun, $bulan, $tanggal) = explode('-', $this->input->post('date', TRUE));

                $params['year'] = $tahun;
                $params['date'] = $this->input->post('date');
                $params['info'] = $this->input->post('info');

                $ret = $this->Holiday_model->add($params);

                $this->session->set_flashdata('success', 'Tambah Agenda berhasil');
                redirect('manage');
            }
        }elseif ($this->input->post('del', TRUE)) {
            $this->form_validation->set_rules('id', 'ID', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if ($_POST AND $this->form_validation->run() == TRUE) {
                $id = $this->input->post('id', TRUE);
                $this->Holiday_model->delete($id);

                $this->session->set_flashdata('success', 'Hapus Agenda berhasil');
                redirect('manage');
            }
        }
        $data['setting_logo'] = $this->Setting_model->get(array('id' => 6));
        $data['holiday'] = $this->Holiday_model->get();
        $data['title'] = 'Dashboard';
        $data['main'] = 'dashboard/dashboard';
        $this->load->view('manage/layout', $data);
    }

    public function get() {
        $events = $this->Holiday_model->get();
        foreach ($events as $i => $row) {
            $data[$i] = array(
                'id' => $row['id'],
                'title' => strip_tags($row['info']),
                'start' => $row['date'],
                'end' => $row['date'],
                'year' => $row['year'],
                    //'url' => event_url($row)
            );
        }
        echo json_encode($data, TRUE);
    }

}
