
<?php
    try {
       $hostname=’localhost’;
         $dbname=’papamamaDB’;
         $username=’pmadmin’;
         $password=’papamama’;
        $db=new PDO(‘mysql:host=localhost;dbname=papamamaDB;charset=utf8′,’pmadmin’,’papamama’);
        $stmt=$db->prepare(“INSERT INTO test (name) VALUES (:col2)”);
        // 첫번째열은 auto_increment 이므로 삽입할 필요가 없다.
        $stmt->bindParam(‘:col2′,$data2);
        $data2=”Kelvin”;
        $stmt->execute();
        $db=null;
    }

    catch(Exception $e) {
        echo $e->getMessage();
    }
?> 
