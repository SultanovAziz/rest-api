<?phpinclude_once '../config/DataBase.php';include_once '../config/Product.php';header("Access-Control-Allow-Origin: *");header("Content-Type: application/json; charset=UTF-8");$dataBase = new DataBase();$db = $dataBase->getConnection();$product = new Product($db);$stmt = $product->read();$num = $stmt->rowCount();if ($num>0){    //product array    $products_arr=array();    $products_arr["records"]=array();    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){        extract($row);        $product_item = array(                "id" => $id,                "name" => $name,                "description" => html_entity_decode($description),                "price" => $price,                "category_id" => $category_id,                "category_name" => $category_name        );        array_push($products_arr["records"], $product_item);    }    //return http response code    http_response_code(200);    return json_encode($products_arr);}else{    http_response_code(404);    echo json_encode(array("message" => "Товары не найдены."), JSON_UNESCAPED_UNICODE);}