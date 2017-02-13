<?php
namespace NoFw\Traits;

trait NumberFormat{
	public function format($number){
		return number_format($number, 2, '.','');
	}
}