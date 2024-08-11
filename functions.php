<?php

require 'db.php';

class feedback_user{
    public function insert($name,$email,$age,$feedback,$services,$comments,$document){
        try {
        $sql = "INSERT INTO feedback_user (name, email, age, feedback, services, comments, document) VALUES (:NAME, :EMAIL, :AGE, :FEEDBACK, :SERVICES, :COMMENTS, :DOCU_DIR)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':NAME' => $name,
            ':EMAIL' => $email,
            ':AGE' => $age,
            ':FEEDBACK' => $feedback,
            ':SERVICES' => $services,
            ':COMMENTS' => $comments,
            ':DOCU_DIR' => $document,
        ]);
        return true;
        }catch (PDOException $e) {
            return false;
        }

    }
    public function update($id,$name,$email,$age,$feedback,$services,$comments,$document){
        try {
            $sql = "UPDATE feedback_user SET name = :NAME, email = :EMAIL, age= :AGE, feedback = :FEEDBACK, services = :SERVICES, comments = :COMMENTS,document=:DOCU_DIR WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':NAME' => $name,
                ':EMAIL' => $email,
                ':AGE' => $age,
                ':FEEDBACK' => $feedback,
                ':SERVICES' => $services,
                ':COMMENTS' => $comments,
                ':DOCU_DIR' => $document,
                ':id' => $id,
            ]);
        return true;
        }catch (PDOException $e) {
            return false;
        }

    }
    public function delete($id){
        try {
            $sql = "DELETE FROM feedback_user SET delete_ts = now() WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':NAME' => $name,
                ':EMAIL' => $email,
                ':AGE' => $age,
                ':FEEDBACK' => $feedback,
                ':SERVICES' => $services,
                ':COMMENTS' => $comments,
                ':DOCU_DIR' => $document,
                ':id' => $id,
            ]);
        return true;
        }catch (PDOException $e) {
            return false;
        }

    }
}
    