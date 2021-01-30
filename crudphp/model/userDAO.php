<?php

class UserDao {

    public static function findById($id) {
        return self::findOneBy("id", $id);
    }

    public static function create($user) {
        $pdo = Database::connect(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO crudPhp_user (name,firstname,birthDate,tel, email, pays,comment, metier,url) values(?, ?, ?, ? , ? , ? , ? , ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(
            [
                $user->getName(),
                $user->getFirstname(), 
                $user->getBirthDate(), 
                $user->getTel(), 
                $user->getEmail(),
                $user->getPays(),
                $user->getComment(), 
                $user->getMetier(), 
                $user->getUrl()
            ]
        );
        Database::disconnect();
    }

    public static function update($user) {
        $pdo = Database::connect(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE crudPhp_user SET name = ?,firstname = ?,birthDate = ?,tel = ?, email = ?, pays = ?, comment = ?, metier = ?, url = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(
            [
                $user->getName(),
                $user->getFirstname(), 
                $user->getBirthDate(), 
                $user->getTel(), 
                $user->getEmail(),
                $user->getPays(),
                $user->getComment(), 
                $user->getMetier(), 
                $user->getUrl(), 
                $user->getId()
            ]
            );
    
        Database::disconnect();
    }

    public static function delete($user) {
        $pdo=Database::connect(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM crudPhp_user  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($user->getId()));
        Database::disconnect();
    }

    public static function findOneBy($fieldName, $value) {
        $pdo = Database ::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM crudPhp_user where $fieldName = ?";
        $q = $pdo->prepare($sql);
        $q->execute([$value]);
        $user = null;
        if ($q->rowCount() != 0) {
            $data = $q->fetch(PDO::FETCH_ASSOC);
            $user = new User();
            $user->setParametersFromArray($data);
        }
        
        return $user;
    }

    public static function exists($fieldName, $value) {
        $pdo = Database ::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM crudPhp_user where $fieldName = ?";
        $q = $pdo->prepare($sql);
        $q->execute([$value]);
        $result = false;
        
        if ($q->rowCount() != 0) {
            $result = true;
        }

        return $result;
    }

    public static function getFieldValue($fieldName, $id) {
        $pdo = Database ::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM crudPhp_user where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute([$id]);
        $value = null;
        if ($q->rowCount() != 0) {
            $data = $q->fetch(PDO::FETCH_ASSOC);
            $value = $data[$fieldName];
        }
        
        return $value;
    }

    public static function findAll() {
        
    }
}

?>