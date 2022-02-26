<template>
    <div>
        <button @click="openModal">click</button>
        <modal-find-component v-show="showContent" @myClickAction="closeModal"></modal-find-component>
    </div>
</template>

<script>
    import modalFindComponent from './modalFindComponent.vue'
    export default {
        components: {
            modalFindComponent
        },
        data: function(){
            return {
                showContent: false
            }
        },
        methods: {
            openModal: function(){
                this.showContent = true;
            },
            closeModal: function(){
                this.showContent = false;
            }
        }
    }
</script>
