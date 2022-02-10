<template>
	<div>
		<b-card-group deck>
		    <b-card header-tag="header">
		      <template #header>
		      	<b-row>
		      		<b-col class="my-auto"><h5 class="mb-0">Manage Estimators</h5></b-col>
		      		<b-col cols=2 style="text-align: end;"><b-link class="btn btn-primary" to="/add_estimator">Add New</b-link></b-col>
		      	</b-row>
		      </template>
		      <b-card-text>
		      	<table class="text-center" id="datatable">
		      		<thead>
		      			<tr>
		      				<th>Online</th>
		      				<th>Active</th>
		      				<!-- <th>Requires Validation</th> -->
		      				<th>Id</th>
		      				<th>Name</th>
		      				<th>Email</th>
		      				<th>Added on</th>
		      			</tr>
		      		</thead>
		      		<tbody>
		      			<tr v-for="item in items" :key="item.id">
		      				<td> 
		      					<img v-if="item.online" width="20px" src="https://bit.ly/3FJTTrv" /> 	
		      					<img v-else width="20px" src="https://bit.ly/3AeZzsl" />
		      				</td>
		      				<td>
		      					<toggle-button @change="onChangeEventHandler(item.id, $event)" :value="(item.active)?true:false"
               					color="#4377e8" :labels="{checked: 'Yes', unchecked: 'No'}"/>
           					</td>
		      				<!-- <td>{{ item.required_validation }}</td> -->
		      				<td>{{ item.id }}</td>
		      				<td>{{ item.full_name }}</td>
		      				<td>{{ item.email }}</td>
		      				<td>{{ item.added_on }}</td>
		      			</tr>
		      		</tbody>
		      	</table>
		      </b-card-text>
		    </b-card>
		  </b-card-group>
	</div>
</template>

<script>
import $ from 'jquery';

	export default {
		name: 'ActivitiesComponent',
		data () {
			return {
				items: [],
			}
		},
		methods: {
			onChangeEventHandler(id, event){
				// console.log(id ,event.value)
				this.updateData = {id: id, active: event.value?1:0}
				axios.post('/estimator/update', this.updateData)
					.then(response => {
						// console.log(response.data)
					})
			}
		},
		mounted(){
			axios
				.get('/estimator')
				.then(response => 
					{
						this.items = response.data;
						// console.log(response.data);
						
					})
		},
		updated(){
					$('#datatable').DataTable({
						"pagingType": "full_numbers",
				        "lengthMenu": [
				            [10, 25, 50, -1],
				            [10, 25, 50, "All"]
				        ],
				        responsive: true,
				        language: {
				            search: "_INPUT_",
				            searchPlaceholder: "Search estimator",
				        }
					});
		}
	}		
</script>