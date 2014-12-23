<?php
//API for communication with LocalPanel
class ApiController extends AppController
{
    public $helpers = array('Html', 'Form');

    public function index()
    {
        $this->layout = 'ajax'; //Poor data, without layout
        $this->set('data', ""); //Init data
            $password = 'inGQIJdFm?pE2&V8z#Pq@M=gH@c$Fw'; //the same as in LocalPanel
        if ($this->request->is('post')) {   //check if there are POST data

            //authorisation,
            if (array_key_exists('Ask', $this->request->data)) {
                if (strcmp(crypt($password, $this->request->data['Ask']['Salt']), $this->request->data['Ask']['Pass']) != 0)
                    throw new NotFoundException(__('Authorisation failed'));
            } else
                throw new NotFoundException(__('No data'));

            //create respons
            if(strcmp($this->request->data['Ask']['Query'] , 'Get') == 0){
                $this->loadModel('Flower');
                $this->set('data', $this->Flower->find('all'));
            } else if(strcmp($this->request->data['Ask']['Query'] , 'AddState') == 0){
                $this->loadModel('State');
                $this->State->create();
                if($this->State->saveAll($this->request->data['State']))
                    $this->set('data','Data save.');
                else
                    $this->set('data', 'Unable to save data.');
            } else if(strcmp($this->request->data['Ask']['Query'] , 'AddHumidity') == 0){
                $this->loadModel('Humidity');
                $this->Humidity->create();
                if($this->Humidity->saveAll($this->request->data['Humidity']))
                    $this->set('data','Data save.');
                else
                    $this->set('data', 'Unable to save data.');
            } else if(strcmp($this->request->data['Ask']['Query'] , 'addPast_watering') == 0){
                $this->loadModel('Past_watering');
                $this->Past_watering->create();
                if($this->Past_watering->saveAll($this->request->data['Past_watering']))
                    $this->set('data','Data save.');
                else
                    $this->set('data', 'Unable to save data.');
            }
        } else
            $this->set('data', 'Error');
    }
}
