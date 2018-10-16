<?php
namespace models;


require_once ('event.php');
require_once ('type_square.php');


class Event_place
{

	private $capacity;
	private $description;
	private $id_calendar;
	private $id_event_place;

	function __construct($capacity='',$description='',$id_calendar='',$id_event_place)
	{
		$this->capacity = $capacity;
		$this->description = $description;
		$this->id_calendar = $id_calendar;
		$this->id_event_place = $id_event_place;
	}

	public function getCapacity()
	{
		return $this->capacity;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setCapacity($capacity)
	{
		$this->capacity = $capacity;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

}
?>