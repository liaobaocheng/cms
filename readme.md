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
1.看个教程 https://www.youtube.com/watch?v=pXbEcGUtHgo






