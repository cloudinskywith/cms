<template>
    <div>
        <el-carousel width="600px" height="300px" v-if="haddata" :autoplay="false">
            <el-carousel-item v-for="image in images">
                <img :src="image.file">
                <h3>{{image.description}}</h3>
            </el-carousel-item>
        </el-carousel>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                images:[],
                haddata:false,
            }
        },
        methods:{

        },
        created(){
            var vm = this;
            axios
                .get('/frontend/gallery')
                .then((response)=>{
                    console.log(response);
                    _.each(response.data,function(item){
                        vm.images.push(item);
                        vm.haddata = true;
                    });
                })
                .catch((error)=>{
                    console.log(error);
                });
        }
    }
</script>
<style>
    .el-carousel{
        margin: 0 auto;
        width: 600px;
    }
    el-carousel__item{
        position: relative;
    }
    .el-carousel__item > img{
        width: 600px;
        height: 300px;
    }
    .el-carousel__item h3 {
        position: absolute;
        bottom: 0;
        right: 5px;
        background: rgba(0, 0, 0, 0.25);
        padding: 1px 3px 1px 3px;
        color: #ffffff;
        font-size: 14px;
        opacity: 0.75;
        line-height: 50px;
        margin: 0;
        z-index: 10000;
    }
</style>