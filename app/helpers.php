<?php

if (!function_exists('render_input')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function render_input($type, $name,$value)
    {
        return BsForm::$type($name)->value($value);
    }
}

if (! function_exists('form_cancel')) {
    /**
     * @param        $cancel_to
     * @param        $title
     * @param string $classes
     *
     * @return mixed
     */
    function form_cancel($cancel_to, $title, $classes = 'btn btn-danger btn-sm')
    {
        return html()->a($cancel_to, $title)->class($classes);

    }
}

if (! function_exists('form_submit')) {
    /**
     * @param        $title
     * @param string $classes
     *
     * @return mixed
     */
    function form_submit($title, $classes = 'btn btn-success btn-sm pull-right')
    {
        return html()->submit($title)->class($classes);
    }
}

function getImagePath($request) {
    $file = $request->file('image');
    $name = '/images/' . time() . $file->getClientOriginalName();
    $file->move('images', $name);

    return $name;

}

function deletePic($path){
    unlink(public_path() . $path);
}




