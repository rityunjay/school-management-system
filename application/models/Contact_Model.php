<?php
class Contact_Model extends CI_Model {

    // Constructor of the model, load the email library
    public function __construct()
    {
        // Load email library
        $this->load->library('email'); 
    }

    // Prepare and send the message
    public function sendMessage()
    {
        // Set email parameters (sender, recipients ...)
        $this->email->from('user@server.name', 'Human readable name');
        $this->email->reply_to($this->input->post('email'));
        $this->email->to('recipient@example.com','Human readable recipient name');
        $this->email->subject('[My site contact] '.$this->input->post('title'));

        // Prepare data to be inserted in template
        $data=array(    'email'     => $this->input->post('email'),
                        'message'   => $this->input->post('message')
                    );

        // Load an email template view
        $message = $this->load->view('emails/contact', $data, TRUE);
        $this->email->message($message);

        // Send the e-mail and manage errors
        try
        {
            $ret = $this->email->send();
            if ($ret)
                $this->session->set_flashdata('msg-success', 'Your message has been sent.');
            else
                $this->session->set_flashdata('msg-danger', "Something wrong happened while sending your message.");
        }
        catch(Exception $e)
        {
            $this->session->set_flashdata('msg-danger', "Something wrong happened whil sending your message (".$e->getMessage().")");
        }
    }
}