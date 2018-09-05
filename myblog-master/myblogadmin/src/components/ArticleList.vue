<template>
<div>
    <div class="button-container">
      <Button type="primary" @click.native="edit">写文章</Button>
    </div>
<div class="table-container">
<Table border ref="selection" :columns="columns7" :data="tabledata" stripe></Table>
    <div style="margin: 10px;overflow: hidden" class="page-container">
        <div style="float: right;">
            <Page :total="pagetotal" :current.sync="current" @on-change="changePage"></Page>
        </div>
    </div>
</div>
</div>
</template>
<script>
import {check,remove,update} from '../js/changeStatus.js'
import api from '../js/Api.js'
    export default {
        data () {
            return {
                current:1,
                pagetotal:0,
                tagMap:{},
                columns7: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center'
                    },
                    {
                        title: '文章标题',
                        key: 'title',
                    },
                    {
                        title: '作者',
                        key: 'author'
                    },
                    {
                        title: '分类',
                        key: 'tags_id',
                        render:(h,params) =>{
                          return h('div',[
                              h('Button',{
                                  props:{
                                      type:'info'
                                  }
                              },this.tagMap[params.row.tags_id])
                          ])
                        }
                    },
                    {
                        title: '发布时间',
                        key: 'createtime'
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
                                            this.check(params.row.id)
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
                                            this.check(params.row.id)
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
                                            this.update(params.row.id)
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
                                }, '查看'),
                                h('Button', {
                                    props: {
                                        type: 'error',
                                        size: 'small'
                                    },
                                    on: {
                                        click: () => {
                                            this.remove(params.row.id)
                                        }
                                    }
                                }, '删除')
                            ]);
                        }
                    }
                ],
                tabledata: []
            }
        },
        beforeCreate:function(){
        },
        beforeMount:function(){
            api.getTagsList().then(res=>{
            console.log(res.data)
            let ret = res.data
            this.tagMap = ret.map(function(item,k){
            return item.name
            })
            console.log(this.tagMap)
            })
             api.getArticle(this.current).then(res=>{
                 this.tabledata = res.data
                 console.log(this.tabledata)
                 this.pagetotal = res.last_page * 10
                 console.log(this.current)
             })
        },
        mounted:function(){
        },
 

        methods: {
            check,
            remove,
            update,
            changePage (currentPage) {
                api.getArticle(currentPage).then(res=>{
                 this.tabledata = res.data
                 this.pagetotal = res.last_page * 10
                 console.log(this.current)
                })
            },
            show (index) {
                this.$Modal.info({
                    title: '评论信息',
                    content: `标题：${this.tabledata[index].title}<br>用户：${this.tabledata[index].author}<br>内容：${this.tabledata[index].content}<br>发布时间：${this.tabledata[index].createtime}`
                })
            },
            edit (){
              this.$router.push('editor')
            }
        }
    }
</script>
<style>
@import '../assets/css/main.less';
.page-container{
    position: fixed;
    bottom: 120px;
}
</style>
