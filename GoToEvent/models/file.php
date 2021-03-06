<?php namespace models;

/**
 *
 */
class File
{
     private $id;
     private $name;
     private $value;
     private $temp;
     private $size;

     function __construct($id = '', $key = '', $val = '', $tmp = '', $siz = '')
     {
          $this->id = $id;
          $this->name = $key;
          $this->value = $val;
          $this->temp = $tmp;
          $this->size = $siz;
     }

     public function getID() {
          return $this->id;
     }
     public function getValue() {
          return $this->value;
     }
     public function getName() {
          return $this->name;
     }
     public function getTempName() {
          return $this->temp;
     }
     public function getSize() {
          return $this->size;
     }

     public function jsonSerialize() {
          return [
               'id' => $this->id,
               'name' => $this->name,
               'value' => $this->value,
               'temp' => $this->temp,
               'size' => $this->size
          ];
     }

}
