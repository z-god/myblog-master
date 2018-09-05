export default class Option{
    constructor(dataarr){
        let arr = dataarr
        let option = {
            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                orient: 'vertical',
                top:'50',
                left: '50',
                data: ['文章总数','用户总数','评论总数','点赞总数','浏览总数']
            },
            series : [
                {
                    name: '数据',
                    type: 'pie',
                    radius : '55%',
                    center: ['50%', '60%'],
                    data:[
                        {value:arr.total_article, name:'文章总数'},
                        {value:arr.total_user, name:'用户总数'},
                        {value:arr.total_comment, name:'评论总数'},
                        {value:arr.total_praise, name:'点赞总数'},
                        {value:arr.total_viewers, name:'浏览总数'}
                    ],
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            ]
        };
        return option
    }
}