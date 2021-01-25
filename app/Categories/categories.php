<?php


namespace App\Categories;


use http\Env\Request;

interface categories
{

    public  function index($type);
    public  function create($type);
    public  function update($request ,$id , $type);
    public  function store($request ,$type);
    public  function edit($id,$type);

}
