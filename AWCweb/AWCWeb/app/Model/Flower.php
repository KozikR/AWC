<?php
class Flower extends AppModel {
    public $hasMany = array(
        'watering_time' => array(
            'className' => 'watering_time',
            'dependent' => true
        ),
        'past_watering' => array(
            'className' => 'past_watering',
            'dependent' => true,
            'order' => 'Past_watering.created DESC',
            'limit' => '1'
        ),
        'humidity' => array(
            'className' => 'humidity',
            'dependent' => true,
            'order' => 'Humidity.created DESC',
            'limit' => '1'
        )
    );

}