<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>


    <div class="row">
        <?php $panel= "col-md-3 " ?>
        <div class="<?=$panel?>" >
            <div class="panel panel-success ">
                <div class="panel-heading">
                    <h3 class="panel-title">Status</h3>
                </div>
                <div class="panel-body">The server successfully processed the request.</div>
            </div>
        </div>

        <div class="<?=$panel?>" >
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Watering</h3>
                </div>
                <div class="panel-body">The server successf</div>
            </div>
        </div>

        <div class="<?=$panel?>" >
            <div class="panel panel-info ">
                <div class="panel-heading">
                    <h3 class="panel-title">Water comsumption</h3>
                </div>
                <div class="panel-body">The client should continue with its request.</div>
            </div>
        </div>

        <div class="<?=$panel?>" >
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Temperature</h3>
                </div>
                <div class="panel-body">The server is temporarily unable to handle the request.</div>
            </div>
        </div>

        <div class="clearfix "></div>
    </div>

    <div class="row">
        <?php foreach ($flowers as $flower): ?>
        <div class="col-sm-12 col-md-12 col-lg-6 ">
            <div class="media thumbnail">
                <?= $this->Html->image('images/'.$flower['Flower']['photo'], array('alt' => 'Photo', 'style' => 'width: 40%', 'class' => 'media-object img-rounded pull-left')); ?>
<!--                 <img src="http://127.0.0.1/AWC/img/images/sorrel.jpg" class="media-object img-rounded pull-left" alt="Sorrel" style="width: 40%"/>-->
                <div class="media-body">
                    <h2><?=$flower['Flower']['name']?></h2>

                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <span class="glyphicon glyphicon-tint"></span> Humidity <span class="badge"><?= $flower['humidity'][0]['humidity']  ?> %</span>
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="glyphicon glyphicon-calendar"></span> Last watering <span class="badge"><?= $flower['past_watering'][0]['created'] ?></span>
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="glyphicon glyphicon-bell"></span> Next watering <span class="badge">

                            <?php
                            if(strcmp($flower['Flower']['type'], 'H') == 0){
                                echo 'Less then  '.$flower['Flower']['humidity_watering'].' %';
                            }
                            else{//if  ($flower['Flower']['type'] == "T"){
                                /*TODO find next watering date*/
                                $min_date = 0;
//                                $today = date('w', time());
//                                foreach($flower['watering_time'] as $time) {
//
//                                }
                                echo 'Test'.$flower['watering_time']['0']['Monday'];
                             }
                            ?>
                            </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="glyphicon glyphicon-check"></span> State <span class="badge">OK</span>
                        </a>
                    </div>

                </div>

                <p class="btn-group-justified">
                    <a href="<?=$this->Html->url(array('controller' => 'flowers', 'action' => 'edit', $flower['Flower']['id']))?>"
                        class="btn btn-success">
                        <span class="glyphicon glyphicon-cog"></span>Settings
                    </a>
                </p>
            </div>

        </div>
        <?php endforeach; ?>


    </div>
    <pre>
<?php //  print_r($flowers) ?>
        </pre>
<?php unset($flowers); ?>