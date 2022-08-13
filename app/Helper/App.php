<?php

use App\Models\Book;
use App\Models\Info;
use App\Models\Offer;
use App\Models\User;

if (!function_exists('websiteInfo')) {
    function websiteInfo($key)
    {
       $info=Info::where('option',$key)->first();
        if($info){
            if($info->type=='image'){
                 return $info->value != null ? asset('storage/info/'.$info->value ) : null;
            }
            return $info->value;
        }
        return false;
    }

}
if (!function_exists('countCustomer')) {
    function countCustomer()
    {
       $Customer=User::where('type','teacher')->get();
       return count($Customer);
    }

}

if (!function_exists('countUsers')) {
    function countUsers()
    {
       $Users=User::where('type','!=','admin')->get();
       return count($Users);
    }

}
if (!function_exists('countOffers')) {
    function countOffers()
    {
       $Users=Offer::where('active',1)->get();
       return count($Users);
    }

}
if (!function_exists('countAllOffers')) {
    function countAllOffers()
    {
       $Users=Offer::all();
       return count($Users);
    }

}
if (!function_exists('booksStatus')) {
    function booksStatus($status)
    {
       $data=Book::where('status',$status)->get();
       return count($data);
    }

}
if (!function_exists('allBooks')) {
    function allBooks()
    {
       $data=Book::all();
       return count($data);
    }

}

function responseSuccess($data = [], $msg = null, $code = 200)
{
    return response()->json([
        "success" => true,
        "message" => $msg,
        "data" => $data
    ], 200);
}

function responseFail( $error_msg = null , $code = 400, $result = null)
{
    return response()->json([
        "message" => $error_msg,
        "errors" => $result,
        "code"=>$code
    ], 400);
}

function responseValidation($errors = null, $code = 403)
{
    return response()->json([
        "status" => false,
        "errors" => $errors,
    ], 403);
}
