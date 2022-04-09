<?php

// Cette classe représente les cases du plateau
class OnlineChess_Square {
	public $x;
	public $y;
	public $piece;
	public $controlled_by;

	function __construct($x, $y) {
		$this->x = $x;
		$this->y = $y;
		$this->piece = false;
		$this->controlled_by = [];
	}
	
	// Cette methode est un getter qui renvoie la propriete $this->piece
	public function hasPiece() :bool  {
		if (is_bool($this->piece) === TRUE) {
			return $this->piece;
		} else {
			if (empty($this->piece)) {
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}
}

?>