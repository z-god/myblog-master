import api from './Api.js'
export function check(id){
    api.checkByStatus(id).then(res=>{
        if(res.data.code == 1){
            this.$Message.success('修改成功');
            this.$router.replace('flash')
        }
        else{
            this.$Message.error('修改失败');
        }
    })
}
export function remove (index) {
    api.deleteByStatus(index).then(res=>{
        if(res.data.code == 1){
            this.$Message.success('删除成功');
            this.$router.replace('flash')
        }
        else{
            this.$Message.error('删除失败');
        }
    })
}
export function update(id){
    api.updateByStatus(id).then(res=>{
        if(res.data.code == 1){
            this.$Message.success('审核成功');
            this.$router.replace('flash')
        }
        else{
            this.$Message.error('审核失败');
        }
    })
}
export function commentcheck(id){
    api.checkCommentByStatus(id).then(res=>{
        if(res.data.code == 1){
            this.$Message.success('修改成功');
            this.$router.replace('commentflash')
            // location.replace('commentflash')
        }
        else{
            this.$Message.error('修改失败');
        }
    })
}
export function commentremove (index) {
    api.deleteCommentByStatus(index).then(res=>{
        if(res.data.code == 1){
            this.$Message.success('删除成功');
            this.$router.replace('commentflash')
        }
        else{
            this.$Message.error('删除失败');
        }
    })
}
export function commentupdate(id){
    api.updateCommentByStatus(id).then(res=>{
        if(res.data.code == 1){
            this.$Message.success('审核成功');
            this.$router.replace('commentflash')
        }
        else{
            this.$Message.error('审核失败');
        }
    })
}