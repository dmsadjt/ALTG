<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //function for posting images
    protected function postImage($req, $filename, $path, $input, $input_column)
    {
        if ($file = $req->file($filename)) {
            $dest = public_path($path);
            $name = $req->file($filename)->getClientOriginalName();
            $extension = $req->file($filename)->getClientOriginalExtension();
            $nameonly = pathinfo($name, PATHINFO_FILENAME);
            $storename = $nameonly . '_' . time() . '.' . $extension;
            $file->move($dest, $storename);
            $input->$input_column = $storename;
        }
    }

    protected function postImageRet($req, $filename, $path)
    {
        if ($file = $req->file($filename)) {
            $dest = public_path($path);
            $name = $req->file($filename)->getClientOriginalName();
            $extension = $req->file($filename)->getClientOriginalExtension();
            $nameonly = pathinfo($name, PATHINFO_FILENAME);
            $storename = $nameonly . '_' . time() . '.' . $extension;
            $file->move($dest, $storename);
            return $storename;
        }
    }

    //function for updating images
    protected function updateImg($req, $filename, $path, $input, $input_column)
    {
        if ($file = $req->file($filename)) {
            $dest = public_path($path);
            $name = $req->file($filename)->getClientOriginalName();
            $extension = $req->file($filename)->getClientOriginalExtension();
            $nameonly = pathinfo($name, PATHINFO_FILENAME);
            $storename = $nameonly . '_' . time() . '.' . $extension;
            $file->move($dest, $storename);
            return $storename;
        } else {
            return $input->$input_column;
        }
    }

    //function for selecting gear slot
    protected function selectSlot($counter, $select, $type, $arr)
    {
        if ($select[$type . $arr . $counter] != '') {
            $counter++;
            return $this->selectSlot($counter, $select, $type, $arr);
        } else {
            $ret = $type . $arr . $counter;
            return $ret;
        }
    }

}
