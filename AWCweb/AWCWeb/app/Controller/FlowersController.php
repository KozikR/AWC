<?php

class FlowersController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('flowers', $this->Flower->find('all'));
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid flower'));
        }
        $this->loadModel('Watering_time');
        if ($this->request->is('post')) {
//                echo "<pre>";
//                print_r($this->request->data);
//                echo '</pre>';
            //Save data
            $success = 1;
            foreach ($this->request->data['wt'] as $item):
                $success = $success & $this->Watering_time->save($item);
            endforeach;
            if($this->Flower->saveAll($this->request->data) and $success)
                $this->Session->setFlash(__('Data save.'));
            else
                $this->Session->setFlash(__('Unable to save data.'));
            //Add new row
            if(array_key_exists('Add', $this->request->data)) {
                $this->Watering_time->create();
                if ($this->Watering_time->save(array('Watering_time' => array('flower_id' => $this->request->data['Add'])))) {
                    $this->Session->setFlash(__('Row added.'));
                }
                else
                    $this->Session->setFlash(__('Unable to add row.'));
            }
            else if(array_key_exists('Del', $this->request->data)) {
                $this->Watering_time->delete($this->request->data('Del'));
            }
        }

        $flower = $this->Flower->findById($id);
        if (!$flower) {
            throw new NotFoundException(__('Invalid flower'));
        }
        $this->set('flower', $flower);


    }
}