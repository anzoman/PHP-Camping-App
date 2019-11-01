<?php
class databaseClass
{
    public static function getAllCamps()
    {
        try {
            $db = getDB();
            $statement = $db->prepare("SELECT * FROM kampi;");
            $statement->execute();
            $data = $statement->fetchAll();
            $db = null;
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function getCamps($naziv = "", $cena = 100, $kraj = "")
    {
        try {
            $filteredCamps = databaseClass::getAllCamps();
            $naziv = trim(strtolower($naziv));
            $kraj = trim(strtolower($kraj));

            if (isset($naziv) && !empty($naziv)) {
                foreach($filteredCamps as $key => $kamp){
                    if(strpos(trim(strtolower($kamp['naziv'])), $naziv) === false) {
                        unset($filteredCamps[$key]);
                    }
                }
            }

            if (isset($kraj) && !empty($kraj)) {
                foreach($filteredCamps as $key => $kamp){
                    if(strpos(trim(strtolower($kamp['kraj'])), $kraj) === false) {
                        unset($filteredCamps[$key]);
                    }
                }
            }

            if (isset($cena) && !empty($cena)) {
                foreach($filteredCamps as $key => $kamp){
                    if(intval($kamp['cena']) > intval($cena)) {
                        unset($filteredCamps[$key]);
                    }
                }
            }

            foreach ($filteredCamps as $key => $kamp) {
                $filteredCamps[$key]['name'] = DatabaseClass::getUserById($kamp['user_id'])['name'];
            }

            return json_encode($filteredCamps);
        } catch (PDOException $e) {
            return json_encode([]);
            // echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function getUserById($user_id)
    {
        try {
            $db = getDB();
            $statement = $db->prepare("SELECT * FROM users WHERE uid = :user_id;");
            $statement->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $statement->execute();
            $data = $statement->fetch();
            $db = null;
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function getKampById($kamp_id)
    {
        try {
            $db = getDB();
            $statement = $db->prepare("SELECT * FROM kampi WHERE id = :kamp_id;");
            $statement->bindParam(":kamp_id", $kamp_id, PDO::PARAM_INT);
            $statement->execute();
            $data = $statement->fetch();
            $db = null;
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function getCampsAddedByUser($user_id)
    {
        try {
            $db = getDB();
            $statement = $db->prepare("SELECT * FROM kampi WHERE user_id = :user_id;");
            $statement->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $statement->execute();
            $data = $statement->fetchAll();
            $db = null;
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function getAllReservationsForUser($user_id)
    {
        try {
            $db = getDB();
            $statement = $db->prepare("SELECT * FROM rezervacije WHERE user_id = :user_id;");
            $statement->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $statement->execute();
            $data = $statement->fetchAll();
            $db = null;
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function getMnenjaForCamp($kamp_id)
    {
        try {
            $db = getDB();
            $statement = $db->prepare("SELECT * FROM mnenja WHERE kamp_id = :kamp_id;");
            $statement->bindParam(":kamp_id", $kamp_id, PDO::PARAM_INT);
            $statement->execute();
            $data = $statement->fetchAll();
            $db = null;
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function getMnenjaForUser($user_id)
    {
        try {
            $db = getDB();
            $statement = $db->prepare("SELECT * FROM mnenja WHERE user_id = :user_id;");
            $statement->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $statement->execute();
            $data = $statement->fetchAll();
            $db = null;
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function insertNewCamp($naziv, $opis, $cena, $kraj, $slika, $user_id)
    {
        try {
            $db = getDB();
            $statement = $db->prepare("INSERT INTO kampi (naziv, opis, cena, kraj, slika, user_id) 
                                            VALUES (:naziv, :opis, :cena, :kraj, :slika, :user_id);");
            $statement->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $statement->bindParam(":naziv", $naziv, PDO::PARAM_STR);
            $statement->bindParam(":opis", $opis, PDO::PARAM_STR);
            $statement->bindParam(":cena", $cena, PDO::PARAM_INT);
            $statement->bindParam(":kraj", $kraj, PDO::PARAM_STR);
            $statement->bindParam(":slika", $slika, PDO::PARAM_STR);
            $statement->execute();
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function insertNewReservation($user_id, $kamp_id, $od, $do, $cena)
    {
        try {
            $db = getDB();
            $statement = $db->prepare("INSERT INTO rezervacije (user_id, kamp_id, od, do, cena) 
                                            VALUES (:user_id, :kamp_id, :od, :do, :cena);");
            $statement->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $statement->bindParam(":kamp_id", $kamp_id, PDO::PARAM_INT);
            $statement->bindParam(":od", $od, PDO::PARAM_STR);
            $statement->bindParam(":do", $do, PDO::PARAM_STR);
            $statement->bindParam(":cena", $cena, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function insertNewMnenje($user_id, $kamp_id, $mnenje)
    {
        try {
            $db = getDB();
            $statement = $db->prepare("INSERT INTO mnenja (user_id, kamp_id, mnenje) VALUES (:user_id, :kamp_id, :mnenje);");
            $statement->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $statement->bindParam(":kamp_id", $kamp_id, PDO::PARAM_INT);
            $statement->bindParam(":mnenje", $mnenje, PDO::PARAM_STR);
            $statement->execute();
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public static function deleteCampById($kamp_id)
    {
        try {
            $db = getDB();
            $statement = $db->prepare("DELETE FROM kampi WHERE id = :kamp_id;");
            $statement->bindParam(":kamp_id", $kamp_id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }
}
