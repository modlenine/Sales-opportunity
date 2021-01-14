<?php
class convertfn{
    public $ci;
    function __construct()
    {
        $this->ci = &get_instance();
        date_default_timezone_set("Asia/Bangkok");
    }
    public function gci()
    {
        return $this->ci;
    }
}

function getcon()
{
    $obj = new convertfn();
    return $obj->gci();
}

function conDateTimeFromDb($datetime)
{
    $datetimeIn = date_create($datetime);
    return date_format($datetimeIn,"d/m/Y H:i:s");
}

function conDateFromDb($datetime)
{
    $datetimeIn = date_create($datetime);
    return date_format($datetimeIn,"d/m/Y");
}

function conPrice($priceinput)
{
    $oriprice = str_replace("," , "" , $priceinput);
    return $oriprice;
}





?>