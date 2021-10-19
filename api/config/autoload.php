<?php
	date_default_timezone_set('Asia/Bangkok');
	header('Access-Control-Allow-Origin: *');
	
	include_once("class.database.php");						// ดึง class สำหรับการติดต่อฐานข้อมูล
	
	//ตัวเชื่อมต่อlocalhost
	define("host", "localhost");
	define("user", "id17792737_recycle_app");
	define("pass", "Za,0937849273");
	define("dbname", "id17792737_recycle_db");

	//ตัวเชื่อมต่อข้อมูลของโดนเเมนเรา
	//define("host", "406168039.student.yru.ac.th");
	//define("user", "406168039_db");
	//define("pass", "0937849273");
	//define("dbname", "406168039_db");
	
	$DATABASE = new Database(host, user, pass, dbname);		// ตัวแปรสำหรับการเชือมต่อข้อมูลในฐานข้อมูล
	$POSTDATA = file_get_contents("php://input");
	$REQUEST = json_decode($POSTDATA);						// ตัวแปรสำหรับดึงข้อมูลจากแอพที่ส่งข้อมูล
	
     //ฟั่งชั่น  ดักจับคนสมัคแล้วไม่กรอกข้อมูลกดบันทึกให้ไม่สำเร็จ
	function CheckValue($value, $msg) {
        if( $value=="" ) {
            echo json_encode(array(
                "status"=>false,
                "msg"=>$msg
            ));
            exit();
        }
    }