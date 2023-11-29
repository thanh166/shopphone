<?php
class Connect extends PDO{
    public function __construct(){
        parent::__construct("mysql:host=localhost;dbname=web2", 'root', '',
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}
class Controller {
    // Print data to the screen
    function login($MaND){
        $db = new Connect;
        $user = $db -> prepare('SELECT * FROM nguoidung Where MaND = "'.$MaND.'"  ORDER BY MaND');
        $user -> execute();
        while($userInfo = $user -> fetch(PDO::FETCH_ASSOC)){
        echo '<script> checkDangNhapGoogle("'.$userInfo["Email"].'"); </script>';
        }

    }
    // check if user is logged in
    function checkUserStatus($MaND, $sess){
        $db = new Connect;
        $user = $db -> prepare("SELECT MaND FROM nguoidung WHERE MaND=:MaND AND session=:session");
        $user -> execute([
            ':MaND'       => intval($MaND),
            ':session'  => $sess
        ]);
        $userInfo = $user -> fetch(PDO::FETCH_ASSOC);
         if(!$userInfo["MaND"]){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    // function for generating password and login session
    function generateCode($length){
		$chars = "vwxyzABCD02789";
		$code = ""; 
		$clen = strlen($chars) - 1;
		while (strlen($code) < $length){ 
			$code .= $chars[mt_rand(0,$clen)];
		}
		return $code;
    }

    
    function insertData($data){
        $db = new Connect;
        $checkUser = $db -> prepare("SELECT * FROM nguoidung WHERE Email=:email");
        $checkUser -> execute(['email' => $data['email']]);
        $info = $checkUser -> fetch(PDO::FETCH_ASSOC);
        if(!$info["MaND"]){
            $session = $this -> generateCode(10);
            $insertNewUser = $db -> prepare("INSERT INTO nguoidung (Ho,Ten,Email,DiaChi,TaiKhoan,MatKhau, maQuyen, trangThai,session) VALUES (:l_name,:f_name,:email,:DiaChi,:TaiKhoan,:password, :maQuyen, :trangThai,:session)");
            $insertNewUser -> execute([
                ':f_name'   => $data["givenName"],
                ':l_name'   => $data["familyName"],
                ':email'    => $data["email"],
                ':DiaChi' => "Da Nang",
                ':TaiKhoan' => $data["email"],
                ':password' => "123",
                ':session'  => $session,
                'maQuyen'  => 1,
                ':trangThai'  => 1
            ]);
            if($insertNewUser){
                setcookie("MaND", $db->lastInsertId(), time()+60*60*24*30, "/", NULL);
                setcookie("sess", $session, time()+60*60*24*30, "/", NULL);    
                header('Location: index.php');
                exit();
            }
            else{
                return "Error inserting user!";
            }
        }else{
            setcookie("MaND", $info['MaND'], time()+60*60*24*30, "/", NULL);
            setcookie("sess", $info["session"], time()+60*60*24*30, "/", NULL);
            header('Location: index.php');
            exit();
        }
    }
}
?>