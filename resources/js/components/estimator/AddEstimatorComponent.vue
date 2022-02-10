<template>
	<div>
		<b-card-group deck>
		    <b-card header-tag="header">
		      <template #header>
		      	<b-row>
		      		<b-col class="my-auto"><h5 class="mb-0">Add Estimators</h5></b-col>
		      		<b-col cols=2 style="text-align: end;"><b-link class="btn btn-primary" to="/manage_estimator">Back</b-link></b-col>
		      	</b-row>
		      </template>
		      <b-card-text>
		      		<b-form @submit="onSubmit" @reset="onReset" v-if="show">
		      			<b-row class="mb-4">
		      				<b-col>
		      					<b-button type="submit" variant="primary">Save</b-button>
							      <b-button type="reset" variant="danger">Reset</b-button>
		      				</b-col>
		      			</b-row>
							  <b-row class="mb-2" >
							  	<b-col>
							    		<b-form-group id="input-group-1" label="Company Name:" label-for="company_name">
									        <b-form-input
									          id="company_name"
									          v-model="form.company_name"
									          placeholder="Enter company name"
									          required
									        ></b-form-input>
									    </b-form-group>
							    </b-col>
							    <b-col>
							    		<b-form-group id="input-group-2" label="First Name:" label-for="first_name">
									        <b-form-input
									          id="first_name"
									          v-model="form.first_name"
									          placeholder="Enter first name"
									          required
									        ></b-form-input>
									    </b-form-group>
							    </b-col>
							    <b-col>
							    		<b-form-group id="input-group-2" label="Last Name:" label-for="last_name">
									        <b-form-input
									          id="last_name"
									          v-model="form.last_name"
									          placeholder="Enter last name"
									          required
									        ></b-form-input>
									    </b-form-group>
							    </b-col>
							  </b-row>
							  <b-row class="mb-2">
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
							    		<b-form-group id="input-group-2" label="Mobile Number:" label-for="cnt_no">
									        <b-form-input
									          id="cnt_no"
									          v-model="form.cnt_no"
									          placeholder="Enter mobile number"
									          required
									        ></b-form-input>
									    </b-form-group>
							    </b-col>
							    <b-col>
							    </b-col>
							  </b-row>
							  <b-row class="mb-2">
							  	<b-col>
							    		<b-form-group id="input-group-2" label="Address:" label-for="address">
									        <b-form-input
									          id="address"
									          v-model="form.address"
									          placeholder="Enter address"
									          required
									        ></b-form-input>
									    </b-form-group>
							    </b-col>
							    <b-col>
							    		<b-form-group id="input-group-2" label="City:" label-for="city">
									        <b-form-input
									          id="city"
									          v-model="form.city"
									          placeholder="Enter city"
									          required
									        ></b-form-input>
									    </b-form-group>
							    </b-col>
							    <b-col>
							    		<b-form-group id="input-group-2" label="State:" label-for="state">
									        <b-form-input
									          id="state"
									          v-model="form.state"
									          placeholder="Enter state"
									          required
									        ></b-form-input>
									    </b-form-group>
							    </b-col>
							  </b-row>
							  <b-row class="mb-2">
							  	<b-col>
							    		<b-form-group id="input-group-2" label="Zip:" label-for="zip">
									        <b-form-input
									          id="zip"
									          v-model="form.zip"
									          placeholder="Enter zip"
									          required
									        ></b-form-input>
									    </b-form-group>
							    </b-col>
							    <b-col>
							    		<b-form-group id="input-group-2" label="Country:" label-for="country">
									        <b-form-select id="country" v-model="form.country" :options="countryList"></b-form-select>
									    </b-form-group>
							    </b-col>
							    <b-col>
							    </b-col>
							  </b-row>
							  <b-row class="mb-2">
							  	<b-col>
							    		<b-form-group id="input-group-2" label="Bank account name:" label-for="bankAccName">
									        <b-form-input
									          id="bankAccName"
									          v-model="form.bank_account_name"
									          placeholder="Enter bank account name"
									          required
									        ></b-form-input>
									    </b-form-group>
							    </b-col>
							    <b-col>
							    		<b-form-group id="input-group-2" label="Account number:" label-for="accNumber">
									        <b-form-input
									          id="accNumber"
									          v-model="form.account_number"
									          placeholder="Enter account number"
									          required
									        ></b-form-input>
									    </b-form-group>
							    </b-col>
							    <b-col>
							    		<b-form-group id="input-group-2" label="Bank name:" label-for="bankName">
									        <b-form-input
									          id="bankName"
									          v-model="form.bank_name"
									          placeholder="Enter bank name"
									          required
									        ></b-form-input>
									    </b-form-group>
							    </b-col>
							  </b-row>
							  <b-row class="mb-2">
							  	<b-col>
							    		<b-form-group id="input-group-2" label="Swift code / IBAN:" label-for="swiftCode">
									        <b-form-input
									          id="swiftCode"
									          v-model="form.bank_swift"
									          placeholder="Enter swift code"
									          required
									        ></b-form-input>
									    </b-form-group>
							    </b-col>
							    <b-col>
							    		<b-form-group id="input-group-2" label="Bank address:" label-for="bankAddress">
									        <b-form-input
									          id="bankAddress"
									          v-model="form.bank_address"
									          placeholder="Enter bank address"	
									          required
									        ></b-form-input>
									    </b-form-group>
							    </b-col>
							    <b-col>
							    </b-col>
							  </b-row>
							  <b-row class="mb-2">
							  	<b-col>
							    		<b-form-group id="input-group-2" label="Provide estimate in:" label-for="currency">
									        <b-form-select id="currency" v-model="form.currency" :options="currencyList"></b-form-select>
									    </b-form-group>
							    </b-col>
							  	<b-col>
							    		<b-form-group id="input-group-2" label="Commission (%):" label-for="commission">
									        <b-form-input
									          id="commission"
									          v-model="form.commission"
									          placeholder="10"
									          val="10"
									          required
									        ></b-form-input>
									    </b-form-group>
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
  export default {
    data() {
      return {
        form: {
        	company_name: '',
        	first_name: 	'',
        	last_name: 		'',
          email: 				'',
          cnt_no: '',
          address: 			'',
          city: 				'',
          state: 				'',
          zip: 					'',
          country: 			'',
          bank_account_name:'',
          account_number: '',
          bank_name: '',
          bank_swift: '',
          bank_address: '',
          currency: '',
          commission: '',
        },
        countryList : [
          { value: null, text: 'Open to select country' },
          { value: 'at', text: 'Australia' },
          { value: 'in', text: 'India' },
          { value: 'us', text: 'United states' }
        ],
        currencyList : [
          { value: 'EURO', text: 'EURO' },
          { value: 'USD', text: 'USD' },
          { value: 'HKD', text: 'HKD' }
        ],
        show: true
      }
    },
    methods: {
      onSubmit(event) {
        event.preventDefault()
        // alert(JSON.stringify(this.form))
        axios.post('/estimator/store', this.form)
        		.then(response => {
        			if(response.data.error){
        				alert("Error: ", response.data.message);
        			}else{
        				this.$router.push({ path : '/manage_estimator' });
        			}
        		})
        		.catch(error => {
        			console.error("There was an error!", error.message);
        		});
      },
      onReset(event) {
        event.preventDefault()
        // Reset our form values
        this.form.company_name = ''
        this.form.first_name = ''
        this.form.last_name = ''
        this.form.email = ''
        this.form.cnt_no = ''
        this.form.address = ''
        this.form.city = ''
        this.form.state = ''
        this.form.zip = ''
        this.form.country = ''
        this.form.bank_account_name = ''
        this.form.account_number = ''
        this.form.bank_name = ''
        this.form.bank_swift = ''
        this.form.bank_address = ''
        this.form.currency = ''
        this.form.commission = ''
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  }
</script>