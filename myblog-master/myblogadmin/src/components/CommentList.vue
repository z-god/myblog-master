<template>
<div>
    <div class="table-container">
      <Table border ref="selection" :columns="columns7" :data="data"></Table>
    </div>
</div>
</template>
<script>
import {commentcheck,commentremove,commentupdate} from '../js/changeStatus.js'
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
                        title: '文章标题',
                        key: 'article_id',
                    },
                    {
                        title: '评论用户',
                        key: 'user'
                    },
                    {
                        title: '内容',
                        key: 'content'
                    },
                    {
                        title: '评论时间',
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
                                    },
                                    on:{
                                        click:()=>{
                                            this.commentcheck(params.row.id)
                                        }
                                    }
                                    },'正常')
                                ])
                            }
                            else if(params.row.status==2){
                                return h('div',[
                                    h('Button',{
                                     props: {
                                        type: 'error',
                                        size: 'small'
                                    },
                                    on:{
                                        click:()=>{
                                            this.commentcheck(params.row.id)
                                        }
                                    }
                                    },'删除')
                                ])
                            }
                            else{
                                return h('div',[
                                    h('Button',{
                                     props: {
                                        type: 'warning', 
                                        size: 'small'
                                    },
                                    on:{
                                        click:()=>{
                                            this.commentupdate(params.row.id)
                                        }
                                    }
                                    },'待审')
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
                                        type: 'primary',
                                        size: 'small'
                                    },
                                    style: {
                                        marginRight: '5px'
                                    },
                                    on: {
                                        click: () => {
                                            this.show(params.index)
                                        }
                                    }
                                }, '编辑'),
                                h('Button', {
                                    props: {
                                        type: 'error',
                                        size: 'small'
                                    },
                                    on: {
                                        click: () => {
                                            this.commentremove(params.row.id)
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
             api.getComments().then(res=>{
                 console.log(res.data)
                 this.data = res.data
             })
        },
        methods: {
            commentcheck,
            commentremove,
            commentupdate,
            show (index) {
                this.$Modal.info({
                    title: '文章信息',
                    content: `标题：${this.data[index].article_id}<br>作者：${this.data[index].user}<br>内容：${this.data[index].content}<br>发布时间：${this.data[index].time}`
                })
            },
        }
    }
</script>
<style>
@import '../assets/css/main.less';
</style>
