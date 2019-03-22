<template>
		<div class="card">
			<div class="card-body">

		<h4><a :href="postid">{{ title }}</a> </h4><br/>
		<p>{{ body }}...</p>

        <p v-if="count_comments>0"><i>{{count_comments}} comments  <i class="far fa-comment"></i></i></p>

		    &nbsp;by <a :href="userid">{{ username }}</a>

		, {{updated_at}}
		</div>
		</div>

</template>

<script>
    export default {
        props: ['title','body','count_comments','username','updated_at','postid','userid'],
        mounted() {
            console.log('component mounted.')
        }
    }
</script>
