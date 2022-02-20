<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">TodoContent</div>
                    <div class="card-body" >
                        <div class="d-flex" style="color:#aaa;">
                            <p class="col-4 my-auto h5 ">title</p>
                            <p class="col-6 my-auto h5">content</p>
                        </div>
                        <!-- <todoFindComponent></todoFindComponent> -->
                        <div class="todo_wrapper d-flex pt-3" v-for="(todo, index) in todos" :key="todo.id">
                            <p class="col-4 my-auto h5">{{ todo.title }}</p>
                            <p class="col-6 my-auto h5">{{ todo.content }}</p>
                            <input class="btn btn-danger col-1" value="削除" @click="deletee(index)">
                            <input class="btn btn-primary col-1 ms-1" value="更新">
                        </div>
                        <h2>new</h2>
                        <div class="d-flex">
                            <input v-model="title" class="col-4 my-auto h5">
                            <input v-model="content" class="col-6 my-auto h5 ms-1">
                            <input type="button" @click="create" class="btn btn-success ms-1 col-1" value="新規">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import todoFindComponent from './todoFindComponent.vue'
    export default {
        name: 'todo_component',
        // components: {
        //     todoFindComponent
        // },
        data: function(){
            return {
                todos: [],
                title: "",
                content: ""
            }
        },
        created(){
            axios.get('api/todo/all')
            .then (response => {
                this.todos = response.data;
            })
        },
        data: function () {
            return {
                todos: [],
                title: "",
                content: ""
            }
        },
        methods: {
            create: function(){
                var method = 'post';
                var val = {
                    title: this.title,
                    content: this.content
                };
                var url = 'api/todo/create';

                this.ajax(method, val, url, response => {
                    this.todos.push({
                        title: response.data.title,
                        content: response.data.content,
                        id: response.data.id,
                    });
                    this.title = "";
                    this.content = "";
                });
            },
            deletee: function(id){
                var todo_id = this.todos[id].id
                var method = 'delete';
                var val = '';
                var url = 'api/todo/' + todo_id;

                this.ajax(method, val, url, response => {
                    console.log(response.data, id);
                    this.todos.splice(id, 1);
                });
            },
            ajax: function(method, val, url, successFunc){
                axios({
                    method: method,
                    baseURL: url,
                    data: val,
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(successFunc)
                .catch(err => console.log(err))
            }
        },
        watch: {

        },
        computed: {
            now: function () {
                return Date.now()
            }
        }
    }
</script>
