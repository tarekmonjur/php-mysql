<?php

function flip() {
	return ( 0 == rand(0,1) ) ? 'H' : 'T';
}

echo flip();
