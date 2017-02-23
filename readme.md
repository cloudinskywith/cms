### 0.初始化项目
1.composer create-project laravel/laravel OwnCMS 
2.npm install 
3.npm install element-ui -S

### 1.开始项目
1.art make:auth 
2.art migrate 
3.art key:generate 

### 2.开始后台权限
1.art make:controller DashboardController 
```
// web.php
Route::group(['prefix'=>'admin'],function(){
    Route::get('/dashboard','DashboardController@index');
});
```

2.art make:migration add_admin_to_user_table 
```
class AddAdminToUserTable extends Migration
{
    public function up()
    {
        Schema::table('users',function(Blueprint $table){
           $table->integer('is_admin')->after('password')->default(0);
        });
    }

    public function down()
    {
        Schema::table('users',function(Blueprint $table){
            $table->dropColumn(['is_admin']);
        });
    }
}
```
3.art make:middleware CheckAdmin
>搞一个middleware，只有当is_admin=1时才可以进入后台页面，否则重定向
```
// Middleware/CheckAdmin
class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->is_admin === 1){
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}

// Kernal.php
class Kernal extend HttpKernal{
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        ...
        'checkadmin'=>\App\Http\Middleware\CheckAdmin::class,
    ];
}

// web.php
Route::group(['prefix'=>'admin','middleware'=>['checkadmin']],function(){
    Route::get('/dashboard','DashboardController@index');
});
```

**这样只有管理员才能进入后台，这个算是最简单的权限系统吧。。。 **

### 3.开始后台UI
0.打算手动写模板，锻炼自己的css能力
1.完成footer

1.看个教程 https://www.youtube.com/watch?v=pXbEcGUtHgo


### 4.开始后台逻辑
1,控制器
art make:controller NewsController --resource
art make:controller BlogsController --resource 
art make:controller BannersController --resource 

2.Model和migration
art make:model New -m
art make:model Blog -m 
art make:model Banner -m 

3.art migrate 

4.CRUD（先实现文章和新闻的，逻辑类似）

### 5.CRUD 
1.使用Form和HTML
composer require "laravelcollective/html":"^5.3.0"

2.集成富文本编辑器和图片上传
https://github.com/UniSharp/laravel-filemanager 再手动集成tinymce https://www.tinymce.com/docs/get-started/localize-your-language/

### 6.图片浏览
1.Model和Migration
php artisan make:model Image -m
2.Schema
```
public function up()
   {
      Schema::create('images', function(Blueprint $table)
      {
         $table->increments('id');
         $table->string('file');
         $table->string('caption');
         $table->text('description');
         $table->timestamps();
      });
   }

public function down()
   {
      Schema::dropIfExists('images');
   }
```
3.Migration
php artisan migrate
4.Controller



