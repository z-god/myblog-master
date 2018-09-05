<template>
<div class="container">
    <img class="imgstyle" src="http://newman.wang/img/timg.jpg" alt="">
    <Timeline class="timeline">
        <TimelineItem>
            <p class="time">1976年</p>
            <p class="content">Apple I 问世</p>
        </TimelineItem>
        <TimelineItem>
            <p class="time">1984年</p>
            <p class="content">发布 Macintosh</p>
        </TimelineItem>
        <TimelineItem>
            <p class="time">2007年</p>
            <p class="content">发布 iPhone</p>
        </TimelineItem>
        <TimelineItem>
            <p class="time">2010年</p>
            <p class="content">发布 iPad</p>
        </TimelineItem>
        <TimelineItem>
            <p class="time">2011年10月5日</p>
            <p class="content">史蒂夫·乔布斯去世</p>
        </TimelineItem>
    </Timeline>
</div>
</template>
<script>
    export default {
        
    }
</script>
<style scoped>
    .time{
        font-size: 14px;
        font-weight: bold;
        color: aliceblue;
    }
    .content{
        padding-left: 5px;
        color: aliceblue;
    }
    .container{
        position: relative;
        margin: 0;
        padding: 0;
    }
    .imgstyle{
     width: 100%;
     height: 485px;
    }
    .timeline{
        position: absolute;
        top: 20px;
        z-index: 999;
        margin: 0 0 0 300px;
    }
</style>