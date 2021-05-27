<?php

function view($viewPath, array $data =[])
{
    foreach($data as $key=>$value)
    {
        $$key = $value;
    }
    require ('./Views'.'/'.str_replace('.','/',$viewPath) .'.php');
}