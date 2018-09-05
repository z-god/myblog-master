
<template>
    <div class="layout">
        <Layout :style="{minHeight: '100vh'}">
            <Sider ref="side1" hide-trigger collapsible :collapsed-width="0" v-model="isCollapsed">
                <router-link to="/index">
                <div class="logo">
                     <img src="../assets/icon/logo.png" alt="">
                </div>
                </router-link>
                <Menu :active-name="itemname" theme="dark" width="auto" :class="menuitemClasses" @on-select="goPage">
                    <MenuItem name="datadisplay">
                        <Icon type="pie-graph" />
                        <span>数据展示</span>
                    </MenuItem>
                    <MenuItem name="articlelist">
                        <Icon type="ios-book" />
                        <span>文章管理</span>
                    </MenuItem>
                    <MenuItem name="commentslist">
                        <Icon type="chatboxes" />
                        <span>评论管理</span>
                    </MenuItem>
                    <MenuItem name="linklist">
                        <Icon type="link" />
                        <span>链接管理</span>
                    </MenuItem>
                    <MenuItem name="imageslist">
                        <Icon type="images" />
                        <span>图片管理</span>
                    </MenuItem>
                    <MenuItem name="userlist">
                        <Icon type="ios-people" />
                        <span>用户管理</span>
                    </MenuItem>
                    <MenuItem name="datacenter">
                        <Icon type="ios-clock" />
                        <span>时间轴</span>
                    </MenuItem>
                </Menu>
            </Sider>
            <Layout>
                <Header :style="{padding: 0}" class="layout-header-bar">
                <div class="change-icon">
                    <Icon @click.native="collapsedSider" :class="rotateIcon" :style="{margin: '20px 20px 0'}" type="navicon-round" size="24"></Icon>
                </div>
                <div class="json-container">{{jsondata}}<br><span style="font-size:8px;font-style:italic;">————{{jsonfrom}}</span></br></div>
                    <div class="select-container">
                        <Icon color="#2d8cf0" size=30 type="ios-person" />
                        <Dropdown style="margin-left: 20px">
                            <Button type="primary">
                                hello，world
                                <Icon  type="ios-arrow-down"></Icon>
                            </Button>
                            <DropdownMenu slot="list">
                                <DropdownItem @click.native='loginout'>退出登录</DropdownItem>
                                <DropdownItem>更改密码</DropdownItem>
                            </DropdownMenu>
                        </Dropdown>
                    </div>
                </Header>                    
                <Content :style="{margin: '20px', background: '#fff', minHeight: '260px'}">
                  <keep-alive>
                    <router-view/>
                  </keep-alive>
                </Content>
                <div>
                    <p class="foot_p footer-p">
                        Designed &amp; Powerd by <a href="/">newman</a>
                        <br/>
                        Copyright© 2018 newman-nelife
                        <br/><a href="http://www.miibeian.gov.cn/" target="_blank" rel="nofollow">鄂ICP备09015569号</a>
                    </p>
                </div>
            </Layout>
        </Layout>
    </div>
</template>
<script>
// import waifutips from '../assets/js/waifu-tips.js'
import articlelist from './ArticleList.vue'
import commentslist from './CommentList.vue'
import linklist from './LinkList.vue'
import imageslist from './ImgList.vue'
import userlist from './UserList.vue'
import datacenter from './DataCenter.vue'
import datadisplay from './DataDisplay.vue'
import api from '../js/Api.js'
// import editor from './ArticleEdit.vue'
import $ from 'jquery'
    export default {
        components:{
            articlelist,
            commentslist,
            linklist,
            imageslist,
            userlist,
            datacenter,
            datadisplay
        },
        data () {
            return {
                jsondata:'锄禾日当午，汗滴禾下土',
                jsonfrom:'悯农',
                itemname:'datadisplay',
                isCollapsed: false,
                value: 0,
                setting: {
                    autoplay: true,
                    autoplaySpeed: 3000,
                    dots: 'inside',
                    radiusDot: false,
                    arrow: 'never'
                },
            }
            
        },
        computed: {
            rotateIcon () {
                return [
                    'menu-icon',
                    this.isCollapsed ? 'rotate-icon' : ''
                ];
            },
            menuitemClasses () {
                return [
                    'menu-item',
                    this.isCollapsed ? 'collapsed-menu' : ''
                ]
            },

        },
        mounted(){
            this.getjson()
            setInterval(this.getjson,30000)
        },
        methods: {
            getjson(){
                api.getJson().then(res=>{
                this.jsondata = res.hitokoto
                this.jsonfrom = res.from
                console.log(res)
            })
            },
            collapsedSider () {
                this.$refs.side1.toggleCollapse();
            },
            loginout(){
                this.$router.push({
                    path:'/'
                })
            },
           goPage(name) { // 点击菜单进入对应路由
                let app = this;
                this.$nextTick(() => {
                    app.$router.push(name)
                });
                app.itemname = name
            },
        }
    }
</script>
<style lang="less">
@import '../assets/css/style.less';
  .logo{

        margin:20px 0 0 20px;
        img{
        width: 150px;
        height: 30px;
        }
    }
    .layout-header-bar{
        position: relative;
    }
    .select-container{
        display: flex;
        flex-direction: row;
        align-items: center;
        position: absolute;
        z-index: 9999;
        top: 10px;
        right: 20px;
    }
    .json-container{
        padding: 0;
        margin: 0;
        color: #fff;
        height: 69px;
        left: 5%;
        text-align: center;
        position: absolute;
        top: 15px;
        width: 80%;
        font-size: 12px;
        font-family: '黑体';
        word-break : break-all; 
        line-height: 25px;
    }
    .layout{
        border: 1px solid #d7dde4;
        background: #f5f7f9;
        position: relative;
        border-radius: 4px;
        overflow: hidden;
    }
    .layout-header-bar{
        background: #fff;
        box-shadow: 0 1px 1px rgba(0,0,0,.1);
    }
    .layout-logo-left{
        width: 90%;
        height: 30px;
        background: #5b6270;
        border-radius: 3px;
        margin: 15px auto;
    }
    .menu-icon{
        transition: all .3s;
    }
    .rotate-icon{
        transform: rotate(-90deg);
    }
    .menu-item span{
        display: inline-block;
        overflow: hidden;
        width: 69px;
        text-overflow: ellipsis;
        white-space: nowrap;
        vertical-align: bottom;
        transition: width .2s ease .2s;
    }
    .menu-item i{
        transform: translateX(0px);
        transition: font-size .2s ease, transform .2s ease;
        vertical-align: middle;
        font-size: 16px;
    }
    .collapsed-menu span{
        width: 0px;
        transition: width .2s ease;
    }
    .collapsed-menu i{
        transform: translateX(5px);
        transition: font-size .2s ease .2s, transform .2s ease .2s;
        vertical-align: middle;
        font-size: 22px;
    }
    .ivu-card{
        margin:10px 0 0 10px;
        height: 400px;
        width: 180px;
        .card-container{
            display: flex;
            flex-direction: column;
            align-items: center;
            .my-img{
                width: 100px;
                height: 100px;
                img{
                    border-radius:50px;
                    width:100%;
                    height:100%;
                }
            }
            .my-icon{
                margin: 10px;
            }
        }        
    }

.foot_p{padding:10px 0; text-align:center; border-top:1px solid #beceeb; text-shadow:0 1px hsla(0,0%,100%,.3);}

.change-icon{
    z-index: 999;
    background-color: #5b6270
}
</style>