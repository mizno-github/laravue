<template>
    <div id="overlay" @click="clickPush">
        <div id="content" @click="stopEvent">
            <p>これがモーダルウィンドウです。</p>
                <slot name="head"></slot>
            <p><button @click="clickPush">close</button></p>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'modal_find_component',
        methods: {
            clickPush: function () {
                this.$emit('myClickAction');
            },
            stopEvent: function () {
                event.stopPropagation()
            }
        }
    }
</script>

<style>
#content{
  z-index:2;
  width:50%;
  padding: 1em;
  background:#fff;
}

#overlay{
  /*　要素を重ねた時の順番　*/
  z-index:1;

  /*　画面全体を覆う設定　*/
  position:fixed;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background-color:rgba(0,0,0,0.5);

  /*　画面の中央に要素を表示させる設定　*/
  display: flex;
  align-items: center;
  justify-content: center;

}
</style>
