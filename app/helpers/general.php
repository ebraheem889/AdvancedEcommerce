<?php


function get_folder()
{

    return app()->getLocale() === 'ar' ? 'css-rtl' : 'css';
}

function uploadImage($image)
{

    $file_name = time() . '.' . $image->getClientOriginalName();
    $path = public_path() . '\assets\images\brands';
    $image->move($path, $file_name);

    return $file_name;
}

// to upload products images
 function uploadImage2($folder, $image)
 {
     $image->store('/', $folder);
     $filename = $image->hashName();
     return  $filename;
 }
