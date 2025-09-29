<?php

namespace App\Traits;


use Illuminate\Support\Facades\DB;
/**
 * Traits implementation of menu for the backend model.
 * they are user access info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2023-08-20-08-20
 */
trait UserAccessTraits
{
    public function userAccessFunction($id = null)
    {
        $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $menuSlug = $uriSegments[1];
        if (!empty(auth()->user()->user_types)) {
            $user_type = auth()->user()->user_types;
//            $id = auth()->user()->id;
            $getMenuId = DB::table('backend_menu')->where('slug', $menuSlug)->first();
            $menuId = (!empty($getMenuId->id))?$getMenuId->id:$id;
            $accessData = DB::table('access_menu')->where('menu_id', $menuId)->where('user_type', $user_type)->first();
            return $accessData;
        } else {
            return 0;
        }
    }

    public function generateRandomString($supplier_name, $length = 4) : string
    {
        $spName = strtoupper(mb_substr($supplier_name, 0, 2));
        $characters = '0123456789ABCDEFGHI';
//        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $spName . '-' . $randomString;
    }

    public function generateRandomItemCode($supplierName, $brandName, $categoryName, $lastCode): string
    {
        $spName = strtoupper(mb_substr($supplierName, 0, 2));
        $brandName = strtoupper(mb_substr($brandName, 0, 2));
        $catName = strtoupper(mb_substr($categoryName, 0, 2));
        $code=explode("-",$lastCode);
        $code = !empty($lastCode) ? $code[1] + 1 : 5000;
        return $spName . $brandName . $catName . '-' . $code;
    }

    public function random_token(): string
    {
        $y = date("Y");
        $d = date("d");
        $m = date("m");
        $h = date("HsN");
        $yr = substr($y, -2);
        $invoiceno = $yr . $m . $d . '0000';
        return $invoiceno;
    }

}
