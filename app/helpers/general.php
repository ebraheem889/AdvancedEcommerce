<?php


function get_folder()
{

    return app()->getLocale() === 'ar' ? 'css-rtl' : 'css';

}

function uploadImage( $image)
{

    $file_name = time() .'.'. $image->getClientOriginalName() ;
    $path = public_path() .'\assets\images\brands';
    $image->move($path,$file_name);

//    $image->store('/', $folder);
//    $filename = $image->hashname();
    return $path.'\\'.$file_name;

}
