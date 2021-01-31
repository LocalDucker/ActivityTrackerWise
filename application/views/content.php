<div class="wrapper">
    <div class="header">
        <div class="alert alert-primary text-center " role="alert">
            Activity Tracker
        </div>

        <div class="info-block">

            <form action="/record" method="post">
            <div class="row w-100 justify-align-center ml-0">
            <input class="form-control col" type="datetime-local" name="start_time" required>
                <input class="form-control col" type="datetime-local" name="finish_time" required>
                <input class="form-control col " type="number" min="0" name="distance" required placeholder="meters">
                <select class="form-control col" name="activity_type_id" id="" required>
                    <?php foreach($types as $type): ?>
                    <option selected value="<?=$type['id'] ?>"><?=$type['type'] ?></option>
                    <?php endforeach ?>
                </select>
                <button class="form-control mt-3 mb-3">Save</button>
            </div>
                
            </form>
        </div>
    </div>


    <div class="content">
        <div class="row">
            <div class="col-7">
                <div class="info-left">
                    <table class="table">
                        <tbody>
                        <?php
                            foreach($generalInfo as $item):
                        ?>
                        <tr>
                            <th scope="row"><?=$item['date']?></th>
                            <td><?=$item['type']?></td>
                            <td><?=$item['distance']?> m</td>
                            <td><?=$item['timeactivity']?></td>
                            <td><?=$item['averagespeed']?> km/h </td>
                            </tr>
                        <?php endforeach ?>
                        
                        
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-5">
                <div class="top"></div>
                <div class="bottom"></div>
            </div>
        </div>
       
       
    </div>


 </div>


