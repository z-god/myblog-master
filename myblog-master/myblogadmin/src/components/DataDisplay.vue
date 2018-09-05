<template>
<div class="chart-container">
<div id="echart" style="width:50%;height:350px"></div>
<div id="bar" style="width:50%;height:350px"></div>
</div>
    
</template>

<script>
import setEchart from '../js/setEchart.js'
import Option from '../js/pieOption.js'
import bar from '../js/barOption.js'
import api from '../js/Api.js'
export default {
  data(){
        return{
          dataarr:{}
        }
  },
  methods:{
    drawPieEchart(data){
            let chartOption=new Option(data); 
            let chart=setEchart('echart',chartOption);
    },
    drawBarEchart(data){
            let chartOption=new bar(data); 
            let chart=setEchart('bar',chartOption);
    }
  },
  beforeCreate(){
  },
  mounted(){
     api.getTotalData().then(res=>{
       console.log(res.data[0])
       this.drawPieEchart(res.data[0])
       this.drawBarEchart(res.data[0])
    })
  }
}
</script>

<style>
.chart-container{
 display: flex;
 flex-direction: row;
}
#bar{
  top: 0;
  float: right;
}
</style>
