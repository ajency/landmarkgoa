import React, { Component } from 'react';
import Header from '../header/header.js';
import './verify-mobile.scss'

class VerifyMobile extends Component {
    constructor(props) {
        super(props);       
    }

    render() {
        return (
            <div className="address-container visible d-flex justify-content-between flex-column">
                <Header/>
                <div className="d-flex flex-column p-15 pb-0">
                    <h3 className="mt-4 h1 ft6">Verify mobile</h3>
                    <h4 className="font-weight-light mt-4 pb-4">Looks like you already have account with an saved address. Sign in with OTP for faster checkout.</h4>    
                    <div className="d-flex justify-content-between">
                    <button className="btn btn-primary btn-inverted btn-arrow p-15 rounded-0 text-left position-relative h5 ft6 mb-0 w-48">Cancel</button>                             
                    <button className="btn btn-primary btn-arrow p-15 rounded-0 text-left position-relative h5 ft6 mb-0 w-48">Sign in</button>         
                    </div>
                </div>
            </div>
        );
    }

}

export default VerifyMobile;