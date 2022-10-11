<?php

// retun an fa icon 
function faIcon($i_CodeOfIcon)
{
    $icon = '<i class="fa fa-' . $i_CodeOfIcon . '"></i>';
    return $icon;
}

// make the date look nicer 
function dateUnixFormt($i_DateInUnix)
{
    return  date('M j Y g:i A', $i_DateInUnix);
}
function endDataUnixFormt($i_DateInUnix)
{
    if ($i_DateInUnix != "") {
        return dateUnixFormt($i_DateInUnix);
    }
}
// 
function totalTime($i_Second)
{
    $h = floor(($i_Second / 60) / 60);
    $m = round(($i_Second / 60) - ($h * 60));
    return  $h . ' hrs ' . $m . ' mins';
}

function build($data,)
{
    if (is_array($data)) {
        foreach ($data as $task) :
            if ($task['status'] ==  1) : ?>
                <tr>
                    <td><?= $task['name'] ?></td> <!-- name of task -->
                    <td><?= dateUnixFormt($task['data_start']) ?></td> <!-- start time in unix  task -->
                    <td><?= endDataUnixFormt($task['data_end']) ?></td> <!-- end time in unix  task -->
                    <td><?php
                        $isTaskNEnd = $task['data_end'] == "";
                        if ($isTaskNEnd) {
                            $totalTimeInS = time() - $task['data_start'];
                            echo totalTime($totalTimeInS);
                        } else {
                            $totalTimeInS = $task['data_end'] - $task['data_start'];
                            echo totalTime($totalTimeInS);
                        }

                        ?></td> <!-- status of  task -->
                    <td class="btn-col"><button data-id="<?= $task['id'] ?>" class="btn btn-primary btn-stop" <?= $task['data_end'] != "" ? 'disabled' : ''   ?>><?= faIcon('stop'); ?></button></td>
                    <td class="btn-col"><button data-id="<?= $task['id'] ?>" class="btn btn-danger btn-remove"><?= faIcon('times'); ?></button></td>

                </tr>
            <?php endif ?>
            <?php endforeach;
    }
}

function restor($data)
{
    if (is_array($data)) {
        foreach ($data as $task) :
            if ($task['status'] ==  2) : ?>
                <tr>
                    <td><?= $task['name'] ?></td> <!-- name of task -->
                    <td><?= dateUnixFormt($task['data_start']) ?></td> <!-- start time in unix  task -->
                    <td><?= endDataUnixFormt($task['data_end']) ?></td> <!-- end time in unix  task -->
                    <td><?php
                        $isTaskNEnd = $task['data_end'] == "";
                        if ($isTaskNEnd) {
                            $totalTimeInS = time() - $task['data_start'];
                            echo totalTime($totalTimeInS);
                        } else {
                            $totalTimeInS = $task['data_end'] - $task['data_start'];
                            echo totalTime($totalTimeInS);
                        }

                        ?></td> <!-- status of  task -->
                    <td class="btn-col"><button data-id="<?= $task['id'] ?>" class="btn btn-danger btn-restor"><?= faIcon('refresh'); ?></button></td>

                </tr>
            <?php endif ?>
<?php endforeach;
    }
}

function tally($data)
{
    $time = time();

    $coutAllTime = 0;
    if (is_array($data)) {
        foreach ($data as $task) {
            if ($task['status'] ==  1) {
                $endTime = ($task['data_end'] == "") ? $time : $task['data_end'];
                $taskTime =  $endTime - $task['data_start'];
                $coutAllTime += $taskTime;
            }
        }
    }
    echo totalTime($coutAllTime);
}

function newTesk($data, $name)
{
    $time = time();
    $data[$time]['id'] = $time;
    $data[$time]['name'] = $name;
    $data[$time]['data_start'] = $time;
    $data[$time]['data_end'] = "";
    $data[$time]['status'] = 1;
    seve($data);
}

function stop($id, $data)
{
    $data[$id]['data_end'] = time();
    seve($data);
}

function remove($id, $data)
{
    $data[$id]['status'] = 2;
    seve($data);
}
function  restorStatus($id, $data)
{
    $data[$id]['status'] = 1;
    seve($data);
}



function seve($data)
{
    $json = json_encode($data);
    $file = fopen("data.json", "w");
    fwrite($file,  $json);
    fclose($file);
}
