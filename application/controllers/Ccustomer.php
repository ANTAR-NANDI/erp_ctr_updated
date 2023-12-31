<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ccustomer extends CI_Controller
{

    public $menu;

    function __construct()
    {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->library('auth');
        $this->load->library('lcustomer');
        $this->load->library('session');
        $this->load->model('Customers');
        $this->auth->check_admin_auth();
    }


    //Default loading for Customer System.
    public function index()
    {
        $content = $this->lcustomer->customer_add_form();
        //Here ,0 means array position 0 will be active class
        $this->template->full_admin_html_view($content);
    }

    //customer_search_item
    public function customer_search_item()
    {
        $customer_id = $this->input->post('customer_id');
        $content = $this->lcustomer->customer_search_item($customer_id);
        $this->template->full_admin_html_view($content);
    }

    //credit customer_search_item
    public function credit_customer_search_item()
    {
        $customer_id = $this->input->post('customer_id');
        $content = $this->lcustomer->credit_customer_search_item($customer_id);
        $this->template->full_admin_html_view($content);
    }

    //paid customer_search_item
    public function paid_customer_search_item()
    {
        $customer_id = $this->input->post('customer_id');
        $content = $this->lcustomer->paid_customer_search_item($customer_id);
        $this->template->full_admin_html_view($content);
    }

    //Manage customer
    public function manage_customer()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lcustomer');
        $CI->load->model('Customers');
        $content = $this->lcustomer->customer_list();
        $this->template->full_admin_html_view($content);
    }

    public function all_customer()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lcustomer');
        $CI->load->model('Customers');
        $content = $this->lcustomer->all_customer_list();
        $this->template->full_admin_html_view($content);
    }

    public function Check_all_customer()
    {
        // GET data
        $this->load->model('Customers');
        $postData = $this->input->post();
        $data = $this->Customers->get_all_customerList($postData);
        echo json_encode($data);
    }

    public function CheckCustomerList()
    {
        // GET data
        $this->load->model('Customers');
        $postData = $this->input->post();
        $data = $this->Customers->getCustomerList($postData);
        echo json_encode($data);
    }

    //Product Add Form
    public function credit_customer()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lcustomer');
        $CI->load->model('Customers');
        $content = $this->lcustomer->credit_customer_list();
        $this->template->full_admin_html_view($content);;
    }

    public function CheckCreditCustomerList()
    {
        // GET data
        $this->load->model('Customers');
        $postData = $this->input->post();
        $data = $this->Customers->getCreditCustomerList($postData);
        echo json_encode($data);
    }

    //Paid Customer list. The customer who will pay 100%.
    public function paid_customer()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lcustomer');
        $CI->load->model('Customers');
        $content = $this->lcustomer->paid_customer_list();
        $this->template->full_admin_html_view($content);
    }

    public function CheckPaidCustomerList()
    {
        // GET data
        $this->load->model('Customers');
        $postData = $this->input->post();
        $data = $this->Customers->getPaidCustomerList($postData);
        echo json_encode($data);
    }


    public function customer_ledger_report()
    {
        $config["base_url"] = base_url('Ccustomer/customer_ledger_report/');
        $config["total_rows"] = $this->Customers->count_customer_ledger();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        $content = $this->lcustomer->customer_ledger_report($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    public function customer_ledger_report_cheque()
    {
        $config["base_url"] = base_url('Ccustomer/customer_ledger_report_cheque/');
        // $config["total_rows"] = $this->Customers->count_customer_ledger_cheque();
        // $config["per_page"] = 10;
        // $config["uri_segment"] = 3;
        // $config["num_links"] = 5;
        // /* This Application Must Be Used With BootStrap 3 * */
        // $config['full_tag_open'] = "<ul class='pagination'>";
        // $config['full_tag_close'] = "</ul>";
        // $config['num_tag_open'] = '<li>';
        // $config['num_tag_close'] = '</li>';
        // $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        // $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        // $config['next_tag_open'] = "<li>";
        // $config['next_tag_close'] = "</li>";
        // $config['prev_tag_open'] = "<li>";
        // $config['prev_tagl_close'] = "</li>";
        // $config['first_tag_open'] = "<li>";
        // $config['first_tagl_close'] = "</li>";
        // $config['last_tag_open'] = "<li>";
        // $config['last_tagl_close'] = "</li>";
        // /* ends of bootstrap */
        // $this->pagination->initialize($config);
        // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        // $links = $this->pagination->create_links();
        $content = $this->lcustomer->customer_ledger_report_cheque($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    public function customer_ledgerData()
    {
        $start       = $this->input->post('from_date');
        $end         = $this->input->post('to_date');
        $customer_id = $this->input->post('customer_id');
        $content     = $this->lcustomer->customer_ledger($customer_id, $start, $end);
        $this->template->full_admin_html_view($content);
    }

    public function customer_ledgerData_cheque()
    {
        $start       = $this->input->post('from_date');
        $end         = $this->input->post('to_date');
        $customer_id = $this->input->post('customer_id');
        $content     = $this->lcustomer->customer_ledger_cheque($customer_id, $start, $end);
        $this->template->full_admin_html_view($content);
    }


    //Insert Product and upload
    public function insert_customer()
    {

        $user_id = mt_rand(1000,9999999);
        $outlet_id = $this->session->userdata('outlet_id') ? $this->session->userdata('outlet_id') : '';
        // echo "<pre>";
        // print_r($outlet_id . "<br>" . $this->session->userdata('user_id'));
        // exit();

        $data = array(
            'customer_id_two'   => $outlet_id. "-" .$user_id,
            // 'friend_card'   => $this->input->post('friend_card', TRUE),
            'customer_name'   => $this->input->post('customer_name', TRUE),
            'customer_name_bn'   => $this->input->post('customer_name_bn', TRUE),
            'shop_name'   => $this->input->post('shop_name', TRUE),
            'customer_address' => $this->input->post('address', TRUE),
            'address2'        => $this->input->post('address2', TRUE),
            'customer_mobile' => $this->input->post('mobile', TRUE),
            'phone'           => $this->input->post('phone', TRUE),
            'fax'             => $this->input->post('fax', TRUE),
            'contact'         => $this->input->post('contact', TRUE),
            'contact_person'         => $this->input->post('contact_person', TRUE),
            'city'            => $this->input->post('city', TRUE),
            'state'           => $this->input->post('state', TRUE),
            'zip'             => $this->input->post('zip', TRUE),
            'country'         => $this->input->post('country', TRUE),
            'cus_type'         => $this->input->post('cus_type', TRUE),
            // 'discount_customer'=> $this->input->post('discount_customer',TRUE),
            'email_address'   => $this->input->post('emailaddress', TRUE),
            'website'   => $this->input->post('website', TRUE),
            'customer_email'  => $this->input->post('email', TRUE),
            'status'          => 2,
            'create_by'       => $this->session->userdata('user_id'),
            'outlet_id'       => $this->session->userdata('outlet_id')
        );

        $result = $this->db->insert('customer_information', $data);
        $customer_id = $this->db->insert_id();
        //Customer  basic information adding.
        $coa = $this->Customers->headcode();
        if ($coa->HeadCode != NULL) {
            $headcode = $coa->HeadCode + 1;
        } else {
            $headcode = "102030100001";
        }
        $c_acc = $customer_id . '-' . $this->input->post('customer_name', TRUE);
        $createby = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');


        $customer_coa = [
            'HeadCode'         => $headcode,
            'HeadName'         => $c_acc,
            'PHeadName'        => 'Customer Receivable',
            'HeadLevel'        => '4',
            'IsActive'         => '1',
            'IsTransaction'    => '0',
            'IsGL'             => '0',
            'HeadType'         => 'A',
            'IsBudget'         => '0',
            'IsDepreciation'   => '0',
            'customer_id'      => $customer_id,
            'DepreciationRate' => '0',
            'CreateBy'         => $createby,
            'CreateDate'       => $createdate,
        ];

        //Previous balance adding -> Sending to customer model to adjust the data.
        $this->db->insert('acc_coa', $customer_coa);
        $this->Customers->previous_balance_add($this->input->post('previous_balance', TRUE), $customer_id);


        $this->session->set_userdata(array('message' => display('successfully_added')));
        if (isset($_POST['add-customer'])) {
            redirect(base_url('Ccustomer/manage_customer'));
            exit;
        } elseif (isset($_POST['add-customer-another'])) {
            redirect(base_url('Ccustomer'));
            exit;
        } else {
            $this->session->set_userdata(array('error_message' => display('please_try_again')));
            redirect(base_url('Ccustomer'));
            exit;
        }
    }
    public function insert_customer_ecom()
    {

        $url = api_url() . "order/all_customer";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        $records = json_decode($resp);

        $data = array();
        foreach ($records as $r) {

            $data = array(

                'customer_id'   => $r->user_id,
                'customer_name'   => $r->name,
                'customer_mobile'   => $r->phone,
                'zip'   => $r->postal_code,
                'country'   => $r->country,
                'customer_email'  => $r->email,
                'city' => $r->city,
                'customer_address' => $r->address,
                'cus_type' => 2,
            );

            $check_customer = $this->db->select('customer_id')->from('customer_information')->where(array('customer_name' => $r->name, 'customer_mobile' => $r->phone))->get()->row();
            if (!empty($check_customer)) {
                $this->db->where(array('customer_name' => $r->name, 'customer_mobile' => $r->phone));
                $result = $this->db->update('customer_information', $data);
                $customer_id = $check_customer->customer_id;
            } else {
                $result = $this->db->insert('customer_information', $data);
                $customer_id = $this->db->insert_id();
            }


            $coa = $this->Customers->headcode();
            if ($coa->HeadCode != NULL) {
                $headcode = $coa->HeadCode + 1;
            } else {
                $headcode = "102030100001";
            }
            $c_acc = $customer_id . '-' . $r->name;
            $createby = $this->session->userdata('user_id');
            $createdate = date('Y-m-d H:i:s');

            $customer_coa = [
                'HeadCode'         => $headcode,
                'HeadName'         => $c_acc,
                'PHeadName'        => 'Customer Receivable',
                'HeadLevel'        => '4',
                'IsActive'         => '1',
                'IsTransaction'    => '0',
                'IsGL'             => '0',
                'HeadType'         => 'A',
                'IsBudget'         => '0',
                'IsDepreciation'   => '0',
                'customer_id'      => $customer_id,
                'DepreciationRate' => '0',
                'CreateBy'         => $createby,
                'CreateDate'       => $createdate,
            ];


            $check_headCode = $this->db->select('HeadName')->from('acc_coa')->where('HeadName', $c_acc)->get()->row();
            if (!empty($check_headCode)) {
                $this->db->where('HeadName', $c_acc);
                $this->db->update('acc_coa', $customer_coa);
            } else {
                $this->db->insert('acc_coa', $customer_coa);
            }
        }

        $this->session->set_userdata(array('message' => 'Synchronized Successfully'));
        redirect(base_url('Ccustomer/manage_customer'));
    }



    // =================== customer Csv Upload ===============================
    //CSV Customer Add From here
    function uploadCsv_Customer()
    {
        $filename = $_FILES['upload_csv_file']['name'];
        $ext = end(explode('.', $filename));
        $ext = substr(strrchr($filename, '.'), 1);
        if ($ext == 'csv') {
            $count = 0;
            $fp = fopen($_FILES['upload_csv_file']['tmp_name'], 'r') or die("can't open file");

            if (($handle = fopen($_FILES['upload_csv_file']['tmp_name'], 'r')) !== FALSE) {

                while ($csv_line = fgetcsv($fp, 1024)) {
                    //keep this if condition if you want to remove the first row
                    for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
                        $insert_csv = array();
                        $insert_csv['customer_id_two']   = (!empty($csv_line[0]) ? $csv_line[0] : '');
                        $insert_csv['customer_name']   = (!empty($csv_line[1]) ? $csv_line[1] : '');
                        $insert_csv['customer_email']  = (!empty($csv_line[2]) ? $csv_line[2] : '');
                        $insert_csv['emailaddress']    = (!empty($csv_line[3]) ? $csv_line[3] : '');
                        $insert_csv['customer_mobile'] = (!empty($csv_line[4]) ? $csv_line[4] : '');
                        $insert_csv['phone']           = (!empty($csv_line[5]) ? $csv_line[5] : '');
                        $insert_csv['fax']             = (!empty($csv_line[6]) ? $csv_line[6] : '');
                        $insert_csv['contact']         = (!empty($csv_line[7]) ? $csv_line[7] : '');
                        $insert_csv['city']            = (!empty($csv_line[8]) ? $csv_line[8] : '');
                        $insert_csv['state']           = (!empty($csv_line[9]) ? $csv_line[9] : '');
                        $insert_csv['zip']             = (!empty($csv_line[10]) ? $csv_line[10] : '');
                        $insert_csv['country']         = (!empty($csv_line[11]) ? $csv_line[11] : '');
                        $insert_csv['customer_address'] = (!empty($csv_line[12]) ? $csv_line[12] : '');
                        $insert_csv['address2']         = (!empty($csv_line[13]) ? $csv_line[13] : '');
                        $insert_csv['previousbalance'] = (!empty($csv_line[14]) ? $csv_line[14] : '');
                    }



                    //Customer  basic information adding.

                    $customerdata = array(
                        'customer_id_two'    => $insert_csv['customer_id_two'],
                        'customer_name'    => $insert_csv['customer_name'],
                        'customer_address' => $insert_csv['customer_address'],
                        'address2'        => $insert_csv['address2'],
                        'customer_mobile' => $insert_csv['customer_mobile'],
                        'phone'           => $insert_csv['phone'],
                        'fax'             => $insert_csv['fax'],
                        'contact'         => $insert_csv['contact'],
                        'city'            => $insert_csv['city'],
                        'state'           => $insert_csv['state'],
                        'zip'             => $insert_csv['zip'],
                        'country'         => $insert_csv['country'],
                        'email_address'   => $insert_csv['emailaddress'],
                        'customer_email'  => $insert_csv['customer_email'],
                        'status'           => 1,
                        'create_by'        => $this->session->userdata('user_id'),

                    );


                    if ($count > 0) {
                        $this->db->insert('customer_information', $customerdata);

                        $customer_id = $this->db->insert_id();
                        $coa = $this->Customers->headcode();
                        if ($coa->HeadCode != NULL) {
                            $headcode = $coa->HeadCode + 1;
                        } else {
                            $headcode = "102030001";
                        }
                        $c_acc = $customer_id . '-' . $insert_csv['customer_name'];
                        $createby = $this->session->userdata('user_id');
                        $createdate = date('Y-m-d H:i:s');
                        $transaction_id = $this->auth->generator(10);


                        $customer_coa = [
                            'HeadCode'         => $headcode,
                            'HeadName'         => $c_acc,
                            'PHeadName'        => 'Customer Receivable',
                            'HeadLevel'        => '4',
                            'IsActive'         => '1',
                            'IsTransaction'    => '1',
                            'IsGL'             => '0',
                            'HeadType'         => 'A',
                            'IsBudget'         => '0',
                            'IsDepreciation'   => '0',
                            'customer_id'      => $customer_id,
                            'DepreciationRate' => '0',
                            'CreateBy'         => $createby,
                            'CreateDate'       => $createdate,
                        ];
                        // Customer debit for previous balance
                        $cosdr = array(
                            'VNo'            =>  $transaction_id,
                            'Vtype'          =>  'PR Balance',
                            'VDate'          =>  date("Y-m-d"),
                            'COAID'          =>  $headcode,
                            'Narration'      =>  'Customer debit For Transaction No' . $transaction_id,
                            'Debit'          =>  $insert_csv['previousbalance'],
                            'Credit'         =>  0,
                            'IsPosted'       => 1,
                            'CreateBy'       => $this->session->userdata('user_id'),
                            'CreateDate'     => date('Y-m-d H:i:s'),
                            'IsAppove'       => 1
                        );

                        $this->db->insert('acc_coa', $customer_coa);
                        if ($insert_csv['previousbalance'] > 0) {
                            $this->db->insert('acc_transaction', $cosdr);
                        }
                    }
                    $count++;
                }
            }
            $this->db->select('*');
            $this->db->from('customer_information');
            $query = $this->db->get();
            foreach ($query->result() as $row) {
                $json_customer[] = array('label' => $row->customer_name, 'value' => $row->customer_id);
            }
            $cache_file = './my-assets/js/admin_js/json/customer.json';
            $customerList = json_encode($json_customer);
            file_put_contents($cache_file, $customerList);
            fclose($fp) or die("can't close file");
            $this->session->set_userdata(array('message' => display('successfully_added')));
            redirect(base_url('Ccustomer/manage_customer'));
        } else {
            $this->session->set_userdata(array('error_message' => 'Please Import Only Csv File'));
            redirect(base_url('Ccustomer/manage_customer'));
        }
    }

    //customer Update Form
    public function customer_update_form($customer_id)
    {
        $content = $this->lcustomer->customer_edit_data($customer_id);
        $this->template->full_admin_html_view($content);
    }

    //Customer Ledger
    public function customer_ledger($customer_id)
    {
        $content = $this->lcustomer->customer_ledger_data($customer_id);
        $this->template->full_admin_html_view($content);
    }

    //Customer Final Ledger
    public function customerledger($customer_id)
    {
        $content = $this->lcustomer->customerledger_data($customer_id);
        $this->template->full_admin_html_view($content);
    }

    //Customer Previous Balance
    public function previous_balance_form()
    {
        $content = $this->lcustomer->previous_balance_form();
        $this->template->full_admin_html_view($content);
    }

    // customer Update
    public function customer_update()
    {
        $this->load->model('Customers');
        $customer_id = $this->input->post('customer_id', TRUE);
        $old_headnam = $customer_id . '-' . $this->input->post('oldname', TRUE);
        $c_acc = $customer_id . '-' . $this->input->post('customer_name', TRUE);
        $data = array(
            'customer_id_two' => $this->input->post('customer_id_two', TRUE),
            'friend_card' => $this->input->post('friend_card', TRUE),
            'customer_name'   => $this->input->post('customer_name', TRUE),
            'customer_name_bn'   => $this->input->post('customer_name_bn', TRUE),
            'shop_name'   => $this->input->post('shop_name', TRUE),
            'customer_address' => $this->input->post('address', TRUE),
            'address2'        => $this->input->post('address2', TRUE),
            'customer_mobile' => $this->input->post('mobile', TRUE),
            'phone'           => $this->input->post('phone', TRUE),
            'fax'             => $this->input->post('fax', TRUE),
            'contact'         => $this->input->post('contact', TRUE),
            'contact_person'  => $this->input->post('contact_person', TRUE),
            'city'            => $this->input->post('city', TRUE),
            'state'           => $this->input->post('state', TRUE),
            'zip'             => $this->input->post('zip', TRUE),
            'country'         => $this->input->post('country', TRUE),
            'email_address'   => $this->input->post('emailaddress', TRUE),
            'customer_email'  => $this->input->post('email', TRUE),
            'website'  => $this->input->post('website', TRUE),
            'cus_type'  => $this->input->post('cus_type', TRUE),
        );
        $customer_coa = [
            'HeadName'         => $c_acc
        ];
        $result = $this->Customers->update_customer($data, $customer_id);
        if ($result == TRUE) {
            $this->db->where('HeadName', $old_headnam);
            $this->db->update('acc_coa', $customer_coa);
            $this->session->set_userdata(array('message' => display('successfully_updated')));
            redirect(base_url('Ccustomer/manage_customer'));
            exit;
        } else {
            $this->session->set_userdata(array('error_message' => display('please_try_again')));
            redirect(base_url('Ccustomer'));
        }
    }

    // product_delete
    public function customer_delete($customer_id)
    {
        $this->load->model('Customers');
        $invoiceinfo = $this->db->select('*')->from('invoice')->where('customer_id', $customer_id)->get()->num_rows();
        if ($invoiceinfo > 0) {
            $this->session->set_userdata(array('error_message' => 'Sorry !! You can not delete this Customer.This Customer already Engaged in calculation system!'));
            redirect(base_url('Ccustomer/manage_customer'));
        } else {
            $customerinfo = $this->db->select('customer_name')->from('customer_information')->where('customer_id', $customer_id)->get()->row();
            $customer_head = $customer_id . '-' . $customerinfo->customer_name;
            $this->Customers->delete_customer($customer_id, $customer_head);
            $this->Customers->delete_invoic($customer_id);
            $this->session->set_userdata(array('message' => display('successfully_delete')));
            redirect(base_url('Ccustomer/manage_customer'));
        }
    }
    // customer pdf download
    public function customer_downloadpdf()
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Customers');
        $CI->load->model('Web_settings');
        $CI->load->library('pdfgenerator');
        $customer_list = $CI->Customers->customer_list_pdf();
        if (!empty($customer_list)) {
            $i = 0;
            if (!empty($customer_list)) {
                foreach ($customer_list as $k => $v) {
                    $i++;
                    $customer_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $data = array(
            'title'         => display('customer_list'),
            'customer_list' => $customer_list,
            'currency'      => $currency_details[0]['currency'],
            'logo'          => $currency_details[0]['logo'],
            'position'      => $currency_details[0]['currency_position'],
            'company_info'  => $company_info
        );
        $this->load->helper('download');
        $content = $this->parser->parse('customer/customer_list_pdf', $data, true);
        $time = date('Ymdhi');
        $dompdf = new DOMPDF();
        $dompdf->load_html($content);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents('assets/data/pdf/' . 'customer' . $time . '.pdf', $output);
        $file_path = 'assets/data/pdf/' . 'customer' . $time . '.pdf';
        $file_name = 'customer' . $time . '.pdf';
        force_download(FCPATH . 'assets/data/pdf/' . $file_name, null);
    }
    //Export CSV
    public function exportCSV()
    {
        // file name
        $this->load->model('Customers');
        $filename = 'customer_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
        $usersData = $this->Customers->customer_csv_file();
        // file creation
        $file = fopen('php://output', 'w');

        $header = array('CustomerName', 'Email', 'Address', 'Mobile');
        fputcsv($file, $header);
        foreach ($usersData as $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }

    /// Customer Advance Form
    public function customer_advance()
    {
        $CI = &get_instance();
        $CI->load->model('Web_settings');
        $CI->load->model('Settings');
        $bank_list        = $this->Web_settings->bank_list();
        $card_list = $CI->Settings->get_real_card_data();
        $bkash_list        = $CI->Web_settings->bkash_list();
        $nagad_list        = $CI->Web_settings->nagad_list();

        $data = array(
            'bank_list'     => $bank_list,
            'card_list'     => $card_list,
            'bkash_list'    => $bkash_list,
            'nagad_list'    => $nagad_list
        );

        $data['title'] = display('customer_advance');
        $data['customer_list'] = $this->Customers->customer_list_advance();
        $content = $this->parser->parse('customer/customer_advance', $data, true);
        $this->template->full_admin_html_view($content);
    }
    // customer advane insert
    public function insert_customer_advance()
    {
        $CI = &get_instance();
        $CI->load->model('Settings');

        $advance_type = $this->input->post('type', TRUE);
        if ($advance_type == 1) {
            $dr = $this->input->post('amount', TRUE);
            $tp = 'd';
        } else {
            $cr = $this->input->post('amount', TRUE);
            $tp = 'c';
        }

        $createby = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');
        $transaction_id = $this->auth->generator(10);
        $customer_id = $this->input->post('customer_id', TRUE);
        $cusifo = $this->db->select('*')->from('customer_information')->where('customer_id', $customer_id)->get()->row();
        $headn = $customer_id . '-' . $cusifo->customer_name;
        $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
        $customer_headcode = $coainfo->HeadCode;

        $purpose = $this->input->post('Purpose', TRUE);

        $Vtype = 'Advance';
        $VDate = date("Y-m-d");
        $voucher_no = $transaction_id;
        $CreateBy = $this->session->userdata('user_id');

        $customer_accledger = array(
            'VNo'            =>  $transaction_id,
            'Vtype'          =>  'Advance',
            'VDate'          =>  date("Y-m-d"),
            'COAID'          =>  $customer_headcode,
            'Narration'      =>  $purpose,
            'Debit'          => (!empty($dr) ? $dr : 0),
            'Credit'         => (!empty($cr) ? $cr : 0),
            'IsPosted'       => 1,
            'CreateBy'       => $this->session->userdata('user_id'),
            'CreateDate'     => date('Y-m-d H:i:s'),
            'IsAppove'       => 1
        );

        $bkash_id = $this->input->post('bkash_id', TRUE);
        $nagad_id = $this->input->post('nagad_id', TRUE);

        $bank_id = $this->input->post('bank_id_m', TRUE);
        if (!empty($bank_id)) {
            $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id)->get()->row()->bank_name;

            $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
        } else {
            $bankcoaid = '';
        }

        $cc = array(
            'VNo'            =>  $transaction_id,
            'Vtype'          =>  'Advance',
            'VDate'          =>  date("Y-m-d"),
            'COAID'          =>  1020101,
            'Narration'      =>  'Cash in Hand  For ' . $cusifo->customer_name . ' Advance',
            'Debit'          => (!empty($cr) ? $cr : 0),
            'Credit'         => (!empty($dr) ? $dr : 0),
            'IsPosted'       =>  1,
            'CreateBy'       =>  $this->session->userdata('user_id'),
            'CreateDate'     =>  date('Y-m-d H:i:s'),
            'IsAppove'       =>  1
        );

        $bankc = array(
            'VNo'            =>  $transaction_id,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $bankcoaid,
            'Narration'      =>  'Cash in Bank For ' . $cusifo->customer_name . ' Advance',
            'Debit'          => (!empty($cr) ? $cr : 0),
            'Credit'         => (!empty($dr) ? $dr : 0),
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
        );

        if (!empty($bkash_id)) {
            $bkashname = $this->db->select('bkash_no')->from('bkash_add')->where('bkash_id', $bkash_id)->get()->row()->bkash_no;

            $bkashcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'BK - ' . $bkashname)->get()->row()->HeadCode;
        } else {
            $bkashcoaid = '';
        }
        $bkashc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $bkashcoaid,
            'Narration'      =>  'Cash in Bkash For ' . $cusifo->customer_name . ' Advance',
            'Debit'          => (!empty($cr) ? $cr : 0),
            'Credit'         => (!empty($dr) ? $dr : 0),
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,

        );

        if (!empty($nagad_id)) {
            $nagadname = $this->db->select('nagad_no')->from('nagad_add')->where('nagad_id', $nagad_id)->get()->row()->nagad_no;

            $nagadcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'NG - ' . $nagadname)->get()->row()->HeadCode;
        } else {
            $nagadcoaid = '';
        }

        $nagadc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $nagadcoaid,
            'Narration'      =>  'Cash in Nagad For ' . $cusifo->customer_name . ' Advance',
            'Debit'          => (!empty($cr) ? $cr : 0),
            'Credit'         => (!empty($dr) ? $dr : 0),
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,
        );

        $card_id = $this->input->post('card_id', TRUE);
        $card_info = $CI->Settings->get_real_card_data($card_id);

        if (!empty($card_id)) {
            $card_bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $card_info[0]['bank_id'])->get()->row()->bank_name;

            $card_bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $card_bankname)->get()->row()->HeadCode;
        } else {
            $card_bankcoaid = '';
        }
        $cardc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $card_bankcoaid,
            'Narration'      =>  'Cash in Card For ' . $cusifo->customer_name . ' Advance',
            'Debit'          => ((!empty($cr) ? $cr : 0)) - ((!empty($cr) ? $cr : 0) * ($card_info[0]['percentage'] / 100)),
            'Credit'         => ((!empty($dr) ? $dr : 0)) - ((!empty($dr) ? $dr : 0) * ($card_info[0]['percentage'] / 100)),
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,

        );

        $expdebit = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  '40404',
            'Narration'      =>  'Expense Debit for card no. ' . $card_info[0]['card_no'] . ' for Advance of ' . $cusifo->customer_name,
            'Debit'          => (!empty($cr) ? $cr : 0) * ($card_info[0]['percentage'] / 100),
            'Credit'         => (!empty($dr) ? $dr : 0) * ($card_info[0]['percentage'] / 100),
            'IsPosted'       => 1,
            'CreateBy'       => $CreateBy,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );

        // echo '<pre>';
        // print_r($customer_accledger);
        // print_r($bankc);
        // exit();

        $this->db->insert('acc_transaction', $customer_accledger);

        if ($this->input->post('paytype', TRUE) == 4) {
            $this->db->insert('acc_transaction', $bankc);
        }
        if ($this->input->post('paytype', TRUE) == 1) {
            $this->db->insert('acc_transaction', $cc);
        }
        if ($this->input->post('paytype', TRUE) == 3) {
            $this->db->insert('acc_transaction', $bkashc);
        }
        if ($this->input->post('paytype', TRUE) == 5) {
            $this->db->insert('acc_transaction', $nagadc);
        }
        if ($this->input->post('paytype', TRUE) == 6) {
            $this->db->insert('acc_transaction', $cardc);
            $this->db->insert('acc_transaction', $expdebit);
        }
        redirect(base_url('Ccustomer/customer_advancercpt/' . $transaction_id . '/' . $customer_id));
    }


    public function customer_advancercpt($receiptid = null, $customer_id = null)
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lcustomer');
        $content = $CI->lcustomer->advance_details_data($receiptid, $customer_id);
        $this->template->full_admin_html_view($content);
    }
}
