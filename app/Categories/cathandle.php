<?php


namespace App\Categories;


class cathandle
{


    public static function index($type, categories $categories)
    {

        return $categories->index($type);
    }

    public static function create($type, categories $categories)
    {

        return $categories->create($type);
    }

    public static function update($request, $id, $type, categories $categories)
    {

        return $categories->update($request, $id, $type);
    }

    public static function edit($id, $type, categories $categories)
    {

        return $categories->edit($id, $type);
    }


    public static function store($request, $type, categories $categories)
    {

        return $categories->store($request, $type);
    }


}
