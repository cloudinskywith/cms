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

### 5.富文本编辑器
npm install --save vue2-editor
https://github.com/davidroyer/vue2-editor
```
<template>
    <div id="edit-news">
        <div class="form-group">
            <label for="title">新闻标题</label>
            <input type="text" id="title" name="title"  class="form-control" v-model="newsTitle">
        </div>
        <div class="form-group">
            <label for="content">新闻内容</label>
            <!--<textarea name="content" id="content"  class="form-control"></textarea>-->
            <vue-editor
                    :editor-toolbar="customToolbar"
                    :editor-content="newsContent"
                    @editor-updated="handleUpdatedContent"
                    @save-content="handleSavingContent"
                    button-text="保存新闻">
            </vue-editor>

        </div>
    </div>
</template>

<script>
    import { VueEditor } from 'vue2-editor'
    export default{
        data(){
            return{
                newsContent:null,
                newsTitle:'',
                customToolbar:[
                    ['bold','italic','underline'],
                    [{'list':'ordered'},{'list':'bullet'}],
                    ['image','code-block']
                ]
            }
        },
        methods:{
            handleSavingContent(value){
                console.log(value);
                //1.将newsTitle和newsContent传递给后台
                //2.入库成功后跳转到index页面
                
            },
            handleUpdatedContent(value){
                //监听变更事件
            }
        },
        components:{
            VueEditor
        }
    }
</script>

<style>
    .save-button {
        color: #fff;
        padding: .5em 1em;
        background-color: rgba(53, 73, 94, 0.85);
        text-decoration: none;
        border-radius: 2px;
        cursor: pointer;
        font-weight: 900;
        transition: background-color .2s ease;
        margin: 1em 0;
        float: left;
    }

    .save-button:hover {
        background-color: #35495e;
    }
</style>
```

### 6.数据入库
anyway,一次入库算是成功了。
```
// 发送请求
                axios
                    .post('/admin/news/',{
                        newsTitle:this.newsTitle,
                        newsContent:value
                    })
                    .then(function(response){
                        console.log(response);
                    })
                    .catch(function(error){
                        console.log(error);
                    });

// 处理结果

          
```




