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

  4- عندي table لو احتجت اني اعدل علي
              php artisan make:migration update_in_name_table
              $table->string("name",100); before edit
              $table->string("name",255)->change(); after edit

  5- عندي table لو احتجت اني اضيف  عمود جديد علي
              php artisan make:migration update_to_tname_table
              $table->string("column_name",255)




-------------------------------------------------------------------------------------------------------

 1- Eloquent  عشان ابدأ  اتعامل مع ال داتا بيز في مصطلح عندي اسمه

 2- model =======> يكافئ جدول في الداتا بيز

 3- كل جدول في الداتا بيز ليه موديل

 4- category يبقي اسم الموديل بتاعه  categories اسم الموديل لازم يكون مفرد يعني لو عندي جدول اسمه

  protected $fillable = [ عشان احط القيم بتاعتها في الداتابيز insert اللي عاوز اعملها  columns بحط فيها اسماء ال ];
  protected $hidden = [ مش بتظهر لما اجي اعمل استدعاء ليها columnال ]





  ---------------------------------------------------storages---------------------------------------
  المكان اللي بخزن فيه الصور بتاعتي

  putfile اسمها srorage لارافيل موفرة لنا ميثود بتسهل علينا رفع الصور لل

  Storage::putFile("folder-name", $data['image']);
  Storage::putFile("categories", $data['image']);

  اللي عندي وعشان انقلها من ملف الاستوريدج  public  الصور عندي عشان اقدر ارفعها واشوفها لازم تكون في ملف ال
  بستخدم الامر
   php artisan storage:link
   اللي بيعمل نسخة من الاستوريدج اللوكال

   بس عشان الكلام ده يتم برضك لازم اعدل علي ملفات المشروع
   .env من ملف ال
   بحولها من
   FILESYSTEM_DISK=local
   ل
   FILESYSTEM_DISK=public

   config->filesystem ومن ملف ال
   بحولها من
   'default' => env('FILESYSTEM_DISK', 'local'),
   ل
   'default' => env('FILESYSTEM_DISK', 'public'),

*/
