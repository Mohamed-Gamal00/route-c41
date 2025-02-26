<?php
/*
csrf
تزوير الطلب عبر المواقع
(Cross-site request forgery)
هو هجوم يجبر المستخدم النهائي على تنفيذ إجراءات غير مرغوب فيها على تطبيق ويب

request بيكون فيه كود الكود ده بيتبعت لما اجي اعمل  create input hidden بت   csrf في لارافيل هو عامل فنكشن اسمها
form لو زي بعض يبقي هو اتاكد انك مسجل من خلال   generate مع كود هو بيعمله matching الكود ده بيعمله

 form في اخر ال @csrf ده عن طريق اني بضيف  csrf بعمل ال
 لما بضيفها بيقوم هو ضايف
 <input type="hidden" name="_token" value="K7LY2XqNKFfrUfQr2maeoxC9R9Rf0CPBtXpBu6LY" autocomplete="off">    </form>

*/


/*
                             middleware

                         laravel life cycle

make request -------> public folder -----> file index -----> bootstrap folder ---> make autoload to all files
                                                                                                            ↓
                                                                                                            ↓
check middelware exist or not  <--  go to route <-- see service provider <-- open kernal <-- bootstrap folder



dd($data);  vardump and die() معناها


-------------------------------------Database-------------------------------------

                                ORM & Query Builder

                 جوا الداتا بيز    CRUD operation    من خلالهم اقدر اني اعمل

                         بستخدمها لما يكون عندي جداول جاهزة


ORM -> can create db  model بستخدمه جوا ال
Query Builder -> not create db


                                           Model

  create tables بستخدمها لما احتاج اني اعمل

  Migrations بعمل
  1- create db
  2- make migrations
        to create table
                Schema::create('table_name', function (Blueprint $table) {
                                    attributes
                    $table->id();
                    $table->timestamps();
                    $table->string("name");
                });


        make migrations -> table لل  drop من غير ما اعمل  new column واضيف  table انا ممكن استخدمها عشان اعمل تعديل علي
        php artisan make:migration add_column_column-name --table = table name

  3- make migrate     -> في الداتا بيز create  و يعمله  migrations عشان يرن ال



-------------------------------------------------------------------------------------------------------

 1- Eloquent  عشان ابدأ  اتعامل مع ال داتا بيز في مصطلح عندي اسمه

 2- model =======> يكافئ جدول في الداتا بيز

 3- كل جدول في الداتا بيز ليه موديل

 4- category يبقي اسم الموديل بتاعه  categories اسم الموديل لازم يكون مفرد يعني لو عندي جدول اسمه

  protected $fillable = [ عشان احط القيم بتاعتها في الداتابيز insert اللي عاوز اعملها  columns بحط فيها اسماء ال ];
  protected $hidden = [ مش بتظهر لما اجي اعمل استدعاء ليها columnال ]


*/
