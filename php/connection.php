<?php 
    $serverName = "DESKTOP-FDC3EDF";
    $connectionOptions = [
        "Database"=>"quanly",
        "Uid"=>"sa",
        "PWD"=>"Trunghai@19",
        "MultipleActiveResultSets"=>true,
        "CharacterSet"  => 'UTF-8'
    ];
    $conn = sqlsrv_connect($serverName, $connectionOptions);