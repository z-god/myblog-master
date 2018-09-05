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
                        title: '链接名称',
                        key: 'name',
                    },
                    {
                        title: '链接地址',
                        key: 'url'
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
             api.getLink().then(res=>{
                 console.log(res.data)
                 this.data = res.data
             })
        },
        methods: {
            show (index) {
                this.$Modal.info({
                    title: '链接信息',
                    content: `名称：${this.data[index].name}<br>地址：${this.data[index].url}<br>创建时间：${this.data[index].time}`
                })
            },
            remove (index) {
                this.data.splice(index, 1);
            }
        }
    }
</script>
<style>
@import '../assets/css/main.less';
</style>
