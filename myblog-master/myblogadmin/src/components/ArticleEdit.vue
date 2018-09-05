<template>
<Form :model="editedNews">
  <div class="form-box">
    <div class="form-group">
    <div class="form-label">文章标题</div>
    
    <div class="form-input">
    <FormItem>
        <Input v-model="editedNews.title" placeholder="请输入文章标题"></Input>
    </FormItem>
    </div>
    </div>
    <div class="form-group">
      <div class="form-label">文章作者</div>
      <div class="form-input">
        <FormItem>
          <Input v-model="editedNews.author" placeholder="请输入文章作者"></Input>
          </FormItem>
      </div>
    </div>
    <div class="form-row">
    <div class="form-col">
        <div class="form-group">
            <div class="form-label">文章了标签</div>
            <div class="form-input">
              <FormItem>
                <Select v-model="editedNews.tags_id" placeholder="please select your zone" style="width: 100%;">
                    <Option v-for="(v,k) in tagMap" :label="v" :value="k" :key="k"></Option>
                </Select>
              </FormItem>
            </div>
        </div>
    </div>
        <div class="form-col">
            <div class="form-group">
                <div class="form-label">发布日期</div>
                
                <div class="form-input">
                  <FormItem>
                    <DatePicker type="date" placeholder="Pick a date" v-model="editedNews.createtime" style="width: 100%;"></DatePicker>
                    </FormItem>
                </div>
                
          </div>
        </div>
    </div>
      <div class="editor-box">
        <div style="margin:20px; width: 98%;">
          <FormItem>
          <editor
            class="editor"
            :value="editedNews.content"
            :setting="editorSetting"
            @show="editors"
            :url              = "Url"
            :max-size         = "MaxSize"
            :accept           = "Accept"
            :with-credentials = "withCredentials"
            @on-upload-fail         = "onEditorReady"
            @on-upload-success= "onEditorUploadComplete"></editor>
            </FormItem>
        </div>
      </div>
     <div class="btn-group">
       <FormItem>
          <Button   @click="back()">返回</Button>
          <Button  type="primary" @click="handleSubmit('editedNews')">确认</Button>
       </FormItem>
     </div>
  </div>
</Form>
</template>
<script type="text/ecmascript-6">
import api from '../js/Api.js'
  import editor from './editor' // 根据editor.vue组件位置引入
  export default {
    data() {
      return {
        tagMap:{},
         editedNews:{
           title:'',
           author:'',
           tags_id:0,
           createtime:'',
           content:'',
            
        },
        editorSetting: { // 配置富文本编辑器高
          height: 300
        },
        Url: 'http://newman.wang/img', // 图片对应的上传地址
        MaxSize: 75765, // 文件大小
        Accept: 'image/jpeg, image/png, image/jpg, image/gif', // 文件格式
        withCredentials: true,
      }
    },
    components: { // 引入组件
      editor
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
    },
    methods: {
      back(){
        this.$router.push('articlelist')
      },
      handleSubmit(){
        console.log(this.editedNews)
        api.addArticle(this.editedNews).then(res=>{
          console.log(res)
          if(res.data.code == 1){
              this.$Message.success('发布成功,等待管理员审核');
              location. reload()
              this.$router.push('articlelist')
              console.log(this.editedNews)
          }
          else{
            this.$Message.error('发布失败');
          }
        })
      },
      editors(content) { // editor组件传过来的值赋给content
        console.log(content)
         this.editedNews.content = content
      },
      onEditorReady(ins, ina) { // 上传失败的函数
        console.log('ins')
        console.log(ins)
        console.log(ina)
      },
      onEditorUploadComplete(json) { // 处理上传图片后返回数据，添加img标签到编辑框内
        console.log('json')
        console.log(json)
        console.log(json[0].data.filePath)
        this.editedNews.content = content + '<img src=' + json[0].data.filePath + '>'
      }
    }
  }
</script>
<style scoped >
 @import '../assets/css/formbox.less';
 
 .mce-tinymce{
   width: 1000px;
 }
</style>
