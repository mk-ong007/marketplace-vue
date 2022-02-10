<template>
	<div>
		<b-card-group deck>
		    <b-card header-tag="header">
		      <template #header>
		        <h6 class="mb-0">General Settings</h6>
		      </template>
		      <b-card-text>
		      	<b-form @submit="onSubmit" enctype="multipart/form-data">
		      			<b-row class="mb-4">
		      				<b-col>
		      					<b-button type="submit" variant="primary">Save</b-button>
		      				</b-col>
		      				<b-col cols="10">
		      					<span class="text-danger" v-if="msg.error">{{ msg.error }}</span>
		      					<span class="text-success" v-if="msg.success">{{ msg.success }}</span>
		      				</b-col>
		      			</b-row>
						<b-row class="mb-4" >
						    <b-col>
						    	<b-form-group
							        id="input-group-3"
							        label="Email address:"
							        label-for="email">
							        <b-form-input
							          id="email"
							          v-model="form.email"
							          type="email"
							          placeholder="Enter email"
							          required
							        ></b-form-input>
							    </b-form-group>
						    </b-col>
						    <b-col>
					    		<div>
					    			<b-form-group id="input-group-2" label="Password:" label-for="new_password">
							        <b-form-input
							          id="new_password"
							          v-model="form.new_password"
							          placeholder="New Password"
							          type="password"
							          class="mb-2"
							          
							        ></b-form-input> 
							        <b-form-input
							          id="re_new_passwoord"
							          v-model="form.re_new_password"
							          placeholder="Re-type Password"
							          type="password"
							          
							        ></b-form-input>
							    </b-form-group>
					    		</div>
						    </b-col>
					  	</b-row>
					  	<b-row>
					  		<b-col>
					  			<div class="">
					  				<img v-bind:src="imagePreview" width="100" height="100" v-show="showPreview"/> 
						  			<input type="file" accept="image/*" class="custom-file-input" v-on:change="onImageChange">
					  			</div>
					  		</b-col>
						    <b-col>
						    </b-col>
					  	</b-row>
					</b-form>
		      </b-card-text>
		    </b-card>
		  </b-card-group>
	</div>
</template>

<script>
// import PictureInput from 'vue-picture-input'
	export default {
		components: {
		    // PictureInput
		},
		data() {
			return {
				form: {
					id: '',
					email: '',
					new_password: '',
					re_new_password: '',
					profile_pic: ''
				},
				msg: {
					error: '',
					success: ''
				},
				imagePreview: 'https://bit.ly/3nzZOsM',
				showPreview: false,
			}
		},
		methods: {
			 onImageChange(e){
                console.log(e.target.files[0]);
                this.form.profile_pic = e.target.files[0];

                let reader  = new FileReader();
                reader.addEventListener("load", function () {
			        this.showPreview = true;
			        this.imagePreview = reader.result;
			    }.bind(this), false);

			    if( this.form.profile_pic ){
			        /*
			            Ensure the file is an image file.
			        */
			        if ( /\.(jpe?g|png|gif)$/i.test( this.form.profile_pic.name ) ) {

			            console.log("here");
			            /*
			            Fire the readAsDataURL method which will read the file in and
			            upon completion fire a 'load' event which we will listen to and
			            display the image in the preview.
			            */
			            reader.readAsDataURL( this.form.profile_pic );
			        }
			    }
            },
			onSubmit(event) {
				event.preventDefault();

				let formData = new FormData();

			    formData.append("id", this.form.id);
			    formData.append("email", this.form.email);
			    if(this.form.profile_pic != ''){
			    	formData.append("picture", this.form.profile_pic);
			    }
			    if(this.form.new_password != ''){
			    	formData.append("new_password", this.form.new_password);
				    formData.append("re_new_password", this.form.re_new_password);
			    }

				const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

				axios.post('/general-settings/update', formData, config)
					.then(response => {
						if(response.data.error){
							this.msg.error = response.data.message
						}else{
							this.msg.success = response.data.message
							this.form.new_password = this.form.re_new_password = ''
						}


						setTimeout(() => this.msg.error = this.msg.success = '', 2000);
					})
					.catch(error => {
						console.log(error);
					})
			}
		},
		mounted() {
			axios.get('/general-settings/show')
				.then(response => {
					this.form.id 	= response.data.id;
					this.form.email = response.data.email;
					this.showPreview = true;
					if(response.data.picture != '')
			        this.imagePreview = '/storage/pictures/users/'+response.data.picture;
				})
		},
	}
</script>


<style scoped>
	.custom-file-input::-webkit-file-upload-button {
	  visibility: hidden;
	}
	.custom-file-input::before {
	  content: 'Change';
	  display: inline-block;
	  background: linear-gradient(to right, #f9f9f9, #e3e3e3);
	  border: 1px solid #999;
	  border-radius: 3px;
	  padding: 5px 8px;
	  outline: none;
	  white-space: nowrap;
	  -webkit-user-select: none;
	  cursor: pointer;
	  text-shadow: 1px 1px #fff;
	  font-weight: 700;
	  font-size: 10pt;
	}
	.custom-file-input:hover::before {
	  border-color: black;
	}
	.custom-file-input:active::before {
	  background: -webkit-linear-gradient(to right, #e3e3e3, #f9f9f9);
	}

</style>