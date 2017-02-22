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
//                console.log(value);
                //1.将newsTitle和newsContent传递给后台
                //2.入库成功后跳转到index页面
                axios
                    .post('/admin/news/',{
                        newsTitle:this.newsTitle,
                        newsContent:value
                    })
                    .then(function(response){
                        console.log(response);
                        if(response.status == 200){
                            //说明入库成功了，跳转到新闻列表页面
                            window.location.href = '/admin/news';
                        }
                    })
                    .catch(function(error){
                        console.log(error);
                    });
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