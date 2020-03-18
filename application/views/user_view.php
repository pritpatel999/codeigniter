<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User View</title>
</head>
<body>
    <h3>
    <?php
    // echo $result ;
    ?>

    <table border style="text-align:center; padding:5px; border:5px ridge green;" cellpadding="10">
    <tr>
    <th>id</th>
    <th>name</th>
    <th>password</th>
    </tr>
    
    <?php
    
    foreach ($result as $content) {
        echo "<tr>";
        echo "<td> $content->id </td>";
        echo "<td> $content->username </td>";
        echo "<td> $content->password  </td>";
        echo "</tr>";
    }
    
    
    
    ?>
    </table>

    </h3>


</body>
</html>