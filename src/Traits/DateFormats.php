<?php
namespace NoFw\Traits;

trait DateFormats{

	public function dateToServer($date){

		$d = \DateTime::createFromFormat('d/m/Y', $date);
		return $d->format('Y-m-d');
	}

	public function dateToClient($date){

		$d = \DateTime::createFromFormat('Y-m-d', $date);

		return $d->format('d/m/Y');
	}
}