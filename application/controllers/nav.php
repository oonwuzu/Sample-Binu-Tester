<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nav extends CI_Controller {

    // output format, BML or HTML
    private $output_fmt;

    public function __construct() {
        parent::__construct();

        $this->load->library('binu');
        $this->load->library('bml_page');
        $this->load->library('bml_form');
    }

    /**
     * The index page that shows the simple app listing
     */
    public function index() {

        $this->load->model('app_list_model');

        $this->bml_page->set_title('Joe\'s Dev apps');
        $this->bml_page->set_ttl(1);
        $this->bml_page->set_view('std_list');

        $app_list = $this->app_list_model->get_list();
        $this->bml_page->set_data($app_list);

        $this->load->view('bml/template', $this->bml_page);
    }
public function displaycookies(){
    $this->load->model('app_list_model');
  //  print_r($this->app_list_model->cookie_details());
    
    $this->load->model('app_list_model');

        $this->bml_page->set_title('Joe\'s Dev apps');
        $this->bml_page->set_ttl(1);
        $this->bml_page->set_view('std_list');

        $app_list = $this->app_list_model->cookie_details();
        $this->bml_page->set_data($app_list);

        $this->load->view('bml/template', $this->bml_page);
    
}
    //images
    public function new_image() {
        $this->load->model('app_list_model');

        $this->bml_page->set_title('Joe\'s Dev apps');
        $this->bml_page->set_ttl(1);
        $this->bml_page->set_view('new_image');
        $sample_text = $this->app_list_model->get_text();
        $this->bml_page->set_data($sample_text);

        $this->load->view('bml/template', $this->bml_page);
    }

//Text manipulation
    public function new_form() {
        $params = array(
            'name' => 'field1',
            'value' => '',
            'fullscreen' => 'false',
            'hidevalue' => 'false',
            'manditory' => 'true',
            'predictivetext' => 'allow',
            'mode' => 'phone',
            'maxlength' => 100,
        );

        $this->bml_form->set_title('Sample form');
        $this->bml_form->set_ttl(1);
        $this->bml_form->set_action_url('http://swifta.co/binutraining/framework/index.php/nav/form_display');
        $this->bml_form->add_field($params);

        $this->load->view('bml/form_template', $this->bml_form);
    }

    public function form_display() {

        // bml text submissions come in as GET params
        $get_params = $this->input->get();

        // the proxy numbers parameters starting from 1
        $response = $get_params[1];


        $this->bml_page->set_title('Forms Display');
        $this->bml_page->set_ttl(1);
        $this->bml_page->set_view('std_text');

        $this->bml_page->set_data('Submitted "' . $response . '" at ' . time('c'));

        $this->load->view('bml/template', $this->bml_page);
    }

    /**
     * The Form test index page
     */
    public function ft_index() {

        $this->load->model('app_list_model');

        $this->bml_page->set_title('Joe\'s Dev apps');
        $this->bml_page->set_ttl(1);
        $this->bml_page->set_view('std_list');

        $app_list = $this->app_list_model->get_ft_list();
        $this->bml_page->set_data($app_list);

        $this->load->view('bml/template', $this->bml_page);
    }

    /**
     * A simple text page
     */
    public function text_page() {
        $this->load->model('app_list_model');

        $this->bml_page->set_title('Some text');
        $this->bml_page->set_ttl(1);
        $this->bml_page->set_view('std_text');

        $text = $this->app_list_model->get_text();
        $this->bml_page->set_data($text);

        $this->load->view('bml/template', $this->bml_page);
    }

    /**
     * A custom BML page
     */
    public function custom() {
        $this->load->model('app_list_model');

        $this->bml_page->set_title('Some text');
        $this->bml_page->set_ttl(1);
        $this->bml_page->set_view('custom');

        $text = $this->app_list_model->get_custom();
        $this->bml_page->set_data($text);

        $this->load->view('bml/template', $this->bml_page);
    }

    /**
     * simple page to handle user input
     */
    public function form_page($input_mode) {

        $params = array(
            'name' => 'field1',
            'value' => '',
            'fullscreen' => 'false',
            'hidevalue' => 'false',
            'manditory' => 'true',
            'predictivetext' => 'allow',
            'mode' => $input_mode,
            'maxlength' => 100,
        );

        $this->bml_form->set_title('Sample form');
        $this->bml_form->set_ttl(1);
        $this->bml_form->set_action_url('/apps/dev_apps/index.php/nav/form_submit/');
        $this->bml_form->add_field($params);

        $this->load->view('bml/form_template', $this->bml_form);
    }

    /**
     * handle the form submission
     */
    public function form_submit() {

        // bml text submissions come in as GET params
        $get_params = $this->input->get();

        // the proxy numbers parameters starting from 1
        $response = $get_params[1];


        $this->bml_page->set_title('Form submission');
        $this->bml_page->set_ttl(1);
        $this->bml_page->set_view('std_text');

        $this->bml_page->set_data('Submitted "' . $response . '" at ' . time('c'));

        $this->load->view('bml/template', $this->bml_page);
    }

    /**
     * send a system warning email to notify of an event
     * @param string $email The users email address
     * @param string $message The message
     */
    private function _send_email($message) {

        $this->load->library('email');

        $this->email->from($this->config->item('system_email_from'), $this->config->item('app_name'));
        $this->email->to($this->config->item('warning_email_to'));

        $this->email->subject('Dimensions skin warning');
        $this->email->message('There was a problem with a survey: </br></br>' . "\n\n" . $message);
        //$this->email->set_alt_message('This is the plain text message');

        if (!$this->email->send()) {
            error_log(__FILE__ . ':' . __LINE__ . ' ' . $this->email->print_debugger());
        }
    }

}

/* End of file nav.php */
/* Location: ./application/controllers/nav.php */
