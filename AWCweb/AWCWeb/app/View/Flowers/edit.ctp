<div class="row">

    <div class="media thumbnail">
        <?= $this->Html->image('images/'.$flower['Flower']['photo'], array('alt' => 'Photo', 'style' => 'width: 20%', 'class' => 'media-object img-rounded pull-left')); ?>
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
                    <span class="glyphicon glyphicon-check"></span> State <span class="badge">OK</span>
                </a>
            </div>

            <h3>Settings:</h3>
            <form role="form-horizontal" method="post" action="">

                <div class="form-group">
                    <label class="control-label col-xs-3">Watering:</label>
                    <div class="col-xs-3">
                        <label class="radio-inline">
                            <input <?= ($flower['Flower']['type'] == 'H')?'checked':' ' ?> type="radio" name="Flower[type]" value="H"> when humidity level is low
                        </label>
                    </div>

                    <div class="col-xs-3">
                        <label class="radio-inline">
                            <input  <?= ($flower['Flower']['type'] == 'T')?'checked':' ' ?> type="radio" name="Flower[type]" value="T"> on schedule
                        </label>
                    </div>
                </div>
                <div class="col-xs-12"></div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Minimum humnameity level:</label>
                    <div class="col-xs-2">
                        <div class="input-group">
                            <input type="number" class="form-control" name="Flower[humidity_watering]" value="<?=$flower['Flower']['humidity_watering'] ?>" >
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                </div>
                <?php
                    $dayNames = array(
                        'Sunday',
                        'Monday',
                        'Tuesday',
                        'Wednesday',
                        'Thursday',
                        'Friday',
                        'Saturday',
                    );
                ?>
                <div class="col-xs-12" >
                    <table class="table table-hover .texter-center">
                        <tr>
                            <th>Volume</th>
                            <th>Time</th>
                            <?php foreach($dayNames as $dayName):
                            echo '<th>'.$dayName.'</th>';
                            endforeach; ?>
                            <th>Delete</th>

                        </tr>

                        <?php
                        $j = 0;
                        foreach($flower['watering_time'] as $time): ?>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="wt[<?=$j?>][Watering_time][volume]" value="<?=$time['volume'] ?>" >
                                        <span class="input-group-addon">ml</span>
                                    </div>
                                </td>
                                <td> <input type="time" class="form-control" name="wt[<?=$j?>][Watering_time][time]" maxlength="8" size="8" value="<?=$time['time'] ?>"></td>
                                <?php for($i=0; $i<7; $i++){ ?>
                                <td>
                                    <input type='hidden' value='0' name="wt[<?=$j?>][Watering_time][<?=$dayNames[$i]?>]">
                                    <input type="checkbox" value="1" <?= ($time[$dayNames[$i]])?'checked':' '?> name="wt[<?=$j?>][Watering_time][<?=$dayNames[$i]?>]" >
                                </td>
                                <?php } ?>
                                <input type="hidden" name="wt[<?=$j?>][Watering_time][id]" value="<?=$time['id']?>">
                                <td>  <button type="submit" name="Del" class="btn btn-danger" value="<?=$time['id'] ?>"><span class=" glyphicon glyphicon-trash"></span></button></td>


                            </tr>

                        <?php
                        $j++;
                        endforeach; ?>
                    </table>
                </div>
                    <div class="form-group">
                        <div class="col-xs-2">



                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-offset-5 col-xs-8">
                            <input type="hidden" name="Flower[id]" value="<?=$flower['Flower']['id']?>">
                            <button type="submit" name="Add" class="btn btn-primary" value="<?=$flower['Flower']['id'] ?>"><span class="glyphicon glyphicon-indent-left" ></span> Add row </button>
                            <button name="Flower[id]" value="<?=$flower['Flower']['id']?>" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save" > </span> Save</button>
                        </div>
                    </div>
               </form>
        </div>


    </div>

</div>


