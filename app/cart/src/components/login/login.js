import React, { Component } from 'react';
import Header from '../header/header.js';
import './login.scss'
import axios from 'axios';
import {generalConfig} from '../config'

class LogIn extends Component {
	constructor(props) {
		super(props);
		this.state = {
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
			<div className="slide-in flex-slide-in active">
			  <Header/>
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


	signInWithPhoneNumber(){
		window.addCartLoader();
		let url = generalConfig.apiEndPoint + "/check-user-exist";
		let body = {
			phone_number : this.state.phoneNumber
		}
		axios.get(url, {params : body})
			.then((res) => {
				if(res.data.success){
					this.props.history.push({pathname : '/cart/verify-mobile', state : {phoneNumber : this.state.phoneNumber}});
					window.removeCartLoader();
				}
				else{
					window.firebase.auth().currentUser.getIdToken().then((idToken)=>{
						this.updateUserDetails(idToken)
					})
				}
			})
			.catch((error)=>{
				let msg = error.message ? error.message : error;
				this.setState({errorMessage : error.message});
				window.removeCartLoader();
			})
	}

	updateUserDetails(idToken){
		let body = {
			phone : this.state.phoneNumber
		}
		let headers = {
			Authorization : 'Bearer '+ idToken
		}
		let url = generalConfig.apiEndPoint + "/user/update-user-details";
		axios.post(url, body, {headers :  headers })
			.then((res) => {
				console.log("update user details response ==>", res);
				window.removeCartLoader();
				this.props.history.push('/cart/add-address')
			})
			.catch((error)=>{
				console.log("error in update user details ==>", error);
				window.removeCartLoader();
			})
	}

}

export default LogIn;
