<?phpini_set('display_errors', 1);error_reporting(E_ALL);$home_url="http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";$page = isset($_GET['page']) ? $_GET['page'] : 1;// init quantity records in page$records_per_page = 5;$from_record_num = ($records_per_page * $page) - $records_per_page;