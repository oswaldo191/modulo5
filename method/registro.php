<?php

	function listEstudianteid($list)
	{
	    $count = count($list);
	    $listEstudiante = $list[$count - 1];

	    return $listEstudiante;
	}

	function searchEstudiante($list, $property, $value)
	{
	    $filter = [];

	    foreach ($list as $item) {

	        if ($item[$property] == $value) {
	            array_push($filter, $item);
	        }
	    }

	    return $filter;
	}



	function indexEstudiante($list, $property, $value)
	{
	    $index = 0;
	    $i = 0;
	    foreach ($list as $item) {

	        if ($item[$property] == $value) {
	            $index = $i;
	            break;
	        }
	        $i++;
	    }
	    return $index;
	}

?>