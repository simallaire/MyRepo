<?php

	function bonjour(){
		$user = User::find(1);
		echo "hello "+ $user->name +"\n";
	}


	foreach ($argv AS $arg){
    function_exists($arg) AND call_user_func($arg);
	}