<?php

namespace App\Trait;

use Illuminate\Http\Request;

trait uploadImage
{
    public function storeImage(Request $request,$name, $fileName)
    {
        if (!$request->file($name)) {
            return redirect()->back()->withErrors(['Image Not Found!']);
        } else {
            $file = $request->file($name)->getClientOriginalName();
            $path = $request->file($name)->storeAs($fileName, $file,'uploadImage');
        }
        return $path;
    }
}
