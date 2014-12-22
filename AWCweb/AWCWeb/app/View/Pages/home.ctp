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

    <div class="jumbotron">
    </div>
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
        <?php for($i = 0; $i < 4; $i++){ ?>
        <div class="col-sm-12 col-md-12 col-lg-4 ">
            <div class="media thumbnail">

                 <img src="http://127.0.0.1/AWC/img/images/sorrel.jpg" class="media-object img-rounded pull-left" alt="Sorrel" style="width: 40%"/>
                <div class="media-body">
                    <h2>Sorrel</h2>

                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <span class="glyphicon glyphicon-tint"></span> Humidity <span class="badge">25 %</span>
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="glyphicon glyphicon-calendar"></span> Last watering <span class="badge">14:30 12.07.2014</span>
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="glyphicon glyphicon-bell"></span> Next watering <span class="badge">Less then 40 %</span>
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="glyphicon glyphicon-check"></span> State <span class="badge">OK</span>
                        </a>
                    </div>

                </div>

                <p class="btn-group-justified"><a href="#" class="btn btn-success"><span class="glyphicon glyphicon-cog"></span> Change settings</a></p>
            </div>

        </div>
        <?php } ?>
    </div>