<?php
namespace App\Controller;
use App\Controller\AppController;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
public function index()
{
//die('test');
    $this->set('myname', "Julien Falconnet");
    $this->loadModel('Fighters');
	$figterlist=$this->Fighters->find('all');
	pr($figterlist->toArray());

	$this->loadModel('Fighters');
	$figterlist=$this->Fighters->find('all');
	pr($figterlist->toArray());
	
	$res=$this->Fighters->test();
	$this->set("test",$res);

	
}
public function login()
{
//die('test');
}
public function fighter()
{
	$this->set('sortie', TRUE);
//die('test');
}
public function sight()
{
	$this->loadModel('Fighters');
	$fig=$this->Fighters->allFighters();
	$this->loadModel('Surroundings');
	$sur=$this->Surroundings->arene();
	$this->set("allFighters",$fig);
	$this->set("arene", $sur);
}
public function diary()
{
//die('test');
}
public function appFighter()
{
	
}
}

?>