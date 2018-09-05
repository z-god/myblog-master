import Vue from 'vue'
import axios from 'axios'
const host = 'http://newman.wang/'
var Api ={}
export default Api

Api.getArticle = function(page){
    let api= Vue.axios.get(host+'article/'+page).then(res=>{
        return res.data
    })
    return api
}
Api.getComments = function(){
    let api= Vue.axios.get(host+'comments').then(res=>{
        return res
    })
    return api
}
Api.getLink = function(){
    let api= Vue.axios.get(host+'link').then(res=>{
        return res
    })
    return api
}
Api.getImg = function(){
    let api= Vue.axios.get(host+'images').then(res=>{
        return res
    })
    return api
}
Api.getUser = function(){
    let api= Vue.axios.get(host+'user').then(res=>{
        return res
    })
    return api
}
Api.getJson = function(){
    let api= Vue.axios.get('https://v1.hitokoto.cn/').then(res=>{
        return res.data
    })
    return api
}
Api.getTagsList= function(){
    let api= Vue.axios.get(host+'tags').then(res=>{
        return res
    })
    return api
}
Api.addArticle= function(article){
    let api = Vue.axios.post(host+'article/add',article)
      .then(function (res) {
          return  res;
      })
      .catch(function (error) {
        console.log(error);
      });
    return api
}
Api.getTagsById= function(id){
    let api= Vue.axios.get(host+'admin/tags/'+id).then(res=>{
        return res
    })
    return api
}
Api.updateByStatus= function(id){
    let api= Vue.axios.post(host+'status/'+id).then(res=>{
        return res
    })
    return api
}
Api.deleteByStatus= function(id){
    let api= Vue.axios.post(host+'delete/'+id).then(res=>{
        return res
    })
    return api
}
Api.checkByStatus= function(id){
    let api= Vue.axios.post(host+'check/'+id).then(res=>{
        return res
    })
    return api
}
Api.updateCommentByStatus= function(id){
    let api= Vue.axios.post(host+'comment/status/'+id).then(res=>{
        return res
    })
    return api
}
Api.deleteCommentByStatus= function(id){
    let api= Vue.axios.post(host+'comment/delete/'+id).then(res=>{
        return res
    })
    return api
}
Api.checkCommentByStatus= function(id){
    let api= Vue.axios.post(host+'comment/check/'+id).then(res=>{
        return res
    })
    return api
}
Api.getTotalData= function(){
    let api= Vue.axios.get(host+'data').then(res=>{
        return res
    })
    return api
}