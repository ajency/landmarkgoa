import React, {Component} from 'react'
import $ from 'jquery'
import {razorPayConfig, generalConfig} from '../../payment-gateway-config.js'

class Hosted extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div>
                <form method="POST" action="https://api.razorpay.com/v1/checkout/embedded" ref={this.props.payForm}>
                <input type="hidden" name="key_id" value={razorPayConfig.api_key} />
                <input type="hidden" id="order_id" name="order_id" value =''/>
                <input type="hidden" name="name" value={generalConfig.company_name}/>
                <input type="hidden" name="image" value={razorPayConfig.image}/>
                <input type="hidden" name="prefill[name]" value="Gaurav Kumar"/>
                <input type="hidden" name="prefill[contact]" value="9123456780"/>
                <input type="hidden" name="prefill[email]" value="gaurav.kumar@example.com"/>
                <input type="hidden" name="callback_url" value={razorPayConfig.callback_url}/>
                <input type="hidden" name="cancel_url" value={razorPayConfig.cancel_url}/>
                <button onClick={(e)=> { this.handleSubmit(e)}}>Pay</button>
                </form>  
            </div>
        );
    }

    async handleSubmit(e) {
        e.preventDefault();
        await this.props.createOrder()
        $('#order_id').val(this.props.r_order_id)
        this.props.payForm.current.submit()
    }
}

export default Hosted
