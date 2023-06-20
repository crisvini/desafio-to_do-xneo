<?php

class Components
{
    public static function head($title)
    {
        return '
                <!-- jquery -->
                <script src="./lib/node_modules/jquery/dist/jquery.min.js"></script>
                <!-- bootstrap icons -->
                <link rel="stylesheet" href="./lib/node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
                <!-- poppins font -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
                <!-- swal2 -->
                <script src="./lib/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
                <link rel="stylesheet" href="./lib/node_modules/sweetalert2/dist/sweetalert2.min.css">
                <!-- datatables -->
                <script src="./lib/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
                <link rel="stylesheet" type="text/css" href="./lib/node_modules/datatables.net-dt/css/jquery.dataTables.min.css">
            
                <link rel="stylesheet" href="./css/styles.css?' . time() . '">
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>' . $title . ' - ToDoList</title>';
    }
}
