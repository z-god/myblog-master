<template>
<div>
 <div class="table-container">
      <Table border ref="selection" :columns="columns7" :data="data"></Table>
 </div>
</div>
</template>
<script>
import api from '../js/Api.js'
    export default {
        data () {
            return {
                columns7: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center'
                    },
                    {
                        title: 'ID',
                        key: 'id',
                    },
                    {
                        title: '图片',
                        key: 'src',
                        render: (h, params) => {
                            console.log('src:'+params.row.src)
                            return h('div', [
                                h('img', {
                                    attrs: {
                                        src: params.row.src,
                                    },
                                    style:{
                                        width:'100%',
                                        height:'100px'
                                    }
                                }),
                            ]);
                        }
                    },
                    {
                        title: '创建时间',
                        key: 'time'
                    },
                    {
                        title: '状态',
                        key: 'status',
                        render:(h,params) => {
                            if(params.row.status==1){
                                return h('div',[
                                    h('Button',{
                                     props: {
                                        type: 'success',
                                        size: 'small'
                                    }},'正常')
                                ])
                            }
                            else{
                                return h('div',[
                                    h('Button',{
                                     props: {
                                        type: 'error', 
                                        size: 'small'
                                    }},'待审')
                                ])
                            }
                        }
                    },
                    {
                        title: '操作',
                        key: 'action',
                        width: 150,
                        align: 'center',
                        render: (h, params) => {
                            return h('div', [
                                h('Button', {
                                    props: {
                                        type: 'error',
                                        size: 'small'
                                    },
                                    on: {
                                        click: () => {
                                            this.remove(params.index)
                                        }
                                    }
                                }, '删除')
                            ]);
                        }
                    }
                ],
                data: []
            }
        },
        beforeMount:function(){
             api.getImg().then(res=>{
                //  console.log(res.data)
                 this.data = res.data
             })
        },
        methods: {
            remove (index) {
                this.data.splice(index, 1);
            }
        }
    }
</script>
<style>
@import '../assets/css/main.less';
</style>
