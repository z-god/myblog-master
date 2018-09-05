export default class option{
    constructor(dataarr){
        let arr = dataarr
        console.log(arr)
        let option = {
            color: ['#3398DB'],
            tooltip : {
                trigger: 'axis',
                axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                    type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                }
            },
            xAxis : [
                {
                    type : 'category',
                    data: ['文章总数','用户总数','评论总数','点赞总数','浏览总数'],
                    axisTick: {
                        alignWithLabel: true
                    }
                }
            ],
            yAxis : [
                {
                    type : 'value'
                }
            ],
            series : [
                {
                    name: '数据',
                    type: 'bar',
                    radius : '55%',
                    center: ['50%', '60%'],
                    data:[
                        {value:arr.total_article, name:'文章总数'},
                        {value:arr.total_user, name:'用户总数'},
                        {value:arr.total_comment, name:'评论总数'},
                        {value:arr.total_praise, name:'点赞总数'},
                        {value:arr.total_viewers, name:'浏览总数'}
                    ]
                }
            ]
        };
         return option        
    }
}