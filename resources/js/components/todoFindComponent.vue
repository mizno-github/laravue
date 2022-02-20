<template>
    <div>
        <div class="todo_wrapper d-flex pt-3" v-for="(todo, index) in todos" :key="todo.id">
            <p class="col-4 my-auto h5">{{ todo.title }}</p>
            <p class="col-6 my-auto h5">{{ todo.content }}</p>
            <input class="btn btn-danger col-1" value="削除" @click="deletee(index)">
            <input class="btn btn-primary col-1 ms-1" value="更新">
        </div>
    </div>
</template>

<script>
    export default {
        name: 'todo_find_component',
        // props: ['todos'],
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
        methods: {
            // create: function(){
            //     method = 'post';
            //     val = {
            //         title: this.title,
            //         content: this.content
            //     };
            //     url = 'api/todo/create';

            //     this.ajax(method, val, url,function(response) {
            //         this.todos.push({
            //             title: response.data.title,
            //             content: response.data.content,
            //             id: response.data.id,
            //         });
            //         this.title = "";
            //         this.content = "";
            //     });
            // },
            deletee: function(id){
                var todo_id = this.todos[id].id
                var method = 'delete';
                var val = '';
                var url = 'api/todo/' + todo_id;

                this.ajax(method, val, url, function (response) {
                    console.log(response.data);
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
