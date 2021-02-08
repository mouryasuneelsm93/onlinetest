

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    
</head>
<body>

<?php
include_once("header.php");
?>
 <div class="container-fluid">
    
<table class="table table-striped text-primary " id="table_id">
    <thead style="font-size:30px;color:#5BB349;">
    <tr>
        <th>Id</th>
        <th>Language</th>
        <th>Marks</th>
    </tr>
    </thead>
</table>

 </div>

 <?php
include_once("footer.php");
?>

</body>
</html>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#table_id').DataTable({
        ajax:'helper.php?action=getuserdata',
        dataSrc:'data',
        columns: [
            { data: 'id' },
            { data: 'category' },
            { data: 'marks' }
            
        ],
    });
} );
</script>