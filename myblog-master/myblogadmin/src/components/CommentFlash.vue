<template>
    <div class="flash-container">
        <img src="../assets/images/lswl.jpeg" alt="">
        <h2 style="color:#19be6b">状态更新成功<span style="color:#2db7f5;font-size:36px;font-style:italic;">{{time}}</span>秒后跳转</h2>
    </div>
</template>

<script>
export default {
data(){
    return{
        time:0
    }
   },
   methods:{
    countDown(){
        let THIS = this
        THIS.time--
    }
  }, 
  mounted(){
    let THIS = this
    THIS.time=3
    setInterval(THIS.countDown,1000)
  },
  watch:{
      'time':function(newVal,oldVal){
        if(newVal==0){
            this.$router.go(0)
            this.$router.replace('commentslist')
        }
      }
  }
}
</script>

<style>
.flash-container{
    margin: 50px 0 0 0;
    font-style: initial; 
    display:flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}
img{
    height: 189px;
    width: 200px;
}
</style>
