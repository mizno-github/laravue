<template>
<div>
  <div :class="{'sideBar': true, 'side': status, 'duration-1000ms':true}">
    <div class="sideBarContent mx-3">
      <h1>menu</h1>
      <span class="closeButton" @click="sideBarButton()"></span>
      <ul class="list-unstyled h4">
        <li class="mt-3 py-2 text-center rounded bg-white listHover">とまと</li>
        <li class="mt-3 py-2 text-center rounded bg-white listHover">ねぎ</li>
        <li class="mt-3 py-2 text-center rounded bg-white listHover">ゴーヤ</li>
        <li class="mt-3 py-2 text-center rounded bg-white listHover">ナス</li>
        <li class="mt-3 py-2 text-center rounded bg-white listHover">ピーマン</li>
        <li class="mt-3 py-2 text-center rounded bg-white listHover">キュウリ</li>
        <li class="mt-3 py-2 text-center rounded bg-white listHover">かぼちゃ</li>
      </ul>
    </div>
  </div>
  <div class="bg-success rounded-circle sideOpenButton" @click="sideBarButton()">開</div>
</div>
</template>
<script>
export default {
  data: function () {
    return {
      status: true
    }
  },
  methods: {
    sideBarButton: function(){
      this.status = !this.status;
    }
  }
}
</script>
<style>
  .listHover {
    opacity:50% !important;
    color:#000;
    background-color:#888 !important;
  }

  .listHover:hover{
    opacity:90% !important;
    color:white;
  }

  .sideOpenButton {
    position:fixed;
    height:80px;
    width:80px;
    right:50px;
    bottom:50px;
    text-align:center;
    display: table-cell;
    vertical-align: middle;
    font-size:30px;
    line-height: 80px;
  }

  .closeButton {
    height: 25px;
    top: 10px;
    left: 250px;
    width: 25px;
    position:absolute;
    translate:1s;
  }

  .closeButton::after {
    transform: rotate(45deg) translate(-50%);
    -webkit-transform: rotate(45deg) translate(-50%);
    -ms-transform: rotate(45deg) translate(-50%);
    transform:rotate(45deg);
  }

  .closeButton::before {
    transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
  }

  .closeButton:after, .closeButton::before {
    background-color: #000;
    width:5px;
    height:30px;
    content:"";
    top: 0;
    left: 50%;
    position:absolute;
    transition: 0.5s;
  }

  .closeButton:hover::after, .closeButton:hover::before {
    transition: 0.5s;
    opacity:70%;
  }

  .sideBar {
    background-color:#DDD;
    height:100%;
    width:300px;
    position:absolute;
  transition: all 300ms 0s ease;
  }

  .side {
    transform: translateX(-300px);
  }

  .duration-1000ms {
    transition-duration: 0.5s;
  }
</style>
