<?php

class Turma extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'turmas';

    protected $fillable = array('id', 'nome');

}