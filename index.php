<?php
include('functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atom.trecke</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :disabled {
            background-color: gray !important;
            border: none !important;
        }

        .btn-col {
            width: 38px;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <header class="row">
            <div class="col-xs-6">
                <a data-mode="restor" id="btn-mode" href="#">Enter <span id="lbl-mode"> Restore </span> Mode</a>
            </div>
            <div class="col-xs-6 teet-right">

                Total Time : <span id="tally"></span>
            </div>
        </header>

        <div class="row">
            <form id="form-new">
                <div class="col-xs-10">
                    <input id="task" name="task" class="form-control" placeholder="Enter new task name ..." />
                </div>
                <div class="col-xs-2">
                    <button type="submit" name="submit" class="btn btn-block btn-success"><?= faIcon('play'); ?></button>
                </div>
            </form>
        </div>

        <table class="table table-bordered">

            <thead>

                <tr>
                    <th>Task</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Time</th>
                    <th colspan="2">Controls</th>
                </tr>

            </thead>
            <tbody id="log">

            </tbody>
        </table>
    </div>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- App Script -->
    <script src="atom.tracker.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>