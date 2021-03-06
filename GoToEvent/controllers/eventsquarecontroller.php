<?php

namespace controllers;
//use daos\daoList\ArtistDao as Dao;
use models\Event_square;
use models\Square_type;
use daos\daodb\EventSquareDao as Dao;
use daos\daodb\SquareTypeDao as DaoSquareType;
use controllers\CalendarController as C_Calendar;

use controllers\ViewsController as C_View;

class EventSquareController
{
    protected $dao; // es una instancia de la Dao lista, para poder comunicarme con ella
    private $viewController;

    public function __construct()
    {
        $this->dao=Dao::getInstance(); // esto se instancia en el router
        $this->viewController = new C_View;
    }

    public function index() // funcion por defecto de cada controladora
    {
      $this->viewController->index();
    }

    public function create($square_type='', $price='',$availble_quantity='',$id_calendar='')
    {
        $quantity = 0;
        $list = $this->readAllByCalendarId($id_calendar);
        if(is_array($list)){
            foreach ($list as $key => $event_square) {
            $quantity = $quantity + $event_square->getAvailableQuantity();
            }
        }

        $calendarController = new C_Calendar();

        $capacity = $calendarController->readEventPlaceByCalendarId($id_calendar);

        $quantity = $quantity + $availble_quantity;

        $remainder = $availble_quantity;

        if($quantity > $capacity){
          $this->viewController->addEventSquareToCalendar();
          echo "<script>alert('Se paso de la capacidad del estadio')</script>";
        } else {
          // $squaretype vine en formato de id, y hay q pasarlo a objeto
          $daoSquareType = DaoSquareType::getInstance();

          $square_type = $daoSquareType->readById($square_type);
          // hay q hacer new porq devuelve en forma de arreglo
          $square_type = new Square_type($square_type[0]->getDescription(),$square_type[0]->getId());


          $event_square = new Event_square($price,$availble_quantity,$remainder,$square_type,$id_calendar);

          //$flag = $this->dao->create($artist);
          $this->dao->create($event_square);

          /*if($flag){
              echo "Artista creado" . "<br><br>";
          } else {
              echo "No se pudo crear el artista" . "<br><br>";
          }*/
          $this->viewController->addEventSquareToCalendar();
        }




    }

    public function readAll()
    {
        $list = $this->dao->readAll();

        if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
        }

        return $list;
    }

    public function readAllByCalendarId($id_calendar)
    {
        $list = $this->dao->readAllByCalendarId($id_calendar);

        if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
        }

        return $list;
    }

    public function delete($dni)
    {

        $this->dao->delete($dni);

        $this->viewController->viewEventSquaresAdmin();
    }

    public function readEventSquareById($id_event_square)
    {
      $event_square = $this->dao->read($id_event_square);

      return $event_square;
    }

    public function update($event_square,$availble_quantity)
    {
      $this->dao->update($event_square->getId(),$availble_quantity);
    }

} ?>
