<?php

function error_message(){
    return response()->json(["information"=>"The page not fount"],404);
}
function error_message1(){
    return response()->json(["information"=>"The url or parameters is wrong"],404);
}
function error_message2(){
    return response()->json(["error message"=>"there is issue in url or the fileds that you would like to update"],404);
}
function error_message3(){
    return response()->json(["error message"=>"you dont have this permission"],405);
}





 function notFoundMessage1()
{
    return 'Source not found';
}