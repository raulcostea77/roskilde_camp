<template>
    <div>
    <div class="panel panel-primary">
            <div class="panel-heading" id="accordion">
                <span class="glyphicon glyphicon-comment"></span> {{ group.name }}
                <div class="btn-group pull-right">
                    <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion-" :href="'#collapseOne-' + group.id">
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                </div>
            </div>
            <div class="panel" :id="'collapseOne-' + group.id">
                <div class="panel-body chat-panel">
                    <ul class="chat">
                        <li v-for="oldconvo in oldconvos">
                            <span class="chat-img pull-left">
                                <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                            </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">{{ oldconvo.username }}</strong>
                                    </div>
                                    <p>
                                        {{ oldconvo.message }}
                                    </p>
                                    <p>
                                        {{ oldconvo.created_at }}
                                    </p>
                                </div>
                        </li>

                        <li v-for="conversation in conversations">
                            <span class="chat-img pull-left">
                                <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                            </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">{{ conversation.user.name }}</strong>
                                    </div>
                                    <p>
                                        {{ conversation.message }}
                                    </p>
                                    <p>
                                        {{ conversation.created_at }}
                                    </p>
                                </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." v-model="message" @keyup.enter="store()" autofocus />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat" @click.prevent="store()">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['group'],

        data() {
            return {
                oldconvos: [],
                users:[],
                conversations: [],
                message: '',
                group_id: this.group.id,
            }
        },

        mounted() {
            this.getUsers();
            this.getConversations();
            this.listenForNewMessage();
        },

        methods: {
            store() {
                axios.post('/conversations', {message: this.message, group_id: this.group.id})
                .then((response) => {
                    this.message = '';
                    this.conversations.push(response.data);
                            // console.log(this.conversations);
                });
            },

            listenForNewMessage() {
                Echo.private('groups.' + this.group.id)
                    .listen('NewMessage', (e) => {
                        // console.log(e);
                        this.conversations.push(e);
                    });
            },

            getUsers() {
                axios.get('/users/'+this.group.id)
                    .then((response) => {
                           this.users = response.data;
                           // console.log(this.users);        
                });
            },

            getConversations() {
                axios.get('/conversations/'+this.group.id)
                    .then((response) => {
                           this.oldconvos = response.data;        
                             this.oldconvos.forEach( oldconvo => {
                                this.users.forEach( user => {
                                    if(user.id == oldconvo.user_id )
                                        oldconvo.username = user.name;
                                });

                                
                            })
                    
                });

               
            }
        }
    }
</script>
