'use strict';
const e = React.createElement;


class signInModal extends React.Component {
	constructor(props) {
		super(props);
		this.state = {
			// apiEndPoint : 'http://localhost:5000/project-ggb-dev/us-central1/api/rest/v1',
			// apiEndPoint : 'https://us-central1-project-ggb-dev.cloudfunctions.net/api/rest/v1',
			apiEndPoint : 'https://asia-east2-project-ggb-dev.cloudfunctions.net/api/rest/v1',
			phoneNumber : '',
			otp : '',
			confirmationResult : '',
			disableButtons : false,
			showSignInLoader : false,
			errorMessage : '',
			showCapta : true
		}
	}

	render() {
		return (
			<div className="slide-in flex-slide-in" id="phone_number">
			  <div className="slide-in-header header-container d-flex align-items-center">
			      <div className="app-name d-flex align-items-center">					
			          <img src="http://greengrainbowl-com.digitaldwarve.staging.wpengine.com/wp-content/themes/ajency-portfolio/images/slidein/Newlogo.png" className="app-log" alt="Green Grain Bowl" title="Green Grain Bowl"/>
			      </div>
			      <div className="app-chekout text-green">
			          <img src="http://greengrainbowl-com.digitaldwarve.staging.wpengine.com/wp-content/themes/ajency-portfolio/images/slidein/checkout.png" className="app-log" alt="Green Grain Bowl" title="Green Grain Bowl"/>
			          Secure <br/>Checkout
			      </div>
			      <h3 className="app-close bg-primary m-0 text-white btn-pay m-0" onClick={() => this.closeSignInSlider()} disabled={this.state.disableButtons}>
			          <span aria-hidden="true"><img src="http://greengrainbowl-com.digitaldwarve.staging.wpengine.com/wp-content/themes/ajency-portfolio/images/slidein/remove.png" className="app-log" alt="Green Grain Bowl" title="Green Grain Bowl" /></span>
			      </h3>
			  </div>
			  <div className="slide-in-content">
			      <div className="spacer-2101"></div>
			      <h3 className="h1 ft6">Login</h3>
			      <h4 className="font-weight-light mt-4 pb-4">
			        Having an account with GGB makes it dead simple to place orders
			      </h4>
			      <div className="mb-3 pt-4 pb-2">
			        <input className="w-100 p-3 border-green h5 ft6 rounded-0 plceholder-text" placeholder="10 digit mobile number" type="text" onKeyDown={e => {this.validateMobile(e)}} onChange={e => {this.setUserMobile(e.target.value)}} value={this.state.phoneNumber} /> <br/>
			      </div>
			      <div className="btn-wrapper pt-4">
			      		{this.getSignInButtons()}
			      </div>
				  {/* <h5 class="mt-3 text-center">Don't wish to login? <a class="text-green d-inline-block cursor-pointer" href="#">Skip.</a></h5> */}
			      {this.displaySignInErrorMsg()}
			  </div>
			  {this.getCaptaContainer()}
			
			</div>

		);
	}

	getCaptaContainer(){
		if(this.state.showCapta){
			return(<div className="d-none" id='sign-in-button'></div>)
		}
		else{
			return (null);
		}
	}

	getSignInButtons(){
		// if(this.state.showSignInLoader){
		// 	return (
		// 		<div className="btn-icon">
		// 				<i className="fas fa-circle-notch fa-spin fa-lg"></i>
		// 		</div>
		// 	);
		// }
		return (<div className="btn-inner-wrap">
		          <button type="button" className="btn-reset text-white border-green bg-primary p-3 text-left h5 ft6 mb-0 rounded-0 w-100" onClick={()=> this.signInWithPhoneNumber()} disabled={this.state.phoneNumber.length < 10}>Submit</button>
		          <i className="text-white fa fa-arrow-right" aria-hidden="true"></i>
		        </div>
		);
	}

	displaySignInErrorMsg(){
		if(this.state.errorMessage){
			return  <div className="alert-danger">{this.state.errorMessage}</div>
		}
	}

	setUserMobile(value){
		this.setState({phoneNumber : value});
	}

	validateMobile(e){
	    let key = e.keyCode || e.which;
	    if ((key < 48 || key > 57 || e.target.value.length >9 ) && key !== 8 && key !== 13) {
	        if (e.preventDefault) 
	        	e.preventDefault(); //normal browsers
	        e.returnValue = false; //IE
	    }
	}

	modalClosed(){
		window.modal_closed = true;
	}

	// checkUserExist(){
	// 	this.setState({disableButtons : true, showSignInLoader : true});
	// 	let url = this.state.apiEndPoint + "/check-user-exist";
	// 		let body = {
	// 			phone_number : this.state.phoneNumber
	// 		}
	// 		axios.get(url, {params : body})
	// 			.then((res) => {
	// 				this.signInWithPhoneNumber();
	// 			})
	// 			.catch((error)=>{
	// 				console.log("error in check user exist ==>", error);
	// 				this.signInAnonymously();
	// 			})
	// }

	signInWithPhoneNumber(){
		window.addCartLoader();
		this.setState({disableButtons : true, showSignInLoader : true, showCapta : true}, () => {
			let phone_number = "+91" + this.state.phoneNumber;
			if(window.recaptchaVerifier)
				window.recaptchaVerifier.clear();
			window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('sign-in-button', {
			  'size': 'invisible',
			  'callback': function (response) {
		        // reCAPTCHA solved, allow signInWithPhoneNumber.
		      }
			});

			firebase.auth().signInWithPhoneNumber(phone_number, window.recaptchaVerifier)
			    .then( (confirmationResult) => {
			    	window.removeCartLoader();
			    	console.log("SMS sent.");
			      	this.setState({confirmationResult : confirmationResult, showCapta : false});
			      	// this.closeSignInSlider() // TODO : function to hide this popup 
			      	this.showOtpSlider(confirmationResult, this.state.phoneNumber)   // TODO : Show the otp in slider // pass confirmation-result and mobile number to otp component
			    }).catch( (error) => {
			    	window.removeCartLoader();
			      	console.log("Error :  SMS not sent", error);
			      	this.setState({errorMessage : error.message, disableButtons : false, showSignInLoader : false, showCapta : false});
			    });
		});
		
	}

	// signInAnonymously(){
	// 	firebase.auth().signInAnonymously()
	// 		.then((res)=>{
	// 			res.user.getIdToken().then((idToken) => {
	// 	           this.updateUserDetails(idToken);
	// 	        });
	// 			this.showGpsSlider();
	// 		})
	// 		.catch((error) => {
	// 		  	console.log("error in anonymouse sign in", error);
	// 		  	this.setState({errorMessage : error, disableButtons : false, showSignInLoader : false});
	// 		});
	// }

	// updateUserDetails(idToken){
	// 	let body = {
	// 		phone : this.state.phoneNumber
	// 	}
	// 	let headers = {
	// 		Authorization : 'Bearer '+ idToken
	// 	}
	// 	let url = this.state.apiEndPoint + "/user/update-user-details";
	// 	axios.post(url, body, {headers :  headers })
	// 		.then((res) => {
	// 			console.log("update user details response ==>", res);
	// 		})
	// 		.catch((error)=>{
	// 			console.log("error in update user details ==>", error);
	// 		})
	// }

	// showGpsSlider(){
	// 	// $('#signInModalPrompt').modal('hide');
	// 	window.showGpsModalPrompt(true);
	// }

	closeSignInSlider(){
		document.querySelector('#phone_number').classList.remove('visible');
	}

	showOtpSlider(confirmationResult, phone_number){
		window.showOTPSlider(true);
		window.updateOtpSLider(confirmationResult, phone_number);
	}

}

let domContainer = document.querySelector('#react-sign-in-container');
const signInModalComponent = ReactDOM.render(e(signInModal), domContainer);


window.showSignInModal = (data) => {
	signInModalComponent.setState({phoneNumber : '', otp : '', confirmationResult : '', disableButtons : false, showSignInLoader : false, errorMessage : '', showOtpLoader : false, otpErrorMsg : ''})
	document.querySelector('#phone_number').classList.add('visible');
}
