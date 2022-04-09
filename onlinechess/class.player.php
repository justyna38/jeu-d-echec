<?php
class OnlineChess_Player
{
	public $color;
	public $player;
	public $pieces;

	public function __construct($color, $player)
	{
		$this->color = $color;
		$this->player = $player;
		$this->pieces = [];
	}


	/*
	 * Ajoute la pièce passée en paramètre au plateau dans le tableau $this->piece
	 * Si la piece est un Roi (méthode $piece->isKing), l'index  du tableau est 'king' ($this->pieces['king'])
	 * L'index est numerique pour les autres pieces
	 * */

	public function addPiece($piece)
	{
		if ($piece->isKing() == TRUE) {
			return $this->pieces['king'] = $piece;
		} else {
			return $this->pieces[] = $piece;
		}
	}
}
