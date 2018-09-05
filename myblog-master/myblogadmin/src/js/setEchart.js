let echarts = require('echarts/lib/echarts')
// 引入柱状图组件
require('echarts/lib/chart/bar')
//引入条状图
require('echarts/lib/chart/line')
require("echarts/lib/chart/gauge");
require('echarts/lib/chart/pie')
// require("echarts")
// 引入提示框和title组件
require("echarts/lib/component/legendScroll")
require('echarts/lib/component/title')
require('echarts/lib/chart/radar')
require("echarts/lib/component/legend")
require("echarts/lib/chart/pie")
require("echarts/lib/chart/bar")
require("echarts/lib/component/markLine")
//绘制echart图表的方法，传递id跟配置对象
export default function setEchart(id,option){  
      let Chart = echarts.init(document.getElementById(id));
      Chart.setOption(option)
      return Chart
}