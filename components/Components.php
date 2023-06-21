<?php

class Components
{
    public static function head($title, $page)
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
                <!-- sortable -->
                <script src="./lib/node_modules/sortablejs/sortable.min.js"></script>

                <link rel="stylesheet" href="./css/cleanHtml.css?' . time() . '">
                <link rel="stylesheet" href="./css/swal2.css?' . time() . '">
                ' . ($page == 'list' ? ('<link rel="stylesheet" href="./css/datatables.css?' . time() . '">') : '') . '
                <link rel="stylesheet" href="./css/styles.css?' . time() . '">
                <script src="./js/' . $page . '.js?' . time() . '"></script>
                <script src="./js/common.js?' . time() . '"></script>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>' . $title . ' - ToDo</title>';
    }

    public static function nav($page, $buttonText)
    {
        return '
                <div class="nav-links">
                    <div>
                        <a href="/desafio-to_do-xneo" class="text-5 bold fs-2 logo">ToDo&nbsp;<i class="bi bi-card-checklist"></i></a>
                    </div>
                </div>
                <div>
                    <button class="button-1" onclick="window.location.href=' . "'" . $page . "'" . '">' . $buttonText . '</button>
                </div>
                ';
    }
}
