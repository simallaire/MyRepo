<template>
		<div class="card">
			<div class="card-body">

		<h4><a :href="postid">{{ title }}</a> </h4><br/>
		<p>{{ bodyS }}...</p>
        <p v-if="count_comments>0"><i>{{count_comments}} comments  <i class="far fa-comment"></i></i></p>

        <div v-if="username">
		by <a :href="userid">{{ username }}</a>

		</div> {{updated_at}}
		</div>
		</div>

</template>

<script>
    var php = require('phpjs');
    export default {

        props: ['title','body','count_comments','username','updated_at','postid','userid'],
        mounted() {
            console.log('component mounted.')
        },
        computed: {
            bodyS : function(){
                return php.strip_tags(this.body);
            }
        }
    }
</script>
