<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\authentication;
use App\Http\Controllers\image;
use App\Http\Controllers\member;
use App\Http\Controllers\role;
use App\Http\Controllers\technical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::group(["middleware"=>"api_password"],function(){


    Route::post("/login",[authentication::class,"login"]);
    Route::post("refreshtoken",[authentication::class,"refreshtoken"]);

    Route::group(["middleware"=>"auth:api"],function(){


        Route::post("/logoutadmin",[authentication::class,"logoutadmin"]);
        Route::get("/getalladmin",[admin::class,"getalladmin"]);
        Route::post("/createadmin",[admin::class,"create"]);
        Route::post("/updateadmin",[admin::class,"update"]);
        Route::get("/getmyadmininfo",[admin::class,"getmyadmininfo"]);
        Route::post("/deleteadmin",[admin::class,"delete"]);

        




        Route::post("/createrole",[role::class,"create"]);
        Route::post("/updaterole",[role::class,"update"]);
        Route::get("/getrole",[role::class,"getrole"]);
        Route::post("/deleterole",[role::class,"delete"]);
        Route::get("/getallrole",[role::class,"getallrole"]);



        Route::post("/createtechnical",[technical::class,"create"]);
        Route::post("/updatetechnical",[technical::class,"update"]);
        Route::get("/gettechnical",[technical::class,"gettechnical"]);
        Route::post("/deletetechnical",[technical::class,"delete"]);
        Route::get("/getalltechnical",[technical::class,"getalltechnical"]);


        Route::post("/uploadimages",[image::class,"upload"]);
        Route::post("/uploadimage",[image::class,"uploadone"])->middleware("checkAllToken");



        Route::post("/createmember",[member::class,"store"]);
        Route::post("/updatemember",[member::class,"update"]);
        Route::get("/getuser",[member::class,"getuser"]);
        Route::get("getalluser",[member::class,"getalluser"]);
        Route::post("/deleteuser",[member::class,"delete"]);

    });


    Route::group(["middleware"=>"auth:user"],function(){

        // Route::post("/logout",[authentication::class,"logout"]);

    });


});