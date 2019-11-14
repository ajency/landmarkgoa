import React, { Component } from 'react';
import Header from '../header/header.js';
import './verify-mobile.scss'

class VerifyMobile extends Component {
    constructor(props) {
        super(props);
        this.state = {
            phoneNumber : '',
            otp : '',
            confirmationResult : '',
            errorMessage : '',
            showCapta : true,
            showOtpScreen : false
        }
    }

    componentDidMount(){
        console.log("check state ==>", this.props.location, this.props.history)
        this.setState({phoneNumber : this.props.location.state.phoneNumber});
    }

    render() {
        return (
            <div className="address-container visible d-flex justify-content-between flex-column">
                <Header/>
                {this.getUIContent()}
            </div>
        );
    }

    getUIContent(){
        if(!this.state.showOtpScreen){
            return(
                <div className="d-flex flex-column p-15 pb-0">
                    <h3 className="mt-4 h1 ft6">Verify mobile</h3>
                    <h4 className="font-weight-light mt-4 pb-4">Looks like you already have account with an saved address. Sign in with OTP for faster checkout.</h4>    
                    <div className="d-flex justify-content-between">
                    <button className="btn btn-primary btn-inverted btn-arrow p-15 rounded-0 text-left position-relative h5 ft6 mb-0 w-48" onClick={()=>{this.skipLogin()}}>Cancel</button>                             
                    <button className="btn btn-primary btn-arrow p-15 rounded-0 text-left position-relative h5 ft6 mb-0 w-48" onClick={()=>{this.signInWithPhoneNumber()}}>Sign in</button>         
                    </div>
                </div>
            )
        }
        else{
            return(
                <div>
                    <div className="slide-in-content">
                        <h3 className="h1 ft6">Verify Mobile</h3>
                        <h4 className="font-weight-light mt-4 pb-4">
                            Enter the 6 digit code sent to the number 
                        </h4>
                        <h4 className="ft6 mb-3">{this.state.phoneNumber}</h4>
                        <div className="mb-1 pt-4">
                            <input className="w-100 p-3 border-green h5 ft6 rounded-0 plceholder-text" type="tel" placeholder="Enter OTP" onChange={e => {this.setOtp(e.target.value)}} value={this.state.otp} />
                        </div>
                        <h6 className="mb-2 pb-3">Didn't receive the code? <a href="javascript:void(0)" className="text-underline" onClick={()=>{this.resendOtpCode()}}>Resend</a></h6>
                        <div className="btn-wrapper pt-4">
                            <div className="btn-inner-wrap">
                                <button type="button" className="btn-reset text-white border-green bg-primary p-3 text-left h5 ft6 mb-0 rounded-0 w-100" onClick={()=>{this.verifyOtp()}} disabled={this.state.otp.length < 6}>Verify OTP</button>
                                  <i className="text-white fa fa-arrow-right" aria-hidden="true"></i>
                            </div>
                        </div>
                        <h5 class="mt-3 text-center">Don't wish to login? <a class="text-green d-inline-block cursor-pointer" onClick={() => this.skipLogin()}>Skip.</a></h5>

                        {this.displayOtpErrorMsg()}
                    </div>

                    {this.getCaptaContainer()}
                </div>
            )
        }
    }

    getCaptaContainer(){
        if(this.state.showCapta){
            return(<div className="d-none" id='recaptcha-container'></div>)
        }
        else{
            return (null);
        }
    }

    displayOtpErrorMsg(){
        if(this.state.otpErrorMsg){
            return  <div className="alert-danger">{this.state.otpErrorMsg}</div>
        }
    }

    skipLogin(){
        this.props.history.push('/cart/add-address');   
    }

    setOtp(value){
        this.setState({otp : value});
    }

    signInWithPhoneNumber(){
        window.addCartLoader();
        this.setState({ showCapta : true, showOtpScreen : true}, () => {
            let phone_number = "+91" + this.state.phoneNumber;
            if(window.recaptchaVerifier)
                window.recaptchaVerifier.clear();
            window.recaptchaVerifier = new window.firebase.auth.RecaptchaVerifier('recaptcha-container', {
              'size': 'invisible',
              'callback': function (response) {
                // reCAPTCHA solved, allow signInWithPhoneNumber.
              }
            });

            window.firebase.auth().signInWithPhoneNumber(phone_number, window.recaptchaVerifier)
                .then( (confirmationResult) => {
                    window.removeCartLoader();
                    console.log("SMS sent.");
                      this.setState({confirmationResult : confirmationResult, showCapta : false});
                }).catch( (error) => {
                    window.removeCartLoader();
                      console.log("Error :  SMS not sent", error);
                      this.setState({errorMessage : error.message,  showCapta : false});
                });
        });        
    }

    verifyOtp(){
        window.addCartLoader();
        console.log("this.state.otp ==>", this.state.otp);
        this.setState({ otpErrorMsg : ''});
        this.state.confirmationResult.confirm(this.state.otp)
            .then((res) =>{
                res.user.getIdToken().then((idToken) => {
                    window.createCartForVerifiedUser(window.readFromLocalStorage('cart_id'));
                    window.writeInLocalStorage('cart_id' , window.firebase.auth().currentUser.uid);
                    this.updateUserDetails(idToken);
                });
            })
            .catch((error)=>{
                window.removeCartLoader();
                let msg = error.message ? error.message : error;
                this.setState({ otpErrorMsg : msg});
                console.log("error in otp verification ==>", error);
            })
    }

    resendOtpCode(){
        this.setState({showCapta : true}, ()=>{
            console.log("inside verify otp code");
            window.addCartLoader();
            let phone_number = "+91" + this.state.phoneNumber;
            if(window.recaptchaVerifier)
                window.recaptchaVerifier.clear();
            window.recaptchaVerifier = new window.firebase.auth.RecaptchaVerifier('recaptcha-container', {
              'size': 'invisible',
              'callback': function (response) {
                // reCAPTCHA solved, allow signInWithPhoneNumber.
              }
            });

            window.firebase.auth().signInWithPhoneNumber(phone_number, window.recaptchaVerifier)
                .then( (confirmationResult) => {
                    window.removeCartLoader();
                    console.log("SMS sent.");
                      this.setState({confirmationResult : confirmationResult, showCapta : false});
                }).catch( (error) => {
                    window.removeCartLoader();
                    let msg = error.message ? error.message : error;
                      this.setState({ otpErrorMsg : msg, showCapta : false});
                });
        });
    }
}

export default VerifyMobile;