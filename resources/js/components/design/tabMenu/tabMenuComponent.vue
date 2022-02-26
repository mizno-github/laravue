<template>
<section>
    <div class="main-area">
        <div class="tab">
            <p
                @click="choice(yasai.id)"
                v-for="yasai in yasais"
                :class="{tabMenu:true, isActive:yasai.active}"
                :key="yasai.id">
               {{ yasai.title }}
            </p>

        </div>
        <div
            :key="yasai.id"
            :class="{contentBox:true, isActive:yasai.active}"
            v-for="yasai in yasais">
            <p class="content">{{ yasai.content }}</p>
        </div>

    </div>
</section>
</template>
<script>
    export default {
        data: function () {
            return {
                yasais: [
                    {id:0, title:"トマト", content:"トマトの育成方法", active:true},
                    {id:1, title:"いちご", content:"いちごの育成方法", active:false},
                    {id:2, title:"スイカ", content:"スイカの育成方法", active:false},
                ],
            }
        },
        methods :{
            choice: function (idx) {
                this.yasais.forEach(element => {
                    element.active = false
                });
                this.yasais[idx].active = true;
            }
        }
    }
</script>
<style>
.main-area{
  padding: 20px 2%;
  background-color: gainsboro;
}
.tab{
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
}
.tabMenu{
  width: 33.333%;
  text-align: center;
  padding: 8px;
  color:#ccc;
  border-radius:8px;
  background-color: #fff;
  cursor: pointer;
}
.tabMenu.isActive{
  background-color: paleturquoise;
  color:black;
}
.contentBox{
  display: none;
  height: 60vh;
  background-color: #fff;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  margin-top: 20px;
}
.contentBox.isActive{
  display: flex;
}
.content{
  font-size: 1.5rem;
}
</style>
