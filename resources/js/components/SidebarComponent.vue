<template>
	<div>
		<div class="text-center my-2">
			<div class="my-auto">
				<img width="15px" src="https://bit.ly/3FJTTrv" />
				{{online_staff}} of {{no_of_staff}} Staffs online
			</div>
			<div class="my-auto">
				<img width="15px" src="https://bit.ly/3FJTTrv" />
				{{online_estimator}} of {{no_of_estimator}} Estimators online
			</div>
		</div>
		<div class="text-end">
			  <b-list-group>
			    <b-list-group-item class="d-flex justify-content-between align-items-center">
			      <b-icon icon="envelope-fill" class="" variant="info" font-scale="2"></b-icon>
			      <router-link to="/">Activities</router-link>
			    </b-list-group-item>
			    <b-list-group-item class="d-flex justify-content-between align-items-center">
			      <b-icon icon="watch" variant="info" scale="2"></b-icon>
			      <router-link to="/watch_history">Watches History</router-link>
			    </b-list-group-item>
			    <b-list-group-item class="d-flex justify-content-between align-items-center">
			      <b-icon icon="people-fill" variant="info" scale="2"></b-icon>
			      <router-link to="/manage_user">Manage Sellers and Staffs</router-link>
			    </b-list-group-item>
			    <b-list-group-item class="d-flex justify-content-between align-items-center">
			      <b-icon icon="person-fill" variant="info" scale="2"></b-icon>
			      <router-link to="/manage_estimator">Manage Estimators</router-link>
			    </b-list-group-item>
			    <!-- <b-list-group-item class="d-flex justify-content-between align-items-center">
			      <b-icon icon="collection" scale="2"></b-icon>
			      <router-link to="/bcm">Brands, Collection and Models</router-link>
			    </b-list-group-item> -->
			    <b-list-group-item class="d-flex justify-content-between align-items-center">
			      <b-icon icon="gear-fill" variant="info" scale="2"></b-icon>
			      <router-link to="/settings">General Settings</router-link>
			    </b-list-group-item>
			    <b-list-group-item class="d-flex justify-content-between align-items-center">
			      <b-icon icon="box-arrow-right" variant="info" scale="2"></b-icon>
			      <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
			    </b-list-group-item>
			  </b-list-group>
		</div>
	</div>
</template>

<script>
	export default { 
		name:'SidebarComponent',
		data(){
			return {
				online_staff: 0,
				no_of_staff: 0,
				online_estimator: 0,
				no_of_estimator: 0
			}
		},
		mounted() {
			axios.get('/home/get_online_status')
				.then(response => {
					this.online_staff 		= response.data.online_staff
					this.no_of_staff 		= response.data.no_of_staff
					this.online_estimator 	= response.data.online_estimator
					this.no_of_estimator 	= response.data.no_of_estimator
				})
		}
	}
</script>

<style scoped>
	a {
		text-decoration: none;
	    color: black;
	}
</style>