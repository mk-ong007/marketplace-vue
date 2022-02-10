<template>
	<div>
		<img width="32px" :src="userImg" />
	</div>	
</template>

<script>
	export default {
		name:'UserDetailComponent',
		data() {
			return {
				userImg: 'https://bit.ly/3nzZOsM'
			}
		},
		created () {
	        this.fetchEventsList();
	        this.timer = setInterval(this.fetchEventsList, 1000);
	    },
	    methods: {
	        fetchEventsList () {
	            axios.get('/general-settings/show')
				.then(response => {
					if(response.data.picture != '')
			        this.userImg = '/storage/pictures/users/'+response.data.picture;
				})
	        },
	        cancelAutoUpdate () {
	            clearInterval(this.timer);
	        }
	    },
	    beforeDestroy () {
	      this.cancelAutoUpdate();
	    }
	}
</script>

<style scoped>
	img {
		border-radius: 50%;
	}
</style>