<?php

namespace bin\models;

use db\Connect;


class User extends Connect {

    public $id;
    public $email;
    public $phone;
    public $name;
    public $password;
    public $register_date;


    public function create($columns = [], $values = []){
        $conn = $this->connect();

        $insert = "INSERT INTO user (";

        $insert .= implode(',', $columns);

        $valuesString = '';

        foreach ($values as $index => $value) {
            if ($index > 0) {
                $valuesString .= ",'$value'";
            } else {
                $valuesString .= "'$value'";
            }
        }
        $insert .= ") VALUES (" . $valuesString . ")";

        if ($conn->query($insert) === TRUE) {
            return $conn->lastInsertId();
        } else {
            return $conn->lastInsertId();
        }
    }

    public function update(){

    }

    public function findOne($id){
        $conn = $this->connect();

        $select = "SELECT * FROM user where id = {$id}";

        $res = $conn->query($select);

        return $res->fetch(\PDO::FETCH_OBJ);
    }

    public function findAll(){

    }

    public function remove(){

    }

    public function findByAttribute($attribute, $value){
        $conn = $this->connect();

        $select = "SELECT count(*) as existed FROM user where {$attribute} = '{$value}'";
        $res = $conn->query($select);

        return $res->fetch(\PDO::FETCH_OBJ);
    }


}